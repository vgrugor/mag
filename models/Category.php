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
    
    /**
     * Получить список категорий для выпадающего списка
     * @return array <p>массив со списком категорий</p>
     */
    public static function getCategoriesListAdmin()
    {
        $db = Db::getConnection();
        
        $sql = 'SELECT id, name, sort_order, status FROM category ORDER BY sort_order ASC';
        
        $result = $db->query($sql);
        
        $i=0;
        while ($row = $result->fetch()) {
            $categoriesList[$i]['id'] = $row['id'];
            $categoriesList[$i]['name'] = $row['name'];
            $categoriesList[$i]['sort_order'] = $row['sort_order'];
            $categoriesList[$i]['status'] = $row['status'];
            $i++;
        }
        return $categoriesList;
    }
}
