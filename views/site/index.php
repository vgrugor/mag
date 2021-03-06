<?php require_once ROOT . '/views/layouts/header.php'; ?>

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
                            
                            <?php foreach ($latestProducts as $product): ?>
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
                                                <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>В корзину</a>
                                            </div>
                                            <?php if ($product['is_new']): ?>
                                                <img src="/template/images/home/new.png" class="new" alt=""/>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                            

                        </div><!--features_items-->
                        
                        <div class="recommended_items"><!--recommended_items-->
                            <h2 class="title text-center">Рекомендуемые товары</h2>
                            
                            <div class="cycle-slideshow"
                                 data-cycle-fx=carousel
                                 data-cycle-timeout=5000
                                 data-cycle-carousel-visible=3
                                 data-cycle-carousel-fluid=true
                                 data-cycle-slides="div.item"
                                 data-cycle-prev="#prev"
                                 data-cycle-next="#next"
                                 >
                                
                                <?php foreach ($recommendedProducts as $recommendedProduct):?>
                                    <div class="item">
                                        <div class="product-image-wrapper">
                                            <div class="single-products">
                                                <div class="productinfo text-center">
                                                    <img src="<?=Product::getImage($recommendedProduct['id'])?>" alt=""/>
                                                    <h2><?=$recommendedProduct['price']?></h2>
                                                    <a href="/product/<?=$recommendedProduct['id']?>">
                                                        <?=$recommendedProduct['name']?>
                                                    </a>
                                                    <br>
                                                    <br>
                                                    <a href="#" class="btn btn-default add-to-cart" data-id="<?=$recommendedProduct['id']?>">В корзину</a>
                                                </div>
                                                <?php if ($recommendedProduct['is_new']): ?>
                                                    <img src="/template/images/home/new.png" class="new" alt=""/>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                    </div>
                                <?php endforeach; ?>
                                
                            </div>
                            
                                <a class="left recommended-item-control" id="prev" href="#recommended-item-carousel" data-slide="prev">
                                    <i class="fa fa-angle-left"></i>
                                </a>
                                <a class="right recommended-item-control" id="next" href="#recommended-item-carousel" data-slide="next">
                                    <i class="fa fa-angle-right"></i>
                                </a>			
                            </div>
                            
                        </div><!--/recommended_items-->

                    </div>
                </div>
            </div>
        </section>

<?php require_once ROOT . '/views/layouts/footer.php'; ?>
        