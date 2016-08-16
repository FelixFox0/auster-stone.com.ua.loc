<?php echo $header; ?><?php echo $column_left; ?>
    <div id="content">
        <div class="page-header">
            <div class="container-fluid">
                <h1>Настройки шапки</h1>
            </div>
        </div>
        <div class="container-fluid">
            <div class="panel panel-default">
                <div class="panel-body">
                <form action="<?php echo $form_action; ?>" method="post" enctype="multipart/form-data" id="form-information" class="form-horizontal">
                     
                  
                
                <div class="tab-pane " id="language">
                  
                <div class="form-group">
                    <label class="col-sm-2 control-label"><?php echo $header_email_text; ?></label>
                    <div class="col-sm-10">
                        <input type="text" name="header_email" value="<?php echo $header_email; ?>"  id="header_email" class="form-control" />
                     </div>
                </div>
                 <div class="form-group">
                    <label class="col-sm-2 control-label"><?php echo $header_phone1_text; ?></label>
                    <div class="col-sm-10">
                      <input type="text" name="header_phone1" value="<?php echo $header_phone1; ?>"  id="header_phone1" class="form-control" />
                     </div>
                </div>
                 <div class="form-group">
                    <label class="col-sm-2 control-label"><?php echo $header_phone2_text; ?></label>
                    <div class="col-sm-10">
                      <input type="text" name="header_phone2" value="<?php echo $header_phone2; ?>"  id="header_phone2" class="form-control" />
                     </div>
                </div>
                
                   
                    
                  
                </div>
                
                <div class='socs_set'>
                            <h2>Соцсети</h2>
                    
                    <div class="form-group">
                        <label class="col-sm-2 control-label" for="face_link">Ссылка на Facebook</label>
                        <div class="col-sm-10">
                            <input type="text" name="face_link" value="<?php echo $face_link; ?>"  id="face_link" class="form-control" />
                         </div>
                    </div>
                            <div class="form-group">
                        <label class="col-sm-2 control-label" for="inst_link">Ссылка на Instagram</label>
                        <div class="col-sm-10">
                          <input type="text" name="inst_link" value="<?php echo $inst_link; ?>"  id="inst_link" class="form-control" />
                         </div>
                    </div>
                            <div class="form-group">
                        <label class="col-sm-2 control-label" for="pint_link">Ссылка на Pinterest</label>
                        <div class="col-sm-10">
                          <input type="text" name="pint_link" value="<?php echo $pint_link; ?>"  id="pint_link" class="form-control" />
                         </div>
                    </div>
                            <div class="form-group">
                        <label class="col-sm-2 control-label" for="twit_link">Ссылка на Twitter</label>
                        <div class="col-sm-10">
                          <input type="text" name="twit_link" value="<?php echo $twit_link; ?>"  id="twit_link" class="form-control" />
                         </div>
                    </div>
					<div class="form-group">
                        <label class="col-sm-2 control-label" for="vk_link">Ссылка на VK</label>
                        <div class="col-sm-10">
                          <input type="text" name="vk_link" value="<?php echo $vk_link; ?>"  id="vk_link" class="form-control" />
                         </div>
                    </div>
                           
                 </div>
                <div class='slider_set'>
                    <h2>Слайдер</h2>
                    <div class='froup_img'>
                            <div class="form-group col-sm-6">
                                <label class="col-sm-2 control-label" for="input-image10">1</label>
                                <div class="col-sm-10">
                                    <a href="" id="thumb-image10" data-toggle="image" class="img-thumbnail10">
                                        <img src="<?php echo $thum10; ?>" alt="" title="" data-placeholder="<?php echo $placeholder; ?>" />
                                    </a>
                                    <input type="hidden" name="image1[0]" value="<?php echo $image10; ?>" id="input-image10" />
                                </div>
                            </div>
                            <div class="form-group col-sm-6">
                                <label class="col-sm-2 control-label" for="input-image11">2</label>
                                <div class="col-sm-10">
                                  <a href="" id="thumb-image11" data-toggle="image" class="img-thumbnail11">
                                        <img src="<?php echo $thum11; ?>" alt="" title="" data-placeholder="<?php echo $placeholder; ?>" />
                                  </a>
                                  <input type="hidden" name="image1[1]" value="<?php echo $image11; ?>" id="input-image11" />
                                </div>
                            </div>
                        <div style='clear:both;'></div>
                        <hr/>
                         <div class="form-group col-sm-6">
                                <label class="col-sm-2 control-label" for="input-image20">1</label>
                                <div class="col-sm-10">
                                    <a href="" id="thumb-image1" data-toggle="image" class="img-thumbnail20">
                                        <img src="<?php echo $thum20; ?>" alt="" title="" data-placeholder="<?php echo $placeholder; ?>" />
                                    </a>
                                    <input type="hidden" name="image2[0]" value="<?php echo $image20; ?>" id="input-image20" />
                                </div>
                            </div>
                            <div class="form-group col-sm-6">
                                <label class="col-sm-2 control-label" for="input-image21">2</label>
                                <div class="col-sm-10">
                                  <a href="" id="thumb-image21" data-toggle="image" class="img-thumbnail21">
                                        <img src="<?php echo $thum21; ?>" alt="" title="" data-placeholder="<?php echo $placeholder; ?>" />
                                  </a>
                                  <input type="hidden" name="image2[1]" value="<?php echo $image21; ?>" id="input-image21" />
                                </div>
                            </div>
                        <div style='clear:both;'></div>
                        <hr/>
                         <div class="form-group col-sm-6">
                                <label class="col-sm-2 control-label" for="input-image30">1</label>
                                <div class="col-sm-10">
                                    <a href="" id="thumb-image30" data-toggle="image" class="img-thumbnail30">
                                        <img src="<?php echo $thum30; ?>" alt="" title="" data-placeholder="<?php echo $placeholder; ?>" />
                                    </a>
                                    <input type="hidden" name="image3[0]" value="<?php echo $image30; ?>" id="input-image30" />
                                </div>
                            </div>
                            <div class="form-group col-sm-6">
                                <label class="col-sm-2 control-label" for="input-image31">2</label>
                                <div class="col-sm-10">
                                  <a href="" id="thumb-image31" data-toggle="image" class="img-thumbnail31">
                                        <img src="<?php echo $thum31; ?>" alt="" title="" data-placeholder="<?php echo $placeholder; ?>" />
                                  </a>
                                  <input type="hidden" name="image3[1]" value="<?php echo $image31; ?>" id="input-image31" />
                                </div>
                            </div>
                        <div style='clear:both;'></div>
                        <hr/>
                         <div class="form-group col-sm-6">
                                <label class="col-sm-2 control-label" for="input-image40">1</label>
                                <div class="col-sm-10">
                                    <a href="" id="thumb-image40" data-toggle="image" class="img-thumbnail40">
                                        <img src="<?php echo $thum40; ?>" alt="" title="" data-placeholder="<?php echo $placeholder; ?>" />
                                    </a>
                                    <input type="hidden" name="image4[0]" value="<?php echo $image40; ?>" id="input-image40" />
                                </div>
                            </div>
                            <div class="form-group col-sm-6">
                                <label class="col-sm-2 control-label" for="input-image41">2</label>
                                <div class="col-sm-10">
                                  <a href="" id="thumb-image41" data-toggle="image" class="img-thumbnail41">
                                        <img src="<?php echo $thum41; ?>" alt="" title="" data-placeholder="<?php echo $placeholder; ?>" />
                                  </a>
                                  <input type="hidden" name="image4[1]" value="<?php echo $image41; ?>" id="input-image41" />
                                </div>
                            </div>
                        <div style='clear:both;'></div>
                        <hr/>
                         <div class="form-group col-sm-6">
                                <label class="col-sm-2 control-label" for="input-image50">1</label>
                                <div class="col-sm-10">
                                    <a href="" id="thumb-image50" data-toggle="image" class="img-thumbnail50">
                                        <img src="<?php echo $thum50; ?>" alt="" title="" data-placeholder="<?php echo $placeholder; ?>" />
                                    </a>
                                    <input type="hidden" name="image5[0]" value="<?php echo $image50; ?>" id="input-image50" />
                                </div>
                            </div>
                            <div class="form-group col-sm-6">
                                <label class="col-sm-2 control-label" for="input-image51">2</label>
                                <div class="col-sm-10">
                                  <a href="" id="thumb-image51" data-toggle="image" class="img-thumbnail51">
                                        <img src="<?php echo $thum51; ?>" alt="" title="" data-placeholder="<?php echo $placeholder; ?>" />
                                  </a>
                                  <input type="hidden" name="image5[1]" value="<?php echo $image51; ?>" id="input-image51" />
                                </div>
                            </div>
                        <div style='clear:both;'></div>
                        <hr/>
                        
                        
                        
                       
                        
                        
                    </div>
                    <div style='clear:both;'></div>
                    <hr>
                   
                </div>
                    <div class='pricelist'>
                        <h2>Прайс-лист для скачивания</h2>
                        <?php if(isset($price_file)){ ?>
                            <div class="form-group">
                                <label class="col-sm-2 control-label" for='input-del_file_price'>Удалить <a href='<?php echo $price_file; ?>' download>файл</a></label>
                                <div class="col-sm-10">
                                    <input type='checkbox' name='del_file_price' id='input-del_file_price'>
                                </div>
                            </div>
                        <?php } ?>
                        
                        <div class="form-group">
                            <label class="col-sm-2 control-label" for="input-price">Выбрать файл: </label>
                            <div class="col-sm-10">
                                 <input type="file" name="price_file" id="input-price" />
                            </div>
                          </div>
                    </div>
                    <div class='headers_home'>
                        <h2>Первый заголовок и описание</h2>
                        <div class="form-group">
                            <label class="col-sm-2 control-label" for="first_header">Заголовок</label>
                            <div class="col-sm-10">
                                <input type="text" name="first_header" value="<?php echo $first_header; ?>"  id="first_header" class="form-control" />
                             </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label" for="first_pre_header">Подзаголовок</label>
                            <div class="col-sm-10">
                                <input type="text" name="first_pre_header" value="<?php echo $first_pre_header; ?>"  id="first_pre_header" class="form-control" />
                             </div>
                        </div>
                     </div>
                    
                    <div class='uslugi_home'>
                        <h2>Наши услуги</h2>
                        <div class="form-group">
                            <label class="col-sm-2 control-label" for="uslugi_header">Заголовок</label>
                            <div class="col-sm-10">
                                <input type="text" name="uslugi_header" value="<?php echo $uslugi_header; ?>"  id="uslugi_header" class="form-control" />
                             </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label" for="uslugi_pre_header">Подзаголовок</label>
                            <div class="col-sm-10">
                                <input type="text" name="uslugi_pre_header" value="<?php echo $uslugi_pre_header; ?>"  id="uslugi_pre_header" class="form-control" />
                             </div>
                        </div>
                        
                        <div class="form-group">
                            <label class="col-sm-2 control-label" >Первый блок</label>
                            <div style="clear:both;"></div>
                            <div class="col-sm-4">
                                <input type="text" name="uslugi_first_header" value="<?php echo $uslugi_first_header; ?>"   class="form-control" placeholder="Заголовок"/>
                             </div>
                            <div class="col-sm-5">
                                <input type="text" name="uslugi_first_descr" value="<?php echo $uslugi_first_descr; ?>"   class="form-control"  placeholder="Подзаголовок"/>
                             </div>
                            <div class="col-sm-3">
                                <div class="form-group">
                                    <a href="" id="uslugi_first_image1" data-toggle="image" class="img-thumbnail">
                                        <img src="<?php echo $uslugi_first_thumb; ?>" alt="" title="" data-placeholder="<?php echo $placeholder; ?>" />
                                    </a>
                                    <input type="hidden" name="uslugi_first_image" value="<?php echo $uslugi_first_image; ?>" id="uslugi_first_image" />
               
                             </div>
                        </div>
                      </div>
                        
                         <div class="form-group">
                            <label class="col-sm-2 control-label" >Второй блок</label>
                            <div style="clear:both;"></div>
                            <div class="col-sm-4">
                                <input type="text" name="uslugi_second_header" value="<?php echo $uslugi_second_header; ?>"   class="form-control" placeholder="Заголовок"/>
                             </div>
                            <div class="col-sm-5">
                                <input type="text" name="uslugi_second_descr" value="<?php echo $uslugi_second_descr; ?>"   class="form-control"  placeholder="Подзаголовок"/>
                             </div>
                            <div class="col-sm-3">
                                <div class="form-group">
                                    <a href="" id="uslugi_second_image1" data-toggle="image" class="img-thumbnail">
                                        <img src="<?php echo $uslugi_second_thumb; ?>" alt="" title="" data-placeholder="<?php echo $placeholder; ?>" />
                                    </a>
                                    <input type="hidden" name="uslugi_second_image" value="<?php echo $uslugi_second_image; ?>" id="uslugi_second_image" />
                                </div>
                        </div>
                      </div>
                        
                        <div class="form-group">
                            <label class="col-sm-2 control-label" >Третий блок</label>
                            <div style="clear:both;"></div>
                            <div class="col-sm-4">
                                <input type="text" name="uslugi_third_header" value="<?php echo $uslugi_third_header; ?>"   class="form-control" placeholder="Заголовок"/>
                             </div>
                            <div class="col-sm-5">
                                <input type="text" name="uslugi_third_descr" value="<?php echo $uslugi_third_descr; ?>"   class="form-control"  placeholder="Подзаголовок"/>
                             </div>
                            <div class="col-sm-3">
                                <div class="form-group">
                                    <a href="" id="uslugi_thisd_image1" data-toggle="image" class="img-thumbnail">
                                        <img src="<?php echo $uslugi_third_thumb; ?>" alt="" title="" data-placeholder="<?php echo $placeholder; ?>" />
                                    </a>
                                    <input type="hidden" name="uslugi_third_image" value="<?php echo $uslugi_third_image; ?>" id="uslugi_third_image" />
               
                             </div>
                        </div>
                      </div>
					  <div class="form-group">
					  <h2>Видео</h2>
                            <div style="clear:both;"></div>
							<div class="col-sm-12">
							<label class="col-sm-2 control-label" >Заголовок</label>
									<input type="text" name="video_title" value="<?php echo $video_title; ?>"   class="form-control" placeholder="Заголовок"/>
								</div>
								<div class="col-sm-12">
								<label class="col-sm-2 control-label" >Подзаголовок</label>
									<input type="text" name="video_desc" value="<?php echo $video_desc; ?>"   class="form-control" placeholder="Подзаголовок"/>
								</div>
								<br/>
							<div style="clear:both; height: 20px;"></div>  
							<div class='video_cl'>
							
							<?php 
							
							if(empty($video_sl_main)){ 
							$video_row = 2;
							?>
								<div class="col-sm-12">
									<input type="text" name="video[1]" value=""   class="form-control" placeholder="Iframe вставка"/>
								</div>
							<?php }else{ 
								$video_row = 1;
								foreach($video_sl_main as $vid){ ?>
									<div class="col-sm-12">
										<input type="text" name="video[<?php echo $video_row;  ?>]" value="<?php echo $vid; ?>"   class="form-control" placeholder="Iframe вставка"/>
									</div>
								<?php 
								$video_row++;
								} ?>
							<?php } ?>
							
								
							</div>
							<button style='margin-top: 5px; margin-left: 15px;' type="button" onclick="addVideo();" data-toggle="tooltip" title="" class="btn btn-primary" data-original-title="Добавить видео"><i class="fa fa-plus-circle"></i></button>
                      
					  </div>
					  <div class='preim'>
						<h2 style='margin-top: 15px;'>Преимущества</h2>
						
						<div class="col-sm-12">
							<label class="col-sm-2 control-label" >Заголовок</label>
							<input type="text" name="preim_title" value="<?php echo $preim_title; ?>"   class="form-control" placeholder="Заголовок"/>
						</div>
						<div class="col-sm-12">
						<label class="col-sm-2 control-label" >Подзаголовок</label>
							<input type="text" name="preim_desc" value="<?php echo $preim_desc; ?>"   class="form-control" placeholder="Подзаголовок"/>
						</div>
						<br/>
						<div style="clear:both; height: 20px;"></div>
						
						<div class="col-sm-4 ">
							<div class='preimbl1'>
							<input type="text" name="preimbl1_title" value="<?php echo $preimbl1_title; ?>"   class="form-control" placeholder="Заголовок первого блока"/>
							<div style="clear:both; height: 20px;"></div>
							<?php 
							if(empty($preimbl1)){ 
							$preimbl1_row = 2;
							?>
								<input type="text" name="preimbl1[1]" value=""   class="form-control" placeholder="список"/>
								
							<?php }else{ 
								$preimbl1_row = 1;
								foreach($preimbl1 as $preim){ ?>
								<input type="text" name="preimbl1[<?php echo $preimbl1_row;  ?>]" value="<?php echo $preim; ?>"   class="form-control" placeholder="список"/>
								<?php 
								$preimbl1_row++;
								} ?>
							<?php } ?>
							</div>
							<button style='margin-top: 5px; margin-left: 15px;' type="button" onclick="addpreimbl1();" data-toggle="tooltip" title="" class="btn btn-primary" data-original-title="Добавить пункт"><i class="fa fa-plus-circle"></i></button>
							
						</div>
						
						<div class="col-sm-4 ">
							<div class='preimbl2'>
							<input type="text" name="preimbl2_title" value="<?php echo $preimbl2_title; ?>"   class="form-control" placeholder="Заголовок второго блока"/>
							<div style="clear:both; height: 20px;"></div>
							<?php 
							if(empty($preimbl2)){ 
							$preimbl2_row = 2;
							?>
								<input type="text" name="preimbl2[1]" value=""   class="form-control" placeholder="список"/>
								
							<?php }else{ 
								$preimbl2_row = 1;
								foreach($preimbl2 as $preim){ ?>
								<input type="text" name="preimbl2[<?php echo $preimbl2_row;  ?>]" value="<?php echo $preim; ?>"   class="form-control" placeholder="список"/>
								<?php 
								$preimbl2_row++;
								} ?>
							<?php } ?>
							</div>
							<button style='margin-top: 5px; margin-left: 15px;' type="button" onclick="addpreimbl2();" data-toggle="tooltip" title="" class="btn btn-primary" data-original-title="Добавить пункт"><i class="fa fa-plus-circle"></i></button>
							
						</div>
						
						<div class="col-sm-4 ">
							<div class='preimbl3'>
							<input type="text" name="preimbl3_title" value="<?php echo $preimbl3_title; ?>"   class="form-control" placeholder="Заголовок третьего блока"/>
							<div style="clear:both; height: 20px;"></div>
							<?php 
							if(empty($preimbl3)){ 
							$preimbl3_row = 2;
							?>
								<input type="text" name="preimbl3[1]" value=""   class="form-control" placeholder="список"/>
								
							<?php }else{ 
								$preimbl3_row = 1;
								foreach($preimbl3 as $preim){ ?>
								<input type="text" name="preimbl3[<?php echo $preimbl3_row;  ?>]" value="<?php echo $preim; ?>"   class="form-control" placeholder="список"/>
								<?php 
								$preimbl3_row++;
								} ?>
							<?php } ?>
							</div>
							<button style='margin-top: 5px; margin-left: 15px;' type="button" onclick="addpreimbl3();" data-toggle="tooltip" title="" class="btn btn-primary" data-original-title="Добавить пункт"><i class="fa fa-plus-circle"></i></button>
							
						</div>
						
					  </div>
					  <div style="clear:both; height: 20px;"></div>  
					  <div>
						<h2>Наши партнёры</h2>
							<div class="col-sm-12">
							<label class="col-sm-2 control-label" >Заголовок</label>
							<input type="text" name="part_title" value="<?php echo $part_title; ?>"   class="form-control" placeholder="Заголовок"/>
						</div>
						<div class="col-sm-12">
						<label class="col-sm-2 control-label" >Подзаголовок</label>
							<input type="text" name="part_desc" value="<?php echo $part_desc; ?>"   class="form-control" placeholder="Подзаголовок"/>
						</div>
						<br/>
						<div style="clear:both; height: 20px;"></div>
						<?php $chert_row = 0; ?>
					<div class='part_imgs'>
                    <?php foreach ($chert_images as $product_image) {    ?>
                    <div class='col-sm-2'>
						<a href="" id="chert-image<?php echo $chert_row; ?>" data-toggle="image" class="img-thumbnail">
						<img src="<?php echo $product_image['thumb']; ?>" alt="" title="" data-placeholder="<?php echo $placeholder; ?>" /></a>
						<input type="hidden" name="chert_image[<?php echo $chert_row; ?>]" value="<?php echo $product_image['image']; ?>" id="input-chert<?php echo $chert_row; ?>" />
					</div>

                    <?php $chert_row++; ?>
                    <?php } ?>
					</div>
                  <button style='margin-left: 15px; matgin-top: 5px;' type="button" onclick="addImageChert();" data-toggle="tooltip" title="Добавить изображение" class="btn btn-primary"><i class="fa fa-plus-circle"></i></button></td>
                   </div>
					  
					  
					  
					  
					  <div class='about_company'>
						<h2>О компании</h2>
						<div class="col-sm-12">
							<label class="col-sm-2 control-label" >Заголовок</label>
							<input type="text" name="about_title" value="<?php echo $about_title; ?>"   class="form-control" placeholder="Заголовок"/>
						</div>
						<div class="col-sm-12">
						<label class="col-sm-2 control-label" >Подзаголовок</label>
							<input type="text" name="about_desc" value="<?php echo $about_desc; ?>"   class="form-control" placeholder="Подзаголовок"/>
						</div>
						<div class="form-group">
							<label class="col-sm-2 control-label" for="about_descr"></label>
							<div class="col-sm-12">
							  <textarea name="about_descr" placeholder="Текст о компании" id="about_descr"><?php echo $about_descr; ?></textarea>
							</div>
						</div>
						
						<div class='list_blocks'>
						<?php $list_b_count = 0; 
							foreach($list_blocks as $my_list){
						?>
							<div class='row'>
								<div class='col-md-4'><input class='form-control' type='text' name='l_bl_p[<?php echo $list_b_count; ?>][title]' value='<?php echo $my_list['title'] ?>'></div>
								<div class='col-md-4'><input class='form-control' type='text' name='l_bl_p[<?php echo $list_b_count; ?>][after_title]' value='<?php echo $my_list['after_title'] ?>'></div>
								<div class='col-md-4'><textarea name="l_bl_p[<?php echo $list_b_count; ?>][description]" id="l_bl_p_descr"><?php echo $my_list['description'] ?></textarea></div>
							</div>
							<?php $list_b_count++; } ?>
						</div>
						<button style='margin-left: 15px; matgin-top: 5px;' type="button" onclick="addblockt();" data-toggle="tooltip" title="Добавить блок" class="btn btn-primary"><i class="fa fa-plus-circle"></i></button></td>
					  </div>
					  <div style="clear:both; height: 20px;"></div>
					  <div class='consult'>
						<h2>Консультация</h2>
						<div class="col-sm-12">
							<label class="col-sm-2 control-label" >Заголовок</label>
							<input type="text" name="consult_title" value="<?php echo $consult_title; ?>"   class="form-control" placeholder="Заголовок"/>
						</div>
						<div class="col-sm-12">
						<label class="col-sm-2 control-label" >Подзаголовок</label>
							<input type="text" name="consult_desc" value="<?php echo $consult_desc; ?>"   class="form-control" placeholder="Подзаголовок"/>
						</div>
					  </div>
					  <div style="clear:both; height: 20px;"></div>  
					  <div class='consult'>
						<h2>Блоки в подвале</h2>
						<div class='row'>
							<h3>Первый блок</h3>
							<div class="col-sm-6">
								<input type="text" name="footer_wid_title1" value="<?php echo $footer_wid_title1; ?>"   class="form-control" placeholder="Заголовок"/>
							</div>
							<div class="col-sm-6">
								<textarea name="footer_wid_desc1" id="footer_wid_desc1"><?php echo $footer_wid_desc1; ?></textarea>
							</div>
						</div>
						<div class='row'>
							<h3>Второй блок</h3>
							<div class="col-sm-6">
								<input type="text" name="footer_wid_title2" value="<?php echo $footer_wid_title2; ?>"   class="form-control" placeholder="Заголовок"/>
							</div>
							<div class="col-sm-6">
								<textarea name="footer_wid_desc2" id="footer_wid_desc2"><?php echo $footer_wid_desc2; ?></textarea>
							</div>
						</div>
						<div class='row'>
							<h3>Третий блок</h3>
							<div class="col-sm-6">
								<input type="text" name="footer_wid_title3" value="<?php echo $footer_wid_title3; ?>"   class="form-control" placeholder="Заголовок"/>
							</div>
							<div class="col-sm-6">
								<textarea name="footer_wid_desc3" id="footer_wid_desc3"><?php echo $footer_wid_desc3; ?></textarea>
							</div>
						</div>
						<div class='row'>
							<h3>Четвертый блок</h3>
							<div class="col-sm-6">
								<input type="text" name="footer_wid_title4" value="<?php echo $footer_wid_title4; ?>"   class="form-control" placeholder="Заголовок"/>
							</div>
							<div class="col-sm-6">
								<textarea name="footer_wid_desc4" id="footer_wid_desc4"><?php echo $footer_wid_desc4; ?></textarea>
							</div>
						</div>
						<div class='row'>
							<h3>Пятый блок</h3>
							<div class="col-sm-6">
								<input type="text" name="footer_wid_title5" value="<?php echo $footer_wid_title5; ?>"   class="form-control" placeholder="Заголовок"/>
							</div>
							<div class="col-sm-6">
								<textarea name="footer_wid_desc5" id="footer_wid_desc5"><?php echo $footer_wid_desc5; ?></textarea>
							</div>
						</div>
						
					  </div>
					  <div style="clear:both; height: 20px;"></div>  
					  <div>
						<h2>Копирайт</h2>
						<textarea name="coty_foo" id="coty_foo"><?php echo $coty_foo; ?></textarea>
					  </div>
					  
                      <div style="clear:both; height: 20px;"></div>  
                    <div class='pull-left'>
                        <button type="submit" form="form-product" data-toggle="tooltip" title="" class="btn btn-primary" data-original-title="Сохранить"><i class="fa fa-save"></i></button>
                    </div>
                </form>
                </div>
               
            </div>
        </div>
    </div>
	<script>
		var list_b_count = <?php echo $list_b_count; ?>;
		function addblockt(){
			html = "<div class='row'>";
			html += "<div class='col-md-4'><input class='form-control' type='text' name='l_bl_p["+list_b_count+"][title]'></div>";
			html += "<div class='col-md-4'><input class='form-control' type='text' name='l_bl_p["+list_b_count+"][after_title]'></div>";
			html += "<div class='col-md-4'><textarea name='l_bl_p["+list_b_count+"][description]' id='l_bl_p_descr'></textarea></div>";
			html +=	"</div>";
			$('.list_blocks').append(html);
			$('[name="l_bl_p['+list_b_count+'][description]"]').summernote({height: 150});
			list_b_count++;
		}
		
		var video_row = <?php echo $video_row; ?>;
		function addVideo(){
			html = '<div class="col-sm-12">';
			html +=	'<input type="text" name="video['+video_row+']" value=""   class="form-control" placeholder="Iframe вставка"/>';
			html +=	'</div>'
			$('.video_cl').append(html);
			video_row++;
		}
		
		var preimbl1_row = <?php echo $preimbl1_row; ?>;
		function addpreimbl1(){
			html = '<input type="text" name="preimbl1['+preimbl1_row+']" value=""   class="form-control" placeholder="список"/>';
			$('.preimbl1').append(html);
			preimbl1_row++;
		}
		
		var preimbl2_row = <?php echo $preimbl2_row; ?>;
		function addpreimbl2(){
			html = '<input type="text" name="preimbl2['+preimbl2_row+']" value=""   class="form-control" placeholder="список"/>';
			$('.preimbl2').append(html);
			preimbl1_row++;
		}
		
		var preimbl3_row = <?php echo $preimbl3_row; ?>;
		function addpreimbl3(){
			html = '<input type="text" name="preimbl3['+preimbl3_row+']" value=""   class="form-control" placeholder="список"/>';
			$('.preimbl3').append(html);
			preimbl3_row++;
		}
	
	
	var chert_row = <?php echo $chert_row; ?>;

function addImageChert() {
                html  = ' <div  class="col-sm-2">';
				html  += '<a href="" id="chert-image'+chert_row+'" data-toggle="image" class="img-thumbnail">';
				html  += '<img src="<?php echo $placeholder; ?>" alt="" title="" data-placeholder="<?php echo $placeholder; ?>" /></a>';
				html  += '<input type="hidden" name="chert_image['+chert_row+']" value="" id="input-chert'+chert_row+'" />';
				html  += '</div>';

                $('.part_imgs').append(html);

                chert_row++;
        }
$('#coty_foo,#footer_wid_desc5, #footer_wid_desc4, #footer_wid_desc3, #footer_wid_desc2, #footer_wid_desc1').summernote({height: 150});
$('#about_descr').summernote({height: 300});
<?php for($a=0;$a<=$list_b_count;$a++){ ?>
	$('[name="l_bl_p[<?php echo $a; ?>][description]"]').summernote({height: 300});
<?php } ?>

	</script>
<?php echo $footer; ?>

