<?php

namespace HolooClient;



/**
 * Customer
 */
class Customer extends Holoo
{

    
    /**
     * GetCustomer
     * return one or more customers
     * 
     * ### Example:
     *
     * ```
     * $user = Customer::GetCustomer();
     * $user = Customer::GetCustomer(["Code" => 2756]);
     * ```
     * 
     * @param  mixed $params
     * @return array
     */
    public static function GetCustomer($params = []): array
    {
        return self::getRequest('Customer', $params);
    }

    /**
     * GetCustomerCount
     * return the total number of customers
     * 
     * @return int
     */
    public static function GetCustomerCount(): int
    {
        return self::getRequest('Customer/count', []);
    }
}
