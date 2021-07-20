<p align="center"><img src="/public/logo.svg" alt="Logo Laravel Sanctum"></p>

<p align="center">
<a href="https://github.com/laravel/sanctum/actions"><img src="https://github.com/laravel/sanctum/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/sanctum"><img src="https://img.shields.io/packagist/dt/laravel/sanctum" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/sanctum"><img src="https://img.shields.io/packagist/v/laravel/sanctum" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/sanctum"><img src="https://img.shields.io/packagist/l/laravel/sanctum" alt="License"></a>
</p>

Laravel Sanctum provides a featherweight authentication system for SPAs (single page applications), mobile applications, and simple, token based APIs. Sanctum allows each user of your application to generate multiple API tokens for their account. These tokens may be granted abilities / scopes which specify which actions the tokens are allowed to perform. View 


##  Getting Started

```javascript

git clone https://github.com/ardipermana59/simple-restapi-sanctum.git
composer install
cp .env.example .env
php artisan key:generate
php artisan migrate --seed

````

## Register  

```javascript

--request GET '/api/register'
--form 'name="John Doe"'
--form 'email="john@doe.com"'
--form 'password="********"'
--form 'password_confirmation="********"'

````

###### Output

```javascript

{
    "success": true,
    "message": "new user successfully registered."
}

````
## Login

```javascript

--request GET '/api/login'
--form 'email="john@doe.com"'
--form 'password="********"'

````

###### Output

```javascript

{
    "success": true,
    "message": "Login successfully.",
    "user": {
        "id": 1,
        "name": "John Doe",
        "email": "john@doe.com",
        "email_verified_at": null,
        "created_at": "2021-01-20T00:21:21.000000Z",
        "updated_at": "2021-01-20T00:21:21.000000Z"
    },
    "token": "2|KB6wK..."
}

````

## Logout

```javascript

--request GET '/api/logout'

````

###### Output

```javascript

{
    "success": true,
    "message": "Logged out."
}

````

## GET All Student

```javascript

--request GET '/students'

````

###### Output

```javascript

{
    "data": [
        {
            "id": 6,
            "name": "John Doe",
            "gender": "male",
            "phone": "08572...",
            "hobby": "Sports",
            "address": "123 Main St Anytown, USA",
            "created_at": "2021-01-20T00:21:21.000000Z",
            "updated_at": "2021-01-20T00:21:21.000000Z"
        },
    ],
    "success": true,
    "message": "students found."
}

````

## GET Specific Student

```javascript

--request GET '/students/{id}'
--form 'id="1"'

````

###### Output

```javascript

{
    "data": {
        "id": 6,
        "name": "John Doe",
        "gender": "male",
        "phone": "08572..",
        "hobby": "Sports",
        "address": "123 Main St Anytown, USA",
        "created_at": "2021-01-20T00:21:21.000000Z",
        "updated_at": "2021-01-20T00:21:21.000000Z"
    },
    "success": true,
    "message": "student found."
}

````

## CREATE Student

```javascript

--request POST '/students'
--form 'name="John Doe"'
--form 'gender="male"'
--form 'phone="08572.."'
--form 'hobby="Sports"'
--form 'address="123 Main St Anytown, USA"'

````

###### Output

```javascript

{
    "data": {
        "name": "John Doe",
        "gender": "male",
        "phone": "08572..",
        "hobby": "Sports",
        "address": "123 Main St Anytown, USA",
        "created_at": "2021-01-20T00:21:21.000000Z",
        "updated_at": "2021-01-20T00:21:21.000000Z"
        "id": 1,
    },
    "success": true,
    "message": "student has been created."
}

````

## UPDATE Student

```javascript

--request PUT/PATCH '/students/{id}'
--form 'name="John Doe"'
--form 'gender="male"'
--form 'phone="08572.."'
--form 'hobby="Sports"'
--form 'address="123 Main St Anytown, USA"'

````

###### Output

```javascript

{
    "data": {
        "name": "John Doe",
        "gender": "male",
        "phone": "08572..",
        "hobby": "Sports",
        "address": "123 Main St Anytown, USA",
        "created_at": "2021-01-20T00:21:21.000000Z",
        "updated_at": "2021-01-20T00:21:21.000000Z"
        "id": 1,
    },
    "success": true,
    "message": "student has been updated."
}

````

## DESTROY Student

```javascript

--request DELETE '/students/{id}'
--form 'id="1"'

````


###### Output

```javascript

{
    "success": true,
    "message": "student has been deleted."
}

````