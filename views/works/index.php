<?php
/* @var $this yii\web\View */
?>

<?php
/* @var $this yii\web\View */
//\Yii::$app->cache->flush();
use app\models\Categories;
use app\models\Brands;
use app\models\Works;
use app\models\WorkTypes;
use app\models\WorkerTypes;
use app\models\WorkContents;
use app\models\ReportForms;
use app\models\Period;

?>

<div class="open-overlay"></div>
<div class="main-content__search-block">
    <div class="main-content__page-title">
        Регламентные работы
    </div>
    <div class="main-content__works-menu">
        <div class="main-content__works-menu_dropdown">
            <div class="main-content__works-menu_dropdown-left" data-scroll>
                <ul>
                    <? $categories = Categories::find()->orderBy('name')->all(); ?>
                    <? foreach($categories as $category): ?>
                        <li data-link="<?=$category->id;?>"><?=$category->name;?></li>
                    <? endforeach; ?>
                    <!--<li data-link="one">Вентиляторы радиальные</li>
                    <li data-link="two">Вентиляторы канальные</li>
                    <li data-link="">Вентиляторы крышные</li>
                    <li data-link="">Вентиляторы в форточку</li>
                    <li data-link="">Вентиляторы радиальные</li>
                    <li data-link="">Вентиляторы канальные</li>
                    <li data-link="">Вентиляторы крышные</li>
                    <li data-link="">Вентиляторы в форточку и очень длинное название категории</li>
                    <li data-link="">Вентиляторы радиальные</li>
                    <li data-link="">Вентиляторы канальные</li>
                    <li data-link="">Вентиляторы крышные</li>
                    <li data-link="">Вентиляторы в форточку и очень длинное название категории</li>
                    <li data-link="">Вентиляторы радиальные</li>
                    <li data-link="">Вентиляторы канальные</li>
                    -->
                </ul>
            </div>
            <div class="main-content__works-menu_dropdown-right" data-scroll>
                <?foreach($categories as $category):?>
                <ul data-menu="<?=$category->id;?>">
                    <? $brands = Brands::find()->where(array('category_id'=>$category->id))->orderBy('name')->all(); ?>
                    <? foreach($brands as $brand): ?>
                    <li brands_id="<?=$brand->id;?>"><a href="<?=Yii::$app->urlManager->createUrl('works')."?brands_id=".$brand->id;?>"><?=$brand->name;?></a></li>
                    <? endforeach; ?>
                    <!--
                    <li><a href="#">Вентиляторы канальные</a></li>
                    <li><a href="#">Вентиляторы крышные</a></li>
                    <li><a href="#">Вентиляторы в форточку</a></li>
                    <li><a href="#">Вентиляторы радиальные</a></li>
                    <li><a href="#">Вентиляторы радиальные</a></li>
                    <li><a href="#">Вентиляторы канальные</a></li>
                    <li><a href="#">Вентиляторы крышные</a></li>
                    <li><a href="#">Вентиляторы в форточку</a></li>
                    <li><a href="#">Вентиляторы радиальные</a></li>
                    -->
                </ul>
                <? endforeach; ?>
                <!--
                <ul data-menu="two">
                    <li><a href="#">Вентиляторы радиальные</a></li>
                    <li><a href="#">Вентиляторы канальные</a></li>
                    <li><a href="#">Вентиляторы крышные</a></li>
                    <li><a href="#">Вентиляторы в форточку</a></li>
                    <li><a href="#">Вентиляторы радиальные</a></li>
                    <li><a href="#">Вентиляторы радиальные</a></li>
                    <li><a href="#">Вентиляторы канальные</a></li>
                    <li><a href="#">Вентиляторы крышные</a></li>
                    <li><a href="#">Вентиляторы в форточку</a></li>
                    <li><a href="#">Вентиляторы радиальные</a></li>
                    <li><a href="#">Вентиляторы канальные</a></li>
                    <li><a href="#">Вентиляторы крышные</a></li>
                    <li><a href="#">Вентиляторы в форточку</a></li>
                    <li><a href="#">Вентиляторы радиальные</a></li>
                </ul>
                -->
            </div>
        </div>
        <div class="main-content__works-menu_selected">
            <div class="arrow-icon">
                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="8" height="7" viewBox="0 0 8 7"><defs><path id="sfhsa" d="M1862.442 52.967h7.103c.33 0 .576.342.383.68-.155.27-3.278 5.645-3.545 6.107a.44.44 0 0 1-.77 0c-.195-.332-3.334-5.728-3.552-6.121-.16-.288.017-.666.38-.666z"/></defs><g><g transform="translate(-1862 -53)"><use fill="#232226" xlink:href="#sfhsa"/></g></g></svg>
            </div>
            <div class="icon">
                <img src="img/menu-burger.png" alt="">
            </div>

            <?
                if(isset($categories[0])){
                    $brands = Brands::find()->where(array('category_id'=>$categories[0]->id))->orderBy('name')->all();
                    if(isset($brands[0])){
                        $default_category_name = $categories[0]->name;
                        $default_category_id = $categories[0]->id;

                        $default_brand_name = $brands[0]->name;
                        $default_brand_id = $brands[0]->id;
                    } else {
                        $default_category_name = '';
                        $default_category_id = 0;
                        $default_brand_name = '';
                        $default_brand_id = 0;
                    }
                } else {
                    $default_category_name = '';
                    $default_category_id = 0;
                    $default_brand_name = '';
                    $default_brand_id = 0;
                }
            ?>

            <div class="divide" category_id="<?=$default_category_id;?>"><?=$default_category_name;?></div>
            <span>›</span>
            <div class="brand" brand_id="<?=$default_brand_id;?>"><?=$default_brand_name;?></div>
        </div>
    </div>
</div>
<div class="main-content__filters">
    <div class="main-content__filters-specialist">
        <div class="main-content__filters-specialist_title">Специалисты</div>
        <div class="main-content__filters-specialist_buttons">

            <? $worker_types = WorkerTypes::find()->orderBy('priority')->all(); ?>

            <? foreach($worker_types as $worker_type): ?>


            <button class="active" data-id="<?=$worker_type->symbole_code;?>"><?=$worker_type->name;?></button>

            <? endforeach; ?>
            <!--
            <button class="active" data-id="autom">Автоматчики</button>
            <button class="active" data-id="tepl">Тепловики</button>
            <button class="active">Холодильщики</button>
            <button class="active">Инженеры</button>
            <button class="active">Менеджеры</button>
            -->
        </div>
        <a href="#" class="main-content__filters-reset">
            <div class="icon">
                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="16" height="14" viewBox="0 0 16 14"><defs><path id="47y4a" d="M1768 175.99v.02a.986.986 0 0 1-.986.987h-.822v-.012a.93.93 0 0 1-.267 0 6.997 6.997 0 0 1-5.916-6.914c0-1.514.485-2.912 1.302-4.057l-1.128-1.563a.91.91 0 0 1 .736-1.443l1.798-.002 2.374-.004a.91.91 0 0 1 .877 1.154l-.673 2.422-.489 1.756a.909.909 0 0 1-1.613.289l-.613-.85a4.944 4.944 0 0 0-.573 2.298 5.005 5.005 0 0 0 4.185 4.932h.822c.544 0 .986.442.986.987zm7.817-.441a.91.91 0 0 1-.736 1.442l-1.798.003-2.375.003a.91.91 0 0 1-.877-1.154l.674-2.422.488-1.755a.909.909 0 0 1 1.613-.29l.613.85c.36-.689.574-1.467.574-2.297a5.005 5.005 0 0 0-4.185-4.933h-.822a.986.986 0 0 1-.986-.987v-.02c0-.545.441-.987.986-.987h.822v.013a.931.931 0 0 1 .267-.001 6.997 6.997 0 0 1 5.915 6.915 6.954 6.954 0 0 1-1.302 4.056z"/></defs><g><g transform="translate(-1760 -163)"><use fill="#828699" xlink:href="#47y4a"/></g></g></svg>
            </div>
            <span>Сбросить</span>
        </a>
    </div>
    <div class="main-content__filters-priority">
        <div class="main-content__filters-priority_title">Приоритет работ</div>
        <div class="main-content__filters-priority_buttons">
            <? $work_types = WorkTypes::find()->orderBy('priority')->all(); ?>
            <? foreach($work_types as $work_type): ?>
                <button class="active" data-id="<?=$work_type->symbole_code;?>"><?=$work_type->name;?></button>
            <? endforeach; ?>
            <!--
            <button class="active" data-id="raschir">Расширенные</button>
            <button class="active" data-id="zhel">Желательное</button>
            -->
        </div>
    </div>
</div>
<div class="main-content__works">

    <? if(isset($_GET['brands_id']) && is_numeric(($_GET['brands_id']))): ?>

    <?$brands_id = (int)$_GET['brands_id'];?>

    <? $works_map = Works::getWorksMapByBrandId($brands_id); ?>


    <? foreach($works_map as $workers_type_id=>$workers_type_data): ?>

    <div class="main-content__works-item" data-linked="<?=WorkerTypes::findOne($workers_type_id)->symbole_code;?>">
        <div class="item-control">
            <div class="icon">
                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="13" height="8" viewBox="0 0 13 8"><defs><path id="ldxya" d="M334.59 239.531a1.5 1.5 0 0 1-2.121-2.121l4.961-4.962a1.495 1.495 0 0 1 1.07-.439c.387-.002.775.144 1.07.44l4.961 4.96a1.5 1.5 0 0 1-2.121 2.122l-3.91-3.91z"/></defs><g><g transform="translate(-332 -232)"><use fill="#232226" xlink:href="#ldxya"/></g></g></svg>
            </div>
            <div class="title"><?=WorkerTypes::findOne($workers_type_id)->name;?></div>
        </div>


        <? foreach($workers_type_data as $works_type_id=>$works_type_data): ?>
        <div class="item-content opened">
            <div class="wrap" data-linked="<?=WorkTypes::findOne($works_type_id)->symbole_code;?>">
                <a href="#" class="to-add-work">
                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="13" height="13" viewBox="0 0 13 13"><defs><path id="2ehra" d="M252.5 315a1.5 1.5 0 0 1 1.5 1.5v3.5h3.5a1.5 1.5 0 0 1 0 3H254v3.5a1.5 1.5 0 0 1-3 0V323h-3.5a1.5 1.5 0 0 1 0-3h3.5v-3.5a1.5 1.5 0 0 1 1.5-1.5z"/></defs><g><g transform="translate(-246 -315)"><use fill="#fff" xlink:href="#2ehra"/></g></g></svg>
                </a>
                <div class="table-control rotating">
                    <?=WorkTypes::findOne($works_type_id)->name;?>
                    <div class="icon">
                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="10" height="6" viewBox="0 0 10 6"><defs><path id="9luoa" d="M546.705 383.3a.99.99 0 0 0-1.4 0l-3.3 3.3-3.3-3.3a.99.99 0 0 0-1.4 1.4l3.994 3.994c.195.194.45.29.706.288a.986.986 0 0 0 .706-.288l3.994-3.994a.99.99 0 0 0 0-1.4z"/></defs><g><g transform="translate(-537 -383)"><use fill="#d4d6d9" xlink:href="#9luoa"/></g></g></svg>
                    </div>
                </div>
                <div class="table table-opened">
                    <div class="wrapper">
                        <table>
                            <thead>
                            <td class="name active">Наименование работы</td>

                            <? $work_periods = Period::find()->orderBy('priority')->all(); ?>

                            <? $word_numbers = array('one','two','three','four','five','six','seven','eight','nine','ten'); ?>

                            <? foreach($work_periods as $k=>$work_period): ?>

                            <td class="<?=$work_period->symbole_code;?>" data-filter="<?=$word_numbers[$k];?>"><?=$work_period->name;?></td>

                            <? endforeach; ?>
                            <!--
                            <td class="monthly" data-filter="two">Ежемесячно</td>
                            <td class="squarely" data-filter="three">Квартально</td>
                            <td class="halfyear" data-filter="four">Полугодично</td>
                            <td class="timeinyear" data-filter="five">Раз в год</td>
                            -->
                            </thead>

                            <? foreach($works_type_data as $works_data): ?>



                            <tr data-filter-one="true">
                                <td class="named">
                                    <div class="button">
                                        <div class="open-tooltip">
                                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="15" height="3" viewBox="0 0 15 3"><defs><path id="27h7a" d="M388.5 356a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3zm-6 0a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3zm-6 0a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3z"/></defs><g><g transform="translate(-375 -356)"><use fill="#d4d6d9" xlink:href="#27h7a"/></g></g></svg>

                                            <div class="tooltip">
                                                <button class="delete">
                                                    <div class="icon">
                                                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="13" height="15" viewBox="0 0 13 15"><defs><path id="j8sua" d="M430 415v6.5a.5.5 0 0 0 .5.5h6a.5.5 0 0 0 .5-.5V415h2v8a1 1 0 0 1-1 1h-9a1 1 0 0 1-1-1v-8zm1 0h2v6h-2zm3 0h2v6h-2zm-7-3h3v-2a1 1 0 0 1 1-1h5a1 1 0 0 1 1 1v2h3v2h-13zm8-1h-3v1h3z"/></defs><g><g transform="translate(-427 -409)"><use fill="#939499" xlink:href="#j8sua"/></g></g></svg>
                                                    </div>
                                                    <div class="text">Удалить</div>
                                                </button>
                                            </div>

                                        </div>
                                    </div>
                                    <span><?=$works_data->name;?></span>
                                </td>
                                <? $work_period = Period::findOne($works_data->period_id); ?>
                                <td class="checks"><?if($work_period->symbole_code == 'dayly'):?><img src="img/checks.png" alt=""><? endif; ?></td>
                                <td class="checks"><?if($work_period->symbole_code == 'monthly'):?><img src="img/checks.png" alt=""><? endif; ?></td>
                                <td class="checks"><?if($work_period->symbole_code == 'squarely'):?><img src="img/checks.png" alt=""><? endif; ?></td>
                                <td class="checks"><?if($work_period->symbole_code == 'halfyear'):?><img src="img/checks.png" alt=""><? endif; ?></td>
                                <td class="checks"><?if($work_period->symbole_code == 'timeinyear'):?><img src="img/checks.png" alt=""><? endif; ?></td>
                            </tr>

                            <? endforeach; ?>

                            <!--
                            <tr data-filter-four="true">
                                <td class="named">
                                    <div class="button">
                                        <div class="open-tooltip">
                                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="15" height="3" viewBox="0 0 15 3"><defs><path id="27h7a" d="M388.5 356a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3zm-6 0a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3zm-6 0a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3z"/></defs><g><g transform="translate(-375 -356)"><use fill="#d4d6d9" xlink:href="#27h7a"/></g></g></svg>

                                            <div class="tooltip">
                                                <button class="delete">
                                                    <div class="icon">
                                                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="13" height="15" viewBox="0 0 13 15"><defs><path id="j8sua" d="M430 415v6.5a.5.5 0 0 0 .5.5h6a.5.5 0 0 0 .5-.5V415h2v8a1 1 0 0 1-1 1h-9a1 1 0 0 1-1-1v-8zm1 0h2v6h-2zm3 0h2v6h-2zm-7-3h3v-2a1 1 0 0 1 1-1h5a1 1 0 0 1 1 1v2h3v2h-13zm8-1h-3v1h3z"/></defs><g><g transform="translate(-427 -409)"><use fill="#939499" xlink:href="#j8sua"/></g></g></svg>
                                                    </div>
                                                    <div class="text">Удалить</div>
                                                </button>
                                            </div>

                                        </div>
                                    </div>
                                    <span>Проверка электропитания по фазам (дисбаланс по напряжению, дисбаланс по току)</span>
                                </td>
                                <td class="checks"></td>
                                <td class="checks"></td>
                                <td class="checks"></td>
                                <td class="checks"><img src="img/checks.png" alt=""></td>
                                <td class="checks"></td>
                            </tr>
                            <tr data-filter-five="true">
                                <td class="named">
                                    <div class="button">
                                        <div class="open-tooltip">
                                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="15" height="3" viewBox="0 0 15 3"><defs><path id="27h7a" d="M388.5 356a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3zm-6 0a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3zm-6 0a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3z"/></defs><g><g transform="translate(-375 -356)"><use fill="#d4d6d9" xlink:href="#27h7a"/></g></g></svg>

                                            <div class="tooltip">
                                                <button class="delete">
                                                    <div class="icon">
                                                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="13" height="15" viewBox="0 0 13 15"><defs><path id="j8sua" d="M430 415v6.5a.5.5 0 0 0 .5.5h6a.5.5 0 0 0 .5-.5V415h2v8a1 1 0 0 1-1 1h-9a1 1 0 0 1-1-1v-8zm1 0h2v6h-2zm3 0h2v6h-2zm-7-3h3v-2a1 1 0 0 1 1-1h5a1 1 0 0 1 1 1v2h3v2h-13zm8-1h-3v1h3z"/></defs><g><g transform="translate(-427 -409)"><use fill="#939499" xlink:href="#j8sua"/></g></g></svg>
                                                    </div>
                                                    <div class="text">Удалить</div>
                                                </button>
                                            </div>

                                        </div>
                                    </div>
                                    <span>Чистка жалюзийных решеток</span>
                                </td>
                                <td class="checks"></td>
                                <td class="checks"></td>
                                <td class="checks"></td>
                                <td class="checks"></td>
                                <td class="checks"><img src="img/checks.png" alt=""></td>
                            </tr>
                            <tr data-filter-one="true">
                                <td class="named">
                                    <div class="button">
                                        <div class="open-tooltip">
                                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="15" height="3" viewBox="0 0 15 3"><defs><path id="27h7a" d="M388.5 356a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3zm-6 0a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3zm-6 0a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3z"/></defs><g><g transform="translate(-375 -356)"><use fill="#d4d6d9" xlink:href="#27h7a"/></g></g></svg>

                                            <div class="tooltip">
                                                <button class="delete">
                                                    <div class="icon">
                                                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="13" height="15" viewBox="0 0 13 15"><defs><path id="j8sua" d="M430 415v6.5a.5.5 0 0 0 .5.5h6a.5.5 0 0 0 .5-.5V415h2v8a1 1 0 0 1-1 1h-9a1 1 0 0 1-1-1v-8zm1 0h2v6h-2zm3 0h2v6h-2zm-7-3h3v-2a1 1 0 0 1 1-1h5a1 1 0 0 1 1 1v2h3v2h-13zm8-1h-3v1h3z"/></defs><g><g transform="translate(-427 -409)"><use fill="#939499" xlink:href="#j8sua"/></g></g></svg>
                                                    </div>
                                                    <div class="text">Удалить</div>
                                                </button>
                                            </div>

                                        </div>
                                    </div>
                                    <span>Проверка виброизолирующих опор</span>
                                </td>
                                <td class="checks"><img src="img/checks.png" alt=""></td>
                                <td class="checks"></td>
                                <td class="checks"></td>
                                <td class="checks"></td>
                                <td class="checks"></td>
                            </tr>
                            <tr data-filter-three="true">
                                <td class="named">
                                    <div class="button">
                                        <div class="open-tooltip">
                                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="15" height="3" viewBox="0 0 15 3"><defs><path id="27h7a" d="M388.5 356a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3zm-6 0a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3zm-6 0a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3z"/></defs><g><g transform="translate(-375 -356)"><use fill="#d4d6d9" xlink:href="#27h7a"/></g></g></svg>

                                            <div class="tooltip">
                                                <button class="delete">
                                                    <div class="icon">
                                                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="13" height="15" viewBox="0 0 13 15"><defs><path id="j8sua" d="M430 415v6.5a.5.5 0 0 0 .5.5h6a.5.5 0 0 0 .5-.5V415h2v8a1 1 0 0 1-1 1h-9a1 1 0 0 1-1-1v-8zm1 0h2v6h-2zm3 0h2v6h-2zm-7-3h3v-2a1 1 0 0 1 1-1h5a1 1 0 0 1 1 1v2h3v2h-13zm8-1h-3v1h3z"/></defs><g><g transform="translate(-427 -409)"><use fill="#939499" xlink:href="#j8sua"/></g></g></svg>
                                                    </div>
                                                    <div class="text">Удалить</div>
                                                </button>
                                            </div>

                                        </div>
                                    </div>
                                    <span>Проверка состояний силовых и управляющих цепей оборудования</span>
                                </td>
                                <td class="checks"></td>
                                <td class="checks"></td>
                                <td class="checks"><img src="img/checks.png" alt=""></td>
                                <td class="checks"></td>
                                <td class="checks"></td>
                            </tr>
                            <tr data-filter-two="true">
                                <td class="named">
                                    <div class="button">
                                        <div class="open-tooltip">
                                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="15" height="3" viewBox="0 0 15 3"><defs><path id="27h7a" d="M388.5 356a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3zm-6 0a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3zm-6 0a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3z"/></defs><g><g transform="translate(-375 -356)"><use fill="#d4d6d9" xlink:href="#27h7a"/></g></g></svg>

                                            <div class="tooltip">
                                                <button class="delete">
                                                    <div class="icon">
                                                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="13" height="15" viewBox="0 0 13 15"><defs><path id="j8sua" d="M430 415v6.5a.5.5 0 0 0 .5.5h6a.5.5 0 0 0 .5-.5V415h2v8a1 1 0 0 1-1 1h-9a1 1 0 0 1-1-1v-8zm1 0h2v6h-2zm3 0h2v6h-2zm-7-3h3v-2a1 1 0 0 1 1-1h5a1 1 0 0 1 1 1v2h3v2h-13zm8-1h-3v1h3z"/></defs><g><g transform="translate(-427 -409)"><use fill="#939499" xlink:href="#j8sua"/></g></g></svg>
                                                    </div>
                                                    <div class="text">Удалить</div>
                                                </button>
                                            </div>

                                        </div>
                                    </div>
                                    <span>Смазка подшипников вытяжной установки, замена при необходимости</span>
                                </td>
                                <td class="checks"></td>
                                <td class="checks"><img src="img/checks.png" alt=""></td>
                                <td class="checks"></td>
                                <td class="checks"></td>
                                <td class="checks"></td>
                            </tr>
                            <tr data-filter-two="true">
                                <td class="named">
                                    <div class="button">
                                        <div class="open-tooltip">
                                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="15" height="3" viewBox="0 0 15 3"><defs><path id="27h7a" d="M388.5 356a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3zm-6 0a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3zm-6 0a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3z"/></defs><g><g transform="translate(-375 -356)"><use fill="#d4d6d9" xlink:href="#27h7a"/></g></g></svg>

                                            <div class="tooltip">
                                                <button class="delete">
                                                    <div class="icon">
                                                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="13" height="15" viewBox="0 0 13 15"><defs><path id="j8sua" d="M430 415v6.5a.5.5 0 0 0 .5.5h6a.5.5 0 0 0 .5-.5V415h2v8a1 1 0 0 1-1 1h-9a1 1 0 0 1-1-1v-8zm1 0h2v6h-2zm3 0h2v6h-2zm-7-3h3v-2a1 1 0 0 1 1-1h5a1 1 0 0 1 1 1v2h3v2h-13zm8-1h-3v1h3z"/></defs><g><g transform="translate(-427 -409)"><use fill="#939499" xlink:href="#j8sua"/></g></g></svg>
                                                    </div>
                                                    <div class="text">Удалить</div>
                                                </button>
                                            </div>

                                        </div>
                                    </div>
                                    <span>Смазка подшипников вытяжной установки, замена при необходимости</span>
                                </td>
                                <td class="checks"></td>
                                <td class="checks"><img src="img/checks.png" alt=""></td>
                                <td class="checks"></td>
                                <td class="checks"></td>
                                <td class="checks"></td>
                            </tr>
                            <tr data-filter-four="true">
                                <td class="named">
                                    <div class="button">
                                        <div class="open-tooltip">
                                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="15" height="3" viewBox="0 0 15 3"><defs><path id="27h7a" d="M388.5 356a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3zm-6 0a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3zm-6 0a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3z"/></defs><g><g transform="translate(-375 -356)"><use fill="#d4d6d9" xlink:href="#27h7a"/></g></g></svg>

                                            <div class="tooltip">
                                                <button class="delete">
                                                    <div class="icon">
                                                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="13" height="15" viewBox="0 0 13 15"><defs><path id="j8sua" d="M430 415v6.5a.5.5 0 0 0 .5.5h6a.5.5 0 0 0 .5-.5V415h2v8a1 1 0 0 1-1 1h-9a1 1 0 0 1-1-1v-8zm1 0h2v6h-2zm3 0h2v6h-2zm-7-3h3v-2a1 1 0 0 1 1-1h5a1 1 0 0 1 1 1v2h3v2h-13zm8-1h-3v1h3z"/></defs><g><g transform="translate(-427 -409)"><use fill="#939499" xlink:href="#j8sua"/></g></g></svg>
                                                    </div>
                                                    <div class="text">Удалить</div>
                                                </button>
                                            </div>

                                        </div>
                                    </div>
                                    <span>Пмазка подшипников вытяжной установки, замена при необходимости</span>
                                </td>
                                <td class="checks"></td>
                                <td class="checks"></td>
                                <td class="checks"></td>
                                <td class="checks"><img src="img/checks.png" alt=""></td>
                                <td class="checks"></td>
                            </tr>
                            <tr data-filter-five="true">
                                <td class="named">
                                    <div class="button">
                                        <div class="open-tooltip">
                                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="15" height="3" viewBox="0 0 15 3"><defs><path id="27h7a" d="M388.5 356a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3zm-6 0a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3zm-6 0a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3z"/></defs><g><g transform="translate(-375 -356)"><use fill="#d4d6d9" xlink:href="#27h7a"/></g></g></svg>

                                            <div class="tooltip">
                                                <button class="delete">
                                                    <div class="icon">
                                                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="13" height="15" viewBox="0 0 13 15"><defs><path id="j8sua" d="M430 415v6.5a.5.5 0 0 0 .5.5h6a.5.5 0 0 0 .5-.5V415h2v8a1 1 0 0 1-1 1h-9a1 1 0 0 1-1-1v-8zm1 0h2v6h-2zm3 0h2v6h-2zm-7-3h3v-2a1 1 0 0 1 1-1h5a1 1 0 0 1 1 1v2h3v2h-13zm8-1h-3v1h3z"/></defs><g><g transform="translate(-427 -409)"><use fill="#939499" xlink:href="#j8sua"/></g></g></svg>
                                                    </div>
                                                    <div class="text">Удалить</div>
                                                </button>
                                            </div>

                                        </div>
                                    </div>
                                    <span>Ымазка подшипников вытяжной установки, замена при необходимости</span>
                                </td>
                                <td class="checks"></td>
                                <td class="checks"></td>
                                <td class="checks"></td>
                                <td class="checks"></td>
                                <td class="checks"><img src="img/checks.png" alt=""></td>
                            </tr>
                            <tr data-filter-one="true">
                                <td class="named">
                                    <div class="button">
                                        <div class="open-tooltip">
                                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="15" height="3" viewBox="0 0 15 3"><defs><path id="27h7a" d="M388.5 356a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3zm-6 0a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3zm-6 0a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3z"/></defs><g><g transform="translate(-375 -356)"><use fill="#d4d6d9" xlink:href="#27h7a"/></g></g></svg>

                                            <div class="tooltip">
                                                <button class="delete">
                                                    <div class="icon">
                                                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="13" height="15" viewBox="0 0 13 15"><defs><path id="j8sua" d="M430 415v6.5a.5.5 0 0 0 .5.5h6a.5.5 0 0 0 .5-.5V415h2v8a1 1 0 0 1-1 1h-9a1 1 0 0 1-1-1v-8zm1 0h2v6h-2zm3 0h2v6h-2zm-7-3h3v-2a1 1 0 0 1 1-1h5a1 1 0 0 1 1 1v2h3v2h-13zm8-1h-3v1h3z"/></defs><g><g transform="translate(-427 -409)"><use fill="#939499" xlink:href="#j8sua"/></g></g></svg>
                                                    </div>
                                                    <div class="text">Удалить</div>
                                                </button>
                                            </div>

                                        </div>
                                    </div>
                                    <span>Ямазка подшипников вытяжной установки, замена при необходимости</span>
                                </td>
                                <td class="checks"><img src="img/checks.png" alt=""></td>
                                <td class="checks"></td>
                                <td class="checks"></td>
                                <td class="checks"></td>
                                <td class="checks"></td>
                            </tr>
                            -->
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <? endforeach; ?>
    </div>
        <? endforeach; ?>


    <? //endforeach; ?>


    <? endif; ?>
<!--
    <div class="main-content__works-item" data-linked="mech">
        <div class="item-control">
            <div class="icon">
                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="13" height="8" viewBox="0 0 13 8"><defs><path id="ldxya" d="M334.59 239.531a1.5 1.5 0 0 1-2.121-2.121l4.961-4.962a1.495 1.495 0 0 1 1.07-.439c.387-.002.775.144 1.07.44l4.961 4.96a1.5 1.5 0 0 1-2.121 2.122l-3.91-3.91z"/></defs><g><g transform="translate(-332 -232)"><use fill="#232226" xlink:href="#ldxya"/></g></g></svg>
            </div>
            <div class="title">Механики</div>
        </div>
        <div class="item-content opened">
            <div class="wrap" data-linked="passport">
                <a href="#" class="to-add-work">
                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="13" height="13" viewBox="0 0 13 13"><defs><path id="2ehra" d="M252.5 315a1.5 1.5 0 0 1 1.5 1.5v3.5h3.5a1.5 1.5 0 0 1 0 3H254v3.5a1.5 1.5 0 0 1-3 0V323h-3.5a1.5 1.5 0 0 1 0-3h3.5v-3.5a1.5 1.5 0 0 1 1.5-1.5z"/></defs><g><g transform="translate(-246 -315)"><use fill="#fff" xlink:href="#2ehra"/></g></g></svg>
                </a>
                <div class="table-control rotating">
                    По паспорту
                    <div class="icon">
                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="10" height="6" viewBox="0 0 10 6"><defs><path id="9luoa" d="M546.705 383.3a.99.99 0 0 0-1.4 0l-3.3 3.3-3.3-3.3a.99.99 0 0 0-1.4 1.4l3.994 3.994c.195.194.45.29.706.288a.986.986 0 0 0 .706-.288l3.994-3.994a.99.99 0 0 0 0-1.4z"/></defs><g><g transform="translate(-537 -383)"><use fill="#d4d6d9" xlink:href="#9luoa"/></g></g></svg>
                    </div>
                </div>
                <div class="table table-opened">
                    <div class="wrapper">
                        <table>
                            <thead>
                            <td class="name active">Наименование работы</td>
                            <td class="week" data-filter="one">Еженедельно</td>
                            <td class="month" data-filter="two">Ежемесячно</td>
                            <td class="kvar" data-filter="three">Квартально</td>
                            <td class="polu" data-filter="four">Полугодично</td>
                            <td class="year" data-filter="five">Раз в год</td>
                            </thead>
                            <tr data-filter-one="true">
                                <td class="named">
                                    <div class="button">
                                        <div class="open-tooltip">
                                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="15" height="3" viewBox="0 0 15 3"><defs><path id="27h7a" d="M388.5 356a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3zm-6 0a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3zm-6 0a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3z"/></defs><g><g transform="translate(-375 -356)"><use fill="#d4d6d9" xlink:href="#27h7a"/></g></g></svg>

                                            <div class="tooltip">
                                                <button class="delete">
                                                    <div class="icon">
                                                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="13" height="15" viewBox="0 0 13 15"><defs><path id="j8sua" d="M430 415v6.5a.5.5 0 0 0 .5.5h6a.5.5 0 0 0 .5-.5V415h2v8a1 1 0 0 1-1 1h-9a1 1 0 0 1-1-1v-8zm1 0h2v6h-2zm3 0h2v6h-2zm-7-3h3v-2a1 1 0 0 1 1-1h5a1 1 0 0 1 1 1v2h3v2h-13zm8-1h-3v1h3z"/></defs><g><g transform="translate(-427 -409)"><use fill="#939499" xlink:href="#j8sua"/></g></g></svg>
                                                    </div>
                                                    <div class="text">Удалить</div>
                                                </button>
                                            </div>

                                        </div>
                                    </div>
                                    <span>Внешний осмотр оборудования, проверка креплений и конструкций вытяжной установки, диагностика внешний осмотр оборудования, проверка креплений и конструкций вытяжной установки, диагностика…</span>
                                </td>
                                <td class="checks"><img src="img/checks.png" alt=""></td>
                                <td class="checks"></td>
                                <td class="checks"></td>
                                <td class="checks"></td>
                                <td class="checks"></td>
                            </tr>
                            <tr data-filter-four="true">
                                <td class="named">
                                    <div class="button">
                                        <div class="open-tooltip">
                                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="15" height="3" viewBox="0 0 15 3"><defs><path id="27h7a" d="M388.5 356a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3zm-6 0a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3zm-6 0a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3z"/></defs><g><g transform="translate(-375 -356)"><use fill="#d4d6d9" xlink:href="#27h7a"/></g></g></svg>

                                            <div class="tooltip">
                                                <button class="delete">
                                                    <div class="icon">
                                                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="13" height="15" viewBox="0 0 13 15"><defs><path id="j8sua" d="M430 415v6.5a.5.5 0 0 0 .5.5h6a.5.5 0 0 0 .5-.5V415h2v8a1 1 0 0 1-1 1h-9a1 1 0 0 1-1-1v-8zm1 0h2v6h-2zm3 0h2v6h-2zm-7-3h3v-2a1 1 0 0 1 1-1h5a1 1 0 0 1 1 1v2h3v2h-13zm8-1h-3v1h3z"/></defs><g><g transform="translate(-427 -409)"><use fill="#939499" xlink:href="#j8sua"/></g></g></svg>
                                                    </div>
                                                    <div class="text">Удалить</div>
                                                </button>
                                            </div>

                                        </div>
                                    </div>
                                    <span>Проверка электропитания по фазам (дисбаланс по напряжению, дисбаланс по току)</span>
                                </td>
                                <td class="checks"></td>
                                <td class="checks"></td>
                                <td class="checks"></td>
                                <td class="checks"><img src="img/checks.png" alt=""></td>
                                <td class="checks"></td>
                            </tr>
                            <tr data-filter-five="true">
                                <td class="named">
                                    <div class="button">
                                        <div class="open-tooltip">
                                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="15" height="3" viewBox="0 0 15 3"><defs><path id="27h7a" d="M388.5 356a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3zm-6 0a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3zm-6 0a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3z"/></defs><g><g transform="translate(-375 -356)"><use fill="#d4d6d9" xlink:href="#27h7a"/></g></g></svg>

                                            <div class="tooltip">
                                                <button class="delete">
                                                    <div class="icon">
                                                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="13" height="15" viewBox="0 0 13 15"><defs><path id="j8sua" d="M430 415v6.5a.5.5 0 0 0 .5.5h6a.5.5 0 0 0 .5-.5V415h2v8a1 1 0 0 1-1 1h-9a1 1 0 0 1-1-1v-8zm1 0h2v6h-2zm3 0h2v6h-2zm-7-3h3v-2a1 1 0 0 1 1-1h5a1 1 0 0 1 1 1v2h3v2h-13zm8-1h-3v1h3z"/></defs><g><g transform="translate(-427 -409)"><use fill="#939499" xlink:href="#j8sua"/></g></g></svg>
                                                    </div>
                                                    <div class="text">Удалить</div>
                                                </button>
                                            </div>

                                        </div>
                                    </div>
                                    <span>Чистка жалюзийных решеток</span>
                                </td>
                                <td class="checks"></td>
                                <td class="checks"></td>
                                <td class="checks"></td>
                                <td class="checks"></td>
                                <td class="checks"><img src="img/checks.png" alt=""></td>
                            </tr>
                            <tr data-filter-one="true">
                                <td class="named">
                                    <div class="button">
                                        <div class="open-tooltip">
                                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="15" height="3" viewBox="0 0 15 3"><defs><path id="27h7a" d="M388.5 356a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3zm-6 0a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3zm-6 0a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3z"/></defs><g><g transform="translate(-375 -356)"><use fill="#d4d6d9" xlink:href="#27h7a"/></g></g></svg>

                                            <div class="tooltip">
                                                <button class="delete">
                                                    <div class="icon">
                                                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="13" height="15" viewBox="0 0 13 15"><defs><path id="j8sua" d="M430 415v6.5a.5.5 0 0 0 .5.5h6a.5.5 0 0 0 .5-.5V415h2v8a1 1 0 0 1-1 1h-9a1 1 0 0 1-1-1v-8zm1 0h2v6h-2zm3 0h2v6h-2zm-7-3h3v-2a1 1 0 0 1 1-1h5a1 1 0 0 1 1 1v2h3v2h-13zm8-1h-3v1h3z"/></defs><g><g transform="translate(-427 -409)"><use fill="#939499" xlink:href="#j8sua"/></g></g></svg>
                                                    </div>
                                                    <div class="text">Удалить</div>
                                                </button>
                                            </div>

                                        </div>
                                    </div>
                                    <span>Проверка виброизолирующих опор</span>
                                </td>
                                <td class="checks"><img src="img/checks.png" alt=""></td>
                                <td class="checks"></td>
                                <td class="checks"></td>
                                <td class="checks"></td>
                                <td class="checks"></td>
                            </tr>
                            <tr data-filter-three="true">
                                <td class="named">
                                    <div class="button">
                                        <div class="open-tooltip">
                                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="15" height="3" viewBox="0 0 15 3"><defs><path id="27h7a" d="M388.5 356a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3zm-6 0a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3zm-6 0a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3z"/></defs><g><g transform="translate(-375 -356)"><use fill="#d4d6d9" xlink:href="#27h7a"/></g></g></svg>

                                            <div class="tooltip">
                                                <button class="delete">
                                                    <div class="icon">
                                                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="13" height="15" viewBox="0 0 13 15"><defs><path id="j8sua" d="M430 415v6.5a.5.5 0 0 0 .5.5h6a.5.5 0 0 0 .5-.5V415h2v8a1 1 0 0 1-1 1h-9a1 1 0 0 1-1-1v-8zm1 0h2v6h-2zm3 0h2v6h-2zm-7-3h3v-2a1 1 0 0 1 1-1h5a1 1 0 0 1 1 1v2h3v2h-13zm8-1h-3v1h3z"/></defs><g><g transform="translate(-427 -409)"><use fill="#939499" xlink:href="#j8sua"/></g></g></svg>
                                                    </div>
                                                    <div class="text">Удалить</div>
                                                </button>
                                            </div>

                                        </div>
                                    </div>
                                    <span>Проверка состояний силовых и управляющих цепей оборудования</span>
                                </td>
                                <td class="checks"></td>
                                <td class="checks"></td>
                                <td class="checks"><img src="img/checks.png" alt=""></td>
                                <td class="checks"></td>
                                <td class="checks"></td>
                            </tr>
                            <tr data-filter-two="true">
                                <td class="named">
                                    <div class="button">
                                        <div class="open-tooltip">
                                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="15" height="3" viewBox="0 0 15 3"><defs><path id="27h7a" d="M388.5 356a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3zm-6 0a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3zm-6 0a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3z"/></defs><g><g transform="translate(-375 -356)"><use fill="#d4d6d9" xlink:href="#27h7a"/></g></g></svg>

                                            <div class="tooltip">
                                                <button class="delete">
                                                    <div class="icon">
                                                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="13" height="15" viewBox="0 0 13 15"><defs><path id="j8sua" d="M430 415v6.5a.5.5 0 0 0 .5.5h6a.5.5 0 0 0 .5-.5V415h2v8a1 1 0 0 1-1 1h-9a1 1 0 0 1-1-1v-8zm1 0h2v6h-2zm3 0h2v6h-2zm-7-3h3v-2a1 1 0 0 1 1-1h5a1 1 0 0 1 1 1v2h3v2h-13zm8-1h-3v1h3z"/></defs><g><g transform="translate(-427 -409)"><use fill="#939499" xlink:href="#j8sua"/></g></g></svg>
                                                    </div>
                                                    <div class="text">Удалить</div>
                                                </button>
                                            </div>

                                        </div>
                                    </div>
                                    <span>Смазка подшипников вытяжной установки, замена при необходимости</span>
                                </td>
                                <td class="checks"></td>
                                <td class="checks"><img src="img/checks.png" alt=""></td>
                                <td class="checks"></td>
                                <td class="checks"></td>
                                <td class="checks"></td>
                            </tr>
                            <tr data-filter-two="true">
                                <td class="named">
                                    <div class="button">
                                        <div class="open-tooltip">
                                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="15" height="3" viewBox="0 0 15 3"><defs><path id="27h7a" d="M388.5 356a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3zm-6 0a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3zm-6 0a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3z"/></defs><g><g transform="translate(-375 -356)"><use fill="#d4d6d9" xlink:href="#27h7a"/></g></g></svg>

                                            <div class="tooltip">
                                                <button class="delete">
                                                    <div class="icon">
                                                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="13" height="15" viewBox="0 0 13 15"><defs><path id="j8sua" d="M430 415v6.5a.5.5 0 0 0 .5.5h6a.5.5 0 0 0 .5-.5V415h2v8a1 1 0 0 1-1 1h-9a1 1 0 0 1-1-1v-8zm1 0h2v6h-2zm3 0h2v6h-2zm-7-3h3v-2a1 1 0 0 1 1-1h5a1 1 0 0 1 1 1v2h3v2h-13zm8-1h-3v1h3z"/></defs><g><g transform="translate(-427 -409)"><use fill="#939499" xlink:href="#j8sua"/></g></g></svg>
                                                    </div>
                                                    <div class="text">Удалить</div>
                                                </button>
                                            </div>

                                        </div>
                                    </div>
                                    <span>Смазка подшипников вытяжной установки, замена при необходимости</span>
                                </td>
                                <td class="checks"></td>
                                <td class="checks"><img src="img/checks.png" alt=""></td>
                                <td class="checks"></td>
                                <td class="checks"></td>
                                <td class="checks"></td>
                            </tr>
                            <tr data-filter-four="true">
                                <td class="named">
                                    <div class="button">
                                        <div class="open-tooltip">
                                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="15" height="3" viewBox="0 0 15 3"><defs><path id="27h7a" d="M388.5 356a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3zm-6 0a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3zm-6 0a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3z"/></defs><g><g transform="translate(-375 -356)"><use fill="#d4d6d9" xlink:href="#27h7a"/></g></g></svg>

                                            <div class="tooltip">
                                                <button class="delete">
                                                    <div class="icon">
                                                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="13" height="15" viewBox="0 0 13 15"><defs><path id="j8sua" d="M430 415v6.5a.5.5 0 0 0 .5.5h6a.5.5 0 0 0 .5-.5V415h2v8a1 1 0 0 1-1 1h-9a1 1 0 0 1-1-1v-8zm1 0h2v6h-2zm3 0h2v6h-2zm-7-3h3v-2a1 1 0 0 1 1-1h5a1 1 0 0 1 1 1v2h3v2h-13zm8-1h-3v1h3z"/></defs><g><g transform="translate(-427 -409)"><use fill="#939499" xlink:href="#j8sua"/></g></g></svg>
                                                    </div>
                                                    <div class="text">Удалить</div>
                                                </button>
                                            </div>

                                        </div>
                                    </div>
                                    <span>Пмазка подшипников вытяжной установки, замена при необходимости</span>
                                </td>
                                <td class="checks"></td>
                                <td class="checks"></td>
                                <td class="checks"></td>
                                <td class="checks"><img src="img/checks.png" alt=""></td>
                                <td class="checks"></td>
                            </tr>
                            <tr data-filter-five="true">
                                <td class="named">
                                    <div class="button">
                                        <div class="open-tooltip">
                                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="15" height="3" viewBox="0 0 15 3"><defs><path id="27h7a" d="M388.5 356a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3zm-6 0a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3zm-6 0a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3z"/></defs><g><g transform="translate(-375 -356)"><use fill="#d4d6d9" xlink:href="#27h7a"/></g></g></svg>

                                            <div class="tooltip">
                                                <button class="delete">
                                                    <div class="icon">
                                                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="13" height="15" viewBox="0 0 13 15"><defs><path id="j8sua" d="M430 415v6.5a.5.5 0 0 0 .5.5h6a.5.5 0 0 0 .5-.5V415h2v8a1 1 0 0 1-1 1h-9a1 1 0 0 1-1-1v-8zm1 0h2v6h-2zm3 0h2v6h-2zm-7-3h3v-2a1 1 0 0 1 1-1h5a1 1 0 0 1 1 1v2h3v2h-13zm8-1h-3v1h3z"/></defs><g><g transform="translate(-427 -409)"><use fill="#939499" xlink:href="#j8sua"/></g></g></svg>
                                                    </div>
                                                    <div class="text">Удалить</div>
                                                </button>
                                            </div>

                                        </div>
                                    </div>
                                    <span>Ымазка подшипников вытяжной установки, замена при необходимости</span>
                                </td>
                                <td class="checks"></td>
                                <td class="checks"></td>
                                <td class="checks"></td>
                                <td class="checks"></td>
                                <td class="checks"><img src="img/checks.png" alt=""></td>
                            </tr>
                            <tr data-filter-one="true">
                                <td class="named">
                                    <div class="button">
                                        <div class="open-tooltip">
                                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="15" height="3" viewBox="0 0 15 3"><defs><path id="27h7a" d="M388.5 356a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3zm-6 0a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3zm-6 0a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3z"/></defs><g><g transform="translate(-375 -356)"><use fill="#d4d6d9" xlink:href="#27h7a"/></g></g></svg>

                                            <div class="tooltip">
                                                <button class="delete">
                                                    <div class="icon">
                                                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="13" height="15" viewBox="0 0 13 15"><defs><path id="j8sua" d="M430 415v6.5a.5.5 0 0 0 .5.5h6a.5.5 0 0 0 .5-.5V415h2v8a1 1 0 0 1-1 1h-9a1 1 0 0 1-1-1v-8zm1 0h2v6h-2zm3 0h2v6h-2zm-7-3h3v-2a1 1 0 0 1 1-1h5a1 1 0 0 1 1 1v2h3v2h-13zm8-1h-3v1h3z"/></defs><g><g transform="translate(-427 -409)"><use fill="#939499" xlink:href="#j8sua"/></g></g></svg>
                                                    </div>
                                                    <div class="text">Удалить</div>
                                                </button>
                                            </div>

                                        </div>
                                    </div>
                                    <span>Ямазка подшипников вытяжной установки, замена при необходимости</span>
                                </td>
                                <td class="checks"><img src="img/checks.png" alt=""></td>
                                <td class="checks"></td>
                                <td class="checks"></td>
                                <td class="checks"></td>
                                <td class="checks"></td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
            <div class="wrap" data-linked="raschir">
                <a href="#" class="to-add-work">
                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="13" height="13" viewBox="0 0 13 13"><defs><path id="2ehra" d="M252.5 315a1.5 1.5 0 0 1 1.5 1.5v3.5h3.5a1.5 1.5 0 0 1 0 3H254v3.5a1.5 1.5 0 0 1-3 0V323h-3.5a1.5 1.5 0 0 1 0-3h3.5v-3.5a1.5 1.5 0 0 1 1.5-1.5z"/></defs><g><g transform="translate(-246 -315)"><use fill="#fff" xlink:href="#2ehra"/></g></g></svg>
                </a>
                <div class="table-control rotating">
                    Расширенные
                    <div class="icon">
                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="10" height="6" viewBox="0 0 10 6"><defs><path id="9luoa" d="M546.705 383.3a.99.99 0 0 0-1.4 0l-3.3 3.3-3.3-3.3a.99.99 0 0 0-1.4 1.4l3.994 3.994c.195.194.45.29.706.288a.986.986 0 0 0 .706-.288l3.994-3.994a.99.99 0 0 0 0-1.4z"/></defs><g><g transform="translate(-537 -383)"><use fill="#d4d6d9" xlink:href="#9luoa"/></g></g></svg>
                    </div>
                </div>
                <div class="table table-opened">
                    <div class="wrapper">
                        <table>
                            <thead>
                            <td class="name active">Наименование работы</td>
                            <td class="week" data-filter="one">Еженедельно</td>
                            <td class="month" data-filter="two">Ежемесячно</td>
                            <td class="kvar" data-filter="three">Квартально</td>
                            <td class="polu" data-filter="four">Полугодично</td>
                            <td class="year" data-filter="five">Раз в год</td>
                            </thead>
                            <tr data-filter-one="true">
                                <td class="named">
                                    <div class="button">
                                        <div class="open-tooltip">
                                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="15" height="3" viewBox="0 0 15 3"><defs><path id="27h7a" d="M388.5 356a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3zm-6 0a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3zm-6 0a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3z"/></defs><g><g transform="translate(-375 -356)"><use fill="#d4d6d9" xlink:href="#27h7a"/></g></g></svg>

                                            <div class="tooltip">
                                                <button class="delete">
                                                    <div class="icon">
                                                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="13" height="15" viewBox="0 0 13 15"><defs><path id="j8sua" d="M430 415v6.5a.5.5 0 0 0 .5.5h6a.5.5 0 0 0 .5-.5V415h2v8a1 1 0 0 1-1 1h-9a1 1 0 0 1-1-1v-8zm1 0h2v6h-2zm3 0h2v6h-2zm-7-3h3v-2a1 1 0 0 1 1-1h5a1 1 0 0 1 1 1v2h3v2h-13zm8-1h-3v1h3z"/></defs><g><g transform="translate(-427 -409)"><use fill="#939499" xlink:href="#j8sua"/></g></g></svg>
                                                    </div>
                                                    <div class="text">Удалить</div>
                                                </button>
                                            </div>

                                        </div>
                                    </div>
                                    <span>Внешний осмотр оборудования, проверка креплений и конструкций вытяжной установки, диагностика внешний осмотр оборудования, проверка креплений и конструкций вытяжной установки, диагностика…</span>
                                </td>
                                <td class="checks"><img src="img/checks.png" alt=""></td>
                                <td class="checks"></td>
                                <td class="checks"></td>
                                <td class="checks"></td>
                                <td class="checks"></td>
                            </tr>
                            <tr data-filter-four="true">
                                <td class="named">
                                    <div class="button">
                                        <div class="open-tooltip">
                                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="15" height="3" viewBox="0 0 15 3"><defs><path id="27h7a" d="M388.5 356a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3zm-6 0a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3zm-6 0a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3z"/></defs><g><g transform="translate(-375 -356)"><use fill="#d4d6d9" xlink:href="#27h7a"/></g></g></svg>

                                            <div class="tooltip">
                                                <button class="delete">
                                                    <div class="icon">
                                                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="13" height="15" viewBox="0 0 13 15"><defs><path id="j8sua" d="M430 415v6.5a.5.5 0 0 0 .5.5h6a.5.5 0 0 0 .5-.5V415h2v8a1 1 0 0 1-1 1h-9a1 1 0 0 1-1-1v-8zm1 0h2v6h-2zm3 0h2v6h-2zm-7-3h3v-2a1 1 0 0 1 1-1h5a1 1 0 0 1 1 1v2h3v2h-13zm8-1h-3v1h3z"/></defs><g><g transform="translate(-427 -409)"><use fill="#939499" xlink:href="#j8sua"/></g></g></svg>
                                                    </div>
                                                    <div class="text">Удалить</div>
                                                </button>
                                            </div>

                                        </div>
                                    </div>
                                    <span>Проверка электропитания по фазам (дисбаланс по напряжению, дисбаланс по току)</span>
                                </td>
                                <td class="checks"></td>
                                <td class="checks"></td>
                                <td class="checks"></td>
                                <td class="checks"><img src="img/checks.png" alt=""></td>
                                <td class="checks"></td>
                            </tr>
                            <tr data-filter-five="true">
                                <td class="named">
                                    <div class="button">
                                        <div class="open-tooltip">
                                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="15" height="3" viewBox="0 0 15 3"><defs><path id="27h7a" d="M388.5 356a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3zm-6 0a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3zm-6 0a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3z"/></defs><g><g transform="translate(-375 -356)"><use fill="#d4d6d9" xlink:href="#27h7a"/></g></g></svg>

                                            <div class="tooltip">
                                                <button class="delete">
                                                    <div class="icon">
                                                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="13" height="15" viewBox="0 0 13 15"><defs><path id="j8sua" d="M430 415v6.5a.5.5 0 0 0 .5.5h6a.5.5 0 0 0 .5-.5V415h2v8a1 1 0 0 1-1 1h-9a1 1 0 0 1-1-1v-8zm1 0h2v6h-2zm3 0h2v6h-2zm-7-3h3v-2a1 1 0 0 1 1-1h5a1 1 0 0 1 1 1v2h3v2h-13zm8-1h-3v1h3z"/></defs><g><g transform="translate(-427 -409)"><use fill="#939499" xlink:href="#j8sua"/></g></g></svg>
                                                    </div>
                                                    <div class="text">Удалить</div>
                                                </button>
                                            </div>

                                        </div>
                                    </div>
                                    <span>Чистка жалюзийных решеток</span>
                                </td>
                                <td class="checks"></td>
                                <td class="checks"></td>
                                <td class="checks"></td>
                                <td class="checks"></td>
                                <td class="checks"><img src="img/checks.png" alt=""></td>
                            </tr>
                            <tr data-filter-one="true">
                                <td class="named">
                                    <div class="button">
                                        <div class="open-tooltip">
                                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="15" height="3" viewBox="0 0 15 3"><defs><path id="27h7a" d="M388.5 356a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3zm-6 0a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3zm-6 0a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3z"/></defs><g><g transform="translate(-375 -356)"><use fill="#d4d6d9" xlink:href="#27h7a"/></g></g></svg>

                                            <div class="tooltip">
                                                <button class="delete">
                                                    <div class="icon">
                                                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="13" height="15" viewBox="0 0 13 15"><defs><path id="j8sua" d="M430 415v6.5a.5.5 0 0 0 .5.5h6a.5.5 0 0 0 .5-.5V415h2v8a1 1 0 0 1-1 1h-9a1 1 0 0 1-1-1v-8zm1 0h2v6h-2zm3 0h2v6h-2zm-7-3h3v-2a1 1 0 0 1 1-1h5a1 1 0 0 1 1 1v2h3v2h-13zm8-1h-3v1h3z"/></defs><g><g transform="translate(-427 -409)"><use fill="#939499" xlink:href="#j8sua"/></g></g></svg>
                                                    </div>
                                                    <div class="text">Удалить</div>
                                                </button>
                                            </div>

                                        </div>
                                    </div>
                                    <span>Проверка виброизолирующих опор</span>
                                </td>
                                <td class="checks"><img src="img/checks.png" alt=""></td>
                                <td class="checks"></td>
                                <td class="checks"></td>
                                <td class="checks"></td>
                                <td class="checks"></td>
                            </tr>
                            <tr data-filter-three="true">
                                <td class="named">
                                    <div class="button">
                                        <div class="open-tooltip">
                                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="15" height="3" viewBox="0 0 15 3"><defs><path id="27h7a" d="M388.5 356a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3zm-6 0a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3zm-6 0a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3z"/></defs><g><g transform="translate(-375 -356)"><use fill="#d4d6d9" xlink:href="#27h7a"/></g></g></svg>

                                            <div class="tooltip">
                                                <button class="delete">
                                                    <div class="icon">
                                                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="13" height="15" viewBox="0 0 13 15"><defs><path id="j8sua" d="M430 415v6.5a.5.5 0 0 0 .5.5h6a.5.5 0 0 0 .5-.5V415h2v8a1 1 0 0 1-1 1h-9a1 1 0 0 1-1-1v-8zm1 0h2v6h-2zm3 0h2v6h-2zm-7-3h3v-2a1 1 0 0 1 1-1h5a1 1 0 0 1 1 1v2h3v2h-13zm8-1h-3v1h3z"/></defs><g><g transform="translate(-427 -409)"><use fill="#939499" xlink:href="#j8sua"/></g></g></svg>
                                                    </div>
                                                    <div class="text">Удалить</div>
                                                </button>
                                            </div>

                                        </div>
                                    </div>
                                    <span>Проверка состояний силовых и управляющих цепей оборудования</span>
                                </td>
                                <td class="checks"></td>
                                <td class="checks"></td>
                                <td class="checks"><img src="img/checks.png" alt=""></td>
                                <td class="checks"></td>
                                <td class="checks"></td>
                            </tr>
                            <tr data-filter-two="true">
                                <td class="named">
                                    <div class="button">
                                        <div class="open-tooltip">
                                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="15" height="3" viewBox="0 0 15 3"><defs><path id="27h7a" d="M388.5 356a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3zm-6 0a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3zm-6 0a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3z"/></defs><g><g transform="translate(-375 -356)"><use fill="#d4d6d9" xlink:href="#27h7a"/></g></g></svg>

                                            <div class="tooltip">
                                                <button class="delete">
                                                    <div class="icon">
                                                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="13" height="15" viewBox="0 0 13 15"><defs><path id="j8sua" d="M430 415v6.5a.5.5 0 0 0 .5.5h6a.5.5 0 0 0 .5-.5V415h2v8a1 1 0 0 1-1 1h-9a1 1 0 0 1-1-1v-8zm1 0h2v6h-2zm3 0h2v6h-2zm-7-3h3v-2a1 1 0 0 1 1-1h5a1 1 0 0 1 1 1v2h3v2h-13zm8-1h-3v1h3z"/></defs><g><g transform="translate(-427 -409)"><use fill="#939499" xlink:href="#j8sua"/></g></g></svg>
                                                    </div>
                                                    <div class="text">Удалить</div>
                                                </button>
                                            </div>

                                        </div>
                                    </div>
                                    <span>Смазка подшипников вытяжной установки, замена при необходимости</span>
                                </td>
                                <td class="checks"></td>
                                <td class="checks"><img src="img/checks.png" alt=""></td>
                                <td class="checks"></td>
                                <td class="checks"></td>
                                <td class="checks"></td>
                            </tr>
                            <tr data-filter-two="true">
                                <td class="named">
                                    <div class="button">
                                        <div class="open-tooltip">
                                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="15" height="3" viewBox="0 0 15 3"><defs><path id="27h7a" d="M388.5 356a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3zm-6 0a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3zm-6 0a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3z"/></defs><g><g transform="translate(-375 -356)"><use fill="#d4d6d9" xlink:href="#27h7a"/></g></g></svg>

                                            <div class="tooltip">
                                                <button class="delete">
                                                    <div class="icon">
                                                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="13" height="15" viewBox="0 0 13 15"><defs><path id="j8sua" d="M430 415v6.5a.5.5 0 0 0 .5.5h6a.5.5 0 0 0 .5-.5V415h2v8a1 1 0 0 1-1 1h-9a1 1 0 0 1-1-1v-8zm1 0h2v6h-2zm3 0h2v6h-2zm-7-3h3v-2a1 1 0 0 1 1-1h5a1 1 0 0 1 1 1v2h3v2h-13zm8-1h-3v1h3z"/></defs><g><g transform="translate(-427 -409)"><use fill="#939499" xlink:href="#j8sua"/></g></g></svg>
                                                    </div>
                                                    <div class="text">Удалить</div>
                                                </button>
                                            </div>

                                        </div>
                                    </div>
                                    <span>Смазка подшипников вытяжной установки, замена при необходимости</span>
                                </td>
                                <td class="checks"></td>
                                <td class="checks"><img src="img/checks.png" alt=""></td>
                                <td class="checks"></td>
                                <td class="checks"></td>
                                <td class="checks"></td>
                            </tr>
                            <tr data-filter-four="true">
                                <td class="named">
                                    <div class="button">
                                        <div class="open-tooltip">
                                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="15" height="3" viewBox="0 0 15 3"><defs><path id="27h7a" d="M388.5 356a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3zm-6 0a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3zm-6 0a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3z"/></defs><g><g transform="translate(-375 -356)"><use fill="#d4d6d9" xlink:href="#27h7a"/></g></g></svg>

                                            <div class="tooltip">
                                                <button class="delete">
                                                    <div class="icon">
                                                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="13" height="15" viewBox="0 0 13 15"><defs><path id="j8sua" d="M430 415v6.5a.5.5 0 0 0 .5.5h6a.5.5 0 0 0 .5-.5V415h2v8a1 1 0 0 1-1 1h-9a1 1 0 0 1-1-1v-8zm1 0h2v6h-2zm3 0h2v6h-2zm-7-3h3v-2a1 1 0 0 1 1-1h5a1 1 0 0 1 1 1v2h3v2h-13zm8-1h-3v1h3z"/></defs><g><g transform="translate(-427 -409)"><use fill="#939499" xlink:href="#j8sua"/></g></g></svg>
                                                    </div>
                                                    <div class="text">Удалить</div>
                                                </button>
                                            </div>

                                        </div>
                                    </div>
                                    <span>Пмазка подшипников вытяжной установки, замена при необходимости</span>
                                </td>
                                <td class="checks"></td>
                                <td class="checks"></td>
                                <td class="checks"></td>
                                <td class="checks"><img src="img/checks.png" alt=""></td>
                                <td class="checks"></td>
                            </tr>
                            <tr data-filter-five="true">
                                <td class="named">
                                    <div class="button">
                                        <div class="open-tooltip">
                                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="15" height="3" viewBox="0 0 15 3"><defs><path id="27h7a" d="M388.5 356a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3zm-6 0a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3zm-6 0a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3z"/></defs><g><g transform="translate(-375 -356)"><use fill="#d4d6d9" xlink:href="#27h7a"/></g></g></svg>

                                            <div class="tooltip">
                                                <button class="delete">
                                                    <div class="icon">
                                                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="13" height="15" viewBox="0 0 13 15"><defs><path id="j8sua" d="M430 415v6.5a.5.5 0 0 0 .5.5h6a.5.5 0 0 0 .5-.5V415h2v8a1 1 0 0 1-1 1h-9a1 1 0 0 1-1-1v-8zm1 0h2v6h-2zm3 0h2v6h-2zm-7-3h3v-2a1 1 0 0 1 1-1h5a1 1 0 0 1 1 1v2h3v2h-13zm8-1h-3v1h3z"/></defs><g><g transform="translate(-427 -409)"><use fill="#939499" xlink:href="#j8sua"/></g></g></svg>
                                                    </div>
                                                    <div class="text">Удалить</div>
                                                </button>
                                            </div>

                                        </div>
                                    </div>
                                    <span>Ымазка подшипников вытяжной установки, замена при необходимости</span>
                                </td>
                                <td class="checks"></td>
                                <td class="checks"></td>
                                <td class="checks"></td>
                                <td class="checks"></td>
                                <td class="checks"><img src="img/checks.png" alt=""></td>
                            </tr>
                            <tr data-filter-one="true">
                                <td class="named">
                                    <div class="button">
                                        <div class="open-tooltip">
                                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="15" height="3" viewBox="0 0 15 3"><defs><path id="27h7a" d="M388.5 356a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3zm-6 0a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3zm-6 0a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3z"/></defs><g><g transform="translate(-375 -356)"><use fill="#d4d6d9" xlink:href="#27h7a"/></g></g></svg>

                                            <div class="tooltip">
                                                <button class="delete">
                                                    <div class="icon">
                                                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="13" height="15" viewBox="0 0 13 15"><defs><path id="j8sua" d="M430 415v6.5a.5.5 0 0 0 .5.5h6a.5.5 0 0 0 .5-.5V415h2v8a1 1 0 0 1-1 1h-9a1 1 0 0 1-1-1v-8zm1 0h2v6h-2zm3 0h2v6h-2zm-7-3h3v-2a1 1 0 0 1 1-1h5a1 1 0 0 1 1 1v2h3v2h-13zm8-1h-3v1h3z"/></defs><g><g transform="translate(-427 -409)"><use fill="#939499" xlink:href="#j8sua"/></g></g></svg>
                                                    </div>
                                                    <div class="text">Удалить</div>
                                                </button>
                                            </div>

                                        </div>
                                    </div>
                                    <span>Ямазка подшипников вытяжной установки, замена при необходимости</span>
                                </td>
                                <td class="checks"><img src="img/checks.png" alt=""></td>
                                <td class="checks"></td>
                                <td class="checks"></td>
                                <td class="checks"></td>
                                <td class="checks"></td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
            <div class="wrap no-works" data-linked="zhel">
                <a href="#" class="to-add-work">
                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="13" height="13" viewBox="0 0 13 13"><defs><path id="2ehra" d="M252.5 315a1.5 1.5 0 0 1 1.5 1.5v3.5h3.5a1.5 1.5 0 0 1 0 3H254v3.5a1.5 1.5 0 0 1-3 0V323h-3.5a1.5 1.5 0 0 1 0-3h3.5v-3.5a1.5 1.5 0 0 1 1.5-1.5z"/></defs><g><g transform="translate(-246 -315)"><use fill="#fff" xlink:href="#2ehra"/></g></g></svg>
                </a>
                <div class="table-control rotating">
                    Желательные
                    <div class="icon">
                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="10" height="6" viewBox="0 0 10 6"><defs><path id="9luoa" d="M546.705 383.3a.99.99 0 0 0-1.4 0l-3.3 3.3-3.3-3.3a.99.99 0 0 0-1.4 1.4l3.994 3.994c.195.194.45.29.706.288a.986.986 0 0 0 .706-.288l3.994-3.994a.99.99 0 0 0 0-1.4z"/></defs><g><g transform="translate(-537 -383)"><use fill="#d4d6d9" xlink:href="#9luoa"/></g></g></svg>
                    </div>
                </div>
                <div class="table table-opened">
                    <div class="wrapper">
                        <div class="prim">В данной категории нет работ</div>
                        <a href="#" class="add-work">
                            <div class="icon">
                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="13" height="13" viewBox="0 0 13 13"><defs><path id="y90sa" d="M428.5 501a1.5 1.5 0 0 1 1.5 1.5v3.5h3.5a1.5 1.5 0 0 1 0 3H430v3.5a1.5 1.5 0 1 1-3 0V509h-3.5a1.5 1.5 0 1 1 0-3h3.5v-3.5a1.5 1.5 0 0 1 1.5-1.5z"/></defs><g><g transform="translate(-422 -501)"><use fill="#6d67f9" xlink:href="#y90sa"/></g></g></svg>
                            </div>
                            <span>Добавить работу</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="main-content__works-item" data-linked="autom">
        <div class="item-control">
            <div class="icon">
                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="13" height="8" viewBox="0 0 13 8"><defs><path id="ldxya" d="M334.59 239.531a1.5 1.5 0 0 1-2.121-2.121l4.961-4.962a1.495 1.495 0 0 1 1.07-.439c.387-.002.775.144 1.07.44l4.961 4.96a1.5 1.5 0 0 1-2.121 2.122l-3.91-3.91z"/></defs><g><g transform="translate(-332 -232)"><use fill="#232226" xlink:href="#ldxya"/></g></g></svg>
            </div>
            <div class="title">Автоматчики</div>
        </div>
        <div class="item-content opened">
            <div class="wrap" data-linked="passport">
                <a href="#" class="to-add-work">
                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="13" height="13" viewBox="0 0 13 13"><defs><path id="2ehra" d="M252.5 315a1.5 1.5 0 0 1 1.5 1.5v3.5h3.5a1.5 1.5 0 0 1 0 3H254v3.5a1.5 1.5 0 0 1-3 0V323h-3.5a1.5 1.5 0 0 1 0-3h3.5v-3.5a1.5 1.5 0 0 1 1.5-1.5z"/></defs><g><g transform="translate(-246 -315)"><use fill="#fff" xlink:href="#2ehra"/></g></g></svg>
                </a>
                <div class="table-control rotating">
                    По паспорту
                    <div class="icon">
                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="10" height="6" viewBox="0 0 10 6"><defs><path id="9luoa" d="M546.705 383.3a.99.99 0 0 0-1.4 0l-3.3 3.3-3.3-3.3a.99.99 0 0 0-1.4 1.4l3.994 3.994c.195.194.45.29.706.288a.986.986 0 0 0 .706-.288l3.994-3.994a.99.99 0 0 0 0-1.4z"/></defs><g><g transform="translate(-537 -383)"><use fill="#d4d6d9" xlink:href="#9luoa"/></g></g></svg>
                    </div>
                </div>
                <div class="table table-opened">
                    <div class="wrapper">
                        <table>
                            <thead>
                            <td class="name active">Наименование работы</td>
                            <td class="week">Еженедельно</td>
                            <td class="month">Ежемесячно</td>
                            <td class="kvar">Квартально</td>
                            <td class="polu">Полугодично</td>
                            <td class="year">Раз в год</td>
                            </thead>
                            <tr>
                                <td class="named">
                                    <div class="button">
                                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="15" height="3" viewBox="0 0 15 3"><defs><path id="27h7a" d="M388.5 356a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3zm-6 0a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3zm-6 0a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3z"/></defs><g><g transform="translate(-375 -356)"><use fill="#d4d6d9" xlink:href="#27h7a"/></g></g></svg>
                                        <div class="tooltip">
                                            <button class="delete">
                                                <div class="icon">
                                                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="13" height="15" viewBox="0 0 13 15"><defs><path id="j8sua" d="M430 415v6.5a.5.5 0 0 0 .5.5h6a.5.5 0 0 0 .5-.5V415h2v8a1 1 0 0 1-1 1h-9a1 1 0 0 1-1-1v-8zm1 0h2v6h-2zm3 0h2v6h-2zm-7-3h3v-2a1 1 0 0 1 1-1h5a1 1 0 0 1 1 1v2h3v2h-13zm8-1h-3v1h3z"/></defs><g><g transform="translate(-427 -409)"><use fill="#939499" xlink:href="#j8sua"/></g></g></svg>
                                                </div>
                                                <div class="text">Удалить</div>
                                            </button>
                                        </div>
                                    </div>
                                    <span>Внешний осмотр оборудования, проверка креплений и конструкций вытяжной установки, диагностика внешний осмотр оборудования, проверка креплений и конструкций вытяжной установки, диагностика…</span>
                                </td>
                                <td class="checks"><img src="img/checks.png" alt=""></td>
                                <td class="checks"></td>
                                <td class="checks"></td>
                                <td class="checks"></td>
                                <td class="checks"></td>
                            </tr>
                            <tr>
                                <td class="named">
                                    <div class="button">
                                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="15" height="3" viewBox="0 0 15 3"><defs><path id="27h7a" d="M388.5 356a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3zm-6 0a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3zm-6 0a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3z"/></defs><g><g transform="translate(-375 -356)"><use fill="#d4d6d9" xlink:href="#27h7a"/></g></g></svg>
                                    </div>
                                    <span>Проверка электропитания по фазам (дисбаланс по напряжению, дисбаланс по току)</span>
                                </td>
                                <td class="checks"></td>
                                <td class="checks"></td>
                                <td class="checks"></td>
                                <td class="checks"><img src="img/checks.png" alt=""></td>
                                <td class="checks"></td>
                            </tr>
                            <tr>
                                <td class="named"><span>Чистка жалюзийных решеток</span></td>
                                <td class="checks"></td>
                                <td class="checks"></td>
                                <td class="checks"></td>
                                <td class="checks"></td>
                                <td class="checks"><img src="img/checks.png" alt=""></td>
                            </tr>
                            <tr>
                                <td class="named"><span>Проверка виброизолирующих опор</span></td>
                                <td class="checks"><img src="img/checks.png" alt=""></td>
                                <td class="checks"></td>
                                <td class="checks"></td>
                                <td class="checks"></td>
                                <td class="checks"></td>
                            </tr>
                            <tr>
                                <td class="named"><span>Проверка состояний силовых и управляющих цепей оборудования</span></td>
                                <td class="checks"></td>
                                <td class="checks"></td>
                                <td class="checks"><img src="img/checks.png" alt=""></td>
                                <td class="checks"></td>
                                <td class="checks"></td>
                            </tr>
                            <tr>
                                <td class="named"><span>Смазка подшипников вытяжной установки, замена при необходимости</span></td>
                                <td class="checks"></td>
                                <td class="checks"><img src="img/checks.png" alt=""></td>
                                <td class="checks"></td>
                                <td class="checks"></td>
                                <td class="checks"></td>
                            </tr>
                            <tr>
                                <td class="named"><span>Проверка и центровка крыльчатки на валу</span></td>
                                <td class="checks"></td>
                                <td class="checks"></td>
                                <td class="checks"><img src="img/checks.png" alt=""></td>
                                <td class="checks"></td>
                                <td class="checks"></td>
                            </tr>
                            <tr>
                                <td class="named"><span>Ревизия крыльчатки вытяжной установки</span></td>
                                <td class="checks"><img src="img/checks.png" alt=""></td>
                                <td class="checks"></td>
                                <td class="checks"></td>
                                <td class="checks"></td>
                                <td class="checks"></td>
                            </tr>
                            <tr>
                                <td class="named"><span>Проверка амортизационных пружин в основании вентилятора</span></td>
                                <td class="checks"></td>
                                <td class="checks"></td>
                                <td class="checks"></td>
                                <td class="checks"><img src="img/checks.png" alt=""></td>
                                <td class="checks"></td>
                            </tr>
                            <tr>
                                <td class="named"><span>Проверка гибкости и прочности креплений</span></td>
                                <td class="checks"></td>
                                <td class="checks"><img src="img/checks.png" alt=""></td>
                                <td class="checks"></td>
                                <td class="checks"></td>
                                <td class="checks"></td>
                            </tr>
                            <tr>
                                <td class="named"><span>Плановое уплотнение воздуховода</span></td>
                                <td class="checks"></td>
                                <td class="checks"></td>
                                <td class="checks"></td>
                                <td class="checks"></td>
                                <td class="checks"><img src="img/checks.png" alt=""></td>
                            </tr>
                            <tr>
                                <td class="named"><span>Ревизия подшипников электродвигателей вентиляторов вытяжной установки</span></td>
                                <td class="checks"></td>
                                <td class="checks"></td>
                                <td class="checks"></td>
                                <td class="checks"><img src="img/checks.png" alt=""></td>
                                <td class="checks"></td>
                            </tr>
                            <tr>
                                <td class="named"><span>Проверка состояния теплообменника</span></td>
                                <td class="checks"><img src="img/checks.png" alt=""></td>
                                <td class="checks"></td>
                                <td class="checks"></td>
                                <td class="checks"></td>
                                <td class="checks"></td>
                            </tr>
                            <tr>
                                <td class="named"><span>Контроль состояния и чистка (замена) воздушных фильтров</span></td>
                                <td class="checks"></td>
                                <td class="checks"></td>
                                <td class="checks"><img src="img/checks.png" alt=""></td>
                                <td class="checks"></td>
                                <td class="checks"></td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
            <div class="wrap" data-linked="raschir">
                <a href="#" class="to-add-work">
                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="13" height="13" viewBox="0 0 13 13"><defs><path id="2ehra" d="M252.5 315a1.5 1.5 0 0 1 1.5 1.5v3.5h3.5a1.5 1.5 0 0 1 0 3H254v3.5a1.5 1.5 0 0 1-3 0V323h-3.5a1.5 1.5 0 0 1 0-3h3.5v-3.5a1.5 1.5 0 0 1 1.5-1.5z"/></defs><g><g transform="translate(-246 -315)"><use fill="#fff" xlink:href="#2ehra"/></g></g></svg>
                </a>
                <div class="table-control rotating">
                    Расширенные
                    <div class="icon">
                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="10" height="6" viewBox="0 0 10 6"><defs><path id="9luoa" d="M546.705 383.3a.99.99 0 0 0-1.4 0l-3.3 3.3-3.3-3.3a.99.99 0 0 0-1.4 1.4l3.994 3.994c.195.194.45.29.706.288a.986.986 0 0 0 .706-.288l3.994-3.994a.99.99 0 0 0 0-1.4z"/></defs><g><g transform="translate(-537 -383)"><use fill="#d4d6d9" xlink:href="#9luoa"/></g></g></svg>
                    </div>
                </div>
                <div class="table table-opened">
                    <div class="wrapper">
                        <table>
                            <thead>
                            <td class="name active">Наименование работы</td>
                            <td class="week">Еженедельно</td>
                            <td class="month">Ежемесячно</td>
                            <td class="kvar">Квартально</td>
                            <td class="polu">Полугодично</td>
                            <td class="year">Раз в год</td>
                            </thead>
                            <tr>
                                <td class="named">
                                    <div class="button">
                                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="15" height="3" viewBox="0 0 15 3"><defs><path id="27h7a" d="M388.5 356a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3zm-6 0a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3zm-6 0a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3z"/></defs><g><g transform="translate(-375 -356)"><use fill="#d4d6d9" xlink:href="#27h7a"/></g></g></svg>
                                        <div class="tooltip">
                                            <button class="delete">
                                                <div class="icon">
                                                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="13" height="15" viewBox="0 0 13 15"><defs><path id="j8sua" d="M430 415v6.5a.5.5 0 0 0 .5.5h6a.5.5 0 0 0 .5-.5V415h2v8a1 1 0 0 1-1 1h-9a1 1 0 0 1-1-1v-8zm1 0h2v6h-2zm3 0h2v6h-2zm-7-3h3v-2a1 1 0 0 1 1-1h5a1 1 0 0 1 1 1v2h3v2h-13zm8-1h-3v1h3z"/></defs><g><g transform="translate(-427 -409)"><use fill="#939499" xlink:href="#j8sua"/></g></g></svg>
                                                </div>
                                                <div class="text">Удалить</div>
                                            </button>
                                        </div>
                                    </div>
                                    <span>Внешний осмотр оборудования, проверка креплений и конструкций вытяжной установки, диагностика внешний осмотр оборудования, проверка креплений и конструкций вытяжной установки, диагностика…</span>
                                </td>
                                <td class="checks"><img src="img/checks.png" alt=""></td>
                                <td class="checks"></td>
                                <td class="checks"></td>
                                <td class="checks"></td>
                                <td class="checks"></td>
                            </tr>
                            <tr>
                                <td class="named">
                                    <div class="button">
                                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="15" height="3" viewBox="0 0 15 3"><defs><path id="27h7a" d="M388.5 356a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3zm-6 0a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3zm-6 0a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3z"/></defs><g><g transform="translate(-375 -356)"><use fill="#d4d6d9" xlink:href="#27h7a"/></g></g></svg>
                                    </div>
                                    <span>Проверка электропитания по фазам (дисбаланс по напряжению, дисбаланс по току)</span>
                                </td>
                                <td class="checks"></td>
                                <td class="checks"></td>
                                <td class="checks"></td>
                                <td class="checks"><img src="img/checks.png" alt=""></td>
                                <td class="checks"></td>
                            </tr>
                            <tr>
                                <td class="named"><span>Чистка жалюзийных решеток</span></td>
                                <td class="checks"></td>
                                <td class="checks"></td>
                                <td class="checks"></td>
                                <td class="checks"></td>
                                <td class="checks"><img src="img/checks.png" alt=""></td>
                            </tr>
                            <tr>
                                <td class="named"><span>Проверка виброизолирующих опор</span></td>
                                <td class="checks"><img src="img/checks.png" alt=""></td>
                                <td class="checks"></td>
                                <td class="checks"></td>
                                <td class="checks"></td>
                                <td class="checks"></td>
                            </tr>
                            <tr>
                                <td class="named"><span>Проверка состояний силовых и управляющих цепей оборудования</span></td>
                                <td class="checks"></td>
                                <td class="checks"></td>
                                <td class="checks"><img src="img/checks.png" alt=""></td>
                                <td class="checks"></td>
                                <td class="checks"></td>
                            </tr>
                            <tr>
                                <td class="named"><span>Смазка подшипников вытяжной установки, замена при необходимости</span></td>
                                <td class="checks"></td>
                                <td class="checks"><img src="img/checks.png" alt=""></td>
                                <td class="checks"></td>
                                <td class="checks"></td>
                                <td class="checks"></td>
                            </tr>
                            <tr>
                                <td class="named"><span>Проверка и центровка крыльчатки на валу</span></td>
                                <td class="checks"></td>
                                <td class="checks"></td>
                                <td class="checks"><img src="img/checks.png" alt=""></td>
                                <td class="checks"></td>
                                <td class="checks"></td>
                            </tr>
                            <tr>
                                <td class="named"><span>Ревизия крыльчатки вытяжной установки</span></td>
                                <td class="checks"><img src="img/checks.png" alt=""></td>
                                <td class="checks"></td>
                                <td class="checks"></td>
                                <td class="checks"></td>
                                <td class="checks"></td>
                            </tr>
                            <tr>
                                <td class="named"><span>Проверка амортизационных пружин в основании вентилятора</span></td>
                                <td class="checks"></td>
                                <td class="checks"></td>
                                <td class="checks"></td>
                                <td class="checks"><img src="img/checks.png" alt=""></td>
                                <td class="checks"></td>
                            </tr>
                            <tr>
                                <td class="named"><span>Проверка гибкости и прочности креплений</span></td>
                                <td class="checks"></td>
                                <td class="checks"><img src="img/checks.png" alt=""></td>
                                <td class="checks"></td>
                                <td class="checks"></td>
                                <td class="checks"></td>
                            </tr>
                            <tr>
                                <td class="named"><span>Плановое уплотнение воздуховода</span></td>
                                <td class="checks"></td>
                                <td class="checks"></td>
                                <td class="checks"></td>
                                <td class="checks"></td>
                                <td class="checks"><img src="img/checks.png" alt=""></td>
                            </tr>
                            <tr>
                                <td class="named"><span>Ревизия подшипников электродвигателей вентиляторов вытяжной установки</span></td>
                                <td class="checks"></td>
                                <td class="checks"></td>
                                <td class="checks"></td>
                                <td class="checks"><img src="img/checks.png" alt=""></td>
                                <td class="checks"></td>
                            </tr>
                            <tr>
                                <td class="named"><span>Проверка состояния теплообменника</span></td>
                                <td class="checks"><img src="img/checks.png" alt=""></td>
                                <td class="checks"></td>
                                <td class="checks"></td>
                                <td class="checks"></td>
                                <td class="checks"></td>
                            </tr>
                            <tr>
                                <td class="named"><span>Контроль состояния и чистка (замена) воздушных фильтров</span></td>
                                <td class="checks"></td>
                                <td class="checks"></td>
                                <td class="checks"><img src="img/checks.png" alt=""></td>
                                <td class="checks"></td>
                                <td class="checks"></td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
            <div class="wrap no-works" data-linked="zhel">
                <a href="#" class="to-add-work">
                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="13" height="13" viewBox="0 0 13 13"><defs><path id="2ehra" d="M252.5 315a1.5 1.5 0 0 1 1.5 1.5v3.5h3.5a1.5 1.5 0 0 1 0 3H254v3.5a1.5 1.5 0 0 1-3 0V323h-3.5a1.5 1.5 0 0 1 0-3h3.5v-3.5a1.5 1.5 0 0 1 1.5-1.5z"/></defs><g><g transform="translate(-246 -315)"><use fill="#fff" xlink:href="#2ehra"/></g></g></svg>
                </a>
                <div class="table-control rotating">
                    Желательные
                    <div class="icon">
                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="10" height="6" viewBox="0 0 10 6"><defs><path id="9luoa" d="M546.705 383.3a.99.99 0 0 0-1.4 0l-3.3 3.3-3.3-3.3a.99.99 0 0 0-1.4 1.4l3.994 3.994c.195.194.45.29.706.288a.986.986 0 0 0 .706-.288l3.994-3.994a.99.99 0 0 0 0-1.4z"/></defs><g><g transform="translate(-537 -383)"><use fill="#d4d6d9" xlink:href="#9luoa"/></g></g></svg>
                    </div>
                </div>
                <div class="table table-opened">
                    <div class="wrapper">
                        <div class="prim">В данной категории нет работ</div>
                        <a href="#" class="add-work">
                            <div class="icon">
                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="13" height="13" viewBox="0 0 13 13"><defs><path id="y90sa" d="M428.5 501a1.5 1.5 0 0 1 1.5 1.5v3.5h3.5a1.5 1.5 0 0 1 0 3H430v3.5a1.5 1.5 0 1 1-3 0V509h-3.5a1.5 1.5 0 1 1 0-3h3.5v-3.5a1.5 1.5 0 0 1 1.5-1.5z"/></defs><g><g transform="translate(-422 -501)"><use fill="#6d67f9" xlink:href="#y90sa"/></g></g></svg>
                            </div>
                            <span>Добавить работу</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="main-content__works-item" data-linked="tepl">
        <div class="item-control">
            <div class="icon">
                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="13" height="8" viewBox="0 0 13 8"><defs><path id="ldxya" d="M334.59 239.531a1.5 1.5 0 0 1-2.121-2.121l4.961-4.962a1.495 1.495 0 0 1 1.07-.439c.387-.002.775.144 1.07.44l4.961 4.96a1.5 1.5 0 0 1-2.121 2.122l-3.91-3.91z"/></defs><g><g transform="translate(-332 -232)"><use fill="#232226" xlink:href="#ldxya"/></g></g></svg>
            </div>
            <div class="title">Тепловики</div>
        </div>
        <div class="item-content opened">
            <div class="wrap" data-linked="passport">
                <a href="#" class="to-add-work">
                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="13" height="13" viewBox="0 0 13 13"><defs><path id="2ehra" d="M252.5 315a1.5 1.5 0 0 1 1.5 1.5v3.5h3.5a1.5 1.5 0 0 1 0 3H254v3.5a1.5 1.5 0 0 1-3 0V323h-3.5a1.5 1.5 0 0 1 0-3h3.5v-3.5a1.5 1.5 0 0 1 1.5-1.5z"/></defs><g><g transform="translate(-246 -315)"><use fill="#fff" xlink:href="#2ehra"/></g></g></svg>
                </a>
                <div class="table-control rotating">
                    По паспорту
                    <div class="icon">
                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="10" height="6" viewBox="0 0 10 6"><defs><path id="9luoa" d="M546.705 383.3a.99.99 0 0 0-1.4 0l-3.3 3.3-3.3-3.3a.99.99 0 0 0-1.4 1.4l3.994 3.994c.195.194.45.29.706.288a.986.986 0 0 0 .706-.288l3.994-3.994a.99.99 0 0 0 0-1.4z"/></defs><g><g transform="translate(-537 -383)"><use fill="#d4d6d9" xlink:href="#9luoa"/></g></g></svg>
                    </div>
                </div>
                <div class="table table-opened">
                    <div class="wrapper">
                        <table>
                            <thead>
                            <td class="name active">Наименование работы</td>
                            <td class="week">Еженедельно</td>
                            <td class="month">Ежемесячно</td>
                            <td class="kvar">Квартально</td>
                            <td class="polu">Полугодично</td>
                            <td class="year">Раз в год</td>
                            </thead>
                            <tr>
                                <td class="named">
                                    <div class="button">
                                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="15" height="3" viewBox="0 0 15 3"><defs><path id="27h7a" d="M388.5 356a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3zm-6 0a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3zm-6 0a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3z"/></defs><g><g transform="translate(-375 -356)"><use fill="#d4d6d9" xlink:href="#27h7a"/></g></g></svg>
                                        <div class="tooltip">
                                            <button class="delete">
                                                <div class="icon">
                                                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="13" height="15" viewBox="0 0 13 15"><defs><path id="j8sua" d="M430 415v6.5a.5.5 0 0 0 .5.5h6a.5.5 0 0 0 .5-.5V415h2v8a1 1 0 0 1-1 1h-9a1 1 0 0 1-1-1v-8zm1 0h2v6h-2zm3 0h2v6h-2zm-7-3h3v-2a1 1 0 0 1 1-1h5a1 1 0 0 1 1 1v2h3v2h-13zm8-1h-3v1h3z"/></defs><g><g transform="translate(-427 -409)"><use fill="#939499" xlink:href="#j8sua"/></g></g></svg>
                                                </div>
                                                <div class="text">Удалить</div>
                                            </button>
                                        </div>
                                    </div>
                                    <span>Внешний осмотр оборудования, проверка креплений и конструкций вытяжной установки, диагностика внешний осмотр оборудования, проверка креплений и конструкций вытяжной установки, диагностика…</span>
                                </td>
                                <td class="checks"><img src="img/checks.png" alt=""></td>
                                <td class="checks"></td>
                                <td class="checks"></td>
                                <td class="checks"></td>
                                <td class="checks"></td>
                            </tr>
                            <tr>
                                <td class="named">
                                    <div class="button">
                                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="15" height="3" viewBox="0 0 15 3"><defs><path id="27h7a" d="M388.5 356a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3zm-6 0a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3zm-6 0a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3z"/></defs><g><g transform="translate(-375 -356)"><use fill="#d4d6d9" xlink:href="#27h7a"/></g></g></svg>
                                    </div>
                                    <span>Проверка электропитания по фазам (дисбаланс по напряжению, дисбаланс по току)</span>
                                </td>
                                <td class="checks"></td>
                                <td class="checks"></td>
                                <td class="checks"></td>
                                <td class="checks"><img src="img/checks.png" alt=""></td>
                                <td class="checks"></td>
                            </tr>
                            <tr>
                                <td class="named"><span>Чистка жалюзийных решеток</span></td>
                                <td class="checks"></td>
                                <td class="checks"></td>
                                <td class="checks"></td>
                                <td class="checks"></td>
                                <td class="checks"><img src="img/checks.png" alt=""></td>
                            </tr>
                            <tr>
                                <td class="named"><span>Проверка виброизолирующих опор</span></td>
                                <td class="checks"><img src="img/checks.png" alt=""></td>
                                <td class="checks"></td>
                                <td class="checks"></td>
                                <td class="checks"></td>
                                <td class="checks"></td>
                            </tr>
                            <tr>
                                <td class="named"><span>Проверка состояний силовых и управляющих цепей оборудования</span></td>
                                <td class="checks"></td>
                                <td class="checks"></td>
                                <td class="checks"><img src="img/checks.png" alt=""></td>
                                <td class="checks"></td>
                                <td class="checks"></td>
                            </tr>
                            <tr>
                                <td class="named"><span>Смазка подшипников вытяжной установки, замена при необходимости</span></td>
                                <td class="checks"></td>
                                <td class="checks"><img src="img/checks.png" alt=""></td>
                                <td class="checks"></td>
                                <td class="checks"></td>
                                <td class="checks"></td>
                            </tr>
                            <tr>
                                <td class="named"><span>Проверка и центровка крыльчатки на валу</span></td>
                                <td class="checks"></td>
                                <td class="checks"></td>
                                <td class="checks"><img src="img/checks.png" alt=""></td>
                                <td class="checks"></td>
                                <td class="checks"></td>
                            </tr>
                            <tr>
                                <td class="named"><span>Ревизия крыльчатки вытяжной установки</span></td>
                                <td class="checks"><img src="img/checks.png" alt=""></td>
                                <td class="checks"></td>
                                <td class="checks"></td>
                                <td class="checks"></td>
                                <td class="checks"></td>
                            </tr>
                            <tr>
                                <td class="named"><span>Проверка амортизационных пружин в основании вентилятора</span></td>
                                <td class="checks"></td>
                                <td class="checks"></td>
                                <td class="checks"></td>
                                <td class="checks"><img src="img/checks.png" alt=""></td>
                                <td class="checks"></td>
                            </tr>
                            <tr>
                                <td class="named"><span>Проверка гибкости и прочности креплений</span></td>
                                <td class="checks"></td>
                                <td class="checks"><img src="img/checks.png" alt=""></td>
                                <td class="checks"></td>
                                <td class="checks"></td>
                                <td class="checks"></td>
                            </tr>
                            <tr>
                                <td class="named"><span>Плановое уплотнение воздуховода</span></td>
                                <td class="checks"></td>
                                <td class="checks"></td>
                                <td class="checks"></td>
                                <td class="checks"></td>
                                <td class="checks"><img src="img/checks.png" alt=""></td>
                            </tr>
                            <tr>
                                <td class="named"><span>Ревизия подшипников электродвигателей вентиляторов вытяжной установки</span></td>
                                <td class="checks"></td>
                                <td class="checks"></td>
                                <td class="checks"></td>
                                <td class="checks"><img src="img/checks.png" alt=""></td>
                                <td class="checks"></td>
                            </tr>
                            <tr>
                                <td class="named"><span>Проверка состояния теплообменника</span></td>
                                <td class="checks"><img src="img/checks.png" alt=""></td>
                                <td class="checks"></td>
                                <td class="checks"></td>
                                <td class="checks"></td>
                                <td class="checks"></td>
                            </tr>
                            <tr>
                                <td class="named"><span>Контроль состояния и чистка (замена) воздушных фильтров</span></td>
                                <td class="checks"></td>
                                <td class="checks"></td>
                                <td class="checks"><img src="img/checks.png" alt=""></td>
                                <td class="checks"></td>
                                <td class="checks"></td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
            <div class="wrap" data-linked="raschir">
                <a href="#" class="to-add-work">
                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="13" height="13" viewBox="0 0 13 13"><defs><path id="2ehra" d="M252.5 315a1.5 1.5 0 0 1 1.5 1.5v3.5h3.5a1.5 1.5 0 0 1 0 3H254v3.5a1.5 1.5 0 0 1-3 0V323h-3.5a1.5 1.5 0 0 1 0-3h3.5v-3.5a1.5 1.5 0 0 1 1.5-1.5z"/></defs><g><g transform="translate(-246 -315)"><use fill="#fff" xlink:href="#2ehra"/></g></g></svg>
                </a>
                <div class="table-control rotating">
                    Расширенные
                    <div class="icon">
                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="10" height="6" viewBox="0 0 10 6"><defs><path id="9luoa" d="M546.705 383.3a.99.99 0 0 0-1.4 0l-3.3 3.3-3.3-3.3a.99.99 0 0 0-1.4 1.4l3.994 3.994c.195.194.45.29.706.288a.986.986 0 0 0 .706-.288l3.994-3.994a.99.99 0 0 0 0-1.4z"/></defs><g><g transform="translate(-537 -383)"><use fill="#d4d6d9" xlink:href="#9luoa"/></g></g></svg>
                    </div>
                </div>
                <div class="table table-opened">
                    <div class="wrapper">
                        <table>
                            <thead>
                            <td class="name active">Наименование работы</td>
                            <td class="week">Еженедельно</td>
                            <td class="month">Ежемесячно</td>
                            <td class="kvar">Квартально</td>
                            <td class="polu">Полугодично</td>
                            <td class="year">Раз в год</td>
                            </thead>
                            <tr>
                                <td class="named">
                                    <div class="button">
                                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="15" height="3" viewBox="0 0 15 3"><defs><path id="27h7a" d="M388.5 356a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3zm-6 0a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3zm-6 0a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3z"/></defs><g><g transform="translate(-375 -356)"><use fill="#d4d6d9" xlink:href="#27h7a"/></g></g></svg>
                                        <div class="tooltip">
                                            <button class="delete">
                                                <div class="icon">
                                                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="13" height="15" viewBox="0 0 13 15"><defs><path id="j8sua" d="M430 415v6.5a.5.5 0 0 0 .5.5h6a.5.5 0 0 0 .5-.5V415h2v8a1 1 0 0 1-1 1h-9a1 1 0 0 1-1-1v-8zm1 0h2v6h-2zm3 0h2v6h-2zm-7-3h3v-2a1 1 0 0 1 1-1h5a1 1 0 0 1 1 1v2h3v2h-13zm8-1h-3v1h3z"/></defs><g><g transform="translate(-427 -409)"><use fill="#939499" xlink:href="#j8sua"/></g></g></svg>
                                                </div>
                                                <div class="text">Удалить</div>
                                            </button>
                                        </div>
                                    </div>
                                    <span>Внешний осмотр оборудования, проверка креплений и конструкций вытяжной установки, диагностика внешний осмотр оборудования, проверка креплений и конструкций вытяжной установки, диагностика…</span>
                                </td>
                                <td class="checks"><img src="img/checks.png" alt=""></td>
                                <td class="checks"></td>
                                <td class="checks"></td>
                                <td class="checks"></td>
                                <td class="checks"></td>
                            </tr>
                            <tr>
                                <td class="named">
                                    <div class="button">
                                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="15" height="3" viewBox="0 0 15 3"><defs><path id="27h7a" d="M388.5 356a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3zm-6 0a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3zm-6 0a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3z"/></defs><g><g transform="translate(-375 -356)"><use fill="#d4d6d9" xlink:href="#27h7a"/></g></g></svg>
                                    </div>
                                    <span>Проверка электропитания по фазам (дисбаланс по напряжению, дисбаланс по току)</span>
                                </td>
                                <td class="checks"></td>
                                <td class="checks"></td>
                                <td class="checks"></td>
                                <td class="checks"><img src="img/checks.png" alt=""></td>
                                <td class="checks"></td>
                            </tr>
                            <tr>
                                <td class="named"><span>Чистка жалюзийных решеток</span></td>
                                <td class="checks"></td>
                                <td class="checks"></td>
                                <td class="checks"></td>
                                <td class="checks"></td>
                                <td class="checks"><img src="img/checks.png" alt=""></td>
                            </tr>
                            <tr>
                                <td class="named"><span>Проверка виброизолирующих опор</span></td>
                                <td class="checks"><img src="img/checks.png" alt=""></td>
                                <td class="checks"></td>
                                <td class="checks"></td>
                                <td class="checks"></td>
                                <td class="checks"></td>
                            </tr>
                            <tr>
                                <td class="named"><span>Проверка состояний силовых и управляющих цепей оборудования</span></td>
                                <td class="checks"></td>
                                <td class="checks"></td>
                                <td class="checks"><img src="img/checks.png" alt=""></td>
                                <td class="checks"></td>
                                <td class="checks"></td>
                            </tr>
                            <tr>
                                <td class="named"><span>Смазка подшипников вытяжной установки, замена при необходимости</span></td>
                                <td class="checks"></td>
                                <td class="checks"><img src="img/checks.png" alt=""></td>
                                <td class="checks"></td>
                                <td class="checks"></td>
                                <td class="checks"></td>
                            </tr>
                            <tr>
                                <td class="named"><span>Проверка и центровка крыльчатки на валу</span></td>
                                <td class="checks"></td>
                                <td class="checks"></td>
                                <td class="checks"><img src="img/checks.png" alt=""></td>
                                <td class="checks"></td>
                                <td class="checks"></td>
                            </tr>
                            <tr>
                                <td class="named"><span>Ревизия крыльчатки вытяжной установки</span></td>
                                <td class="checks"><img src="img/checks.png" alt=""></td>
                                <td class="checks"></td>
                                <td class="checks"></td>
                                <td class="checks"></td>
                                <td class="checks"></td>
                            </tr>
                            <tr>
                                <td class="named"><span>Проверка амортизационных пружин в основании вентилятора</span></td>
                                <td class="checks"></td>
                                <td class="checks"></td>
                                <td class="checks"></td>
                                <td class="checks"><img src="img/checks.png" alt=""></td>
                                <td class="checks"></td>
                            </tr>
                            <tr>
                                <td class="named"><span>Проверка гибкости и прочности креплений</span></td>
                                <td class="checks"></td>
                                <td class="checks"><img src="img/checks.png" alt=""></td>
                                <td class="checks"></td>
                                <td class="checks"></td>
                                <td class="checks"></td>
                            </tr>
                            <tr>
                                <td class="named"><span>Плановое уплотнение воздуховода</span></td>
                                <td class="checks"></td>
                                <td class="checks"></td>
                                <td class="checks"></td>
                                <td class="checks"></td>
                                <td class="checks"><img src="img/checks.png" alt=""></td>
                            </tr>
                            <tr>
                                <td class="named"><span>Ревизия подшипников электродвигателей вентиляторов вытяжной установки</span></td>
                                <td class="checks"></td>
                                <td class="checks"></td>
                                <td class="checks"></td>
                                <td class="checks"><img src="img/checks.png" alt=""></td>
                                <td class="checks"></td>
                            </tr>
                            <tr>
                                <td class="named"><span>Проверка состояния теплообменника</span></td>
                                <td class="checks"><img src="img/checks.png" alt=""></td>
                                <td class="checks"></td>
                                <td class="checks"></td>
                                <td class="checks"></td>
                                <td class="checks"></td>
                            </tr>
                            <tr>
                                <td class="named"><span>Контроль состояния и чистка (замена) воздушных фильтров</span></td>
                                <td class="checks"></td>
                                <td class="checks"></td>
                                <td class="checks"><img src="img/checks.png" alt=""></td>
                                <td class="checks"></td>
                                <td class="checks"></td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
            <div class="wrap no-works" data-linked="zhel">
                <a href="#" class="to-add-work">
                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="13" height="13" viewBox="0 0 13 13"><defs><path id="2ehra" d="M252.5 315a1.5 1.5 0 0 1 1.5 1.5v3.5h3.5a1.5 1.5 0 0 1 0 3H254v3.5a1.5 1.5 0 0 1-3 0V323h-3.5a1.5 1.5 0 0 1 0-3h3.5v-3.5a1.5 1.5 0 0 1 1.5-1.5z"/></defs><g><g transform="translate(-246 -315)"><use fill="#fff" xlink:href="#2ehra"/></g></g></svg>
                </a>
                <div class="table-control rotating">
                    Желательные
                    <div class="icon">
                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="10" height="6" viewBox="0 0 10 6"><defs><path id="9luoa" d="M546.705 383.3a.99.99 0 0 0-1.4 0l-3.3 3.3-3.3-3.3a.99.99 0 0 0-1.4 1.4l3.994 3.994c.195.194.45.29.706.288a.986.986 0 0 0 .706-.288l3.994-3.994a.99.99 0 0 0 0-1.4z"/></defs><g><g transform="translate(-537 -383)"><use fill="#d4d6d9" xlink:href="#9luoa"/></g></g></svg>
                    </div>
                </div>
                <div class="table table-opened">
                    <div class="wrapper">
                        <div class="prim">В данной категории нет работ</div>
                        <a href="#" class="add-work">
                            <div class="icon">
                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="13" height="13" viewBox="0 0 13 13"><defs><path id="y90sa" d="M428.5 501a1.5 1.5 0 0 1 1.5 1.5v3.5h3.5a1.5 1.5 0 0 1 0 3H430v3.5a1.5 1.5 0 1 1-3 0V509h-3.5a1.5 1.5 0 1 1 0-3h3.5v-3.5a1.5 1.5 0 0 1 1.5-1.5z"/></defs><g><g transform="translate(-422 -501)"><use fill="#6d67f9" xlink:href="#y90sa"/></g></g></svg>
                            </div>
                            <span>Добавить работу</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    -->
</div>

</div>

<script type="text/javascript">


    $(document).ready(function(){
        $('.main-content__works-menu_dropdown-right ul').find('li a').click(function(){
            location.href = $(this).attr('href');
        });


        //alert($('.select-brand .jq-selectbox__trigger').length);

        function getSelectedCategoryId(){
            var result = null;

            $('.select-razdel .jq-selectbox__dropdown ul li').each(function(index){
                if(result){
                    return;
                }

                if($(this).hasClass('selected')){
                    result = $('.select-razdel select.select-razdel option').eq(index).val();
                }
            });

            return result;
        }

        function getSelectedBrandId(){
            var result = null;

            $('.select-brand .jq-selectbox__dropdown ul li').each(function(index){
                if(result){
                    return;
                }

                if($(this).hasClass('selected')){
                    result = $('.select-brand select.select-brand option').eq(index).val();
                }
            });

            return result;
        }

        function getSelectedWorkerTypeId(){
            var result = null;

            $('.add-works__info').eq(3).find('.jq-selectbox__dropdown ul li').each(function(index){
                if(result){
                    return;
                }

                if($(this).hasClass('selected')){
                    result = $('.add-works__info').eq(3).find('select[name="razdel"] option').eq(index).val();
                }
            });

            return result;
        }

        function getSelectedWorkTypeId(){
            var result = null;

            $('.add-works__info').eq(4).find('.jq-selectbox__dropdown ul li').each(function(index){
                if(result){
                    return;
                }

                if($(this).hasClass('selected')){
                    result = $('.add-works__info').eq(4).find('select[name="razdel"] option').eq(index).val();
                }
            });

            return result;
        }


        function getSelectedPeriodId(){
            var result = null;

            $('.add-works__info').eq(5).find('.jq-selectbox__dropdown ul li').each(function(index){
                if(result){
                    return;
                }

                if($(this).hasClass('selected')){
                    result = $('.add-works__info').eq(5).find('select[name="razdel"] option').eq(index).val();
                }
            });

            return result;
        }

        function getReportFormsIds(){

            var result = [];

            $('.add-works__info .checks input:checked').each(function(){
                result.push($(this).attr('report_forms_id'));
            });

            return result;
        }

        function onBrandListOpenClick(){

            var selectedCategoryId = getSelectedCategoryId();



            $('.select-brand select.select-brand option').each(function(index){

                if($(this).attr('category_id') == selectedCategoryId){
                    $('.select-brand .jq-selectbox__dropdown ul li').eq(index).css('display','block');
                } else {
                    $('.select-brand .jq-selectbox__dropdown ul li').eq(index).css('display','none');
                }

            });
        }

        function setSelectedCategory(category_id){

            var indexToSelect = 0;

            $('.select-razdel select.select-razdel option').each(function(index){

                if(indexToSelect){
                    return;
                }

                if($(this).val() == category_id){
                    indexToSelect = index;
                }
            });

            $('.select-razdel .jq-selectbox__dropdown ul li').removeClass('selected').removeClass('sel');

            $('.select-razdel .jq-selectbox__dropdown ul li').eq(indexToSelect).addClass('selected').addClass('sel');


           $('.select-razdel .jq-selectbox__select-text').text($('.select-razdel .jq-selectbox__dropdown ul li').eq(indexToSelect).text());

           $('.add-works__title .divide').text($('.select-razdel .jq-selectbox__dropdown ul li').eq(indexToSelect).text()).css('display','inline');

            $('.add-works__title .check').css('display','inline');
        }

        function setSelectedBrand(brand_id){

            var indexToSelect = 0;

            $('.select-brand select.select-brand option').each(function(index){

                if(indexToSelect){
                    return;
                }

                if($(this).val() == brand_id){
                    indexToSelect = index;
                }
            });

            $('.select-brand .jq-selectbox__dropdown ul li').removeClass('selected').removeClass('sel');

            $('.select-brand .jq-selectbox__dropdown ul li').eq(indexToSelect).addClass('selected').addClass('sel');


            $('.select-brand .jq-selectbox__select-text').text($('.select-brand .jq-selectbox__dropdown ul li').eq(indexToSelect).text());


            $('.add-works__title .brand').text($('.select-brand .jq-selectbox__dropdown ul li').eq(indexToSelect).text()).css('display','inline');
            $('.add-works__title .check').css('display','inline');
        }

        function setSelectedWorkerType(worker_types_id){

            var indexToSelect = 0;

            $('.add-works__info').eq(3).find('select option').each(function(index){



                if(indexToSelect){
                    return;
                }

                if($(this).val() == worker_types_id){
                    indexToSelect = index;
                }
            });




            $('.add-works__info').eq(3).find('.jq-selectbox__dropdown ul li').removeClass('selected').removeClass('sel');

            $('.add-works__info').eq(3).find('.jq-selectbox__dropdown ul li').eq(indexToSelect).addClass('selected').addClass('sel');


            $('.add-works__info').eq(3).find('.jq-selectbox__select-text').text($('.add-works__info').eq(3).find('.jq-selectbox__dropdown ul li').eq(indexToSelect).text());



        }

        function setSelectedWorkType(work_types_id){

            var indexToSelect = 0;

            $('.add-works__info').eq(4).find('select option').each(function(index){



                if(indexToSelect){
                    return;
                }

                if($(this).val() == work_types_id){
                    indexToSelect = index;
                }
            });




            $('.add-works__info').eq(4).find('.jq-selectbox__dropdown ul li').removeClass('selected').removeClass('sel');

            $('.add-works__info').eq(4).find('.jq-selectbox__dropdown ul li').eq(indexToSelect).addClass('selected').addClass('sel');


            $('.add-works__info').eq(4).find('.jq-selectbox__select-text').text($('.add-works__info').eq(4).find('.jq-selectbox__dropdown ul li').eq(indexToSelect).text());



        }

        function setSelectedPeriod(period_id){

            var indexToSelect = 0;

            $('.add-works__info').eq(5).find('select option').each(function(index){



                if(indexToSelect){
                    return;
                }

                if($(this).val() == period_id){
                    indexToSelect = index;
                }
            });




            $('.add-works__info').eq(5).find('.jq-selectbox__dropdown ul li').removeClass('selected').removeClass('sel');

            $('.add-works__info').eq(5).find('.jq-selectbox__dropdown ul li').eq(indexToSelect).addClass('selected').addClass('sel');


            $('.add-works__info').eq(5).find('.jq-selectbox__select-text').text($('.add-works__info').eq(5).find('.jq-selectbox__dropdown ul li').eq(indexToSelect).text());



        }

        function setReportFormsChecked(report_forms_id){



            $('.add-works__info .checks input[report_forms_id="' + report_forms_id + '"]').attr('checked',true);

            if($('.add-works__info .checks input[report_forms_id="' + report_forms_id + '"]').attr('id') == 'form'){
                $('.new-form[report_forms_id="' + report_forms_id + '"]').css('display','block');
            }
        }


        $('.work .plus').eq(0).click(function(){




            $('.select-brand .jq-selectbox__trigger, .select-brand .jq-selectbox__select').unbind('click',onBrandListOpenClick).click(onBrandListOpenClick);

            //$('.add-works__info select.select-razdel li:gt(1)').remove();

            //$('ul.mCS_destroyed li:gt(1)').remove();

            $.ajax({
                type: "POST",
                url: "<?=Yii::$app->urlManager->createUrl('works/getworkinfo')?>",
                data: {<?=Yii::$app->getRequest()->csrfParam;?>:'<?=Yii::$app->getRequest()->getCsrfToken();?>'},
            success: function(data){


                setSelectedCategory(17);

                $('.add-works__info').eq(1).removeClass('disabled').addClass('active');

                //alert(getSelectedCategoryId());

                setSelectedBrand(12);

                //alert(getSelectedBrandId());

                setSelectedWorkerType(1);

                //alert(getSelectedWorkerTypeId());

                setSelectedWorkType(1);

                //alert(getSelectedWorkTypeId());

                setSelectedPeriod(1);

                //alert(getSelectedPeriodId());

                setReportFormsChecked(2);

                alert(getReportFormsIds());

            },
            dataType: 'json'
        });
        });
    });


</script>