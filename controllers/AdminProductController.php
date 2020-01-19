<?php

/**
 * Управление товарами
 *
 * @author Zver
 */
class AdminProductController extends AdminBase {
    
    /**
     * Страница сосписком товаров
     * @return boolean
     */
    public function actionIndex()
    {
        self::checkAdmin();
        
        $products = Product::getProductsList();
              
        require_once ROOT . '/views/admin_product/index.php';
        
        return true;
    }
    
    public function actionDelete($id)
    {
        self::checkAdmin();
        
        if (isset($_POST['submit'])) {
            Product::deleteProductById($id);
            
            header("Location: /admin/product");
        }
        
        require_once ROOT . '/views/admin_product/delete.php';
        
        return true;
    }
}
