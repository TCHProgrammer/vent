$(document).ready(function(){

	$('.main-content__welcome-block_form button').click(function(e){
		e.preventDefault();
		let form = $(this).parents('.main-content__welcome-block_form');
		let input = form.find('input');
		if (input.val() == '') {
			input.addClass('error');
		} else {
			input.removeClass('error');
		}
	});

	$('.main-content__search-block_search input').on('keyup',function(){
		var $this = $(this),
		val = $this.val();
		if(val.length >= 1){
	    	$('.search-results').fadeIn();
	    	$('.search-results').addClass('visible');
	    	$(this).addClass('keyup');
	  	}else {
	  		$(this).removeClass('keyup');
	  		$('.search-results').removeClass('visible');
	    	$('.search-results').fadeOut();
	  	}
	});

	$('.main-content__search-block_search input').jcOnPageFilter({
		highlightColor: "transparent",
   	 	textColorForHighlights: "#232226",
   	 	hideNegatives: false,
	});

	$('.search-results').mCustomScrollbar({mouseWheelPixels: 300, scrollInertia: 100});
	$('[data-scroll]').mCustomScrollbar({mouseWheelPixels: 300, scrollInertia: 100});

	$('[data-scrolls]').mCustomScrollbar({mouseWheelPixels: 125, scrollInertia: 150});
	/*$('[data-scrolls]').jScrollPane({
		mouseWheelSpeed: 5
	});
	$('.add-works').css('width','84.7%');
	$('.jspContainer').css('width','100%');
	$('.jspPane').css('width','100%');
	$('.jspPane').css('margin','0');
	$('.jspVerticalBar').css('opacity','0');*/

	$(document).mouseup(function(e){
		var div = $(".search-results");
		if (div.hasClass('visible')) {
			if (!div.is(e.target) && div.has(e.target).length === 0) {
				div.fadeOut();
				$('.main-content__search-block_search input').removeClass('keyup');
				$('.main-content__search-block_search input').val('');
			}
		}
	});

	$('.toggle').click(function(){
		if ($(this).find('input').prop('checked') == true) {
			$('.toggle-text span').text('все категории развернуты');
			$('.item-control').addClass('opens');
			$('.main-content__categories-item').find('.item-content').addClass('opened');
			$('.main-content__categories-item').find('.item-content').find('.wrap').slideDown('fast');
		} else {
			$('.toggle-text span').text('все категории свернуты');
			$('.item-control').removeClass('opens');
			$('.main-content__categories-item').find('.item-content').removeClass('opened');
			$('.main-content__categories-item').find('.item-content').find('.wrap').slideUp('fast');
		}
	});

	$('.main-content__categories-item .item-control').click(function(e){
		e.preventDefault();
		$(this).toggleClass('opens');
		var item = $(this).parents('.main-content__categories-item');
		item.find('.item-content').toggleClass('opened');
		item.find('.item-content').find('.wrap').slideToggle('fast');
		if ($('.opened').length < 1) {
			$('#checkbox1').prop('checked', false);
			$('.toggle-text span').text('все категории свернуты');
		} 
		if ($('.opened').length == $('.item-control').length) {
			$('#checkbox1').prop('checked', true);
			$('.toggle-text span').text('все категории развернуты');
		}
	});

	$('.main-content__works-item .item-control').click(function(e){
		e.preventDefault();
		$(this).toggleClass('opens');
		var item = $(this).parents('.main-content__works-item');
		item.find('.item-content').toggleClass('opened');
		let href= $(this).parents('.main-content__works-item').attr('data-linked');
		if ($(this).hasClass('opens')) {
			$('.main-content__filters-specialist_buttons button[data-id="' + href +'"]').removeClass('active');
			console.log('asd')
		} else {
			$('.main-content__filters-specialist_buttons button[data-id="' + href +'"]').addClass('active');
			console.log('asdaa!')
		}
	});


	var keys = {37: 1, 38: 1, 39: 1, 40: 1};

	function preventDefault(e) {
	  e = e || window.event;
	  if (e.preventDefault)
	      e.preventDefault();
	  e.returnValue = false;  
	}

	function preventDefaultForScrollKeys(e) {
	    if (keys[e.keyCode]) {
	        preventDefault(e);
	        return false;
	    }
	}

	function disableScroll() {
	  if (window.addEventListener) // older FF
	      window.addEventListener('DOMMouseScroll', preventDefault, false);
	  window.onwheel = preventDefault; // modern standard
	  window.onmousewheel = document.onmousewheel = preventDefault; // older browsers, IE
	  window.ontouchmove  = preventDefault; // mobile
	  document.onkeydown  = preventDefaultForScrollKeys;
	}

	function enableScroll() {
	    if (window.removeEventListener)
	        window.removeEventListener('DOMMouseScroll', preventDefault, false);
	    window.onmousewheel = document.onmousewheel = null; 
	    window.onwheel = null; 
	    window.ontouchmove = null;  
	    document.onkeydown = null;  
	}

	$('.main-content__works .item-control').each(function(){
		let iconWidth = $(this).find('.icon').outerWidth();
		console.log(iconWidth);
		let titleWidth = $(this).find('.title').outerWidth();
		console.log(titleWidth);
		$(this).css('width', iconWidth + titleWidth);
	});
	

	

	$('.aside-menu__menu ul li .cat .plus').click(function(e){
		e.preventDefault();
		$('.scroller__track').css('opacity','0');
		setTimeout(function(){
			$('.aside-menu .inner-block').addClass('blured');
		},300);
		$('.add-brands').addClass('open-add');
		$('.sure-closes').fadeIn();
	});

	// works open-1
	$('table tr .named span').click(function(e){
		e.preventDefault();
		$('.scroller__track').css('opacity','0');
		setTimeout(function(){
			$('.aside-menu .inner-block').addClass('blured');
		},300);

		disableScroll();

		$('.add-works').addClass('open-add');
		let divide = $('.main-content__works-menu_selected').find('.divide').text();
		let brand = $('.main-content__works-menu_selected').find('.brand').text();
		$('.add-works__title .divide').text(divide);
		$('.add-works__title .brand').text(brand);
		$('.sure-close').fadeIn();
	});

	// work open-2
	$('.add-work').click(function(e){
		e.preventDefault();
		$('.scroller__track').css('opacity','0');
		setTimeout(function(){
			$('.aside-menu .inner-block').addClass('blured');
		},300);

		disableScroll();

		$('.add-works').addClass('open-add');
		let divide = $('.main-content__works-menu_selected').find('.divide').text();
		let brand = $('.main-content__works-menu_selected').find('.brand').text();
		$('.add-works__title .divide').text(divide);
		$('.add-works__title .brand').text(brand);
		$('.sure-close').fadeIn();
	});

	// work open-3
	$('.aside-menu__menu ul li .work .plus').click(function(e){
		e.preventDefault();
		$('.scroller__track').css('opacity','0');
		setTimeout(function(){
			$('.aside-menu .inner-block').addClass('blured');
		},300);

		disableScroll();

		$('.add-works').addClass('open-add');
		let divide = $('.main-content__works-menu_selected').find('.divide').text();
		let brand = $('.main-content__works-menu_selected').find('.brand').text();
		$('.add-works__title .divide').text(divide);
		$('.add-works__title .brand').text(brand);
		$('.sure-close').fadeIn();
	});

	$('body').on('click','.sure-close', function(e){
		$(this).find('.to-save').fadeIn();
	})

	$('body').on('click','.sure-closes', function(e){
		$(this).fadeOut();
		$('.scroller__track').css('opacity','1');
		$('.add-brands').removeClass('open-add');
		$('.aside-menu .inner-block').removeClass('blured');

        $('.add-brands__input input[name="name"]').attr('readonly',false);
        $('.add-brands__input input[name="brand_name"]').attr('readonly',false);
	})

	$('body').on('click','.to-save .save', function(e){
		e.preventDefault();
		e.stopPropagation();
		enableScroll()
		setTimeout(function(){
			$('.aside-menu .inner-block').removeClass('blured');
		},300);
		$('.scroller__track').css('opacity','1');
		$('.add-works').removeClass('open-add');
		$('.sure-close').fadeOut();
		$('.to-save').fadeOut();
	});

	$('body').on('click','.to-save .not-save', function(e){
		e.preventDefault();
		e.stopPropagation();
		enableScroll()
		$('.scroller__track').css('opacity','1');
		setTimeout(function(){
			$('.aside-menu .inner-block').removeClass('blured');
		},300);
		$('.add-works').removeClass('open-add');
		$('.sure-close').fadeOut();
		$('.to-save').fadeOut();
	});

	$('body').on('click','.to-save .continue', function(e){
		e.stopPropagation();
		$('.to-save').fadeOut();
	});

	$('.item-content .add-brand').click(function(e){
		e.preventDefault();
		setTimeout(function(){
			$('.aside-menu .inner-block').addClass('blured');
		},300);
		$('.scroller__track').css('opacity','0');
		$('.add-brands').addClass('open-add');
		$('.sure-closes').fadeIn();
	});


	$('.add-brands .close').click(function(e){
		e.preventDefault();
		setTimeout(function(){
			$('.aside-menu .inner-block').removeClass('blured');
		},300);
		$('.scroller__track').css('opacity','1');
		$('.to-save').fadeIn();
		$('.add-brands').removeClass('open-add');
		$('.add-brands').find('#input1').val('');
		$('.add-brands').find('#input2').val('');
	});

	$('body').on('click','.add-works .close', function(e){
		e.preventDefault();
		$(this).remove();

		enableScroll()
		$('.scroller__track').css('opacity','1');
		setTimeout(function(){
			$('.aside-menu .inner-block').removeClass('blured');
		},300);
		$('.add-works').removeClass('open-add');
		$('.sure-close').fadeOut();
	});

	$('body').on('click', '.item-content ul li .tooltiped .delete', function(e){
		e.preventDefault();
		$(this).parents('li').remove();
	});

	$('body').on('click', '.item-content ul li .tooltiped .change', function(e){
		e.preventDefault();
		let brand = $(this).parents('li').find('.brand').text();
		let category = $(this).parents('li').parents('.main-content__categories-item').find('.item-control .title').text();
		setTimeout(function(){
			$('.aside-menu .inner-block').addClass('blured');
		},300);
		$('.scroller__track').css('opacity','0');
		$('.add-brands').addClass('open-add');
		$('.add-brands').find('#input1').val(category);
		$('.add-brands').find('#input2').val(brand);
		$('.sure-closes').fadeIn();
	});

    $('body').on('click', '.item-content ul li .tooltiped .copy', function(e){
        e.preventDefault();
        let brand = $(this).parents('li').find('.brand').text();
        let category = $(this).parents('li').parents('.main-content__categories-item').find('.item-control .title').text();
        setTimeout(function(){
            $('.aside-menu .inner-block').addClass('blured');
        },300);
        $('.scroller__track').css('opacity','0');
        $('.add-brands').addClass('open-add');
        $('.add-brands').find('#input1').val(category);
        $('.add-brands').find('#input2').val(brand);
        $('.sure-closes').fadeIn();
    });

	//$('.scroller__bar').removeClass('asd');
	$('.scroller').bind('mousewheel DOMMouseScroll MozMousePixelScroll', function(event){
		let delta = parseInt(event.originalEvent.wheelDelta || -event.originalEvent.detail);
		$('.scroller__bar').addClass('asd');
		if ($(this).scrollTop() > 300) {
			$('.aside-menu__up').addClass('vis');
		} else {
			$('.aside-menu__up').removeClass('vis');
		}
	});		

	$('.aside-menu__up').click(function(e){
		e.preventDefault();
		$('.scroller').animate({scrollTop: 0}, 500);
		return false;
	});

	let flagg = 0;
	$('.main-content__filters-priority_buttons button[data-id="passport"]').click(function(e){
		e.preventDefault();
		$(this).toggleClass('active');
		let href = $(this).attr('data-id');
		console.log(flagg)
		if (flagg == 0) {
			$('.wrap[data-linked="' + href + '"] .table-control').removeClass('rotating');
			$('.wrap[data-linked="' + href + '"] .table').removeClass('table-opened');
			$('.wrap[data-linked="' + href + '"] .table .wrapper').slideUp('fast');
			flagg = 1;
		} else {
			$('.wrap[data-linked="' + href + '"] .table-control').addClass('rotating');
			$('.wrap[data-linked="' + href + '"] .table').addClass('table-opened');
			$('.wrap[data-linked="' + href + '"] .table .wrapper').slideDown('fast');
			flagg = 0;
		}
	});

	let flaggg = 0;
	$('.main-content__filters-priority_buttons button[data-id="raschir"]').click(function(e){
		e.preventDefault();
		$(this).toggleClass('active');
		let href = $(this).attr('data-id');
		if (flaggg == 0) {
			$('.wrap[data-linked="' + href + '"] .table-control').removeClass('rotating');
			$('.wrap[data-linked="' + href + '"] .table').removeClass('table-opened');
			$('.wrap[data-linked="' + href + '"] .table .wrapper').slideUp('fast');
			flaggg = 1;
		} else {
			$('.wrap[data-linked="' + href + '"] .table-control').addClass('rotating');
			$('.wrap[data-linked="' + href + '"] .table').addClass('table-opened');
			$('.wrap[data-linked="' + href + '"] .table .wrapper').slideDown('fast');
			flaggg = 0;
		}
	});

	let flagggg = 0;
	$('.main-content__filters-priority_buttons button[data-id="zhel"]').click(function(e){
		e.preventDefault();
		$(this).toggleClass('active');
		let href = $(this).attr('data-id');
		if (flagggg == 0) {
			$('.wrap[data-linked="' + href + '"] .table-control').removeClass('rotating');
			$('.wrap[data-linked="' + href + '"] .table').removeClass('table-opened');
			$('.wrap[data-linked="' + href + '"] .table .wrapper').slideUp('fast');
			flagggg = 1;
		} else {
			$('.wrap[data-linked="' + href + '"] .table-control').addClass('rotating');
			$('.wrap[data-linked="' + href + '"] .table').addClass('table-opened');
			$('.wrap[data-linked="' + href + '"] .table .wrapper').slideDown('fast');
			flagggg = 0;
		}
	});

	$('.main-content__filters-reset').click(function(e){
		e.preventDefault();
		$('.main-content__filters').find('button').addClass('active');
		$('.main-content__works-item .item-control').removeClass('opens');
		$('.main-content__works-item .item-content').addClass('opened');
		$('.wrap .table-control').addClass('rotating');
		$('.wrap .table').addClass('table-opened');
		$('.wrap .table .wrapper').slideDown('fast');
		flagg = 0;
		flaggg = 0;
		flagggg = 0;
	});
	

	$('.main-content__filters-specialist_buttons button').click(function(e){
		e.preventDefault();
		$(this).toggleClass('active');
		let href = $(this).attr('data-id');
		console.log('asd')
		$('.main-content__works-item[data-linked="' + href + '"] .item-control').toggleClass('opens');
		$('.main-content__works-item[data-linked="' + href + '"] .item-content').toggleClass('opened');
	});

	
	/*baron('[data-src]', {
	 	bar: '.baron__bar',
	 	track: '.baron__track',
	});*/

	baron({
		root: '.baron',
        scroller: '[data-src]',
        bar: '.scroller__bar',
        scrollingCls: '_scrolling',
        draggingCls: '_dragging'
    }).controls({
        // Element to be used as interactive track. Note: it could be different from 'track' param of baron.
        track: '.scroller__track',
    });



	//let selector = $('table thead td:first-child');

	$('table thead td:first-child').each(function(){
		let selector = $(this);
		function sort(selector) {
			selector.parents('table').find('tbody').find('tr').sortElements(function(a, b){
			    return $(a).find('.named').find('span').text() > $(b).find('.named').find('span').text() ? 1 : -1;
			});
		}
		sort(selector);
	});
	
	
	$('thead td:first-child').click(function(e){
		$(this).parents('table').find('thead td').removeClass('active');
		$(this).addClass('active');
		e.preventDefault();
		function sort(selector) {
			selector.parents('table').find('tbody').find('tr').sortElements(function(a, b){
			    return $(a).find('.named').find('span').text() > $(b).find('.named').find('span').text() ? 1 : -1;
			});
		}
		let selector = $(this);
		sort(selector);
		
	});

	
	$('thead td').not(':first-child').each(function(){
		$(this).click(function(e){
			e.preventDefault();
			$(this).parents('thead').find('td').removeClass('active');
			$(this).parents('thead').find('td').removeClass('taken');
			//$('thead').find('td').removeClass('taken');
			$(this).toggleClass('active');
			$(this).addClass('taken');
			let filter = $(this).attr('data-filter');
			console.log(filter)
			let filterArr = [];
			filterArr.push($(this).parents('table').find('tbody').find('tr[data-filter-' + filter + ' = "true"]'));
			$(this).parents('table').find('tbody').find('tr[data-filter-' + filter + ' = "true"]').remove();
			for(let i = 0; i < filterArr.length; i++) {
				$(this).parents('table').find('tbody').prepend(filterArr[i]);
				filterArr.pop(filterArr[i]);
			}
			let $tmpErt = $(this);
			$(this).parents('thead').find('td').not(':first-child').each(function(){
				if (!$(this).hasClass('taken')) {
					//console.log($(this).next());
					$tmpErt = $tmpErt.next();
					//console.log($tmpErt);
					if ($tmpErt.length == 0) {
					 	$tmpErt = $(this).parents('thead').find('td:first-child').next();
					}
					//console.log($tmpErt);
					let fil = $(this).parents('table').find('tbody').find('tr[data-filter-' + $tmpErt.attr('data-filter') + ' = "true"]');
					fil.remove();
					$(this).parents('table').find('tbody').append(fil);
					$(this).addClass('taken');
					
				}
			});
			
		});
	});

	

	$('.main-content__works-menu').click(function(){
		$(this).addClass('opened-menu');
	});

	$(document).mouseup(function(e){
		var div = $(".main-content__works-menu");
		if (div.hasClass('opened-menu')) {
			if (!div.is(e.target) && div.has(e.target).length === 0) {
				div.removeClass('opened-menu');
			}
		}
	});


	var href = '';
    $("[data-link]").on('mouseover',function(){
        href = $(this).data('link');
        $("[data-link]").removeClass('hovered');
        $(this).addClass('hovered');
        $("[data-menu]").css('display', 'none');
        $("[data-menu]").removeClass("opened");
        $("[data-menu='"+href+"']").show();
        $("[data-menu='"+href+"']").addClass("opened");
        if (href.length == 0) {
        	$("[data-menu]").hide();
        	$("[data-menu]").removeClass("opened");
        }
    });
    $(document).on('mousemove',function(e){
        if ( $("[data-menu='"+href+"']").hasClass('opened') ){
            if($(e.target).parents(".main-content__works-menu_dropdown").length == 0){
                $("[data-menu]").hide();
            }
        }
    });

    $('.table-control').click(function(){
    	$(this).toggleClass('rotating');
    	$(this).parents('.wrap').find('.table').toggleClass('table-opened');
    	$(this).parents('.wrap').find('.table').find('.wrapper').slideToggle('fast');
    	let href = $(this).parents('.wrap').attr('data-linked');
    	console.log(href);
    	console.log($('.wrap[data-linked="' + href + '"]').find('.table-opened').length);
    	if($('.wrap[data-linked="' + href + '"]').find('.table-opened').length < 1) {
    		$('.main-content__filters-priority_buttons button[data-id="' + href + '"]').removeClass('active');
    		flagg = 1;
    	}
    });

    $('.named .button .tooltip .delete').click(function(e){
    	e.preventDefault();
    	$(this).parents('.button').parents('.named').parents('tr').remove();
    	/*let selector = $(this).parents('.button').parents('.named').parents('tr');
		function sort(selector) {
			selector.parents('table').find('tbody').find('tr').sortElements(function(a, b){
			    return $(a).find('.named').find('span').text() > $(b).find('.named').find('span').text() ? 1 : -1;
			});
		}
		sort(selector);*/
    });

    $('body').on('click', 'ul.opened li a', function(e){
    	e.preventDefault();
    	let href = $(this).parents('ul').attr('data-menu')
    	let brand = $(this).text();
    	let divide = $(this).parents('.main-content__works-menu_dropdown').find('.main-content__works-menu_dropdown-left').find('ul').find('li[data-link="' + href +'"]').text();
    	$('.main-content__works-menu_selected').find('.divide').text(divide);
    	$('.main-content__works-menu_selected').find('.brand').text(brand);
    });

	$('select').styler({
 		selectSmartPositioning: false,
 		selectVisibleOptions: 10,
 		onSelectOpened: function() {
 			$(this).find('.jq-selectbox__select').addClass('active');
 			$(this).find('.jq-selectbox__select').append('<div class="shadow"></div>');
 			let height = $(this).find('.jq-selectbox__select').height() + $(this).find(".jq-selectbox__dropdown").height();
 			$(this).find('.shadow').css({
 				'height': height,
 				'width': '100%',
 				'position': 'absolute',
 				'top': '0px',
 				'left': '0px',
 				'border-radius': '2px',
 				'box-shadow': '0 0 6px #6d67f9'
 			});
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

	$('.time-tabs-nav button').on('click', function(e){
		e.preventDefault();
		$('.time-tabs-nav button').removeClass('active');
		$(this).addClass('active');
		return false;
	});


	$('body').on('change', 'input[type="file"]', function(event) {
		var tmppath = URL.createObjectURL(event.target.files[0]);
		$(this).parents('label').hide();
		$(this).parents('.file').append('<div class="img-block" style="background-image: url('+ tmppath +')"><a href="#" class="delete-photo"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="9" height="9" viewBox="0 0 9 9"><defs><path id="l6tfa" d="M706.026 1021.044a1 1 0 0 1-1.414 0l-2.121-2.122-2.144 2.144a1 1 0 1 1-1.414-1.414l2.143-2.144-2.12-2.12a1 1 0 1 1 1.413-1.415l2.122 2.121 2.099-2.1a1 1 0 0 1 1.414 1.415l-2.1 2.099 2.122 2.121a1 1 0 0 1 0 1.415z"/></defs><g><g transform="translate(-698 -1013)"><use fill="#232226" xlink:href="#l6tfa"/></g></g></svg></a></div>');
		let file = `
			<div class="file">
				<label>
		          	<input type="file" name="file">
		          	<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="18" height="14" viewBox="0 0 18 14"><defs><path id="eqkwa" d="M805 1031v10a1 1 0 0 1-1 1h-2.016v-.002A1 1 0 0 1 802 1040h.5a.5.5 0 0 0 .5-.5v-7a.5.5 0 0 0-.5-.5h-3.329l-.585-.586-1.415-1.414h-2.343l-1.414 1.414-.586.586H789.5a.5.5 0 0 0-.5.5v7a.5.5 0 0 0 .5.5h.5a1 1 0 1 1 0 2h-2a1 1 0 0 1-1-1v-10a1 1 0 0 1 1-1h4l1.707-1.707a1 1 0 0 1 .707-.293h3.172a1 1 0 0 1 .707.293L800 1030h4a1 1 0 0 1 1 1zm-9 4c-1.103 0-2 .897-2 2s.897 2 2 2 2-.897 2-2-.897-2-2-2c0 0 1.103 0 0 0zm0-2a4 4 0 1 1 0 8 4 4 0 0 1 0-8z"/></defs><g><g transform="translate(-787 -1028)"><use fill="#939499" xlink:href="#eqkwa"/></g></g></svg>
		          	<span>Загрузить фото</span>
	     		</label>
			</div>
		`;
		$(this).parents('.files').append(file);
		if ($(this).parents('.files').find('.img-block').length > 0) {
			$(this).parents('.add-photo_block').find('.delete-all').addClass('visible');
		}
	});


	// состав работы
	//let count = 2;
	$('body').on('click','.hidens .input-area', function(e){	
		//count++;
		$(this).parents('.composition').removeClass('hidens');
		let compHtml = `
			<div class="composition hidens">
				<div class="title-block">
					<label>Состав работы</label>
					<div class="input-button">
						<div class="input-area">
							<div class="number"></div>
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
		`;

		
		$(this).parents('.add-works__info-composition').append(compHtml);

		$('.number').each(function(index){
			$(this).text(index+1);
		});
	});

	$('body').on('click','.composition .add-descr', function(e){	
		e.preventDefault();
		e.stopPropagation();
		$(this).addClass('non-active');
		let number = $(this).parents('.composition').find('.number').text();
		$(this).parents('.composition').find('.props-block').find('.add-descr_block').css('display','flex');
		$(this).parents('.composition').find('.props-block').find('.add-descr_block').find('.quantity span').text(number);
	});

	$('body').on('click','.composition .add-photo', function(e){	
		e.preventDefault();
		e.stopPropagation();
		let number = $(this).parents('.composition').find('.number').text();
		$(this).addClass('non-active');
		$(this).parents('.composition').find('.props-block').find('.add-photo_block').css('display','flex');
		$(this).parents('.composition').find('.props-block').find('.add-photo_block').find('.quantity span').text(number);
	});

	$('body').on('click','.img-block .delete-photo', function(e){
		let imgCount = $(this).parents('.add-photo_block').find('.img-block').length;
		imgCount--;
		if (imgCount == 0) {
			$(this).parents('.add-photo_block').find('.delete-all').removeClass('visible');
		}
		e.preventDefault();
		$(this).parents('.file').remove();
	});	

	$('body').on('click','.add-photo_block .delete-all', function(e){
		e.preventDefault();
		$(this).removeClass('visible');
		$(this).parents('.composition').find('.add-photo').removeClass('non-active');
		$(this).parents('.add-photo_block').find('.files').find('.file').not('.file:last-child').remove();
		$(this).parents('.add-photo_block').css('display','none');
	});	

	$('body').on('click','.add-descr_block .delete-all', function(e){
		e.preventDefault();
		$(this).removeClass('visible');
		console.log($(this).parents('.composition'))
		$(this).parents('.composition').find('.add-descr').removeClass('non-active');
		$(this).parents('.add-descr_block').css('display','none');
		$(this).parents('.add-descr_block').find('textarea').val('');
	});	

	$('body').on('click','.delete-composition', function(e){
		e.preventDefault();
		e.stopPropagation();
		let compCount = $(this).parents('.add-works__info-composition').find('.composition').length;
		
		
		//console.log(compCount)
		compCount--;
		console.log(compCount)
		if (compCount >= 2) {
			$(this).parents('.composition').remove();
			$('.number').each(function(index){
				$(this).text(index+1);
			});
			$('.composition').each(function(index){
				$(this).find('.quantity span').text(index+1);
			});
		} 

	})
	
	$('body').on('focus','.input-area input', function(){
		$(this).parents('.input-area').addClass('focused');
	});

	$('body').on('blur','.input-area input', function(){
		$(this).parents('.input-area').removeClass('focused');
	});

	$('.main-content__works-menu_dropdown-right ul').each(function(){
		if ($(this).find('li').length > 10) {
			$(this).addClass('scroll')
		}
	});

	let fl = 0;
	$('#form').change(function(){ 
		if (fl == 0) {
			$(this).prop('checked', true);
			$('.new-form').fadeIn();
			fl = 1;
		} else {
			$(this).prop('checked', false);
			$('.new-form').fadeOut();
			fl = 0;
		}
		
	});

	$('body').on('click','.new-form .add-input', function(e){
		e.preventDefault();
		let input = `
			<input type="text" placeholder="Введите название поля">
		`;
		$('.new-form').find('.inputs').append(input);
	});

	$('.add-works.category-works').find('.add-works__title').find('.divide').hide();
	$('.add-works.category-works').find('.add-works__title').find('.check').hide();
	$('.add-works.category-works').find('.add-works__title').find('.brand').hide();

	$('.add-works.category-works').find('.select-razdel').change(function(){
		let val = $(this).find('option:selected').text()
		//val = val.split('_').join('');
		console.log(val);
		
		$('.add-works.category-works').find('.add-works__title').find('.divide').text(val);
		setTimeout(function(){
			$('.add-works.category-works').find('.add-works__title').find('.divide').show();
		},100);
		
	});

	$('.add-works.category-works').find('.select-brand').change(function(){
		let val = $(this).find('option:selected').text()
		console.log(val);
		
		$('.add-works.category-works').find('.add-works__title').find('.brand').text(val);
		setTimeout(function(){
			$('.add-works.category-works').find('.add-works__title').find('.check').show();
			$('.add-works.category-works').find('.add-works__title').find('.brand').show();
		},100);
		
	});

});