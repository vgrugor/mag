<?php

    return [
        
        '/product/([0-9]+)' => 'product/view/$1', //просмотр страцницы продукта по id
        
        '/catalog' => 'catalog/index', //страница с каталогом товаров
        '/category/([0-9]+)' => 'catalog/category/$1', //показ товаров определенной категории
        
        '' => 'site/index', //главная страница
        
    ];

