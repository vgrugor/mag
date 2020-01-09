<?php

/**
 * Базовый класс для AdminController с реализацией метода проверки прав доступа
 *
 * @author Zver
 */
class AdminBase {
    
    /**
     * Проверка прав доступа
     * @return boolean - если доступ есть
     */
    public function checkAdmin()
    {
        $userId = User::checkLogged();
        
        $user = User::getUserById($userId);
        
        if ($user['role'] == 'admin') {
            return true;
        }
        
        die('Access denied');
    }
}
