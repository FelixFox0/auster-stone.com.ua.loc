<?php if ($error_warning) { ?>
<div class="alert alert-warning"><i class="fa fa-exclamation-circle"></i> <?php echo $error_warning; ?></div>
<?php } ?>
<?php if ($shipping_methods) { ?>
<p><?php echo $text_shipping_method; ?></p>
<?php foreach ($shipping_methods as $shipping_method) { /* ?>
<p><strong><?php echo $shipping_method['title']; ?></strong></p> */?>
<?php if (!$shipping_method['error']) { ?>
<?php foreach ($shipping_method['quote'] as $quote) { ?>
<div class="radio">
  <label>
    <?php if ($quote['code'] == $code || !$code) { ?>
    <?php $code = $quote['code']; ?>
    <input type="radio" name="shipping_method" value="<?php echo $quote['code']; ?>" checked="checked" />
    <?php } else { ?>
    <input type="radio" name="shipping_method" value="<?php echo $quote['code']; ?>" />
    <?php } ?>
    <?php echo $quote['title']; ?> 
    <?php if (isset($quote['description'])) { ?>
    <br /><small><?php echo $quote['description']; ?></small>
    <?php } ?>
  </label>
</div>






<?php } ?>

<?php } else { ?>
<div class="alert alert-danger"><?php echo $shipping_method['error']; ?></div>
<?php } ?>
<?php } ?>
<?php } ?>
<div class='novaya_pochta_set hide'>
    <div class="form-group required">  
         <div class="clear"></div>
        <label class="col-sm-2 control-label" for="select-area">Область</label>                
        <div class="col-sm-10">
            <select name="area" class="form-control" id='select-area'>
                <option value="all">-- Выбрать область --</option>
                <?php if(isset($areas)){
                    foreach ($areas as $area){
                        echo "<option>".$area."</option>";
                    }
                } ?>
            </select>
           
        </div>
    <div class="clear"></div>
    </div>

<div class="form-group required">  
    <div class="clear"></div>
    <label class="col-sm-2 control-label" for="select-city">Город</label>                
        <div class="col-sm-10">
            <select name="city" class="form-control" id='select-area'  disabled='disabled'>
                <option value="all">-- Выбрать город --</option>
            </select>
           
        </div>
    <div class="clear"></div>
    </div>
<div class="form-group required">  
    <div class="clear"></div>
    <label class="col-sm-2 control-label" for="select-sklad">Склад</label>                
        <div class="col-sm-10">
            <select name="sklad" class="form-control" id='select-sklad'  disabled='disabled'>
            </select>
        </div>
    <div class="clear"></div>
    </div>
</div>
<p><strong><?php echo $text_comments; ?></strong></p>
<p>
  <textarea name="comment" rows="8" class="form-control"><?php echo $comment; ?></textarea>
</p>
<div class="buttons">
  <div class="pull-right">
    <input type="button" value="<?php echo $button_continue; ?>" id="button-shipping-method" data-loading-text="<?php echo $text_loading; ?>" class="btn btn-primary" />
  </div>
</div>

