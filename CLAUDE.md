# Project Context (TALL Stack Modules Starter)

> Conventions and gotchas for this stack. Read before generating code.

## Stack
Laravel 12 (PHP 8.2+) · Filament v3 · Livewire v3 · Alpine.js v3 · Tailwind CSS v4,
with `nwidart/laravel-modules`. Default DB is SQLite.

## Conventions & gotchas
- **Tailwind v4 is CSS-first.** There is no `tailwind.config.js`. Define design
  tokens in the `@theme` block in `resources/css/app.css`. Brand colours are
  `--color-brand*` / `--color-accent*` → use `bg-brand`, `text-accent`, etc.
- **Alpine.js ships bundled with Livewire v3.** Do NOT install or import Alpine
  separately, or you'll get duplicate-instance errors.
- **Filament v3** auto-discovers Resources/Pages/Widgets under `app/Filament/`.
  After upgrading Filament, run `php artisan filament:assets`. Admin panel is at
  `/admin`; config in `app/Providers/Filament/AdminPanelProvider.php`.
- **Feature code lives in modules** under `Modules/` (e.g. `Modules/Website`).
  Create one with `php artisan module:make <Name>`; toggle in `modules_statuses.json`.
- **Dark mode** is class-based (`.dark` on `<html>`), set before CSS loads to avoid
  a flash, and persisted under the `theme` localStorage key.

## Deploying to shared hosting (cPanel, no SSH)
- Store the SQLite DB **outside** the webroot; set `DB_DATABASE` to an absolute path.
- Compile assets in CI and deploy via FTP (`.github/workflows/deploy.yml`).
- No persistent queue workers — use cron with `queue:work --stop-when-empty`.
- Run migrations through the deploy hook: `POST /_deploy/migrate` with the
  `X-Deploy-Token` header, or `public/_migrate.php?token=...` (token = `DEPLOY_TOKEN`).
