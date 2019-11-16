<?php

    return [
        
        '/product/([0-9]+)' => 'product/view/$1', //просмотр страцницы продукта по id
        
        '/catalog' => 'catalog/index', //страница с каталогом товаров
        
        '/category/([0-9]+)/page-([0-9]+)' => 'catalog/category/$1/$2', //страница категорий
        '/category/([0-9]+)' => 'catalog/category/$1', //показ товаров определенной категории
        
        '/user/register' => 'user/register',
        '/user/login' => 'user/login',
        
        '/cabinet/edit' => 'cabinet/edit',
        '/cabinet' => 'cabinet/index',
        
        '' => 'site/index', //главная страница
        
    ];

