<?php

namespace Fgmarins\Fpay;

use Illuminate\Support\ServiceProvider;

/**
 * Class FpayServiceProvider
 * @package Fgmarins\Fpay
 */
class FpayServiceProvider extends ServiceProvider
{
    public function boot()
    {
        // MyVendor\contactform\src\ContactFormServiceProvider.php
        $this->loadRoutesFrom(__DIR__ . '/Routes/api.php');
    }

    public function register()
    {
    }
}
