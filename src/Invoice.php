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
}
