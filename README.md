# yii-lib-cookie
Cookie library for Yii2 framework - very easy and powerfull
## Set Component
In Yii Advanced go to path:
``common\config\main.php``
And in Yii Basic go to path:
``config\main.php``

Add component to   `component` array:
```php
[
    'components'=>
    [
        'cookie'=>YiiMan\YiiLibCookie\lib\cookie::class
    ]
]
```

Now you can call component like this:
```php 
Yii::$app->cookie
```

## Set value to cookie

Just do :
```php
Yii::$app->cookie->newKey='new value';
```

## Get saved value
Just do :
```php
$value=Yii::$app->cookie->newKey
```