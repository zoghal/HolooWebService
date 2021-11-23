<?php

namespace HolooClient;

use GuzzleHttp\Client;



/**
 * Holoo 
 */
class Holoo
{
    public static $ErrorCode = [
        1  => "عدم برقراری ارتباط با بانک اطلاعاتی، ممکن است نام کاربری یا کلمه عبور نادرست باشد",
        3  => "فایل Config را در مسیر موردنظرکپی نکردهاید. برای تنظیمات Config به ملزومات نصب مراجعه نمایید",
        4  => "لطفا ابتدا نسخه هلورا اجرا نمایید",
        5  => "ارتباط با اینترنت برقرار نمی‌باشد ،لطفا اتصال به اینترنت را چک نمایید",
        6  => "کاربرگرامی شمادسترسی استفاده از وب سرویس را ندارید",
        27  => "کاربرگرامی شما دسترسی استفاده از وب سرویس را ندارید",
        7  => "نام طرف حساب خالی می‌باشد",
        8  => "نام طرف حساب تکراری می‌باشد",
        9  => "کد طرف حساب تکراری می‌باشد",
        10  => "شماره موبایل تکراری می‌باشد",
        11  => "پکیج ارسالی اشتباه می‌باشد",
        12  => "کد حساب تکراری می‌باشد",
        13  => "کد حساب معتبر نمی‌باشد",
        14  => "کد طرف حساب معتبر نمی‌باشد",
        21  => "نوع (بدهکار /بستانکار )به درستی مشخص نشده است",
        22  => "کد واسطه(ٍErpcode)معتبرنمی‌باشد",
        23  => "کد ملی تکراری می‌باشد",
        24  => "کد اقتصادی تکراری می‌باشد",
        25  => "کد پستی معتبر نمی‌باشد",
        45  => "سرفصل طرف حساب معتبر نمی‌باشد",
        37  => "کد کالا تکراری می باشد",
        38  => "نام کالا تکراری می‌باشد",
        39  => "نام کالا خالی می‌باشد",
        40  => "Erpcode کالا معتبر نمی‌باشد",
        41  => "ظرفیت این طبقه جهت اضافه نمودن کالا تکمیل شده است",
        42  => "Erpcode گروه اصلی معتبر نمی‌باشد",
        43  => "Erpcodeگروه فرعی معتبر نمی‌باشد",
        44  => "شناسه معتبر نمی‌باشد",
        46  => "مبلغ مشخص نشده است",
        15  => "کد کالا معتبر نمی‌باشد",
        16  => "کد واحد معتبر(Erpcode) نمی‌باشد",
        17  => "تاریخ معتبر نمی‌باشد",
        18  => "ساعت معتبر نمی‌باشد",
        19  => "تعداد کالا معتبر نمی‌باشد",
        20  => "قیمت کالا معتبر نمی‌باشد",
        26  => "مالیات و عوارض معتبر نمی‌باشد",
        28  => "کالاهای زیر فاقد موجودی می‌باشد",
        29  => "سرفصل صندوق معتبر نمی‌باشد",
        30  => "مبلغ صندوق معتبر نمی‌باشد",
        31  => "نوع فاکتور معتبر نمی‌باشد",
        32  => "سرفصل کارت خوان معتبر نمی‌باشد",
        33  => "مبلغ کارت خوان معتبر نمی‌باشد",
        34  => "مبلغ نسیه معتبر نمی‌باشد",
        35  => "مبلغ تخفیف معتبر نمی‌باشد",
        36  => "مبلغ تسویه فاکتور با جمع فاکتور برابر نمی‌باشد"
    ];

    public static $debug = true;

    private static $WebServicURL;
    private static $dbname;
    private static $username;
    private static $userpass;


    private static $token = false;

    private static $session = null;
    /**
     * config
     *
     * @param  mixed $WebServicURL
     * @param  mixed $dbname
     * @param  mixed $username
     * @param  mixed $password
     * @return void
     */
    public static function config($WebServicURL, $dbname, $username, $userpass)
    {

        self::$dbname = $dbname;
        self::$username = $username;
        self::$userpass = $userpass;
        self::$WebServicURL = $WebServicURL;
    }


    /**
     * login
     *
     * @return void
     */
    public static function login()
    {

        $res = self::postRequest('Login', [
            'dbname' => self::$dbname,
            'username' => self::$username,
            'userpass' => self::$userpass
        ]);

        if (isset($res['Token'])) {
            static::$token = $res['Token'];
            return static::$token;
        }
        if (self::$debug) {
            print_r($res);
        }
        return false;
    }


    /**
     * Create and send an HTTP POST request.
     *
     * @param  mixed $action
     * @param  mixed $params
     * @return void
     */
    protected static function postRequest($action, array $params = []): array
    {
        $client = new Client(['base_uri' => self::$WebServicURL]);
        $res = $client->post(
            $action,
            [
                'debug' => self::$debug,
                'headers' => [
                    'Authorization' => static::$token
                ],
                'form_params' => $params
            ]
        );

        $res = self::fixPersianString($res->getBody()->getContents());
        $res = json_decode($res, true);
        if (!empty($res)) {
            return $res[array_key_first($res)];
        }
        return $res;
    }

    /**
     * Create and send an HTTP GET request.
     *
     * @param  mixed $action
     * @param  mixed $params
     * @return void
     */
    protected static function getRequest($action, array $params = []): array
    {
        $client = new Client(['base_uri' => self::$WebServicURL]);
        $res = $client->get(
            $action,
            [
                'debug' => self::$debug,
                'headers' => [
                    'Authorization' => static::$token
                ],
                'query' => $params
            ]
        );
        $res = self::fixPersianString($res->getBody()->getContents());
        $res = json_decode($res, true);
        if (!empty($res)) {
            return $res[array_key_first($res)];
        }
        return $res;
    }

    /**
     * fixPersianString
     *
     * @param  mixed $text
     * @return void
     */
    private function fixPersianString($text)
    {
        return str_replace(["ي", "ك", "ى", "ة"], ["ی", "ک", "ی", "ه"], $text);
    }
}