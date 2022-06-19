# Laravel Project

# Installation

- `composer install`
- `php artisan key:generate`
- `cp .env.example .env`
- `php artisan migrate --seed`
- `php artisan serve`

## Features to implement

### Routing Advanced

- [X] Route Model Binding in Resource Controllers
- [X] Route Redirect - homepage should automatically redirect to the login form

### Database Advanced

- [ ] Database Seeders and Factories - to automatically create first clients/projects/tasks and default users
- [ ] Eloquent Query Scopes - show only active clients, for example
- [ ] Polymorphic relationships with Spatie Media Library package
- [ ] Eloquent Accessors and Mutators - view all date values in m/d/Y format
- [ ] Soft Deletes on any Eloquent models

### Auth Advanced

- [ ] Authorization: Roles/Permissions (admin and simple users), Gates, Policies with Spatie Permissions package
- [ ] Authentication: Email Verification

### API Basics

- [ ] API Routes and Controllers
- [ ] API Eloquent Resources
- [ ] API Auth with Sanctum
- [ ] Override API Error Handling and Status Codes

### Debugging Errors

- [ ] Try-Catch and Laravel Exceptions
- [ ] Customizing Error Pages

### Sending Email

- [ ] Mailables and Mail Facade
- [ ] Notifications System: Email

### Extra

- [ ] Automated Tests for CRUD Operations