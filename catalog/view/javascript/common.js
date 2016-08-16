function getURLVar(key) {
	var value = [];

	var query = String(document.location).split('?');

	if (query[1]) {
		var part = query[1].split('&');

		for (i = 0; i < part.length; i++) {
			var data = part[i].split('=');

			if (data[0] && data[1]) {
				value[data[0]] = data[1];
			}
		}

		if (value[key]) {
			return value[key];
		} else {
			return '';
		}
	}
}

$(document).ready(function() {
	// Highlight any found errors
	$('.text-danger').each(function() {
		var element = $(this).parent().parent();

		if (element.hasClass('form-group')) {
			element.addClass('has-error');
		}
	});

	// Currency
	$('#currency .currency-select').on('click', function(e) {
		e.preventDefault();

		$('#currency input[name=\'code\']').attr('value', $(this).attr('name'));

		$('#currency').submit();
	});

	// Language
	$('#language a').on('click', function(e) {
		e.preventDefault();

		$('#language input[name=\'code\']').attr('value', $(this).attr('href'));

		$('#language').submit();
	});

	/* Search */
	$('#search input[name=\'search\']').parent().find('button').on('click', function() {
		url = $('base').attr('href') + 'index.php?route=product/search';

		var value = $('header input[name=\'search\']').val();

		if (value) {
			url += '&search=' + encodeURIComponent(value);
		}

		location = url;
	});

	$('#search input[name=\'search\']').on('keydown', function(e) {
		if (e.keyCode == 13) {
			$('header input[name=\'search\']').parent().find('button').trigger('click');
		}
	});

	// Menu
	$('#menu .dropdown-menu').each(function() {
		var menu = $('#menu').offset();
		var dropdown = $(this).parent().offset();

		var i = (dropdown.left + $(this).outerWidth()) - (menu.left + $('#menu').outerWidth());

		if (i > 0) {
			$(this).css('margin-left', '-' + (i + 5) + 'px');
		}
	});

	// Product List
	$('#list-view').click(function() {
		$('#content .product-grid > .clearfix').remove();

		//$('#content .product-layout').attr('class', 'product-layout product-list col-xs-12');
		$('#content .row > .product-grid').attr('class', 'product-layout product-list col-xs-12');

		localStorage.setItem('display', 'list');
	});

	// Product Grid
	$('#grid-view').click(function() {
		// What a shame bootstrap does not take into account dynamically loaded columns
		cols = $('#column-right, #column-left').length;

		if (cols == 2) {
			$('#content .product-list').attr('class', 'product-layout product-grid col-lg-6 col-md-6 col-sm-12 col-xs-12');
		} else if (cols == 1) {
			$('#content .product-list').attr('class', 'product-layout product-grid col-lg-4 col-md-4 col-sm-6 col-xs-12');
		} else {
			$('#content .product-list').attr('class', 'product-layout product-grid col-lg-3 col-md-3 col-sm-6 col-xs-12');
		}

		 localStorage.setItem('display', 'grid');
	});

	if (localStorage.getItem('display') == 'list') {
		$('#list-view').trigger('click');
	} else {
		$('#grid-view').trigger('click');
	}

	// Checkout
	$(document).on('keydown', '#collapse-checkout-option input[name=\'email\'], #collapse-checkout-option input[name=\'password\']', function(e) {
		if (e.keyCode == 13) {
			$('#collapse-checkout-option #button-login').trigger('click');
		}
	});

	// tooltips on hover
	$('[data-toggle=\'tooltip\']').tooltip({container: 'body',trigger: 'hover'});

	// Makes tooltips work on ajax generated content
	$(document).ajaxStop(function() {
		$('[data-toggle=\'tooltip\']').tooltip({container: 'body'});
	});
});

// Cart add remove functions
var cart = {
	'add': function(product_id, quantity) {
		$.ajax({
			url: 'index.php?route=checkout/cart/add',
			type: 'post',
			data: 'product_id=' + product_id + '&quantity=' + (typeof(quantity) != 'undefined' ? quantity : 1),
			dataType: 'json',
			beforeSend: function() {
				$('#cart > button').button('loading');
			},
			complete: function() {
				$('#cart > button').button('reset');
			},
			success: function(json) {
				$('.alert, .text-danger').remove();

				if (json['redirect']) {
					location = json['redirect'];
				}

				if (json['success']) {
					$('#content').parent().before('<div class="alert alert-success"><i class="fa fa-check-circle"></i> ' + json['success'] + ' <button type="button" class="close" data-dismiss="alert">&times;</button></div>');

					// Need to set timeout otherwise it wont update the total
					setTimeout(function () {
						$('#cart > button').html('<span id="cart-total"><i class="fa fa-shopping-cart"></i> ' + json['total'] + '</span>');
					}, 100);

					$('html, body').animate({ scrollTop: 0 }, 'slow');

					$('#cart > ul').load('index.php?route=common/cart/info ul li');
                                        
                                        $('.t_cart>a').html(json['m_tot']);
                                        
				}
                                
			},
	        error: function(xhr, ajaxOptions, thrownError) {
	            alert(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
	        }
		});
	},
	'update': function(key, quantity) {
		$.ajax({
			url: 'index.php?route=checkout/cart/edit',
			type: 'post',
			data: 'key=' + key + '&quantity=' + (typeof(quantity) != 'undefined' ? quantity : 1),
			dataType: 'json',
			beforeSend: function() {
				$('#cart > button').button('loading');
			},
			complete: function() {
				$('#cart > button').button('reset');
			},
			success: function(json) {
				// Need to set timeout otherwise it wont update the total
				setTimeout(function () {
					$('#cart > button').html('<span id="cart-total"><i class="fa fa-shopping-cart"></i> ' + json['total'] + '</span>');
				}, 100);

				if (getURLVar('route') == 'checkout/cart' || getURLVar('route') == 'checkout/checkout') {
					location = 'index.php?route=checkout/cart';
				} else {
					$('#cart > ul').load('index.php?route=common/cart/info ul li');
				}
			},
	        error: function(xhr, ajaxOptions, thrownError) {
	            alert(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
	        }
		});
	},
	'remove': function(key) {
		$.ajax({
			url: 'index.php?route=checkout/cart/remove',
			type: 'post',
			data: 'key=' + key,
			dataType: 'json',
			beforeSend: function() {
				$('#cart > button').button('loading');
			},
			complete: function() {
				$('#cart > button').button('reset');
			},
			success: function(json) {
				// Need to set timeout otherwise it wont update the total
				setTimeout(function () {
					$('#cart > button').html('<span id="cart-total"><i class="fa fa-shopping-cart"></i> ' + json['total'] + '</span>');
				}, 100);

				if (getURLVar('route') == 'checkout/cart' || getURLVar('route') == 'checkout/checkout') {
					location = 'index.php?route=checkout/cart';
				} else {
					$('#cart > ul').load('index.php?route=common/cart/info ul li');
				}
			},
	        error: function(xhr, ajaxOptions, thrownError) {
	            alert(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
	        }
		});
	}
}

var voucher = {
	'add': function() {

	},
	'remove': function(key) {
		$.ajax({
			url: 'index.php?route=checkout/cart/remove',
			type: 'post',
			data: 'key=' + key,
			dataType: 'json',
			beforeSend: function() {
				$('#cart > button').button('loading');
			},
			complete: function() {
				$('#cart > button').button('reset');
			},
			success: function(json) {
				// Need to set timeout otherwise it wont update the total
				setTimeout(function () {
					$('#cart > button').html('<span id="cart-total"><i class="fa fa-shopping-cart"></i> ' + json['total'] + '</span>');
				}, 100);

				if (getURLVar('route') == 'checkout/cart' || getURLVar('route') == 'checkout/checkout') {
					location = 'index.php?route=checkout/cart';
				} else {
					$('#cart > ul').load('index.php?route=common/cart/info ul li');
				}
			},
	        error: function(xhr, ajaxOptions, thrownError) {
	            alert(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
	        }
		});
	}
}

var wishlist = {
	'add': function(product_id) {
		$.ajax({
			url: 'index.php?route=account/wishlist/add',
			type: 'post',
			data: 'product_id=' + product_id,
			dataType: 'json',
			success: function(json) {
				$('.alert').remove();

				if (json['redirect']) {
					location = json['redirect'];
				}

				if (json['success']) {
					$('#content').parent().before('<div class="alert alert-success"><i class="fa fa-check-circle"></i> ' + json['success'] + ' <button type="button" class="close" data-dismiss="alert">&times;</button></div>');
				}

				$('#wishlist-total span').html(json['total']);
				$('#wishlist-total').attr('title', json['total']);

				$('html, body').animate({ scrollTop: 0 }, 'slow');
			},
	        error: function(xhr, ajaxOptions, thrownError) {
	            alert(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
	        }
		});
	},
	'remove': function() {

	}
}

var compare = {
	'add': function(product_id) {
		$.ajax({
			url: 'index.php?route=product/compare/add',
			type: 'post',
			data: 'product_id=' + product_id,
			dataType: 'json',
			success: function(json) {
				$('.alert').remove();

				if (json['success']) {
					$('#content').parent().before('<div class="alert alert-success"><i class="fa fa-check-circle"></i> ' + json['success'] + ' <button type="button" class="close" data-dismiss="alert">&times;</button></div>');

					$('#compare-total').html(json['total']);

					$('html, body').animate({ scrollTop: 0 }, 'slow');
				}
			},
	        error: function(xhr, ajaxOptions, thrownError) {
	            alert(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
	        }
		});
	},
	'remove': function() {

	}
}

/* Agree to Terms */
$(document).delegate('.agree', 'click', function(e) {
	e.preventDefault();

	$('#modal-agree').remove();

	var element = this;

	$.ajax({
		url: $(element).attr('href'),
		type: 'get',
		dataType: 'html',
		success: function(data) {
			html  = '<div id="modal-agree" class="modal">';
			html += '  <div class="modal-dialog">';
			html += '    <div class="modal-content">';
			html += '      <div class="modal-header">';
			html += '        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>';
			html += '        <h4 class="modal-title">' + $(element).text() + '</h4>';
			html += '      </div>';
			html += '      <div class="modal-body">' + data + '</div>';
			html += '    </div';
			html += '  </div>';
			html += '</div>';

			$('body').append(html);

			$('#modal-agree').modal('show');
		}
	});
});

// Autocomplete */
(function($) {
	$.fn.autocomplete = function(option) {
		return this.each(function() {
			this.timer = null;
			this.items = new Array();

			$.extend(this, option);

			$(this).attr('autocomplete', 'off');

			// Focus
			$(this).on('focus', function() {
				this.request();
			});

			// Blur
			$(this).on('blur', function() {
				setTimeout(function(object) {
					object.hide();
				}, 200, this);
			});

			// Keydown
			$(this).on('keydown', function(event) {
				switch(event.keyCode) {
					case 27: // escape
						this.hide();
						break;
					default:
						this.request();
						break;
				}
			});

			// Click
			this.click = function(event) {
				event.preventDefault();

				value = $(event.target).parent().attr('data-value');

				if (value && this.items[value]) {
					this.select(this.items[value]);
				}
			}

			// Show
			this.show = function() {
				var pos = $(this).position();

				$(this).siblings('ul.dropdown-menu').css({
					top: pos.top + $(this).outerHeight(),
					left: pos.left
				});

				$(this).siblings('ul.dropdown-menu').show();
			}

			// Hide
			this.hide = function() {
				$(this).siblings('ul.dropdown-menu').hide();
			}

			// Request
			this.request = function() {
				clearTimeout(this.timer);

				this.timer = setTimeout(function(object) {
					object.source($(object).val(), $.proxy(object.response, object));
				}, 200, this);
			}

			// Response
			this.response = function(json) {
				html = '';

				if (json.length) {
					for (i = 0; i < json.length; i++) {
						this.items[json[i]['value']] = json[i];
					}

					for (i = 0; i < json.length; i++) {
						if (!json[i]['category']) {
							html += '<li data-value="' + json[i]['value'] + '"><a href="#">' + json[i]['label'] + '</a></li>';
						}
					}

					// Get all the ones with a categories
					var category = new Array();

					for (i = 0; i < json.length; i++) {
						if (json[i]['category']) {
							if (!category[json[i]['category']]) {
								category[json[i]['category']] = new Array();
								category[json[i]['category']]['name'] = json[i]['category'];
								category[json[i]['category']]['item'] = new Array();
							}

							category[json[i]['category']]['item'].push(json[i]);
						}
					}

					for (i in category) {
						html += '<li class="dropdown-header">' + category[i]['name'] + '</li>';

						for (j = 0; j < category[i]['item'].length; j++) {
							html += '<li data-value="' + category[i]['item'][j]['value'] + '"><a href="#">&nbsp;&nbsp;&nbsp;' + category[i]['item'][j]['label'] + '</a></li>';
						}
					}
				}

				if (html) {
					this.show();
				} else {
					this.hide();
				}

				$(this).siblings('ul.dropdown-menu').html(html);
			}

			$(this).after('<ul class="dropdown-menu"></ul>');
			$(this).siblings('ul.dropdown-menu').delegate('a', 'click', $.proxy(this.click, this));

		});
	}
})(window.jQuery);






jQuery(document).ready(function($){
    
function f_slider(equy){
    if(equy==0){
        var currentSlide = 0;
    }else{
        var currentSlide = $('.main_slider').slick('slickCurrentSlide');
    }   
    setTimeout(function(){
        var act_s = $('.slick-track>div').eq(currentSlide);
        act_s.find( "div.preus" ).animate({
                opacity: 1
            }, 1000, function() {
                  setTimeout(function(){
                      act_s.find( "div.preus" ).animate({
                          opacity: 0
                        }, 1000)
                  },2000);
            });
          },1500);
   }
    
    
$('.main_slider').on('init', function(event, slick){f_slider(0);});
    $('.main_slider').slick({
        dots: false,
        infinite: true,
        arrows: true,
        speed: 500,
        fade: true,
        cssEase: 'linear',
        autoplay:true,
        autoplaySpeed:6000
    });
$('.main_slider').on('afterChange',function(slick, currentSlide){  f_slider(1);   });
$('.main_slider').on('beforeChange',function(slick, currentSlide, nextSlide){  $('.slick-track>div').eq(nextSlide).find( "div.preus").css('opacity','0');   });

    
    
    
    $('.m_categs_l>li>a,.categs_left .sub_menu>li>span').on('click',function(e){
		e.preventDefault();
        if($(this).siblings('span').hasClass('fa-caret-down')){
            $(this).siblings('span').removeClass('fa-caret-down');
            $(this).siblings('span').addClass('fa-caret-up');
             $(this).siblings('ul').show('fast');
             $(this).addClass('active_menu');
        }else{
            $(this).siblings('span').addClass('fa-caret-down');
            $(this).siblings('span').removeClass('fa-caret-up');
            $(this).siblings('ul').hide('fast');
            $(this).removeClass('active_menu');
        }
    });
    
    
    $('.our_w_slider').slick({
         dots: false,
        infinite: true,
        arrows: true,
        speed: 600,
        slidesToShow: 4,
        slidesToScroll: 4,
        autoplay: true,
        autoplaySpeed: 2000,
        responsive: [
            {
              breakpoint: 1150,
              settings: {
                slidesToShow: 3,
                slidesToScroll: 3
              }
            },
            {
              breakpoint: 900,
              settings: {
                slidesToShow: 2,
                slidesToScroll: 2,
                arrows: false
              }
            },
            {
              breakpoint: 600,
              settings: {
                slidesToShow: 1,
                slidesToScroll: 1,
                arrows: false
              }
            }
            ,
            {
              breakpoint: 400,
              settings: {
                slidesToShow: 1,
                slidesToScroll: 1,
                arrows: false
              }
            }
           
          ]
    });
    $('.vid_b').slick({
        dots: true,
        arrows: false,
        fade: true,
        speed: 600
    });
    
    $('.show_text_m').on('click',function(){
        $(this).addClass('hide');
        $('.hide_text_m').removeClass('hide');
        $('.m_dasc_text').show('fast')
    })   
    $('.hide_text_m').on('click',function(){
        $(this).addClass('hide');
        $('.show_text_m').removeClass('hide');
        $('.m_dasc_text').hide('fast')
    }) 
  
    
    $('.phome_menu').on('click',function(){
        $('.top_menu').toggleClass('show_menu');
    })
    
    $('button.recall').on('click',function(){
        $('.back_int, .return_call').removeClass('hide');
    })
    
    $('.return_call .close').on('click',function(){
        $('.back_int, .return_call').addClass('hide');
    })
  
    $('.call_act_back button.top_r_links').on('click',function(){
        var link = $('form.call_act_back').attr('action');
        var tel = /^(\+){0,}[0-9\s-]+$/i;
        var name = /^[а-яё\s]+$/i;
        var testform = 0;
        
       if(!tel.test($('.call_act_back input[name="tel"]').val())){
            testform+=1;
            $('.call_act_back input[name="tel"]').parent().parent().addClass("has-error");
       }
       if(!name.test($('.call_act_back input[name="fio"]').val())){
            testform+=1;
            $('.call_act_back input[name="fio"]').parent().parent().addClass("has-error");
       }
       if($('.call_act_back textarea').val().length<2){
            testform+=1;
            $('.call_act_back textarea').parent().parent().addClass("has-error");
       }
       if(testform == 0){
            $.ajax({
                type:'POST',
                url: link,
                data: $('form.call_act_back').serialize(),
                success: function(ans){
                   $('.call_act_back')[0].reset();
                   $('.call_act_back').append('<div class="alert alert-success"><i class="fa fa-check-circle"></i>Сообщение отправлено!</div>');
                   setTimeout(function(){
                      $('.call_act_back').children('.alert.alert-success').remove();
                      $('.back_int, .return_call').addClass('hide');
                   },1000)
                }
            })
        }
    })
    
    $('.call_act_back input,.call_act_back textarea').on('input',function(){
        $('.call_act_back .form-group').removeClass('has-error');
    })
    
    
    
    $('form.content_footer button').on('click',function(){
        var link = $('form.content_footer').attr('action');
        var email = /^[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$/;
        var name = /^[а-яё\s]+$/i;
        var testform = 0;
        if(!email.test($('form.content_footer input[name="mail"]').val())){
            testform+=1;
            $('form.content_footer input[name="mail"]').addClass("has-error");
       }
       
       if(!name.test($('form.content_footer input[name="name"]').val())){
            testform+=1;
            $('form.content_footer input[name="name"]').addClass("has-error");
       }
       
       if(testform == 0){
            $.ajax({
                type:'POST',
                url: link,
                data: $('form.content_footer').serialize(),
                success: function(ans){
                  $('form.content_footer')[0].reset();
                   $('form.content_footer').append('<div class="alert alert-success"><i class="fa fa-check-circle"></i>Сообщение отправлено!</div>');
                   setTimeout(function(){
                      $('form.content_footer').children('.alert.alert-success').remove();
                   },1000)
                }
            })
        }
    });
    $("form.content_footer input").on('input',function(){
        $("form.content_footer input").removeClass('has-error');
    })
    
    
    
    
    $('.contact_form_send').on('click',function(){
        var link = $('form.contactform').attr('action');
        var email = /^[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$/;
        var name = /^[а-яё\s]+$/i;
        var tel = /^(\+){0,}[0-9\s-]+$/i;
        var testform = 0;
        
        if(!tel.test($('form.contactform input[name="tel"]').val())){
            testform+=1;
            $('form.contactform input[name="tel"]').parent().parent().addClass("has-error");
       }
       if(!email.test($('form.contactform input[name="mail"]').val())){
            testform+=1;
            $('form.contactform input[name="mail"]').parent().parent().addClass("has-error");
       }
       if(!name.test($('form.contactform input[name="name"]').val())){
            testform+=1;
            $('form.contactform input[name="name"]').parent().parent().addClass("has-error");
       }
       if($('form.contactform textarea').val().length<2){
            testform+=1;
            $('form.contactform textarea').parent().parent().addClass("has-error");
       }
       if(testform == 0){
            $.ajax({
                type:'POST',
                url: link,
                data: $('form.contactform').serialize(),
                success: function(ans){
                  $('form.contactform')[0].reset();
                   $('form.contactform').append('<div class="alert alert-success"><i class="fa fa-check-circle"></i>Сообщение отправлено!</div>');
                   setTimeout(function(){
                      $('form.contactform').children('.alert.alert-success').remove();
                   },1000)
                }
            })
        }
   });
    $('form.contactform input').on('input',function(){
        $("form.contactform .form-group").removeClass('has-error');
    })
      
    $('body').on('change','select[name="area"]',function(){
        var valarea = $(this).val();
        if(valarea == 'all'){
            $('select[name="city"]').html('<option value="all">-- Выбрать город --</option>');
            $('select[name="sklad"]').html('');
            $('select[name="city"]').attr('disabled','disabled');
            $('select[name="sklad"]').attr('disabled','disabled');
        }else{
            $.ajax({
                type: 'POST',
                url: '/index.php?route=checkout/shipping_method/getCitys',
                data:'area='+valarea,
                success: function(ans){
                    var cityes = JSON.parse(ans);
                    $('select[name="city"]').html('<option value="all">-- Выбрать город --</option>');
                    cityes.forEach(function(item, i, arr) {
                        $('select[name="city"]').append("<option valcity='"+item.Ref+"'>"+item.DescriptionRu+"</option>");
                    });
                    $('select[name="city"]').removeAttr('disabled');
                      $('select[name="sklad"]').html('').attr('disabled','disabled');
                 }
            })
        }
    })
    
    
     $('body').on('change','select[name="city"]',function(){
         var valcity = $(this).val();
         var elem_sel =$(this); 
         var select_index = elem_sel[0].selectedIndex;
         var name_city = elem_sel[0][elem_sel[0].selectedIndex].attributes[0].nodeValue;
         if(valcity == 'all'){
             $('select[name="sklad"]').attr('disabled','disabled');
              $('select[name="sklad"]').html('');
         }else{
             $.ajax({
                type: 'POST',
                url: '/index.php?route=checkout/shipping_method/getWarehouses',
                data:'valcity='+name_city+'&namecity'+valcity,
                success: function(ans){
                    var sklads = JSON.parse(ans);
                    $('select[name="sklad"]').html('');
                    sklads.forEach(function(item, i, arr) {
                        if(item.TotalMaxWeightAllowed==0){
                            $('select[name="sklad"]').append("<option>"+item.DescriptionRu+"</option>");
                        }else{
                            $('select[name="sklad"]').append("<option>"+item.DescriptionRu + " (до " + item.TotalMaxWeightAllowed+"кг)</option>");
                        }
                    });
                    $('select[name="sklad"]').removeAttr('disabled','disabled');
                 }
            })
         }
     })
    
    $('body').on('change','input[name="shipping_method"]',function(){
        var ch_tak = $(this).val();
        if(ch_tak == 'novayapochta.novayapochta'){
            $('.novaya_pochta_set').removeClass('hide');
        }else{
             $('.novaya_pochta_set').addClass('hide');
        }
    })
})


function addLink() {
    var body_element = document.getElementsByTagName('body')[0];
    var selection = window.getSelection();

    // Вы можете изменить текст в этой строчке
    var pagelink = "<a href='"+document.location.href+"'>"+document.location.href+"</a>";
    var copytext = pagelink;
    var newdiv = document.createElement('div');
    newdiv.style.position = 'absolute';
    newdiv.style.left = '-99999px';
    body_element.appendChild(newdiv);
    newdiv.innerHTML = copytext;
    selection.selectAllChildren(newdiv);
    window.setTimeout( function() {
        body_element.removeChild(newdiv);
    }, 0);
}
document.oncopy = addLink;



var message="Function Disabled!";
function clickIE4(){
	if (event.button==2){alert(message);return false;}
}
function clickNS4(e){
	if (document.layers||document.getElementById&&!document.all){
		if (e.which==2||e.which==3){
			alert(message);return false;
		}
	}
}
if (document.layers){
	document.captureEvents(Event.MOUSEDOWN);document.onmousedown=clickNS4;
}else if (document.all&&!document.getElementById){
	document.onmousedown=clickIE4;
}
document.oncontextmenu=new Function("alert(message);return false")
$(document).ready(function(){
	$(document).bind("contextmenu",function(e){    
		return false;
		});
	});


                