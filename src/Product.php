<?php

namespace HolooClient;


/**
 * Product
 */
class Product extends Holoo
{


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
}
