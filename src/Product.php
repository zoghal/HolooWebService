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
     * PostProduct
     *
     * ### Example
     * ```
     * $product = Product::NewProduct([
     *    'productinfo' => [
     *        'sidegroupErpcode' => 'bBALNA1jDg0=',
     *        'name' => 'saleh402'
     *    ]
     * ]);
     * ```
     * 
     * @param  mixed[] $params.
     * $params = [
     *      'id'=>	(int)
     *      'sidegroupErpcode'=>	(string)    Required.
     *      'code'=>	(string)
     *      'name'=>	(string)    Required
     *      'few'=>	(string)
     *      'buyprice'=>	(float)
     *      'sellprice'=>	(float)
     *      'sellprice2'=>	(float)
     *      'Sellprice3'=>	(float)
     *      'Sellprice4'=>	(float)
     *      'Sellprice5'=>	(float)
     *      'Sellprice6'=>	(float)
     *      'Sellprice7'=>	(float)
     *      'Sellprice8'=>	(float)
     *      'Sellprice9'=>	(float)
     *      'Sellprice10'=>	(float)
     *      'countinkarton'=>	(string)
     *      'countinbasteh'=>	(string)
     *      'uniterpcode'=>	(string)
     * ]
     * 
     * @return array
     */
    public static function NewProduct($params = []): array
    {
        return self::postRequestJson('Product', $params);
    }

    /**
     * EditProduct
     *
     * ### Example
     * ```
     * $product = Product::EditProduct([
     *    'productinfo' => [
     *        'erpcode' => 'bBALNA1mcgF7UB4O',
     *        'name' => 'نامش ادیت شود'
     *    ]
     * ]);
     * ```
     * 
     * @param  mixed $params
     * @return array
     */
    public static function EditProduct($params = []): array
    {
        return self::putRequestJson('Product', $params);
    }

    /**
     * return the total number of products|محاسبه تعداد محصولات 
     * 
     * @return int
     */
    public static function GetProductCount(): int
    {
        return self::getRequest('Product/count', []);
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
