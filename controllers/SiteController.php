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
        
        //рекомендуемые товары
        $recommendedProducts = [];
        $recommendedProducts = Product::getRecommendedProducts();
        
        //последние добавленные продукты
        $latestProducts = [];
        $latestProducts = Product::getLatestProducts();
        
        require_once ROOT . '/views/site/index.php';
        
        return true;
    }
    
    /**
     * Отправка сообщения пользователя. Обратная связь
     * @return boolean
     */
    public function actionContact()
    {
        $userEmail = '';
        $userText = '';
        $result = false;
        
        if (isset($_POST['submit'])) {
            $userEmail = $_POST['userEmail'];
            $userText = $_POST['userText'];
            
            $errors = false;
            
            if (!User::checkEmail($userEmail)) {
                $errors[] = 'Неправильный email';
            }
            
            if ($errors == false) {
                $mail = 'vgrugor@gmail.com';
                $subject = 'Тема письма';
                $message = 'Текст письма';
                
                $result = mail($mail, $subject, $message);
                
                $result = true;
            }
        }
        
        require_once ROOT . '/views/site/contact.php';
        
        return true;
    }
}
