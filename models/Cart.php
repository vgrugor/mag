<?php

/**
 * Description of Cart
 *
 * @author rt.hryhoriev
 */
class Cart {
    
    /**
     * Добавление товаров в корзину (в сессию)
     * @param type $id
     */
    public static function addProduct($id)
    {
        $id = intval($id);
        
        $productsInCart = [];
        
        if (isset($_SESSION['products'])) {
            $productsInCart = $_SESSION['products'];
        }
        
        if (array_key_exists($id, $productsInCart)) {
            $productsInCart[$id]++;
        } else {
            $productsInCart[$id] = 1;
        }
        
        $_SESSION['products'] = $productsInCart;
        
        return self::countItems();
    }
    
    /**
     * Подсчет количества товаров в корзине
     * @return int
     */
    public static function countItems()
    {
        if (isset($_SESSION['products'])) {
            $count = 0;
            foreach ($_SESSION['products'] as $id => $quantity) {
                $count = $count + $quantity;
            }
            return $count;
        } else {
            return 0;
        }
    }
    
    /**
     * Возвращает список товаров в корзине
     * @return array|boolean - массив id=>quantity или false - если пусто
     */
    public static function getProducts()
    {
        if (isset($_SESSION['products'])) {
            return $_SESSION['products'];
        }
        return false;
    }
    
    /**
     * Возвратит общую стоимость товаров
     * @param array $products - перечень товаров
     * @return float - общая стоимость
     */
    public static function getTotalPrice($products)
    {
        $productsInCart = self::getProducts();
        
        $total = 0;
        
        if ($productsInCart) {
            foreach ($products as $item) {
                $total += $item['price'] * $productsInCart[$item['id']];
            }
        }
        
        return $total;
    }
    
    /**
     * Очистка корзины
     */
    public static function clear()
    {
        if (isset($_SESSION['products'])) {
            unset($_SESSION['products']);
        }
    }
    
    public static function delete($productId)
    {
        //получаем товары в корзине
        $productsInCart = Cart::getProducts();
        
        //уменьшаем количество на 1
        $productsInCart[$productId]--;
        
        //если количество равно 0, удалаем товар из корзины
        if ($productsInCart[$productId] == 0) {
            unset($productsInCart[$productId]);
        }
        $_SESSION['products'] = $productsInCart;
    }
}
