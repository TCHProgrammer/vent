<?php

/* @var $this \yii\web\View */
/* @var $content string */

\Yii::$app->cache->flush();

use app\widgets\Alert;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;

use app\models\Categories;
use app\models\Brands;
use app\models\WorkerTypes;
use app\models\WorkTypes;
use app\models\Period;
use app\models\ReportForms;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
	<meta name="description" content="">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<link rel="shortcut icon" href="/img/favicon/favicon.png" type="image/x-icon">
	<link rel="stylesheet" href="/libs/jquery.mCustomScrollbar.css">
	<link rel="stylesheet" href="/libs/jquery.formstyler.css">
	<link rel="stylesheet" href="/libs/jquery.jscrollpane.css">
	<link rel="stylesheet" href="/css/main.min.css" />
	<link rel="stylesheet" href="/css/site.css" />
	<script src="/libs/jquery/jquery-2.1.3.min.js"></script>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>




<?php $this->beginBody() ?>

<div class="overlay"></div>
<div class="add-brands">
	<div class="add-brands__title">
		Добавление категории
	</div>
	
		<div class="add-brands__input">
			<label for="input1">Название категории</label>
			<input type="text" id="input1" name="name">
		</div>
		<div class="add-brands__input">
			<label for="input2">Название бренда</label>
			<input type="text" id="input2" name="brand_name">
		</div>
        <div class="last-brand__input">
            <input type="hidden" id="input3" name="last_brand_id">
        </div>
		<div class="add-brands__button">
			<button id="save-category"><span>Сохранить категорию</span></button>
		</div>
	
</div>
<script type="text/javascript">
	//$('#save-category').unbind('click').click(function(){
		//$.post('<?//=Yii::$app->urlManager->createUrl('categories/create')?>',{name:$(".add-brands input[name='name']").eq(0).val(),brand_name:$(".add-brands input[name='brand_name']").eq(0).val(),<?=Yii::$app->getRequest()->csrfParam;?>:'<?=Yii::$app->getRequest()->getCsrfToken();?>'});
	//});
	
</script>






<div class="sure-closes">
	<a href="#" class="close">
		<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="35" height="35" viewBox="0 0 35 35"><defs><path id="s6cja" d="M252.5 44c9.665 0 17.5 7.835 17.5 17.5S262.165 79 252.5 79 235 71.165 235 61.5 242.835 44 252.5 44zm2.475 12.904l-2.475 2.474-2.475-2.474a1.5 1.5 0 0 0-2.121 2.121l2.475 2.475-2.475 2.475a1.5 1.5 0 0 0 2.121 2.121l2.475-2.475 2.475 2.475a1.5 1.5 0 0 0 2.121-2.121l-2.475-2.475 2.475-2.475a1.5 1.5 0 0 0-2.121-2.121z"/></defs><g><g transform="translate(-235 -44)"><use fill="#fff" xlink:href="#s6cja"/></g></g></svg>
	</a>
</div>
<div class="sure-close">
	<a href="#" class="close">
		<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="35" height="35" viewBox="0 0 35 35"><defs><path id="s6cja" d="M252.5 44c9.665 0 17.5 7.835 17.5 17.5S262.165 79 252.5 79 235 71.165 235 61.5 242.835 44 252.5 44zm2.475 12.904l-2.475 2.474-2.475-2.474a1.5 1.5 0 0 0-2.121 2.121l2.475 2.475-2.475 2.475a1.5 1.5 0 0 0 2.121 2.121l2.475-2.475 2.475 2.475a1.5 1.5 0 0 0 2.121-2.121l-2.475-2.475 2.475-2.475a1.5 1.5 0 0 0-2.121-2.121z"/></defs><g><g transform="translate(-235 -44)"><use fill="#fff" xlink:href="#s6cja"/></g></g></svg>
	</a>
	<div class="to-save">
		<div class="title">
			Сохранить изменения <br> перед выходом?
		</div>
		<div><a href="#" class="save">Сохранить</a></div>
		<div><a href="#" class="not-save">Не сохранять</a></div>
		<div>
			<a href="#" class="continue">
				<div class="icon">
					<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="14" height="14" viewBox="0 0 14 14"><defs><path id="wvxma" d="M100.737 301.61l-2.04 2.045-.001.002c-2.445 2.45-4.892 4.897-7.343 7.342H88a.996.996 0 0 1-.202-.02.982.982 0 0 1-.28-.108 1 1 0 0 1-.326-.286 1.024 1.024 0 0 1-.064-.104A.983.983 0 0 1 87 310v-2.884l.005-.465a4675.94 4675.94 0 0 1 7.343-7.342l.009-.006 2.04-2.033a.938.938 0 0 1 .694-.286c.254.004.513.107.714.308l2.91 2.91c.402.402.412 1.032.022 1.408zm-5.654-.148zM89 307.402V309h1.606c1.98-2.025 3.96-4.05 5.937-6.078l-1.46-1.46c-2.03 1.978-4.057 3.959-6.083 5.94zm8.142-7.995l-.651.634 1.474 1.474.634-.65-1.457-1.458z"/></defs><g><g transform="translate(-87 -297)"><use fill="#828699" xlink:href="#wvxma"/></g></g></svg>
				</div>
				<span>Продолжить</span>
			</a>
		</div>
	</div>
</div>
<div class="add-works category-works" data-scrolls>
	<a href="#" class="close">
		<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="35" height="35" viewBox="0 0 35 35"><defs><path id="s6cja" d="M252.5 44c9.665 0 17.5 7.835 17.5 17.5S262.165 79 252.5 79 235 71.165 235 61.5 242.835 44 252.5 44zm2.475 12.904l-2.475 2.474-2.475-2.474a1.5 1.5 0 0 0-2.121 2.121l2.475 2.475-2.475 2.475a1.5 1.5 0 0 0 2.121 2.121l2.475-2.475 2.475 2.475a1.5 1.5 0 0 0 2.121-2.121l-2.475-2.475 2.475-2.475a1.5 1.5 0 0 0-2.121-2.121z"/></defs><g><g transform="translate(-235 -44)"><use fill="#fff" xlink:href="#s6cja"/></g></g></svg>
	</a>
	<div class="scrolled">
		<div class="add-works__title">
			Добавление работы в раздел: <span class="divide"></span><span class="check">›</span><span class="brand"></span>
		</div>
		<div class="add-works__info">
			<label>Раздел</label>
			<select name="razdel" class="select-razdel">
				<option selected disabled hidden>Выберите из списка</option>

                <? $categories = Categories::find()->orderBy('name')->all(); ?>

                <? foreach($categories as $category): ?>
                    <option value="<?=$category->id;?>"><?=$category->name;?></option>
                <? endforeach; ?>
                <!--
				<option value="Вентиляторы_крышные">Вентиляторы крышные</option>
				<option value="Вентиляторы_крышные">Вентиляторы крышные</option>
				<option value="Вентиляторы_крышные">Вентиляторы крышные</option>
				<option value="Вентиляторы_крышные">Вентиляторы крышные</option>
				<option value="Вентиляторы_крышные">Вентиляторы крышные</option>
				<option value="Вентиляторы_крышные">Вентиляторы крышные</option>
				<option value="Вентиляторы_крышные">Вентиляторы крышные</option>
				<option value="Вентиляторы_крышные">Вентиляторы крышные</option>
				<option value="Вентиляторы_крышные">Вентиляторы крышные</option>
				<option value="Вентиляторы_крышные">Вентиляторы крышные</option>
				<option value="Вентиляторы_крышные">Вентиляторы крышные</option>
				<option value="Вентиляторы_крышные">Вентиляторы крышные</option>
				-->
			</select>
		</div>
		<div class="add-works__info disabled">
			<label>Бренд</label>
			<select name="razdel" class="select-brand">
				<option selected disabled hidden>Выберите из списка</option>


                <? $brands = Brands::find()->orderBy('name')->all(); ?>

                <? foreach($brands as $brand): ?>
                    <option is_add_work_brand="yes" category_id="<?=$brand->category_id?>"  value="<?=$brand->id;?>"><?=$brand->name;?></option>
                <? endforeach; ?>

                <!--
				<option value="Вентиляторы_крышные">Вентиляторы крышные</option>
				<option value="Вентиляторы_крышные">Вентиляторы крышные</option>
				<option value="Вентиляторы_крышные">Вентиляторы крышные</option>
				<option value="Вентиляторы_крышные">Вентиляторы крышные</option>
				<option value="Вентиляторы_крышные">Вентиляторы крышные</option>
				<option value="Вентиляторы_крышные">Вентиляторы крышные</option>
				<option value="Вентиляторы_крышные">Вентиляторы крышные</option>
				<option value="Вентиляторы_крышные">Вентиляторы крышные</option>
				<option value="Вентиляторы_крышные">Вентиляторы крышные</option>
				<option value="Вентиляторы_крышные">Вентиляторы крышные</option>
				<option value="Вентиляторы_крышные">Вентиляторы крышные</option>
				<option value="Вентиляторы_крышные">Вентиляторы крышные</option>

				-->
			</select>
		</div>
		<div class="add-works__info">
			<label>Название работы</label>
			<input type="text">
		</div>
		<div class="add-works__info">
			<label>Должность сотрудника</label>
			<select name="razdel">
				<option selected disabled hidden>Выберите из списка</option>

                <? $worker_types = WorkerTypes::find()->orderBy('priority')->all(); ?>

                <? foreach($worker_types as $worker_type): ?>

				<option value="<?=$worker_type->id;?>"><?=$worker_type->name;?></option>

                <? endforeach; ?>
                <!--
				<option value="Вентиляторы_крышные">Вентиляторы крышные</option>
				<option value="Вентиляторы_крышные">Вентиляторы крышные</option>
				<option value="Вентиляторы_крышные">Вентиляторы крышные</option>
				<option value="Вентиляторы_крышные">Вентиляторы крышные</option>
				<option value="Вентиляторы_крышные">Вентиляторы крышные</option>
				<option value="Вентиляторы_крышные">Вентиляторы крышные</option>
				<option value="Вентиляторы_крышные">Вентиляторы крышные</option>
				<option value="Вентиляторы_крышные">Вентиляторы крышные</option>
				<option value="Вентиляторы_крышные">Вентиляторы крышные</option>
				<option value="Вентиляторы_крышные">Вентиляторы крышные</option>
				<option value="Вентиляторы_крышные">Вентиляторы крышные</option>

				-->
			</select>
		</div>
		<div class="add-works__info">
			<label>Приоритет</label>
			<select name="razdel">
				<option selected disabled hidden>Выберите из списка</option>

                <? $work_types = WorkTypes::find()->orderBy('priority')->all(); ?>

                <? foreach($work_types as $work_type): ?>

                    <option value="<?=$work_type->id;?>"><?=$work_type->name;?></option>

                <? endforeach; ?>
                <!--
				<option value="Вентиляторы_крышные">Вентиляторы крышные</option>
				<option value="Вентиляторы_крышные">Вентиляторы крышные</option>
				<option value="Вентиляторы_крышные">Вентиляторы крышные</option>
				-->
			</select>
		</div>
		<div class="add-works__info">
			<label>Периодичность</label>
			<select name="razdel">
				<option selected disabled hidden>Выберите из списка</option>

                <? $periods = Period::find()->orderBy('priority')->all(); ?>

                <? foreach($periods as $period): ?>

                    <option value="<?=$period->id;?>"><?=$period->name;?></option>

                <? endforeach; ?>


                <!--
				<option value="Вентиляторы_крышные">Вентиляторы крышные</option>
				<option value="Вентиляторы_крышные">Вентиляторы крышные</option>
				<option value="Вентиляторы_крышные">Вентиляторы крышные</option>
				<option value="Вентиляторы_крышные">Вентиляторы крышные</option>
				<option value="Вентиляторы_крышные">Вентиляторы крышные</option>
				<option value="Вентиляторы_крышные">Вентиляторы крышные</option>
				<option value="Вентиляторы_крышные">Вентиляторы крышные</option>
				<option value="Вентиляторы_крышные">Вентиляторы крышные</option>
				<option value="Вентиляторы_крышные">Вентиляторы крышные</option>
				<option value="Вентиляторы_крышные">Вентиляторы крышные</option>
				<option value="Вентиляторы_крышные">Вентиляторы крышные</option>
				<option value="Вентиляторы_крышные">Вентиляторы крышные</option>

				-->
			</select>
		</div>
		<div class="add-works__info">
			<label>Время выполнения</label>
			<div class="time-tabs">
				<div class="time-tabs-pane active">
					<input type="text">
				</div>
				<div class="time-tabs-nav">
					<button data-href="#minutes" class="active">минуты</button>
					<span>/</span>
					<button data-href="#hours">часы</button>
				</div>
			</div>
		</div>
		<div class="add-works__info-composition">
			<div class="composition">
				<div class="title-block">
					<label>Состав работы</label>
					<div class="input-button">
						<div class="input-area">
							<div class="number">1</div>
							<input type="text" placeholder="Введите название пункта">
						</div>
						<div class="buttons-area">
							<button class="add-descr">
								<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="14" height="14" viewBox="0 0 14 14"><defs><path id="a51ia" d="M598 959h-1v1a1 1 0 0 1-2 0v-1h-1a1 1 0 1 1 0-2h1v-1a1 1 0 0 1 2 0v1h1a1 1 0 1 1 0 2zm-8 0h-3v8h8v-3a1 1 0 1 1 2 0v4a1 1 0 0 1-1.029 1H586a1 1 0 0 1-1-1.04v-9.92-.04a1 1 0 0 1 1-1h4a1 1 0 1 1 0 2zm3 3h-4a1 1 0 1 1 0-2h4a1 1 0 1 1 0 2zm0 3h-4a1 1 0 0 1 0-2h4a1 1 0 1 1 0 2z"/></defs><g><g transform="translate(-585 -955)"><use fill="#6d67f9" xlink:href="#a51ia"/></g></g></svg>
								<span>Добавить описание</span>
							</button>
							<button class="add-photo">
								<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="18" height="14" viewBox="0 0 18 14"><defs><path id="j9cha" d="M810 680v10a1 1 0 0 1-1 1h-2.016v-.002A1 1 0 0 1 807 689h.5a.5.5 0 0 0 .5-.5v-7a.5.5 0 0 0-.5-.5h-3.329l-.585-.586L802.17 679h-2.343l-1.414 1.414-.586.586H794.5a.5.5 0 0 0-.5.5v7a.5.5 0 0 0 .5.5h.5a1 1 0 1 1 0 2h-2a1 1 0 0 1-1-1v-10a1 1 0 0 1 1-1h4l1.707-1.707a1 1 0 0 1 .707-.293h3.172a1 1 0 0 1 .707.293L805 679h4a1 1 0 0 1 1 1zm-9 4c-1.103 0-2 .897-2 2s.897 2 2 2 2-.897 2-2-.897-2-2-2c0 0 1.103 0 0 0zm0-2a4 4 0 1 1 0 8 4 4 0 0 1 0-8z"/></defs><g><g transform="translate(-792 -677)"><use fill="#6d67f9" xlink:href="#j9cha"/></g></g></svg>
								<span>Добавить фото</span>
							</button>
						</div>
					</div>
				</div>
				<div class="props-block">
					<div class="add-descr_block">
						<div class="quantity">
							<div class="title">Описание для <span>1</span> пункта</div>
							<a href="#" class="delete-all">Удалить описание</a>
						</div>
						<div class="files">
							<textarea></textarea>
						</div>
					</div>
					<div class="add-photo_block">
						<div class="quantity">
							<div class="title">Фотографии для <span>1</span> пункта</div>
							<a href="#" class="delete-all">Удалить все фото</a>
						</div>
						<div class="files">
							<div class="file">
								<label>
						          	<input type="file" name="file">
						          	<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="18" height="14" viewBox="0 0 18 14"><defs><path id="eqkwa" d="M805 1031v10a1 1 0 0 1-1 1h-2.016v-.002A1 1 0 0 1 802 1040h.5a.5.5 0 0 0 .5-.5v-7a.5.5 0 0 0-.5-.5h-3.329l-.585-.586-1.415-1.414h-2.343l-1.414 1.414-.586.586H789.5a.5.5 0 0 0-.5.5v7a.5.5 0 0 0 .5.5h.5a1 1 0 1 1 0 2h-2a1 1 0 0 1-1-1v-10a1 1 0 0 1 1-1h4l1.707-1.707a1 1 0 0 1 .707-.293h3.172a1 1 0 0 1 .707.293L800 1030h4a1 1 0 0 1 1 1zm-9 4c-1.103 0-2 .897-2 2s.897 2 2 2 2-.897 2-2-.897-2-2-2c0 0 1.103 0 0 0zm0-2a4 4 0 1 1 0 8 4 4 0 0 1 0-8z"/></defs><g><g transform="translate(-787 -1028)"><use fill="#939499" xlink:href="#eqkwa"/></g></g></svg>
						          	<span>Загрузить фото</span>
					     		</label>
							</div>
						</div>
					</div>
				</div>
			</div>



			<div class="composition hidens">
				<div class="title-block">
					<label>Состав работы</label>
					<div class="input-button">
						<div class="input-area">
							<div class="number">2</div>
							<input type="text" placeholder="Введите название пункта">
							<a href="#" class="delete-composition">
								<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="9" height="9" viewBox="0 0 9 9"><defs><path id="l6tfa" d="M706.026 1021.044a1 1 0 0 1-1.414 0l-2.121-2.122-2.144 2.144a1 1 0 1 1-1.414-1.414l2.143-2.144-2.12-2.12a1 1 0 1 1 1.413-1.415l2.122 2.121 2.099-2.1a1 1 0 0 1 1.414 1.415l-2.1 2.099 2.122 2.121a1 1 0 0 1 0 1.415z"/></defs><g><g transform="translate(-698 -1013)"><use fill="#232226" xlink:href="#l6tfa"/></g></g></svg>
							</a>
						</div>
						<div class="buttons-area">
							<button class="add-descr">
								<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="14" height="14" viewBox="0 0 14 14"><defs><path id="a51ia" d="M598 959h-1v1a1 1 0 0 1-2 0v-1h-1a1 1 0 1 1 0-2h1v-1a1 1 0 0 1 2 0v1h1a1 1 0 1 1 0 2zm-8 0h-3v8h8v-3a1 1 0 1 1 2 0v4a1 1 0 0 1-1.029 1H586a1 1 0 0 1-1-1.04v-9.92-.04a1 1 0 0 1 1-1h4a1 1 0 1 1 0 2zm3 3h-4a1 1 0 1 1 0-2h4a1 1 0 1 1 0 2zm0 3h-4a1 1 0 0 1 0-2h4a1 1 0 1 1 0 2z"/></defs><g><g transform="translate(-585 -955)"><use fill="#6d67f9" xlink:href="#a51ia"/></g></g></svg>
								<span>Добавить описание</span>
							</button>
							<button class="add-photo">
								<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="18" height="14" viewBox="0 0 18 14"><defs><path id="j9cha" d="M810 680v10a1 1 0 0 1-1 1h-2.016v-.002A1 1 0 0 1 807 689h.5a.5.5 0 0 0 .5-.5v-7a.5.5 0 0 0-.5-.5h-3.329l-.585-.586L802.17 679h-2.343l-1.414 1.414-.586.586H794.5a.5.5 0 0 0-.5.5v7a.5.5 0 0 0 .5.5h.5a1 1 0 1 1 0 2h-2a1 1 0 0 1-1-1v-10a1 1 0 0 1 1-1h4l1.707-1.707a1 1 0 0 1 .707-.293h3.172a1 1 0 0 1 .707.293L805 679h4a1 1 0 0 1 1 1zm-9 4c-1.103 0-2 .897-2 2s.897 2 2 2 2-.897 2-2-.897-2-2-2c0 0 1.103 0 0 0zm0-2a4 4 0 1 1 0 8 4 4 0 0 1 0-8z"/></defs><g><g transform="translate(-792 -677)"><use fill="#6d67f9" xlink:href="#j9cha"/></g></g></svg>
								<span>Добавить фото</span>
							</button>
						</div>
					</div>
				</div>
				<div class="props-block">
					<div class="add-descr_block">
						<div class="quantity">
							<div class="title">Описание для <span>2</span> пункта</div>
							<a href="#" class="delete-all">Удалить описание</a>
						</div>
						<div class="files">
							<textarea></textarea>
						</div>
					</div>
					<div class="add-photo_block">
						<div class="quantity">
							<div class="title">Фотографии для <span>2</span> пункта</div>
							<a href="#" class="delete-all">Удалить все фото</a>
						</div>
						<div class="files">
							<div class="file">
								<label>
						          	<input type="file" name="file">
						          	<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="18" height="14" viewBox="0 0 18 14"><defs><path id="eqkwa" d="M805 1031v10a1 1 0 0 1-1 1h-2.016v-.002A1 1 0 0 1 802 1040h.5a.5.5 0 0 0 .5-.5v-7a.5.5 0 0 0-.5-.5h-3.329l-.585-.586-1.415-1.414h-2.343l-1.414 1.414-.586.586H789.5a.5.5 0 0 0-.5.5v7a.5.5 0 0 0 .5.5h.5a1 1 0 1 1 0 2h-2a1 1 0 0 1-1-1v-10a1 1 0 0 1 1-1h4l1.707-1.707a1 1 0 0 1 .707-.293h3.172a1 1 0 0 1 .707.293L800 1030h4a1 1 0 0 1 1 1zm-9 4c-1.103 0-2 .897-2 2s.897 2 2 2 2-.897 2-2-.897-2-2-2c0 0 1.103 0 0 0zm0-2a4 4 0 1 1 0 8 4 4 0 0 1 0-8z"/></defs><g><g transform="translate(-787 -1028)"><use fill="#939499" xlink:href="#eqkwa"/></g></g></svg>
						          	<span>Загрузить фото</span>
					     		</label>
							</div>
						</div>
					</div>
				</div>

			</div>



		</div>
		<div class="add-works__info op">
			<label>Краткое описание <br>
				всего состава работы 
				<span>Информация для клиентов</span>
			</label>
			<!-- <input type="text"> -->
			<textarea></textarea>
		</div>
		<div class="add-works__info inp">
			<label>
				Форма отчетности <br> исполнителей
			</label>
			<div class="checks">

                <? $report_forms = ReportForms::find()->orderBy('priority')->all(); ?>
                <? foreach($report_forms as $report_form): ?>
				<div report_forms_id="<?=$report_form->id;?>">

					<input type="checkbox" id="<?=$report_form->symbole_code;?>" report_forms_id="<?=$report_form->id;?>">
					<label for="<?=$report_form->symbole_code;?>"><?=$report_form->name;?></label>
				</div>

                <? if($report_form->symbole_code == 'form'): ?>
                        <div class="new-form" report_forms_id="<?=$report_form->id;?>">

                            <div class="inputs">
                                <!--<input type="text" placeholder="Введите название поля"  report_forms_id="<?=$report_form->id;?>">-->
                            </div>

                            <a href="#" class="add-input">Добавить поле</a>
                        </div>
                <? endif; ?>

                <? endforeach; ?>

                <!--
				<div>
					<input type="checkbox" id="form">
					<label for="form">Форма ввода данных</label>
				</div>
				<div class="new-form">
					<div class="inputs">
						<input type="text" placeholder="Введите название поля">
					</div>
					<a href="#" class="add-input">Добавить поле</a>
				</div>
				<div>
					<input type="checkbox" id="gal">
					<label for="gal">Поставить галочку</label>
				</div>
				-->
			</div>
		</div>

        <form id="save-work-form" method="post" enctype="multipart/form-data" action="/works/update<?if(isset($_GET['brands_id']) && is_numeric($_GET['brands_id'])){echo '?brands_id='.$_GET['brands_id'];}?>">
            <div class="work-fields">
                <input type="hidden" name="brands_id">
                <input type="hidden" name="name">
                <input type="hidden" name="worker_types_id">
                <input type="hidden" name="work_types_id">
                <input type="hidden" name="period_id">
                <input type="hidden" name="execution_time">
                <input type="hidden" name="total_composition_description">
            </div>

            <div class="work-contents">
                <div class="work-contents-already-exits">
                </div>
                <div class="work-contents-to-add">
                </div>
            </div>


            <div class="work-report-forms">
            </div>

            <input type="hidden" name="<?=Yii::$app->getRequest()->csrfParam;?>" value="<?=Yii::$app->getRequest()->getCsrfToken();?>">

		    <div class="add-brands__button">
			    <button type="submit"><span>Сохранить работу</span></button>
		    </div>

        </form>
	</div>
</div>

<main class="main-wrapper baron">
	<div class="scroller" data-src style="max-height: 100vh" >
	<aside class="aside-menu">
			<div class="inner-block">
				<div class="aside-menu__top">
					<div class="aside-menu__title">
						<h1 class="aside-menu__title-h1" onclick="location.href = '/categories';">VENT_CRM</h1>
						<div class="aside-menu__title-version">v 0.1a</div>
					</div>
				</div>
				<div class="aside-menu__welcome">
					Добрый день, <span><?=Yii::$app->user->identity->full_name;?></span>
				</div>
				<nav class="aside-menu__menu">
					<ul>
						<li>

                            <?

                            $cat_index = strpos($_SERVER['REQUEST_URI'],'/categories');





                            if($cat_index !== FALSE){
                                $cat_active = 'active';
                            } else {
                                $cat_active = '';
                            }



                            $works_index = strpos($_SERVER['REQUEST_URI'],'/works');

                            if($works_index !== FALSE){
                                $work_active = 'active';
                            } else {
                                $work_active = '';
                            }

                            if(isset($_GET['brands_id']) && is_numeric((int)$_GET['brands_id'])){
                                $brand_main_layout = Brands::findOne((int)$_GET['brands_id']);
                                if($brand_main_layout){
                                    $work_plus_attrs_string = 'categories_id="'.$brand_main_layout->category_id.'"" brands_id="'.$brand_main_layout->id.'""';
                                } else {
                                    $work_plus_attrs_string = '';
                                }
                            } else {
                                $work_plus_attrs_string = '';
                            }



                            ?>
                            
							<a href="/categories" class="<?=$cat_active;?> cat">
								<span class="line"></span>
								<div class="content">
									<div class="icon">
										<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="21" height="15" viewBox="0 0 21 15"><defs><path id="acmda" d="M31.5 238.999a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3zm0 6a1.5 1.5 0 1 1-.001 3 1.5 1.5 0 0 1 0-3zm0 6a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3zm5.5-12h13a1 1 0 0 1 1 1v1a1 1 0 0 1-1 1H37a1 1 0 0 1-1-1v-1a1 1 0 0 1 1-1zm0 6h13a1 1 0 0 1 1 1v1a1 1 0 0 1-1 1H37a1 1 0 0 1-1-1v-1a1 1 0 0 1 1-1zm0 6h13a1 1 0 0 1 1 1v1A1 1 0 0 1 50 254H37a1 1 0 0 1-1-1v-1a1 1 0 0 1 1-1z"/></defs><g><g transform="translate(-30 -239)"><use fill="#fff" xlink:href="#acmda"/></g></g></svg>
									</div>
									<span>Категории</span>
									<div class="plus" onclick="$('.add-brands .add-brands__title').text('Добавление категории');  clearInputCategoryAndBrand(); CategoryEditControlObject.rememberFields();">
										<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="13" height="13" viewBox="0 0 13 13"><defs><path id="2ehra" d="M252.5 315a1.5 1.5 0 0 1 1.5 1.5v3.5h3.5a1.5 1.5 0 0 1 0 3H254v3.5a1.5 1.5 0 0 1-3 0V323h-3.5a1.5 1.5 0 0 1 0-3h3.5v-3.5a1.5 1.5 0 0 1 1.5-1.5z"/></defs><g><g transform="translate(-246 -315)"><use fill="#fff" xlink:href="#2ehra"/></g></g></svg>
									</div>
								</div>
							</a>
						</li>
						<li>
							<a href="/works" class="<?=$work_active;?> work">
								<span class="line"></span>
								<div class="content">
									<div class="icon">
										<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="19" height="25" viewBox="0 0 19 25"><defs><path id="lzbda" d="M46.256 325.67L46.25 333a1 1 0 0 1-1 1h-1a1 1 0 0 1-1-1l.006-8.893.668-.445a6.413 6.413 0 0 0 2.872-5.342 6.44 6.44 0 0 0-2.1-4.736v3.926a2.463 2.463 0 0 1-2.46 2.46h-3.48a2.463 2.463 0 0 1-2.46-2.46v-3.926a6.44 6.44 0 0 0-2.1 4.736 6.413 6.413 0 0 0 2.872 5.342l.668.445.014 8.893a1 1 0 0 1-1 1h-1a1 1 0 0 1-1-1l-.014-7.33a9.399 9.399 0 0 1-3.54-7.35c0-3.635 2.137-6.984 5.443-8.534l.075-.035.078-.027c.27-.092.518-.137.757-.137.996 0 1.747.775 1.747 1.803v5.58h2.4v-5.58c0-1.028.751-1.803 1.747-1.803.24 0 .487.045.757.137l.079.027.074.035c3.307 1.55 5.443 4.9 5.443 8.534a9.399 9.399 0 0 1-3.54 7.35z"/></defs><g><g transform="translate(-31 -309)"><use fill="#fff" xlink:href="#lzbda"/></g></g></svg>
									</div>
									<span>Работы</span>
									<div class="plus" <?=$work_plus_attrs_string;?> onclick="<?if($work_plus_attrs_string == ''):?>setWorkTitleOnAddWork();<? else: ?>setWorkTitleOnAddWorkToBrand();<?endif; ?>WorksEditControlObject.rememberFields();">
										<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="13" height="13" viewBox="0 0 13 13"><defs><path id="2ehra" d="M252.5 315a1.5 1.5 0 0 1 1.5 1.5v3.5h3.5a1.5 1.5 0 0 1 0 3H254v3.5a1.5 1.5 0 0 1-3 0V323h-3.5a1.5 1.5 0 0 1 0-3h3.5v-3.5a1.5 1.5 0 0 1 1.5-1.5z"/></defs><g><g transform="translate(-246 -315)"><use fill="#fff" xlink:href="#2ehra"/></g></g></svg>
									</div>
								</div>
							</a>
						</li>
					</ul>
				</nav>
				<a href="/site/logout" class="aside-menu__exit">
					<div class="icon">
						<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="16" height="16" viewBox="0 0 16 16"><defs><path id="8k2ka" d="M60.707 911.292l-2-2a1 1 0 1 0-1.414 1.414l.293.293H55a1 1 0 1 0 0 2h2.586l-.293.293a1 1 0 1 0 1.414 1.414l2-2a.997.997 0 0 0 0-1.414zM59 906a1 1 0 0 0-1-1H46a1 1 0 0 0-1 1v11c0 .173.055.327.131.468.011.019.024.034.036.053a.978.978 0 0 0 .327.322l-.009.015 5 3 .01-.015c.15.09.316.157.505.157a1 1 0 0 0 1-1v-1h6a1 1 0 0 0 0-2h-6v-8a.986.986 0 0 0-.494-.843l.008-.014-1.904-1.143H58a1 1 0 0 0 1-1z"/></defs><g><g transform="translate(-45 -905)"><use fill="#48474d" xlink:href="#8k2ka"/></g></g></svg>
					</div>
					<span>Выйти</span>
				</a>
				<a href="#" class="aside-menu__up">
					<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="13" height="13" viewBox="0 0 13 13"><defs><path id="gr8pa" d="M254 917.5a1.5 1.5 0 0 1-3 0v-6.41l-1.972 1.972a1.5 1.5 0 0 1-2.122-2.121l4.4-4.4a1.496 1.496 0 0 1 1.178-.563 1.496 1.496 0 0 1 1.178.563l4.4 4.4a1.5 1.5 0 1 1-2.12 2.121L254 911.121z"/></defs><g><g transform="translate(-246 -906)"><use fill="#fff" xlink:href="#gr8pa"/></g></g></svg>
				</a>
			</div>
</aside>

<div class="main-content">

	<? echo $content; ?>

</div>

	</div>
	<div class="scroller__track"><!-- Track is optional -->
        <div class="scroller__bar"></div>
    </div>
</main>

<div class="hidden"></div>
<script src="/libs/jcfilter.js"></script>
<script src="/libs/jquery.mCustomScrollbar.js"></script>
<script src="/libs/jquery.formstyler.min.js"></script>
<script src="/libs/baron.js"></script>
<script src="/libs/jquery.jscrollpane.min.js"></script>
<script src="/libs/jquery.mousewheel.js"></script>
<script src="libs/sortElements.js"></script>
<script src="/js/common.js"></script>

<!--<script src="libs/jquery/jquery-2.1.3.min.js"></script>-->
<!--<script src="libs/jcfilter.js"></script>
<!--<script src="libs/jquery.mCustomScrollbar.js"></script>-->
<!--<script src="libs/jquery.formstyler.min.js"></script>-->
<!--<script src="libs/baron.js"></script>-->
<!--<script src="libs/jquery.jscrollpane.min.js"></script>-->
<!--<script src="libs/jquery.mousewheel.js"></script>-->

<!--<script src="js/common.js"></script>-->











<script type="text/javascript">



    function clearInputCategoryAndBrand(){
        $('.add-brands__input input[name="name"]').val('');
        $('.add-brands__input input[name="brand_name"]').val('');
        $('.last-brand__input input[name="last_brand_id"]').val('');

        $('.add-brands__input input[name="name"]').attr('readonly',false).attr('to_edit','');
        $('.add-brands__input input[name="brand_name"]').attr('readonly',false);
    }

    function getAjaxCategoryName(category_id){

        $('.add-brands__input input[name="name"]').val('');
        $('.add-brands__input input[name="brand_name"]').val('');

        $.ajax({
            type: "POST",
            url: "<?=Yii::$app->urlManager->createUrl('categories/get-ajax-category-name')?>" + "?id=" + category_id,
            data: {<?=Yii::$app->getRequest()->csrfParam;?>:'<?=Yii::$app->getRequest()->getCsrfToken();?>'},
            success: function(data){
                $('.add-brands__input input[name="name"]').attr('readonly',false).attr('category_id',category_id).attr('to_edit','').val(data);
                $('.add-brands__input input[name="brand_name"]').attr('readonly',false).attr('brand_id',null).val('');
                $('.last-brand__input input[name="last_brand_id"]').val('');

                CategoryEditControlObject.rememberFields();
            },
            //dataType: dataType
        });
    }



    function getAjaxCategoryNameToEdit(category_id){

        $('.add-brands__input input[name="name"]').val('');
        $('.add-brands__input input[name="brand_name"]').val('');

        $.ajax({
            type: "POST",
            url: "<?=Yii::$app->urlManager->createUrl('categories/get-ajax-category-name')?>" + "?id=" + category_id,
            data: {<?=Yii::$app->getRequest()->csrfParam;?>:'<?=Yii::$app->getRequest()->getCsrfToken();?>'},
        success: function(data){
            $('.add-brands__input input[name="name"]').attr('readonly',false).attr('category_id',category_id).attr('to_edit','true').val(data);
            $('.add-brands__input input[name="brand_name"]').attr('readonly',false).attr('brand_id',null).val('');
            $('.last-brand__input input[name="last_brand_id"]').val('');

            CategoryEditControlObject.rememberFields();
        },
        //dataType: dataType
    });
    }




    function getAjaxCategoryNameToAddBrand(category_id){

        $('.add-brands__input input[name="name"]').val('');
        $('.add-brands__input input[name="brand_name"]').val('');

        $.ajax({
            type: "POST",
            url: "<?=Yii::$app->urlManager->createUrl('categories/get-ajax-category-name')?>" + "?id=" + category_id,
            data: {<?=Yii::$app->getRequest()->csrfParam;?>:'<?=Yii::$app->getRequest()->getCsrfToken();?>'},
        success: function(data){
            $('.add-brands__input input[name="name"]').attr('readonly',true).attr('category_id',category_id).attr('to_edit','').val(data);
            $('.add-brands__input input[name="brand_name"]').attr('readonly',false).attr('brand_id',null).val('');
            $('.last-brand__input input[name="last_brand_id"]').val('');

            CategoryEditControlObject.rememberFields();
        },
        //dataType: dataType
        });
    }





    function getAjaxBrandName(brand_id){

        $('.add-brands__input input[name="name"]').val('');
        $('.add-brands__input input[name="brand_name"]').val('');
        $.ajax({
            type: "POST",
            url: "<?=Yii::$app->urlManager->createUrl('categories/get-ajax-brand-name')?>" + "?id=" + brand_id,
            data: {<?=Yii::$app->getRequest()->csrfParam;?>:'<?=Yii::$app->getRequest()->getCsrfToken();?>'},
        success: function(data){

            $('.add-brands__input input[name="name"]').attr('readonly',true).attr('category_id',data.category_id).attr('to_edit','').val(data.category_name);
            $('.add-brands__input input[name="brand_name"]').attr('readonly',false).attr('brand_id',brand_id).val(data.brand_name);
            $('.last-brand__input input[name="last_brand_id"]').val('');

            CategoryEditControlObject.rememberFields();
        },
        dataType: 'json'
    });
    }

    function getAjaxBrandNameToCopyBrand(brand_id){

        $('.add-brands__input input[name="name"]').val('');
        $('.add-brands__input input[name="brand_name"]').val('');
        $.ajax({
            type: "POST",
            url: "<?=Yii::$app->urlManager->createUrl('categories/get-ajax-brand-name')?>" + "?id=" + brand_id,
            data: {<?=Yii::$app->getRequest()->csrfParam;?>:'<?=Yii::$app->getRequest()->getCsrfToken();?>'},
        success: function(data){

            $('.add-brands__input input[name="name"]').attr('readonly',true).attr('category_id',data.category_id).attr('to_edit','').val(data.category_name);
            $('.add-brands__input input[name="brand_name"]').attr('readonly',false).attr('brand_id',null).val(data.brand_name);
            $('.last-brand__input input[name="last_brand_id"]').val(brand_id);

            CategoryEditControlObject.rememberFields();
        },
        dataType: 'json'
    });
    }

    function setElementCategoryName(element){
        $('.add-brands__input input[name="name"]').val('');
        $('.add-brands__input input[name="brand_name"]').val('');
        $('.last-brand__input input[name="last_brand_id"]').val('');

        var category_id = $(element).attr('category_id');
        getAjaxCategoryName(category_id);
    }


    function setElementCategoryNameToEdit(element){
        $('.add-brands__input input[name="name"]').val('');
        $('.add-brands__input input[name="brand_name"]').val('');
        $('.last-brand__input input[name="last_brand_id"]').val('');

        var category_id = $(element).attr('category_id');
        getAjaxCategoryNameToEdit(category_id);
    }


    function setElementBrandName(element){
        $('.add-brands__input input[name="name"]').val('');
        $('.add-brands__input input[name="brand_name"]').val('');
        $('.last-brand__input input[name="last_brand_id"]').val('');

        var brand_id = $(element).attr('brand_id');
        getAjaxBrandName(brand_id);
    }

    function setElementBrandNameOnCopy(element){
        $('.add-brands__input input[name="name"]').val('');
        $('.add-brands__input input[name="brand_name"]').val('');
        $('.last-brand__input input[name="last_brand_id"]').val('');

        var brand_id = $(element).attr('brand_id');
        getAjaxBrandNameToCopyBrand(brand_id);
    }

    function addCategoryBrand(element){
        $('.add-brands__input input[name="name"]').val('');
        $('.add-brands__input input[name="brand_name"]').val('');
        $('.last-brand__input input[name="last_brand_id"]').val('');

        var category_id = $(element).attr('category_id');
        getAjaxCategoryNameToAddBrand(category_id);
    }

    function deleteBrand(element){
        var brand_id = $(element).attr('brand_id');

        $.ajax({
            type: "POST",
            url: "<?=Yii::$app->urlManager->createUrl('categories/delete-brand')?>" + "?id=" + brand_id,
            data: {<?=Yii::$app->getRequest()->csrfParam;?>:
        '<?=Yii::$app->getRequest()->getCsrfToken();?>'
        },
        success: function (data) {



            //$('.add-brands__input input[name="name"]').attr('readonly',true).attr('category_id',data.category_id).val(data.category_name);
            //$('.add-brands__input input[name="brand_name"]').attr('readonly',false).attr('brand_id',brand_id).val(data.brand_name);
        }//,
        //dataType: 'json'
        });
    }

    function deleteCategory(element){
        var category_id = $(element).attr('category_id');

        $.ajax({
            type: "POST",
            url: "<?=Yii::$app->urlManager->createUrl('categories/delete')?>" + "?id=" + category_id,
            data: {<?=Yii::$app->getRequest()->csrfParam;?>:
        '<?=Yii::$app->getRequest()->getCsrfToken();?>'
    },
        success: function (data) {

                location.reload();

            //$('.add-brands__input input[name="name"]').attr('readonly',true).attr('category_id',data.category_id).val(data.category_name);
            //$('.add-brands__input input[name="brand_name"]').attr('readonly',false).attr('brand_id',brand_id).val(data.brand_name);
        }//,
        //dataType: 'json'
    });
    }

	$('#save-category').unbind('click').click(function(){

        $('.add-brands__input input[name="name"]').attr('readonly',false);
        $('.add-brands__input input[name="brand_name"]').attr('readonly',false);

        if(!$('.add-brands__input input[name="name"]').attr('category_id')) {
            $.post('<?=Yii::$app->urlManager->createUrl('categories/create')?>', {
                name: $(".add-brands input[name='name']").eq(0).val(),
                brand_name: $(".add-brands input[name='brand_name']").eq(0).val(),
                last_brand_id: $('.last-brand__input input[name="last_brand_id"]').val(),
            <?=Yii::$app->getRequest()->csrfParam;?>:
            '<?=Yii::$app->getRequest()->getCsrfToken();?>'
            }).
            done(function () {
                location.reload();
            });
        } else if(!$('.add-brands__input input[name="brand_name"]').attr('brand_id') && $('.add-brands__input input[name="name"]').attr('to_edit') != 'true'){

            $.post("<?=Yii::$app->urlManager->createUrl('categories/add-brand')?>" + "?id=" + $('.add-brands__input input[name="name"]').attr('category_id'), {

                brand_name: $(".add-brands input[name='brand_name']").eq(0).val(),
                last_brand_id: $('.last-brand__input input[name="last_brand_id"]').val(),

                <?=Yii::$app->getRequest()->csrfParam;?>:
                '<?=Yii::$app->getRequest()->getCsrfToken();?>'
            }).
            done(function () {
                location.reload();
            });



        } else {

            $('.add-brands__input input[name="name"]').attr('readonly',true);

            $.post("<?=Yii::$app->urlManager->createUrl('categories/update')?>" + "?id=" + $('.add-brands__input input[name="name"]').attr('category_id'), {
                name: $(".add-brands input[name='name']").eq(0).val(),
                brand_name: $(".add-brands input[name='brand_name']").eq(0).val(),
                brand_id: $('.add-brands__input input[name="brand_name"]').attr('brand_id'),
                last_brand_id: $('.last-brand__input input[name="last_brand_id"]').val(),
            <?=Yii::$app->getRequest()->csrfParam;?>:
            '<?=Yii::$app->getRequest()->getCsrfToken();?>'
            }).
            done(function () {
                location.reload();
            });
        }
	});



    //$('body').on('click','.sure-closes', function(e){
        //$('.add-brands__input input[name="name"]').attr('readonly',false);
        //$('.add-brands__input input[name="brand_name"]').attr('readonly',false);
    //});


    function getSelectedCategoryId() {
        var result = null;

        $('.select-razdel .jq-selectbox__dropdown ul li').each(function (index) {
            if (result) {
                return;
            }

            if ($(this).hasClass('selected') && index>0) {
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

            if ($(this).hasClass('selected') && index>0) {
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

            if ($(this).hasClass('selected') && index>0) {
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

            if ($(this).hasClass('selected') && index>0) {
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

            if ($(this).hasClass('selected') && index>0) {
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
        if (category_id) {
            $('.add-works__info').eq(0).find('.jq-selectbox__select').addClass('change-select');
        } else {
            $('.add-works__info').eq(0).find('.jq-selectbox__select').removeClass('change-select');
        }
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
        if (brand_id) {
            $('.add-works__info').eq(1).find('.jq-selectbox__select').addClass('change-select');
        } else{
            $('.add-works__info').eq(1).find('.jq-selectbox__select').removeClass('change-select');
        }
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

        if (worker_types_id) {
            $('.add-works__info').eq(3).find('.jq-selectbox__select').addClass('change-select');
        } else {
            $('.add-works__info').eq(3).find('.jq-selectbox__select').removeClass('change-select');
        }
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


        if (work_types_id) {
            $('.add-works__info').eq(4).find('.jq-selectbox__select').addClass('change-select');
        } else {
            $('.add-works__info').eq(4).find('.jq-selectbox__select').removeClass('change-select');
        }
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


        if (period_id) {
            $('.add-works__info').eq(5).find('.jq-selectbox__select').addClass('change-select');
        } else {
            $('.add-works__info').eq(5).find('.jq-selectbox__select').removeClass('change-select');
        }


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

        $('.work-contents-to-add').append('<div class="work_contents_photos"></div>');

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

        $('.add-works__info .new-form .inputs>div>input').each(function () {
            var report_forms_id = $(this).parent().parent().parent().attr('report_forms_id');
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

            $('.add-works__info-composition>div').eq(0).find('input').eq(0).val('');

            $('.add-works__info-composition>div').eq(0).find('textarea').eq(0).val('');


            var files_count = $('.add-works__info-composition>div').eq(0).find('.file').length;

            $('.add-works__info-composition>div').eq(0).find('.file').each(function(index){

                if(index == files_count - 1){
                   return;
                }

                $(this).remove();
            });


        }









        $('.add-works__info-composition>div').eq(0).find('.delete-composition').remove();



        $('.add-works__info-composition>div').find('.add-descr_block').css('display','');

        $('.add-works__info-composition>div').find('.add-descr').removeClass('non-active');

        $('.add-works__info-composition>div').find('.add-photo_block').css('display','');

        $('.add-works__info-composition>div').find('.add-photo').removeClass('non-active');

        renumerateCompositions();

        $('.add-works__info.inp input').prop('checked', false);

        $('.add-works__info.inp .new-form .inputs input').remove();


        $('.error-type').removeClass('error-type');


        SAVE_WORK_BUTTON_CLICKED = false;
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

            if ($(this).attr('name') == 'execution_time') {
                return;
            }

            if (!$(this).val() || $(this).val() == '' || $(this).val() == 0) {
                result = false;
            }
        });

        var checked_report_forms_count = $('#save-work-form .work-report-forms .checked_report_forms input').length;

        if(!checked_report_forms_count){
            result = false;
        }

        return result;
    }


    function getFormToSendEmptyRequiredFields(){
        var result = [];

        $('#save-work-form .work-fields input').each(function () {

            if ($(this).attr('name') == 'total_composition_description') {
                return;
            }

            if ($(this).attr('name') == 'execution_time') {
                return;
            }

            if (!$(this).val() || $(this).val() == '' || $(this).val() == 0) {
                var self = this;
                result.push($(self).attr('name'));
            }
        });

        var checked_report_forms_count = $('#save-work-form .work-report-forms .checked_report_forms input').length;

        if(!checked_report_forms_count){
            result.push('checked_report_forms');
        }

        if(!getSelectedCategoryId()){
            result.push('categories_id');
        }

        return result;
    }

    function toBorderEmptyRequiredFields(){

        $('.error-type').removeClass('error-type');


        /*
        $('select').styler({
            selectSmartPositioning: false,
            selectVisibleOptions: 10,
            onSelectOpened: function() {

                $(this).find('.jq-selectbox__select').addClass('active');
                $(this).find('.jq-selectbox__select').append('<div class="shadow"></div>');
                let height = $(this).find('.jq-selectbox__select').height() + $(this).find(".jq-selectbox__dropdown").height();
                if ($(this).hasClass('error-type')) {
                    $(this).find('.shadow').css({
                        'height': height,
                        'width': '100%',
                        'position': 'absolute',
                        'top': '0px',
                        'left': '0px',
                        'border-radius': '2px',
                        'box-shadow': '0 0 6px #ff4019'

                    });
                } else {
                    $(this).find('.shadow').css({
                        'height': height,
                        'width': '100%',
                        'position': 'absolute',
                        'top': '0px',
                        'left': '0px',
                        'border-radius': '2px',
                        'box-shadow': '0 0 6px #6d67f9'
                    });
                }

                $(this).find(".jq-selectbox__dropdown ul").mCustomScrollbar({mouseWheelPixels: 300, scrollInertia: 100});
                let self = $(this);
                $(this).find('select').change(function(){
                    self.find('.jq-selectbox__select').addClass('change-select');
                });
                $('.select-razdel').find('.jq-selectbox__dropdown ul li').click(function(){
                    $('.select-brand').parents('.add-works__info').removeClass('disabled');
                });
            },
            onSelectClosed: function() {
                $(this).find('.jq-selectbox__select').removeClass('active');
                $(this).find(".jq-selectbox__dropdown ul").mCustomScrollbar("destroy");
                $(this).find('.jq-selectbox__select').find('.shadow').remove();
            }
        });

*/


        var emptyRequiredFields = getFormToSendEmptyRequiredFields();

        $.each(emptyRequiredFields, function(i,val){
           switch(val){
               case 'categories_id': $('.add-works__info').eq(0).addClass('error-type');break;
               case 'brands_id': $('.add-works__info').eq(1).addClass('error-type');break;
               case 'name': $('.add-works__info').eq(2).find('input').addClass('error-type');break;//.css('border-color','red').css('border','2px solid red');break;
               case 'worker_types_id': $('.add-works__info').eq(3).addClass('error-type');break;
               case 'work_types_id': $('.add-works__info').eq(4).addClass('error-type');break;
               case 'period_id': $('.add-works__info').eq(5).addClass('error-type');break;
               case 'checked_report_forms': $('.add-works__info').eq(8).find('label').addClass('error-type');break;
               //case 'execution_time': $('.time-tabs-pane').eq(0).addClass('empty-required-field');break;
               default: break;
           }
        });

        /*
        $('select').styler();
        $('select').styler({
            selectSmartPositioning: false,
            selectVisibleOptions: 10,
            onSelectOpened: function() {

                $(this).find('.jq-selectbox__select').addClass('active');
                $(this).find('.jq-selectbox__select').append('<div class="shadow"></div>');
                let height = $(this).find('.jq-selectbox__select').height() + $(this).find(".jq-selectbox__dropdown").height();
                if ($(this).hasClass('error-type')) {
                    $(this).find('.shadow').css({
                        'height': height,
                        'width': '100%',
                        'position': 'absolute',
                        'top': '0px',
                        'left': '0px',
                        'border-radius': '2px',
                        'box-shadow': '0 0 6px #ff4019'

                    });
                } else {
                    $(this).find('.shadow').css({
                        'height': height,
                        'width': '100%',
                        'position': 'absolute',
                        'top': '0px',
                        'left': '0px',
                        'border-radius': '2px',
                        'box-shadow': '0 0 6px #6d67f9'
                    });
                }

                $(this).find(".jq-selectbox__dropdown ul").mCustomScrollbar({mouseWheelPixels: 300, scrollInertia: 100});
                let self = $(this);
                $(this).find('select').change(function(){
                    self.find('.jq-selectbox__select').addClass('change-select');
                });
                $('.select-razdel').find('.jq-selectbox__dropdown ul li').click(function(){
                    $('.select-brand').parents('.add-works__info').removeClass('disabled');
                });
            },
            onSelectClosed: function() {
                $(this).find('.jq-selectbox__select').removeClass('active');
                $(this).find(".jq-selectbox__dropdown ul").mCustomScrollbar("destroy");
                $(this).find('.jq-selectbox__select').find('.shadow').remove();
            }
        });

        */



    }

    function removeIdToFormToSend(){

        if(window.current_brands_id) {
            $('#save-work-form').attr('action', '/works/update?brands_id=' + current_brands_id);
        }
    }

    function setWorkTitleOnAddWorkToBrand(){

        var removed = $('.add-works__title').children().remove();

        $('.add-works__title').text('Добавление работы в раздел  ');

        $('.add-works__title').append(removed);
    }

    function setWorkTitleOnAddWork(){


        var removed = $('.add-works__title').children().remove();


        $('.add-works__title').text('Добавление работы в раздел ');


        $('.add-works__title').append(removed);


        setTimeout(function(){
            $('.add-works__title .divide, .add-works__title .brand').text('');
        },100)


    }

    function setWorkTitleOnEditWork(){

        var removed = $('.add-works__title').children().remove();

        $('.add-works__title').text('Редактирование работы в разделе   ');

        $('.add-works__title').append(removed);
    }


    function copySubmitEventEditedWork(){
        var click_element = $('#save-work-form button[type="submit"]').eq(0);
        click_element.click();
    }


    //rememberFields
    //rememberFieldsAfterEditing
    //noChanges
    var WorksEditControl = function(){

        var fieldsRemembered = {
            category_id:0,
            brands_id:0,
            name:'',
            worker_types_id:0,
            work_types_id:0,
            period_id:0,
            execution_time:0,
            total_composition_description:'',

            compositions_already_exists:[
                //{work_contents_id:work_contents_id, name:'name', description:'description', work_contents_photo_ids:[1,2,3], selected_photos_exists:true}
            ],


            new_compositions_exists: false,

            report_forms: {
                //work_report_forms_id:['field1_name','field2_name']
            }

        };

        var fieldsAfterEditing = {
            category_id:0,
            brands_id:0,
            name:'',
            worker_types_id:0,
            work_types_id:0,
            period_id:0,
            execution_time:0,
            total_composition_description:'',

            compositions_already_exists:[
                //{work_contents_id:work_contents_id, name:'name', description:'description', work_contents_photo_ids:[1,2,3], new_photos_exists:true}
            ],

            new_compositions_exists: false,

            report_forms: {
                //work_report_forms_id:['field1_name','field2_name']
            }
        };


        var self = this;


        var getWorkEditFormScan = function(){
            var result = {
                category_id : getSelectedCategoryId(),
                brands_id : getSelectedBrandId(),
                name : $('.add-works__info').eq(2).find('input').val(),
                work_types_id : getSelectedWorkTypeId(),
                worker_types_id : getSelectedWorkerTypeId(),
                execution_time: getWorkTimeInMinutes()
            };


            var compositions_already_exists = [

            ];




            $('.add-works__info-composition>.composition').each(function () {

                if (!$(this).attr('work_contents_id')) {
                    return;
                }

                var work_contents_id = $(this).attr('work_contents_id');
                var name = $(this).find('input').eq(0).val();
                var description = $(this).find('.add-descr_block textarea').eq(0).val();


                //var image_inputs = [];

                var new_photos_exists = false;

                //var self = $(this);

                $(this).find('.add-photo_block .files .file').each(function () {

                    if(new_photos_exists){
                        return;
                    }

                    if (!$(this).attr('work_contents_photo_id') && $(this).find('input').eq(0)[0].files.length) {
                        //image_inputs.push($(this).find('input').eq(0).clone());

                        new_photos_exists = true;
                    }
                });




                var image_ids = [];

                //var self = this;

                $(this).find('.add-photo_block .files .file').each(function () {
                    if ($(this).attr('work_contents_photo_id')) {
                        image_ids.push($(this).attr('work_contents_photo_id'));
                    }
                });

                compositions_already_exists.push({
                    work_contents_id: work_contents_id,
                    name : name,
                    description: description,
                    work_contents_photo_ids:image_ids,
                    new_photos_exists:new_photos_exists
                });

            });


            result.compositions_already_exists = compositions_already_exists;


            var new_compositions_exists = false;

            $('.add-works__info-composition>.composition').each(function(index) {


                if(new_compositions_exists){
                    return;
                }

                if (!$(this).attr('work_contents_id')) {


                    //work_contents_index++;


                    //var work_contents_id = $(this).attr('work_contents_id');
                    var name = $(this).find('input').eq(0).val();

                    if(name != ''){
                        new_compositions_exists = true;
                        return;
                    }

                    var description = $(this).find('.add-descr_block textarea').eq(0).val();

                    if(description != ''){
                        new_compositions_exists = true;
                        return;
                    }

                    //var image_inputs = [];

                    var new_images_exists = false;

                    //var self = $(this);

                    $(this).find('.add-photo_block .files .file').each(function() {

                        if(new_images_exists){
                            return;
                        }

                        if (!$(this).attr('work_contents_photo_id') && $(this).find('input').eq(0)[0].files.length) {
                            new_images_exists = true;
                        }
                    });


                    if(new_images_exists){
                        new_compositions_exists = true;
                        return;
                    }

                }

            });

            result.new_compositions_exists = new_compositions_exists;


            var report_forms = {};

            var checked_report_forms = getReportFormsIds();


            $.each(checked_report_forms, function(i,val){
                report_forms[val] = [];
            });



            $('.add-works__info .new-form .inputs>div>input').each(function () {
                var report_forms_id = $(this).parent().parent().parent().attr('report_forms_id');
                var name = $(this).val();
                var found = false;

                $.each(checked_report_forms, function (i, val) {
                    if (val == report_forms_id) {
                        found = true;
                    }
                });


                if (found) {

                    report_forms[report_forms_id].push(name);
                }


            });


            result.report_forms = report_forms;

            return result;

        };

        this.rememberFields = function(){
            fieldsRemembered = getWorkEditFormScan();
        };


        this.rememberFieldsAfterEditing = function(){
            fieldsAfterEditing = getWorkEditFormScan();
        };


        var inArrayKeys = function(value,arr){
            for(var i in arr){
                if(i == value){
                    return true;
                }
            }

            return false;
        };

        var inArray = function(value, arr){
            for(var i in arr){
                if(arr[i] == value){
                    return true;
                }
            }

            return false;
        };

        var arrayKeysAreIdentical = function(arr1,arr2){
            if(arr1.length != arr2.length){
                return false;
            }

            for(var i in arr1){
                if(!inArrayKeys(i,arr2)){
                    return false;
                }
            }

            for(var i in arr2){
                if(!inArrayKeys(i,arr1)){
                    return false;
                }
            }

            return true;
        };

        var arraysAreIdentical = function(arr1,arr2){
            if(arr1.length != arr2.length){
                return false;
            }

            for(var i in arr1){
                if(!inArray(arr1[i],arr2)){
                    return false;
                }
            }

            for(var i in arr2){
                if(!inArrayKeys(arr2[i],arr1)){
                    return false;
                }
            }

            return true;
        };

        var arrayValuesAreIdentical = function(arr1,arr2){
            if(arr1.length != arr2.length){
                return false;
            }

            for(var i in arr1){
                if(arr1[i] != arr2[i]){
                    return false;
                }
            }

            for(var i in arr2){
                if(arr2[i] != arr1[i]){
                    return false;
                }
            }

            return true;
        };


        var reportFormsAreIdentical = function(){

            var report_forms_1 = fieldsRemembered.report_forms;
            var report_forms_2 = fieldsAfterEditing.report_forms;

            if(!arrayKeysAreIdentical(report_forms_1, report_forms_2)){
                return false;
            }

            for(var i in report_forms_1) {

                if(!arrayValuesAreIdentical(report_forms_1[i], report_forms_2[i])){
                    return false;
                }

            }

            return true;
        };


        var compositionsAreIdentical = function(){

            var compositions1 = fieldsRemembered.compositions_already_exists;

            var compositions2 = fieldsAfterEditing.compositions_already_exists;


            if(compositions1.length != compositions2.length){
                //alert('length');
                return false;
            }

            if(fieldsAfterEditing.new_compositions_exists){
                //alert('new_compositions_exists');
                return false;
            }





            for(var i in compositions1){

                if(compositions2[i].new_photos_exists){
                    //alert('new_photos_exists');
                    return false;
                }


                if(compositions1[i].work_contents_id != compositions2[i].work_contents_id){
                    //alert('work_contents_id');
                    return false;
                }

                if(compositions1[i].name != compositions2[i].name){
                    //alert('name');
                    return false;
                }

                if(compositions1[i].description != compositions2[i].description){
                    //alert('description');
                    return false;
                }

                if(!arrayValuesAreIdentical(compositions1[i].work_contents_photo_ids, compositions2[i].work_contents_photo_ids)){
                    //alert('arrayValuesAreIdentical');
                    //console.info(compositions1[i].work_contents_photo_ids);
                    //console.info(compositions2[i].work_contents_photo_ids);
                    return false;
                }


            }


            return true;


        };

        this.noChanges = function(){


            if(fieldsRemembered.category_id != fieldsAfterEditing.category_id){
                //alert('category_id');
               return false;
            }

            if(fieldsRemembered.brands_id != fieldsAfterEditing.brands_id){
                //alert('brands_id');
                return false;
            }

            if(fieldsRemembered.name != fieldsAfterEditing.name){
                //alert('name');
                return false;
            }

            if(fieldsRemembered.worker_types_id != fieldsAfterEditing.worker_types_id){
                //alert('worker_types_id');
                return false;
            }


            if(fieldsRemembered.work_types_id != fieldsAfterEditing.work_types_id){
                //alert('work_types_id');
                return false;
            }

            if(fieldsRemembered.period_id != fieldsAfterEditing.period_id){
                //alert('period_id');
                return false;
            }

            if(fieldsRemembered.execution_time != fieldsAfterEditing.execution_time){
                //alert('execution_time');
                return false;
            }

            if(fieldsRemembered.total_composition_description != fieldsAfterEditing.total_composition_description){
                //alert('total_composition_description');
                return false;
            }


            if(!compositionsAreIdentical()){
                //alert('compositionsAreIdentical');
                return false;
            }


            if(!reportFormsAreIdentical()){
                //alert('reportFormsAreIdentical');
                return false;
            }

            return true;

        };


    };

    var CategoryEditControl = function(){
        var fieldsRemembered = {
            category_name:'',
            brand_name:''
        };

        var fieldsAfterEditing = {
            category_name:'',
            brand_name:''
        };


        var getCategoryEditFormScan = function(){
            var result = {
                category_name : $('.add-brands__input #input1').val(),
                brand_name : $('.add-brands__input #input2').val()
            };

            return result;

        };

        this.rememberFields = function(){
            fieldsRemembered = getCategoryEditFormScan();
        };


        this.rememberFieldsAfterEditing = function(){
            fieldsAfterEditing = getCategoryEditFormScan();
        };

        this.noChanges = function(){
            return (fieldsRemembered.category_name == fieldsAfterEditing.category_name && fieldsRemembered.brand_name == fieldsAfterEditing.brand_name);

        }


    };





    $(document)
        .on('click', '#save-work-form button[type="submit"]', function (e) {

            SAVE_WORK_BUTTON_CLICKED = true;

            //$('.empty-required-field').removeClass('empty-required-field');

            //$('.empty-required-field-simple').removeClass('empty-required-field-simple');

            //$('.add-works__info').eq(2).find('input').eq(0).css('border','').css('border-color','');

            fillFormToSend();

            var isValid = formToSendValidate();
            if (!isValid) {
                e.preventDefault(); //prevent the default action
                toBorderEmptyRequiredFields();
                alert('Заполнены не все поля!!!');
            }
        });

    $(document).on('click','.change.to-category', function(e){
        e.preventDefault();

        setElementCategoryNameToEdit(this);
        $('.aside-menu__menu ul li .cat .plus').click();

        $('.add-brands .add-brands__title').text('Редактирование категории');
    });


    SAVE_WORK_BUTTON_CLICKED = false;

    $(document).on('click','.add-works__info ul li', function(e){
        if(SAVE_WORK_BUTTON_CLICKED) {
            setTimeout(function () {
                fillFormToSend();
                toBorderEmptyRequiredFields();
            }, 100);
        }


    });

    $(document).on('change','.add-works__info input', function(e){
        //alert('changed');
        if(SAVE_WORK_BUTTON_CLICKED) {
            setTimeout(function () {
                fillFormToSend();
                toBorderEmptyRequiredFields();
            }, 100);
        }
    });


    WorksEditControlObject = new WorksEditControl();

    CategoryEditControlObject = new CategoryEditControl();

</script>


<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
