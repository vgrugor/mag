<?php require_once ROOT . '/views/layouts/header_admin.php'; ?>

<section>
    <div class="container">
        <div class="row">
            <br/>
            <div class="breadcrumbs">
                <ol class="breadcrumb">
                    <li><a href="/admin">Админпанель</a></li>
                    <li><a href="/admin/product">Управление товарами</a></li>
                    <li class="active">Удалить товар</li>
                </ol>
            </div>
            
            <h4>Удалить товар # <?=$id?>?</h4>
            
            <p>Вы действительно хотите удалить этот товар?</p>
            <form action="#" method="post">
                <input type="submit" name="submit" value="Удалить">
            </form>
        </div>
    </div>
</section>

<?php require_once ROOT . '/views/layouts/footer_admin.php'; ?>


