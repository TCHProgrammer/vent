<?php
/* @var $this yii\web\View */
//\Yii::$app->cache->flush();
use app\models\Categories;
use app\models\Brands;

?>
<!--<div class="main-content">-->
<!--
<div>
    <? //print_r(Categories::getLevelCategories(1)); ?>
</div>
<? //die(); ?>
-->



<div class="open-overlay"></div>
<div class="main-content__search-block">
    <div class="main-content__page-title">
        Категории
    </div>
    <div class="main-content__search-block_search">
        <input type="text" placeholder="Поиск по категориям и брендам">
        <div class="search-results">
            <div class="jcorgFilterTextParent">
                <div class="search-cont">
                    <ul>
                        <?$categories = Categories::find()->orderBy('name')->all();?>
                        <?foreach($categories as $category):?>
                            <?$brands = Brands::find()->where(array('category_id'=>$category->id))->orderBy('name')->all();?>
                            <?foreach($brands as $brand):?>
                                   <li><a href="/works?brands_id=<?=$brand->id;?>" class="jcorgFilterTextChild"><?=$category->name?> | <?=$brand->name?></a></li>
                            <?endforeach;?>
                        <?endforeach;?>

                    </ul>
                </div>
            </div>
        </div>
    </div>
<!--
    <script type="text/javascript">

        $('.main-content__search-block_search input').eq(0).bind('keyup',function(){
            $('.jcorgFilterTextChild').each(function(){



               var search_text = $(this).text();

               var pressed = $('.main-content__search-block_search input').eq(0).val();

               var searched = search_text.toUpperCase();





               if(searched.indexOf(pressed.toUpperCase()) == -1){
                   $(this).parent().css('display','none').removeClass('cat-and-brand-checked');
               } else {
                   $(this).parent().css('display','block').addClass('cat-and-brand-checked');
               }
            });
        });

        //setInterval(function(){
            //console.log($('.main-content__search-block_search input').eq(0).val());
        //},1000);
    </script>
    -->
</div>
<div class="main-content__display-category">
    <div class="main-content__display-category_title">Отображение категорий</div>
    <div class="toggle">
        <input type="checkbox" name="checkbox1" id="checkbox1" class="ios-toggle" />
        <label for="checkbox1" class="checkbox-label" ></label>
    </div>
    <div class="toggle-text"> - <span>все категории свернуты</span></div>
</div>
<div class="main-content__categories">

    <?$categories = Categories::find()->orderBy('name')->all();?>


    <?foreach($categories as $cat_index=>$category):?>

    <div class="main-content__categories-item">




        <div class="item-control">





            <div class="icon">
                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="13" height="8" viewBox="0 0 13 8"><defs><path id="ldxya" d="M334.59 239.531a1.5 1.5 0 0 1-2.121-2.121l4.961-4.962a1.495 1.495 0 0 1 1.07-.439c.387-.002.775.144 1.07.44l4.961 4.96a1.5 1.5 0 0 1-2.121 2.122l-3.91-3.91z"/></defs><g><g transform="translate(-332 -232)"><use fill="#232226" xlink:href="#ldxya"/></g></g></svg>
            </div>
            <div class="title"><?=$category->name;?></div>
            <!--<div class="title"><? //var_dump($category->children);?></div>-->


            <div class="item-control__menu">
                <a href="#" class="tooltiped">
                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="15" height="3" viewBox="0 0 15 3"><defs><path id="27h7a" d="M388.5 356a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3zm-6 0a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3zm-6 0a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3z"/></defs><g><g transform="translate(-375 -356)"><use fill="#d4d6d9" xlink:href="#27h7a"/></g></g></svg>
                    <div class="tooltip">
                        <button class="change to-category" category_id="<?=$category->id;?>" onclick="//$('.add-brands .add-brands__title').text('Редактирование категории');setElementCategoryNameToEdit(this); $('.aside-menu__menu ul li .cat .plus').click();">
                            <div class="icon">
                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="14" height="14" viewBox="0 0 14 14"><defs><path id="q4iwa" d="M440.737 384.61l-2.04 2.045-.001.002a4624.42 4624.42 0 0 1-7.343 7.342H428a.98.98 0 0 1-.481-.129 1 1 0 0 1-.326-.285 1.024 1.024 0 0 1-.064-.104.983.983 0 0 1-.108-.28A1 1 0 0 1 427 393v-2.884l.005-.465c2.444-2.45 4.892-4.897 7.343-7.342.002-.002.006-.003.008-.006l2.04-2.033a.938.938 0 0 1 .694-.286c.255.004.514.107.715.308l2.91 2.91c.402.402.412 1.032.022 1.408zm-5.654-.148zm-6.083 5.94V392h1.605c1.981-2.025 3.96-4.05 5.938-6.078l-1.46-1.46c-2.03 1.978-4.058 3.959-6.083 5.94zm8.142-7.995l-.651.634 1.474 1.474.634-.65-1.457-1.458z"/></defs><g><g transform="translate(-427 -380)"><use fill="#939499" xlink:href="#q4iwa"/></g></g></svg>
                            </div>
                            <div class="text">Редактировать</div>
                        </button>
                        <button class="delete" category_id="<?=$category->id;?>" onclick="deleteCategory(this);">
                            <div class="icon">
                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="13" height="15" viewBox="0 0 13 15"><defs><path id="j8sua" d="M430 415v6.5a.5.5 0 0 0 .5.5h6a.5.5 0 0 0 .5-.5V415h2v8a1 1 0 0 1-1 1h-9a1 1 0 0 1-1-1v-8zm1 0h2v6h-2zm3 0h2v6h-2zm-7-3h3v-2a1 1 0 0 1 1-1h5a1 1 0 0 1 1 1v2h3v2h-13zm8-1h-3v1h3z"/></defs><g><g transform="translate(-427 -409)"><use fill="#939499" xlink:href="#j8sua"/></g></g></svg>
                            </div>
                            <div class="text">Удалить</div>
                        </button>
                    </div>
                </a>
            </div>



        </div>
        <div class="item-content">
            <div class="wrap">
                <ul>
                    <?$brands = Brands::find()->where(array('category_id'=>$category->id))->orderBy('name')->all();?>
                    <?foreach($brands as $brand_index=>$brand):?>
                    <li>
                        <a href="/works?brands_id=<?=$brand->id;?>" class="tooltiped">
                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="15" height="3" viewBox="0 0 15 3"><defs><path id="27h7a" d="M388.5 356a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3zm-6 0a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3zm-6 0a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3z"></path></defs><g><g transform="translate(-375 -356)"><use fill="#d4d6d9" xlink:href="#27h7a"></use></g></g></svg>
                            <div class="tooltip">
                                <button class="copy" category_id="<?=$category->id;?>" brand_id="<?=$brand->id;?>" onclick="$('.add-brands .add-brands__title').text('Копирование категории'); setElementBrandNameOnCopy(this);">
                                    <div class="icon">
                                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="14" height="14" viewBox="0 0 14 14"><defs><path id="1jfaa" d="M441 351v8a1 1 0 0 1-1 1h-3v3a1 1 0 0 1-1 1h-8a1 1 0 0 1-1-1v-8a1 1 0 0 1 1-1h3v-3a1 1 0 0 1 1-1h8a1 1 0 0 1 1 1zm-6 5.5a.5.5 0 0 0-.5-.5h-5a.5.5 0 0 0-.5.5v5a.5.5 0 0 0 .5.5h5a.5.5 0 0 0 .5-.5zm4-4a.5.5 0 0 0-.5-.5h-5a.5.5 0 0 0-.5.5v1.5h3a1 1 0 0 1 1 1v3h1.5a.5.5 0 0 0 .5-.5z"></path></defs><g><g transform="translate(-427 -350)"><use fill="#232226" xlink:href="#1jfaa"></use></g></g></svg>
                                    </div>
                                    <div class="text">Копировать</div>
                                </button>
                                <button class="change" category_id="<?=$category->id;?>" brand_id="<?=$brand->id;?>" onclick="$('.add-brands .add-brands__title').text('Редактирование бренда');setElementBrandName(this);">
                                    <div class="icon">
                                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="14" height="14" viewBox="0 0 14 14"><defs><path id="q4iwa" d="M440.737 384.61l-2.04 2.045-.001.002a4624.42 4624.42 0 0 1-7.343 7.342H428a.98.98 0 0 1-.481-.129 1 1 0 0 1-.326-.285 1.024 1.024 0 0 1-.064-.104.983.983 0 0 1-.108-.28A1 1 0 0 1 427 393v-2.884l.005-.465c2.444-2.45 4.892-4.897 7.343-7.342.002-.002.006-.003.008-.006l2.04-2.033a.938.938 0 0 1 .694-.286c.255.004.514.107.715.308l2.91 2.91c.402.402.412 1.032.022 1.408zm-5.654-.148zm-6.083 5.94V392h1.605c1.981-2.025 3.96-4.05 5.938-6.078l-1.46-1.46c-2.03 1.978-4.058 3.959-6.083 5.94zm8.142-7.995l-.651.634 1.474 1.474.634-.65-1.457-1.458z"></path></defs><g><g transform="translate(-427 -380)"><use fill="#939499" xlink:href="#q4iwa"></use></g></g></svg>
                                    </div>
                                    <div class="text">Редактировать</div>
                                </button>
                                <button class="delete" category_id="<?=$category->id;?>" brand_id="<?=$brand->id;?>" onclick="deleteBrand(this);">
                                    <div class="icon">
                                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="13" height="15" viewBox="0 0 13 15"><defs><path id="j8sua" d="M430 415v6.5a.5.5 0 0 0 .5.5h6a.5.5 0 0 0 .5-.5V415h2v8a1 1 0 0 1-1 1h-9a1 1 0 0 1-1-1v-8zm1 0h2v6h-2zm3 0h2v6h-2zm-7-3h3v-2a1 1 0 0 1 1-1h5a1 1 0 0 1 1 1v2h3v2h-13zm8-1h-3v1h3z"></path></defs><g><g transform="translate(-427 -409)"><use fill="#939499" xlink:href="#j8sua"></use></g></g></svg>
                                    </div>
                                    <div class="text">Удалить</div>
                                </button>
                            </div>
                        </a>
                        <a href="/works?brands_id=<?=$brand->id;?>" class="brand"><?=$brand->name;?></a>
                        <span onclick="location.href = '/works?brands_id=<?=$brand->id;?>';"><?=count($brand->works);?></span>
                    </li>
                    <?endforeach;?>

                </ul>
                <a href="#" class="add-brand" category_id="<?=$category->id;?>" onclick="$('.add-brands .add-brands__title').text('Добавление бренда');addCategoryBrand(this);">
                    <div class="icon">
                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="13" height="13" viewBox="0 0 13 13"><defs><path id="y90sa" d="M428.5 501a1.5 1.5 0 0 1 1.5 1.5v3.5h3.5a1.5 1.5 0 0 1 0 3H430v3.5a1.5 1.5 0 1 1-3 0V509h-3.5a1.5 1.5 0 1 1 0-3h3.5v-3.5a1.5 1.5 0 0 1 1.5-1.5z"/></defs><g><g transform="translate(-422 -501)"><use fill="#6d67f9" xlink:href="#y90sa"/></g></g></svg>
                    </div>
                    <span>Добавить бренд</span>
                </a>
            </div>
        </div>




    </div>
    <?endforeach;?>


    <script type="text/javascript">

    </script>


		<!--</div>-->
