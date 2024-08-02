## Project Setup

### Prerequisites

Ensure you have the following installed on your system:

- PHP (>= 8.0)
- Composer
- Node.js and npm

### Installation
#### 1. Clone the repository:
<pre>git clone https://github.com/thabo-moyo97/task_management_system.git </pre>

#### 2. Composer install:
<pre>composer install </pre>

#### 3. npm install:
<pre>npm install </pre>

#### 4. setup environment file:
<pre>cp .env.example .env && php artisan key:generate</pre>

#### 5. Set up docker with sail:
<pre>./vendor/bin/sail up</pre>

#### 6. Migration and seed the database:
<pre>./vendor/bin/sail artisan migrate --seed</pre>

#### 7. Run the application:
<pre>npm run dev</pre>

#### 8. Visit the application:
<pre>http://localhost/login</pre>

#### 9. Login credentials:
<pre>
email: test@example.com
password: password
</pre>

### Testing
#### 1. Run the tests:
<pre>./vendor/bin/sail artisan test test/Feature</pre>