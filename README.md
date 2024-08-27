
## Minimum system requirements

- PHP >= 8.1
- Laravel 10

## How to run the application
Below are the steps you need to successfully setup and run the application.

- Clone the app from the repository and cd into the root directory of the app

- Run `composer install`
- Copy `.env.example into .env`
- Update DB credentials to match with your db
- Run `php artisan migrate`
- Run  `php artisan db:seed` 
- Run `php  artisan serve`



## Explanation
 To optimize performance, I used the following approaches:
 - Eager Loading: I used with('orders.items') to eager load the related orders and items, reducing the number of database queries.
 - Conditional Query Building: I used the when method to conditionally add query constraints, avoiding unnecessary database calls.
 - Query Optimization: I used whereHas to filter customers based on related models, reducing the number of database queries.


 This implementation efficiently searches customers based on the provided criteria, leveraging Eloquent relationships and query optimization techniques to minimize database queries and ensure scalability.