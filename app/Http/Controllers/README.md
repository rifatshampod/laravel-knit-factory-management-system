# Controllers Overview

This folder orchestrates every workflow in the Knit Factory Management System, from intake to reporting. Controllers join Eloquent models with Blade views, perform validations, and return JSON for AJAX-powered edits.

## Key Components
- **dashboardController**: Aggregates counts for orders, plans, production, and delivery balances for the landing dashboard.
- **orderController**: Captures orders, uploads artwork, seeds master data on-the-fly (colors, parts, merchandisers, suppliers), and exposes reporting filters by attributes such as body color, print quality, and parts.
- **planController**: Generates allocations by joining orders to sections, sets production targets, and spawns initial production rows once a plan is activated.
- **productionController**: Manages production updates (in-hand stock, daily production, balances) and exposes date/order filtered production reports.
- **deliveryController**: Handles receiving balances, daily delivery adjustments, and delivery/receive reports by order number or date ranges.
- **settingsController**: CRUD for master data—merchandisers, suppliers, body colors, print qualities, parts, and sections—with soft business rules in controller logic.
- **userController**: Administers user accounts, including creation, editing, and deletion.
- **Auth controllers**: Laravel UI scaffolding for authentication flows (login, password reset, verification).

## Usage
Routes in `routes/web.php` bind to these controllers under the `web` and `auth` middleware group. AJAX edit endpoints return JSON payloads, while create/edit screens render Blade templates with dropdown data sourced here.
