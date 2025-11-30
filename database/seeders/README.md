# Seeders

Seeders bootstrap essential data for development and testing.

## Key Seeders
- **CreateUsersSeeder**: Inserts initial user records for authentication.
- **DatabaseSeeder**: Entry point that invokes `CreateUsersSeeder` and can be extended with additional seeds as master data grows.

## Usage
After configuring `.env`, run `php artisan db:seed` or `php artisan migrate --seed` to populate starter accounts. Add new seeders here when introducing baseline master data (e.g., sections or merchandisers).
