<?php

    return [
        
        '/product/([0-9]+)' => 'product/view/$1', //просмотр страцницы продукта по id
        
        '/catalog' => 'catalog/index', //страница с каталогом товаров
        
        '/category/([0-9]+)/page-([0-9]+)' => 'catalog/category/$1/$2', //страница категорий
        '/category/([0-9]+)' => 'catalog/category/$1', //показ товаров определенной категории
        
        '/cart/add/([0-9]+)' => 'cart/add/$1',          //добавление товара в корзину 
        '/cart/addAjax/([0-9]+)' => 'cart/addAjax/$1',  //добавление товара асинхронным запросом ajax
        '/cart/checkout' => 'cart/checkout',            //оформление заказа
        '/cart/delete/([0-9]+)' => 'cart/delete/$1',    //удалить товар из корзины
        '/cart' => 'cart/index',                        //страница корзины со списком товаров
        
        '/user/register' => 'user/register',
        '/user/login' => 'user/login',
        '/user/logout' => 'user/logout',
        
        '/cabinet/edit' => 'cabinet/edit',              //Редактирование личных данных пользователя
        '/cabinet' => 'cabinet/index',                  //Кабинет пользователя
        
        '/contacts' => 'site/contact',      //для формы обратной связи
        
        '/admin' => 'admin/index',          //главная панели администратора
        
        '' => 'site/index', //главная страница
        
    ];

