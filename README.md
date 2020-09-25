# laravel-async-mail
Sends async mails from Laravel.

As Laravel documentation says:
> Since sending email messages can drastically lengthen the response time of your application, many developers choose to queue email 
> messages for background sending. Laravel makes that easy using its built-in unified queue API. 

This aproach is different, it leverages "Symfony\Component\Process\Process" class to create separate PHP process and sends an "Illuminate\Mail\Mailable" using artisan command.

### Install

Require package with Composer:
```
composer require ognjen/laravel-async-mail:v2.0.0
```

### Usage example
```php
<?php

namespace App\Observers;

use App\Order;
use App\Mail\OrderCreated;
use Ognjen\Laravel\AsyncMail;

class OrderObserver {
    public function created(Order $order)
    {
        AsyncMail::send(new OrderCreated($order));
    }
}
```
