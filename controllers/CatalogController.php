<?php

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
    public function actionCategory($categoryId, $page = 1) {
        
        //для отображения слева на странице
        $categoryes = [];
        $categoryes = Category::getCategoriesList();
        
        //получаем общее количество товаров в категории
        $total = Product::getTotalProductsInCategory($categoryId);
        
        $categoryProducts = [];
        $categoryProducts = Product::getProductListByCategory($categoryId, $page);
        
        $pagination = new Pagination($total, $page, Product::SHOW_BY_DEFAULT, 'page-');
        
        require_once ROOT . '/views/catalog/category.php';
        
        return true;
        
    }
}
