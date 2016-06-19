# laraApi
Starter kit to spin up a Laravel API with [jwt](https://github.com/tymondesigns/jwt-auth), [dingo](https://github.com/dingo/api/wiki) and [CORS](https://github.com/barryvdh/laravel-cors) support in seconds.

I always find myself in situation to to develop REST APIs for mobile and web, to avoid boilerplate code I have created this repo.

## Installation

### Step 1: Clone the repo
```bash
git clone https://github.com/saqueib/laraApi.git
```
### Step 2: Composer install
```bash
composer install
```

Once all the dependencies have been installed you can modify the `.env` file to suit your needs.


### Step 3: Serve
```bash
php artisan serve
```

Thats it, Now you can access [http://localhost:8000/api/free](http://localhost:8000/api/free) to access public route.

### Routes

All routes are defined in `app/Http/routes.php`

```php
/*
| Dingo API routes
|
*/
$api = app('Dingo\Api\Routing\Router');

$api->version('v1', ['namespace' => 'App\API\Controllers', 'middleware' => 'cors'], function ($api) {

    // Auth routes
    $api->group(['prefix' => 'auth'], function($api){
        $api->post('login',    ['as' => 'auth.login', 'uses' => 'AuthController@login']);
        $api->post('signup',   ['as' => 'auth.signup', 'uses' =>'AuthController@signup']);
        $api->post('recovery', ['as' => 'auth.recovery', 'uses' =>'AuthController@recovery']);
        $api->post('reset',    ['as' => 'auth.reset', 'uses' =>'AuthController@reset']);
    });

    // protected route group
    $api->group(['middleware' => ['api.auth']], function ($api) {

        $api->get('protected', function () {
            return ['Welcome Mr. Bond, Only you can access this protected route.'];
        });

    });

    // public route
    $api->get('free', function() {
        return ['Welcome Guest, Its a public route'];
    });
});

...
```

### Note about Apache
If you are using Apache as server, you will need to add the following 2 lines to your .htaccess (or your virtualhost configuration):
```
RewriteCond %{HTTP:Authorization} ^(.*)
RewriteRule .* - [e=HTTP_AUTHORIZATION:%1]
```

## License

The LaraAPI Starter kit is open-sourced software licensed under the [MIT license](http://opensource.org/licenses/MIT)