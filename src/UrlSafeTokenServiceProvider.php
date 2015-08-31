<?php
namespace Masakielastic\Silex;

use Silex\Application;
use Silex\ServiceProviderInterface;

class UrlSafeTokenServiceProvider implements ServiceProviderInterface
{
    public function register(Application $app)
    {
        $app['url_safe_token'] = function () {
            return function ($entropy = 256) {
                $length = $entropy / 8;

                if (function_exists('random_bytes')) {
                    $bytes = random_bytes($length); 
                } else if (function_exists('openssl_random_pseudo_bytes')) {
                    $bytes = openssl_random_pseudo_bytes($length); 
                } else {
                    throw new Exception('The OpenSSL PHP extension is not installed.');
                }
           
                return rtrim(strtr(base64_encode($bytes), '+/', '-_'), '=');
            };
        };
    }

    public function boot(Application $app)
    {
    }
}