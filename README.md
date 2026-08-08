# Khaier API

**Khaier** is a RESTful API backend for a charity donation platform built with Laravel 9. It bridges the gap between donors and charitable organizations, enabling donors to easily discover, support, and track fundraising cases — all through a simple and accessible API.

---

## 🛠 Tech Stack

- **PHP** 8.1+
- **Laravel** 9
- **Laravel Passport** – OAuth2 API authentication
- **Stripe** – Payment processing

---

## ✨ Features

- **User Authentication** – Register, login, logout, phone number verification, and password reset
- **Charities** – Browse and view charity organizations with their active, urgent, and completed cases
- **Cases** – View and search donation cases by category, with progress tracking
- **Donations** – Make donations to cases and view donation history
- **Bookmarks** – Bookmark favourite charities and cases
- **Profile Management** – View and update user profile information and password
- **Admin Controls** – Admin-only routes for adding charities and creating cases
- **Payments** – Stripe-powered card payment processing

---
## 📁 Project Structure

app/
├── Http/
│   ├── Controllers/
│   │   ├── authentication/        # Login, Signup, Phone Verification
│   │   ├── CharityController.php
│   │   ├── MyCaseController.php
│   │   ├── DonationController.php
│   │   ├── CategoryController.php
│   │   ├── CaseBookmarksController.php
│   │   ├── CharityBookmarksController.php
│   │   ├── ProfileController.php
│   │   ├── StripePaymentController.php
│   │   └── homeController.php
│   ├── Requests/                  # Form request validation
│   └── Resources/                 # API resource transformers
├── Models/
│   ├── User.php
│   ├── charity.php
│   ├── my_case.php
│   ├── category.php
│   ├── donation.php
│   ├── MyCaseBookmarks.php
│   ├── CharityBookmarks.php
│   └── ...
├── Policies/                      # Authorization policies
└── Providers/

routes/
├── api.php                        # All API routes
└── ...
---

## 🔌 API Endpoints

### Public (Guest)

| Method | Endpoint | Description |
|--------|----------|-------------|
| `POST` | `/api/Verify_phone_signup` | Verify phone number for registration |
| `GET`  | `/api/signup` | Get cities and districts for registration form |
| `POST` | `/api/signup` | Register a new user |
| `POST` | `/api/login` | Login and receive access token |
| `POST` | `/api/Verify_phone_forgetPassword` | Verify phone for password reset |
| `POST` | `/api/update_password` | Reset password |

### Authenticated (Requires Bearer Token)

| Method | Endpoint | Description |
|--------|----------|-------------|
| `POST` | `/api/logout` | Logout and revoke token |
| `GET`  | `/api/home` | Home feed |
| `GET`  | `/api/categories` | List all categories |
| `GET/POST/PUT/DELETE` | `/api/charities` | CRUD for charities |
| `GET`  | `/api/bookmarks/charities` | List bookmarked charities |
| `POST` | `/api/bookmarks/charities` | Bookmark a charity |
| `GET/POST/PUT/DELETE` | `/api/my_cases` | CRUD for donation cases |
| `GET`  | `/api/bookmarks/cases` | List bookmarked cases |
| `POST` | `/api/bookmarks/cases` | Bookmark a case |
| `GET`  | `/api/profile` | View user profile |
| `GET`  | `/api/profile/edit` | Get profile edit form data |
| `POST` | `/api/profile/update/{user}` | Update profile |
| `POST` | `/api/profile/update/password/{user}` | Update password |
| `DELETE` | `/api/profile/delete/{user}` | Delete account |
| `POST` | `/api/donation/{case}` | Make a donation to a case |
| `GET`  | `/api/donation/old/cases` | View past donations |
| `GET`  | `/api/donation/details` | View donation details |
| `POST` | `/api/payment/{id}` | Process a Stripe payment |

### Admin Only

| Method | Endpoint | Description |
|--------|----------|-------------|
| `POST` | `/api/charity/add` | Add a new charity |
| `POST` | `/api/charity/{charity}/addcase` | Add a case to a charity |

---

## ⚙️ Installation & Setup

### Prerequisites

- PHP 8.1+
- Composer
- MySQL (or compatible database)
- A [Stripe](https://stripe.com) account

### Steps

1. **Clone the repository:**
   ```bash
   git clone <repository-url>
   cd khaier
   ```

2. **Install dependencies:**
   ```bash
   composer install
   ```

3. **Configure environment:**
   ```bash
   cp .env.example .env
   php artisan key:generate
   ```
   Update your `.env` file with your database credentials and Stripe secret key:
   ```env
   DB_DATABASE=khaier
   DB_USERNAME=your_db_user
   DB_PASSWORD=your_db_password

   stripe_secret=your_stripe_secret_key
   ```

4. **Run migrations and seeders:**
   ```bash
   php artisan migrate --seed
   ```

5. **Install Laravel Passport:**
   ```bash
   php artisan passport:install
   ```

6. **Link storage:**
   ```bash
   php artisan storage:link
   ```

7. **Start the server:**
   ```bash
   php artisan serve
   ```

---

## 🔐 Authentication

This API uses **Laravel Passport** (OAuth2). After logging in or registering, you will receive an `access_token`. Include it in all authenticated requests as a Bearer token:
├── authentication/                # Login, Signup, Phone Verification
│   ├── CharityController.php
│   ├── MyCaseController.php
│   ├── DonationController.php
│   ├── CategoryController.php
│   ├── CaseBookmarksController.php
│   ├── CharityBookmarksController.php
│   ├── ProfileController.php
│   ├── StripePaymentController.php
│   └── homeController.php
├── Requests/                      # Form request validation
└── Resources/                     # API resource transformers

Models/
├── User.php
├── charity.php
├── my_case.php
├── category.php
├── donation.php
├── MyCaseBookmarks.php
├── CharityBookmarks.php
└── ...

Policies/                          # Authorization policies
Providers/

routes/
├── api.php                        # All API routes
└── ...
