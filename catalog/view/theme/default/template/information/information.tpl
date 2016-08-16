<?php echo $header; ?>
<div class="container">
  
  <div class="row">
    <div id="content" class="col-sm-12"><?php echo $content_top; ?>
      <h1><?php echo $heading_title; ?></h1>
      <?php echo $description; ?><?php echo $content_bottom; ?>
    </div>
      
      
      
      
     <div class='product_comment'>
         <?php if ($review_status && $blog) { ?>
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
                <?php /*
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
                </div> */ ?>
                <?php // echo $captcha; ?>
                <div class="buttons clearfix">
                  <div class="pull-right">
                    <button type="button" id="button-review" data-loading-text="Отправка" class="btn btn-primary"><?php echo $button_continue; ?></button>
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
<?php echo $footer; ?>

<script>
jQuery(document).ready(function($){
    $('#review').load('index.php?route=information/information/review&information_id=<?php echo $information_id; ?>');
    
    
    $('#button-review').on('click', function() {
	$.ajax({
		url: 'index.php?route=information/information/write&information_id=<?php echo $information_id; ?>',
		type: 'post',
		dataType: 'json',
		data: $("#form-review").serialize()+'&information=1',
		beforeSend: function() {
			$('#button-review').button('loading');
		},
		complete: function(q) {
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
    
})
</script>