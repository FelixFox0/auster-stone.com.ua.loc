<?php
class ControllerCommonHome extends Controller {
	public function index() {
		$this->document->setTitle($this->config->get('config_meta_title'));
		$this->document->setDescription($this->config->get('config_meta_description'));
		$this->document->setKeywords($this->config->get('config_meta_keyword'));
                $this->load->language('common/home');
                $this->load->model('catalog/category');
                $this->load->model('catalog/product');
		if (isset($this->request->get['route'])) {
			$this->document->addLink(HTTP_SERVER, 'canonical');
		}
                
		//$data['column_left'] = $this->load->controller('common/column_left');
		//$data['column_right'] = $this->load->controller('common/column_right');
		//$data['content_top'] = $this->load->controller('common/content_top');
		//$data['content_bottom'] = $this->load->controller('common/content_bottom');
		$data['footer'] = $this->load->controller('common/footer');
		$data['header'] = $this->load->controller('common/header');
                $data['text_our_prod'] = $this->config->get('first_header');
                $data['desc_our'] = $this->config->get('first_pre_header');
                $data['first_del_text'] = $this->language->get('first_del_text');
                $data['second_del_text'] = $this->language->get('second_del_text');
                $data['third_del_text'] = $this->language->get('third_del_text');
                $data['our_uslugi'] = $this->config->get('uslugi_header');
                $data['our_uslugi_desc'] = $this->config->get('uslugi_pre_header');
                $data['our_work'] = $this->language->get('our_work');
                $data['our_work_desc'] = $this->language->get('our_work_desc');
                $data['show_more_text'] = $this->language->get('show_more_text');
                $data['show_more_link'] = $this->language->get('show_more_link');
                
               
                
                $data['uslugi_first_header'] = $this->config->get('uslugi_first_header');
                $data['uslugi_first_descr'] = $this->config->get('uslugi_first_descr');
                $data['uslugi_second_header'] = $this->config->get('uslugi_second_header');
                $data['uslugi_second_descr'] = $this->config->get('uslugi_second_descr');
                $data['uslugi_third_header'] = $this->config->get('uslugi_third_header');
                $data['uslugi_third_descr'] = $this->config->get('uslugi_third_descr');
                $data['uslugi_first_thumb'] = '/image/'.$this->config->get('uslugi_first_thumb');
                $data['uslugi_second_thumb'] = '/image/'.$this->config->get('uslugi_second_thumb');
                $data['uslugi_third_thumb'] = '/image/'.$this->config->get('uslugi_third_thumb');
				
				
				$data['all_vids_m'] = unserialize($this->config->get('video_sl_main'));
				$data['preimbl1'] = unserialize($this->config->get('preimbl1'));
				$data['preimbl2'] = unserialize($this->config->get('preimbl2'));
				$data['preimbl3'] = unserialize($this->config->get('preimbl3'));
				
				$data['video_title'] = $this->config->get('video_title');
				$data['video_desc'] = $this->config->get('video_desc');
				
				$data['preim_title'] = $this->config->get('preim_title');
				$data['preim_desc'] = $this->config->get('preim_desc');
				
				$data['part_title'] = $this->config->get('part_title');
				$data['part_desc'] = $this->config->get('part_desc');
				
				$data['about_title'] = $this->config->get('about_title');
				$data['about_desc'] = $this->config->get('about_desc');
				$data['about_descr'] = $this->config->get('about_descr');
				
				
                $data['list_blocks'] = unserialize($this->config->get('my_list'));
           
				
                $data['preimbl1_title'] = $this->config->get('preimbl1_title');
                $data['preimbl2_title'] = $this->config->get('preimbl2_title');
                $data['preimbl3_title'] = $this->config->get('preimbl3_title');
                
				$data['part_imgs'] = unserialize($this->config->get('chert_image'));
                
                
                
                
                $data['catalog_link'] = $this->url->link('product/catalog');
                //////main page categories
                $main_categs= $this->model_catalog_category->getCategories();
                $count=0;
                foreach($main_categs as $cat){
                    $main_categs[$count]['url'] = $this->url->link('product/category', 'path='.$cat['category_id']);
                    $main_categs[$count]['child']=$this->model_catalog_category->getCategories($cat['category_id']);
                    if($main_categs[$count]['child']){
                         $catcount = 0;
                       foreach($main_categs[$count]['child'] as $children){
                           $main_categs[$count]['child'][$catcount]['url'] = $this->url->link('product/category', 'path='.$children['category_id']);
                            $main_categs[$count]['child'][$catcount]['child']=$this->model_catalog_category->getCategories($children['category_id']);
                            if($main_categs[$count]['child'][$catcount]['child']){
                                $keys = 0;
                                foreach ($main_categs[$count]['child'][$catcount]['child'] as $asd){
                                    $main_categs[$count]['child'][$catcount]['child'][$keys]['url'] = $this->url->link('product/category', 'path='.$asd['category_id']);
                                    $keys++;
                                }
                            }
                            $catcount++;
                       }
                    }
                    $count++;
                }
                $data['main_categs']=$main_categs;
               //////main page categories   
                
                
                $elite_products = $this->model_catalog_product->getPopularProducts(6);
                $this->load->model('tool/image');
                
                
                if($this->customer->isLogged()){
                            $user_id_t = $this->customer->getId();
                            $test_user_skidka = $this->model_catalog_product->test_user_skidka($user_id_t);
                        }else{
                            $test_user_skidka = false;
                        }
                
                foreach($elite_products as $product){
                    
                    /*СКИДКИ*/
                        
                        
                        $test_categ_skidka = $this->model_catalog_product->test_categ_skidka($product['product_id']);
                        
                        if($test_user_skidka && $test_categ_skidka){
                            if($test_user_skidka['razmer_skidki']>$test_categ_skidka['razmer_skidki']){
                                $data['skidka'] = $test_user_skidka['razmer_skidki'];
                            }elseif($test_user_skidka['razmer_skidki']<$test_categ_skidka['razmer_skidki']){
                                $data['skidka'] = $test_categ_skidka['razmer_skidki'];
                            }else{
                                $data['skidka'] = $test_categ_skidka['razmer_skidki'];
                            }
                        }elseif($test_user_skidka){
                            $data['skidka'] = $test_user_skidka['razmer_skidki'];
                        }elseif($test_categ_skidka){
                            $data['skidka'] = $test_categ_skidka['razmer_skidki'];
                        }else{
                            $data['skidka'] = false;
                        }
                        
                        /*Конец скидок*/
                    
                    
                    
                    
                        
                    
                    if($data['skidka']){
                        $n_pr_c=($product['price']*$product['product_curs'])/100*$data['skidka'];
                        $n_fn_c = ($product['price']*$product['product_curs'])-$n_pr_c;
                    }else{
                        $n_fn_c = $product['price']*$product['product_curs'];
                    }
                   
                    
                    
                    
                    if($product['image']){
                        $img = $this->model_tool_image->resize($product['image'], $this->config->get('config_image_thumb_width'), $this->config->get('config_image_thumb_height'));
                    } else {
                        $img = $this->model_tool_image->resize('no_image.png', $this->config->get('config_image_popup_width'), $this->config->get('config_image_popup_height'));;
                    }
                    $data['elite_products'][]=array(
                        'href' => $this->url->link('product/product','product_id='.$product['product_id']),
                        'image' => $img,
                        'name' =>$product['name'],
                        'price'=> $this->recountPrice($n_fn_c)
            
                    );
                }
                 $this->load->model('tool/image');
                $this->load->model('catalog/galery');
                
                $all_galery = $this->model_catalog_galery->getInformations();
                $data['galerys']=array();
                foreach ($all_galery as $gal) {
                    if(isset($gal['image']) && $gal['image'] !=''){
                        $img_gal = '/image/'.$gal['image'];
                    }else{
                        $img_gal = $this->model_tool_image->resize('no_image.png', 300, 225);
                    }
                    $data['galerys'][]=array(
                        'galery_link'=> $this->url->link('information/galery','galery_id='.$gal['galery_id']),
                        'img'=> $img_gal
                    );
                }
                
                
                
                
		if (file_exists(DIR_TEMPLATE . $this->config->get('config_template') . '/template/common/home.tpl')) {
			$this->response->setOutput($this->load->view($this->config->get('config_template') . '/template/common/home.tpl', $data));
		} else {
			$this->response->setOutput($this->load->view('default/template/common/home.tpl', $data));
		}
	}
        
        
         public function recountPrice($param) {
             $data = explode('.',round($param,2));
                if(!isset($data[1])){
                    $data[1] = '00';
                }elseif(strlen($data[1]) == 1){
                    $data[1].='0';
                }
                
                return $data;
                
        }
       
}