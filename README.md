# Sales-Management-Web-App

### MySQL
1. create database SalesManagement
2. use SalesManagement
3. update .env to DB_DATABASE=SalesManagement

### Laravel
1. Migration
   1. Create model: _php artisan make:model Sale -m_
   2. Edit migration file and run _php artisan migrate:fresh_
   3. Make factory for seeders test data: _php artisan make:factory Sale_
   4. Add seeds for test data
   5. Refresh migration includes generate test info (seeds): _php artisan migrate:fresh --seed_
