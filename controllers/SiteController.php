<?php

/**
 * Для главной страницы
 *
 * @author rt.hryhoriev
 */

class SiteController {
    
    public function actionIndex() {
        
        //список категорий
        $categories = [];
        $categories = Category::getCategoriesList();
        
        //последние добавленные продукты
        $latestProducts = [];
        $latestProducts = Product::getLatestProducts();
        
        require_once ROOT . '/views/site/index.php';
        
        return true;
    }
}
