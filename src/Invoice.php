<?php

namespace HolooClient;

/**
 * Customer
 */
class Invoice extends Holoo
{
    /**
     * GetInvoiceList
     * fetch all or one more invoides
     *
     * ### Example
     * ```
     * $invioces= Invoice::GetInvoiceList();
     * $invioces= Invoice::GetInvoiceList(['Code'=>123]);
     * $invioces= Invoice::GetInvoiceList(['type'=>4]);
     * ```
     *
     * @param  mixed $params
     * @return array
     */
    public static function GetInvoiceList($params = []): array
    {
        return self::getRequest('Invoice/Invoice', $params);
    }

    /**
     * NewInvoice
     *
     * @param  mixed $params
     * @return array
     */
    public static function NewInvoice($params = []): array
    {
        return self::postRequestJson('Invoice/Invoice', $params);
    }
    
    /**
     * GetPreInvoiceList
     * fetch all or one more invoides
     *
     * ### Example
     * ```
     * $invioces= Invoice::GetPreInvoiceList();
     * $invioces= Invoice::GetPreInvoiceList(['Code'=>123]);
     * ```
     *
     * 
     * @param  mixed $params
     * @return array
     */
    public static function GetPreInvoiceList($params = []): array
    {
        // type 5 = PreInvoice
        $params = array_merge($params,['type' => 5]);
        return self::getRequest('Invoice/Invoice', $params);
    }

    /**
     * NewPreInvoice
     *
     * ### Example
     * ```
     * $invioces = Invoice::NewPreInvoice([
     *    'invoiceinfo' => [
     *        'id' => '978',
     *        'customererpcode' => 'bBAPcw12cg0=',
     *        'date' => date('Y-m-d'),
     *        'time' => date("H:i:s") ,
     *        'comment' => 'یک پیش فاکتور جدید',
     *        'detailinfo' => [
     *            [
     *                'id' => '001',
     *                'ProductErpCode' => 'bBALNA1mckd7QB4O',
     *                'few' => '1',
     *                'price' => '1000',
     *                'Comment' => 'توضیحاتی مرتبط با یک محصول خریداری شده'
     *            ],
     *            [
     *                'id' => '002',
     *                'ProductErpCode' => 'bBALNA1mckd5dh4O',
     *                'few' => '21',
     *                'price' => '10000',
     *                'Comment' => 'ثبت دامنه | gogoliMagooli.miomio'
     *            ]
     *       ]
     *    ]
     * ]);
     * ```
     *
     * @param  mixed $params
     * @return array
     */
    public static function NewPreInvoice($params = []): array
    {
        return self::postRequestJson('Invoice/PreInvoice', $params);
    }

    /*     public static function GetOrderInfo($params = []): array
    {
        // return self::postRequestJson('Invoice/OrderInfo', $params);
    }

    public static function NewOrder($params = []): array
    {
        // return self::postRequestJson('Invoice/Order', $params);
    } */
}
