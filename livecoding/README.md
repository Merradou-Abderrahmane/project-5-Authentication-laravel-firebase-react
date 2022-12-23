# breeze : composer require laravel/breeze --dev
# breeze : php artisan breeze:install --dark
# socialite : composer require laravel/socialite
## in env file
# GOOGLE_CLIENT_ID =''
# GOOGLE_CLIENT_SECRET = ''

#     'google' => [
        'client_id' => env('GOOGLE_CLIENT_ID'),
        'client_secret' => env('GOOGLE_CLIENT_SECRET'),
        'redirect' => env('GOOGLE_REDIRECT_URI'),
    ],

# $table->string('google_id')->nullable();   to users table

# php artisan make:controller Auth\GoogleAuthController



