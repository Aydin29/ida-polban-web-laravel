# 📘 LANGKAH-LANGKAH MENGGUNAKAN NGROK UNTUK WEB LARAVEL

## 🎯 Tujuan
Membuat website Laravel (IDA Polban) bisa diakses dari internet melalui ngrok.

---

## 📦 STEP 1: Download & Install Ngrok

1. Buka link: https://ngrok.com/download
2. Klik **"Download for Windows"** (file zip)
3. Extract file zip tersebut
4. Pindahkan file `ngrok.exe` ke folder `C:\ngrok\` (buat folder baru)

---

## 📝 STEP 2: Daftar Akun Ngrok (GRATIS)

1. Buka: https://dashboard.ngrok.com/signup
2. Daftar dengan email (atau login dengan Google/GitHub)
3. Verifikasi email Anda
4. Login ke dashboard ngrok

---

## 🔑 STEP 3: Ambil Authtoken (Token)

1. Setelah login, buka halaman: https://dashboard.ngrok.com/get-started/your-authtoken
2. Akan ada token seperti ini:
   ```
   38wRbAPo0T7Fof8kfELWaDxupUv_6xpVRgf7BqbhvPxfuZV66
   ```
3. **Copy token tersebut** (jangan di-share ke siapa pun)

---

## ⚙️ STEP 4: Setup Authtoken di Komputer

Buka **PowerShell** atau **CMD**, lalu jalankan:

```powershell
C:\ngrok\ngrok.exe ngrok config add-authtoken 3HENtVuBQzwTfsa4Uq41isjINVN_59QF9kr6KsquXW2Ci2TWE
```

(Ganti token di atas dengan token asli Anda)

**Hasil:** Akan muncul pesan `Authtoken saved successfully`

---

## 🚀 STEP 5: Jalankan Laravel Server

Buka **PowerShell** baru, arahkan ke folder project:

```powershell
cd C:\Users\M FAWWAZ AYDIN\Desktop\ida-polban-laravel
```

Jalankan Laravel:

```powershell
php artisan serve --host=127.0.0.1 --port=8000
```

**Hasil:** Akan muncul:
```
Starting Laravel development server: http://127.0.0.1:8000
```

> **Biarkan terminal ini tetap terbuka!**

---

## 🌐 STEP 6: Jalankan Ngrok

Buka **PowerShell baru** (terminal kedua), lalu jalankan:

```powershell
C:\ngrok\ngrok.exe http 8000
```

**Hasil:** Akan muncul tampilan seperti ini:
```
ngrok                                                                                   (Ctrl+C to quit)

Session Status                online
Account                       email@anda.com (Plan: Free)
Version                       3.x.x
Region                        United States (us)
Latency                       24ms
Web Interface                 http://127.0.0.1:8000
Forwarding                    ttps://elton-lineny-valda.ngrok-free.dev -> http://127.0.0.1:8000

Connections                   ttl     opn     rt1     rt5     p50     p90
                              0       0       0.00    0.00    0.00    0.00
```

> **Lihat bagian `Forwarding`** — di situlah URL ngrok Anda.

---

## 🔗 STEP 7: Update APP_URL di Laravel

### Untuk Akun GRATIS (Free Tier):

URL ngrok gratis bentuknya seperti ini:
```
https://abc-def-ghi-123.ngrok-free.app
```
➡️ **Domain selalu `ngrok-free.app`** (bukan `.com` atau `.dev`)

1. Buka file `.env` di folder project (gunakan notepad/VSCode)
2. Cari baris:
   ```
   APP_URL=http://localhost
   ```
3. Ganti dengan URL ngrok yang muncul tadi (wajib pakai `https://`):
   ```
   APP_URL=https://abc-def-ghi-123.ngrok-free.app
   ```
4. Simpan file
5. Jalankan perintah ini di terminal Laravel:
   ```powershell
   php artisan config:clear
   ```

### 📌 Contoh Konkret:

| Yang Muncul di Terminal Ngrok | Yang Diisi di `.env` |
|---|---|
| `https://elton-lineny-valda.ngrok-free.dev` | `APP_URL=https://elton-lineny-valda.ngrok-free.dev` |
| `https://abcd-1234-56-78-90.ngrok-free.app` | `APP_URL=https://abcd-1234-56-78-90.ngrok-free.app` |
| `https://kucing-merah-123.ngrok-free.app` | `APP_URL=https://kucing-merah-123.ngrok-free.app` |

> **💡 Tips:** Copy persis dari terminal. Apapun domainnya (`.app`, `.dev`, dll), gunakan persis seperti yang muncul di baris **Forwarding**.

---

## 📱 STEP 8: Akses Website dari Internet

- **Dari laptop/HP lain:** Buka browser, ketik URL ngrok tadi
  ```
  https://abc-def-ghi-123.ngrok-free.app
  ```

- **Untuk lihat statistik request:** Buka
  ```
  http://127.0.0.1:4040
  ```
  (di browser komputer yang sama)

---

## 🛠️ STEP 9: Jika Error "ERR_NGROK_334" (Domain sudah dipakai)

Error ini muncul karena akun free hanya bisa 1 tunnel aktif.

**Solusi:**
1. Matikan semua proses ngrok yang lama:
   ```powershell
   taskkill /f /im ngrok.exe
   ```
2. Tunggu 5 detik
3. Jalankan lagi:
   ```powershell
   C:\ngrok\ngrok.exe http 8000
   ```
4. Anda akan dapat **URL baru** (domain random)
5. Update `APP_URL` di `.env` dengan URL baru
6. `php artisan config:clear`

---

## ⚠️ CATATAN PENTING

| Hal | Keterangan |
|---|---|
| URL ngrok berubah setiap restart | ✅ Update `APP_URL` setiap kali |
| Akun gratis = 1 tunnel saja | ❌ Tidak bisa 2 project sekaligus |
| Komputer harus nyala | ✅ Website hanya online saat PC hidup |
| Cocok untuk demo/testing | ✅ Bukan untuk production |
| Kecepatan terbatas | ⚠️ 40 request/menit (free) |

---

## 🎯 KESIMPULAN

```
1. Download & install ngrok.exe
2. Daftar akun di dashboard.ngrok.com
3. Ambil authtoken dari dashboard
4. Setup token: ngrok config add-authtoken [TOKEN]
5. Jalankan: php artisan serve
6. Jalankan: ngrok http 8000
7. Copy URL dari baris "Forwarding"
8. Paste ke APP_URL di file .env
9. Jalankan: php artisan config:clear
10. ✅ Selesai! Website bisa diakses dari internet
```

