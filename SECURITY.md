# Security Policy

## Supported versions

This is a project template, so security fixes are applied to the latest `1.x`
release. Older tags are not patched.

| Version | Supported |
|---|---|
| 1.x     | ✅ |
| < 1.0   | ❌ |

## Reporting a vulnerability

Please **do not** open a public issue for security problems. Use one of these
private channels instead:

- **GitHub** — open a private report from the repository's **Security → Report a
  vulnerability** tab. See
  [Privately reporting a security vulnerability](https://docs.github.com/en/code-security/security-advisories/guidance-on-reporting-and-writing-information-about-vulnerabilities/privately-reporting-a-security-vulnerability).
- **Email** — igbokwegoodluck8@gmail.com.

Please include:

- a description of the issue and its impact,
- steps to reproduce (a proof of concept if possible),
- the affected version or commit and any relevant configuration.

You can expect an initial response within **5 business days**. Once confirmed, a
fix will be prepared and released, and you will be credited in the release notes
unless you ask to remain anonymous.

## Scope

Vulnerabilities in the **template's own code** are in scope — in particular the
sample `Modules/Website` code, the Filament admin configuration, and the deploy
hooks (`public/_migrate.php` and the `/_deploy/migrate` endpoint, which are
token-guarded). Vulnerabilities in upstream dependencies (Laravel, Filament,
Livewire, Tailwind, etc.) should be reported to those projects directly.
