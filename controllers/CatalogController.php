<?php

require_once ROOT . '/models/category.php';
require_once ROOT . '/models/product.php';

class CatalogController {
    
    /**
     * Страница каталога с последними товарами
     * @return boolean
     */
    public function actionIndex() {
        
        $categories = [];
        $categories = Category::getCategoriesList();
        
        $latestProducts = [];
        $latestProducts = Product::getLatestProducts(12);
        
        require_once ROOT . '/views/catalog/index.php';
        
        return true;
        
    }
    
    /**
     * Отображает список продуктов определенной категории
     * @param int $categoryId
     * @return boolean
     */
    public function actionCategory($categoryId) {
        
        //для отображения слева на странице
        $categoryes = [];
        $categoryes = Category::getCategoriesList();
        
        $categoryProducts = [];
        $categoryProducts = Product::getProductListByCategory($categoryId);
        
        require_once ROOT . '/views/catalog/category.php';
        
        return true;
        
    }
}
