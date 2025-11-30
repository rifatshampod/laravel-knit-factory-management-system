# Reports Views

Reporting blades provide drill-downs across orders, allocations, production, receiving, and deliveries.

## Key Templates
- **Order reports**: `orderReport.blade.php`, `orderDelReport*.blade.php`, `orderRecReport*.blade.php`, and `orderProdReport*.blade.php` display order-level stats filtered by body color, print quality, parts, or order number.
- **Allocation report**: `allocationReport.blade.php` shows plan assignments by section with status badges.
- **Delivery & receive**: `allDelivery.blade.php`, `getDateDelivery.blade.php`, `getDateReceive.blade.php`, plus date-specific partials (`dateDelReportData.blade.php`, `dateRecReportData.blade.php`) support order-number or date-range queries.
- **Production**: `productionReport.blade.php`, `getDateProduction.blade.php`, and `dateProdReportData.blade.php` aggregate production progress with date filters.

## Usage
Each report view expects pre-filtered collections from its controller and offers dropdowns or date pickers for user-driven filters. Data tables align with joins configured in controllers like `orderController`, `planController`, `productionController`, and `deliveryController`.
