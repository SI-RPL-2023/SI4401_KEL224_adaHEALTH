# adaHEALTH

adaHEALTH is an health app. This project built with PHP framework named [Laravel](https://laravel.com/docs/10.x/installation). This project is a part of Software Engineering course in [Telkom University](https://telkomuniversity.ac.id).

## Repository Structure

The repository is structured as follows:

-   `main` is main branch of the repository and contains the latest stable version of the code.
-   `development` is the development branch of the repository and contains the latest development version of the code.
-   `feature/feature_name` branches are used to develop new features and are merged into `development` when they are ready.
-   commits formatted as ure`feat/feat_name` are used to fix bugs in the code and are merged into `development` when they are ready.

## Installation

### Prerequisites

-   Composer
-   PHP >= 7.3
-   XAMPP or WAMP

### Running the application

_Copy this command on your terminal or git bash_

Clone project from github

```bash
git clone https://github.com/SI-RPL-2023/SI4401_KEL224_adaHEALTH.git
```

-   copy the .env.example file to .env

```bash
cp .env.example .env
```

-   change the database name in the .env file

```bash
DB_PORT=your_mysql_port
DB_DATABASE=your_database_name
```

-   Install Composer

```bash
composer install
```

-   Generate Key

```bash
php artisan key:generate
```

-   migrate database

```bash
php artisan migrate
```

-   link storage

```bash
php artisan storage:link
```

-  seed database

```bash
php artisan db:seed --class=UserSeeder
```

-   run the server

```bash
php artisan serve
```

**Note: dont forget to run XAMPP or WAMP first**