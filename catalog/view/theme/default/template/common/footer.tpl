<footer>
    <div class="pre_footer">
        <div class="pre_footer_in">
                <div class="pre_foot_left"></div>
                <div class="pre_foot_right">
                    <div class="pre_footer_tit"><?php echo $consult_title; ?></div>
                    <div class="two_bl_un_cont">
                        <div class="left_foot_bl_c">
                            <div><?php echo $consult_desc; ?></div>
                            
                            <ul class="foot_cont">
                                <li><?php echo $header_phone1; ?></li>
                                <li><?php echo $header_phone2; ?></li>
                            </ul>
                        </div>
                        <div class="right_foot_bl_c">
                            <form action="<?php echo $footeraction; ?>" class="content_footer">
                                <input type="text" name='name' placeholder="Имя">
                                <input type="email" name='mail' placeholder="E-mail">
                                <button type="button">Получить консультацию</button>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="clear"></div>
        </div>
    </div>
    <div class="last_footer">
        <div class="l_foot_vidget">
            <div class="vid_f_o">
				<?php if($footer_wid_title1 !=''){ echo "<div class='footer_widg_tit'>".$footer_wid_title1.'</div>'; } ?>
                <?php if($footer_wid_desc1 !=''){ echo html_entity_decode($footer_wid_desc1); } ?>
            </div>
            <div class="vid_f_o">
				<?php if($footer_wid_title2 !=''){echo "<div class='footer_widg_tit'>".$footer_wid_title2.'</div>'; } ?>
                <?php if($footer_wid_desc2 !=''){ echo html_entity_decode($footer_wid_desc2); } ?>
           </div>
            <div class="vid_f_o">
				<?php if($footer_wid_title3 !=''){echo "<div class='footer_widg_tit'>".$footer_wid_title3.'</div>'; } ?>
                <?php if($footer_wid_desc3 !=''){ echo html_entity_decode($footer_wid_desc3); } ?>
            </div>
            <div class="vid_f_o">
				<?php if($footer_wid_title4 !=''){echo "<div class='footer_widg_tit'>".$footer_wid_title4.'</div>'; } ?>
                <?php if($footer_wid_desc4 !=''){ echo html_entity_decode($footer_wid_desc4); } ?>
            </div>
            <div class="vid_f_o">
				<?php if($footer_wid_title5 !=''){echo "<div class='footer_widg_tit'>".$footer_wid_title5.'</div>'; } ?>
                <?php if($footer_wid_desc5 !=''){ echo html_entity_decode($footer_wid_desc5); } ?>
            </div>
        </div>
        <div class='copy_text'><?php if($coty_foo !=''){ echo html_entity_decode($coty_foo); } ?></div>
    </div>
</footer>

</body></html>