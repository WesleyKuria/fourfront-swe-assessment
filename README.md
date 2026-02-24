# FourFront Money Tracker Assessment

This repository contains my submission for the FourFront Software Engineering assessment. 
The project is split into two directories: a vanilla frontend UI and a Laravel API backend.

## My Process and Learnings

Coming from a background primarily in Java and Spring Boot, this assessment was an exciting opportunity to dive headfirst into PHP and Laravel. I purposely chose to build the backend in Laravel to strictly meet the assessment requirements and prove my ability to pick up new frameworks quickly.

**Key takeaways from this build:**
* **Environment Configuration:** I learned a lot about the nuances of Windows PHP environments. I had to manually configure `php.ini` to enable a few extensions like `fileinfo` and `zip` to get Composer working and enable the `pdo_sqlite` drivers so Laravel could talk to the database.
* **Eloquent ORM vs. Spring Data:** It was interesting to map my knowledge of Spring's repository patterns to Laravel's Eloquent ORM. I specifically used Laravel "Accessors" to handle the core business logic. Instead of writing complex SQL queries
* **API Testing:** I used **Insomnia** throughout the development process to test the routing

## Features hre

* **User Accounts:**  account creation and profile fetching.
* **Multiple Wallets:** Users can create multiple wallets from their ID.
* **Transaction Math:** Transactions are strictly validated as `income` or `expense`. 
* **Automated Balances:** The API automatically calculates and returns individual wallet balances and a `total_balance` 

## Tech Stack Used

* **Frontend:** HTML, CSS, JavaScript
* **Backend:** PHP 8.4, Laravel 12
* **Database:** SQLite for easy testing with the limited time I had for the assesment
* **Tools:** Composer, Git, Insomnia< (insomnia was for enpoint testing)

## How to Run This Locally

### 1. Frontend
Navigate into the `frontend/` directory and open `index.html` in any web browser. 

### 2. Backend API
Have PHP 8.4+ and Composer installed. Navigate into the `backend/` directory and run:

```bash
# Install the required PHP packages
composer install

# Copy the environment file
cp .env.example .env

# Generate the app security key
php artisan key:generate

# Build the SQLite database and tables
php artisan migrate

# Start the local server
php artisan serve
```
The API will run locally at http://127.0.0.1:8000. 
You can use tools like Postman or Insomnia to hit the /api/users, /api/wallets, and /api/transactions endpoints.
I used insomnia for clean and good testing.
