<?php

/**
 * Информация о продуте
 *
 * @author rt.hryhoriev
 */
class ProductController {
    
    public function actionView($id) {
        
        $categories = [];
        $categories = Category::getCategoriesList();
        
        $product = Product::getProductById($id);
        
        require_once ROOT . '/views/product/view.php';
    
        return true;
    }
}
