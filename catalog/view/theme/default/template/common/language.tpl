<?php if (count($languages) > 1) { ?>
<div class="pull-left">
<form action="<?php echo $action; ?>" method="post" enctype="multipart/form-data" id="language">
  <div class="btn-group languages_f">
    
      
    
      <?php foreach ($languages as $language) { 
          if($language['code'] == 'uk'){
              $language['name']='УКР';
          }elseif($language['code'] == 'ru'){
              $language['name']='РУС';
          }
          ?>
      <a <?php if ($language['code'] == $code) { ?> class='active_lang' <?php } ?> href="<?php echo $language['code']; ?>"><?php echo $language['name']; ?></a>
      <?php } ?>
    
  </div>
  <input type="hidden" name="code" value="" />
  <input type="hidden" name="redirect" value="<?php echo $redirect; ?>" />
</form>
</div>
<?php } ?>
