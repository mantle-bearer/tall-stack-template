# Contributing

Thanks for your interest in improving the **TALL Stack Modules Starter**! This
document explains how to set up the project, the conventions we follow, and how
releases are cut.

By participating you agree to abide by our [Code of Conduct](CODE_OF_CONDUCT.md).

## Ways to contribute

- 🐛 **Report a bug** — open a [bug report](https://github.com/mantle-bearer/tall-stack-template/issues/new?template=bug_report.yml).
- 💡 **Suggest a feature** — open a [feature request](https://github.com/mantle-bearer/tall-stack-template/issues/new?template=feature_request.yml).
- 📝 **Improve docs** — typos and clarifications are very welcome.
- 🔧 **Send a pull request** — see the workflow below.

For **security issues**, do not open a public issue — see [SECURITY.md](SECURITY.md).

## Local setup

**Requirements:** PHP 8.2+, Composer, Node 18+.

```bash
git clone https://github.com/mantle-bearer/tall-stack-template
cd tall-stack-template

composer install
npm install
cp .env.example .env
php artisan key:generate
touch database/database.sqlite     # or point DB_DATABASE elsewhere
php artisan migrate
php artisan filament:assets

# run the app (two terminals, or use the combined script)
npm run dev                        # Vite
php artisan serve                  # app at http://localhost:8000
```

There is also a one-shot `composer setup` script and a `composer dev` script that
runs the server, queue, logs, and Vite together.

Create an admin user to log in at `/admin`:

```bash
php artisan make:filament-user
```

## Project conventions

A few stack-specific gotchas (see [CLAUDE.md](CLAUDE.md) for the full list):

- **Tailwind v4 is CSS-first** — there is no `tailwind.config.js`. Design tokens
  live in the `@theme` block in `resources/css/app.css`.
- **Alpine.js ships bundled with Livewire v3** — never install/import it separately.
- **Feature code lives in modules** under `Modules/` (`php artisan module:make <Name>`).
- **Filament** auto-discovers resources/pages/widgets under `app/Filament/`.

## Code style

We use [Laravel Pint](https://laravel.com/docs/pint). CI runs `pint --test` and
will fail on unformatted code, so run it before committing:

```bash
vendor/bin/pint           # auto-fix
vendor/bin/pint --test    # check only (what CI runs)
```

## Tests

The suite uses [Pest](https://pestphp.com) with a `withoutVite()` base so no asset
build is required.

```bash
php artisan test          # or: composer test
```

Please add or update tests for any behavioural change.

## Commit messages — Conventional Commits

This repo follows [**Conventional Commits**](https://www.conventionalcommits.org).
This is **not optional**: our automated release tooling derives the next version
number and the changelog directly from your commit messages.

Format: `type(optional scope): short description`

| Type | When to use | Version impact |
|---|---|---|
| `feat` | A new feature | **minor** bump (1.0.0 → 1.1.0) |
| `fix` | A bug fix | **patch** bump (1.0.0 → 1.0.1) |
| `deps` | Stack/dependency upgrade | patch/minor (judgement) |
| `perf` | Performance improvement | patch |
| `docs` | Documentation only | none |
| `refactor` | Code change, no behaviour change | none |
| `test` | Adding/adjusting tests | none |
| `chore`, `ci`, `build`, `style` | Tooling / housekeeping | none |

A **breaking change** triggers a **major** bump (1.x → 2.0.0). Signal it with a
`!` after the type, or a `BREAKING CHANGE:` footer:

```
feat!: drop PHP 8.2 support

BREAKING CHANGE: the template now requires PHP 8.3+.
```

Examples:

```
feat(auth): add custom branded login page
fix(website): correct dark-mode flash on first paint
deps: bump Filament to v3.3
docs: clarify cPanel deploy steps
```

## Pull request workflow

1. **Fork** and create a branch from `main` (e.g. `feat/my-thing`, `fix/that-bug`).
2. Make your change, keeping commits Conventional.
3. Run `vendor/bin/pint` and `php artisan test` locally.
4. Open a PR against `main` and fill in the template.
5. CI (tests + Pint) must pass; a maintainer will review.

Keep PRs focused — one logical change per PR is easiest to review.

## How releases work (for maintainers)

Releases are automated with
[release-please](https://github.com/googleapis/release-please-action):

1. As Conventional-Commit PRs land on `main`, release-please opens (and keeps
   updating) a **release PR** titled `chore: release vX.Y.Z`. It bumps the
   version in `CHANGELOG.md` and `.release-please-manifest.json` based on the
   commits since the last release.
2. **Merging that release PR** is what publishes a version: release-please creates
   the `vX.Y.Z` git tag and a GitHub Release with the generated notes.
3. [Packagist](https://packagist.org) picks up the new tag for
   `composer create-project` users.

So nothing is released until you merge the release PR — and the version number is
chosen for you from the commit history (you can still edit it in that PR if needed).
