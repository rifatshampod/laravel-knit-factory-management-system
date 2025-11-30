# Views Overview

Blade templates render dashboards, CRUD workflows, and reporting pages for authenticated users.

## Key Areas
- **Layouts**: `layouts/app.blade.php` provides the base shell, while `components/header.blade.php` and `components/navigation.blade.php` render shared chrome.
- **Dashboard**: `index.blade.php` visualizes counts and recent production joins supplied by `dashboardController`.
- **Orders & Planning**: `createOrder.blade.php`, `allOrder.blade.php`, `createPlan.blade.php`, and `allPlan.blade.php` capture and summarize intake and allocation data.
- **Production & Delivery**: Templates such as `dailyProduction.blade.php`, `dayWiseProduction.blade.php`, `allProduction.blade.php`, `createDelivery.blade.php`, `allDelivery.blade.php`, `allDailyDelivery.blade.php`, and `allReceive.blade.php` manage updates and listings.
- **Settings & Users**: Views under `settings/` plus `allUsers.blade.php` support master data and user administration.
- **Reports**: The `report/` directory hosts specialized reporting blades (see its README for details).
- **Auth**: `auth/` templates and `login.blade.php`/`signup.blade.php` provide authentication flows.

## Usage
Controllers supply datasets to these views (often via joins and dropdown collections). JavaScript-driven forms post back to controller routes for CRUD actions, while report views consume filtered collections.
