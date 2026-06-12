<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## About Laravel

Laravel is a web application framework with expressive, elegant syntax. We believe development must be an enjoyable and creative experience to be truly fulfilling. Laravel takes the pain out of development by easing common tasks used in many web projects, such as:

- [Simple, fast routing engine](https://laravel.com/docs/routing).
- [Powerful dependency injection container](https://laravel.com/docs/container).
- Multiple back-ends for [session](https://laravel.com/docs/session) and [cache](https://laravel.com/docs/cache) storage.
- Expressive, intuitive [database ORM](https://laravel.com/docs/eloquent).
- Database agnostic [schema migrations](https://laravel.com/docs/migrations).
- [Robust background job processing](https://laravel.com/docs/queues).
- [Real-time event broadcasting](https://laravel.com/docs/broadcasting).

Laravel is accessible, powerful, and provides tools required for large, robust applications.

## Learning Laravel

Laravel has the most extensive and thorough [documentation](https://laravel.com/docs) and video tutorial library of all modern web application frameworks, making it a breeze to get started with the framework.

In addition, [Laracasts](https://laracasts.com) contains thousands of video tutorials on a range of topics including Laravel, modern PHP, unit testing, and JavaScript. Boost your skills by digging into our comprehensive video library.

You can also watch bite-sized lessons with real-world projects on [Laravel Learn](https://laravel.com/learn), where you will be guided through building a Laravel application from scratch while learning PHP fundamentals.

## Agentic Development

Laravel's predictable structure and conventions make it ideal for AI coding agents like Claude Code, Cursor, and GitHub Copilot. Install [Laravel Boost](https://laravel.com/docs/ai) to supercharge your AI workflow:

```bash
composer require laravel/boost --dev

php artisan boost:install
```

Boost provides your agent 15+ tools and skills that help agents build Laravel applications while following best practices.

## Contributing

Thank you for considering contributing to the Laravel framework! The contribution guide can be found in the [Laravel documentation](https://laravel.com/docs/contributions).

## Code of Conduct

In order to ensure that the Laravel community is welcoming to all, please review and abide by the [Code of Conduct](https://laravel.com/docs/contributions#code-of-conduct).

## Security Vulnerabilities

If you discover a security vulnerability within Laravel, please send an e-mail to Taylor Otwell via [taylor@laravel.com](mailto:taylor@laravel.com). All security vulnerabilities will be promptly addressed.

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).




```
publikasi-berita
├─ .editorconfig
├─ .npmrc
├─ app
│  ├─ Http
│  │  └─ Controllers
│  │     └─ Controller.php
│  ├─ Models
│  │  └─ User.php
│  └─ Providers
│     └─ AppServiceProvider.php
├─ artisan
├─ bootstrap
│  ├─ app.php
│  ├─ cache
│  │  ├─ packages.php
│  │  └─ services.php
│  └─ providers.php
├─ composer.json
├─ composer.lock
├─ config
│  ├─ app.php
│  ├─ auth.php
│  ├─ cache.php
│  ├─ database.php
│  ├─ filesystems.php
│  ├─ logging.php
│  ├─ mail.php
│  ├─ queue.php
│  ├─ services.php
│  └─ session.php
├─ database
│  ├─ database.sqlite
│  ├─ factories
│  │  └─ UserFactory.php
│  ├─ migrations
│  │  ├─ 0001_01_01_000000_create_users_table.php
│  │  ├─ 0001_01_01_000001_create_cache_table.php
│  │  └─ 0001_01_01_000002_create_jobs_table.php
│  └─ seeders
│     └─ DatabaseSeeder.php
├─ package-lock.json
├─ package.json
├─ phpunit.xml
├─ public
│  ├─ .htaccess
│  ├─ favicon.ico
│  ├─ index.php
│  ├─ picture
│  │  └─ background header public.jpg
│  └─ robots.txt
├─ README.md
├─ resources
│  ├─ css
│  │  ├─ app.css
│  │  ├─ base
│  │  ├─ component
│  │  │  ├─ footerutama.css
│  │  │  └─ headerutama.css
│  │  ├─ cssadmin
│  │  │  └─ dashboard.css
│  │  ├─ csspages
│  │  ├─ layouts
│  │  └─ pages
│  │     └─ home.css
│  ├─ js
│  │  └─ app.js
│  └─ views
│     ├─ component
│     │  ├─ footerutama.blade.php
│     │  └─ headerutama.blade.php
│     ├─ layouts
│     │  ├─ admin.blade.php
│     │  └─ app.blade.php
│     ├─ pages
│     │  ├─ admin
│     │  │  └─ dashboard.blade.php
│     │  └─ public
│     │     ├─ home.blade.php
│     │     ├─ kegiatan.blade.php
│     │     ├─ kontak.blade.php
│     │     ├─ laporan.blade.php
│     │     ├─ profil.blade.php
│     │     └─ public.blade.php
│     └─ welcome.blade.php
├─ routes
│  ├─ console.php
│  └─ web.php
├─ storage
│  ├─ app
│  │  ├─ private
│  │  └─ public
│  ├─ framework
│  │  ├─ cache
│  │  │  └─ data
│  │  ├─ sessions
│  │  │  ├─ 3Lraiqc6a34VfRCsW3xcgG2Y06PdB4aQTKTCMPT9
│  │  │  ├─ Al0OjFhGqOOypahRToOkHJBlcNbRI56a5o1DiP8H
│  │  │  └─ PBkNXvdhNJx6HovZuMrE9qt7wYTxtN60TvZynfL3
│  │  ├─ testing
│  │  └─ views
│  │     ├─ 1763cbd68f786aa26a1c63ced81d0856.php
│  │     ├─ 1f6ece298272c4fe34e5c18d79c9ad6e.php
│  │     ├─ 49ba7b4968fb220127eeee40c25a3320.php
│  │     ├─ 5caca553d935a7657b977ce9a1cb1798.php
│  │     ├─ 5cf792de475a56e073c94d249eed33aa.php
│  │     ├─ 6b87ccb8ed3e15a7bfb03addf6dada30.php
│  │     ├─ 6fa1b0c47e6dff2cc36e8a8c5ba5d4cb.php
│  │     ├─ 7454b1024ebf411bce5401f23de3907a.php
│  │     ├─ b5caefbf300d81d60fd98cc9946dc702.php
│  │     ├─ c77636f6e5573bdbe2e252570e799d6d.php
│  │     ├─ debf9ae6fc1eb9d1990901f0d73a01e6.php
│  │     └─ e8af8bf90ea01c1287a01ae2d2893e4d.php
│  └─ logs
├─ tests
│  ├─ Feature
│  │  └─ ExampleTest.php
│  ├─ TestCase.php
│  └─ Unit
│     └─ ExampleTest.php
└─ vite.config.js

```