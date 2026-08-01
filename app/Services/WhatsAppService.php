<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class WhatsAppService
{
    protected string $apiKey;
    protected string $apiUrl;
    protected string $groupLink;
    protected bool $enabled;

    public function __construct()
    {
        $this->apiKey = config('whatsapp.api_key');
        $this->apiUrl = config('whatsapp.api_url', 'https://api.fonnte.com/send');
        $this->groupLink = config('whatsapp.group_link', 'https://chat.whatsapp.com/FpNOQfL7SGV5ijSvgcYJak?s=cl&p=a&ilr=4');
        $this->enabled = config('whatsapp.enabled', false);
    }

    /**
     * Cek apakah layanan WhatsApp aktif dan dapat digunakan.
     */
    public function isEnabled(): bool
    {
        return $this->enabled && !empty($this->apiKey);
    }

    /**
     * Kirim notifikasi WhatsApp ke pendaftar yang telah diverifikasi.
     */
    public function sendVerificationNotification(string $phoneNumber, string $namaLengkap, string $periode, ?string $angkatan = null): array
    {
        if (!$this->isEnabled()) {
            return [
                'status'  => false,
                'message' => 'Notifikasi WhatsApp dinonaktifkan. Aktifkan dengan setting WHATSAPP_ENABLED=true di .env dan pastikan API key tersedia.',
            ];
        }

        $phoneNumber = $this->formatPhoneNumber($phoneNumber);
        $message = $this->buildVerificationMessage($namaLengkap, $periode, $angkatan);

        return $this->send($phoneNumber, $message);
    }

    /**
     * Bangun pesan verifikasi.
     */
    protected function buildVerificationMessage(string $namaLengkap, string $periode, ?string $angkatan = null): string
    {
        // Cari link grup berdasarkan angkatan -- HANYA jika ada grup spesifik
        // Jika tidak ada WaGroup untuk angkatan tersebut, bagian grup WA tidak ditampilkan
        $groupSection = '';
        if ($angkatan) {
            $waGroup = \App\Models\WaGroup::where('angkatan', $angkatan)->first();
            if ($waGroup) {
                $groupSection = "\xF0\x9F\x93\xB1 *Bergabunglah ke Grup WhatsApp Angkatan {$angkatan}*:\n{$waGroup->link_group}\n\n";
            }
        }

        return "*\xE2\x94\x80\xE2\x94\x80 SELAMAT BERGABUNG DI IDAKOM POLBAN \xE2\x94\x80\xE2\x94\x80*\n\n"
            . "Halo *{$namaLengkap}*,\n\n"
            . "Selamat! \xE2\x9C\x85 Pendaftaran Anda sebagai anggota *IDA POLBAN* telah *DIVERIFIKASI* dan *DISETUJUI*.\n\n"
            . "\xF0\x9F\x93\x8B *Data Anggota:*\n"
            . "\xE2\x94\x81\xE2\x94\x81\xE2\x94\x81\xE2\x94\x81\xE2\x94\x81\xE2\x94\x81\xE2\x94\x81\xE2\x94\x81\xE2\x94\x81\xE2\x94\x81\xE2\x94\x81\xE2\x94\x81\xE2\x94\x81\xE2\x94\x81\xE2\x94\x81\xE2\x94\x81\xE2\x94\x81\xE2\x94\x81\xE2\x94\x81\xE2\x94\x81\xE2\x94\x81\xE2\x94\x81\xE2\x94\x81\xE2\x94\x81\xE2\x94\x81\xE2\x94\x81\xE2\x94\x81\xE2\x94\x81\xE2\x94\x81\xE2\x94\x81\n"
            . "\xF0\x9F\x91\xA4 Nama: {$namaLengkap}\n"
            . "\xF0\x9F\x93\x85 Periode: {$periode}\n"
            . ($angkatan ? "\xF0\x9F\x8E\x93 Angkatan: {$angkatan}\n" : "")
            . "\xE2\x94\x81\xE2\x94\x81\xE2\x94\x81\xE2\x94\x81\xE2\x94\x81\xE2\x94\x81\xE2\x94\x81\xE2\x94\x81\xE2\x94\x81\xE2\x94\x81\xE2\x94\x81\xE2\x94\x81\xE2\x94\x81\xE2\x94\x81\xE2\x94\x81\xE2\x94\x81\xE2\x94\x81\xE2\x94\x81\xE2\x94\x81\xE2\x94\x81\xE2\x94\x81\xE2\x94\x81\xE2\x94\x81\xE2\x94\x81\xE2\x94\x81\xE2\x94\x81\xE2\x94\x81\xE2\x94\x81\xE2\x94\x81\xE2\x94\x81\n\n"
            . $groupSection
            . "Terima kasih telah bergabung! \xF0\x9F\x99\x8C\n\n"
            . "*\xE2\x94\x80 Salam hangat,*\n"
            . "*IDA POLBAN* \xF0\x9F\x8E\x93";
    }

    /**
     * Kirim pesan via Fonnte API.
     */
    protected function send(string $target, string $message): array
    {
        if (empty($this->apiKey)) {
            return [
                'status'  => false,
                'message' => 'WHATSAPP_API_KEY belum dikonfigurasi. Tambahkan di file .env',
            ];
        }

        try {
            $response = Http::withHeaders([
                'Authorization' => $this->apiKey,
            ])
            ->timeout(30)           // Total request timeout: 30 detik
            ->connectTimeout(10)    // Timeout koneksi TCP: 10 detik
            ->retry(2, 1000)        // Retry 2 kali dengan jeda 1 detik jika gagal
            ->post($this->apiUrl, [
                'target'  => $target,
                'message' => $message,
            ]);

            $body = $response->json();

            if ($response->successful() && ($body['status'] ?? false)) {
                Log::info('WhatsApp berhasil dikirim ke ' . $target);
                return [
                    'status'  => true,
                    'message' => 'Pesan WhatsApp berhasil dikirim!',
                ];
            }

            // Tangkap pesan error dari Fonnte
            $errorMsg = $body['reason'] ?? ($body['message'] ?? 'Gagal mengirim pesan WhatsApp.');
            $errorMsg = $this->translateFonnteError($errorMsg, $body);

            Log::error('Gagal mengirim WhatsApp', [
                'target'   => $target,
                'response' => $body,
                'api_url'  => $this->apiUrl,
            ]);

            return [
                'status'  => false,
                'message' => $errorMsg,
            ];

        } catch (\Illuminate\Http\Client\ConnectionException $e) {
            // Khusus error koneksi / timeout
            $errorMsg = 'Gagal terhubung ke server WhatsApp. Periksa koneksi internet atau coba lagi. (Timeout: ' . $e->getMessage() . ')';

            Log::error('WhatsApp Connection/Timeout Error', [
                'target'  => $target,
                'api_url' => $this->apiUrl,
                'error'   => $e->getMessage(),
            ]);

            return [
                'status'  => false,
                'message' => $errorMsg,
            ];

        } catch (\Exception $e) {
            Log::error('Error WhatsApp API: ' . $e->getMessage(), [
                'target'  => $target,
                'api_url' => $this->apiUrl,
                'trace'   => $e->getTraceAsString(),
            ]);

            return [
                'status'  => false,
                'message' => 'Error: ' . $e->getMessage(),
            ];
        }
    }

    /**
     * Terjemahkan pesan error dari Fonnte ke bahasa Indonesia yang mudah dipahami.
     */
    protected function translateFonnteError(string $originalError, array $body = []): string
    {
        $lower = strtolower($originalError);

        $errorMap = [
            'disconnected'           => 'Perangkat WhatsApp/Fonnte terputus. Periksa kembali koneksi perangkat di dashboard Fonnte.',
            'invalid device'         => 'Perangkat WhatsApp/Fonnte tidak valid atau dinonaktifkan. Cek status perangkat di dashboard Fonnte.',
            'not registered'         => 'Nomor tujuan belum terdaftar di WhatsApp.',
            'invalid number'         => 'Format nomor HP tujuan tidak valid.',
            'blocked'                => 'Nomor tujuan memblokir pesan dari akun Fonnte ini.',
            'suspend'                => 'Akun Fonnte di-suspend karena melanggar aturan WhatsApp. Fitur notifikasi WhatsApp tidak dapat digunakan.',
            'request invalid'        => 'Akun Fonnte di-suspend atau perangkat terputus. Hubungi tim Fonnte untuk informasi lebih lanjut.',
            'rate limit'             => 'Terlalu banyak permintaan. Silakan coba beberapa saat lagi.',
            'insufficient balance'   => 'Saldo Fonnte tidak mencukupi untuk mengirim pesan.',
            'expired'                => 'Akun Fonnte telah kedaluwarsa. Perbarui langganan di dashboard Fonnte.',
            'unauthorized'           => 'API Key Fonnte tidak valid. Periksa konfigurasi WHATSAPP_API_KEY di .env.',
            'forbidden'              => 'Akses ke API Fonnte ditolak. Akun mungkin di-suspend atau dibatasi.',
        ];

        foreach ($errorMap as $key => $translated) {
            if (str_contains($lower, $key)) {
                return $translated;
            }
        }

        // Jika tidak ada kecocokan, kembalikan pesan asli
        return $originalError;
    }

    /**
     * Format nomor HP ke format internasional (62xx).
     */
    protected function formatPhoneNumber(string $phone): string
    {
        $phone = preg_replace('/[^0-9]/', '', $phone);

        if (substr($phone, 0, 1) === '0') {
            $phone = '62' . substr($phone, 1);
        } elseif (substr($phone, 0, 1) === '+') {
            $phone = substr($phone, 1);
        } elseif (substr($phone, 0, 2) !== '62') {
            $phone = '62' . $phone;
        }

        return $phone;
    }
}

