<?php

class Category {
    
    /**
     * Возвращает поля id и name из таблицы категории
     * @return array
     */
    public static function getCategoriesList() {
        
        $db = Db::getConnection();
        
        $categoryList = [];
        
        $sql = 'SELECT id, name FROM category '
                . 'ORDER BY sort_order ASC';
        
        $result = $db->query($sql);
        
        $i = 0;
        while ($row = $result->fetch()) {
            $categoryList[$i]['id'] = $row['id'];
            $categoryList[$i]['name'] = $row['name'];
            $i++;
        }
        
        return $categoryList;
                
    }
}
