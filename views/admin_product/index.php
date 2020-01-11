<?php require_once ROOT . '/views/layouts/header_admin.php'; ?>
<div class="container">
    <div class="row">
        <br/>
        
        <div class="breadcrumbs">
            <ol>
                <li><a href="/admin">Админпанель</a></li>
                <li class="active"><a href="">Управление товарами</a></li>
            </ol>
        </div>
        
        <a href="/admin/product/create" class="btn btn-default back"><i class="fa fa-plus"></i> Добавить товар</a>
            
            <h4>Список товаров</h4>

            <br/>

            <table class="table-bordered table-striped table">
                <tr>
                    <td>id товара</td>
                    <td>Название</td>
                    <td>Артикул</td>
                    <td>Цена</td>
                    <td></td>
                    <td></td>
                </tr>
                <?php foreach ($products as $product): ?>
                    <tr>
                        <td><?=$product['id']?></td>
                        <td><?=$product['name']?></td>
                        <td><?=$product['code']?></td>
                        <td><?=$product['price']?></td>
                        <td><a href="/admin/product/update/<?=$product['id']?>" title="Редактировать"><i class="fa fa-pencil-square"></i></a></td>
                        <td><a href="/admin/product/delete/<?=$product['id']?>" title="Удалить"><i class="fa fa-times"></i></a></td>
                    </tr>
                <?php endforeach; ?>
            </table>
 
    </div>
</div>    

<?php require_once ROOT . '/views/layouts/footer_admin.php'; ?>