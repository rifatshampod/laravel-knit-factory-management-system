# Models Overview

Eloquent models define the operational and master data used across planning, production, delivery, and reporting flows.

## Key Models
- **Order**: Core order intake (style, order number, artwork path, body color, print quality, parts, quantities, supplier/merchandiser, pricing).
- **Plan**: Allocation details per order with section assignment, production start/end, target days, and per-day targets.
- **Production / Daily_production**: Current production status (in-hand, today’s production, totals, balances) plus per-day breakdowns.
- **Delivery / Daily_delivery / Receive**: Tracks receive balances, daily deliveries, and receipt adjustments tied back to orders.
- **Master data**: `Body_color`, `Print_quality`, `Parts_name`, `Merchandiser`, `Supplier`, `Section` supply dropdowns and reporting filters.
- **User**: Extends Laravel’s user model for authenticated access.

## Usage
Controllers query and join these models to populate dashboards, CRUD pages, and reports. Migrations in `database/migrations` maintain the backing schema, and seeders provide initial user records.
