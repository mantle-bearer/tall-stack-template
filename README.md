# TALL Stack Modules Starter

A clean starting point for new projects on the **TALL stack**, with a modular
architecture and a deploy workflow for SSH-less shared hosting (cPanel).

> Use this as a GitHub **template repository**: click **“Use this template”** to
> spin up a new project with this exact setup, then follow the steps below.

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
- **composer.json:** update the `name` field (`your-vendor/...`).

## Deploying to cPanel (FTP, no SSH)

The bundled workflow builds assets, assembles a `deploy/` tree (Laravel app under
`laravel/`, public root at the top), and uploads it via FTP. Configure these in your
repo settings:

- Secrets: `FTP_SERVER`, `FTP_USERNAME`, `FTP_PASSWORD`, and optionally `DEPLOY_TOKEN`.
- Variable: `DEPLOY_URL` (e.g. `https://your-domain.example`) to auto-run migrations.

Notes for shared hosting: store the SQLite file **outside** the webroot, compile and
commit assets via the workflow, and run migrations through the deploy hook (no
persistent queue workers — use cron with `queue:work --stop-when-empty`).
