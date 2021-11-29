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

Holoo::config('http://server-ip:8080/TncHoloo/api/','DB Name','UserName','PassWord');
Holoo::login();


$user = Customer::GetCustomer();
$user = Customer::GetCustomer(["Code" => 2756]);
$user = Customer::GetCustomerCount();
print_r($user);


$invioces= Invoice::GetInvoiceList();
$invioces= Invoice::GetInvoiceList(['Code'=>123]);
$invioces= Invoice::GetInvoiceList(['type'=>4]);
print_r($invioces);

```