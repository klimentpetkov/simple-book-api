## Simple Book App

### Setup

#### Backend
```bash
composer install
cp .env.example .env
php artisan key:generate
```
Into ```.env``` file enter
DB credentials
Mail Settings for e.g. mailtrap

```bash
php artisan migrate
php artisan db:seed
```

Prepare storage link
```bash
php artisan storage:link
```

For mass readers notifications to work run
```bash
php artisan queue:work
```

#### Frontend:
```bash
npm install
npm run dev
```

### To start the app run
```bash
php artisan serve
```

### Functionality notes
Only author can do publish or delete a book.
One author can't manipulate other author`s books
All readers can only view.
