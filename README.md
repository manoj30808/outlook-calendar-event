# Laravel5.4 Event Manage with outlook calendar
	
	1) composer require msppack/outlook-calendar
    2) Add service provider in config/app.php 
            MspPack\OutLookCalendar\OutLookCalendarServiceProvider::class,
    3) php artisan vendor:publish
	4) php artisan migrate

This will publish file called `laravel-outlook-calendar.php` in your config-directory with this contents:
```php
<?php

return [

    // App's client ID. Register the app in Azure AD to get this value.
    'client_id' => '',

    // App's client secret. Register the app in Azure AD to get this value.
    'client_secret' => '',

    //Redirect url
    'redirect_url' => 'http://localhost:8000/admin/outlook-calendar/login',
];
```

    Now go to ==> http://<YOUR DOMAIN>/admin/outlook-calendar
