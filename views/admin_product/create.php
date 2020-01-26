<?php require_once ROOT . '/views/layouts/header_admin.php'; ?>
<div class="row juatify-content-center">
    <div class="col-lg-4">
        <?php if (isset($errors) && is_array($errors)): ?>
            <ul>
                <?php foreach ($errors as $error): ?>
                    <li><?=$error?></li>
                <?php endforeach; ?>
            </ul>
        <?php endif; ?>
    </div>
</div>
<div class="row juatify-content-center">
    <div class="col-lg-4">
        <div class="login-form">
            <form action="#" method="post" enctype="multipart/form-data">
                <p>Название товара</p>
                <input type="text" name="name" placeholder="" value="">
                
                <p>Артикул</p>
                <input type="text" name="code" placeholder="" value="">
                
                <p>Стоимость</p>
                <input type="text" name="price" placeholder="" value="">
                
                <p>Категория</p>
                <select name="category_id">
                    <?php if (is_array($categoriesList)): ?>
                        <?php foreach ($categoriesList as $category): ?>
                            <option value="<?=$category['id']?>">
                                <?=$category['name']?>
                            </option>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </select>
                
                <p>Производитель</p>
                <input type="text" name="brand" placeholder="" value="">
                
                <p>Изображение товара</p>
                <input type="file" name="image" placeholder="" value="">
                
                <p>Полное описание</p>
                <textarea name="discription"></textarea>
                
                <p>Наличие на складе</p>
                <select name="availability">
                    <option value="1" selected="selected">Да</option>
                    <option value="0">Нет</option>
                </select>
                
                <p>Новинка</p>
                <select name="is_new">
                    <option value="1" selected="selected">Да</option>
                    <option value="0">Нет</option>
                </select>
                
                <p>Рекомендуемый товар</p>
                <select name="is_recommended">
                    <option value="1" selected="selected">Да</option>
                    <option value="0">Нет</option>
                </select>
                
                <p>Статус</p>
                <select name="status">
                    <option value="1" selected="selected">Отображается</option>
                    <option value="0">Не отображается</option>
                </select>
                
                <input type="submit" name="submit" value="Сохранить">
            </form>
        </div>
    </div>
</div>
<?php require_once ROOT . '/views/layouts/footer_admin.php'; ?>
