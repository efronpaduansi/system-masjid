## SISTEM MANAJEMEN MASJID

## Bagaimana memasang pada komputer pribadi saya?

Baiklah. Jika anda ingin mengunduh sistem ini dan memasangnya pada komputer pribadi anda, silahkan ikuti step by step berikut ini.

## Sistem Pendukung

Untuk mulai menginstall pastikan pada komputer anda sudah terpasang beberapa software yang dibutuhkan dengan detail sebagai berikut:
    - **PHP Versi 8.2** atau bisa menggunakan XAMPP dengan versi PHP 8.2
    - **Composer versi terbaru** anda dapat mendownload di (https://getcomposer.org/download/)
    - **NodeJS versi terbaru** anda dapat mendownload di (https://nodejs.org/en)

## Installasi

- Buka CMD pada komputer lalu clone repository: `git clone - development https://github.com/efronpaduansi/system-masjid.git` 
- Silahkan pergi ke folder hasil clone lalu buka CMD dan jalankan perintah `composer install` untuk menginstall dependencies
- Jalankan perintah `npm install` dan `npm run dev`
- Jalankan perintah `cp .env.example .env` untuk mengcopy file `.env`
- Jalankan perintah `php artisan key:generate` untuk memasanga key aplikasi
- Buka `localhost/phpmyadmin` lalu buatlah database baru dengan nama `system_masjid` (Nama database bebas)
Silahkan buka file `.env` lalu sesuaikan pengaturan nama database pada komputer anda. Jika anda pengguna XAMPP maka ubah konfigurasi database sebagai berikut:

    - **DB_CONNECTION=mysql**
    - **DB_HOST=127.0.0.1**
    - **DB_PORT=3306**
    - **DB_DATABASE=system_masjid**
    - **DB_USERNAME=root**
    - **DB_PASSWORD=**

- Jalankan perintah `php artisan migrate --seed` untuk migrasi database
- Jalankan perintah `php artisan serve` untuk mulai menjalankan aplikasi anda
- Silahkan buka web browser lalu ketikan alamat `localhost:8000` maka aplikasi menampilkan halaman login

Selanjutnya, silahkan login sebagai Admin, Ketua dan Bendahara dengan username & password sebagai berikut:
    - Admin login: `admin@mail.com` password : `123456`
    - Ketua login: `ketua@mail.com` password: `123456`
    - Bendahara login: `bendahara@mail.com` password: `123456`

Demikian step by step untuk pemasangan aplikasi, semoga berhasil.
