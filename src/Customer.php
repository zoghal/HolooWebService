<?php

declare(strict_types=1);

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
        return (int)self::getRequest('Customer/count', []);
    }


    /**
     * NewCustomer
     *
     * ### Example
     * ```
     * $user = Customer::NewCustomer([
     *    'custinfo' => [
     *        'name' => 'صالح سوزنچی',
     *        'ispurchaser' => true,
     *        'isseller' => true,
     *        'custtype' => true,
     *    ]
     * ]);
     * ```
     * 
     * @param  mixed $params
     * @return array
     */
    public static function NewCustomer($params = []): array
    {
        return self::postRequestJson('Customer', $params);
    }

    /**
     * EditCustomer
     *
     * ### Example
     * ```
     * $user = Customer::EditCustomer([
     *    'custinfo' => [
     *        'erpcode=' => 'bBAPNA12dg0=',   
     *        'isblacklist' => true,
     *        'nationalid' => '38700011122',
     *    ]
     * ]);
     * ```
     * 
     * @param  mixed $params
     * @return array
     */
    public static function EditCustomer($params = []): array
    {
        return self::putRequestJson('Customer', $params);
    }
}
