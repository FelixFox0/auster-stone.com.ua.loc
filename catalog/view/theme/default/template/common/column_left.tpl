
<div class="categs_left">
            <ul class='m_categs_l'>
                <?php $c=0; foreach($main_categs as $cat){
                    if($c==0){
                        echo "<li><a href='".$cat['url']."' class='active_menu'>".$cat['name']."</a>";
                    }else{
                        echo "<li><a href='".$cat['url']."'>".$cat['name']."</a>";
                    }
                    
                        if(!empty($cat['child'])){
                            if($c==0){
                                 echo  "<span class='fa fa-caret-up' aria-hidden='true'></span>";
                                 echo "<ul class='sub_menu' style='display: block;'>";
                            }else{
                                 echo  "<span class='fa fa-caret-down' aria-hidden='true'></span>";
                                 echo "<ul class='sub_menu'>";
                            }
                            
                            
                            foreach ($cat['child'] as $achild){
                                  echo "<li><a href='".$achild['url']."'>".$achild['name']."</a>";
                                     if(!empty($achild['child'])){
                                         echo "<span class='fa fa-caret-down' aria-hidden='true' class='top_ar'></span>";
                                         echo "<ul class='sub_su_categ'>";
                                             foreach ($achild['child'] as $achild1){
                                                 echo "<li><a href='".$achild1['url']."'>- ".$achild1['name']."</a></li>";
                                             }
                                         echo "</ul>";
                                     }
                                   echo "</li>";
                            }
                            echo "</ul>";
                        }
                    echo "</li>";
                    $c++;
                } ?>
            </ul>
        </div>
<?php /* if ($modules) { ?>
<aside id="column-left" class="col-sm-3 hidden-xs">
  <?php foreach ($modules as $module) { ?>
  <?php echo $module; ?>
  <?php } ?>
</aside>
<?php } */ ?>
