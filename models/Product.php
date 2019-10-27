<?php

class Product {
    
    const SHOW_BY_DEFAULT = 3;     //количество отображаемых рекомендуемых товаров по умолчанию
    
    /**
     * Возвращает последние добавленные товары
     * @param type $count
     * @return array
     */
    public static function getLatestProducts($count = self::SHOW_BY_DEFAULT) {
        
        $count = intval($count);
        
        $db = Db::getConnection();
        
        $productsList = [];
        
        $result = $db->query('SELECT id, name, price, image, is_new '
                . 'FROM product '
                . 'WHERE status = "1"'    //для получения только отображаемых товаров
                . 'ORDER BY id DESC '      //сортировка по ид по убыванию для получения последних добавленых товаров
                . 'LIMIT ' . $count);
        
        $i = 0;
        while ($row = $result->fetch()) {
            $productsList[$i]['id'] = $row['id'];
            $productsList[$i]['name'] = $row['name'];
            $productsList[$i]['price'] = $row['price'];
            $productsList[$i]['image'] = $row['image'];
            $productsList[$i]['is_new'] = $row['is_new'];
            $i++;
        }
        
        return $productsList;
        
    }
    
    /**
     * Возвращает товары определенной категории
     * @param type $categoryId
     * @return array
     */
    public static function getProductListByCategory($categoryId = false, $page = 1) {
        
        $categoryId = intval($categoryId);
        $offset = ($page - 1) * self::SHOW_BY_DEFAULT;
        
        if ($categoryId) {
            
            $db = Db::getConnection();
            
            $products = [];
            
            $result = $db->query('SELECT id, name, price, image, is_new FROM product '
                    . 'WHERE status = "1" AND category_id = ' . $categoryId . ' '
                    . 'ORDER BY id DESC '
                    . 'LIMIT ' . self::SHOW_BY_DEFAULT
                    . ' OFFSET ' . $offset);
            
            $i = 0;
            while ($row = $result->fetch()) {
                $products[$i]['id'] = $row['id'];
                $products[$i]['name'] = $row['name'];
                $products[$i]['image'] = $row['image'];
                $products[$i]['price'] = $row['price'];
                $products[$i]['is_new'] = $row['is_new'];
                $i++;
            }
            
            return $products;
        }
    }
    
    /**
     * Возвращает информацию о одном товаре по id
     * @param int $id
     * @return array
     */
    public static function getProductById($id) {
        
        $id = intval($id);
        
        if ($id) {
            $db = Db::getConnection();
            
            $result = $db->query('SELECT * FROM product WHERE id = ' . $id);
            $result->setFetchMode(PDO::FETCH_ASSOC);
            
            return $result->fetch();
        }
        
    }
    
    public static function getTotalProductsInCategory($categoryId) {
        
        $db = Db::getConnection();
        
        $result = $db->query('SELECT count(id) AS count FROM product '
                . 'WHERE status = "1" AND category_id = ' . $categoryId);
        
        $result->setFetchMode(PDO::FETCH_ASSOC);
        $row = $result->fetch();
        
        return $row['count'];
    }
}
