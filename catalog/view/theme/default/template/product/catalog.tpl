<?php echo $header; ?>
<div class="container">
  <h1 class='categ_title'>Продукция</h1>
  
   
      
      <?php /* if ($thumb || $description) { ?>
      <div class="row">
        <?php if ($thumb) { ?>
        <div class="col-sm-2"><img src="<?php echo $thumb; ?>" alt="<?php echo $heading_title; ?>" title="<?php echo $heading_title; ?>" class="img-thumbnail" /></div>
        <?php } ?>
        <?php if ($description) { ?>
        <div class="col-sm-10"><?php echo $description; ?></div>
        <?php } ?>
      </div>
      <hr>
      <?php } ?>
      <?php if ($categories) { ?>
      <h3><?php echo $text_refine; ?></h3>
      <?php if (count($categories) <= 5) { ?>
      <div class="row">
        <div class="col-sm-3">
          <ul>
            <?php foreach ($categories as $category) { ?>
            <li><a href="<?php echo $category['href']; ?>"><?php echo $category['name']; ?></a></li>
            <?php } ?>
          </ul>
        </div>
      </div>
      <?php } else { ?>
      <div class="row">
        <?php foreach (array_chunk($categories, ceil(count($categories) / 4)) as $categories) { ?>
        <div class="col-sm-3">
          <ul>
            <?php foreach ($categories as $category) { ?>
            <li><a href="<?php echo $category['href']; ?>"><?php echo $category['name']; ?></a></li>
            <?php } ?>
          </ul>
        </div>
        <?php } ?>
      </div>
      <?php } ?>
      <?php } */ ?>
      <?php if ($products) { /*?>
      <p><a href="<?php echo $compare; ?>" id="compare-total"><?php echo $text_compare; ?></a></p> */?>
      
        
      
      <br />
      <div class='pull-right col-md-8 sort_count'>
          <div class="row">
          <?php /*<div class="col-md-3">
          <div class="btn-group hidden-xs">
            <button type="button" id="list-view" class="btn btn-default" data-toggle="tooltip" title="<?php echo $button_list; ?>"><i class="fa fa-th-list"></i></button>
            <button type="button" id="grid-view" class="btn btn-default" data-toggle="tooltip" title="<?php echo $button_grid; ?>"><i class="fa fa-th"></i></button>
          </div> 
        </div>*/ ?>
        <?php /*<div class="col-md-2 text-right">
          <label class="control-label" for="input-sort"><?php echo $text_sort; ?></label> 
        </div>*/?>
        <?php /*<div class="col-md-3 text-right">
          <select id="input-sort" class="form-control" onchange="location = this.value;">
            <?php foreach ($sorts as $sorts) { ?>
            <?php if ($sorts['value'] == $sort . '-' . $order) { ?>
            <option value="<?php echo $sorts['href']; ?>" selected="selected"><?php echo $sorts['text']; ?></option>
            <?php } else { ?>
            <option value="<?php echo $sorts['href']; ?>"><?php echo $sorts['text']; ?></option>
            <?php } ?>
            <?php } ?>
          </select> 
        </div>*/?>
        
        <div class="col-md-2 text-right pull-right">
          <select id="input-limit" class="form-control" onchange="location = this.value;">
            <?php foreach ($limits as $limits) { ?>
            <?php if ($limits['value'] == $limit) { ?>
            <option value="<?php echo $limits['href']; ?>" selected="selected"><?php echo $limits['text']; ?></option>
            <?php } else { ?>
            <option value="<?php echo $limits['href']; ?>"><?php echo $limits['text']; ?></option>
            <?php } ?>
            <?php } ?>
          </select>
        </div>
              <div class="col-md-2 text-right pull-right">
          <label class="control-label" for="input-limit"><?php echo $text_limit; ?></label>
        </div>
          </div>
          </div>
          <div class="products_rig categs_pr">
        <?php foreach ($products as $product) { ?>
          <div class='on_of_main_prod product-layout product-list col-xs-12'>
                <div class="pad_in_pr">
                    <div class='in_img'>
                        <a href="<?php echo $product['href']; ?>">
                            <img class='img_dfast'  src='<?php echo $product['image']; ?>'/>
                        </a>
                    </div>
                    <h2 class='same_pr_title'><a href='<?php echo $product['href']; ?>'><?php echo $product['name']; ?></a></h2>
                   <div class='m_p_price'><?php echo $product['price'][0]; ?><span class="min_kop"><?php echo $product['price'][1]; ?></span> грн.
                    </div>
                </div>
             </div>
          
          
          
          
          
          
          
          
          
          
          
          
          
        <?php } ?>
      </div>
      <?php echo $column_left; ?>
      <div class="row">
        <div class="col-sm-6 text-left"><?php echo $pagination; ?></div>
        <div class="col-sm-6 text-right"><?php echo $results; ?></div>
      </div>
      <?php } ?>
      <?php if (!$categories && !$products) { ?>
      <p><?php echo $text_empty; ?></p>
      <div class="buttons">
        <div class="pull-right"><a href="<?php echo $continue; ?>" class="btn btn-primary"><?php echo $button_continue; ?></a></div>
      </div>
      <?php } ?>
      <?php echo $content_bottom; ?>
   </div>
</div>
<?php echo $footer; ?>
