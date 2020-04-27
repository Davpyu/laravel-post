# Laravel Post
Projek sederhana postingan dan komentar menggunakan Laravel dan TailwindCSS

## Description
Projek ini memiliki fitur dibawah deskripsi ini. Dibangun dengan metodologi waterfall karena saya paham metode ini dan menurut saya metode ini paling cocok untuk projek mandiri. Untuk arsitektur yang saya gunakan disini adalah Repository Design Pattern, untuk penjelasan lebih lengkap bisa dilihat [disini](https://medium.com/employbl/use-the-repository-design-pattern-in-a-laravel-application-13f0b46a3dce). Untuk mempermudah pengembangan dibagian front-end, saya menggunakan [TailwindCSS](https://tailwindcss.com) sebagai CSS Framework. Untuk meningkatkan stabilitas kode dan mencegah bug, saya menggunakan [PHP Insights](https://github.com/nunomaduro/phpinsights).

Untuk menggunakannya, jalankan 
```bash 
php artisan insights 
```

Untuk kekurangan dari kualitas code, bisa dilihat dari rangkuman pada PHP Insights tersebut.

Untuk kekurangan pada fitur adalah sebagai berikut :
- Tidak adanya forgot password, verification email dan change password.
- Tidak adanya fitur upload image baik untuk foto profil user maupun content pada postingan dikarenakan pada ERD yang diberikan tidak ada field untuk media/gambar
- Tidak adanya fitur testing.

Untuk segi performa, menurut saya sudah cukup cepat, tetapi perlu dites lebih lanjut.

## Fitur

- Basic Auth (Login, Register & Logout)
- Factory dan Seeder sudah siap untuk dijalankan
- Basic CRUD di Postingan

## Prerequisites

* [XAMPP](https://www.apachefriends.org/download.html) - Server Lokal (Gunakan versi terbaru)
* [Composer](https://getcomposer.org/download/) - PHP Dependency Manager
* [NPM](https://nodejs.org/en/) - JS Package Manager

## Installation

#### Clone the repository

```bash
git clone https://github.com/Davpyu/laravel-post
```

#### Open your project

```bash
cd '\path\to\your\project'
```

#### Installing Laravel Dependencies

```bash
composer install
```

#### Copy .env

Windows
```bash
copy .env.example .env 
```
Linux
```bash
cp .env.example .env 
```

#### Generate key

```bash
php artisan key:generate
```

#### Installing Javascript Dependencies

```bash
npm install
```

and then

```bash
npm run dev # For Development
# or
npm run prod # For Production
```

#### Update these setting in .env file:

* DB_DATABASE (your local database, i.e. "sisg")
* DB_USERNAME (your local db username, i.e. "root")
* DB_PASSWORD (your local db password, i.e. "")

#### Run your server

Use XAMPP or run these

```bash
php artisan serve
```
and open it on your browser with url localhost:8000 or 127.0.0.1:8000

#### Migrate your database

```bash
php artisan migrate --seed
```

## Updating project

#### Pulling latest update

```bash
git pull <remote> master
```

#### Updating composer dependencies

```bash
composer update
```

#### Updating database

```bash
php artisan migrate:refresh --seed
```

## Other Notes

**Laravel Docs:**

[Laravel 7.x](https://laravel.com/docs/7.x)

## License
The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
