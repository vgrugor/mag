<?php require_once ROOT . '/views/layouts/header.php';?>

<section>
    <div class="container">
        <div class="row">
            <div class="col-sm-3">
                <div class="left-sidebar">
                    <h2>Каталог</h2>
                    <div class="panel-group category-products">
                        <?php foreach ($categories as $categoryItem): ?>
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h4 class="panel-title">
                                        <a href="/category/<?=$categoryItem['id']?>">
                                            <?=$categoryItem['name']?>
                                        </a>
                                    </h4>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
            
            <div class="col-sm-9 padding-right">
                <div class="features_items">
                    <h2 class="title text-center">
                        Корзина
                    </h2>
                    <?php if ($productsInCart): ?>
                        <p>Вы выбрали такие товары</p>
                        <table class="table-bordered table-striped table">
                            <tr>
                                <td>Код товара</td>
                                <td>Название</td>
                                <td>Стоимость, грн</td>
                                <td>Количество, шт</td>
                                <td>Удалить</td>
                            </tr>
                            <?php foreach ($products as $product): ?>
                                <tr>
                                    <td><?=$product['code']?></td>
                                    <td>
                                        <a href="/product/<?=$product['id']?>">
                                            <?=$product['name']?>
                                        </a>
                                    </td>
                                    <td><?=$product['price']?></td>
                                    <td><?=$productsInCart[$product['id']]?></td>
                                    <td>
                                        <a href="/cart/delete/<?=$product['id']?>">Удалить</a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                                <tr>
                                    <td colspan="3">Общая стоимость:</td>
                                    <td><?=$totalPrice?></td>
                                </tr>
                        </table>
                        <a href="/cart/checkout">Оформить заказ</a>
                    <?php else: ?>
                        <p>Корзина пуста</p>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</section>

<?php require_once ROOT . '/views/layouts/footer.php'; ?>