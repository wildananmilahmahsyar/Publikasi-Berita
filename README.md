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
│  │  ├─ Controllers
│  │  │  ├─ AuthController.php
│  │  │  └─ Controller.php
│  │  └─ Middleware
│  │     └─ CheckRole.php
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
│  │  ├─ 0001_01_01_000002_create_jobs_table.php
│  │  └─ 2026_06_10_064023_add_role_to_users_table.php
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
│  │  ├─ background header public.jpg
│  │  ├─ sampel.jpg
│  │  ├─ struktur.jpg
│  │  └─ uhuy.jpg
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
│  │  │  ├─ dashboard.css
│  │  │  └─ login.css
│  │  ├─ csspages
│  │  ├─ layouts
│  │  └─ pages
│  │     ├─ home.css
│  │     ├─ isiberita.css
│  │     ├─ kegiatan.css
│  │     ├─ kontak.css
│  │     ├─ laporan.css
│  │     └─ profil.css
│  ├─ js
│  │  └─ app.js
│  └─ views
│     ├─ auth
│     │  └─ login.blade.php
│     ├─ component
│     │  ├─ footerutama.blade.php
│     │  └─ headerutama.blade.php
│     ├─ layouts
│     │  ├─ admin.blade.php
│     │  └─ app.blade.php
│     ├─ pages
│     │  ├─ admin
│     │  │  ├─ arsip.blade.php
│     │  │  ├─ create_berita.blade.php
│     │  │  ├─ dashboard.blade.php
│     │  │  ├─ edit_profil.blade.php
│     │  │  ├─ pengurus.blade.php
│     │  │  └─ pesan_kontak.blade.php
│     │  └─ public
│     │     ├─ home.blade.php
│     │     ├─ isiberita.blade.php
│     │     ├─ kegiatan.blade.php
│     │     ├─ kontak.blade.php
│     │     ├─ laporan.blade.php
│     │     └─ profil.blade.php
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
│  │  │  ├─ 2gRD9Pm2CuXrE3eqxmYncyDJYYQy711XJLROBe0s
│  │  │  ├─ BezAPN7ZXSZVhASSUoa5IBAwvo0foW49ZPY4LYP2
│  │  │  ├─ G73MH9gT010rhTO0jDkWIzZqdz24U9iANZlAfyxA
│  │  │  ├─ UrZHPyZSXMf9qHd63Sw2BjeA6Gd9FKeB2r2Yx034
│  │  │  └─ zjnYb5c27rhVHEszTAgvHxfj0zMGU74yPpwaL7qE
│  │  ├─ testing
│  │  └─ views
│  │     ├─ 0259bb56b5e174b96db7b9f55a3c0f0b.php
│  │     ├─ 0697b661acac07d9acc6dcbe01c97cd0.php
│  │     ├─ 10775da1a53e3c1a7c49953b066c557f.php
│  │     ├─ 1763cbd68f786aa26a1c63ced81d0856.php
│  │     ├─ 193fdb95fd36a67dd22c1e15c02bff86.php
│  │     ├─ 19e11c1f08b7fbd369724a31e5fa6f4b.php
│  │     ├─ 1ad93f8090e9f45472f2797f7d5a9b49.php
│  │     ├─ 1b5d12f76cdec2c4a8d81d190e8f95bf.php
│  │     ├─ 1f6ece298272c4fe34e5c18d79c9ad6e.php
│  │     ├─ 225f73f89b25b88c9a3e64e41ac147e0.php
│  │     ├─ 24e8f777fa1c74071c428268ab7f026c.php
│  │     ├─ 2cc04f798b0aabb810cf00fc9befbe01.php
│  │     ├─ 2d3b2d05ccc5bab3b9c73cc764f864c7.php
│  │     ├─ 3a73d753e26c54c63d2154382a7d11f9.php
│  │     ├─ 3c095188e3be206f50141c7a3ec84c03.php
│  │     ├─ 42879c12e4a50a1421d6e3821f31838f.php
│  │     ├─ 455f89490369aa92d20ebaa5fe7d962e.php
│  │     ├─ 484749f01811ada5b2f1c929e082ded7.php
│  │     ├─ 49ba7b4968fb220127eeee40c25a3320.php
│  │     ├─ 531978ac82a6526d3c1134137cf9c5f4.php
│  │     ├─ 5994dc4f8a562c3062794a75339b0963.php
│  │     ├─ 5bc00ec7ea06f375641831e4a8b717a3.php
│  │     ├─ 5caca553d935a7657b977ce9a1cb1798.php
│  │     ├─ 5cf792de475a56e073c94d249eed33aa.php
│  │     ├─ 5db1ecf26983406e7fe24dc1ad796dbd.php
│  │     ├─ 6522e4e0af924f349f4d46003f3e9a07.php
│  │     ├─ 66598025e66a87bfa5761e9142387076.php
│  │     ├─ 6753cba487fefbde8217f1f38346fb46.php
│  │     ├─ 6b87ccb8ed3e15a7bfb03addf6dada30.php
│  │     ├─ 6c33d0c896e0061533644b49947c8e86.php
│  │     ├─ 6d8c25767ec91da882458fe38a134877.php
│  │     ├─ 6ee52e415bb154c248e83ef731984e6c.php
│  │     ├─ 6fa1b0c47e6dff2cc36e8a8c5ba5d4cb.php
│  │     ├─ 74385c67e1d1f751b7489c575f5df441.php
│  │     ├─ 7454b1024ebf411bce5401f23de3907a.php
│  │     ├─ 7dc6583ac74757d1e21e2ab88c89a364.php
│  │     ├─ 92ae4cccf85697d35633bd162790e6df.php
│  │     ├─ 9576e7bcbba61cacc027fb271aa0aa71.php
│  │     ├─ 9cc555a58f97f7eb89352680e30eb854.php
│  │     ├─ a5c471c06de4a3f32c2e358393aaef6b.php
│  │     ├─ aaf584e7370f82b4c34d028ac4f6d255.php
│  │     ├─ b40d0b4aefc9591062dd4b3bd2584f56.php
│  │     ├─ b43c42eafd1c6e997a42ed5c5ffc4b2a.php
│  │     ├─ b5caefbf300d81d60fd98cc9946dc702.php
│  │     ├─ c18fc52112ea0f5678ab0c02cfc79d00.php
│  │     ├─ c2cf2559427686489e0dc29cf91a286a.php
│  │     ├─ c77636f6e5573bdbe2e252570e799d6d.php
│  │     ├─ cd8995cf988bd93a23375828599eaa31.php
│  │     ├─ cfa765139932097f3dcf36cdaf926ce0.php
│  │     ├─ d296f58ed1732b1f8014d1b27b369163.php
│  │     ├─ d35d7d190ee5d0c4b0c92ec4a989892f.php
│  │     ├─ dbf9c037255d5f3563d9e34849ab7180.php
│  │     ├─ dbfb6bec3bb9cc5de6412404b880a307.php
│  │     ├─ dc37e5a9a0e9ccb0ac81931644dea506.php
│  │     ├─ debf9ae6fc1eb9d1990901f0d73a01e6.php
│  │     ├─ e3dcc48337556b56c69fc5de5e1720af.php
│  │     ├─ e8af8bf90ea01c1287a01ae2d2893e4d.php
│  │     ├─ f309fa8c75ab5ddb98359cc0b35286e1.php
│  │     ├─ fd31edd6b8b1dbd964622a7df916058c.php
│  │     └─ fd3d26ce1e7d92f37fea78eba461e0be.php
│  └─ logs
├─ tests
│  ├─ Feature
│  │  └─ ExampleTest.php
│  ├─ TestCase.php
│  └─ Unit
│     └─ ExampleTest.php
└─ vite.config.js

```