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

### #2 [Get District](https://api.ghn.vn/home/docs/detail?id=78)

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

### #3 [Get Ward](https://api.ghn.vn/home/docs/detail?id=61)

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

### #4 [Calculate Fee](https://api.ghn.vn/home/docs/detail?id=76)

**This API can help Shop/Merchant get the shipping fee and provide to buyer before create shipping order by input some
information such as weight, height, length, width, to_district_id, to_ward_code, service_id**

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
    'items' => $items,
]);
```

```php
return [
    'total' => 124610,
    'service_fee' => 118993,
    'insurance_fee' => 5617,
    'pick_station_fee' => 0,
    'coupon_value' => 0,
    'r2s_fee' => 0,
    'return_again' => 0,
    'document_return' => 0,
    'double_check' => 0,
    'cod_fee' => 0,
    'pick_remote_areas_fee' => 0,
    'deliver_remote_areas_fee' => 0,
    'cod_failed_fee' => 0,
];
```

### #5 [Fee of Order Info](https://api.ghn.vn/home/docs/detail?id=71)

**This API help you get all fee of a order**

```php
\GiaoHangNhanh::feeOrderInfo($order_code);
```

```php
return [
    '_id' => 'Id (Hided)',
    'order_code' => 'Order code (Hided)',
    'detail' => [
        'main_service' => 93995,
        'insurance' => 11522,
        'cod_fee' => 0,
        'station_do' => 0,
        'station_pu' => 0,
        'return' => 0,
        'r2s' => 0,
        'return_again' => 0,
        'coupon' => 0,
        'document_return' => 0,
        'double_check' => 0,
        'double_check_deliver' => 0,
        'pick_remote_areas_fee' => 0,
        'deliver_remote_areas_fee' => 0,
        'pick_remote_areas_fee_return' => 0,
        'deliver_remote_areas_fee_return' => 0,
        'cod_failed_fee' => 0,
    ],
    'standard' => [
        'main_service' => 93995,
        'insurance' => 11522,
        'cod_fee' => 0,
        'station_do' => 0,
        'station_pu' => 0,
        'return' => 0,
        'r2s' => 0,
        'return_again' => 0,
        'coupon' => 0,
        'document_return' => 0,
        'double_check' => 0,
        'double_check_deliver' => 0,
        'pick_remote_areas_fee' => 0,
        'deliver_remote_areas_fee' => 0,
        'pick_remote_areas_fee_return' => 0,
        'deliver_remote_areas_fee_return' => 0,
        'cod_failed_fee' => 0,
    ],
    'payment' => [
        0 => [
            'diff' => [
                'main_service' => 93995,
                'insurance' => 11522,
                'cod_fee' => 0,
                'station_do' => 0,
                'station_pu' => 0,
                'return' => 0,
                'r2s' => 0,
                'return_again' => 0,
                'coupon' => 0,
                'document_return' => 0,
                'double_check' => 0,
                'double_check_deliver' => 0,
                'pick_remote_areas_fee' => 0,
                'deliver_remote_areas_fee' => 0,
                'pick_remote_areas_fee_return' => 0,
                'deliver_remote_areas_fee_return' => 0,
                'cod_failed_fee' => 0,
            ],
            'value' => 105517,
            'payment_type' => 2,
            'paid_date' => '0001-01-01T00:00:00Z',
            'created_date' => '2024-10-21T05:22:25.059Z',
        ],
    ],
    'cod_collect_date' => '0001-01-01T00:00:00Z',
    'transaction_id' => '44d2b24b-d3a3-4865-8a29-13697dc28a97',
    'created_ip' => '',
    'created_date' => '2024-10-21T05:22:25.059Z',
    'updated_ip' => '',
    'updated_client' => 0,
    'updated_employee' => 0,
    'updated_source' => '',
    'updated_date' => '2024-10-21T05:22:25.059Z',
];
```

### #6 [Get Service](https://api.ghn.vn/home/docs/detail?id=77)

**Use to get list of available services from district pick up items and to district drop off items (Full information)**

```php
\GiaoHangNhanh::getService([
    'from_district' => $from_district,
    'to_district' => $to_district,
]);
```

```php
return [
    0 => [
        'service_id' => 53323,
        'short_name' => 'Hàng nhẹ',
        'service_type_id' => 2,
        'config_fee_id' => '',
        'extra_cost_id' => '',
        'standard_config_fee_id' => '',
        'standard_extra_cost_id' => '',
        'ecom_config_fee_id' => 684,
        'ecom_extra_cost_id' => 103,
        'ecom_standard_config_fee_id' => 684,
        'ecom_standard_extra_cost_id' => 103,
    ],
    1 => [
        'service_id' => 100039,
        'short_name' => 'Hàng nặng',
        'service_type_id' => 5,
        'config_fee_id' => '66c59e887e9ffb387092daa8',
        'extra_cost_id' => '65dedfd6b5bd2050b45c0ddf',
        'standard_config_fee_id' => '66c59e887e9ffb387092daa8',
        'standard_extra_cost_id' => '65dedfd6b5bd2050b45c0ddf',
        'ecom_config_fee_id' => 0,
        'ecom_extra_cost_id' => 0,
        'ecom_standard_config_fee_id' => 0,
        'ecom_standard_extra_cost_id' => 0,
    ],
];
```

### #7 [Preview Order](https://api.ghn.vn/home/docs/detail?id=81)

**Helps preview order information without creating an order**

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
    'items' => $items,
    'cod_failed_amount' => $cod_failed_amount,
]);
```

```php
return [
    'order_code' => '',
    'sort_code' => 'B-100-U-02-A5',
    'trans_type' => 'truck',
    'ward_encode' => '',
    'district_encode' => '',
    'fee' => [
        'main_service' => 88996,
        'insurance' => 20879,
        'cod_fee' => 0,
        'station_do' => 0,
        'station_pu' => 0,
        'return' => 0,
        'r2s' => 0,
        'return_again' => 0,
        'coupon' => 0,
        'document_return' => 0,
        'double_check' => 0,
        'double_check_deliver' => 0,
        'pick_remote_areas_fee' => 0,
        'deliver_remote_areas_fee' => 0,
        'pick_remote_areas_fee_return' => 0,
        'deliver_remote_areas_fee_return' => 0,
        'cod_failed_fee' => 0,
    ],
    'total_fee' => 109875,
    'expected_delivery_time' => '2024-10-24T23:59:59Z',
    'operation_partner' => '',
];
```

### #8 [Create Order](https://api.ghn.vn/home/docs/detail?id=123)

**Automatic send order information such as weight, address, phone number and many more to GHN system. We will process
these information and start the shipment**

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
    'items' => $items,
    'cod_failed_amount' => $cod_failed_amount,
]);
```

```php
return [
    'order_code' => 'Order code (Hided)',
    'sort_code' => '400-B-02-C4',
    'trans_type' => 'truck',
    'ward_encode' => '',
    'district_encode' => '',
    'fee' => [
        'main_service' => 249508,
        'insurance' => 13070,
        'cod_fee' => 0,
        'station_do' => 0,
        'station_pu' => 0,
        'return' => 0,
        'r2s' => 0,
        'return_again' => 0,
        'coupon' => 0,
        'document_return' => 0,
        'double_check' => 0,
        'double_check_deliver' => 0,
        'pick_remote_areas_fee' => 0,
        'deliver_remote_areas_fee' => 0,
        'pick_remote_areas_fee_return' => 0,
        'deliver_remote_areas_fee_return' => 0,
        'cod_failed_fee' => 0,
    ],
    'total_fee' => 262578,
    'expected_delivery_time' => '2024-10-23T23:59:59Z',
    'operation_partner' => '',
];
```

### #9 [Update Order](https://api.ghn.vn/home/docs/detail?id=75)

**Update information of created order. Only available when shipping status**

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
    'items' => $items,
]);
```

```php
return null;
```

### #10 [Update COD of Order](https://api.ghn.vn/home/docs/detail?id=64)

**Update value for COD**

```php
\GiaoHangNhanh::updateCodOrder([
    'order_code' => $order_code,
    'cod_amount' => $insurance_value,
]);
```

```php
return null;
```

### #11 [Order Info](https://api.ghn.vn/home/docs/detail?id=66)

**This API help you get all information of a order. You can know current status or the reason which make the shipment
failed**

```php
\GiaoHangNhanh::orderInfo($order_code);
```

```php
return [
    'shop_id' => 5353886,
    'client_id' => 164936,
    'return_name' => 'Store Name (Hided)',
    'return_phone' => 'Store Phone (Hided)',
    'return_address' => 'Store Address (Hided)',
    'return_ward_code' => 'Store Ward Code (Hided)',
    'return_district_id' => 1490,
    'return_location' => [
        'lat' => 20.9922261,
        'long' => 105.8623596,
        'cell_code' => 'AHTAZZD5',
        'place_id' => 'Store Place Id (Hided)',
        'trust_level' => 5,
        'wardcode' => 'Store Ward Code (Hided)',
    ],
    'from_name' => 'Store Name (Hided)',
    'from_phone' => 'Store Phone (Hided)',
    'from_hotline' => '',
    'from_address' => 'Store Address (Hided)',
    'from_ward_code' => 'Store Ward Code (Hided)',
    'from_district_id' => 1490,
    'from_location' => [
        'lat' => 20.9922261,
        'long' => 105.8623596,
        'cell_code' => 'AHTAZZD5',
        'place_id' => 'Store Place Id (Hided)',
        'trust_level' => 5,
        'wardcode' => 'Store Ward Code (Hided)',
    ],
    'deliver_station_id' => 0,
    'to_name' => 'Lê Diệu Công',
    'to_phone' => '0346416430',
    'to_address' => "\"\"
    829 Little Squares\n
    East Bianka, IN 89167-6684
\"\"",
    'to_ward_code' => '190814',
    'to_district_id' => 1969,
    'to_location' => [
        'lat' => 21.019662626329,
        'long' => 106.24778397527,
        'cell_code' => 'AIMBAALC',
        'trust_level' => 5,
        'wardcode' => '190814',
    ],
    'weight' => 21000,
    'length' => 100,
    'width' => 64,
    'height' => 48,
    'converted_weight' => 48840,
    'calculate_weight' => 56080,
    'image_ids' => null,
    'service_type_id' => 5,
    'service_id' => 100039,
    'payment_type_id' => 1,
    'payment_type_ids' => [
        0 => 1,
    ],
    'custom_service_fee' => 0,
    'sort_code' => '400-C-02-C4',
    'cod_amount' => 0,
    'cod_collect_date' => null,
    'cod_transfer_date' => null,
    'is_cod_transferred' => false,
    'is_cod_collected' => false,
    'insurance_value' => 1306961,
    'order_value' => 0,
    'pick_station_id' => 0,
    'client_order_code' => 'Client order code (Hided)',
    'cod_failed_amount' => 0,
    'cod_failed_collect_date' => null,
    'required_note' => 'CHOTHUHANG',
    'content' => 'Sản phẩm 1 [1 kiện], Sản phẩm 2 [1 kiện]',
    'note' => '',
    'employee_note' => '',
    'seal_code' => '',
    'pickup_time' => '2024-10-21T04:53:27.24Z',
    'items' => [
        0 => [
            'name' => 'Sản phẩm 1',
            'quantity' => 1,
            'length' => 50,
            'width' => 12,
            'height' => 23,
            'category' => [],
            'weight' => 10000,
            'status' => '',
            'item_order_code' => 'Order code (Hided)_1',
        ],
        1 => [
            'name' => 'Sản phẩm 2',
            'quantity' => 1,
            'length' => 64,
            'width' => 100,
            'height' => 36,
            'category' => [],
            'weight' => 11000,
            'status' => '',
            'item_order_code' => 'Order code (Hided)_2',
        ],
    ],
    'coupon' => '',
    'coupon_campaign_id' => 0,
    '_id' => 'Id (Hided)',
    'order_code' => 'Order code (Hided)',
    'version_no' => 'fbd0cec0-2bf1-4f98-b8d5-f69e72c18bee',
    'updated_ip' => '171.224.178.226',
    'updated_employee' => 0,
    'updated_client' => 164936,
    'updated_source' => 'shiip',
    'updated_date' => '2024-10-21T04:53:28.11Z',
    'updated_warehouse' => 0,
    'created_ip' => '171.224.178.226',
    'created_employee' => 0,
    'created_client' => 164936,
    'created_source' => 'shiip',
    'created_date' => '2024-10-21T04:53:27.153Z',
    'status' => 'ready_to_pick',
    'internal_process' => [
        'status' => '',
        'type' => '',
    ],
    'pick_warehouse_id' => 21429000,
    'deliver_warehouse_id' => 20969000,
    'current_warehouse_id' => 21429000,
    'return_warehouse_id' => 21429000,
    'next_warehouse_id' => 0,
    'current_transport_warehouse_id' => 0,
    'leadtime' => '2024-10-23T23:59:59Z',
    'order_date' => '2024-10-21T04:53:27.24Z',
    'data' => [],
    'soc_id' => '6715de4780c6e6ad120515da',
    'finish_date' => null,
    'tag' => [
        0 => 'bulky',
        1 => 'multiple',
        2 => 'truck',
    ],
    'is_partial_return' => false,
    'is_document_return' => false,
    'pickup_shift' => [],
    'transaction_ids' => [
        0 => '8c615700-41c7-42cc-9110-5edbb48655d2',
    ],
    'transportation_status' => '',
    'transportation_phase' => '',
    'extra_service' => [
        'document_return' => null,
        'double_check' => false,
    ],
    'config_fee_id' => '66c59e887e9ffb387092daa8',
    'extra_cost_id' => '65dedfd6b5bd2050b45c0ddf',
    'standard_config_fee_id' => '66c59e887e9ffb387092daa8',
    'standard_extra_cost_id' => '65dedfd6b5bd2050b45c0ddf',
    'ecom_config_fee_id' => 0,
    'ecom_extra_cost_id' => 0,
    'ecom_standard_config_fee_id' => 0,
    'ecom_standard_extra_cost_id' => 0,
    'is_b2b' => false,
    'operation_partner' => '',
    'process_partner_name' => '',
    'type_order' => 'freight',
    'type_order_code' => 'FSME',
];
```

### #12 [Order Info by Client_Order_Code](https://api.ghn.vn/home/docs/detail?id=119)

**This API help you get all information of a order. You can know current status or the reason which make the shipment
failed**

```php
\GiaoHangNhanh::orderInfoByClientOrderCode($client_order_code);
```

```php
return [
    'shop_id' => 5353886,
    'client_id' => 164936,
    'return_name' => 'Store Name (Hided)',
    'return_phone' => 'Store Phone (Hided)',
    'return_address' => 'Store Address (Hided)',
    'return_ward_code' => 'Store Ward Code (Hided)',
    'return_district_id' => 1490,
    'return_location' => [
        'lat' => 20.9922261,
        'long' => 105.8623596,
        'cell_code' => 'AHTAZZD5',
        'place_id' => 'Store Place Id (Hided)',
        'trust_level' => 5,
        'wardcode' => 'Store Ward Code (Hided)',
    ],
    'from_name' => 'Store Name (Hided)',
    'from_phone' => 'Store Phone (Hided)',
    'from_hotline' => '',
    'from_address' => 'Store Address (Hided)',
    'from_ward_code' => 'Store Ward Code (Hided)',
    'from_district_id' => 1490,
    'from_location' => [
        'lat' => 20.9922261,
        'long' => 105.8623596,
        'cell_code' => 'AHTAZZD5',
        'place_id' => 'Store Place Id (Hided)',
        'trust_level' => 5,
        'wardcode' => 'Store Ward Code (Hided)',
    ],
    'deliver_station_id' => 0,
    'to_name' => 'Lê Diệu Công',
    'to_phone' => '0346416430',
    'to_address' => "\"\"
829 Little Squares\n
East Bianka, IN 89167-6684
\"\"",
    'to_ward_code' => '190814',
    'to_district_id' => 1969,
    'to_location' => [
        'lat' => 21.019662626329,
        'long' => 106.24778397527,
        'cell_code' => 'AIMBAALC',
        'trust_level' => 5,
        'wardcode' => '190814',
    ],
    'weight' => 21000,
    'length' => 100,
    'width' => 64,
    'height' => 48,
    'converted_weight' => 48840,
    'calculate_weight' => 56080,
    'image_ids' => null,
    'service_type_id' => 5,
    'service_id' => 100039,
    'payment_type_id' => 1,
    'payment_type_ids' => [
        0 => 1,
    ],
    'custom_service_fee' => 0,
    'sort_code' => '400-C-02-C4',
    'cod_amount' => 0,
    'cod_collect_date' => null,
    'cod_transfer_date' => null,
    'is_cod_transferred' => false,
    'is_cod_collected' => false,
    'insurance_value' => 1306961,
    'order_value' => 0,
    'pick_station_id' => 0,
    'client_order_code' => 'Client order code (Hided)',
    'cod_failed_amount' => 0,
    'cod_failed_collect_date' => null,
    'required_note' => 'CHOTHUHANG',
    'content' => 'Sản phẩm 1 [1 kiện], Sản phẩm 2 [1 kiện]',
    'note' => '',
    'employee_note' => '',
    'seal_code' => '',
    'pickup_time' => '2024-10-21T04:53:27.24Z',
    'items' => [
        0 => [
            'name' => 'Sản phẩm 1',
            'quantity' => 1,
            'length' => 50,
            'width' => 12,
            'height' => 23,
            'category' => [],
            'weight' => 10000,
            'status' => '',
            'item_order_code' => 'Order code (Hided)_1',
        ],
        1 => [
            'name' => 'Sản phẩm 2',
            'quantity' => 1,
            'length' => 64,
            'width' => 100,
            'height' => 36,
            'category' => [],
            'weight' => 11000,
            'status' => '',
            'item_order_code' => 'Order code (Hided)_2',
        ],
    ],
    'coupon' => '',
    'coupon_campaign_id' => 0,
    '_id' => 'Id (Hided)',
    'order_code' => 'Order code (Hided)',
    'version_no' => 'fbd0cec0-2bf1-4f98-b8d5-f69e72c18bee',
    'updated_ip' => '171.224.178.226',
    'updated_employee' => 0,
    'updated_client' => 164936,
    'updated_source' => 'shiip',
    'updated_date' => '2024-10-21T04:53:28.11Z',
    'updated_warehouse' => 0,
    'created_ip' => '171.224.178.226',
    'created_employee' => 0,
    'created_client' => 164936,
    'created_source' => 'shiip',
    'created_date' => '2024-10-21T04:53:27.153Z',
    'status' => 'ready_to_pick',
    'internal_process' => [
        'status' => '',
        'type' => '',
    ],
    'pick_warehouse_id' => 21429000,
    'deliver_warehouse_id' => 20969000,
    'current_warehouse_id' => 21429000,
    'return_warehouse_id' => 21429000,
    'next_warehouse_id' => 0,
    'current_transport_warehouse_id' => 0,
    'leadtime' => '2024-10-23T23:59:59Z',
    'order_date' => '2024-10-21T04:53:27.24Z',
    'data' => [],
    'soc_id' => '6715de4780c6e6ad120515da',
    'finish_date' => null,
    'tag' => [
        0 => 'bulky',
        1 => 'multiple',
        2 => 'truck',
    ],
    'is_partial_return' => false,
    'is_document_return' => false,
    'pickup_shift' => [],
    'transaction_ids' => [
        0 => '8c615700-41c7-42cc-9110-5edbb48655d2',
    ],
    'transportation_status' => '',
    'transportation_phase' => '',
    'extra_service' => [
        'document_return' => null,
        'double_check' => false,
    ],
    'config_fee_id' => '66c59e887e9ffb387092daa8',
    'extra_cost_id' => '65dedfd6b5bd2050b45c0ddf',
    'standard_config_fee_id' => '66c59e887e9ffb387092daa8',
    'standard_extra_cost_id' => '65dedfd6b5bd2050b45c0ddf',
    'ecom_config_fee_id' => 0,
    'ecom_extra_cost_id' => 0,
    'ecom_standard_config_fee_id' => 0,
    'ecom_standard_extra_cost_id' => 0,
    'is_b2b' => false,
    'operation_partner' => '',
    'process_partner_name' => '',
    'type_order' => 'freight',
    'type_order_code' => 'FSME',
];
```

### #13 [Return Order](https://api.ghn.vn/home/docs/detail?id=72)

**The purpose of changing the status of an order to delivery is only applicable where the current status of the order
is: storage or waiting for delivery**

```php
\GiaoHangNhanh::returnOrder([$order_code]);
```

```php
return [
    'order_code' => 'Order code (Hided)',
    'result' => true,
    'message' => 'OK',
];
```

### #14 [Delivery Again](https://api.ghn.vn/home/docs/detail?id=65)

- **Orders that have been repeatedly delivered are unsuccessful, will go into waiting for delivery (waiting time for
  delivery depends on each customer's contract, the default is 24h)**
- **During this period, customer can request delivery of the order again, order status after delivery request will
  become "storage"**

```php
\GiaoHangNhanh::deliveryAgain([$order_code]);
```

```php
return [
    'order_code' => 'Order code (Hided)',
    'result' => true,
    'message' => 'OK',
];
```

### #15 [Print Order](https://api.ghn.vn/home/docs/detail?id=67)

```php
\GiaoHangNhanh::printOrder([$order_code]);
```

```php
return [
    'A5' => 'https://online-gateway.ghn.vn/a5/public-api/printA5?token=32dd2311-8f6e-11ef-aa80-fa22946d6b9f',
    '80x80' => 'https://online-gateway.ghn.vn/a5/public-api/print80x80?token=32dd2311-8f6e-11ef-aa80-fa22946d6b9f',
    '52x70' => 'https://online-gateway.ghn.vn/a5/public-api/print52x70?token=32dd2311-8f6e-11ef-aa80-fa22946d6b9f',
];
```

### #16 [Cancel Order](https://api.ghn.vn/home/docs/detail?id=73)

**Cancel a shipping order from GHN**

```php
\GiaoHangNhanh::cancelOrder([$order_code]);
```

```php
return [
    'order_code' => 'Order code (Hided)',
    'result' => true,
    'message' => 'OK',
];
```

### #17 [Get Station](https://api.ghn.vn/home/docs/detail?id=62)

**Get GHN Station data. This API provides station_id to create shipping order**

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

```php
return [
    0 => [
        'address' => "40 Nguyễn Văn Linh, Thị trấn Ea T'Ling, Huyện Cư Jút, Tỉnh Đăk Nông",
        'locationCode' => '20673000',
        'locationId' => 20673000,
        'locationName' => 'Bưu Cục 40 Nguyễn Văn Linh-Cư Jút-Đắk Nông',
        'parentLocation' => [
            0 => 'PROVINCE/241',
            1 => 'DISTRICT/3152',
            2 => 'WARD/630401',
            3 => 'REGION/H',
        ],
        'email' => '',
        'latitude' => 12.591587,
        'longitude' => 107.896341,
        'wardName' => "Thị trấn Ea T'Ling",
        'districtName' => 'Huyện Cư Jút',
        'provinceName' => 'Đắk Nông',
        'iframeMap' => "<iframe width=600 height=400 style=border:0 loading=lazy allowfullscreen src='https://maps.google.com/maps?q=12.591587,107.896341&amp;t=&amp;z=14&amp;ie=UTF8&amp;iwloc=B&amp;output=embed'></iframe>",
    ],
];
```

### #18 [Calculate the expected delivery time](https://api.ghn.vn/home/docs/detail?id=52)

**Accurate time will be delivered to guests**

```php
\GiaoHangNhanh::calculateExpectedDeliveryTime([
    'from_ward_code' => $from_ward_code,
    'from_district_id' => $from_district_id,
    'to_ward_code' => $to_ward_code,
    'to_district_id' => $to_district_id,
    'service_id' => $service_id,
]);
```

```php
return [
    'leadtime' => 1729814399,
    'order_date' => 0,
];
```

### #19 [Pick Shift](https://api.ghn.vn/home/docs/detail?id=114)

**Automatic Get Pick shift in order**

```php
\GiaoHangNhanh::pickShift();
```

```php
return [
    0 => [
        'id' => 2,
        'title' => 'Ca lấy 21-10-2024 (12h00 - 18h00)',
        'from_time' => 43200,
        'to_time' => 64800,
    ],
    1 => [
        'id' => 3,
        'title' => 'Ca lấy 22-10-2024 (7h00 - 12h00)',
        'from_time' => 111600,
        'to_time' => 129600,
    ],
    2 => [
        'id' => 4,
        'title' => 'Ca lấy 22-10-2024 (12h00 - 18h00)',
        'from_time' => 129600,
        'to_time' => 151200,
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
