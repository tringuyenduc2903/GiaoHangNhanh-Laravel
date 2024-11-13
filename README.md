# GiaoHangNhanh (GHN) SDK for Laravel Framework

[![Latest Version on Packagist](https://img.shields.io/packagist/v/tringuyenduc2903/giaohangnhanh-laravel.svg?style=flat-square)](https://packagist.org/packages/tringuyenduc2903/giaohangnhanh-laravel)
[![GitHub Code Style Action Status](https://img.shields.io/github/actions/workflow/status/tringuyenduc2903/giaohangnhanh-laravel/fix-php-code-style-issues.yml?branch=main&label=code%20style&style=flat-square)](https://github.com/tringuyenduc2903/giaohangnhanh-laravel/actions?query=workflow%3A"Fix+PHP+code+style+issues"+branch%3Amain)
[![Total Downloads](https://img.shields.io/packagist/dt/tringuyenduc2903/giaohangnhanh-laravel.svg?style=flat-square)](https://packagist.org/packages/tringuyenduc2903/giaohangnhanh-laravel)

## Installation

You can install the package via composer:

```bash
composer require tringuyenduc2903/giaohangnhanh-laravel
```

You can publish the config file with:

```bash
php artisan vendor:publish --tag="giaohangnhanh-laravel-config"
```

This is the contents of the published config file:

```php
return [
    // For Dev:  https://dev-online-gateway.ghn.vn
    // For Prod: https://online-gateway.ghn.vn
    'api_url' => env('GHN_API_URL', 'https://online-gateway.ghn.vn'),

    // For Dev:  https://tracking.ghn.dev
    // For Prod: https://donhang.ghn.vn
    'tracking_url' => env('GHN_TRACKING_URL', 'https://donhang.ghn.vn'),

    // For Dev:  https://5sao.ghn.dev
    // For Prod: https://khachhang.ghn.vn
    'token' => env('GHN_TOKEN'),
    'shop_id' => env('GHN_SHOP_ID'),
];
```

## Usage

### [Get Province](https://api.ghn.vn/home/docs/detail?id=60)

**Get GHN ward/province data. This API provides province to create shipping order**

```php
\GiaoHangNhanh::getProvince();
```

```php
return [
    0 => [
        'ProvinceID' => 269,
        'ProvinceName' => 'Lào Cai',
        'CountryID' => 1,
        'Code' => '20',
        'NameExtension' => [
            0 => 'Lào Cai',
            1 => 'Tỉnh Lào Cai',
            2 => 'T.Lào Cai',
            3 => 'T Lào Cai',
            4 => 'laocai',
        ],
        'IsEnable' => 1,
        'RegionID' => 6,
        'RegionCPN' => 5,
        'UpdatedBy' => 1718600,
        'CreatedAt' => '2019-12-05 15:41:26.891384 +0700 +07 m=+0.010448463',
        'UpdatedAt' => '2019-12-05 15:41:26.891384 +0700 +07 m=+0.010449016',
        'AreaID' => 1,
        'CanUpdateCOD' => false,
        'Status' => 1,
        'UpdatedIP' => '103.191.145.200',
        'UpdatedEmployee' => 209749,
        'UpdatedSource' => 'internal',
        'UpdatedDate' => '2024-06-19T10:40:21.091Z',
    ],
];
```

### [Get District](https://api.ghn.vn/home/docs/detail?id=78)

**Get GHN district/province data. This data is used to reference the District ID to create shipping order**

```php
\GiaoHangNhanh::getDistrict($province_id);
```

```php
return [
    0 => [
        'DistrictID' => 1969,
        'ProvinceID' => 249,
        'DistrictName' => 'Huyện Lương Tài',
        'Code' => '1908',
        'Type' => 3,
        'SupportType' => 3,
        'NameExtension' => [
            0 => 'Huyện Lương Tài',
            1 => 'H.Lương Tài',
            2 => 'H Lương Tài',
            3 => 'Lương Tài',
            4 => 'Luong Tai',
            5 => 'Huyen Luong Tai',
            6 => 'luongtai',
        ],
        'IsEnable' => 1,
        'UpdatedBy' => 1718600,
        'CreatedAt' => '2019-12-05 15:53:32.432534 +0700 +07 m=+0.016480079',
        'UpdatedAt' => '2020-09-29 13:42:56.357876 +0700 +07 m=+28.860032501',
        'CanUpdateCOD' => false,
        'Status' => 1,
        'PickType' => 0,
        'DeliverType' => 0,
        'WhiteListClient' => [
            'From' => [],
            'To' => [],
            'Return' => [],
        ],
        'WhiteListDistrict' => [
            'From' => null,
            'To' => null,
        ],
        'ReasonCode' => '',
        'ReasonMessage' => '',
        'OnDates' => null,
        'UpdatedEmployee' => 3006735,
        'UpdatedDate' => '2023-10-06T07:41:02.399Z',
    ],
];
```

### [Get Ward](https://api.ghn.vn/home/docs/detail?id=61)

**Get GHN ward/province data. This API provides Ward Code to create shipping order**

```php
\GiaoHangNhanh::getWard($district_id);
```

```php
return [
    0 => [
        'WardCode' => '800082',
        'DistrictID' => 3311,
        'WardName' => 'Xã Điềm He',
        'NameExtension' => [
            0 => 'Xã Điềm He',
            1 => 'Diem He',
            2 => 'Xa Diem He',
            3 => 'diemhe',
        ],
        'IsEnable' => 1,
        'CanUpdateCOD' => false,
        'UpdatedBy' => 1718600,
        'CreatedAt' => '2019-12-05 16:02:20.414338 +0700 +07 m=+0.050675313',
        'UpdatedAt' => '2020-09-29 13:50:14.90403 +0700 +07 m=+39.570093743',
        'SupportType' => 3,
        'PickType' => 3,
        'DeliverType' => 3,
        'WhiteListClient' => [
            'From' => [],
            'To' => [],
            'Return' => [],
        ],
        'WhiteListWard' => [
            'From' => null,
            'To' => null,
        ],
        'Status' => 1,
        'ReasonCode' => '',
        'ReasonMessage' => '',
        'OnDates' => null,
        'UpdatedEmployee' => 3006735,
        'UpdatedDate' => '2023-10-06T07:41:04.182Z',
    ],
];
```

## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) for details.

## Security Vulnerabilities

Please review [our security policy](https://github.com/tringuyenduc2903/GiaoHangNhanh-Laravel/security/policy) on how to
report security vulnerabilities.

## Credits

- [Nguyễn Đức Trí](https://github.com/tringuyenduc2903)
- [All Contributors](https://github.com/tringuyenduc2903/GiaoHangNhanh-Laravel/contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
