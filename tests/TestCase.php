<?php

namespace TriNguyenDuc\GiaoHangNhanh\Tests;

use Orchestra\Testbench\TestCase as Orchestra;
use TriNguyenDuc\GiaoHangNhanh\GiaoHangNhanhServiceProvider;

class TestCase extends Orchestra
{
    public function getEnvironmentSetUp($app): void
    {
        config(['giaohangnhanh-laravel.token' => '826da0ec-4bd6-11ef-8e53-0a00184fe694']);
        config(['giaohangnhanh-laravel.shop_id' => 193146]);
        config(['giaohangnhanh-laravel.shop_district_id' => 1710]);
    }

    protected function getPackageProviders($app): array
    {
        return [
            GiaoHangNhanhServiceProvider::class,
        ];
    }
}
