<?php

/**
 * Description of User
 *
 * @author rt.hryhoriev
 */
class User {
    
    /**
     * Добавление записи в БД с именем, email и паролем
     * @param str $name
     * @param str $email
     * @param str $password
     * @return bool
     */
    public static function register($name, $email, $password) {
        
        $db = Db::getConnection();
        
        $sql = 'INSERT INTO user (name, email, password) ' .
                'VALUES (:name, :email, :password)';
        
        $result = $db->prepare($sql);
        $result->bindParam(':name', $name, PDO::PARAM_STR);
        $result->bindParam(':email', $email, PDO::PARAM_STR);
        $result->bindParam(':password', $password, PDO::PARAM_STR);
        
        return $result->execute();
    }
    
    /**
     * Валидация имени пользователя
     * @param str $name
     * @return boolean
     */
    public static function checkName($name) {
        
        if (strlen($name) > 2) {
            return true;
        }
        return false;
    }
    
    /**
     * Проверка корректности телефона в заказе
     * @param str $phone
     * @return boolean
     */
    public static function checkPhone($phone)
    {
        if (strlen($phone > 8)) {
            return true;
        }
        return false;
    }

    /**
     * Валидация email
     * @param type $email
     * @return boolean
     */
    public static function checkEmail($email) {
        
        if(filter_var($email, FILTER_VALIDATE_EMAIL)) {
            return true;
        }
        return false;
    }
    
    /**
     * Валидация пароля
     * @param type $password
     * @return boolean
     */
    public static function checkPassword($password) {
        
        if (strlen($password) >= 6) {
            return true;
        }
        return false;
    }
    
    /**
     * Проверка на существование введенного email в базе
     * @param type $email
     */
    public static function checkEmailExists($email) {
        
        $db = Db::getConnection();
        
        $sql = 'SELECT COUNT(*) FROM user WHERE email = :email';
        
        $result = $db->prepare($sql);
        $result->bindParam(':email', $email, PDO::PARAM_STR);
        $result->execute();
        
        if ($result->fetchColumn()) {
            return true;
        }
        return false;
    }
    
    /**
     * Проверка существования пользователя по логину и паролю в БД
     * @param str $email
     * @param str $password
     * @return id пользователя или false
     */
    public static function checkUserData($email, $password)
    {
        
        $db = Db::getConnection();
        
        $sql = 'SELECT * FROM user '
                . 'WHERE email = :email '
                . 'AND password = :password';
        
        $result = $db->prepare($sql);
        $result->bindParam(':email', $email, PDO::PARAM_STR);
        $result->bindParam(':password', $password, PDO::PARAM_STR);
        $result->execute();
        
        $user = $result->fetch();
        
        if ($user) {
            return $user['id'];
        }
        
        return false;
    }
    
    /**
     * Создаем переменную $_SESSION['user']
     * @param type $userId
     */
    public static function auth($userId)
    {
        $_SESSION['user'] = $userId;
    }
    
    /**
     * Проверка, вошел ли пользователь на сайт
     * @return int если пользователь вошел на сайт
     */
    public static function checkLogged()
    {
        //если сессия есть, вернем идентификатор пользователя
        if (isset($_SESSION['user'])) {
            return $_SESSION['user'];
        }
        
        header('Location: /user/login');
    }
    
    /**
     * Проверка, является ли пользователь гостем.
     * @return boolean - true пользователь гость, false пользователь зарегистрирован
     */
    public static function isGuest()
    {
        if (isset($_SESSION['user'])) {
            return false;
        }
        
        return true;
    }
    
    /**
     * Получить информацию о пользователе по его id
     * @param int $id
     * @return array - данные пользователя
     */
    public static function getUserById($id)
    {
        if ($id) {
            $db = Db::getConnection();
            
            $sql = 'SELECT * FROM user WHERE id = :id';
            
            $result = $db->prepare($sql);
            $result->bindParam(':id', $id, PDO::PARAM_INT);
            
            $result->setFetchMode(PDO::FETCH_ASSOC);
            $result->execute();
            
            return $result->fetch();
        }
    }
    
    /**
     * Сохранение новых данных пользователя после изменения
     * @param int $id
     * @param str $name
     * @param str $password
     * @return bool
     */
    public static function edit($id, $name, $password)
    {
        $db = Db::getConnection();
        
        $sql = 'UPDATE user '
                . 'SET name = :name, '
                . 'password = :password '
                . 'WHERE id = :id';
        
        $result = $db->prepare($sql);
        $result->bindParam(':id', $id, PDO::PARAM_INT);
        $result->bindParam(':name', $name, PDO::PARAM_STR);
        $result->bindParam(':password', $password, PDO::PARAM_STR);
        
        return $result->execute();
    }
    
}
