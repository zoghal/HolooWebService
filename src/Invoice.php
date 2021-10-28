<?php

namespace HolooClient;



/**
 * Customer
 */
class Invoice extends Holoo
{

    /**
     * GetCusItomer
     *
     * @param  mixed $params
     * @return void
     */
    public static function GetInvoiceList($params = [])
    {
        return self::getRequest('Invoice/Invoice',$params);
    }


}