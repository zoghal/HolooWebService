<?php

namespace HolooClient;


/**
 * Product
 */
class Product extends Holoo
{

    /**
     * Get one or more Products|دریافت محصولات
     *
     * ### Example
     *```
     * $product= Product::GetProduct();
     * $product= Product::GetProduct(['Code'=>64]);
     * $product= Product::GetProduct(['MainGroupErpCode'=> 'bBALfg==']);
     *```
     * 
     * @param  mixed $params
     * @return array
     */
    public static function GetProduct($params = []): array
    {
        return self::getRequest('Product', $params);
    }

    /**
     * GetMainGroup | لیست گروه‌های اصلی
     * 
     * ### Example
     * ```
     * $product = Product::GetMainGroup();
     * ```
     * 
     * @return array
     */
    public static function GetMainGroup(): array
    {
        return self::getRequest('MainGroup', []);
    }


    /**
     * GetSideGroup | لیست گروه‌های فرعی
     * 
     * ### Example
     * ```
     * $product = Product::GetSideGroup();
     * ```
     * 
     * @return array
     */
    public static function GetSideGroup(): array
    {
        return self::getRequest('SideGroup', []);
    }



    /**
     * GetUnit | لیست واحدها 
     * 
     * ### Example
     * ```
     * $product = Product::GetUnit();
     * ```
     * 
     * @return array
     */
    public static function GetUnit(): array
    {
        return self::getRequest('Unit', []);
    }
}
