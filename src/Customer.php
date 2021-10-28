<?php

namespace HolooClient;



/**
 * Customer
 */
class Customer extends Holoo
{

    /**
     * GetCusItomer
     *
     * @param  mixed $params
     * @return void
     */
    public static function GetCustomer($params = [])
    {
        return self::getRequest('Customer',$params);
    }


}