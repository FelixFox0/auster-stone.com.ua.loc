<?php echo $header; ?>


<div class="our_t">
    <h2 class='titsep'><?php echo $text_our_prod; ?></h2>
    <div class='desc_our'><?php echo $desc_our; ?></div>
    <div class="our_two_col">
        
        
        <div class="products_rig">
            <?php foreach($elite_products as $product_n){ ?>
            <div class='on_of_main_prod'>
                <div class="pad_in_pr">
                    <div class='in_img'>
                        <a href="<?php echo $product_n['href']; ?>">
                            <img class='img_dfast'  src='<?php echo $product_n['image']; ?>'/>
                        </a>
                    </div>
                    <h2 class='same_pr_title'><a href='<?php echo $product_n['href']; ?>'><?php echo $product_n['name']; ?></a></h2>
                    <div class='m_p_price'><?php echo $product_n['price'][0]; ?><span class="min_kop"><?php echo $product_n['price'][1]; ?></span> грн.
                    </div>
                </div>
             </div>
            <?php ; } ?>
        </div>
        
        
        
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
        
        
        <div class="clear"></div>
    </div>
</div>
<div class="under_tov">
    <div class='cent_under_tov'>
        <div class="col-md-4"><?php echo $first_del_text; ?></div>
        <div class="col-md-5">
            <div class='np_back'><img src='catalog/view/theme/default/image/np_back.png'></div>
            <div class="np_text"><?php echo $second_del_text; ?></div>
        </div>
        <div class="col-md-3">
            <div class='np_back_l'><img src='catalog/view/theme/default/image/carts_r.png'></div>
            <div class="np_text_l"><?php echo $third_del_text; ?></div>
        </div>
        <div class="clear"></div>
    </div>
</div>
<div class="banners_main">
    <img src='catalog/view/theme/default/image/left_banner.png'>   
    <img src='catalog/view/theme/default/image/right_banner.png'>   
</div>
<div class="our_uslugi">
       <h2 class='titsep'><?php echo $our_uslugi; ?></h2>
     <div class='desc_our'><?php echo $our_uslugi_desc; ?></div>
     <div class="three_bl_cont">
         <div class="one_of_usl">
             <img src='<?php echo $uslugi_first_thumb; ?>'/>
             <div class="titl_usl"><?php echo $uslugi_first_header; ?></div>
             <div class="desc_usl"><?php echo $uslugi_first_descr; ?></div>
         </div>
         <div class="one_of_usl">
               <img src='<?php echo $uslugi_second_thumb; ?>'/>
               <div class="titl_usl"><?php echo $uslugi_second_header; ?></div>
                <div class="desc_usl"><?php echo $uslugi_second_descr; ?></div>
         </div>
         <div class="one_of_usl">
             <img src='<?php echo $uslugi_third_thumb; ?>'/>
             <div class="titl_usl"><?php echo $uslugi_third_header; ?></div>
             <div class="desc_usl"><?php echo $uslugi_third_descr; ?></div>
         </div>
     </div>
</div>
<div class="oure_work">
     <h2 class='titsep'><?php echo $our_work; ?></h2>
     <div class='desc_our'><?php echo $our_work_desc; ?></div>
     <div class="our_w_slider">
         <?php if(!empty($galerys)){              
                 foreach ($galerys as $galery) { ?>
         <div><a href='<?php echo $galery['galery_link']; ?>'><img src="<?php echo $galery['img'];  ?>"></a></div>
         <?php } } ?>
 
     </div>
</div>
<div class="main_b_video">
     <h2 class='titsep'><?php echo $video_title; ?></h2>
     <div class='desc_our'><?php echo $video_desc; ?></div>
     <div class="vid_b">
	 <?php foreach($all_vids_m as $now_vid){
		 echo "<div>".html_entity_decode($now_vid)."</div>";
	 } ?>
     </div>
</div>
<div class="show_more_bl">
    <span><?php echo $show_more_text; ?></span> <a href='<?php echo $catalog_link; ?>'><?php echo $show_more_link; ?></a>
</div>
<div class="perevagi">
    <h2 class='titsep'><?php echo $preim_title; ?></h2>
     <div class='desc_our'><?php echo $preim_desc; ?></div>
     <div class="three_bl_per">
         <div class="one_bl_perev">
             <h4 class='per_tit'><?php echo $preimbl1_title; ?></h4>
             <ul>
				 <?php foreach($preimbl1 as $preimbl11){
					 echo "<li><span><img src='catalog/view/theme/default/image/ic1.png' /></span><span>".html_entity_decode($preimbl11)."</span></li>";
				 } ?>
            </ul>
         </div>
         <div class="one_bl_perev">
              <h4 class='per_tit'><?php echo $preimbl2_title; ?></h4>
             <ul>
              <?php foreach($preimbl2 as $preimbl22){
					 echo "<li><span><img src='catalog/view/theme/default/image/ic1.png' /></span><span>".html_entity_decode($preimbl22)."</span></li>";
				 } ?>
			</ul>
         </div>
         <div class="one_bl_perev">
              <h4 class='per_tit'><?php echo $preimbl3_title; ?></h4>
             <ul>
                <?php foreach($preimbl3 as $preimbl33){
					 echo "<li><span><img src='catalog/view/theme/default/image/ic1.png' /></span><span>".html_entity_decode($preimbl33)."</span></li>";
				 } ?>
			</ul>
         </div>
     </div>
</div>

<div class="partners">
    <h2 class='titsep'><?php echo $part_title; ?></h2>
     <div class='desc_our'><?php echo $part_desc; ?></div>
	 <?php 
	$co = 0;
	foreach($part_imgs as $im_c){
		if($co == 0){ echo '<div class="bl_part">'; }
		echo '<div class="img_part"><img src="/image/'.$im_c.'" alt=""></div>';
		if($co == 5){ echo '</div>'; }
		$co++;
		if($co == 6){ $co=0; }
	}
	 ?>
    
</div>
<div class="about_company_main">
     <h2 class='titsep'><?php echo $about_title; ?></h2>
     <div class='desc_our'><?php echo $about_desc; ?></div>
     <div class="aft_desc_aboutcomp"><?php echo html_entity_decode($about_descr); ?></div>
     <div class='m_dasc_text hide1'>
	 <?php $ft = 1; foreach($list_blocks as $list){ ?>
		 <div class="rift_dous">
            <div class="num_b_about">
                <span class='num_pre_ab'><?php echo $ft; ?></span>
                <div class='num_desc_ab'><?php echo $list['title']; ?></div>
            </div>
            <div class="de_b_about"><?php echo $list['after_title']; ?></div>
            <div class="de_de__about"><?php echo html_entity_decode($list['description']); ?></div>
        </div>
	<?php  $ft++; } ?>
        </div>
     <div class="buttons_main">
         <button class='show_text_m'>Смотреть больше</button>
            <button class='hide_text_m hide'>Спрятать текст</button>
     </div>
     
</div>

<?php echo $footer; ?>