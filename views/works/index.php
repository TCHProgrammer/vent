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
                    <li><a href="#"><?=$brand->name;?></a></li>
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
            <button class="active" data-id="mech">Механики</button>
            <button class="active" data-id="autom">Автоматчики</button>
            <button class="active" data-id="tepl">Тепловики</button>
            <button class="active">Холодильщики</button>
            <button class="active">Инженеры</button>
            <button class="active">Менеджеры</button>
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
            <button class="active" data-id="passport">По паспорту</button>
            <button class="active" data-id="raschir">Расширенные</button>
            <button class="active" data-id="zhel">Желательное</button>
        </div>
    </div>
</div>
<div class="main-content__works">
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
</div>
</div>