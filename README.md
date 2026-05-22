# TALL Stack Modules Starter

[![Latest Release](https://img.shields.io/github/v/release/mantle-bearer/goodluck-tall-template)](https://github.com/mantle-bearer/goodluck-tall-template/releases)
[![License: MIT](https://img.shields.io/badge/license-MIT-blue.svg)](LICENSE)

A clean starting point for new projects on the **TALL stack**, with a modular
architecture and a deploy workflow for SSH-less shared hosting (cPanel).

> **Use this template:** click **"Use this template"** on GitHub or run:
> ```bash
> composer create-project mantle-bearer/goodluck-tall-template my-project
> ```

## Stack

| Layer | Choice |
|---|---|
| Framework | Laravel 12 (PHP 8.2+) |
| Admin | Filament v3 (`/admin`) |
| Interactivity | Livewire v3 (Alpine.js ships bundled — do **not** import it separately) |
| Styling | Tailwind CSS v4 (CSS-first `@theme`, no `tailwind.config.js`) |
| Modules | `nwidart/laravel-modules` (feature code lives in `Modules/`) |
| Build | Vite |
| Default DB | SQLite |

## What's included

- A **`Website`** sample module (`Modules/Website`) serving the public landing page at `/`.
- A **Filament admin panel** at `/admin` with database notifications and a dashboard.
- **Dark mode** — class-based, no-flash toggle persisted to `localStorage`.
- **Scroll-reveal** animations (`data-animate="fade-up"`) driven by `resources/js/app.js`.
- A **cPanel/FTP deploy workflow** (`.github/workflows/deploy.yml`) plus an on-demand
  migrate hook (`/_deploy/migrate` and `public/_migrate.php`).

## Getting started

```bash
composer install
npm install
cp .env.example .env
php artisan key:generate
touch database/database.sqlite     # or point DB_DATABASE elsewhere
php artisan migrate --seed
php artisan filament:assets        # publish Filament CSS/JS
npm run dev                        # in another terminal: php artisan serve
```

Create an admin user for Filament:

```bash
php artisan make:filament-user
```

Then visit `/` for the site and `/admin` to log in.

## Make it yours

- **App name:** set `APP_NAME` in `.env` (used across the UI via `config('app.name')`).
- **Brand colours / fonts:** edit the `@theme` block in `resources/css/app.css`.
- **Landing page:** `Modules/Website/resources/views/` (`home.blade.php`, `partials/`).
- **New feature module:** `php artisan module:make Blog` (nwidart/laravel-modules).
- **New admin resource:** `php artisan make:filament-resource Post`.
- **composer.json:** update the `name` field to your own vendor/package.

## Deploying to cPanel (FTP, no SSH)

The bundled workflow builds assets, assembles a `deploy/` tree (Laravel app under
`laravel/`, public root at the top), and uploads it via FTP. Configure these in your
repo settings:

- Secrets: `FTP_SERVER`, `FTP_USERNAME`, `FTP_PASSWORD`, and optionally `DEPLOY_TOKEN`.
- Variable: `DEPLOY_URL` (e.g. `https://your-domain.example`) to auto-run migrations.

Notes for shared hosting: store the SQLite file **outside** the webroot, compile and
commit assets via the workflow, and run migrations through the deploy hook (no
persistent queue workers — use cron with `queue:work --stop-when-empty`).

## Versioning and releases

This template uses [Semantic Versioning](https://semver.org). Each release tracks a
specific set of stable package versions:

| Release | Laravel | Filament | Livewire | Tailwind |
|---|---|---|---|---|
| v1.x | 12.x | 3.x | 3.x | 4.x |

To pick up a specific version:

```bash
# via composer
composer create-project mantle-bearer/goodluck-tall-template my-project "^1.0"

# or clone a tag
git clone --depth 1 --branch v1.0.0 https://github.com/mantle-bearer/goodluck-tall-template my-project
```

See [CHANGELOG.md](CHANGELOG.md) for what changed between releases.
