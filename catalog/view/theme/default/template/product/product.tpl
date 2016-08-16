<?php echo $header; ?>
<div class='main_product'>
     <h2 class='titsep'>Наші товари</h2>
     <div class='desc_our'>Люки українського виробника для Вашого комфорту</div>
     
     <div class='product_bloks'>
         
         <div class="right_prod_collumn">
             <h1 class='mobi_header'><?php echo $heading_title; ?></h1>
             <div class="prod_images">
                 <?php if ($thumb || $images) { ?>
                    <ul class="thumbnails">
                      <?php if ($thumb) { ?>
                      <li><a class="thumbnail" href="<?php echo $popup; ?>" title="<?php echo $heading_title; ?>"><img src="<?php echo $thumb; ?>" title="<?php echo $heading_title; ?>" alt="<?php echo $heading_title; ?>" /></a></li>
                      <?php } ?>
                      <?php if ($images) { ?>
                      <?php foreach ($images as $image) { ?>
                      <li class="image-additional"><a class="thumbnail" href="<?php echo $image['popup']; ?>" title="<?php echo $heading_title; ?>"> <img src="<?php echo $image['thumb']; ?>" title="<?php echo $heading_title; ?>" alt="<?php echo $heading_title; ?>" /></a></li>
                      <?php } ?>
                      <?php } ?>
                    </ul>
                    <?php } ?>
             </div>
             <div class="prod_name">
                 <h1 class='pc_header'><?php echo $heading_title; ?></h1>
                 <form id='product_form_send' action=''>
                     <input type='hidden' name='product_type' value='<?php echo $product_type; ?>'>
                     <input type='hidden' name='product_id' value='<?php echo $product_id;; ?>'>
                 <?php if($product_type == 2){ ?>
                 
                     
                    <div class="three_bl_sh_v_c">
                        <div class="und_th_pr">
                            <label for='shirina'><?php echo $text_shirina; ?></label>
                            <span class='sp_f_inp'>
                               <input type='text' name='shirina' id='shirina' value='250' min_val='250'>
                               <span class='sp_f_inp_line'></span>
                               <span class='sp_f_inp_top'></span>
                               <span class='sp_f_inp_down'></span>
                            </span>
                        </div>
                        <div class="und_th_pr">
                            <label for="dlina"><?php echo $text_dlina; ?></label>
                            <span class='sp_f_inp'>
                               <input type='text' name='dlina' id='dlina'  value='200' min_val='200'>
                               <span class='sp_f_inp_line'></span>
                               <span class='sp_f_inp_top'></span>
                               <span class='sp_f_inp_down'></span>
                            </span>
                        </div>
                        <div class="und_th_pr">
                            <label class="control-label" for="quantity"><?php echo $entry_qty; ?></label>
                            <span class='sp_f_inp'>
                           <input type="text" name="quantity" value="<?php echo $minimum; ?>" min_val='<?php echo $minimum; ?>' id="quantity" class="" />
                           
                           <span class='sp_f_inp_line'></span>
                               <span class='sp_f_inp_top'></span>
                               <span class='sp_f_inp_down'></span>
                            </span>
                        </div>
                        <div class="clear"></div>
                    </div>
                     
                     <?php }else if($product_type == 3 || $product_type == 4){ ?>
                        <div class='prod_atts'>
                            <div class="form-group">
                                <label class="control-label" for="dlin_resh">Длина решетки (мм):</label>
                                    <input name="dlin_resh" type='text' id="dlin_resh" class="form-control" value='300'>
                            </div>
                           <div class="form-group">
                                <label class="control-label" for="count_shcheley">Количество щелей:</label>
                                    <select name="count_shcheley" id="count_shcheley" class="form-control">
                                        <option value="1">1 щелевая</option>
                                      <?php if($product_type == 3){ ?>
                                        <option value="2">2 щелевая</option>
                                        <option value="3">3 щелевая</option>
                                        <option value="4">4 щелевая</option>
                                      <?php } ?>
                                    </select>
                            </div>
                            <div class="form-group">
                                <label class="control-label" for="quantity">Количество решеток:</label>
                                    <input type="text" name="quantity" value="<?php echo $minimum; ?>" min_val='<?php echo $minimum; ?>' id="quantity" class="form-control" />
                            </div>
                            <div class="form-group">
                                <label class="control-label" for="type_resh">Тип решетки:</label>
                                    <select name="type_resh" id="type_resh" class="form-control">
                                        <option value='SD'>Линейный диффузор с краями с обеих сторон</option>
                                        <option value='SN'>Линейный диффузор без краев</option>
                                        <option value='SL'>Линейный диффузор с левым краем</option>
                                        <option value='SR'>Линейный диффузор с правым краем</option>
                                    </select>
                            </div>
                            <div class="form-group">
                                <label class="control-label" for="dlin_proz">Длина прорезей:</label>
                                    <select name="dlin_proz" id="dlin_proz" class="form-control">
                                        <option value='20'>20 мм</option>
                                        <option value='24'>24 мм</option>
                                    </select>
                            </div>
                            <div class="form-group">
                                <label class="control-label" for="color_d">Цвет дефлектора:</label>
                                    <select name="color_d" id="color_d" class="form-control">
                                        <option value='B'>Черный</option>
                                        <option value='W'>Белый</option>
                                    </select>
                            </div>
                            <div class="form-group ral_f_g">
                                <label class="control-label" for="ral_color">Цвет решетки по <a href='<?php echo     $product_color_ral; ?>' target='_blank'>RAL</a>:</label>
                                <input type='text' name="ral_color" id="ral_color" class="form-control" placeholder="Пример: 3012" maxlength="4">
                            </div>
                          </div>
                     
                     
                     
                     
                     <?php }else if($product_type == 5){ ?>
                          <div class='prod_atts'>
                                <div class="form-group">
                                    <label class="control-label" for="quantity">Количество решеток:</label>
                                        <input type="text" name="quantity" value="<?php echo $minimum; ?>" min_val='<?php echo $minimum; ?>' id="quantity" class="form-control" />
                                </div>
                                <div class="form-group">
                                    <div class='row'>
                                        <div class='col-sm-2'>Длина:</div>
                                        <div class='col-sm-5'><?php echo $dl_sh['val_baz_dlin']; ?> мм.</div>
                                        <input type='hidden' name='dlina' value='<?php echo $dl_sh['val_baz_dlin']; ?>'>
                                    </div>
                                </div>
                                <div class="form-group">
                                  <div class='row'>
                                    <div class='col-sm-2'>Ширина:</div>
                                    <div class='col-sm-5'><?php echo $dl_sh['val_baz_shir']; ?> мм.</div>
                                    <input type='hidden' name='shirina' value='<?php echo $dl_sh['val_baz_shir']; ?>'>
                                  </div>
                                </div>
                          </div>
                     <?php }else{ ?>
                        <div class='prod_atts'>
                                <div class="form-group">
                                    <label class="control-label" for="quantity">Количество решеток:</label>
                                        <input type="text" name="quantity" value="<?php echo $minimum; ?>" min_val='<?php echo $minimum; ?>' id="quantity" class="form-control" />
                                </div>
                        </div>
                     <?php } ?>
                     
                     
                     
                     
                     
                     
                    
                    <div class="dop_charact">
                        <h2><?php echo $text_dop_char; ?></h2>
                        <div class='text_dop_char'><?php echo $dop_char; ?></div>
                    </div>
                    <div class="product_prices">
                        <?php if($skidka){ ?>
                        <div class='old_price'>
                            <div>
                                <span class='text_old_pr'><?php echo $text_old_pr; ?></span>
                                <span class='text_old_pr_count'><?php echo $full_price[0]; ?><span class='kop'><?php echo $full_price[1]; ?></span>грн.</span>
                            </div>
                            <div>
                                <span class='text_skidka'><?php echo $text_skidka; ?></span>
                                <span class='text_skidka_count'><?php echo $skidka; ?>%</span>
                            </div>
                        </div>
                        <div class='now_price'>
                            <div>
                                <span class='text_now_pr'><?php echo $text_now_pr; ?></span>
                                <span class='text_now_pr_count'><?php echo $n_price[0]; ?><span class='kop'><?php echo $n_price[1]; ?></span>грн.</span>
                            </div>
                            <div>
                                <span class='text_ekonom'><?php echo $text_ekonom; ?></span>
                                <span class='text_econom_count'><?php echo $econom[0]; ?><span class='kop'><?php echo $econom[1]; ?></span>грн.</span>
                            </div>
                        </div>
                        <?php }else{ ?>
                            <div class='now_price'>
                               <div>
                                   <span class='text_now_pr'>Цена</span>
                                   <span class='text_now_pr_count'><?php echo $luk_price_fist[0]; ?><span class='kop'><?php echo $luk_price_fist[1]; ?></span>грн.</span>
                               </div>

                           </div>
                        <?php } ?>
                    </div>
                 </form>
                 <button class='pr_cart' id='button-cart' data-loading-text="Добавление в корзину"><?php echo $text_to_cart; ?></button>
                 
             </div>
             <div class="clear"></div>
             <div class='bot_pr_blocks'>
                     <ul class="nav nav-tabs">
                        <li class="active"><a href="#tab-description" data-toggle="tab"><?php echo $tab_description; ?></a></li>
                        <li><a href="#tab-razmeri" data-toggle="tab"><?php echo $tab_razmeri; ?></a></li>
                        <li><a href="#tab-chertezi" data-toggle="tab"><?php echo $tab_chertezi; ?></a></li>
                        <li><a href="#tab-sertificati" data-toggle="tab"><?php echo $tab_sertificati; ?></a></li>
                        <li><a href="#tab-delivery" data-toggle="tab"><?php echo $tab_delivery; ?></a></li>
                        
                      </ul>
                 <div class="tab-content">
                    <div class="tab-pane active" id="tab-description"><?php echo $description; ?></div>
                    <div class="tab-pane" id="tab-razmeri">
                        <?php if($product_type == 2 && $luk_price){ ?>
                        <table class='table_class_lik'>
                            <tbody>
                                <tr>
                                    <td rowspan="100" class="tablename sideA">
                                        <div class="sideA-vertical">
                                            <strong><?php echo $text_dlina; ?></strong>
                                        </div>
                                    </td>
                                    <td colspan="100" class="tablename sideB">            
                                        <strong><?php echo $text_shirina; ?></strong>            
                                    </td>
                                </tr>
                                <tr>
                                    <th></th>
                                    <?php for($a=250;$a<=1000;$a+=50){
                                        echo "<th>$a</th>";
                                    } ?>
                                </tr>
                                <?php  for($b=200;$b<=1000;$b+=50){
                                echo '<tr>';
                                echo '<td>'.$b.'</td>';
                                    for($c=250;$c<=1000;$c+=50){
                                        echo '<td';
                                        if(isset($green_field[$c][$b])){
                                            echo' class="green_td" ';
                                        }
                                        echo '>'.$product_curs*$luk_price[$c][$b].'грн.</td>';
                                    } 
                                echo '</tr>';
                            }  ?>
                            </tbody>
                        </table>
                        <?php }elseif($product_type == 3){ 
                            ?>
                             <table class='table_class_lik'>
                            <tbody>
                                <tr>
                                    <td></td>
                                    <td>1000 мм</td>
                                    <td>2000 мм</td>
                                    <td>3000 мм</td>
                                    <td>4000 мм</td>
                                    <td>5000 мм</td>
                                    <td>6000 мм</td>
                                    <td>7000 мм</td>
                                    <td>8000 мм</td>
                                    <td>9000 мм</td>
                                    <td>10000 мм</td>
                                </tr>
                                <?php 
                                for($a=1;$a<=4;$a++){ ?>
                                <tr>
                                    <td><?php echo $a; ?>-щелевая</td>
                                    <td><?php echo $pr_f_tab['val_'.$a.'_shch']; ?> грн.</td>
                                    <?php 
                                        for($b=2;$b<=10;$b++){ ?>
                                            <td><?php echo $pr_f_tab['val_'.$a.'_shch']*$b*0.8; ?> грн.</td>
                                        <?php }
                                    ?>
                                </tr>
                                <?php } ?>
                               
                            </tbody>
                             </table>
                        
                        <?php }elseif($product_type == 4){ ?>
                             <table class='table_class_lik'>
                            <tbody>
                                <tr>
                                    <td></td>
                                    <td>1000 мм</td>
                                    <td>2000 мм</td>
                                    <td>3000 мм</td>
                                    <td>4000 мм</td>
                                    <td>5000 мм</td>
                                    <td>6000 мм</td>
                                    <td>7000 мм</td>
                                    <td>8000 мм</td>
                                    <td>9000 мм</td>
                                    <td>10000 мм</td>
                                </tr>
                                
                                <tr>
                                    <td>1-щелевая</td>
                                    <td><?php echo $pr_f_tab['val_1_shch']; ?> грн.</td>
                                    <?php 
                                        for($b=2;$b<=10;$b++){ ?>
                                            <td><?php echo $pr_f_tab['val_1_shch']*$b*0.8; ?> грн.</td>
                                        <?php }
                                    ?>
                                </tr>
                                
                               
                            </tbody>
                             </table>
                        <?php } ?>
                      
                    </div>
                    <div class="tab-pane" id="tab-chertezi">
                         <?php if ($chert) { ?>
                    <ul class="thumbnails">
                      
                      
                      <?php foreach ($chert as $image) { ?>
                      <li class="image-additional"><a class="thumbnail" href="<?php echo $image['popup']; ?>" title="<?php echo $heading_title; ?>"> <img src="<?php echo $image['thumb']; ?>" title="<?php echo $heading_title; ?>" alt="<?php echo $heading_title; ?>" /></a></li>
                      <?php } ?>
                     
                    </ul>
                    <?php } ?>
                    </div>
                    <div class="tab-pane" id="tab-sertificati">
                         <?php if ($sert) { ?>
                    <ul class="thumbnails">
                      
                      
                      <?php foreach ($sert as $image) { ?>
                      <li class="image-additional"><a class="thumbnail" href="<?php echo $image['popup']; ?>" title="<?php echo $heading_title; ?>"> <img src="<?php echo $image['thumb']; ?>" title="<?php echo $heading_title; ?>" alt="<?php echo $heading_title; ?>" /></a></li>
                      <?php } ?>
                     
                    </ul>
                    <?php } ?>
                    </div>
                    <div class="tab-pane" id="tab-delivery"><?php echo $dostavka; ?></div>
                 </div>
                 </div>
         </div>
         <div class='left_prod_collumn only_products'>
             <?php echo $column_left; ?>
         </div>
         <div class="clear"></div>
         
         
         
         
         
         <div class='product_comment'>
         <?php if ($review_status) { ?>
         <form class="form-horizontal" id="form-review">
                <div id="review"></div>
         <?php if ($review_guest) { ?>
                
                    
                    <?php if($customer_name){ ?>
         <div class="form-group">
                  <div class="col-sm-12">
                      <label class="control-label" for="input-name"><?php echo $customer_name; ?></label>
                        <input type="hidden" name="name" value="<?php echo $customer_name; ?>" id="input-name" class="form-control" />
                        </div>
                </div>
                    <?php }else{ ?>
                        <div class="form-group required">
                  <div class="col-sm-12">
                        <label class="control-label" for="input-name"><?php echo $entry_name; ?></label>
                         <input type="text" name="name" value="" id="input-name" class="form-control" />
                         </div>
                </div>
                    <?php } ?>
                  
                <div class="form-group required">
                  <div class="col-sm-12">
                    <label class="control-label" for="input-review"><?php echo $entry_review; ?></label>
                    <textarea name="text" rows="5" id="input-review" class="form-control"></textarea>
                    <div class="help-block"><?php echo $text_note; ?></div>
                  </div>
                </div>
                <div class="form-group required">
                  <div class="col-sm-12">
                    <label class="control-label"><?php echo $entry_rating; ?></label>
                    &nbsp;&nbsp;&nbsp; <?php echo $entry_bad; ?>&nbsp;
                    <input type="radio" name="rating" value="1" />
                    &nbsp;
                    <input type="radio" name="rating" value="2" />
                    &nbsp;
                    <input type="radio" name="rating" value="3" />
                    &nbsp;
                    <input type="radio" name="rating" value="4" />
                    &nbsp;
                    <input type="radio" name="rating" value="5" />
                    &nbsp;<?php echo $entry_good; ?></div>
                </div>
                <?php echo $captcha; ?>
                <div class="buttons clearfix">
                  <div class="pull-right">
                    <button type="button" id="button-review" data-loading-text="<?php echo $text_loading; ?>" class="btn btn-primary"><?php echo $button_continue; ?></button>
                  </div>
                </div>
                <?php } else { ?>
                <?php echo $text_login; ?>
                <?php } ?>
              </form>
            
            <?php } ?>
         </div>
         
         
         
         
     </div>
</div>

<script type="text/javascript">
jQuery(document).ready(function($){
    
   
      $('form').keydown(function(event){
        if(event.keyCode == 13) {
          event.preventDefault();
          return false;
      }
   });
    var reg_ral = /[0-9]{4}/;
    $('#ral_color').on('input',function(){
        $('.ral_f_g').removeClass('has-error');
        
    })
    
    $('button.pr_cart').on('click',function(){
        $.ajax({
            url: 'index.php?route=checkout/cart/add',
            type: 'post',
            data: $('form#product_form_send').serialize(),
            beforeSend: function() {
                var test_ral_i = reg_ral.test($('#ral_color').val());
                if($('#ral_color').length && !test_ral_i){
                    $('.ral_f_g').addClass('has-error');
                    return false;
                }
                    $('#button-cart').button('loading');
            },
            complete: function() {
                    $('#button-cart').button('reset');
            },
            success: function(data){
                $('html, body').animate({ scrollTop: 0 }, 'slow');
                $('header .t_cart a').text(data.m_tot);
            }
        });
    })
    
    
    function research_t(){
        $.ajax({
                url: 'index.php?route=product/product/reloadRrice',
                type: 'post',
		data: $('#product_form_send').serialize(),
                success: function(result){
                   var outtext = $.parseJSON(result);
                    if(outtext.full_price != undefined){
                       $('.text_old_pr_count').html(outtext.full_price[0]+'<span class="kop">'+outtext.full_price[1]+'</span>грн.'); 
                       $('.text_econom_count').html(outtext.econom[0]+'<span class="kop">'+outtext.econom[1]+'</span>грн.'); 
                       $('.text_now_pr_count').html(outtext.n_price[0]+'<span class="kop">'+outtext.n_price[1]+'</span>грн.'); 
                       $('.text_skidka_count').html(outtext.skidka+'%'); 
                    }else{
                        $('.text_now_pr_count').html(outtext.luk_price_fist[0]+'<span class="kop">'+outtext.luk_price_fist[1]+'</span>грн.'); 
                    }
                    //
                }
            });
    }
    
    var test_v = /^[0-9]+$/;
    $('#shirina, #dlina,#quantity').on('change',function(){
        var min_val = +$(this).attr('min_val');
        var max_val = 2000;
        var now_val = +$(this).val();
        if(test_v.test(now_val)){
            if(now_val>max_val){
                $(this).val(max_val);
            }else if(now_val<min_val){
                $(this).val(min_val);
            }
            research_t();
        }
    });
    
    $('.sp_f_inp_top').on('click',function(){
        var n_input = $(this).siblings('input');
        var now_val = +n_input.val();
        var max_val = 2000;
        var next_c = now_val+1;
            if(next_c>max_val){
                n_input.val(max_val);
            }else{
                n_input.val(next_c);
            }
        research_t();
    })
    
    $('.sp_f_inp_down').on('click',function(){
        var n_input = $(this).siblings('input');
        var now_val = +n_input.val();
        var min_val = +n_input.attr('min_val');
        var next_c = now_val-1;
            if(next_c<min_val){
                n_input.val(min_val);
            }else{
                n_input.val(next_c);
            }
            research_t();
    })
    
    $('#dlin_resh,#count_shcheley').on('change',function(){
        if($('#dlin_resh').val()< 300){
            $('#dlin_resh').val('300');
        }else if($('#dlin_resh').val()> 10000){
             $('#dlin_resh').val('10000');
        }
        research_t();
    })
})

</script>
<script type="text/javascript"><!--

//--></script>
<script type="text/javascript"><!--
$('.date').datetimepicker({
	pickTime: false
});

$('.datetime').datetimepicker({
	pickDate: true,
	pickTime: true
});

$('.time').datetimepicker({
	pickDate: false
});

$('button[id^=\'button-upload\']').on('click', function() {
	var node = this;

	$('#form-upload').remove();

	$('body').prepend('<form enctype="multipart/form-data" id="form-upload" style="display: none;"><input type="file" name="file" /></form>');

	$('#form-upload input[name=\'file\']').trigger('click');

	if (typeof timer != 'undefined') {
    	clearInterval(timer);
	}

	timer = setInterval(function() {
		if ($('#form-upload input[name=\'file\']').val() != '') {
			clearInterval(timer);

			$.ajax({
				url: 'index.php?route=tool/upload',
				type: 'post',
				dataType: 'json',
				data: new FormData($('#form-upload')[0]),
				cache: false,
				contentType: false,
				processData: false,
				beforeSend: function() {
					$(node).button('loading');
				},
				complete: function() {
					$(node).button('reset');
				},
				success: function(json) {
					$('.text-danger').remove();

					if (json['error']) {
						$(node).parent().find('input').after('<div class="text-danger">' + json['error'] + '</div>');
					}

					if (json['success']) {
						alert(json['success']);

						$(node).parent().find('input').attr('value', json['code']);
					}
				},
				error: function(xhr, ajaxOptions, thrownError) {
					alert(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
				}
			});
		}
	}, 500);
});
//--></script>
<script type="text/javascript"><!--
$('#review').delegate('.pagination a', 'click', function(e) {
    e.preventDefault();

    $('#review').fadeOut('slow');

    $('#review').load(this.href);

    $('#review').fadeIn('slow');
});

$('#review').load('index.php?route=product/product/review&product_id=<?php echo $product_id; ?>');

$('#button-review').on('click', function() {
	$.ajax({
		url: 'index.php?route=product/product/write&product_id=<?php echo $product_id; ?>',
		type: 'post',
		dataType: 'json',
		data: $("#form-review").serialize(),
		beforeSend: function() {
			$('#button-review').button('loading');
		},
		complete: function() {
			$('#button-review').button('reset');
		},
		success: function(json) {
                   
			$('.alert-success, .alert-danger').remove();

			if (json['error']) {
				$('#review').after('<div class="alert alert-danger"><i class="fa fa-exclamation-circle"></i> ' + json['error'] + '</div>');
			}

			if (json['success']) {
				$('#review').after('<div class="alert alert-success"><i class="fa fa-check-circle"></i> ' + json['success'] + '</div>');

				$('input[name=\'name\']').val('');
				$('textarea[name=\'text\']').val('');
				$('input[name=\'rating\']:checked').prop('checked', false);
			}
		}
	});
});

$(document).ready(function() {
	$('.thumbnails').magnificPopup({
		type:'image',
		delegate: 'a',
		gallery: {
			enabled:true
		}
	});
});
//--></script>
<?php echo $footer; ?>
