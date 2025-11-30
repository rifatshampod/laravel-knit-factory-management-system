<div align="center">
  <h1>Laravel Knit Factory Management System</h1>
  <p><strong>Plan, track, and report every stitch from order intake to delivery.</strong></p>

  <p>
    <img src="https://img.shields.io/badge/stack-Laravel%208%20%7C%20PHP%207.3%20%7C%20Bootstrap%205-red?style=for-the-badge" alt="Tech Stack" />
    <img src="https://img.shields.io/badge/status-active-success?style=for-the-badge" alt="Project Status" />
    <img src="https://img.shields.io/badge/version-1.0.0-blue?style=for-the-badge" alt="Version" />
    <img src="https://img.shields.io/badge/license-MIT-lightgrey?style=for-the-badge" alt="License" />
  </p>
</div>

## Introduction
This application streamlines order allocation, production tracking, and delivery reporting for knitwear factories. It captures orders with artwork, allocates them to production sections, monitors daily output and deliveries, and surfaces reports for allocation, production, and logistics.

## Features
- 🎯 **Order lifecycle control**: Capture orders with body colors, print qualities, and parts; attach artwork; and track supplier/merchandiser details.
- 🗂️ **Production planning**: Allocate orders to sections, set daily targets, and spin up production records automatically.
- 📈 **Performance dashboards**: Summaries for orders, plans, production, and delivery balances on the landing dashboard.
- 📦 **Delivery & receiving flows**: Track receiving balances, daily deliveries, and adjustments for in-hand stock.
- 📊 **Reporting suite**: Order, allocation, production, and delivery reports with filters by section, body color, print quality, parts, order number, and date.
- 👥 **User & settings admin**: Manage users plus master data such as merchandisers, suppliers, sections, colors, print qualities, and parts.

## Use Cases & Examples
- **Planner creating a new allocation**: Capture an order with artwork, then schedule production with target days and per-day throughput to generate a production record automatically.
- **Production lead entering daily output**: Navigate to daily production, log in-hand stock, today’s production, and remaining balance to keep the dashboard current.
- **Logistics team delivering by order**: Filter delivery reports by order number or date range to reconcile delivered quantities against receive balances.

## Tech Stack
- **Backend**: PHP 7.3+, Laravel 8 framework, Laravel UI auth scaffolding, Eloquent ORM.
- **Frontend**: Blade templates, Bootstrap 5 UI toolkit, Laravel Mix build pipeline.
- **Tooling**: Composer for PHP dependencies; NPM with Laravel Mix/Sass for assets; PHPUnit for testing.

## Getting Started
### Prerequisites
- PHP 7.3+ with Composer
- Node.js 12+ and NPM
- MySQL-compatible database

### Installation
```bash
# Install PHP dependencies
composer install

# Install JS dependencies
npm install

# Environment
cp .env.example .env
php artisan key:generate

# Configure DB credentials in .env, then run migrations and seeders
php artisan migrate --seed

# Build assets (optional during development)
npm run dev
```

### Configuration
Key environment values:
```env
APP_NAME="Knit Factory Management"
APP_ENV=local
APP_KEY=base64:generated-key
APP_DEBUG=true
APP_URL=http://localhost

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=knit_factory
DB_USERNAME=root
DB_PASSWORD=secret
```

## Project Structure
```
app/
  Http/Controllers/    # Order, plan, production, delivery, settings, user flows
  Models/              # Eloquent models for orders, plans, production, deliveries, master data
resources/views/       # Blade templates for dashboard, CRUD screens, and reports
routes/web.php         # Authenticated web routes mapping to controllers
database/migrations/   # Schema definitions for operational and master data tables
database/seeders/      # Seed data for admin user bootstrap
public/                # Public assets and uploaded artwork
```

## Contributing
1. Fork the repository and create a feature branch.
2. Follow PSR-12 for PHP code and keep Blade templates semantic and Bootstrap-friendly.
3. Add or update tests where applicable.
4. Submit a pull request describing the change and how to validate it.

## License
This project is licensed under the MIT License. See `LICENSE` or the header of `composer.json` for details.
