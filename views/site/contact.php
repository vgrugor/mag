<?php require_once ROOT . '/views/layouts/header.php'; ?>

    <section>
        <div class="row">
            <div class="col-sm-4 col-sm-offset-4 padding-right">
                <?php if ($result): ?>
                    <p>Ваше сообщение отправлено. Скоро мы ответим на него!</p>
                <?php else: ?>
                    <?php if (isset($errors) && is_array($errors)): ?>
                        <ul>
                            <?php foreach ($errors as $error): ?>
                                <li><?=$error?></li>
                            <?php endforeach; ?>
                        </ul>
                    <?php endif; ?>
                    
                        <div class="signup-form">
                            <h2>Обратная связь</h2>
                            <h5>Есть вопрос? Напишите нам!</h5>
                            <br>
                            <form action="#" method="post">
                                <p>Ваш email</p>
                                <input type="email" name="userEmail" value="<?=$userEmail?>">
                                <p>Ваше сообщение</p>
                                <input type="text" name="userText" value="<?=$userText?>">
                                <input type="submit" name="submit" class="btn btn-default" value="Отправить">
                            </form>
                        </div>
                <?php endif; ?>
                
            </div>
        </div>
    </section>

<?php require_once ROOT . '/views/layouts/footer.php'; ?>