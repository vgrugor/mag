<?php

/**
 * Регистрация, вход, выход с сайта
 *
 */
class UserController {
    
    /**
     * Проверка введенных данных и регистрация
     * @return boolean
     */
    public function actionRegister() {
        
        //Для избежания ошибок при первом открытии страницы регистрации
        $name = '';
        $email = '';
        $password = '';
        
        $result = false;
        
        //если кнопка Регистрация нажата
        if (isset($_POST['submit'])) {
            $name = $_POST['name'];
            $email = $_POST['email'];
            $password = $_POST['password'];
            
            $errors = false;
            
            if(!User::checkName($name)) {
                $errors[] = 'Имя должно быть длиннее 2 символов';
            }
            
            if (!User::checkEmail($email)) {
                $errors[] = 'Емаил указан неверно';
            }
            
            if (!User::checkPassword($password)) {
                $errors[] = 'Пароль должен быть длиннее 6 символов';
            }
            
            if (User::checkEmailExists($email)) {
                $errors[] = 'Такой email уже используется';
            }
            
            //если ошибок небыло и $result осталось false
            if ($errors == false) {
                $result = User::register($name, $email, $password);
            }
        }
        
        require ROOT . '/views/user/register.php';
        
        return true;
    }
    
    /**
     * Проверка пользователя на существование и вход на сайт
     * @return boolean
     */
    public function actionLogin()
    {
        //Для избежания ошибок при первом открытии страницы входа
        $email = '';
        $password = '';
        
        //если нажата кнопка войти
        if (isset($_POST['submit'])) {
            $email = $_POST['email'];
            $password = $_POST['password'];
            
            $errors = false;
            
            //валидация полей
            if (!User::checkEmail($email)) {
                $errors[] = 'Неверный email';
            }
            
            if (!User::checkPassword($password)) {
                $errors[] = 'Неверный пароль';
            }
            
            //Проверяем, существует ли пользователь, если да - получаем его id
            $userId = User::checkUserData($email, $password);
            
            if ($userId == false) {
                $errors[] = 'Такого пользователя не существует';
            } else {
                //если данные правильные - создаем переменную сессии
                User::auth($userId);
                
                //перенаправляем в личный кабинет
                header('Location: /cabinet/');
            }
            
        }
        
        require_once ROOT . '/views/user/login.php';
        
        return true;
    }
    
    /**
     * Выход пользователя - удаление переменной $_SESSION['user']
     */
    public function actionLogout()
    {
        unset($_SESSION['user']);
        header('Location: /');
    }
}
