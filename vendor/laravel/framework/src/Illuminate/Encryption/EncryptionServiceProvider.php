<?php

namespace Illuminate\Encryption;

use Illuminate\Support\ServiceProvider;
use RuntimeException;

class EncryptionServiceProvider extends ServiceProvider
{

    /**
     * Register the service provider.
     *
     * @return void
     *
     * @throws \RuntimeException
     */
    public function register()
    {
        $this->app->singleton('encrypter', function ($app) {
            $config = $app->make('config')->get('app');

            $key = $config['key'];

            $cipher = $config['cipher'];

            if (Encrypter::supported($key, $cipher)) {
                return new Encrypter($key, $cipher);
            } elseif (McryptEncrypter::supported($key, $cipher)) {
                return new McryptEncrypter($key, $cipher);
            } else {
                throw new RuntimeException('No supported encrypter found. The cipher and / or key length are invalid.');
            }
        });
    }
}
