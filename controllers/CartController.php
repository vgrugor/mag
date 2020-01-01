<?php

/**
 * Корзина товаров
 *
 * @author rt.hryhoriev
 */
class CartController {
    
    public function actionAdd($id) 
    {
        //запись товара в сессию
        Cart::addProduct($id);
        
        //переадресация на исходную страницу
        $referrer = $_SERVER['HTTP_REFERER'];
        
        header("Location: $referrer");
    }
    
    public function actionAddAjax ($id)
    {
        echo Cart::addProduct($id);
        
        return true;
    }
    
    /**
     * Страница корзины со списком товаров
     * @return boolean
     */
    public function actionIndex()
    {
        //для отображения в меню списка категорий
        $categories = [];
        $categories = Category::getCategoriesList();
        
        $productsInCart = false;
        
        //получить массив из сессии
        $productsInCart = Cart::getProducts();
        
        if ($productsInCart) {
            //получить массив с id товаров
            $productsIds = array_keys($productsInCart);
            //получить полную информацию о товарах
            $products = Product::getProductsByIds($productsIds);
            
            //подсчет общей стоимости товаров в корзине
            $totalPrice = Cart::getTotalPrice($products);
        }
        
        require_once ROOT . '/views/cart/index.php';
        
        return true;
    }
    
    /**
     * Экшен отображения формы и оформления заказа
     * 
     */
    public function actionCheckout()
    {
        //список категорий для левого столбца вида
        $category = [];
        $category = Category::getCategoriesList();
        
        //статус для сохранения работы метода save()
        $result = false;
        
        //Если форма отправлена
        if (isset($_POST['submit'])) {
            
            //получаем отправленные значения
            $userName = $_POST['userName'];
            $userPhone = $_POST['userPhone'];
            $userComment = $_POST['userComment'];
            
            //Валидация полей
            $errors = false;
            
            if (!User::checkName($userName)) {
                $errors[] = 'Неправильное имя';
            }
            if (!User::checkPhone($userPhone)) {
                $errors[] = 'Неправильный номер телефона';
            }
            
            if ($errors == false) {
                //Форма заполнена корректно
                //Сохраняем информацию в БД
                $productsInCart = Cart::getProducts();
                if (User::isGuest()) {
                    $userId = false;
                } else {
                    $userId = User::checkLogged();
                }
                
                //Сохраняем заказ в БД
                $result = Order::save($userName, $userPhone, $userComment, $userId, $productsInCart);
                
                if ($result) {
                    //Оповещаем администратора о новом заказе
                    $adminEmail = 'example@mail.com';
                    $message = 'http://test2/admin/order';
                    $subject = 'Новый заказ';
                    mail($adminEmail, $subject, $message);
                    
                    //Очищаем корзину
                    Cart::clear();
                }
            } else {
                //Форма заполнена не корректно
                
                //для вывода итогов
                $productsInCart = Cart::getProducts();
                $productsIds = array_keys($productsInCart);
                $products = Product::getProductsByIds($productsIds);
                $totalPrice = Cart::getTotalPrice($products);
                $totalQuantity = Cart::countItems();
            }
            
        //Форма не отправлена
        } else {
            
            //Получить товары из корзины
            $productsInCart = Cart::getProducts();
            
            //если товаров в корзине нет
            if ($productsInCart == false) {
                //Отправляем пользователя на главную страницу
                header("Location: /");
                
            } else {
                //В корзине есть товары
                
                //Получаем Ид товаров в корзине
                $productsIds = array_keys($productsInCart);
                //Получение массива с полной информацией о товарах
                $products = Product::getProductsByIds($productsIds);
                //Подсчитать общюю стоимость
                $totalPrice = Cart::getTotalPrice($products);
                //Количество товаров в корзине
                $totalQuantity = Cart::countItems();
                
                $userName = false;
                $userPhone = false;
                $userComment = false;
                
                //Пользователь не авторизирован
                if (User::isGuest()) {
                    //Форма пустая
                } else {
                    //Пользователь авторизирован
                    $userId = User::checkLogged();
                    //Получить информацию о пользователе
                    $user = User::getUserById($userId);
                    //Для подставления в форму
                    $userName = $user['name'];
                }
            }
        }
        require_once ROOT . '/views/cart/checkout.php';
        
        return true;
    }
    
    /**
     * Удалить 1 единицу товара из корзины
     * @param int $productId - id товара для удаления
     * @return boolean
     */
    public function actionDelete($productId)
    {
        //удалить товар из корзины
        Cart::delete($productId);
        
        //возвратить пользователя на страницу корзины
        header("Location: /cart/");
        
        return true;
    }
}
