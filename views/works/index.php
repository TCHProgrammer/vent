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


                </ul>
            </div>
            <div class="main-content__works-menu_dropdown-right" data-scroll>
                <?foreach($categories as $category):?>
                <ul data-menu="<?=$category->id;?>">
                    <? $brands = Brands::find()->where(array('category_id'=>$category->id))->orderBy('name')->all(); ?>
                    <? foreach($brands as $brand): ?>
                    <li brands_id="<?=$brand->id;?>"><a href="<?=Yii::$app->urlManager->createUrl('works')."?brands_id=".$brand->id;?>"><?=$brand->name;?></a></li>
                    <? endforeach; ?>

                </ul>
                <? endforeach; ?>

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

                if(!isset($_GET['brands_id'])) {
                    if (isset($categories[0])) {
                        $brands = Brands::find()->where(array('category_id' => $categories[0]->id))->orderBy('name')->all();
                        if (isset($brands[0])) {
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
                } else {
                    $brand = Brands::findOne($_GET['brands_id']);
                    $category = $brand->category;

                    $default_category_name = $category->name;
                    $default_category_id = $category->id;

                    $default_brand_name = $brand->name;
                    $default_brand_id = $brand->id;

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
                <a href="#" class="to-add-work" categories_id="<?=$category->id;?>"  brands_id="<?=$brands_id;?>" work_types_id="<?=$works_type_id;?>" worker_types_id="<?=$workers_type_id;?>" >
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

                            </thead>
                            <?

                                $word_numbers_1 = array('one','two','three','four','five');
                                $word_numbers_index = 0;

                            ?>
                            <? foreach($works_type_data as $works_data): ?>

                            <?
                                $curr_work_period = $works_data->period->symbole_code;

                                switch($curr_work_period){
                                    case 'week': $word_numbers_index = 0;break;
                                    case 'month': $word_numbers_index = 1;break;
                                    case 'kvar': $word_numbers_index = 2;break;
                                    case 'polu': $word_numbers_index = 3;break;
                                    case 'year': $word_numbers_index = 4;break;
                                    default: $word_numbers_index = 0;
                                }
                                ?>

                            <tr data-filter-<?=$word_numbers_1[$word_numbers_index];?>="true">
                                <td class="named">
                                    <div class="button">
                                        <div class="open-tooltip">
                                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="15" height="3" viewBox="0 0 15 3"><defs><path id="27h7a" d="M388.5 356a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3zm-6 0a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3zm-6 0a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3z"/></defs><g><g transform="translate(-375 -356)"><use fill="#d4d6d9" xlink:href="#27h7a"/></g></g></svg>

                                            <div class="tooltip">
                                                <button class="delete" works_id="<?=$works_data->id;?>">
                                                    <div class="icon">
                                                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="13" height="15" viewBox="0 0 13 15"><defs><path id="j8sua" d="M430 415v6.5a.5.5 0 0 0 .5.5h6a.5.5 0 0 0 .5-.5V415h2v8a1 1 0 0 1-1 1h-9a1 1 0 0 1-1-1v-8zm1 0h2v6h-2zm3 0h2v6h-2zm-7-3h3v-2a1 1 0 0 1 1-1h5a1 1 0 0 1 1 1v2h3v2h-13zm8-1h-3v1h3z"/></defs><g><g transform="translate(-427 -409)"><use fill="#939499" xlink:href="#j8sua"/></g></g></svg>
                                                    </div>
                                                    <div class="text">Удалить</div>
                                                </button>
                                            </div>

                                        </div>
                                    </div>
                                    <span class="work-name" works_id="<?=$works_data->id;?>"><?=$works_data->name;?></span>
                                </td>
                                <? $work_period = Period::findOne($works_data->period_id); ?>
                                <td class="checks"><?if($work_period->symbole_code == 'week'):?><img src="img/checks.png" alt=""><? endif; ?></td>
                                <td class="checks"><?if($work_period->symbole_code == 'month'):?><img src="img/checks.png" alt=""><? endif; ?></td>
                                <td class="checks"><?if($work_period->symbole_code == 'kvar'):?><img src="img/checks.png" alt=""><? endif; ?></td>
                                <td class="checks"><?if($work_period->symbole_code == 'polu'):?><img src="img/checks.png" alt=""><? endif; ?></td>
                                <td class="checks"><?if($work_period->symbole_code == 'year'):?><img src="img/checks.png" alt=""><? endif; ?></td>
                            </tr>



                            <? endforeach; ?>


                        </table>
                    </div>
                </div>
            </div>
        </div>
        <? endforeach; ?>
    </div>
        <? endforeach; ?>





    <? endif; ?>

</div>

</div>

<script type="text/javascript">


    $(document).ready(function() {
        $('.main-content__works-menu_dropdown-right ul').find('li a').click(function () {
            location.href = $(this).attr('href');
        });

        var current_brands_id = <?=$brand->id;?>;
        //alert($('.select-brand .jq-selectbox__trigger').length);

        function getSelectedCategoryId() {
            var result = null;

            $('.select-razdel .jq-selectbox__dropdown ul li').each(function (index) {
                if (result) {
                    return;
                }

                if ($(this).hasClass('selected')) {
                    result = $('.select-razdel select.select-razdel option').eq(index).val();
                }
            });

            return result;
        }

        function getSelectedBrandId() {
            var result = null;

            $('.select-brand .jq-selectbox__dropdown ul li').each(function (index) {
                if (result) {
                    return;
                }

                if ($(this).hasClass('selected')) {
                    result = $('.select-brand select.select-brand option').eq(index).val();
                }
            });

            return result;
        }

        function getSelectedWorkerTypeId() {
            var result = null;

            $('.add-works__info').eq(3).find('.jq-selectbox__dropdown ul li').each(function (index) {
                if (result) {
                    return;
                }

                if ($(this).hasClass('selected')) {
                    result = $('.add-works__info').eq(3).find('select[name="razdel"] option').eq(index).val();
                }
            });

            return result;
        }

        function getSelectedWorkTypeId() {
            var result = null;

            $('.add-works__info').eq(4).find('.jq-selectbox__dropdown ul li').each(function (index) {
                if (result) {
                    return;
                }

                if ($(this).hasClass('selected')) {
                    result = $('.add-works__info').eq(4).find('select[name="razdel"] option').eq(index).val();
                }
            });

            return result;
        }


        function getSelectedPeriodId() {
            var result = null;

            $('.add-works__info').eq(5).find('.jq-selectbox__dropdown ul li').each(function (index) {
                if (result) {
                    return;
                }

                if ($(this).hasClass('selected')) {
                    result = $('.add-works__info').eq(5).find('select[name="razdel"] option').eq(index).val();
                }
            });

            return result;
        }

        function getReportFormsIds() {

            var result = [];

            $('.add-works__info .checks input:checked').each(function () {
                result.push($(this).attr('report_forms_id'));
            });

            return result;
        }

        function onBrandListOpenClick() {

            var selectedCategoryId = getSelectedCategoryId();


            $('.select-brand select.select-brand option').each(function (index) {

                if ($(this).attr('category_id') == selectedCategoryId) {
                    $('.select-brand .jq-selectbox__dropdown ul li').eq(index).css('display', 'block');
                } else {
                    $('.select-brand .jq-selectbox__dropdown ul li').eq(index).css('display', 'none');
                }

            });
        }

        function setSelectedCategory(category_id) {

            var indexToSelect = 0;

            $('.select-razdel select.select-razdel option').each(function (index) {

                if (indexToSelect) {
                    return;
                }

                if ($(this).val() == category_id) {
                    indexToSelect = index;
                }
            });

            $('.select-razdel .jq-selectbox__dropdown ul li').removeClass('selected').removeClass('sel');

            $('.select-razdel .jq-selectbox__dropdown ul li').eq(indexToSelect).addClass('selected').addClass('sel');


            $('.select-razdel .jq-selectbox__select-text').text($('.select-razdel .jq-selectbox__dropdown ul li').eq(indexToSelect).text());

            $('.add-works__title .divide').text($('.select-razdel .jq-selectbox__dropdown ul li').eq(indexToSelect).text()).css('display', 'inline');

            $('.add-works__title .check').css('display', 'inline');
        }

        function setSelectedBrand(brand_id) {

            var indexToSelect = 0;

            $('.select-brand select.select-brand option').each(function (index) {

                if (indexToSelect) {
                    return;
                }

                if ($(this).val() == brand_id) {
                    indexToSelect = index;
                }
            });

            $('.select-brand .jq-selectbox__dropdown ul li').removeClass('selected').removeClass('sel');

            $('.select-brand .jq-selectbox__dropdown ul li').eq(indexToSelect).addClass('selected').addClass('sel');


            $('.select-brand .jq-selectbox__select-text').text($('.select-brand .jq-selectbox__dropdown ul li').eq(indexToSelect).text());


            $('.add-works__title .brand').text($('.select-brand .jq-selectbox__dropdown ul li').eq(indexToSelect).text()).css('display', 'inline');
            $('.add-works__title .check').css('display', 'inline');


            $('.add-works__info').eq(1).removeClass('disabled');
        }

        function setSelectedWorkerType(worker_types_id) {

            var indexToSelect = 0;

            $('.add-works__info').eq(3).find('select option').each(function (index) {


                if (indexToSelect) {
                    return;
                }

                if ($(this).val() == worker_types_id) {
                    indexToSelect = index;
                }
            });


            $('.add-works__info').eq(3).find('.jq-selectbox__dropdown ul li').removeClass('selected').removeClass('sel');

            $('.add-works__info').eq(3).find('.jq-selectbox__dropdown ul li').eq(indexToSelect).addClass('selected').addClass('sel');


            $('.add-works__info').eq(3).find('.jq-selectbox__select-text').text($('.add-works__info').eq(3).find('.jq-selectbox__dropdown ul li').eq(indexToSelect).text());


        }

        function setSelectedWorkType(work_types_id) {

            var indexToSelect = 0;

            $('.add-works__info').eq(4).find('select option').each(function (index) {


                if (indexToSelect) {
                    return;
                }

                if ($(this).val() == work_types_id) {
                    indexToSelect = index;
                }
            });


            $('.add-works__info').eq(4).find('.jq-selectbox__dropdown ul li').removeClass('selected').removeClass('sel');

            $('.add-works__info').eq(4).find('.jq-selectbox__dropdown ul li').eq(indexToSelect).addClass('selected').addClass('sel');


            $('.add-works__info').eq(4).find('.jq-selectbox__select-text').text($('.add-works__info').eq(4).find('.jq-selectbox__dropdown ul li').eq(indexToSelect).text());


        }

        function setSelectedPeriod(period_id) {

            var indexToSelect = 0;

            $('.add-works__info').eq(5).find('select option').each(function (index) {


                if (indexToSelect) {
                    return;
                }

                if ($(this).val() == period_id) {
                    indexToSelect = index;
                }
            });


            $('.add-works__info').eq(5).find('.jq-selectbox__dropdown ul li').removeClass('selected').removeClass('sel');

            $('.add-works__info').eq(5).find('.jq-selectbox__dropdown ul li').eq(indexToSelect).addClass('selected').addClass('sel');


            $('.add-works__info').eq(5).find('.jq-selectbox__select-text').text($('.add-works__info').eq(5).find('.jq-selectbox__dropdown ul li').eq(indexToSelect).text());


        }

        function setReportFormsChecked(report_forms_id) {

            //alert($('.add-works__info .checks input[report_forms_id="' + report_forms_id + '"]').length);
            $('.add-works__info .checks input[report_forms_id="' + report_forms_id + '"]').prop('checked', true);

            if ($('.add-works__info .checks input[report_forms_id="' + report_forms_id + '"]').attr('id') == 'form') {
                $('.new-form[report_forms_id="' + report_forms_id + '"]').css('display', 'block');
            }
        }


        function addReportFormsField(report_forms_id, work_report_form_fields_id, field_name) {

            $('.new-form[report_forms_id="' + report_forms_id + '"]>.inputs').append('<input type="text" report_forms_id="' + report_forms_id + '" work_report_form_fields_id="' + work_report_form_fields_id + '" placeholder="Введите название поля" value="' + field_name + '">');
        }


        function appendNewComposition(work_contents_id, work_contents_name, work_contents_description, images) {

            if (!work_contents_description || work_contents_description == '') {
                var description_button_class = '';
                var description_block_style = '';
            } else {
                var description_button_class = 'non-active';
                var description_block_style = 'style="display:flex;"';
            }


            if (!images || !images.length) {
                var images_button_class = '';
                var images_block_style = '';
            } else {
                var images_button_class = 'non-active';
                var images_block_style = 'style="display:flex;"';
            }

            var strToAdd = '<div class="composition composition-template" work_contents_id="' + work_contents_id + '">' +
                '<div class="title-block">' +
                '<label>Состав работы</label>' +
                '<div class="input-button">' +
                '<div class="input-area">' +
                '<div class="number">1</div>' +
                '<input type="text" placeholder="Введите название пункта" value="' + work_contents_name + '">' +
                '</div>' +
                '<div class="buttons-area">' +
                '<button class="add-descr ' + description_button_class + '">' +
                '<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="14" height="14" viewBox="0 0 14 14"><defs><path id="a51ia" d="M598 959h-1v1a1 1 0 0 1-2 0v-1h-1a1 1 0 1 1 0-2h1v-1a1 1 0 0 1 2 0v1h1a1 1 0 1 1 0 2zm-8 0h-3v8h8v-3a1 1 0 1 1 2 0v4a1 1 0 0 1-1.029 1H586a1 1 0 0 1-1-1.04v-9.92-.04a1 1 0 0 1 1-1h4a1 1 0 1 1 0 2zm3 3h-4a1 1 0 1 1 0-2h4a1 1 0 1 1 0 2zm0 3h-4a1 1 0 0 1 0-2h4a1 1 0 1 1 0 2z"/></defs><g><g transform="translate(-585 -955)"><use fill="#6d67f9" xlink:href="#a51ia"/></g></g></svg>' +
                '<span>Добавить описание</span>' +
                '</button>' +
                '<button class="add-photo ' + images_button_class + '">' +
                '<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="18" height="14" viewBox="0 0 18 14"><defs><path id="j9cha" d="M810 680v10a1 1 0 0 1-1 1h-2.016v-.002A1 1 0 0 1 807 689h.5a.5.5 0 0 0 .5-.5v-7a.5.5 0 0 0-.5-.5h-3.329l-.585-.586L802.17 679h-2.343l-1.414 1.414-.586.586H794.5a.5.5 0 0 0-.5.5v7a.5.5 0 0 0 .5.5h.5a1 1 0 1 1 0 2h-2a1 1 0 0 1-1-1v-10a1 1 0 0 1 1-1h4l1.707-1.707a1 1 0 0 1 .707-.293h3.172a1 1 0 0 1 .707.293L805 679h4a1 1 0 0 1 1 1zm-9 4c-1.103 0-2 .897-2 2s.897 2 2 2 2-.897 2-2-.897-2-2-2c0 0 1.103 0 0 0zm0-2a4 4 0 1 1 0 8 4 4 0 0 1 0-8z"/></defs><g><g transform="translate(-792 -677)"><use fill="#6d67f9" xlink:href="#j9cha"/></g></g></svg>' +
                '<span>Добавить фото</span>' +
                '</button>' +
                '</div>' +
                '</div>' +
                '</div>' +
                '<div class="props-block">' +
                '<div class="add-descr_block" ' + description_block_style + '>' +
                '<div class="quantity">' +
                '<div class="title">Описание для <span>1</span> пункта</div>' +
                '<a href="#" class="delete-all">Удалить описание</a>' +
                '</div>' +
                '<div class="files">' +
                '<textarea>' + work_contents_description + '</textarea>' +
                '</div>' +
                '</div>' +
                '<div class="add-photo_block" ' + images_block_style + '>' +
                '<div class="quantity">' +
                '<div class="title">Фотографии для <span>1</span> пункта</div>' +
                '<a href="#" class="delete-all">Удалить все фото</a>' +
                '</div>' +
                '<div class="files">' +
                getCompositionPhotos(images) +
                '<div class="file">' +
                '<label>' +
                '<input type="file" name="file">' +
                '<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="18" height="14" viewBox="0 0 18 14"><defs><path id="eqkwa" d="M805 1031v10a1 1 0 0 1-1 1h-2.016v-.002A1 1 0 0 1 802 1040h.5a.5.5 0 0 0 .5-.5v-7a.5.5 0 0 0-.5-.5h-3.329l-.585-.586-1.415-1.414h-2.343l-1.414 1.414-.586.586H789.5a.5.5 0 0 0-.5.5v7a.5.5 0 0 0 .5.5h.5a1 1 0 1 1 0 2h-2a1 1 0 0 1-1-1v-10a1 1 0 0 1 1-1h4l1.707-1.707a1 1 0 0 1 .707-.293h3.172a1 1 0 0 1 .707.293L800 1030h4a1 1 0 0 1 1 1zm-9 4c-1.103 0-2 .897-2 2s.897 2 2 2 2-.897 2-2-.897-2-2-2c0 0 1.103 0 0 0zm0-2a4 4 0 1 1 0 8 4 4 0 0 1 0-8z"/></defs><g><g transform="translate(-787 -1028)"><use fill="#939499" xlink:href="#eqkwa"/></g></g></svg>' +
                '<span>Загрузить фото</span>' +
                '</label>' +
                '<div>' +
                '</div>' +
                '</div>' +
                '</div>' +
                '</div>';

            $('.add-works__info-composition').prepend(strToAdd);

            renumerateCompositions();
        }


        function getCompositionPhotoHTML(img_file, work_contents_photo_id) {
            var strToAdd = '<div class="file" work_contents_photo_id="' + work_contents_photo_id + '"><label style="display: none;"><input type="file" name="file"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="18" height="14" viewBox="0 0 18 14"><defs><path id="eqkwa" d="M805 1031v10a1 1 0 0 1-1 1h-2.016v-.002A1 1 0 0 1 802 1040h.5a.5.5 0 0 0 .5-.5v-7a.5.5 0 0 0-.5-.5h-3.329l-.585-.586-1.415-1.414h-2.343l-1.414 1.414-.586.586H789.5a.5.5 0 0 0-.5.5v7a.5.5 0 0 0 .5.5h.5a1 1 0 1 1 0 2h-2a1 1 0 0 1-1-1v-10a1 1 0 0 1 1-1h4l1.707-1.707a1 1 0 0 1 .707-.293h3.172a1 1 0 0 1 .707.293L800 1030h4a1 1 0 0 1 1 1zm-9 4c-1.103 0-2 .897-2 2s.897 2 2 2 2-.897 2-2-.897-2-2-2c0 0 1.103 0 0 0zm0-2a4 4 0 1 1 0 8 4 4 0 0 1 0-8z"></path></defs><g><g transform="translate(-787 -1028)"><use fill="#939499" xlink:href="#eqkwa"></use></g></g></svg><span>Загрузить фото</span></label><div></div><div class="img-block" style="background-image: url(http://' + '<?=$_SERVER['HTTP_HOST'];?>' + '/upload/composition_images/' + img_file + ')"><a href="#" class="delete-photo"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="9" height="9" viewBox="0 0 9 9"><defs><path id="l6tfa" d="M706.026 1021.044a1 1 0 0 1-1.414 0l-2.121-2.122-2.144 2.144a1 1 0 1 1-1.414-1.414l2.143-2.144-2.12-2.12a1 1 0 1 1 1.413-1.415l2.122 2.121 2.099-2.1a1 1 0 0 1 1.414 1.415l-2.1 2.099 2.122 2.121a1 1 0 0 1 0 1.415z"></path></defs><g><g transform="translate(-698 -1013)"><use fill="#232226" xlink:href="#l6tfa"></use></g></g></svg></a></div></div>';
            return strToAdd;
        }


        function getCompositionPhotos(images) {
            var strToAdd = '';
            $.each(images, function (i, val) {
                strToAdd = strToAdd + getCompositionPhotoHTML(val.img_file, val.work_contents_photo_id);
            });

            return strToAdd;
        }


        function renumerateCompositions() {
            $('.add-works__info-composition .composition').each(function (index) {

                var number = parseInt(index) + parseInt(1);

                var number_block = $(this).find('.number');

                number_block.text(number);

                number_block.parent().find('.add-descr_block .title span').text(number);
                number_block.parent().find('.add-photo_block .title span').text(number);

                $(this).find('.quantity .title span').text(number);


            });
        }


        function getWorkTimeInMinutes() {

            var time_number = parseFloat($('.time-tabs .time-tabs-pane input').val());

            if (isNaN(time_number)) {
                return 0;
            }

            if ($('.time-tabs .time-tabs-nav button[data-href="#minutes"]').hasClass('active')) {
                return (parseFloat(time_number)).toFixed(0);
            } else {
                return (parseFloat(time_number * 60)).toFixed(0);
            }


        }

        function addToFormWorkContentsAlreadyExists() {

            $('.work-contents-already-exits').empty();

            $('.work-contents-already-exits').append('<div class="work_contents_photos"></div>');

            $('.add-works__info-composition>.composition').each(function () {

                if (!$(this).attr('work_contents_id')) {
                    return;
                }

                var work_contents_id = $(this).attr('work_contents_id');
                var name = $(this).find('input').eq(0).val();
                var description = $(this).find('.add-descr_block textarea').eq(0).val();


                var image_inputs = [];

                var self = $(this);

                self.find('.add-photo_block .files .file').each(function () {


                    if (!$(this).attr('work_contents_photo_id') && $(this).find('input').eq(0)[0].files.length) {
                        image_inputs.push($(this).find('input').eq(0).clone());
                    }
                });




                var image_ids = [];

                var self = this;

                $(self).find('.add-photo_block .files .file').each(function () {
                    if ($(this).attr('work_contents_photo_id')) {
                        image_ids.push($(this).attr('work_contents_photo_id'));
                    }
                });

                var res_str = '<div>';

                res_str += '<input type="hidden" name="work_contents_already_exists_name[' + work_contents_id + ']" value="' + name + '">';
                res_str += '<input type="hidden" name="work_contents_already_exists_description[' + work_contents_id + ']" value="' + description + '">';

                $.each(image_ids, function (i, val) {
                    res_str += '<input type="hidden" name="work_contents_photo_id[' + work_contents_id + '][]" value="' + val + '">';
                });

                res_str += '</div>';






                $('.work-contents-already-exits').append(res_str);





                $('.work-contents-already-exits .work_contents_photos').append('<div work_contents_id="' + work_contents_id + '"></div>');

                $.each(image_inputs, function (i, val) {


                    $('.work-contents-already-exits .work_contents_photos>div[work_contents_id="' + work_contents_id + '"]').append(val);
                });

                $('.work-contents-already-exits .work_contents_photos>div[work_contents_id="' + work_contents_id + '"]>input').each(function (index1) {
                    $(this).attr('name', 'last_work_contents_image_to_add[' + work_contents_id + '][]').css('display', 'none');
                });

            });

        }

        function addToFormWorkContentsToAdd() {

            $('.work-contents-to-add').empty();

            var work_contents_index = -1;


            $('.add-works__info-composition>.composition').each(function (index) {


                if (!$(this).attr('work_contents_id')) {


                    work_contents_index++;


                    //var work_contents_id = $(this).attr('work_contents_id');
                    var name = $(this).find('input').eq(0).val();
                    var description = $(this).find('.add-descr_block textarea').eq(0).val();


                    var image_inputs = [];

                    var self = $(this);

                    self.find('.add-photo_block .files .file').each(function () {


                        if (!$(this).attr('work_contents_photo_id') && $(this).find('input').eq(0)[0].files.length) {
                            image_inputs.push($(this).find('input').eq(0).clone());
                        }
                    });


                    if (!(((!name && !description) || (name == '' && description == '')) && !image_inputs.length)) {

                        var res_str = '<div>';

                        res_str += '<input type="hidden" name="work_contents_to_add_name[' + work_contents_index + ']" value="' + name + '">';
                        res_str += '<input type="hidden" name="work_contents_to_add_description[' + work_contents_index + ']" value="' + description + '">';


                        res_str += '</div>';

                        $('.work-contents-to-add').append(res_str);

                        $('.work-contents-to-add').append('<div class="work_contents_photos"></div>');


                        $('.work-contents-to-add .work_contents_photos').append('<div work_contents_index="' + work_contents_index + '"></div>')

                        $.each(image_inputs, function (i, val) {
                            $('.work-contents-to-add .work_contents_photos>div[work_contents_index="' + work_contents_index + '"]').append(val);
                        });

                        $('.work-contents-to-add .work_contents_photos>div[work_contents_index="' + work_contents_index + '"]>input').each(function (index1) {
                            $(this).attr('name', 'new_work_contents_image_to_add[' + work_contents_index + '][]').css('display', 'none');
                        });

                    }

                }

            });


        }


        function addToFormReportFormsWithFields() {
            var checked_report_forms = getReportFormsIds();

            var strToAdd = '<div class="checked_report_forms">';

            $.each(checked_report_forms, function (i, val) {
                strToAdd += '<input type="hidden" name="checked_report_forms[]" value="' + val + '">';
            });

            strToAdd += '</div>';

            strToAdd += '<div class="report_form_fields">';

            $('.add-works__info .new-form .inputs>input').each(function () {
                var report_forms_id = $(this).parent().parent().attr('report_forms_id');
                var name = $(this).val();
                var found = false;

                $.each(checked_report_forms, function (i, val) {
                    if (val == report_forms_id) {
                        found = true;
                    }
                });


                if (found) {
                    strToAdd += '<input type="hidden" name="report_form_fields[' + report_forms_id + '][]" value="' + name + '">';
                }


            });

            strToAdd += '</div>';

            $('#save-work-form .work-report-forms').empty().append(strToAdd);
        }

        function emptyWorkBlock() {
            setSelectedCategory(0);
            setSelectedBrand(0);
            setSelectedWorkerType(0);
            setSelectedWorkType(0);
            setSelectedPeriod(0);

            $('.add-works__info').eq(2).find('input').val('');

            $('.time-tabs-pane input').val('');

            $('.time-tabs-nav button[data-href="minutes"]').addClass('active');

            $('.time-tabs-nav button[data-href="hours"]').removeClass('active');


            $('.add-works__info.op textarea').val('');

            while ($('.add-works__info-composition>div').length > 2) {
                $('.add-works__info-composition>div').eq(0).remove();
            }
            renumerateCompositions();

            $('.add-works__info.inp input').prop('checked', false);

            $('.add-works__info.inp .new-form .inputs input').remove();
        }


        function fillFormToSend() {


            $('#save-work-form .work-fields input[name="brands_id"]').val(getSelectedBrandId());
            $('#save-work-form .work-fields input[name="name"]').val($('.add-works__info').eq(2).find('input').val());
            $('#save-work-form .work-fields input[name="worker_types_id"]').val(getSelectedWorkerTypeId());
            $('#save-work-form .work-fields input[name="work_types_id"]').val(getSelectedWorkTypeId());
            $('#save-work-form .work-fields input[name="period_id"]').val(getSelectedPeriodId());
            $('#save-work-form .work-fields input[name="execution_time"]').val(getWorkTimeInMinutes());
            $('#save-work-form .work-fields input[name="total_composition_description"]').val($('.add-works__info').eq(7).find('textarea').val());


            addToFormWorkContentsAlreadyExists();
            addToFormWorkContentsToAdd();
            addToFormReportFormsWithFields();

        }


        function formToSendValidate() {
            var result = true;

            $('#save-work-form .work-fields input').each(function () {

                if ($(this).attr('name') == 'total_composition_description') {
                    return;
                }

                if (!$(this).val() || $(this).val() == '') {
                    result = false;
                }
            });

            return result;
        }

        function addIdToFormToSend(id) {
            var formAction = $('#save-work-form').attr('action');
            var exp1 = formAction.split('?');
            if (exp1.length == 2 && exp1[1].length) {

                if (exp1[1].indexOf('?id=') < 0 && exp1[1].indexOf('&id=') < 0) {
                    var result = formAction + '&id=' + id;
                } else {
                    var result = formAction;
                }
            } else {
                var result = formAction + '?id=' + id;
            }


            $('#save-work-form').attr('action', result);
        }

        function removeIdToFormToSend(){


            $('#save-work-form').attr('action', '/works/update?brands_id=' + current_brands_id);
        }


        $(document)
            .on('click', '#save-work-form button[type="submit"]', function (e) {

                fillFormToSend();

                var isValid = formToSendValidate();
                if (!isValid) {
                    e.preventDefault(); //prevent the default action
                    alert('Заполнены не все поля!!!');
                }
            });


        function work_name_click_action(){
            $('.select-brand .jq-selectbox__trigger, .select-brand .jq-selectbox__select').unbind('click', onBrandListOpenClick).click(onBrandListOpenClick);
            addIdToFormToSend($(this).attr('works_id'));
            emptyWorkBlock();
            var self = $(this);

            $.ajax({
                type: "POST",
                url: "<?=Yii::$app->urlManager->createUrl('works/getworkinfo') . '?id=';?>" + self.attr('works_id'),
                data: {<?=Yii::$app->getRequest()->csrfParam;?>:
            '<?=Yii::$app->getRequest()->getCsrfToken();?>'
        },
            success: function (data) {





                setSelectedCategory(data.categories_id);

                setSelectedBrand(data.brands_id);

                setSelectedWorkerType(data.worker_types_id);

                setSelectedWorkType(data.work_types_id);

                setSelectedPeriod(data.period_id);

                $('.add-works__info').eq(2).find('input').val(data.name);

                $('.time-tabs-pane input').val(data.execution_time);

                $('.time-tabs-nav button[data-href="minutes"]').addClass('active');

                $('.time-tabs-nav button[data-href="hours"]').removeClass('active');


                $('.add-works__info.op textarea').val(data.total_composition_description);

                $.each(data.work_contents, function (i, val) {
                    var work_contents_id = val.id;


                    var photos = [];
                    var photo_items = data.work_contents_photo[work_contents_id];


                    if (photo_items) {
                        $.each(photo_items, function (i1, val1) {
                            photos.push({img_file: val1.file_name, work_contents_photo_id: val1.id});
                        });
                    }


                    appendNewComposition(work_contents_id, val.name, val.description, photos);
                });


                $.each(data.work_report_forms, function (i, val) {
                    setReportFormsChecked(val.report_forms_id);

                    var work_report_forms_id = val.id;

                    $.each(data.work_report_form_fields[work_report_forms_id], function (i1, val1) {


                        addReportFormsField(val.report_forms_id, val1.id, val1.name);


                    });


                });


                renumerateCompositions();


                /*
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

                //alert(getReportFormsIds());

                appendNewComposition(3,'name','description',[{img_file:'abc',work_contents_photo_id:1},{img_file:'def',work_contents_photo_id:2},{img_file:'ghi',work_contents_photo_id:3}]);

                addReportFormsField(2,4,'Тестовое название поля');

                //addToFormWorkContentsAlreadyExists();

                // setTimeout(function(){
                //addToFormWorkContentsToAdd();
                //addToFormReportFormsWithFields();
                //alert(getWorkTimeInMinutes());
                //},15000)
                */
            }
        ,
            dataType: 'json'
        })
            ;
        }


        $(document)
            .on('click', '.work-name', work_name_click_action);


        //$('.work-name').unbind('click',work_name_click_action).click(work_name_click_action);



        $('.work .plus').eq(0).click(function () {


            $('.select-brand .jq-selectbox__trigger, .select-brand .jq-selectbox__select').unbind('click', onBrandListOpenClick).click(onBrandListOpenClick);

            emptyWorkBlock();

            removeIdToFormToSend();


        });

        $('.item-content .to-add-work').click(function(){


            $('.select-brand .jq-selectbox__trigger, .select-brand .jq-selectbox__select').unbind('click', onBrandListOpenClick).click(onBrandListOpenClick);

            emptyWorkBlock();

            removeIdToFormToSend();

            setSelectedCategory($(this).attr('categories_id'));

            setSelectedBrand($(this).attr('brands_id'));

            setSelectedWorkerType($(this).attr('worker_types_id'));

            setSelectedWorkType($(this).attr('work_types_id'));
        });


        $(document)
            .on('click', '.tooltip button.delete', function(){

                var id = $(this).attr('works_id');

                $.ajax({
                    type: "POST",
                    url: "<?=Yii::$app->urlManager->createUrl('works/delete')?>" + "?id=" + id,
                    data: {<?=Yii::$app->getRequest()->csrfParam;?>:'<?=Yii::$app->getRequest()->getCsrfToken();?>'},
                success: function(data){

                },
                //dataType: dataType
            });
            });



        $('.sure-close .to-save a.save').click(function(){
            var click_element = $('#save-work-form button[type="submit"]').eq(0);
            click_element.click();
        });

    });


</script>