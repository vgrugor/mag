<?php require_once ROOT . '/views/layouts/header.php'; ?>
<section>
    <div class="container">
        <div class="row">
            <div class="col-sm-9 padding-right">
                <div class="features_items">
                    
                    <h2 class="title text-center">Корзина</h2>

                    <?php if ($result): ?>
                        <p>Заказ оформлен. Мы Вам перезвоним!!!</p>
                    <?php else: ?>
                        <p>Выбрано товаров <?=$totalQuantity?> на сумму <?=$totalPrice?></p>

                        <div class="col-sm-4">
                            <?php if (isset($errors) && is_array($errors)): ?>
                                <ul>
                                    <?php foreach ($errors as $error):?>
                                        <li><?=$error?></li>
                                    <?php endforeach; ?>
                                </ul>
                            <?php endif; ?>

                            <p>Для оформления заказа заполните форму. Наш менеджер свяжется с вами.</p>

                            <div class="login-form">
                                <form action="#" method="post">
                                    <p>Ваше имя</p>
                                    <input type="text" name="userName" placeholder="" value="<?=$userName?>">

                                    <p>Ваш телефон</p>
                                    <input type="text" name="userPhone" placeholder="" value="<?=$userPhone?>">

                                    <p>Ваш коментарий</p>
                                    <input type="text" name="userComment" placeholder="" value="<?=$userComment?>">

                                    <input type="submit" name="submit" value="Отправить" class="btn btn-default">
                                </form>
                            </div>
                        </div>
                    <?php endif; ?>
                </div>    
            </div>
        </div>
    </div>
</section>

<?php require_once ROOT . '/views/layouts/footer.php'; ?>