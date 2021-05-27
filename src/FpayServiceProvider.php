<?php

namespace Fgmarins\Fpay;

use Illuminate\Support\ServiceProvider;

/**
 * Class FpayServiceProvider
 * @package Fgmarins\Fpay
 */
class FpayServiceProvider extends ServiceProvider
{
    /**
     * @return void
     */
    public function boot(): void
    {
        $this->loadRoutesFrom(__DIR__ . '/Routes/api.php');
    }
}
