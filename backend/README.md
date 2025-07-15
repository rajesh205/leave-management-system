# Leave Management System Backend (Laravel)

## Setup Instructions

1. Clone this repo and go to backend directory:

   ```bash
   cd backend
   ```

2. Install PHP dependencies:

   ```bash
   composer install
   ```

3. Copy `.env` file and configure your database:

   ```bash
   cp .env.example .env
   ```

4. Set MySQL credentials in `.env`.

5. Run migrations:

   ```bash
   php artisan migrate
   ```

6. Start the development server:

   ```bash
   php artisan serve
   ```

---

API Endpoints available at `/api/employees` and `/api/leave-requests`.
