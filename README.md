<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>
<p align="center"><a href="https://laravel.com" target="_blank"><img src="front/assets/images/home-img.png" width="400"></a></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## Minimum Requirements

- PHP 7.3+
- Composer 2.0+
- MySQL 5.7+
- Laravel 8.0

## How to install
- Step 1: Clone the repository
https://github.com/riktasiddique/onlineShop.git

- Step 2: Install Laravel
 Composer install

- Step 3: Run the migration( follow the order)
    i) Migrate and seed the base tables (Needed only once)
    php artisan migrate --seed


- Step 4: To add payment gateway
 For SSl - Add your Store_Id and Store_Password
 For Stripe - Add your STRIPE_SECRET

- Step 5: To contact with mail form
(follow the order)
MAIL_MAILER=smtp
MAIL_HOST=smtp.googlemail.com
MAIL_PORT=465
MAIL_USERNAME= Your mail address
MAIL_PASSWORD=Your mail password
MAIL_ENCRYPTION=ssl
MAIL_FROM_ADDRESS= Your mail address
MAIL_FROM_NAME="${APP_NAME}"

## About This Project

This is a web-based E-Commerce Project. From here buyer can buy Grocery products. Any valid user can register here to buy any products. We have an dashboard panel to control this site. Users have three roles which is:
- Customer
- Admin
- Super Admin

## Customer: 
They can purchase any product from this site and also can add any product to cart and also can select product to wishlist so thay can purchase in future.

## Admin an Super Admin: 
They can block or unblock any user and also can change user role at any time but they can not able to change itself. Admin have an limit that they can not be able to change Super Admins role.

## Feature
- Change role and Block any user: To control all users we have some admin and
super admin users. They can change users??? roles at any time but they can???t change
their roles and we have a block or unblock option. If any user does something
wrong instantly we can block the user. After blocking any user they can be able
to see some pages. Like if we block any admin or super-admin they can???t be able
to visit the dashboard page and if he or she is a seller she can???t be able to post an
ad.

- Update and delete a product: Sellers who posted a product to sell they can be able to update and delete their posted product at any time.

- Search option: Our system has a search box by using this you can search prod-
ucts by using product name, price, product category name.

- User unique email validation: Another important feature in our system is using a
valid and unique email address. This means you can not be able to register in our
system if you are already registered with existing mail address.

- Payment Gateway: Using this site you can pay payment. We have three types of payment category which is:
i) Cash on delivery
ii) National Payment
iii) International Paymet system

## Software Requirement
I have used those languages to create this project.

Front-End
- HTML
- CSS
- Java Scripts

Back-End: 
- PHP
- Laravel-Framework : 8
- Mysql