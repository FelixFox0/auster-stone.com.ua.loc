<?php echo $header; ?>
<?php echo $column_left; ?>
<div id="content">
  <div class="page-header">
    <div class="container-fluid">
      <div class="pull-right">
          <a href="<?php echo $add; ?>" data-toggle="tooltip" title="<?php echo $button_add; ?>" class="btn btn-primary"><i class="fa fa-plus"></i></a>
         <button type="button" data-toggle="tooltip" title="<?php echo $button_delete; ?>" class="btn btn-danger" onclick="confirm('<?php echo $text_confirm; ?>') ? $('#form-skidki').submit() : false;"><i class="fa fa-trash-o"></i></button>
      </div>
      <h1><?php echo $heading_title; ?></h1>
      <ul class="breadcrumb">
        <?php foreach ($breadcrumbs as $breadcrumb) { ?>
        <li><a href="<?php echo $breadcrumb['href']; ?>"><?php echo $breadcrumb['text']; ?></a></li>
        <?php } ?>
      </ul>
    </div>
  </div>
    <div class="container-fluid">
        <div class="panel panel-default">
            <div class="panel-heading">
              <h3 class="panel-title"><i class="fa fa-list"></i> <?php echo $text_list; ?></h3>
            </div>
        </div>
        <div class="panel-body">
            <form action="<?php echo $delete; ?>" method="post" enctype="multipart/form-data" id="form-skidki">
                <div class="table-responsive">
                    <table class="table table-bordered table-hover">
                        <thead>
                            <tr>
                              <td style="width: 1px;" class="text-center"><input type="checkbox" onclick="$('input[name*=\'selected\']').prop('checked', this.checked);" /></td>
                              <td class="text-center">Название скидки</td>
                              <td class="text-left">Размер скидки</td>
                              <td class="text-left">Время окончания</td>
                              <td class="text-right">Тип скидки</td>
                              <td class="text-right">Действие</td>
                            </tr>
                        <tbody>
                            <?php if(isset($all_skidki)){
                                foreach ($all_skidki as $skidka) { ?>
                            <tr>
                                <td style="width: 1px;" class="text-center">
                                    <input type="checkbox" name="selected[]" value="<?php echo $skidka['id_skidki']; ?>" />
                                </td>
                                <td class="text-center">
                                    <?php echo $skidka['name_skidki']; ?>
                                </td>
                                <td class="text-left">
                                    <?php echo $skidka['razmer_skidki']; ?>
                                </td>
                                <td class="text-left">
                                    <?php echo $skidka['type_time_skidki']; ?>
                                </td>
                                <td class="text-right">
                                   <?php echo $skidka['type_skidki']; ?>
                                </td>
                                <td class="text-right">
                                    <a href="<?php echo $skidka['edit']; ?>" data-toggle="tooltip" title="<?php echo $button_edit; ?>" class="btn btn-primary"><i class="fa fa-pencil"></i></a>
                                </td>
                               
                            </tr>    
                               <?php }
                            } ?>
                        </tbody>
                          </thead>
                    </table>
                </div>
               </form>
        </div>
    </div>
    
 </div>
<?php echo $footer; ?>
