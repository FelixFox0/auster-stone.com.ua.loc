<?php echo $header; ?><?php echo $column_left; ?>
<div id="content">
  <div class="page-header">
    <div class="container-fluid">
      <div class="pull-right">
        <button type="submit" form="form-product" data-toggle="tooltip" title="<?php echo $button_save; ?>" onclick="$('#form-save_sk').submit()" class="btn btn-primary"><i class="fa fa-save"></i></button>
        <a href="<?php echo $cancel; ?>" data-toggle="tooltip" title="<?php echo $button_cancel; ?>" class="btn btn-default"><i class="fa fa-reply"></i></a></div>
      <h1><?php echo $heading_title; ?></h1>
      <ul class="breadcrumb">
        <?php foreach ($breadcrumbs as $breadcrumb) { ?>
        <li><a href="<?php echo $breadcrumb['href']; ?>"><?php echo $breadcrumb['text']; ?></a></li>
        <?php } ?>
      </ul>
    </div>
  </div>
    <div class="container-fluid">
    <?php if ($error_warning) { ?>
    <div class="alert alert-danger"><i class="fa fa-exclamation-circle"></i> <?php echo $error_warning; ?>
      <button type="button" class="close" data-dismiss="alert">&times;</button>
    </div>
    <?php } ?>
    <div class="panel panel-default">
      <div class="panel-heading">
        <h3 class="panel-title"><i class="fa fa-pencil"></i> <?php echo $text_form; ?></h3>
      </div>
      <div class="panel-body">
          <form action="<?php echo $action; ?>" method="post" enctype="multipart/form-data" id="form-save_sk" class="form-horizontal">
              <div class="form-group required">
                <label class="col-sm-2 control-label" for="input-name">
                    <?php echo $entry_name; ?>
                </label>
                <div class="col-sm-10">
                    <input type="text" name="name" value="<?php echo $val_name; ?>" placeholder="<?php echo $entry_name; ?>" id="input-name" class="form-control" />
                  <?php if (isset($error_name)) { ?>
                  <div class="text-danger"><?php echo $error_name; ?></div>
                  <?php } ?>
                </div>
              </div>
              <div class="form-group required">
                <label class="col-sm-2 control-label" for="input-razmer">
                    <?php echo $entry_razmer; ?>
                </label>
                <div class="col-sm-10">
                  <input type="text" name="razmer" value="<?php echo $val_razmer; ?>" placeholder="<?php echo $entry_razmer; ?>" id="input-razmer" class="form-control" />
                  <?php if (isset($error_razmer)) { ?>
                  <div class="text-danger"><?php echo $error_razmer; ?></div>
                  <?php } ?>
                </div>
              </div>
              <div class="form-group required">
                <label class="col-sm-2 control-label">
                    <?php echo $entry_type_time; ?>
                </label>
                <div class="col-sm-10">
                  <label class="radio-inline">
                    <input type="radio" name="type_time" value="0" <?php if($val_type_time == 0)echo 'checked'; ?> />
                     <?php echo $text_totime; ?>
                   </label>
                    <label class="radio-inline">
                    <input type="radio" name="type_time" value="1"<?php if($val_type_time == 1)echo 'checked'; ?> />
                     <?php echo $text_neog; ?>
                   </label>
                </div>
              </div>
              <div class="form-group required time_div <?php if($val_type_time == 1)echo 'hidden'; ?>">
                <label class="col-sm-2 control-label" for="input-time">
                    <?php echo $entry_time; ?>
                </label>
                <div class="col-sm-10">
                  <input type="text" name="time" value="<?php echo $val_time; ?>" placeholder="<?php echo $entry_time; ?>" id="input-time" class="form-control" />
                  <?php if (isset($error_time)) { ?>
                  <div class="text-danger"><?php echo $error_time; ?></div>
                  <?php } ?>
                </div>
              </div>
              
              <div class="form-group required">
                <label class="col-sm-2 control-label">
                    <?php echo $entry_type; ?>
                </label>
                <div class="col-sm-10">
                  <label class="radio-inline">
                    <input type="radio" name="type_skidki" value="0" <?php if($val_type_skidki == 0)echo 'checked'; ?> />
                     <?php echo $text_tousers; ?>
                   </label>
                    <label class="radio-inline">
                    <input type="radio" name="type_skidki" value="1" <?php if($val_type_skidki == 1)echo 'checked'; ?> />
                     <?php echo $text_tocategs; ?>
                   </label>
                </div>
              </div> 
              
               
              <div class="form-group required f_us_div <?php if($val_type_skidki == 1)echo 'hidden'; ?>">
                <label class="col-sm-2 control-label" for="input-users">
                    <?php echo $entry_users; ?>
                </label>
                <div class="col-sm-10">
                    <select name="input-users[]" id="input-users" class="form-control" multiple="multiple">
                        <?php if(isset($all_cust)){
                            foreach ($all_cust as $user) {
                                echo "<option ";
                                if(in_array($user['customer_id'],$val_input_users)){
                                    echo'selected';
                                }
                                echo " value='".$user['customer_id']."'>".$user['fio']."</option>";
                            }
                        } ?>
                    </select>
                      <?php if (isset($error_input_users)) { ?>
                  <div class="text-danger"><?php echo $error_input_users; ?></div>
                  <?php } ?>              
                </div>
              </div>
              
              <div class="form-group required f_cat_div <?php if($val_type_skidki == 0)echo 'hidden'; ?>">
                <label class="col-sm-2 control-label" for="input-categs">
                    <?php echo $entry_categs; ?>
                </label>
                <div class="col-sm-10">
                    <select name="input-categs[]" id="input-users" class="form-control" multiple="multiple">
                        <?php if(isset($all_categs)){
                            foreach ($all_categs as $categ) {
                                echo "<option ";
                                if(in_array($categ['category_id'],$val_input_categs)){
                                    echo'selected';
                                }
                                echo " value='".$categ['category_id']."'>".$categ['name']."</option>";
                            }
                        } ?>
                    </select>
                      <?php if (isset($error_input_categs)) { ?>
                  <div class="text-danger"><?php echo $error_input_categs; ?></div>
                  <?php } ?>              
                </div>
              </div>
              
          </form>
      </div>
     </div>
    </div>
 </div>
<?php echo $footer; ?>

<script>
jQuery(document).ready(function($){
    $('[name="type_time"]').on('change',function(){
        if($(this).val() == 0){
            $('.time_div').removeClass('hidden');
        }else{
            $('.time_div').addClass('hidden');
        }
    })
    
    $('[name="time"]').datetimepicker({
        format: 'YYYY-MM-DD HH:mm:00'
    })
    $('[name="type_skidki"]').on('change',function(){
        if($(this).val()==0){
            $('.f_us_div').removeClass('hidden');
            $('.f_cat_div').addClass('hidden');
        }else{
            $('.f_us_div').addClass('hidden');
            $('.f_cat_div').removeClass('hidden');
        }
    })
})
</script>
