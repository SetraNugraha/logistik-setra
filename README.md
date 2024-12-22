
# Logistik Setra

## Tech 

```bash
  Laravel, TailwindCSS, DaisyUI, Sweetalert2
```
## Run Locally

Clone the project

```bash
  git clone https://github.com/SetraNugraha/logistik-setra
```

Go to the project directory

```bash
  cd my-project
```

Setup database

```bash
Create Schema on MySQL,

make file .env on root, then copy all on .env.example to .env

setup .env :
DB_CONNECTION=mysql
DB_HOST=host
DB_PORT=port
DB_DATABASE=your-db
DB_USERNAME=username
DB_PASSWORD=password
```

Install dependencies

```bash
composer install
npm install
php artisan key:generate
php artisan migrate
```

Start the server

```bash
make 2 terminal and run :
php artisan serve
npm run dev
```

