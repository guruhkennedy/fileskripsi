## Instalasi

1. harus php 8.0 keatas
2. ketik `composer install `
3. kalau gagal hapus file composer.lock
4. buat database dengan nama gedung
5. edit file .env cari bagian DB_CONNECTION, edit bawahe itu sesuaikan dengan user,pass mysql
6. ketik `php artisan migrate`
7. ketik `php artisan db:seed`
8. ketik ``php artisan serve`
