# Changelog

All notable changes to this template are documented here.

Format follows [Keep a Changelog](https://keepachangelog.com/en/1.0.0/).
Versioning follows [Semantic Versioning](https://semver.org/spec/v2.0.0.html).

A **major version bump** means a breaking change in the stack (e.g. Laravel 13, Filament v4).
A **minor version bump** adds features or updates dependencies within the same major stack versions.
A **patch** fixes bugs or docs.

---

## [Unreleased]

---

## [1.0.0] — 2026-05-22

### Stack
- Laravel 12 (PHP 8.2+)
- Filament v3
- Livewire v3 (Alpine.js bundled)
- Tailwind CSS v4 (CSS-first `@theme`)
- nwidart/laravel-modules ^11

### Added
- `Modules/Website` — neutral public landing page with dark-mode header, footer, scroll-to-top
- Class-based dark mode — no flash, `localStorage` persistence, Alpine toggle
- Scroll-reveal animations (`data-animate` + IntersectionObserver)
- Filament admin panel at `/admin` — Indigo theme, database notifications, password reset
- cPanel/FTP deploy workflow (`.github/workflows/deploy.yml`)
- On-demand migrate hook (`/_deploy/migrate` + `public/_migrate.php`)
- Custom nwidart stubs in `stubs/nwidart-stubs/`
- Pest test suite with `withoutVite()` base — 7 passing tests out of the box
