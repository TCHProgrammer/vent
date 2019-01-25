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
			<div class="composition composition-template">
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

        <form id="save-work-form" method="post" enctype="multipart/form-data" action="/works/update">
            <div class="work-fields">
                <input type="hidden" name="brands_id">
                <input type="hidden" name="name">
                <input type="hidden" name="worker_types_id">
                <input type="hidden" name="work_types_id">
                <input type="hidden" name="period_id">
                <input type="hidden" name="execution_time">
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
						<h1 class="aside-menu__title-h1">VENT_CRM</h1>
						<div class="aside-menu__title-version">v 0.1a</div>
					</div>
				</div>
				<div class="aside-menu__welcome">
					Добрый день, <span>Иван Васильевич</span>
				</div>
				<nav class="aside-menu__menu">
					<ul>
						<li>
							<a href="categories.html" class="active cat">
								<span class="line"></span>
								<div class="content">
									<div class="icon">
										<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="21" height="15" viewBox="0 0 21 15"><defs><path id="acmda" d="M31.5 238.999a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3zm0 6a1.5 1.5 0 1 1-.001 3 1.5 1.5 0 0 1 0-3zm0 6a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3zm5.5-12h13a1 1 0 0 1 1 1v1a1 1 0 0 1-1 1H37a1 1 0 0 1-1-1v-1a1 1 0 0 1 1-1zm0 6h13a1 1 0 0 1 1 1v1a1 1 0 0 1-1 1H37a1 1 0 0 1-1-1v-1a1 1 0 0 1 1-1zm0 6h13a1 1 0 0 1 1 1v1A1 1 0 0 1 50 254H37a1 1 0 0 1-1-1v-1a1 1 0 0 1 1-1z"/></defs><g><g transform="translate(-30 -239)"><use fill="#fff" xlink:href="#acmda"/></g></g></svg>
									</div>
									<span>Категории</span>
									<div class="plus" onclick="clearInputCategoryAndBrand();">
										<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="13" height="13" viewBox="0 0 13 13"><defs><path id="2ehra" d="M252.5 315a1.5 1.5 0 0 1 1.5 1.5v3.5h3.5a1.5 1.5 0 0 1 0 3H254v3.5a1.5 1.5 0 0 1-3 0V323h-3.5a1.5 1.5 0 0 1 0-3h3.5v-3.5a1.5 1.5 0 0 1 1.5-1.5z"/></defs><g><g transform="translate(-246 -315)"><use fill="#fff" xlink:href="#2ehra"/></g></g></svg>
									</div>
								</div>
							</a>
						</li>
						<li>
							<a href="works.html" class="work">
								<span class="line"></span>
								<div class="content">
									<div class="icon">
										<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="19" height="25" viewBox="0 0 19 25"><defs><path id="lzbda" d="M46.256 325.67L46.25 333a1 1 0 0 1-1 1h-1a1 1 0 0 1-1-1l.006-8.893.668-.445a6.413 6.413 0 0 0 2.872-5.342 6.44 6.44 0 0 0-2.1-4.736v3.926a2.463 2.463 0 0 1-2.46 2.46h-3.48a2.463 2.463 0 0 1-2.46-2.46v-3.926a6.44 6.44 0 0 0-2.1 4.736 6.413 6.413 0 0 0 2.872 5.342l.668.445.014 8.893a1 1 0 0 1-1 1h-1a1 1 0 0 1-1-1l-.014-7.33a9.399 9.399 0 0 1-3.54-7.35c0-3.635 2.137-6.984 5.443-8.534l.075-.035.078-.027c.27-.092.518-.137.757-.137.996 0 1.747.775 1.747 1.803v5.58h2.4v-5.58c0-1.028.751-1.803 1.747-1.803.24 0 .487.045.757.137l.079.027.074.035c3.307 1.55 5.443 4.9 5.443 8.534a9.399 9.399 0 0 1-3.54 7.35z"/></defs><g><g transform="translate(-31 -309)"><use fill="#fff" xlink:href="#lzbda"/></g></g></svg>
									</div>
									<span>Работы</span>
									<div class="plus">
										<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="13" height="13" viewBox="0 0 13 13"><defs><path id="2ehra" d="M252.5 315a1.5 1.5 0 0 1 1.5 1.5v3.5h3.5a1.5 1.5 0 0 1 0 3H254v3.5a1.5 1.5 0 0 1-3 0V323h-3.5a1.5 1.5 0 0 1 0-3h3.5v-3.5a1.5 1.5 0 0 1 1.5-1.5z"/></defs><g><g transform="translate(-246 -315)"><use fill="#fff" xlink:href="#2ehra"/></g></g></svg>
									</div>
								</div>
							</a>
						</li>
					</ul>
				</nav>
				<a href="#" class="aside-menu__exit">
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
<script src="/js/common.js"></script>

<!--<script src="libs/jquery/jquery-2.1.3.min.js"></script>-->
<!--<script src="libs/jcfilter.js"></script>
<!--<script src="libs/jquery.mCustomScrollbar.js"></script>-->
<!--<script src="libs/jquery.formstyler.min.js"></script>-->
<!--<script src="libs/baron.js"></script>-->
<!--<script src="libs/jquery.jscrollpane.min.js"></script>-->
<!--<script src="libs/jquery.mousewheel.js"></script>-->
<script src="libs/sortElements.js"></script>
<!--<script src="js/common.js"></script>-->











<script type="text/javascript">



    function clearInputCategoryAndBrand(){
        $('.add-brands__input input[name="name"]').val('');
        $('.add-brands__input input[name="brand_name"]').val('');
    }

    function getAjaxCategoryName(category_id){

        $('.add-brands__input input[name="name"]').val('');
        $('.add-brands__input input[name="brand_name"]').val('');

        $.ajax({
            type: "POST",
            url: "<?=Yii::$app->urlManager->createUrl('categories/get-ajax-category-name')?>" + "?id=" + category_id,
            data: {<?=Yii::$app->getRequest()->csrfParam;?>:'<?=Yii::$app->getRequest()->getCsrfToken();?>'},
            success: function(data){
                $('.add-brands__input input[name="name"]').attr('readonly',false).attr('category_id',category_id).val(data);
                $('.add-brands__input input[name="brand_name"]').attr('readonly',false).attr('brand_id',null).val('');
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
            $('.add-brands__input input[name="name"]').attr('readonly',true).attr('category_id',category_id).val(data);
            $('.add-brands__input input[name="brand_name"]').attr('readonly',false).attr('brand_id',null).val('');
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

            $('.add-brands__input input[name="name"]').attr('readonly',true).attr('category_id',data.category_id).val(data.category_name);
            $('.add-brands__input input[name="brand_name"]').attr('readonly',false).attr('brand_id',brand_id).val(data.brand_name);
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

            $('.add-brands__input input[name="name"]').attr('readonly',true).attr('category_id',data.category_id).val(data.category_name);
            $('.add-brands__input input[name="brand_name"]').attr('readonly',false).attr('brand_id',null).val(data.brand_name);
        },
        dataType: 'json'
    });
    }

    function setElementCategoryName(element){
        $('.add-brands__input input[name="name"]').val('');
        $('.add-brands__input input[name="brand_name"]').val('');

        var category_id = $(element).attr('category_id');
        getAjaxCategoryName(category_id);
    }

    function setElementBrandName(element){
        $('.add-brands__input input[name="name"]').val('');
        $('.add-brands__input input[name="brand_name"]').val('');

        var brand_id = $(element).attr('brand_id');
        getAjaxBrandName(brand_id);
    }

    function setElementBrandNameOnCopy(element){
        $('.add-brands__input input[name="name"]').val('');
        $('.add-brands__input input[name="brand_name"]').val('');

        var brand_id = $(element).attr('brand_id');
        getAjaxBrandNameToCopyBrand(brand_id);
    }

    function addCategoryBrand(element){
        $('.add-brands__input input[name="name"]').val('');
        $('.add-brands__input input[name="brand_name"]').val('');

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

	$('#save-category').unbind('click').click(function(){

        $('.add-brands__input input[name="name"]').attr('readonly',false);
        $('.add-brands__input input[name="brand_name"]').attr('readonly',false);

        if(!$('.add-brands__input input[name="name"]').attr('category_id')) {
            $.post('<?=Yii::$app->urlManager->createUrl('categories/create')?>', {
                name: $(".add-brands input[name='name']").eq(0).val(),
                brand_name: $(".add-brands input[name='brand_name']").eq(0).val(),<?=Yii::$app->getRequest()->csrfParam;?>:
            '<?=Yii::$app->getRequest()->getCsrfToken();?>'
            }).
            done(function () {
                location.reload();
            });
        } else if(!$('.add-brands__input input[name="brand_name"]').attr('brand_id')){

            $.post("<?=Yii::$app->urlManager->createUrl('categories/add-brand')?>" + "?id=" + $('.add-brands__input input[name="name"]').attr('category_id'), {

                brand_name: $(".add-brands input[name='brand_name']").eq(0).val(),

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
            <?=Yii::$app->getRequest()->csrfParam;?>:
            '<?=Yii::$app->getRequest()->getCsrfToken();?>'
            }).
            done(function () {
                location.reload();
            });
        }
	});

    $('body').on('click','.sure-closes', function(e){
        $('.add-brands__input input[name="name"]').attr('readonly',false);
        $('.add-brands__input input[name="brand_name"]').attr('readonly',false);
    });
	
</script>


<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
