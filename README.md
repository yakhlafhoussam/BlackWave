# 🌊 BlackWave

BlackWave is a full-stack Laravel web application built around a modular architecture that separates presentation, business logic, and data management. The project is containerized with Docker and uses PostgreSQL as its primary database, providing a consistent development environment across different operating systems.

The application follows Laravel's MVC pattern while organizing features into dedicated controllers, models, middleware, views, and routes to keep the codebase clean, maintainable, and scalable.

---

# Tech Stack

## Backend

* PHP 8.x
* Laravel 12

## Frontend

* Blade
* Vite
* HTML5
* CSS3
* JavaScript

## Database

* PostgreSQL

## Infrastructure

* Docker
* Docker Compose
* Nginx

## Development Tools

* Composer
* Node.js
* npm
* Git

---

# Project Architecture

```
.
├── UML/
│   ├── Usecase.drawio
│   ├── usecase.png
│   └── diagramme de classe.png
│
├── php/
│   └── uploads.ini
│
├── src/
│   ├── app/
│   │   ├── Http/
│   │   │   ├── Controllers/
│   │   │   └── Middleware/
│   │   ├── Mail/
│   │   ├── Models/
│   │   └── Providers/
│   │
│   ├── bootstrap/
│   ├── config/
│   ├── database/
│   │   ├── factories/
│   │   ├── migrations/
│   │   └── seeders/
│   │
│   ├── public/
│   ├── resources/
│   │   ├── css/
│   │   ├── js/
│   │   └── views/
│   │
│   ├── routes/
│   ├── storage/
│   ├── tests/
│   ├── artisan
│   ├── composer.json
│   ├── package.json
│   └── vite.config.js
│
├── Dockerfile
├── docker-compose.yml
└── README.md
```

---

# Request Lifecycle

```
Client
   │
   ▼
Nginx
   │
   ▼
Laravel Router
   │
   ▼
Middleware
   │
   ▼
Controller
   │
   ▼
Model (Eloquent ORM)
   │
   ▼
PostgreSQL
   │
   ▼
Blade View
   │
   ▼
HTTP Response
```

---

# Main Components

## Controllers

The application logic is organized into dedicated controllers responsible for different domains such as:

* Authentication
* Administration
* Community
* Marketplace
* Orders
* Chat
* Posts
* Services
* Profiles
* Invitations
* Password Management

---

## Middleware

Custom middleware handles request filtering and access control, including:

* Authentication checks
* Email verification
* Profile validation
* User status verification
* Ban management
* Administrator authorization

---

## Models

Database entities are represented using Laravel Eloquent models, including:

* User
* Post
* Comment
* Category
* Marketplace
* Order
* Service
* Message
* Rating
* Report
* Invitation
* Like

---

## Database

The project uses Laravel migrations for schema versioning and seeders for populating development data.

---

## Views

The user interface is built with Blade templates and organized into feature-based directories, including:

* Authentication
* Administration
* Marketplace
* Community
* Chat
* Orders
* Profile
* Services

---

# Installation

## Clone the Repository

```bash
git clone https://github.com/<username>/BlackWave.git
cd BlackWave
```

---

## Configure Environment

Copy the environment file.

```bash
cp .env.example src/.env
```

---

## Start Docker

Build the containers.

```bash
docker compose build
```

Start the application.

```bash
docker compose up -d
```

---

## Install PHP Dependencies

```bash
docker compose exec app composer install
```

---

## Install JavaScript Dependencies

```bash
docker compose exec app npm install
```

---

## Generate Application Key

```bash
docker compose exec app php artisan key:generate
```

---

## Run Database Migrations

```bash
docker compose exec app php artisan migrate
```

(Optional)

```bash
docker compose exec app php artisan db:seed
```

---

## Build Frontend Assets

Development:

```bash
docker compose exec app npm run dev
```

Production:

```bash
docker compose exec app npm run build
```

---

# Useful Commands

Clear cache

```bash
php artisan optimize:clear
```

Run migrations

```bash
php artisan migrate
```

Rollback migrations

```bash
php artisan migrate:rollback
```

Run tests

```bash
php artisan test
```

View logs

```bash
docker compose logs -f
```

Stop containers

```bash
docker compose down
```

Rebuild containers

```bash
docker compose down -v
docker compose build --no-cache
docker compose up -d
```

---

# Requirements

* Docker
* Docker Compose
* Git

No local installation of PHP or PostgreSQL is required when using Docker.

---

# Documentation

Project documentation is available in the **UML** directory:

* Use Case Diagram
* Class Diagram
* Draw.io Source Files

---

# License

This project is released for educational and portfolio purposes.
