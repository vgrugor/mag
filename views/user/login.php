<?php require ROOT . '/views/layouts/header.php' ?>

<section>
    <div class="container">
        <div class="row">
            <div class="col-sm-4 col-sm-offset-4 padding-right">
                
                <div class="signup-form">
                    <h2>Регистрация на сайте</h2>
                    
                    <?php if (isset($errors) && is_array($errors)): ?>
                        <ul>
                            <?php foreach ($errors as $error): ?>
                                <li><?=$error?></li>
                            <?php endforeach; ?>
                        </ul>
                    <?php endif; ?>
                    
                    <form action="#" method="post">
                        <input type="email" name="email" value="<?=$email?>" placeholder="email">
                        <input type="password" name="password" value="$password" placeholder="Пароль">
                        <input type="submit" name="submit" class="btn btn-default" value="Войти">
                    </form>
                </div>
                
            </div>
        </div>
    </div>
</section>
    
<?php require ROOT . '/views/layouts/footer.php'; ?>