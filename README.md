# HolooWebService
PHP Client Webservice for Holoo(Torfenagar) accounting and financial software(holoo.co.ir)


# وب‌سرویس هلو
کلاینت PHP وب‌سرویس نرم‌افزار حسابداری و مالی هلو(طرفه‌نگار) (holoo.co.ir)


## توضیحات
این پکیج بر اساس توضیحات راهنمای اتصال به وب‌سرویس هلو در حال تکمیل شدن می‌باشد.


## نصب و راه اندازی

```
composer require zoghal/holoo-client
```

### نحوه استفاده

```php
<?php
require 'vendor/autoload.php';

use HolooClient\Holoo;
use HolooClient\Customer;
use HolooClient\Invoice;
use HolooClient\Product;

Holoo::config('http://server-ip:8080/TncHoloo/api/','DB Name','UserName','PassWord');
Holoo::login();


$user = Customer::GetCustomer();
$user = Customer::GetCustomer(["Code" => 2756]);
$user = Customer::GetCustomerCount();
$user = Customer::NewCustomer([
    'custifno' => [
        'name' => 'صالح سوزنچی',
        'ispurchaser' => true,
        'isseller' => true,
        'custtype' => true,
    ]
]);

$user = Customer::EditCustomer([
    'custifno' => [
        'erpcode=' => 'bBAPNA12dg0=',   
        'isblacklist' => true,
        'nationalid' => '38700011122',
    ]
]);

print_r($user);
```


```php

$invioces= Invoice::GetInvoiceList();
$invioces= Invoice::GetInvoiceList(['Code'=>123]);
$invioces= Invoice::GetInvoiceList(['type'=>4]);
print_r($invioces);

$invioces = Invoice::NewPreInvoice([
    'invoiceinfo' => [
        'id' => '978',
        'customererpcode' => 'bBAPcw12cg0=',
        'date' => date('Y-m-d'),
        'time' => date("H:i:s") ,
        'comment' => 'یک پیش فاکتور جدید',
        'detailinfo' => [
            [
                'id' => '001',
                'ProductErpCode' => 'bBALNA1mckd7QB4O',
                'few' => '1',
                'price' => '1000',
                'Comment' => 'توضیحاتی مرتبط با یک محصول خریداری شده'
            ],
            [
                'id' => '002',
                'ProductErpCode' => 'bBALNA1mckd5dh4O',
                'few' => '21',
                'price' => '10000',
                'Comment' => 'ثبت دامنه | gogoliMagooli.miomio'
            ]
        ]
    ]
]);


$invioces = Invoice::NewInvoice([
    'invoiceinfo' => [
        'id' => '978',
        'type' => '1',
        'customererpcode' => 'bBAPcw12cg0=',
        'date' => date('Y-m-d'),
        'time' => date("H:i:s") ,
        'Nesiyeh' => '21000',
        'comment' => 'یک فاکتور جدید',
        'detailinfo' => [
            [
                'id' => '1',
                'ProductErpCode' => 'bBALNA1mckd7QB4O',
                'few' => '1',
                'price' => '1000',
                'Comment' => 'توضیحاتی مرتبط با یک محصول خریداری شده'
            ],
            [
                'id' => '2',
                'ProductErpCode' => 'bBALNA1mckd5dh4O',
                'few' => '2',
                'price' => '10000',
                'Comment' => 'ثبت دامنه | gogoliMagooli.miomio'
            ]
        ]
    ]
]);
print_r($invioces);
```

```php

$product = Product::GetMainGroup();
$product = Product::GetSideGroup();
$product = Product::GetUnit();
print_r($product);

$product= Product::GetProduct();
$product= Product::GetProduct(['Code'=>64]);
$product = Product::GetProduct(['MainGroupErpCode' => 'bBALfg==']); // bug
$product= Product::GetProductCount();
print_r($product);


$product = Product::NewProduct([
    'productinfo' => [
        'sidegroupErpcode' => 'bBALNA1jDg0=',
        'name' => 'saleh402'
    ]
]);

$product = Product::EditProduct([
    'productinfo' => [
        'erpcode' => 'bBALNA1mcgF7UB4O',
        'name' => 'محصول ادیت شده'
    ]
]);
print_r($product);
```