<?php echo $header; ?>
<div class="container">
 <h1 class='title_blog titsep'><?php echo $heading_title; ?></h1>
   <div class="blog_cont">
        <?php if(isset($informations)){ ?>
            <div class='outer_inform'>
           <?php foreach($informations as $inf){ ?>
                <div class='one_info row'>
                     <?php if($inf['img']){
                         echo "<div class='col-md-3 col-sm-5'><a href='".$inf['href']."'><img src='".$inf['img']."'/></a></div>";
                         echo "<div class='col-md-8 col-sm-7'>";
                     }else{
                          echo "<div class='col-md-12'>";
                     } ?>
                        <div class='in_b_tit'><a href='<?php echo $inf['href'] ?>'><?php echo $inf['name']; ?></a></div>
                        <div class='in_b_desc'><?php echo $inf['description']; ?></div>
                    </div>
                
            <?php  } ?></div><?php 
            
        }else{ ?> 
            
        <?php } ?>
            </div>
      <div class="categs_left rubriki_cats">
            <ul class='m_categs_l rubrics_l'>
                <?php              foreach($main_categs as $cat){
                    if($path_now == $cat['path']){ $classt = 'active_menu'; }else{$classt = '';}
                    
                        
                        echo "<li><a href='".$cat['url']."' class='".$classt."'>".$cat['name']."</a>";
                   
                    
                        if(!empty($cat['child'])){
                            if($path_now == $cat['path']){
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
                } ?>
            </ul>
        </div>
      <div class="row">
        <div class="col-sm-6 text-left"><?php if(isset($pagination)) echo $pagination; ?></div>
      </div>
    
      
      
   </div>
</div>
<?php echo $footer; ?>
