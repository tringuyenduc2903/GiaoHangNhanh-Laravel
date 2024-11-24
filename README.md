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

### #1 [Get Province](https://api.ghn.vn/home/docs/detail?id=60)

**Get GHN ward/province data. This API provides province to create shipping order**

**Syntax**

```php
\GiaoHangNhanh::getProvince();
```

**Result**

```php
array:63 [
  0 => array:18 [
    "ProvinceID" => 269
    "ProvinceName" => "Lào Cai"
    "CountryID" => 1
    "Code" => "20"
    "NameExtension" => array:5 [
      0 => "Lào Cai"
      1 => "Tỉnh Lào Cai"
      2 => "T.Lào Cai"
      3 => "T Lào Cai"
      4 => "laocai"
    ]
    "IsEnable" => 1
    "RegionID" => 6
    "RegionCPN" => 5
    "UpdatedBy" => 1718600
    "CreatedAt" => "2019-12-05 15:41:26.891384 +0700 +07 m=+0.010448463"
    "UpdatedAt" => "2019-12-05 15:41:26.891384 +0700 +07 m=+0.010449016"
    "AreaID" => 1
    "CanUpdateCOD" => false
    "Status" => 1
    "UpdatedIP" => "103.191.145.200"
    "UpdatedEmployee" => 209749
    "UpdatedSource" => "internal"
    "UpdatedDate" => "2024-06-19T10:40:21.091Z"
  ]
  ...
]
```

### #2 [Get District](https://api.ghn.vn/home/docs/detail?id=78)

**Get GHN district/province data. This data is used to reference the District ID to create shipping order**

**Syntax**

```php
\GiaoHangNhanh::getDistrict($province_id);
```

**Example**

```php
\GiaoHangNhanh::getDistrict(269);
```

**Result**

```php
array:9 [
  0 => array:24 [
    "DistrictID" => 2264
    "ProvinceID" => 269
    "DistrictName" => "Huyện Si Ma Cai"
    "Code" => "0802"
    "Type" => 3
    "SupportType" => 3
    "NameExtension" => array:8 [
      0 => "Huyện Xi Ma Cai"
      1 => "Huyện Si Ma Cai"
      2 => "H.Xi Ma Cai"
      3 => "H Xi Ma Cai"
      4 => "Xi Ma Cai"
      5 => "Huyen Xi Ma Cai"
      6 => "ximacai"
      7 => "Si Ma Cai"
    ]
    "IsEnable" => 1
    "UpdatedBy" => 1718600
    "CreatedAt" => "2019-12-05 15:53:32.432143 +0700 +07 m=+0.016088375"
    "UpdatedAt" => "2020-09-29 13:42:47.12692 +0700 +07 m=+19.629251853"
    "CanUpdateCOD" => false
    "Status" => 1
    "PickType" => 1
    "DeliverType" => 1
    "WhiteListClient" => array:3 [
      "From" => []
      "To" => []
      "Return" => []
    ]
    "WhiteListDistrict" => array:2 [
      "From" => null
      "To" => null
    ]
    "ReasonCode" => ""
    "ReasonMessage" => ""
    "OnDates" => array:1 [
      0 => "2022-04-02T17:00:00Z"
    ]
    "UpdatedIP" => "118.69.109.163"
    "UpdatedEmployee" => 3002766
    "UpdatedSource" => "internal"
    "UpdatedDate" => "2024-09-23T03:52:48.042Z"
  ]
  1 => array:22 [
    "DistrictID" => 2171
    "ProvinceID" => 269
    "DistrictName" => "Huyện Mường Khương"
    "Code" => "0809"
    "Type" => 3
    "SupportType" => 3
    "NameExtension" => array:7 [
      0 => "Huyện Mường Khương"
      1 => "H.Mường Khương"
      2 => "H Mường Khương"
      3 => "Mường Khương"
      4 => "Muong Khuong"
      5 => "Huyen Muong Khuong"
      6 => "muongkhuong"
    ]
    "IsEnable" => 1
    "UpdatedBy" => 1718600
    "CreatedAt" => "2019-12-05 15:53:32.432051 +0700 +07 m=+0.015996362"
    "UpdatedAt" => "2020-09-29 13:42:49.022547 +0700 +07 m=+21.524842525"
    "CanUpdateCOD" => false
    "Status" => 1
    "PickType" => 0
    "DeliverType" => 0
    "WhiteListClient" => array:3 [
      "From" => []
      "To" => []
      "Return" => []
    ]
    "WhiteListDistrict" => array:2 [
      "From" => null
      "To" => null
    ]
    "ReasonCode" => ""
    "ReasonMessage" => ""
    "OnDates" => null
    "UpdatedEmployee" => 3006735
    "UpdatedDate" => "2023-10-06T07:41:02.399Z"
  ]
  ...
]
```

### #3 [Get Ward](https://api.ghn.vn/home/docs/detail?id=61)

**Get GHN ward/province data. This API provides Ward Code to create shipping order**

**Syntax**

```php
\GiaoHangNhanh::getWard($district_id);
```

**Example**

```php
\GiaoHangNhanh::getWard(2264);
```

**Result**

```php
array:16 [
  0 => array:20 [
    "WardCode" => "90816"
    "DistrictID" => 2264
    "WardName" => "Thị Trấn Si Ma Cai"
    "NameExtension" => array:4 [
      0 => "thị trấn si ma cai"
      1 => "thi tran si ma cai"
      2 => "Thi Tran Si Ma Cai"
      3 => "thị trấn xi ma cai"
    ]
    "CanUpdateCOD" => true
    "SupportType" => 3
    "PickType" => 3
    "DeliverType" => 3
    "WhiteListClient" => array:3 [
      "From" => []
      "To" => []
      "Return" => []
    ]
    "WhiteListWard" => array:2 [
      "From" => null
      "To" => null
    ]
    "Status" => 1
    "ReasonCode" => ""
    "ReasonMessage" => ""
    "OnDates" => array:2 [
      0 => "2024-09-13T17:00:00Z"
      1 => "2024-09-15T17:00:00Z"
    ]
    "CreatedIP" => "35.247.155.234"
    "CreatedEmployee" => 1705038
    "CreatedSource" => "internal"
    "CreatedDate" => "2021-11-12T10:20:59.132Z"
    "UpdatedEmployee" => 1711127
    "UpdatedDate" => "2024-09-15T17:00:06.746Z"
  ]
  ...
]
```

### #4 [Calculate Fee](https://api.ghn.vn/home/docs/detail?id=76)

**This API can help Shop/Merchant get the shipping fee and provide to buyer before create shipping order by input some
information such as weight, height, length, width, to_district_id, to_ward_code, service_id**

**Syntax**

```php
\GiaoHangNhanh::calculateFee([
    'service_id' => $service_id,
    'service_type_id' => $service_type_id,
    'insurance_value' => $insurance_value,
    'coupon' => $coupon,
    'cod_failed_amount' => $cod_failed_amount,
    'from_ward_code' => $from_ward_code,
    'from_district_id' => $from_district_id,
    'to_ward_code' => $to_ward_code,
    'to_district_id' => $to_district_id,
    'weight' => $weight,
    'length' => $length,
    'width' => $width,
    'height' => $height,
    'cod_value' => $cod_value,
    'items' => [[
        'name' => $name,
        'code' => $code,
        'quantity' => $quantity,
        'height' => $height,
        'weight' => $weight,
        'width' => $width,
        'length' => $length,
    ]],
]);
```

**Example**

```php
\GiaoHangNhanh::calculateFee([
    'service_type_id' => 5,
    'from_ward_code' => '21211',
    'from_district_id' => 1454,
    'to_ward_code' => '21012',
    'to_district_id' => 1452,
    'height' => 20,
    'length' => 30,
    'weight' => 3000,
    'width' => 40,
    'insurance_value' => 0,
    'coupon' => null,
    'items' => [[
        'name' => 'TEST1',
        'quantity' => 1,
        'height' => 200,
        'weight' => 1000,
        'length' => 200,
        'width' => 200,
    ]],
]);
```

**Result**

```php
array:13 [
  "total" => 5610316
  "service_fee" => 5610316
  "insurance_fee" => 0
  "pick_station_fee" => 0
  "coupon_value" => 0
  "r2s_fee" => 0
  "return_again" => 0
  "document_return" => 0
  "double_check" => 0
  "cod_fee" => 0
  "pick_remote_areas_fee" => 0
  "deliver_remote_areas_fee" => 0
  "cod_failed_fee" => 0
]
```

### #5 [Fee of Order Info](https://api.ghn.vn/home/docs/detail?id=71)

**This API help you get all fee of a order**

**Syntax**

```php
\GiaoHangNhanh::feeOrderInfo($order_code);
```

**Example**

```php
\GiaoHangNhanh::feeOrderInfo('');
```

**Result**

```php
array:14 [
  "_id" => "67429cfc02f828e92e5bb8e8"
  "order_code" => "G8ADKBRF"
  "detail" => array:17 [
    "main_service" => 34000
    "insurance" => 10000
    "cod_fee" => 0
    "station_do" => 0
    "station_pu" => 0
    "return" => 0
    "r2s" => 0
    "return_again" => 0
    "coupon" => 0
    "document_return" => 0
    "double_check" => 0
    "double_check_deliver" => 0
    "pick_remote_areas_fee" => 0
    "deliver_remote_areas_fee" => 0
    "pick_remote_areas_fee_return" => 0
    "deliver_remote_areas_fee_return" => 0
    "cod_failed_fee" => 0
  ]
  "standard" => array:17 [
    "main_service" => 34000
    "insurance" => 10000
    "cod_fee" => 0
    "station_do" => 0
    "station_pu" => 0
    "return" => 0
    "r2s" => 0
    "return_again" => 0
    "coupon" => 0
    "document_return" => 0
    "double_check" => 0
    "double_check_deliver" => 0
    "pick_remote_areas_fee" => 0
    "deliver_remote_areas_fee" => 0
    "pick_remote_areas_fee_return" => 0
    "deliver_remote_areas_fee_return" => 0
    "cod_failed_fee" => 0
  ]
  "payment" => array:1 [
    0 => array:5 [
      "diff" => array:17 [
        "main_service" => 34000
        "insurance" => 10000
        "cod_fee" => 0
        "station_do" => 0
        "station_pu" => 0
        "return" => 0
        "r2s" => 0
        "return_again" => 0
        "coupon" => 0
        "document_return" => 0
        "double_check" => 0
        "double_check_deliver" => 0
        "pick_remote_areas_fee" => 0
        "deliver_remote_areas_fee" => 0
        "pick_remote_areas_fee_return" => 0
        "deliver_remote_areas_fee_return" => 0
        "cod_failed_fee" => 0
      ]
      "value" => 44000
      "payment_type" => 2
      "paid_date" => "0001-01-01T00:00:00Z"
      "created_date" => "2024-11-24T03:26:52.552Z"
    ]
  ]
  "cod_collect_date" => "0001-01-01T00:00:00Z"
  "transaction_id" => "9cc26767-af6a-4460-a9ec-c0d5bc59d451"
  "created_ip" => ""
  "created_date" => "2024-11-24T03:26:52.552Z"
  "updated_ip" => ""
  "updated_client" => 0
  "updated_employee" => 0
  "updated_source" => ""
  "updated_date" => "2024-11-24T03:26:52.552Z"
]
```

### #6 [Get Service](https://api.ghn.vn/home/docs/detail?id=77)

**Use to get list of available services from district pick up items and to district drop off items (Full information)**

**Syntax**

```php
\GiaoHangNhanh::getService([
    'from_district' => $from_district,
    'to_district' => $to_district,
]);
```

**Example**

```php
\GiaoHangNhanh::getService([
    'from_district' => 1490,
    'to_district' => 1442,
]);
```

**Result**

```php
array:2 [
  0 => array:11 [
    "service_id" => 53321
    "short_name" => "Hàng nhẹ"
    "service_type_id" => 2
    "config_fee_id" => ""
    "extra_cost_id" => ""
    "standard_config_fee_id" => ""
    "standard_extra_cost_id" => ""
    "ecom_config_fee_id" => 684
    "ecom_extra_cost_id" => 103
    "ecom_standard_config_fee_id" => 684
    "ecom_standard_extra_cost_id" => 103
  ]
  ...
]
```

### #7 [Preview Order](https://api.ghn.vn/home/docs/detail?id=81)

**Helps preview order information without creating an order**

**Syntax**

```php
\GiaoHangNhanh::previewOrder([
    'from_name' => $from_name,
    'from_phone' => $from_phone,
    'from_address' => $from_address,
    'from_ward_name' => $from_ward_name,
    'from_district_name' => $from_district_name,
    'from_province_name' => $from_province_name,
    'from_ward_code' => $from_ward_code,
    'from_district_id' => $from_district_id,
    'from_province_id' => $from_province_id,
    'to_name' => $to_name,
    'to_phone' => $to_phone,
    'to_address' => $to_address,
    'to_ward_name' => $to_ward_name,
    'to_district_name' => $to_district_name,
    'to_ward_code' => $to_ward_code,
    'to_district_id' => $to_district_id,
    'return_phone' => $return_phone,
    'return_address' => $return_address,
    'return_ward_name' => $return_ward_name,
    'return_district_name' => $return_district_name,
    'return_ward_code' => $return_ward_code,
    'return_district_id' => $return_district_id,
    'client_order_code' => $client_order_code,
    'cod_amount' => $cod_amount,
    'content' => $content,
    'weight' => $weight,
    'length' => $length,
    'width' => $width,
    'height' => $height,
    'pick_station_id' => $pick_station_id,
    'insurance_value' => $insurance_value,
    'coupon' => $coupon,
    'service_type_id' => $service_type_id,
    'payment_type_id' => $payment_type_id,
    'note' => $note,
    'required_note' => $required_note,
    'pick_shift' => $pick_shift,
    'pick_shift' => $pick_shift,
    'pickup_time' => $pickup_time,
    'items' => [[
        'name' => $name,
        'code' => $code,
        'quantity' => $quantity,
        'price' => $price,
        'length' => $length,
        'weight' => $weight,
        'width' => $width,
        'height' => $height,
        'category' => [
            'level1' => $level1,
        ],
    ]],
    'cod_failed_amount' => $cod_failed_amount,
]);
```

**Example**

```php
\GiaoHangNhanh::previewOrder([
    'payment_type_id' => 2,
    'note' => 'Tintest 123',
    'required_note' => 'KHONGCHOXEMHANG',
    'return_phone' => '0332190458',
    'return_address' => '39 NTT',
    'return_district_id' => null,
    'return_ward_code' => '',
    'client_order_code' => '',
    'to_name' => 'TinTest124',
    'to_phone' => '0987654321',
    'to_address' => '72 Thành Thái, Phường 14, Quận 10, Hồ Chí Minh, Vietnam',
    'to_ward_code' => '20107',
    'to_district_id' => 1442,
    'cod_amount' => 200000,
    'content' => 'ABCDEF',
    'weight' => 200,
    'length' => 15,
    'width' => 15,
    'height' => 15,
    'pick_station_id' => 0,
    'insurance_value' => 2000000,
    'service_id' => 0,
    'service_type_id' => 2,
    'coupon' => null,
    'pick_shift' => [2],
    'items' => [[
        'name' => 'Áo Polo',
        'code' => 'Polo123',
        'quantity' => 1,
        'price' => 200000,
        'length' => 12,
        'width' => 12,
        'height' => 12,
        'category' => [
            'level1' => 'Áo',
        ],
    ]],
]);
```

**Result**

```php
array:9 [
  "order_code" => ""
  "sort_code" => "40-G-33-A1"
  "trans_type" => "truck"
  "ward_encode" => ""
  "district_encode" => ""
  "fee" => array:17 [
    "main_service" => 34000
    "insurance" => 10000
    "cod_fee" => 0
    "station_do" => 0
    "station_pu" => 0
    "return" => 0
    "r2s" => 0
    "return_again" => 0
    "coupon" => 0
    "document_return" => 0
    "double_check" => 0
    "double_check_deliver" => 0
    "pick_remote_areas_fee" => 0
    "deliver_remote_areas_fee" => 0
    "pick_remote_areas_fee_return" => 0
    "deliver_remote_areas_fee_return" => 0
    "cod_failed_fee" => 0
  ]
  "total_fee" => 44000
  "expected_delivery_time" => "2024-11-26T23:59:59Z"
  "operation_partner" => ""
]
```

### #8 [Create Order](https://api.ghn.vn/home/docs/detail?id=123)

**Automatic send order information such as weight, address, phone number and many more to GHN system. We will process
these information and start the shipment**

**Syntax**

```php
\GiaoHangNhanh::createOrder([
    'from_name' => $from_name,
    'from_phone' => $from_phone,
    'from_address' => $from_address,
    'from_ward_name' => $from_ward_name,
    'from_district_name' => $from_district_name,
    'from_province_name' => $from_province_name,
    'from_ward_code' => $from_ward_code,
    'from_district_id' => $from_district_id,
    'from_province_id' => $from_province_id,
    'to_name' => $to_name,
    'to_phone' => $to_phone,
    'to_address' => $to_address,
    'to_ward_name' => $to_ward_name,
    'to_district_name' => $to_district_name,
    'to_ward_code' => $to_ward_code,
    'to_district_id' => $to_district_id,
    'return_phone' => $return_phone,
    'return_address' => $return_address,
    'return_ward_name' => $return_ward_name,
    'return_district_name' => $return_district_name,
    'return_ward_code' => $return_ward_code,
    'return_district_id' => $return_district_id,
    'client_order_code' => $client_order_code,
    'cod_amount' => $cod_amount,
    'content' => $content,
    'weight' => $weight,
    'length' => $length,
    'width' => $width,
    'height' => $height,
    'pick_station_id' => $pick_station_id,
    'insurance_value' => $insurance_value,
    'coupon' => $coupon,
    'service_type_id' => $service_type_id,
    'payment_type_id' => $payment_type_id,
    'note' => $note,
    'required_note' => $required_note,
    'pick_shift' => $pick_shift,
    'pick_shift' => $pick_shift,
    'pickup_time' => $pickup_time,
    'items' => [[
        'name' => $name,
        'code' => $code,
        'quantity' => $quantity,
        'price' => $price,
        'length' => $length,
        'weight' => $weight,
        'width' => $width,
        'height' => $height,
        'category' => [
            'level1' => $level1,
        ],
    ]],
    'cod_failed_amount' => $cod_failed_amount,
]);
```

**Example**

```php
\GiaoHangNhanh::createOrder([
    'payment_type_id' => 2,
    'note' => 'Tintest 123',
    'required_note' => 'KHONGCHOXEMHANG',
    'return_phone' => '0332190458',
    'return_address' => '39 NTT',
    'return_district_id' => null,
    'return_ward_code' => '',
    'client_order_code' => '',
    'to_name' => 'TinTest124',
    'to_phone' => '0987654321',
    'to_address' => '72 Thành Thái, Phường 14, Quận 10, Hồ Chí Minh, Vietnam',
    'to_ward_code' => '20107',
    'to_district_id' => 1442,
    'cod_amount' => 200000,
    'content' => 'ABCDEF',
    'weight' => 200,
    'length' => 15,
    'width' => 15,
    'height' => 15,
    'pick_station_id' => 0,
    'insurance_value' => 2000000,
    'service_id' => 0,
    'service_type_id' => 2,
    'coupon' => null,
    'pick_shift' => [2],
    'items' => [[
        'name' => 'Áo Polo',
        'code' => 'Polo123',
        'quantity' => 1,
        'price' => 200000,
        'length' => 12,
        'width' => 12,
        'height' => 12,
        'category' => [
            'level1' => 'Áo',
        ],
    ]],
]);
```

**Result**

```php
array:9 [
  "order_code" => "G8ADKBYD"
  "sort_code" => "40-G-33-A1"
  "trans_type" => "truck"
  "ward_encode" => ""
  "district_encode" => ""
  "fee" => array:17 [
    "main_service" => 34000
    "insurance" => 10000
    "cod_fee" => 0
    "station_do" => 0
    "station_pu" => 0
    "return" => 0
    "r2s" => 0
    "return_again" => 0
    "coupon" => 0
    "document_return" => 0
    "double_check" => 0
    "double_check_deliver" => 0
    "pick_remote_areas_fee" => 0
    "deliver_remote_areas_fee" => 0
    "pick_remote_areas_fee_return" => 0
    "deliver_remote_areas_fee_return" => 0
    "cod_failed_fee" => 0
  ]
  "total_fee" => 44000
  "expected_delivery_time" => "2024-11-26T23:59:59Z"
  "operation_partner" => ""
]
```

### #9 [Update Order](https://api.ghn.vn/home/docs/detail?id=75)

**Update information of created order. Only available when shipping status**

**Syntax**

```php
\GiaoHangNhanh::updateOrder([
    'order_code' => $order_code,
    'from_name' => $from_name,
    'from_phone' => $from_phone,
    'from_address' => $from_address,
    'from_ward_name' => $from_ward_name,
    'from_district_name' => $from_district_name,
    'from_province_name' => $from_province_name,
    'from_ward_code' => $from_ward_code,
    'from_district_id' => $from_district_id,
    'from_province_id' => $from_province_id,
    'to_name' => $to_name,
    'to_phone' => $to_phone,
    'to_address' => $to_address,
    'to_ward_name' => $to_ward_name,
    'to_district_name' => $to_district_name,
    'to_ward_code' => $to_ward_code,
    'to_district_id' => $to_district_id,
    'return_phone' => $return_phone,
    'return_address' => $return_address,
    'return_ward_name' => $return_ward_name,
    'return_district_name' => $return_district_name,
    'return_ward_code' => $return_ward_code,
    'return_district_id' => $return_district_id,
    'client_order_code' => $client_order_code,
    'content' => $content,
    'weight' => $weight,
    'length' => $length,
    'width' => $width,
    'height' => $height,
    'pick_station_id' => $pick_station_id,
    'insurance_value' => $insurance_value,
    'coupon' => $coupon,
    'payment_type_id' => $payment_type_id,
    'note' => $note,
    'required_note' => $required_note,
    'pick_shift' => $pick_shift,
    'pick_shift' => $pick_shift,
    'pickup_time' => $pickup_time,
    'items' => [[
        'name' => $name,
        'code' => $code,
        'quantity' => $quantity,
        'price' => $price,
        'length' => $length,
        'width' => $width,
        'height' => $height,
        'category' => [
            'level1' => $level1,
        ],
    ]],
]);
```

**Example**

```php
\GiaoHangNhanh::updateOrder([
    'order_code' => 'G8ADKBRF',
    'note' => 'nhớ gọi 30p khi giao',
]);
```

**Result**

```php
null
```

### #10 [Update COD of Order](https://api.ghn.vn/home/docs/detail?id=64)

**Update value for COD**

**Syntax**

```php
\GiaoHangNhanh::updateCodOrder([
    'order_code' => $order_code,
    'cod_amount' => $insurance_value,
]);
```

**Example**

```php
\GiaoHangNhanh::updateCodOrder([
    'order_code' => 'G8ADKBRF',
    'cod_amount' => 100000,
]);
```

**Result**

```php
null
```

### #11 [Order Info](https://api.ghn.vn/home/docs/detail?id=66)

**This API help you get all information of a order. You can know current status or the reason which make the shipment
failed**

**Syntax**

```php
\GiaoHangNhanh::orderInfo($order_code);
```

**Example**

```php
\GiaoHangNhanh::orderInfo('G8ADKBRF');
```

**Result**

```php
array:105 [
  "shop_id" => 5353886
  "client_id" => 164936
  "return_name" => "Agilts "
  "return_phone" => "0332190458"
  "return_address" => "39 NTT"
  "return_ward_code" => "1A0807"
  "return_district_id" => 1490
  "return_location" => array:7 [
    "lat" => 21.0410863
    "long" => 105.8478132
    "cell_code" => "AHSBAC1B"
    "place_id" => "ElEzOSBQLiBOZ3V54buFbiBUcnVuZyBUcuG7sWMsIE5ndXnhu4VuIFRydW5nIFRy4buxYywgQmEgxJDDrG5oLCBIw6AgTuG7mWksIFZpZXRuYW0iMBIuChQKEgnDNNiUuas1MRGP7dWiLAOI_xAnKhQKEgm5UDm_uas1MREIAqadnntuOA"
    "trust_level" => 5
    "wardcode" => "1A0109"
    "map_source" => "ass_service"
  ]
  "from_name" => "Agilts "
  "from_phone" => "0982213854"
  "from_hotline" => ""
  "from_address" => "Toà nhà VTC, số 18 Đ. Tam Trinh, Mai Động, Hoàng Mai, Hà Nội, Vietnam"
  "from_ward_code" => "1A0807"
  "from_district_id" => 1490
  "from_location" => array:7 [
    "lat" => 20.9922261
    "long" => 105.8623596
    "cell_code" => "AHTAZZD5"
    "place_id" => "ChIJyZRGZxCsNTERd963yjO3vtk"
    "trust_level" => 5
    "wardcode" => "1A0807"
    "map_source" => "ass_service"
  ]
  "deliver_station_id" => 0
  "to_name" => "TinTest124"
  "to_phone" => "0987654321"
  "to_address" => "72 Thành Thái, Phường 14, Quận 10, Hồ Chí Minh, Vietnam"
  "to_ward_code" => "20107"
  "to_district_id" => 1442
  "to_location" => array:5 [
    "lat" => 10.7720653
    "long" => 106.6654784
    "cell_code" => "AJIAEND9"
    "trust_level" => 5
    "map_source" => "ext_google"
  ]
  "weight" => 200
  "length" => 15
  "width" => 15
  "height" => 15
  "converted_weight" => 675
  "calculate_weight" => 675
  "image_ids" => null
  "service_type_id" => 2
  "service_id" => 53321
  "payment_type_id" => 2
  "payment_type_ids" => array:1 [
    0 => 2
  ]
  "custom_service_fee" => 0
  "sort_code" => "40-G-33-A1"
  "cod_amount" => 100000
  "cod_collect_date" => null
  "cod_transfer_date" => null
  "is_cod_transferred" => false
  "is_cod_collected" => false
  "insurance_value" => 2000000
  "order_value" => 0
  "pick_station_id" => 0
  "client_order_code" => ""
  "cod_failed_amount" => 0
  "cod_failed_collect_date" => null
  "required_note" => "KHONGCHOXEMHANG"
  "content" => "Áo Polo [Polo123] [1 cái]"
  "note" => "nhớ gọi 30p khi giao"
  "employee_note" => ""
  "seal_code" => ""
  "pickup_time" => "2024-11-24T05:00:00Z"
  "items" => array:1 [
    0 => array:9 [
      "name" => "Áo Polo"
      "code" => "Polo123"
      "quantity" => 1
      "length" => 12
      "width" => 12
      "height" => 12
      "category" => array:1 [
        "level1" => "Áo"
      ]
      "status" => ""
      "item_order_code" => "G8ADKBRF_1"
    ]
  ]
  "coupon" => ""
  "coupon_campaign_id" => 0
  "_id" => "67429cfc02f828e92e5bb8e9"
  "order_code" => "G8ADKBRF"
  "version_no" => "d5746c36-3b00-4552-ab8c-3bbeb3f58fce"
  "updated_ip" => "171.224.178.184"
  "updated_employee" => 0
  "updated_client" => 164936
  "updated_source" => "shiip"
  "updated_date" => "2024-11-24T04:28:00.812Z"
  "updated_warehouse" => 0
  "created_ip" => "171.224.178.184"
  "created_employee" => 0
  "created_client" => 164936
  "created_source" => "shiip"
  "created_date" => "2024-11-24T03:26:52.325Z"
  "status" => "picking"
  "internal_process" => array:2 [
    "status" => ""
    "type" => ""
  ]
  "pick_warehouse_id" => 21429000
  "deliver_warehouse_id" => 20565000
  "current_warehouse_id" => 21429000
  "return_warehouse_id" => 2475
  "next_warehouse_id" => 0
  "current_transport_warehouse_id" => 0
  "leadtime" => "2024-11-26T23:59:59Z"
  "order_date" => "2024-11-24T03:26:52.47Z"
  "data" => []
  "action" => "START_PICKING_TRIP"
  "soc_id" => "67429cfc02f828e92e5bb8e8"
  "finish_date" => null
  "tag" => array:1 [
    0 => "truck"
  ]
  "log" => array:1 [
    0 => array:7 [
      "status" => "picking"
      "driver_id" => 3004428
      "driver_name" => "Trịnh Xuân Hà"
      "driver_phone" => "0967836590"
      "payment_type_id" => 2
      "trip_code" => "24B21429000MQKQ42"
      "updated_date" => "2024-11-24T03:30:19.152Z"
    ]
  ]
  "is_partial_return" => false
  "is_document_return" => false
  "pick_shift" => array:1 [
    0 => 2
  ]
  "pickup_shift" => array:2 [
    "from_time" => "2024-11-24T05:00:00Z"
    "to_time" => "2024-11-24T11:00:00Z"
  ]
  "updated_date_pick_shift" => "2024-11-24T04:28:00.812Z"
  "transaction_ids" => array:1 [
    0 => "9cc26767-af6a-4460-a9ec-c0d5bc59d451"
  ]
  "transportation_status" => ""
  "transportation_phase" => ""
  "extra_service" => array:5 [
    "document_return" => array:1 [
      "flag" => false
    ]
    "double_check" => false
    "lastmile_ahamove_bulky" => false
    "lastmile_trip_code" => ""
    "original_deliver_warehouse_id" => 0
  ]
  "config_fee_id" => ""
  "extra_cost_id" => ""
  "standard_config_fee_id" => ""
  "standard_extra_cost_id" => ""
  "ecom_config_fee_id" => 684
  "ecom_extra_cost_id" => 103
  "ecom_standard_config_fee_id" => 684
  "ecom_standard_extra_cost_id" => 103
  "is_b2b" => false
  "operation_partner" => ""
  "process_partner_name" => ""
]
```

### #12 [Order Info by Client_Order_Code](https://api.ghn.vn/home/docs/detail?id=119)

**This API help you get all information of a order. You can know current status or the reason which make the shipment
failed**

**Syntax**

```php
\GiaoHangNhanh::orderInfoByClientOrderCode($client_order_code);
```

**Example**

```php
\GiaoHangNhanh::orderInfoByClientOrderCode('SHOP-1');
```

**Result**

```php
array:103 [
  "shop_id" => 5353886
  "client_id" => 164936
  "return_name" => "Agilts "
  "return_phone" => "0982213854"
  "return_address" => "Toà nhà VTC, số 18 Đ. Tam Trinh, Mai Động, Hoàng Mai, Hà Nội, Vietnam"
  "return_ward_code" => "1A0807"
  "return_district_id" => 1490
  "return_location" => array:7 [
    "lat" => 20.9922261
    "long" => 105.8623596
    "cell_code" => "AHTAZZD5"
    "place_id" => "ChIJyZRGZxCsNTERd963yjO3vtk"
    "trust_level" => 5
    "wardcode" => "1A0807"
    "map_source" => "ass_service"
  ]
  "from_name" => "Agilts "
  "from_phone" => "0982213854"
  "from_hotline" => ""
  "from_address" => "Toà nhà VTC, số 18 Đ. Tam Trinh, Mai Động, Hoàng Mai, Hà Nội, Vietnam"
  "from_ward_code" => "1A0807"
  "from_district_id" => 1490
  "from_location" => array:7 [
    "lat" => 20.9922261
    "long" => 105.8623596
    "cell_code" => "AHTAZZD5"
    "place_id" => "ChIJyZRGZxCsNTERd963yjO3vtk"
    "trust_level" => 5
    "wardcode" => "1A0807"
    "map_source" => "ass_service"
  ]
  "deliver_station_id" => 0
  "to_name" => "Đoàn Hà Cống"
  "to_phone" => "0333603313"
  "to_address" => """
    93272 Precious Groves Apt. 304\n
    Fayestad, KY 94658
    """
  "to_ward_code" => "190813"
  "to_district_id" => 1969
  "to_location" => array:6 [
    "lat" => 21.046315654148
    "long" => 106.29290204207
    "cell_code" => "AIPBAC6H"
    "trust_level" => 5
    "wardcode" => "190813"
    "map_source" => "ass_service"
  ]
  "weight" => 14773
  "length" => 10
  "width" => 10
  "height" => 10
  "converted_weight" => 200
  "calculate_weight" => 14773
  "image_ids" => null
  "service_type_id" => 2
  "service_id" => 53321
  "payment_type_id" => 1
  "payment_type_ids" => array:1 [
    0 => 1
  ]
  "custom_service_fee" => 0
  "sort_code" => "400-C-02-B3"
  "cod_amount" => 0
  "cod_collect_date" => null
  "cod_transfer_date" => null
  "is_cod_transferred" => false
  "is_cod_collected" => false
  "insurance_value" => 3682059
  "order_value" => 0
  "pick_station_id" => 0
  "client_order_code" => "SHOP-1"
  "cod_failed_amount" => 0
  "cod_failed_collect_date" => null
  "required_note" => "KHONGCHOXEMHANG"
  "content" => "Ngô Huy Chử [1 cái]"
  "note" => ""
  "employee_note" => ""
  "seal_code" => ""
  "pickup_time" => "2024-11-24T03:39:16.519Z"
  "items" => array:1 [
    0 => array:8 [
      "name" => "Ngô Huy Chử"
      "quantity" => 1
      "length" => 10
      "width" => 10
      "height" => 10
      "category" => []
      "status" => ""
      "item_order_code" => "G8AD6FRU_1"
    ]
  ]
  "coupon" => ""
  "coupon_campaign_id" => 0
  "_id" => "67429fe4a35100790995efae"
  "order_code" => "G8AD6FRU"
  "version_no" => "eab41cca-623b-4b53-971c-06fe08785c82"
  "updated_ip" => "10.10.0.999"
  "updated_employee" => 8888
  "updated_client" => 0
  "updated_source" => ""
  "updated_date" => "2024-11-24T03:40:19.449Z"
  "updated_warehouse" => 0
  "created_ip" => "171.224.178.184"
  "created_employee" => 0
  "created_client" => 164936
  "created_source" => "shiip"
  "created_date" => "2024-11-24T03:39:16.455Z"
  "status" => "picking"
  "internal_process" => array:2 [
    "status" => ""
    "type" => ""
  ]
  "pick_warehouse_id" => 21429000
  "deliver_warehouse_id" => 20969000
  "current_warehouse_id" => 21429000
  "return_warehouse_id" => 21429000
  "next_warehouse_id" => 0
  "current_transport_warehouse_id" => 0
  "leadtime" => "2024-11-26T23:59:59Z"
  "order_date" => "2024-11-24T03:39:16.519Z"
  "data" => []
  "action" => "START_PICKING_TRIP"
  "soc_id" => "67429fe4a35100790995efad"
  "finish_date" => null
  "tag" => array:2 [
    0 => "bulky"
    1 => "truck"
  ]
  "log" => array:1 [
    0 => array:7 [
      "status" => "picking"
      "driver_id" => 3004428
      "driver_name" => "Trịnh Xuân Hà"
      "driver_phone" => "0967836590"
      "payment_type_id" => 1
      "trip_code" => "24B21429000MQKQ42"
      "updated_date" => "2024-11-24T03:40:19.449Z"
    ]
  ]
  "is_partial_return" => false
  "is_document_return" => false
  "pickup_shift" => []
  "transaction_ids" => array:1 [
    0 => "0bf6857c-9dda-4797-b664-bae0cad304eb"
  ]
  "transportation_status" => ""
  "transportation_phase" => ""
  "extra_service" => array:5 [
    "document_return" => array:1 [
      "flag" => false
    ]
    "double_check" => false
    "lastmile_ahamove_bulky" => false
    "lastmile_trip_code" => ""
    "original_deliver_warehouse_id" => 0
  ]
  "config_fee_id" => ""
  "extra_cost_id" => ""
  "standard_config_fee_id" => ""
  "standard_extra_cost_id" => ""
  "ecom_config_fee_id" => 684
  "ecom_extra_cost_id" => 103
  "ecom_standard_config_fee_id" => 684
  "ecom_standard_extra_cost_id" => 103
  "is_b2b" => false
  "operation_partner" => ""
  "process_partner_name" => ""
]
```

### #13 [Return Order](https://api.ghn.vn/home/docs/detail?id=72)

**The purpose of changing the status of an order to delivery is only applicable where the current status of the order
is: storage or waiting for delivery**

**Syntax**

```php
\GiaoHangNhanh::returnOrder([$order_code]);
```

**Example**

```php
\GiaoHangNhanh::returnOrder(['G8ADKBRF']);
```

**Result**

```php
array:1 [
  0 => array:3 [
    "order_code" => "G8ADKBRF"
    "result" => false
    "message" => "Trạng thái đơn hàng không hợp lệ"
  ]
]
```

### #14 [Delivery Again](https://api.ghn.vn/home/docs/detail?id=65)

- **Orders that have been repeatedly delivered are unsuccessful, will go into waiting for delivery (waiting time for
  delivery depends on each customer's contract, the default is 24h)**
- **During this period, customer can request delivery of the order again, order status after delivery request will
  become "storage"**

**Syntax**

```php
\GiaoHangNhanh::deliveryAgain([$order_code]);
```

**Example**

```php
\GiaoHangNhanh::deliveryAgain(['G8ADKBRF']);
```

**Result**

```php
array:1 [
  0 => array:3 [
    "order_code" => "G8ADKBRF"
    "result" => false
    "message" => "Trạng thái đơn hàng không hợp lệ"
  ]
]
```

### #15 [Print Order](https://api.ghn.vn/home/docs/detail?id=67)

**Syntax**

```php
\GiaoHangNhanh::printOrder([$order_code]);
```

**Example**

```php
\GiaoHangNhanh::printOrder(['G8ADKBRF']);
```

**Result**

```php
array:3 [
  "A5" => "https://online-gateway.ghn.vn/a5/public-api/printA5?token=708b2b1d-aa1d-11ef-bf05-7a18017943c1"
  "80x80" => "https://online-gateway.ghn.vn/a5/public-api/print80x80?token=708b2b1d-aa1d-11ef-bf05-7a18017943c1"
  "52x70" => "https://online-gateway.ghn.vn/a5/public-api/print52x70?token=708b2b1d-aa1d-11ef-bf05-7a18017943c1"
]
```

### #16 [Cancel Order](https://api.ghn.vn/home/docs/detail?id=73)

**Cancel a shipping order from GHN**

**Syntax**

```php
\GiaoHangNhanh::cancelOrder([$order_code]);
```

**Example**

```php
\GiaoHangNhanh::cancelOrder(['G8ADKBYD']);
```

**Result**

```php
array:1 [
  0 => array:3 [
    "order_code" => "G8ADKBYD"
    "result" => true
    "message" => "OK"
  ]
]
```

### #17 [Get Station](https://api.ghn.vn/home/docs/detail?id=62)

**Get GHN Station data. This API provides station_id to create shipping order**

**Syntax**

```php
\GiaoHangNhanh::getStation(
    [
        'ward_code' => $ward_code,
        'district_id' => (string) $district_id,
        'offset' => $offset,
        'limit' => $limit,
    ],
    $captcha
);
```

**Example**

```php
\GiaoHangNhanh::getStation(
        [
            'district_id' => '1490',
            'offset' => 0,
            'limit' => 1000,
        ],
        'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJleHAiOjE3MzI0MzQ3MzJ9.2ShiA7wJSodHo7cKHx6y2gZNBaFdY660v25ChTiz1eg'
);
```

**Result**

```php
array:13 [
  0 => array:12 [
    "address" => "5B Thanh Đàm, Phường Thanh Trì, Quận Hoàng Mai, TP Hà Nội."
    "locationCode" => "2481"
    "locationId" => 2481
    "locationName" => "Bưu Cục 5B Thanh Đàm-Q.Hoàng Mai-HN"
    "parentLocation" => array:5 [
      0 => "REGION/G"
      1 => "PROVINCE/201"
      2 => "DISTRICT/1490"
      3 => "WARD/1A0809"
      4 => "SECTION/EXREG0016S"
    ]
    "email" => ""
    "latitude" => 20.993147
    "longitude" => 105.890853
    "wardName" => "Phường Thanh Trì"
    "districtName" => "Quận Hoàng Mai"
    "provinceName" => "Hà Nội"
    "iframeMap" => "<iframe width=600 height=400 style=border:0 loading=lazy allowfullscreen src='https://maps.google.com/maps?q=20.993147,105.890853&amp;t=&amp;z=14&amp;ie=UTF8&amp;iwloc=B&amp;output=embed'></iframe>"
  ]
  ...
]
```

### #18 [Calculate the expected delivery time](https://api.ghn.vn/home/docs/detail?id=52)

**Accurate time will be delivered to guests**

**Syntax**

```php
\GiaoHangNhanh::calculateExpectedDeliveryTime([
    'from_ward_code' => $from_ward_code,
    'from_district_id' => $from_district_id,
    'to_ward_code' => $to_ward_code,
    'to_district_id' => $to_district_id,
    'service_id' => $service_id,
]);
```

**Example**

```php
\GiaoHangNhanh::calculateExpectedDeliveryTime([
    'from_ward_code' => '21211',
    'from_district_id' => 1454,
    'to_ward_code' => '21012',
    'to_district_id' => 1452,
    'service_id' => 53320,
]);
```

**Result**

```php
array:2 [
  "leadtime" => 1732579199
  "order_date" => 0
]
```

### #19 [Pick Shift](https://api.ghn.vn/home/docs/detail?id=114)

**Automatic Get Pick shift in order**

**Syntax**

```php
\GiaoHangNhanh::pickShift();
```

**Result**

```php
array:3 [
  0 => array:4 [
    "id" => 2
    "title" => "Ca lấy 24-11-2024 (12h00 - 18h00)"
    "from_time" => 43200
    "to_time" => 64800
  ]
  ...
]
```

### #20 [Create Store](https://api.ghn.vn/home/docs/detail?id=58)

**Use to create new Store. Each account can have many Store and each Store is a place to help GHN know where to pick up
items**

**Syntax**

```php
\GiaoHangNhanh::createStore([
    'ward_code' => $ward_code,
    'district_id' => $district_id,
    'name' => $name,
    'phone' => $phone,
    'address' => $address,
]);
```

**Example**

```php
\GiaoHangNhanh::createStore([
        'ward_code' => '21211',
        'district_id' => 1454,
        'name' => 'Tin1123',
        'phone' => '0982213854',
        'address' => '35 dd p12 qtb',
]);
```

**Result**

```php
return 5476329;
```

### #21 [Get Store](https://api.ghn.vn/home/docs/detail?id=79)

**Get the current Store of logged in client. One client can have many pick up addresses. Each address is a Store**

**Syntax**

```php
\GiaoHangNhanh::getStore([
    'clientphone' => $clientphone,
    'offset' => $offset,
    'limit' => $limit,
]);
```

**Example**

```php
\GiaoHangNhanh::getStore([
    'offset' => 0,
    'limit' => 1000,
]);
```

**Result**

```php
array:2 [
  "last_offset" => 6110079
  "shops" => array:17 [
    0 => array:22 [
      "_id" => 5476329
      "name" => "Tin1123"
      "phone" => "0982213854"
      "address" => "35 dd p12 qtb"
      "ward_code" => "21211"
      "district_id" => 1454
      "client_id" => 164936
      "bank_account_id" => 0
      "status" => 1
      "location" => []
      "version_no" => "af3ac2dd-430a-41dd-9e04-f410ffa1418b"
      "is_created_chat_channel" => false
      "updated_ip" => "171.224.178.184"
      "updated_employee" => 0
      "updated_client" => 164936
      "updated_source" => "shiip"
      "updated_date" => "2024-11-24T04:49:17.521Z"
      "created_ip" => "171.224.178.184"
      "created_employee" => 0
      "created_client" => 164936
      "created_source" => "shiip"
      "created_date" => "2024-11-24T04:49:17.521Z"
    ]
    ...
  ]
]
```

### #22 [Create Ticket](https://api.ghn.vn/home/docs/detail?id=70)

**Create Ticket then need support your order**

**Syntax**

```php
\GiaoHangNhanh::createTicket([
    'order_code' => $order_code,
    'category' => $category,
    'attachments' => $attachments,
    'description' => $description,
    'c_email' => $c_email,
]);
```

**Example**

```php
\GiaoHangNhanh::createTicket([
    'c_email' => 'cskh@ghn.vn',
    'order_code' => 'G8ADKBRF',
    'category' => 'Tư vấn',
    'description' => 'Tạo yêu cầu test',
]);
```

**Result**

```php
array:12 [
  "attachments" => []
  "client_id" => "SHOP-5353886"
  "conversations" => null
  "created_at" => "2024-11-24T04:59:19Z"
  "created_by" => 2043022450559
  "description" => "Tạo yêu cầu test"
  "id" => 26955201
  "order_code" => "G8ADKBRF"
  "status" => "Đang xử lý"
  "status_id" => 1
  "type" => "Tư vấn"
  "updated_at" => "2024-11-24T04:59:19Z"
]
```

### #23 [Create Feedback of Ticket](https://api.ghn.vn/home/docs/detail?id=69)

**Reply Feedback of Ticket**

**Syntax**

```php
\GiaoHangNhanh::createFeedbackTicket([
    'ticket_id' => $ticket_id,
    'attachments' => $attachments,
    'description' => $description,
]);
```

**Example**

```php
\GiaoHangNhanh::createFeedbackTicket([
    'ticket_id' => 26955201,
    'description' => 'Tạo yêu cầu test',
]);
```

**Result**

```php
array:5 [
  "body" => "<div>Tạo yêu cầu test</div>"
  "created_at" => "2024-11-24T05:02:00Z"
  "from_email" => ""Email Support Khách hàng GHN" <cskh@ghn.vn>"
  "updated_at" => "2024-11-24T05:02:00Z"
  "user_id" => 2043022450559
]
```

### #24 [Get Ticket List](https://api.ghn.vn/home/docs/detail?id=57)

**Get all ticket to created**

**Syntax**

```php
\GiaoHangNhanh::getTicketList([
    'offset' => $offset,
    'limit' => $limit,
]);
```

**Example**

```php
\GiaoHangNhanh::getTicketList([
    'offset' => 0,
    'limit' => 1000,
]);
```

**Result**

```php
array:30 [
  0 => array:12 [
    "attachments" => null
    "client_id" => "SHOP-5353886"
    "conversations" => null
    "created_at" => "2024-11-24T04:59:19Z"
    "created_by" => 2043022450559
    "description" => "Tạo yêu cầu test"
    "id" => 26955201
    "order_code" => "G8ADKBRF"
    "status" => "Đang xử lý"
    "status_id" => 1
    "type" => "Tư vấn"
    "updated_at" => "2024-11-24T05:02:00Z"
  ]
  ...
]
```

### #25 [Get Ticket](https://api.ghn.vn/home/docs/detail?id=68)

**Get all ticket to created**

**Syntax**

```php
\GiaoHangNhanh::getTicket($ticket_id);
```

**Example**

```php
\GiaoHangNhanh::getTicket(26955201);
```

**Result**

```php
array:15 [
  "attachments" => []
  "c_email" => "nguyenductri2k3@gmail.com"
  "c_name" => "Nguyễn Đức Trí"
  "c_phone" => "0982213854"
  "client_id" => "SHOP-5353886"
  "conversations" => array:1 [
    0 => array:5 [
      "body" => "<div>Tạo yêu cầu test</div>"
      "created_at" => "2024-11-24T05:02:00Z"
      "from_email" => ""Email Support Khách hàng GHN" <cskh@ghn.vn>"
      "updated_at" => "2024-11-24T05:02:00Z"
      "user_id" => 2043022450559
    ]
  ]
  "created_at" => "2024-11-24T04:59:19Z"
  "created_by" => 2043022450559
  "description" => "Tạo yêu cầu test"
  "id" => 26955201
  "order_code" => "G8ADKBRF"
  "status" => "Đang xử lý"
  "status_id" => 1
  "type" => "Tư vấn"
  "updated_at" => "2024-11-24T05:02:00Z"
]
```

### #26 Get Tracking Url

**Syntax**

```php
\GiaoHangNhanh::getTrackingUrl($order_code);
```

**Example**

```php
\GiaoHangNhanh::getTrackingUrl('G8ADKBRF');
```

**Result**

```php
"https://donhang.ghn.vn?order_code=G8ADKBRF"
```

### #27 [Fail Code - Reason new](https://api.ghn.vn/home/docs/detail?id=121)

**Syntax**

```php
\TriNguyenDuc\GiaoHangNhanh\Enums\OrderReason::values();
```

**Result**

```php
array:30 [
  0 => "Lấy không thành công: Người gửi hẹn lại ngày lấy hàng"
  1 => "Lấy không thành công: Thông tin lấy hàng sai (địa chỉ / SĐT)"
  2 => "Lấy không thành công: Thuê bao không liên lạc được / Máy bận"
  3 => "Lấy không thành công: Người gửi không nghe máy"
  4 => "Lấy không thành công: Người gửi muốn gửi hàng tại bưu cục"
  5 => "Lấy không thành công: Hàng vi phạm quy định khối lượng, kích thước"
  6 => "Lấy không thành công: Hàng vi phạm quy cách đóng gói"
  7 => "Lấy không thành công: Người gửi không muốn gửi hàng nữa"
  8 => "Lấy không thành công: Hàng hóa GHN không vận chuyển"
  9 => "Lấy không thành công: Nhân viên gặp sự cố"
  10 => "Giao không thành công: Người nhận hẹn lại ngày giao"
  11 => "Giao không thành công: Không liên lạc được người nhận / Chặn số"
  12 => "Giao không thành công: Người nhận không nghe máy"
  13 => "Giao không thành công: Sai thông tin người nhận (địa chỉ / SĐT)"
  14 => "Giao không thành công: Người nhận đổi địa chỉ giao hàng"
  15 => "Giao không thành công: Người nhận từ chối nhận do không cho xem / thử hàng"
  16 => "Giao không thành công: Người nhận từ chối nhận do sai sản phẩm"
  17 => "Giao không thành công: Người nhận từ chối nhận do sai COD"
  18 => "Giao không thành công: Người nhận từ chối nhận do hàng hư hỏng"
  19 => "Giao không thành công: Người nhận từ chối nhận do không có tiền"
  20 => "Giao không thành công: Người nhận đổi ý không mua nữa"
  21 => "Giao không thành công: Người nhận báo không đặt hàng"
  22 => "Giao không thành công: Nhân viên gặp sự cố"
  23 => "Giao không thành công: Hàng suy suyển, bể vỡ trong quá trình vận chuyển"
  24 => "Trả không thành công: Người gửi hẹn lại ngày trả hàng"
  25 => "Trả không thành công: Người gửi đổi địa chỉ trả hàng"
  26 => "Trả không thành công: Người gửi không nghe máy"
  27 => "Trả không thành công: Người gửi từ chối nhận do sai sản phẩm"
  28 => "Trả không thành công: Người gửi từ chối nhận do hàng hư hỏng."
  29 => "Trả không thành công: Nhân viên gặp sự cố"
]
```

### #28 [List Of Shipping Status](https://api.ghn.vn/home/docs/detail?id=48)

**Syntax**

```php
\TriNguyenDuc\GiaoHangNhanh\Enums\OrderStatus::values();
```

**Result**

```php
array:22 [
  0 => "Chờ lấy hàng"
  1 => "Đang lấy hàng"
  2 => "Đang tương tác với người gửi"
  3 => "Lấy hàng thành công"
  4 => "Nhập kho"
  5 => "Đang trung chuyển"
  6 => "Đang phân loại"
  7 => "Đang giao hàng"
  8 => "Giao hàng thành công"
  9 => "Đang tương tác với người nhận"
  10 => "Giao hàng không thành công"
  11 => "Chờ xác nhận giao lại"
  12 => "Chuyển hoàn"
  13 => "Đang trung chuyển hàng hoàn"
  14 => "Đang phân loại hàng hoàn"
  15 => "Đang hoàn hàng"
  16 => "Hoàn hàng không thành công"
  17 => "Hoàn hàng thành công"
  18 => "Đơn huỷ"
  19 => "Hàng ngoại lệ"
  20 => "Hàng thất lạc"
  21 => "Hàng hư hỏng"
]
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
