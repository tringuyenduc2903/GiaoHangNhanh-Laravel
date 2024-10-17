# GiaoHangNhanh SDK for Laravel Framework

[![Latest Version on Packagist](https://img.shields.io/packagist/v/tringuyenduc2903/giaohangnhanh-laravel.svg?style=flat-square)](https://packagist.org/packages/tringuyenduc2903/giaohangnhanh-laravel)
[![GitHub Tests Action Status](https://img.shields.io/github/actions/workflow/status/tringuyenduc2903/giaohangnhanh-laravel/run-tests.yml?branch=main&label=tests&style=flat-square)](https://github.com/tringuyenduc2903/giaohangnhanh-laravel/actions?query=workflow%3Arun-tests+branch%3Amain)
[![GitHub Code Style Action Status](https://img.shields.io/github/actions/workflow/status/tringuyenduc2903/giaohangnhanh-laravel/fix-php-code-style-issues.yml?branch=main&label=code%20style&style=flat-square)](https://github.com/tringuyenduc2903/giaohangnhanh-laravel/actions?query=workflow%3A"Fix+PHP+code+style+issues"+branch%3Amain)
[![Total Downloads](https://img.shields.io/packagist/dt/tringuyenduc2903/giaohangnhanh-laravel.svg?style=flat-square)](https://packagist.org/packages/tringuyenduc2903/giaohangnhanh-laravel)

## Requirements

- Laravel **10**, **11**
- PHP **8.2**, **8.3**

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
    'base_url' => env(
        'GHN_BASE_URL',
        env('APP_ENV', 'local') === 'production'
            ? env('GHN_PROD_BASE_URL', 'https://online-gateway.ghn.vn')
            : env('GHN_DEV_BASE_URL', 'https://dev-online-gateway.ghn.vn')
    ),
    'tracking_url' => env(
        'GHN_TRACKING_URL',
        env('APP_ENV', 'local') === 'production'
            ? env('GHN_PROD_TRACKING_URL', 'https://donhang.ghn.vn')
            : env('GHN_DEV_TRACKING_URL', 'https://tracking.ghn.dev')
    ),
    'token' => env('GHN_TOKEN'),
    'shop_id' => env('GHN_SHOP_ID'),
    'shop_district_id' => env('GHN_SHOP_DISTRICT_ID'),
];
```

## Usage

```php
use TriNguyenDuc\GiaoHangNhanh\Facades\GiaoHangNhanh;
```

### [Preview Order](https://api.ghn.vn/home/docs/detail?id=81)

**Helps preview order information without creating an order**

```php
GiaoHangNhanh::previewOrder([
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
    'sort_code' => 'K-000-U-00-00',
    'trans_type' => 'truck',
    'ward_encode' => '',
    'district_encode' => '',
    'fee' => [
        'main_service' => 27500,
        'insurance' => 0,
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
    'total_fee' => 27500,
    'expected_delivery_time' => '2024-10-18T23:59:59Z',
    'operation_partner' => '',
];
```

### [Create Order](https://api.ghn.vn/home/docs/detail?id=123)

**Automatic send order information such as weight, address, phone number and many more to GHN system. We will process
these information and start the shipment**

```php
GiaoHangNhanh::createOrder([
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
    'order_code' => 'LNYQHC',
    'sort_code' => 'K-000-U-00-00',
    'trans_type' => 'truck',
    'ward_encode' => '',
    'district_encode' => '',
    'fee' => [
        'main_service' => 27500,
        'insurance' => 0,
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
    'total_fee' => 27500,
    'expected_delivery_time' => '2024-10-18T23:59:59Z',
    'operation_partner' => '', 
];
```

### [Order Info](https://api.ghn.vn/home/docs/detail?id=66)

**This API help you get all information of a order. You can know current status or the reason which make the shipment
failed**

```php
GiaoHangNhanh::getOrderByOrderCode($order_code);
```

```php
return [
    'shop_id' => 193146,
    'client_id' => 2507884,
    'return_name' => 'Tên người đại diện cửa hàng',
    'return_phone' => '0982xxx854',
    'return_address' => 'Test, Đông Mỹ, Thanh Trì, Hà Nội, Việt Nam',
    'return_ward_code' => '1A1103',
    'return_district_id' => 1710,
    'return_location' => [],
    'from_name' => 'Tên người đại diện cửa hàng',
    'from_phone' => '0982xxx854',
    'from_hotline' => '',
    'from_address' => 'Test, Đông Mỹ, Thanh Trì, Hà Nội, Việt Nam',
    'from_ward_code' => '1A1103',
    'from_district_id' => 1710,
    'from_location' => [],
    'deliver_station_id' => 0,
    'to_name' => 'Tên khách hàng',
    'to_phone' => '0331xxx512',
    'to_address' => "Test",
    'to_ward_code' => '470610',
    'to_district_id' => 3196,
    'to_location' => [
        'lat' => 21.019662626329,
        'long' => 106.24778397527,
        'trust_level' => 5,
        'wardcode' => '190814',
        'map_source' => 'ass_service',
    ],
    'weight' => 150,
    'length' => 10,
    'width' => 10,
    'height' => 10,
    'converted_weight' => 200,
    'calculate_weight' => 200,
    'image_ids' => null,
    'service_type_id' => 2,
    'service_id' => 53322,
    'payment_type_id' => 2,
    'payment_type_ids' => [
        0 => 2,
        1 => 2,
        2 => 1,
        3 => 1,
        4 => 2,
    ],
    'custom_service_fee' => 0,
    'sort_code' => 'K-000-U-00-00',
    'cod_amount' => 4500000,
    'cod_collect_date' => null,
    'cod_transfer_date' => null,
    'is_cod_transferred' => false,
    'is_cod_collected' => false,
    'insurance_value' => 1320000,
    'order_value' => 0,
    'pick_station_id' => 0,
    'client_order_code' => '',
    'cod_failed_amount' => 0,
    'cod_failed_collect_date' => null,
    'required_note' => 'KHONGCHOXEMHANG',
    'content' => 'Hồ Diệu Tiến [1 cái]',
    'note' => '',
    'employee_note' => '',
    'seal_code' => '',
    'pickup_time' => '2024-10-15T01:35:43.339Z',
    'items' => [
        0 => [
            'name' => 'Tên sản phẩm 1',
            'quantity' => 1,
            'length' => 10,
            'width' => 10,
            'height' => 10,
            'category' => [],
            'status' => '',
            'item_order_code' => 'LNYQT6_1',
        ],
    ],
    'coupon' => '',
    'coupon_campaign_id' => 0,
    '_id' => '670dc69b22fb11edcbe76bc2',
    'order_code' => 'LNYQT6',
    'version_no' => 'f92586d9-0b41-453a-91a0-5576fd010b79',
    'updated_ip' => '171.224.178.226',
    'updated_employee' => 0,
    'updated_client' => 2507884,
    'updated_source' => 'shiip',
    'updated_date' => '2024-10-15T01:36:16.123Z',
    'updated_warehouse' => 0,
    'created_ip' => '171.224.178.226',
    'created_employee' => 0,
    'created_client' => 2507884,
    'created_source' => 'shiip',
    'created_date' => '2024-10-15T01:34:19.49Z',
    'status' => 'cancel',
    'internal_process' => [
        'status' => '',
        'type' => '',
    ],
    'pick_warehouse_id' => 2456,
    'deliver_warehouse_id' => 1377,
    'current_warehouse_id' => 2456,
    'return_warehouse_id' => 1283,
    'next_warehouse_id' => 0,
    'current_transport_warehouse_id' => 0,
    'leadtime' => '2024-10-18T23:59:59Z',
    'order_date' => '2024-10-15T01:35:43.339Z',
    'data' => [],
    'soc_id' => '670dc6efa5ff0f515695f611',
    'finish_date' => '2024-10-15T01:36:16.123Z',
    'tag' => [
        0 => 'truck',
    ],
    'log' => [
        0 => [
            'status' => 'cancel',
            'payment_type_id' => 2,
            'trip_code' => '',
            'updated_date' => '2024-10-15T01:36:16.123Z',
        ],
    ],
    'is_partial_return' => false,
    'is_document_return' => false,
    'pickup_shift' => [],
    'transaction_ids' => [
        0 => '304b8acf-494f-479e-a8a4-fbdf111de12d',
        1 => '4257f2d9-dbf9-4045-b07b-3ab87840b819',
        2 => '8845d2df-2700-416a-8763-d2212f6b837d',
    ],
    'transportation_status' => '',
    'transportation_phase' => '',
    'extra_service' => [
        'document_return' => [
            'flag' => false,
        ],
        'double_check' => false,
        'lastmile_ahamove_bulky' => false,
        'lastmile_trip_code' => '',
        'original_deliver_warehouse_id' => 0,
    ],
    'config_fee_id' => '',
    'extra_cost_id' => '',
    'standard_config_fee_id' => '',
    'standard_extra_cost_id' => '',
    'ecom_config_fee_id' => 467,
    'ecom_extra_cost_id' => 19,
    'ecom_standard_config_fee_id' => 36,
    'ecom_standard_extra_cost_id' => 2,
    'is_b2b' => false,
    'operation_partner' => '',
    'process_partner_name' => '',
];
```

### [Order Info by Client_Order_Code](https://api.ghn.vn/home/docs/detail?id=119)

**This API help you get all information of a order. You can know current status or the reason which make the shipment
failed**

```php
GiaoHangNhanh::getOrderByClientOrderCode($client_order_code);

```

```php
return [
    'shop_id' => 193146,
    'client_id' => 2507884,
    'return_name' => 'Tên người đại diện cửa hàng',
    'return_phone' => '0982xxx854',
    'return_address' => 'Test, Đông Mỹ, Thanh Trì, Hà Nội, Việt Nam',
    'return_ward_code' => '1A1103',
    'return_district_id' => 1710,
    'return_location' => [],
    'from_name' => 'Tên người đại diện cửa hàng',
    'from_phone' => '0982xxx854',
    'from_hotline' => '',
    'from_address' => 'Test, Đông Mỹ, Thanh Trì, Hà Nội, Việt Nam',
    'from_ward_code' => '1A1103',
    'from_district_id' => 1710,
    'from_location' => [],
    'deliver_station_id' => 0,
    'to_name' => 'Tên khách hàng',
    'to_phone' => '0331xxx512',
    'to_address' => "Test",
    'to_ward_code' => '470610',
    'to_district_id' => 3196,
    'to_location' => [
        'lat' => 21.019662626329,
        'long' => 106.24778397527,
        'trust_level' => 5,
        'wardcode' => '190814',
        'map_source' => 'ass_service',
    ],
    'weight' => 150,
    'length' => 10,
    'width' => 10,
    'height' => 10,
    'converted_weight' => 200,
    'calculate_weight' => 200,
    'image_ids' => null,
    'service_type_id' => 2,
    'service_id' => 53322,
    'payment_type_id' => 2,
    'payment_type_ids' => [
        0 => 2,
        1 => 2,
        2 => 1,
        3 => 1,
        4 => 2,
    ],
    'custom_service_fee' => 0,
    'sort_code' => 'K-000-U-00-00',
    'cod_amount' => 4500000,
    'cod_collect_date' => null,
    'cod_transfer_date' => null,
    'is_cod_transferred' => false,
    'is_cod_collected' => false,
    'insurance_value' => 1320000,
    'order_value' => 0,
    'pick_station_id' => 0,
    'client_order_code' => '',
    'cod_failed_amount' => 0,
    'cod_failed_collect_date' => null,
    'required_note' => 'KHONGCHOXEMHANG',
    'content' => 'Hồ Diệu Tiến [1 cái]',
    'note' => '',
    'employee_note' => '',
    'seal_code' => '',
    'pickup_time' => '2024-10-15T01:35:43.339Z',
    'items' => [
        0 => [
            'name' => 'Tên sản phẩm 1',
            'quantity' => 1,
            'length' => 10,
            'width' => 10,
            'height' => 10,
            'category' => [],
            'status' => '',
            'item_order_code' => 'LNYQT6_1',
        ],
    ],
    'coupon' => '',
    'coupon_campaign_id' => 0,
    '_id' => '670dc69b22fb11edcbe76bc2',
    'order_code' => 'LNYQT6',
    'version_no' => 'f92586d9-0b41-453a-91a0-5576fd010b79',
    'updated_ip' => '171.224.178.226',
    'updated_employee' => 0,
    'updated_client' => 2507884,
    'updated_source' => 'shiip',
    'updated_date' => '2024-10-15T01:36:16.123Z',
    'updated_warehouse' => 0,
    'created_ip' => '171.224.178.226',
    'created_employee' => 0,
    'created_client' => 2507884,
    'created_source' => 'shiip',
    'created_date' => '2024-10-15T01:34:19.49Z',
    'status' => 'cancel',
    'internal_process' => [
        'status' => '',
        'type' => '',
    ],
    'pick_warehouse_id' => 2456,
    'deliver_warehouse_id' => 1377,
    'current_warehouse_id' => 2456,
    'return_warehouse_id' => 1283,
    'next_warehouse_id' => 0,
    'current_transport_warehouse_id' => 0,
    'leadtime' => '2024-10-18T23:59:59Z',
    'order_date' => '2024-10-15T01:35:43.339Z',
    'data' => [],
    'soc_id' => '670dc6efa5ff0f515695f611',
    'finish_date' => '2024-10-15T01:36:16.123Z',
    'tag' => [
        0 => 'truck',
    ],
    'log' => [
        0 => [
            'status' => 'cancel',
            'payment_type_id' => 2,
            'trip_code' => '',
            'updated_date' => '2024-10-15T01:36:16.123Z',
        ],
    ],
    'is_partial_return' => false,
    'is_document_return' => false,
    'pickup_shift' => [],
    'transaction_ids' => [
        0 => '304b8acf-494f-479e-a8a4-fbdf111de12d',
        1 => '4257f2d9-dbf9-4045-b07b-3ab87840b819',
        2 => '8845d2df-2700-416a-8763-d2212f6b837d',
    ],
    'transportation_status' => '',
    'transportation_phase' => '',
    'extra_service' => [
        'document_return' => [
            'flag' => false,
        ],
        'double_check' => false,
        'lastmile_ahamove_bulky' => false,
        'lastmile_trip_code' => '',
        'original_deliver_warehouse_id' => 0,
    ],
    'config_fee_id' => '',
    'extra_cost_id' => '',
    'standard_config_fee_id' => '',
    'standard_extra_cost_id' => '',
    'ecom_config_fee_id' => 467,
    'ecom_extra_cost_id' => 19,
    'ecom_standard_config_fee_id' => 36,
    'ecom_standard_extra_cost_id' => 2,
    'is_b2b' => false,
    'operation_partner' => '',
    'process_partner_name' => '',
];
```

### [Update Order](https://api.ghn.vn/home/docs/detail?id=75)

**Update information of created order. Only available when shipping status**

```php
GiaoHangNhanh::updateOrder([
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

### [Update COD of Order](https://api.ghn.vn/home/docs/detail?id=64)

**Update value for COD**

```php
GiaoHangNhanh::updateCodOrder([
    'order_code' => $order_code,
    'cod_amount' => $insurance_value,
]);
```

```php
return null;
```

### [Return Order](https://api.ghn.vn/home/docs/detail?id=72)

**The purpose of changing the status of an order to delivery is only applicable where the current status of the order
is: storage or waiting for delivery**

```php
GiaoHangNhanh::returnOrders([$order_code]);
```

```php
return [
    'order_code' => 'LNYQTV',
    'result' => false,
    'message' => 'Trạng thái đơn hàng không hợp lệ',
];
```

### [Cancel Order](https://api.ghn.vn/home/docs/detail?id=73)

**Cancel a shipping order from GHN**

```php
GiaoHangNhanh::cancelOrders([$order_code]);
```

```php
return [
    'order_code' => 'LNYQTV',
    'result' => false,
    'message' => 'Trạng thái đơn hàng không hợp lệ',
];
```

### [Delivery Again](https://api.ghn.vn/home/docs/detail?id=65)

- **Orders that have been repeatedly delivered are unsuccessful, will go into waiting for delivery (waiting time for
  delivery depends on each customer's contract, the default is 24h)**
- **During this period, customer can request delivery of the order again, order status after delivery request will
  become "storage"**

```php
GiaoHangNhanh::storingOrders([$order_code]);
```

```php
return [
    'order_code' => 'LNYQTV',
    'result' => false,
    'message' => 'Trạng thái đơn hàng không hợp lệ',
];
```

### [Print Order](https://api.ghn.vn/home/docs/detail?id=67)

```php
GiaoHangNhanh::printOrders([$order_code]);
```

```php
return [
    'A5' => 'https://dev-online-gateway.ghn.vn/a5/public-api/printA5?token=be26f511-8aab-11ef-a1c2-56fb4a87fdbe',
    '80x80' => 'https://dev-online-gateway.ghn.vn/a5/public-api/print80x80?token=be26f511-8aab-11ef-a1c2-56fb4a87fdbe',
    '52x70' => 'https://dev-online-gateway.ghn.vn/a5/public-api/print52x70?token=be26f511-8aab-11ef-a1c2-56fb4a87fdbe',
];
```

### [Calculate the expected delivery time](https://api.ghn.vn/home/docs/detail?id=52)

**Accurate time will be delivered to guests**

```php
GiaoHangNhanh::getLeadTime([
    'from_ward_code' => $from_ward_code,
    'from_district_id' => $from_district_id,
    'to_ward_code' => $to_ward_code,
    'to_district_id' => $to_district_id,
    'service_id' => $service_id,
]);
```

```php
return [
    'leadtime' => 1729123199,
    'order_date' => 0,
];
```

### [Pick Shift](https://api.ghn.vn/home/docs/detail?id=114)

**Automatic Get Pick shift in order**

```php
GiaoHangNhanh::getShiftDate();
```

```php
return [
    0 => [
        'id' => 2,
        'title' => 'Ca lấy 15-10-2024 (12h00 - 18h00)',
        'from_time' => 43200,
        'to_time' => 64800,
    ],
    1 => [
        'id' => 3,
        'title' => 'Ca lấy 16-10-2024 (7h00 - 12h00)',
        'from_time' => 111600,
        'to_time' => 129600,
    ],
    2 => [
        'id' => 4,
        'title' => 'Ca lấy 16-10-2024 (12h00 - 18h00)',
        'from_time' => 129600,
        'to_time' => 151200,
    ],
];
```

### [Get Station](https://api.ghn.vn/home/docs/detail?id=62)

**Get GHN Station data. This API provides station_id to create shipping order**

```php
GiaoHangNhanh::getStations(
    [
        'ward_code' => $ward_code,
        'district_id' => (string) $district_id,
        'offset' => $offset,
        'limit' => $limit,
    ],
    'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJleHAiOjE3Mjg5NjY5NDR9.aUlHdZC-ZasKNzxrKNgpugUCzTYum6zvWe5iTscA27s'
);
```

```php
return [
    0 => [
        'address' => 'Thôn 11, xã Tâm Thắng, huyện Cư Jut, tình Đắk Nông',
        'locationCode' => '1435',
        'locationId' => 1435,
        'locationName' => 'Bưu Cục Cư Jút-Đắk Nông',
        'parentLocation' => [
            0 => 'REGION/D',
            1 => 'PROVINCE/241',
            2 => 'DISTRICT/3152',
            3 => 'WARD/630407',
            4 => 'SECTION/EXREG0114S',
        ],
        'email' => '',
        'latitude' => 12.611028,
        'longitude' => 107.922972,
        'wardName' => 'Xã Tâm Thắng',
        'districtName' => 'Huyện Cư Jút',
        'provinceName' => 'Đắk Nông',
        'iframeMap' => "<iframe width=600 height=400 style=border:0 loading=lazy allowfullscreen src='https://maps.google.com/maps?q=12.611028,107.922972&amp;t=&amp;z=14&amp;ie=UTF8&amp;iwloc=B&amp;output=embed'></iframe>",
    ],
];
```

### [Get Province](https://api.ghn.vn/home/docs/detail?id=60)

**Get GHN ward/province data. This API provides province to create shipping order**

```php
GiaoHangNhanh::getProvinces();
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
GiaoHangNhanh::getDistrictsByProvinceId($province_id);
```

```php
return [
    0 => [
        'DistrictID' => 3311,
        'ProvinceID' => 247,
        'DistrictName' => 'Huyện Văn Quan',
        'Code' => '1006',
        'Type' => 3,
        'SupportType' => 3,
        'NameExtension' => [
            0 => 'Huyện Văn Quan',
            1 => 'H.Văn Quan',
            2 => 'H Văn Quan',
            3 => 'Văn Quan',
            4 => 'Van Quan',
            5 => 'Huyen Van Quan',
            6 => 'vanquan',
        ],
        'IsEnable' => 1,
        'UpdatedBy' => 1718600,
        'CreatedAt' => '2019-12-05 15:53:32.432163 +0700 +07 m=+0.016108850',
        'UpdatedAt' => '2020-09-29 13:42:42.051035 +0700 +07 m=+14.553463151',
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
GiaoHangNhanh::getWardsByDistrictId($district_id);
```

```php
return [
    0 => [
        'WardCode' => '190814',
        'DistrictID' => 1969,
        'WardName' => 'Xã Trừng Xá',
        'NameExtension' => [
            0 => 'Xã Trừng Xá',
            1 => 'X.Trừng Xá',
            2 => 'X Trừng Xá',
            3 => 'Trừng Xá',
            4 => 'Trung Xa',
            5 => 'Xa Trung Xa',
            6 => 'trungxa',
        ],
        'IsEnable' => 1,
        'CanUpdateCOD' => false,
        'UpdatedBy' => 1718600,
        'CreatedAt' => '2019-12-05 16:02:20.393184 +0700 +07 m=+0.029521342',
        'UpdatedAt' => '2020-09-29 13:58:12.770631 +0700 +07 m=+517.427624748',
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

### [Calculate Fee](https://api.ghn.vn/home/docs/detail?id=76)

**This API can help Shop/Merchant get the shipping fee and provide to buyer before create shipping order by input some
information such as weight, height, length, width, to_district_id, to_ward_code, service_id**

```php
GiaoHangNhanh::getFee([
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
    'total' => 27500,
    'service_fee' => 27500,
    'insurance_fee' => 0,
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

### [Fee of Order Info](https://api.ghn.vn/home/docs/detail?id=71)

**This API help you get all fee of a order**

```php
GiaoHangNhanh::getSoc($order_code);
```

```php
return [
    '_id' => '670dc6ff22fb11edcbe76bc4',
    'order_code' => 'LNYQTV',
    'detail' => [
        'main_service' => 584100,
        'insurance' => 2315000,
        'cod_fee' => 51040,
        'station_do' => 0,
        'station_pu' => 0,
        'return' => 0,
        'r2s' => 0,
        'return_again' => 0,
        'coupon' => 0,
        'document_return' => 0,
        'double_check' => 0,
        'double_check_deliver' => 0,
        'pick_remote_areas_fee' => 11891,
        'deliver_remote_areas_fee' => 69410,
        'pick_remote_areas_fee_return' => 0,
        'deliver_remote_areas_fee_return' => 0,
        'cod_failed_fee' => 0,
    ],
    'standard' => [
        'main_service' => 550000,
        'insurance' => 0,
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
                'main_service' => 584100,
                'insurance' => 2315000,
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
                'pick_remote_areas_fee' => 11891,
                'deliver_remote_areas_fee' => 69410,
                'pick_remote_areas_fee_return' => 0,
                'deliver_remote_areas_fee_return' => 0,
                'cod_failed_fee' => 0,
            ],
            'value' => 2980401,
            'payment_type' => 1,
            'paid_date' => '0001-01-01T00:00:00Z',
            'created_date' => '2024-10-15T01:34:18.949Z',
        ],
        1 => [
            'diff' => [
                'main_service' => 0,
                'insurance' => 0,
                'cod_fee' => 121000,
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
            'value' => 121000,
            'payment_type' => 1,
            'paid_date' => '0001-01-01T00:00:00Z',
            'created_date' => '2024-10-15T01:35:59.162Z',
        ],
        2 => [
            'diff' => [
                'main_service' => 0,
                'insurance' => 0,
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
            'value' => -69960,
            'payment_type' => 1,
            'paid_date' => '0001-01-01T00:00:00Z',
            'created_date' => '2024-10-15T01:35:59.779Z',
        ],
    ],
    'cod_collect_date' => '0001-01-01T00:00:00Z',
    'transaction_id' => 'c4129c4e-5da8-48ce-ac81-115ffa80e22c',
    'created_ip' => '',
    'created_date' => '2024-10-15T01:35:59.779Z',
    'updated_ip' => '',
    'updated_client' => 0,
    'updated_employee' => 0,
    'updated_source' => '',
    'updated_date' => '2024-10-15T01:35:59.779Z',
];
```

### [Get Service](https://api.ghn.vn/home/docs/detail?id=77)

**Use to get list of available services from district pick up items and to district drop off items (Full information)**

```php
GiaoHangNhanh::getServices([
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
        'ecom_config_fee_id' => 467,
        'ecom_extra_cost_id' => 19,
        'ecom_standard_config_fee_id' => 36,
        'ecom_standard_extra_cost_id' => 2,
    ],
    1 => [
        'service_id' => 100039,
        'short_name' => 'Hàng nặng',
        'service_type_id' => 5,
        'config_fee_id' => '648bc0cbc4ca44d95f77275d',
        'extra_cost_id' => '649aa34ef1241a9d9d374211',
        'standard_config_fee_id' => '66b0ad5ace5e420d7db71d42',
        'standard_extra_cost_id' => '668ba9a47c8d5f119036bf47',
        'ecom_config_fee_id' => 0,
        'ecom_extra_cost_id' => 0,
        'ecom_standard_config_fee_id' => 0,
        'ecom_standard_extra_cost_id' => 0,
    ],
];
```

### [Get Store](https://api.ghn.vn/home/docs/detail?id=79)

**Get the current Store of logged in client. One client can have many pick up addresses. Each address is a Store**

```php
GiaoHangNhanh::getShops([
    'clientphone' => $clientphone,
    'offset' => $offset,
    'limit' => $limit,
]);
```

```php
return [
    'last_offset' => 199116,
    'shops' => [
        0 => [
            '_id' => 193146,
            'name' => 'Tên người đại diện cửa hàng',
            'phone' => '0982xxx854',
            'address' => 'Test, Đông Mỹ, Thanh Trì, Hà Nội, Việt Nam',
            'ward_code' => '1A1103',
            'district_id' => 1710,
            'client_id' => 2507884,
            'bank_account_id' => 0,
            'status' => 1,
            'location' => [],
            'version_no' => '2fe2b83e-7f17-4bf3-9b50-ebabdfb510ea',
            'is_created_chat_channel' => false,
            'force_update_output_commitment_version' => 21,
            'updated_ip' => '171.224.xxx.xx',
            'updated_employee' => 0,
            'updated_client' => 2507884,
            'updated_source' => 'shiip',
            'updated_date' => '2024-09-17T03:15:21.435Z',
            'created_ip' => '',
            'created_employee' => 0,
            'created_client' => 0,
            'created_source' => '',
            'created_date' => '2024-07-27T05:09:27.278Z',
        ],
    ],
];
```

### [Create Store](https://api.ghn.vn/home/docs/detail?id=58)

**Use to create new Store. Each account can have many Store and each Store is a place to help GHN know where to pick up
items**

```php
GiaoHangNhanh::createShop([
    'ward_code' => $ward_code,
    'district_id' => $district_id,
    'name' => $name,
    'phone' => $phone,
    'address' => $address,
]);
```

```php
return 194780; // shop_id
```

### [Get Ticket List](https://api.ghn.vn/home/docs/detail?id=57)

**Get all ticket to created**

```php
GiaoHangNhanh::getTickets([
    'offset' => $offset,
    'limit' => $limit,
]);
```

```php
return [
    0 => [
        'attachments' => null,
        'client_id' => 'SHOP-193146',
        'conversations' => null,
        'created_at' => '2024-10-16T04:23:03Z',
        'created_by' => 2043022450559,
        'description' => 'Test',
        'id' => 26153719,
        'order_code' => 'LNYFBQ',
        'status' => 'Đang xử lý',
        'status_id' => 1,
        'type' => 'Khiếu nại',
        'updated_at' => '2024-10-16T04:23:04Z',
    ],
];
```

### [Get Ticket](https://api.ghn.vn/home/docs/detail?id=68)

**Get all ticket to created**

```php
GiaoHangNhanh::getTicket($ticket_id);
```

```php
return [
    'attachments' => [],
    'c_email' => 'nguyenductri2k3@gmail.com',
    'c_name' => 'Nguyễn Đức Trí',
    'c_phone' => '0982213854',
    'client_id' => 'SHOP-193146',
    'conversations' => [
        0 => [
            'body' => '<div>Test</div>',
            'created_at' => '2024-10-14T14:46:03Z',
            'from_email' => '"Email Support Khách hàng GHN" <cskh@ghn.vn>',
            'updated_at' => '2024-10-14T14:46:03Z',
            'user_id' => 2043022450559,
        ],
        1 => [
            'body' => "\"\"
<div style=\"font-family: -apple-system, BlinkMacSystemFont, Segoe UI, Roboto, Helvetica Neue, Arial, sans-serif; font-size: 13px\">
<div style='box-sizing: border-box; word-break: break-word; overflow-wrap: break-word; color: rgb(24, 50, 71); font-family: -apple-system, \"system-ui\", \"Segoe UI\", Roboto, \"Helvetica Neue\", Arial, sans-serif; font-size: 13px; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; letter-spacing: normal; orphans: 2; text-align: start; text-indent: 0px; text-transform: none; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; white-space: normal;  text-decoration-thickness: initial; text-decoration-style: initial; text-decoration-color: initial'>
    Chào Anh/Chị,
</div>
<div style='box-sizing: border-box; word-break: break-word; overflow-wrap: break-word; color: rgb(24, 50, 71); font-family: -apple-system, \"system-ui\", \"Segoe UI\", Roboto, \"Helvetica Neue\", Arial, sans-serif; font-size: 13px; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; letter-spacing: normal; orphans: 2; text-align: start; text-indent: 0px; text-transform: none; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; white-space: normal;  text-decoration-thickness: initial; text-decoration-style: initial; text-decoration-color: initial'><span style=\"box-sizing: border-box; word-break: break-word; overflow-wrap: break-word\">
    Cảm ơn Anh/Chị đã gửi yêu cầu đến GHN.</span>
</div>
<div style='box-sizing: border-box; word-break: break-word; overflow-wrap: break-word; color: rgb(24, 50, 71); font-family: -apple-system, \"system-ui\", \"Segoe UI\", Roboto, \"Helvetica Neue\", Arial, sans-serif; font-size: 13px; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; letter-spacing: normal; orphans: 2; text-align: start; text-indent: 0px; text-transform: none; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; white-space: normal;  text-decoration-thickness: initial; text-decoration-style: initial; text-decoration-color: initial'>\u{A0}<span dir=\"ltr\" style=\"box-sizing: border-box; word-break: break-word; overflow-wrap: break-word\"><br style=\"box-sizing: border-box\">
    GHN tiếp nhận thông tin của Anh/Chị về đơn hàng LN8M4X. Sau khi kiểm tra, hiện tại mã này không tìm thấy trên hệ thống GHN nên GHN chưa thể hỗ trợ được yêu cầu. Nhờ Anh/Chị kiểm tra lại giúp GHN.
    <br style=\"box-sizing: border-box\"></span>
</div>
<div style='box-sizing: border-box; word-break: break-word; overflow-wrap: break-word; color: rgb(24, 50, 71); font-family: -apple-system, \"system-ui\", \"Segoe UI\", Roboto, \"Helvetica Neue\", Arial, sans-serif; font-size: 13px; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; letter-spacing: normal; orphans: 2; text-align: start; text-indent: 0px; text-transform: none; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; white-space: normal;  text-decoration-thickness: initial; text-decoration-style: initial; text-decoration-color: initial'><span style=\"box-sizing: border-box; word-break: break-word; overflow-wrap: break-word\">\u{A0}</span>
</div>
<div style='box-sizing: border-box; word-break: break-word; overflow-wrap: break-word; color: rgb(24, 50, 71); font-family: -apple-system, \"system-ui\", \"Segoe UI\", Roboto, \"Helvetica Neue\", Arial, sans-serif; font-size: 13px; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; letter-spacing: normal; orphans: 2; text-align: start; text-indent: 0px; text-transform: none; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; white-space: normal;  text-decoration-thickness: initial; text-decoration-style: initial; text-decoration-color: initial'>
    Nếu cần hỗ trợ thêm thông tin, Anh/Chị vui lòng gửi yêu cầu đến GHN qua trang
    <a href=\"https://sso.ghn.vn/ssoLogin?app=ticket_prod\" rel=\"noreferrer\" style=\"box-sizing: border-box; background-color: transparent; color: rgb(44, 92, 197); text-decoration: none; word-break: break-word; overflow-wrap: break-word\" target=\"_blank\">
        khachhang.ghn.vn
    </a>
    hoặc liên hệ hotline 1900 636677.
</div>
<div style='box-sizing: border-box; word-break: break-word; overflow-wrap: break-word; color: rgb(24, 50, 71); font-family: -apple-system, \"system-ui\", \"Segoe UI\", Roboto, \"Helvetica Neue\", Arial, sans-serif; font-size: 13px; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; letter-spacing: normal; orphans: 2; text-align: start; text-indent: 0px; text-transform: none; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; white-space: normal;  text-decoration-thickness: initial; text-decoration-style: initial; text-decoration-color: initial' ><span style= \"box-sizing: border-box; word-break: break-word; overflow-wrap: break-word\">
    Chúc Anh / Chị một ngày vui vẻ!</span>
</div>
</div>
\"\"",
            'created_at' => '2024-10-14T16:22:21Z',
            'from_email' => '"Email Support Khách hàng GHN" <cskh@ghn.vn>',
            'updated_at' => '2024-10-14T16:22:21Z',
            'user_id' => 2044004368806,
        ],
        2 => [
            'body' => '<div>Test</div>',
            'created_at' => '2024-10-16T04:23:07Z',
            'from_email' => '"Email Support Khách hàng GHN" <cskh@ghn.vn>',
            'updated_at' => '2024-10-16T04:23:07Z',
            'user_id' => 2043022450559,
        ],
    ],
    'created_at' => '2024-10-14T14:44:25Z',
    'created_by' => 2043022450559,
    'description' => 'Test',
    'id' => 26120001,
    'order_code' => 'LN8M4X',
    'status' => 'Đang xử lý',
    'status_id' => 1,
    'type' => 'Tư vấn',
    'updated_at' => '2024-10-16T04:23:07Z',
];
```

### [Create Ticket](https://api.ghn.vn/home/docs/detail?id=70)

**Create Ticket then need support your order**

```php
GiaoHangNhanh::createTicket([
    'order_code' => $order_code,
    'category' => $category,
    'attachments' => $attachments,
    'description' => $description,
    'c_email' => $c_email,
]);
```

```php
return [
    'attachments' => [],
    'client_id' => 'SHOP-193146',
    'conversations' => null,
    'created_at' => '2024-10-16T04:48:28Z',
    'created_by' => 2043022450559,
    'description' => 'Test',
    'id' => 26154530,
    'order_code' => 'LNYFBQ',
    'status' => 'Đang xử lý',
    'status_id' => 1,
    'type' => 'Khiếu nại',
    'updated_at' => '2024-10-16T04:48:28Z',
];
```

### [Create Feedback of Ticket](https://api.ghn.vn/home/docs/detail?id=69)

**Reply Feedback of Ticket**

```php
GiaoHangNhanh::replyTicket([
    'ticket_id' => $ticket_id,
    'attachments' => $attachments,
    'description' => $description,
]);
```

```php
return [
    'body' => '<div>Test</div>',
    'created_at' => '2024-10-16T04:53:40Z',
    'from_email' => '"Email Support Khách hàng GHN" <cskh@ghn.vn>',
    'updated_at' => '2024-10-16T04:53:40Z',
    'user_id' => 2043022450559,
];
```

### [Fail Code - Reason new](https://api.ghn.vn/home/docs/detail?id=121)

```php
\TriNguyenDuc\GiaoHangNhanh\Enums\OrderReason::values();
```

```php
return [
    // Lấy thất bại
    'GHN-PFA1A0' => 'Lấy không thành công: Người gửi hẹn lại ngày lấy hàng',
    'GHN-PFA2A2' => 'Lấy không thành công: Thông tin lấy hàng sai (địa chỉ / SĐT)',
    'GHN-PFA2A1' => 'Lấy không thành công: Thuê bao không liên lạc được / Máy bận',
    'GHN-PFA2A3' => 'Lấy không thành công: Người gửi không nghe máy',
    'GHN-PFA1A1' => 'Lấy không thành công: Người gửi muốn gửi hàng tại bưu cục',
    'GHN-PCB0B2' => 'Lấy không thành công: Hàng vi phạm quy định khối lượng, kích thước',
    'GHN-PFA4A1' => 'Lấy không thành công: Hàng vi phạm quy cách đóng gói',
    'GHN-PCB0B1' => 'Lấy không thành công: Người gửi không muốn gửi hàng nữa',
    'GHN-PFA4A2' => 'Lấy không thành công: Hàng hóa GHN không vận chuyển',
    'GHN-PFA3A2' => 'Lấy không thành công: Nhân viên gặp sự cố',
    // Giao thất bại
    'GHN-DFC1A0' => 'Giao không thành công: Người nhận hẹn lại ngày giao',
    'GHN-DFC1A2' => 'Giao không thành công: Không liên lạc được người nhận / Chặn số',
    'GHN-DFC1A4' => 'Giao không thành công: Người nhận không nghe máy',
    'GHN-DCD0A1' => 'Giao không thành công: Sai thông tin người nhận (địa chỉ / SĐT)',
    'GHN-DFC1A1' => 'Giao không thành công: Người nhận đổi địa chỉ giao hàng',
    'GHN-DFC1A7' => 'Giao không thành công: Người nhận từ chối nhận do không cho xem / thử hàng',
    'GHN-DCD0A6' => 'Giao không thành công: Người nhận từ chối nhận do sai sản phẩm',
    'GHN-DCD0A7' => 'Giao không thành công: Người nhận từ chối nhận do sai COD',
    'GHN-DCD0A5' => 'Giao không thành công: Người nhận từ chối nhận do hàng hư hỏng',
    'GHN-DCD1A5' => 'Giao không thành công: Người nhận từ chối nhận do không có tiền',
    'GHN-DCD0A8' => 'Giao không thành công: Người nhận đổi ý không mua nữa',
    'GHN-DCD1A1' => 'Giao không thành công: Người nhận báo không đặt hàng',
    'GHN-DFC1A6' => 'Giao không thành công: Nhân viên gặp sự cố',
    'GHN-DCD1A3' => 'Giao không thành công: Hàng suy suyển, bể vỡ trong quá trình vận chuyển',
    // Trả thất bại
    'GHN-RFE0A0' => 'Trả không thành công: Người gửi hẹn lại ngày trả hàng',
    'GHN-RFE0A1' => 'Trả không thành công: Người gửi đổi địa chỉ trả hàng',
    'GHN-RFE0A6' => 'Trả không thành công: Người gửi không nghe máy',
    'GHN-RFE0A3' => 'Trả không thành công: Người gửi từ chối nhận do sai sản phẩm',
    'GHN-RFE0A4' => 'Trả không thành công: Người gửi từ chối nhận do hàng hư hỏng.',
    'GHN-RFE0A5' => 'Trả không thành công: Nhân viên gặp sự cố',
];
```

### [List Of Shipping Status](https://api.ghn.vn/home/docs/detail?id=48)

```php
\TriNguyenDuc\GiaoHangNhanh\Enums\OrderStatus::values();
```

```php
return [
    'READY_TO_PICK' => 'Chờ lấy hàng',
    'PICKING' => 'Đang lấy hàng',
    'MONEY_COLLECT_PICKING' => 'Đang tương tác với người gửi',
    'PICKED' => 'Lấy hàng thành công',
    'STORING' => 'Nhập kho',
    'TRANSPORTING' => 'Đang trung chuyển',
    'SORTING' => 'Đang phân loại',
    'DELIVERING' => 'Đang giao hàng',
    'DELIVERED' => 'Giao hàng thành công',
    'MONEY_COLLECT_DELIVERING' => 'Đang tương tác với người nhận',
    'DELIVERY_FAIL' => 'Giao hàng không thành công',
    'WAITING_TO_RETURN' => 'Chờ xác nhận giao lại',
    'RETURN' => 'Chuyển hoàn',
    'RETURN_TRANSPORTING' => 'Đang trung chuyển hàng hoàn',
    'RETURN_SORTING' => 'Đang phân loại hàng hoàn',
    'RETURNING' => 'Đang hoàn hàng',
    'RETURN_FAIL' => 'Hoàn hàng không thành công',
    'RETURNED' => 'Hoàn hàng thành công',
    'CANCEL' => 'Đơn huỷ',
    'EXCEPTION' => 'Hàng ngoại lệ',
    'LOST' => 'Hàng thất lạc',
    'DAMAGE' => 'Hàng hư hỏng',
];
```

### Get Tracking Url

****

```php
GiaoHangNhanh::getTrackingUrl($order_code);
```

```php
return "https://tracking.ghn.dev?order_code=LNY7CR";
```

## Testing

```bash
composer test
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
