<?php

/**
 * Личный кабинет пользователя
 *
 * @author rt.hryhoriev
 */
class CabinetController {
    
    /**
     * Главная страница кабинета
     * @return boolean
     */
    public function actionIndex() 
    {
        //если пользователь вошел, получаем его id
        $userId = User::checkLogged();
        
        //получаем информацию о пользователе для приветствия по имени
        $user = User::getUserById($userId);
        
        echo $userId;
        
        require_once ROOT . '/views/cabinet/index.php';
        
        return true;
    }
    
    /**
     * Страница редактирования информации о пользователе
     * @return boolean
     */
    public function actionEdit()
    {
        //Получаем идентификатор пользователя из сессии
        $userId = User::checkLogged();
        
        //Получаем данные пользователя из базы для вставки в поля формы
        $user = User::getUserById($userId);
        
        //для отображения в полях при открытии страницы редактирования учетных данных пользователя
        $name = $user['name'];
        $password = $user['password'];
        
        $result = false;
        
        //если нажата кнопка сохранить (изменения)
        if (isset($_POST['submit'])) {
            $name = $_POST['name'];
            $password = $_POST['password'];
            
            $errors = false;
            
            if (!User::checkName($name)) {
                $errors[] = 'Неправильное имя';
            }
            
            if (!User::checkPassword($password)) {
                $errors[] = 'Слишком короткий пароль';
            }
            
            //если ошибок небыло и errors == false
            if ($errors == false) {
                //записываем новые данные в БД
                $result = User::edit($userId, $name, $password);
            }
        }
        
        require_once ROOT . '/views/cabinet/edit.php';
        
        return true;
    }
}
