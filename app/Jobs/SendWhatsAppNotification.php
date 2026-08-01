<?php

namespace App\Jobs;

use App\Services\WhatsAppService;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Log;

class SendWhatsAppNotification implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public string $phoneNumber;
    public string $namaLengkap;
    public string $periode;
    public ?string $angkatan;

    public int $tries = 3;
    public int $maxExceptions = 2;

    /**
     * Create a new job instance.
     */
    public function __construct(string $phoneNumber, string $namaLengkap, string $periode, ?string $angkatan = null)
    {
        $this->phoneNumber = $phoneNumber;
        $this->namaLengkap = $namaLengkap;
        $this->periode = $periode;
        $this->angkatan = $angkatan;
    }

    /**
     * Execute the job.
     */
    public function handle(WhatsAppService $whatsapp): void
    {
        // Delay acak 5-15 detik agar tidak terdeteksi spam
        $randomDelay = rand(5, 15);
        sleep($randomDelay);

        $result = $whatsapp->sendVerificationNotification(
            $this->phoneNumber,
            $this->namaLengkap,
            $this->periode,
            $this->angkatan
        );

        if ($result['status']) {
            Log::info('WhatsApp berhasil dikirim via Job ke ' . $this->phoneNumber, [
                'nama' => $this->namaLengkap,
                'periode' => $this->periode,
            ]);
        } else {
            Log::warning('WhatsApp gagal dikirim via Job ke ' . $this->phoneNumber, [
                'nama' => $this->namaLengkap,
                'error' => $result['message'],
            ]);

            // Throw exception agar job di-retry (max 3 kali)
            if ($this->attempts() < $this->tries) {
                throw new \Exception($result['message']);
            }
        }
    }

    /**
     * Handle a job failure.
     */
    public function failed(\Throwable $exception): void
    {
        Log::error('Job SendWhatsAppNotification gagal setelah ' . $this->attempts() . ' percobaan', [
            'phone' => $this->phoneNumber,
            'nama' => $this->namaLengkap,
            'error' => $exception->getMessage(),
        ]);
    }
}
