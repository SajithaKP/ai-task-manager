Installation

Clone the repository

git clone <repo-url>
cd ai-task-manager

Install dependencies

composer install

Copy environment file

cp .env.example .env

Generate application key

php artisan key:generate
Database Setup

Update database credentials in .env

Example:

DB_DATABASE=ai_task_manager
DB_USERNAME=root
DB_PASSWORD=

Run migrations and seeders

php artisan migrate --seed
Frontend Setup

Install node modules

npm install

Run development build

npm run dev
Run Application

Start Laravel server

php artisan serve

Application URL:

http://127.0.0.1:8000
Default Users

Admin

email: admin@test.com
password: password

User

email: user@test.com
password: password
API Endpoints
GET    /api/tasks
POST   /api/tasks
PATCH  /api/tasks/{id}/status
GET    /api/tasks/{id}/ai-summary