# Routes

Routing binds authenticated web requests to controller actions for dashboards, CRUD operations, and reporting.

## Key Files
- **web.php**: Primary route map under `web` and `auth` middleware. Covers orders, plans, production, deliveries/receives, reports (order/allocation/production/delivery), settings, and user admin.
- **api.php**: Reserved for API endpoints (empty by default).
- **channels.php**: Broadcast channel definitions (default Laravel scaffold).
- **console.php**: Closure-based Artisan commands (default scaffold).

## Usage
Modify `web.php` when adding new pages or actions. Controllers assume route names like `add-order`, `update-plan`, `order-production-report`, and date-based report paths for forms and links in Blade templates.
