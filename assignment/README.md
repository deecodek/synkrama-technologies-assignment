## Setup Guide

### 1. Install Dependencies

```bash
composer install
npm install
```

### 2. Environment Setup

```bash
cp .env.example .env
php artisan key:generate
```


```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=assignment
DB_USERNAME=your_username
DB_PASSWORD=your_password
```

### 3. Run Migrations & Seeders

```bash
php artisan migrate:fresh --seed
```



### 4. Start the Application

```bash
php artisan serve
```
