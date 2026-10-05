# Baaku

## Seeding

Set up a fresh database with one command:

```bash
php artisan db:seed
```

This seeds committee positions, roles + permissions, and the admin user
(from `ADMIN_*` env / `config('app.seeder.*')`). Every seeder is
idempotent — safe to re-run.

### Individual commands

| Command | Seeds |
|---|---|
| `php artisan positions:seed` | Committee positions |
| `php artisan permissions:seed` | Permissions (built-in + `config('auth.permissions')`) |
| `php artisan roles:seed` | Roles + grants (ensures permissions exist first) |
| `php artisan admin:seed` | The admin user and assigns the `admin` role |
| `php artisan dev:seed` | Local-only dev user (refuses to run outside `local`) |

> `members:seed` was removed — use `roles:seed` + `admin:seed` (or just `db:seed`).
