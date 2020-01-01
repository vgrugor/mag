<?php

/**
 * Подробная информация о продукте
 *
 * @author rt.hryhoriev
 */
class ProductController {
    
    public function actionView($id) {
        
        $categories = [];
        $categories = Category::getCategoriesList();
        
        $product = [];
        $product = Product::getProductById($id);
        
        require_once ROOT . '/views/product/view.php';
    
        return true;
    }
}
