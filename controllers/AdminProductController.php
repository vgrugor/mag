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
    
    /**
     * Страница создания товара
     * @return boolean
     */
    public function actionCreate()
    {
        self::checkAdmin();
        
        $categoriesList = Category::getCategoriesListAdmin();
        
        if (isset($_POST['submit'])) {
            $options['name'] = $_POST['name'];
            $options['code'] = $_POST['code'];
            $options['price'] = $_POST['price'];
            $options['category_id'] = $_POST['category_id'];
            $options['brand'] = $_POST['brand'];
            $options['availability'] = $_POST['availability'];
            $options['discription'] = $_POST['discription'];
            $options['is_new'] = $_POST['is_new'];
            $options['is_recommended'] = $_POST['is_recommended'];
            $options['status'] = $_POST['status'];
            
            $errors = false;
            
            if (!isset($options['name']) || empty($options['name'])) {
                $errors[] = 'Название товара не может быть пустым!';
            }
            
            if ($errors == false) {
                $id = Product::createProduct($options);
                
                if ($id) {
                    if (is_uploaded_file($_FILES['image']['tmp_name'])) {
                        move_uploaded_file($_FILES['image']['tmp_name'], $_SERVER['DOCUMENT_ROOT'] . '/upload/images');
                    }
                }
                header('Location: /admin/product');
            }
        }
        
        require_once ROOT . '/views/admin_product/create.php';
        
        return true;
    }
}
