# Database Migrations

These migrations define the schema for orders, planning, production, delivery, and supporting master data.

## Key Tables
- **orders**: Stores intake details including artwork path, styling attributes, quantities, supplier/merchandiser references, and pricing.
- **plans**: Connects orders to production sections with targets (`target_day`, `target_perday`) and schedule windows.
- **productions / daily_productions**: Persist cumulative and per-day production stats with balances.
- **deliveries / daily_deliveries / receives**: Track receive balances, daily delivery adjustments, and receipt entries per order.
- **Master data**: `merchandisers`, `suppliers`, `body_colors`, `print_qualities`, `parts_names`, `sections` feed dropdowns and filters.
- **Auth/support**: Standard `users`, `password_resets`, and `failed_jobs` tables from Laravel scaffolding.

## Usage
Run `php artisan migrate` to create the schema. Controllers rely on these tables for joins and reporting; altering field names requires updating related controllers and Blade templates.
