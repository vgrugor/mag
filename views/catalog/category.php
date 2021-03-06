<?php require_once ROOT . '/views/layouts/header.php'; ?>

        <section>
            <div class="container">
                <div class="row">
                    <div class="col-sm-3">
                        <div class="left-sidebar">
                            <h2>Каталог</h2>
                            <div class="panel-group category-products">
                                <?php foreach ($categoryes as $categoryItem): ?>
                                    <div class="panel panel-default">
                                        <div class="panel-heading">
                                            <h4 class="panel-title">
                                                <a href="/category/<?=$categoryItem['id']?>"
                                                   class="<?php if ($categoryItem['id'] == $categoryId) echo 'active' ?>"
                                                >
                                                    <?=$categoryItem['name']?>
                                                </a></h4>
                                        </div>
                                    </div>
                                <?php endforeach; ?>
                                
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-9 padding-right">
                        <div class="features_items"><!--features_items-->
                            <h2 class="title text-center">Последние товары</h2>
                            
                            <?php foreach ($categoryProducts as $product): ?>
                                <div class="col-sm-4">
                                    <div class="product-image-wrapper">
                                        <div class="single-products">
                                            <div class="productinfo text-center">
                                                <img src="/template/images/home/product1.jpg" alt="" />
                                                <h2>$<?=$product['price']?></h2>
                                                <p>
                                                    <a href="/product/<?=$product['id']?>">
                                                        <?=$product['name']?>
                                                    </a>
                                                </p>
                                                <a href="/cart/add/<?=$product['id']?>" class="btn btn-default"><i class="fa fa-shopping-cart">В корзину</i></a>
                                            </div>
                                            <?php if ($product['is_new']): ?>
                                                <img src="/template/images/home/new.png" class="new" alt=""/>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                            
                            <?php echo $pagination->get() ?>
                            
                        </div><!--features_items-->

                    </div>
                </div>
            </div>
        </section>

<?php require_once ROOT . '/views/layouts/footer.php'; ?>