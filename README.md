UrlSafeTokenServiceProvider
===========================

Installation
------------

```javascript
{
    "repositories": [
    {
        "type": "package",
        "package": {
            "name": "masakielastic/silex-url-safe-token-service-provider",
            "version": "0.1.0",
            "type": "package",
            "source": {
                "url": "https://github.com/masakielastic/silex-url-safe-token-service-provider.git",
                "type": "git",
                "reference": "master"
            },
            "autoload": {
                "psr-4": { "Masakielastic\\Silex\\": "src/" }
            }
        }
    }
    ],
    "require": {
        "silex/silex": "~1.3",
        "masakielastic/silex-url-safe-token-service-provider": "*"
    }
}
```

Usage
-----

```php
use Silex\Application;
use Masakielastic\Silex\UrlSafeTokenServiceProvider;

$app = new Application;
$app->register(new UrlSafeTokenServiceProvider());

$app->get('/', function (Application $app) {
    $entropy = 256;
    return $app['url_safe_token']($entropy);
});
$app->run();
```