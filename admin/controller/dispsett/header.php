<?php
class ControllerDispsettHeader extends Controller{
    public function index(){
            $data = array();
            $data['header'] = $this->load->controller('common/header');
            $data['column_left'] = $this->load->controller('common/column_left');
            $data['footer'] = $this->load->controller('common/footer');
            $this->load->model('dispsett/header');
            $this->load->model('tool/image');
            $this->language->load('dispsett/header');
            
            ////TEXT
            $data['header_email_text']=$this->language->get('header_email_text');
            $data['header_phone1_text']=$this->language->get('header_phone1_text');
            $data['header_phone2_text']=$this->language->get('header_phone2_text');
            ////TEXT
            
            $imgs=$this->model_dispsett_header->getImgSlider();
            $data['placeholder'] = $this->model_tool_image->resize('no_image.png', 40, 40);
            $data['form_action'] = $this->url->link('dispsett/header/edit_param','token='.$this->request->get['token']);
            $data['image'] = $this->model_tool_image->resize('no_image.png', 40, 40);
            $data['action'] = $this->url->link('dispsett/header/get_post', 'token=' . $this->session->data['token'], 'SSL');
            
            if($uslugi_first_thumb = $this->config->get('uslugi_first_thumb')){
                $data['uslugi_first_thumb'] = $this->model_tool_image->resize($uslugi_first_thumb, 40, 40);
                $data['uslugi_first_image'] = $uslugi_first_thumb;
            }else{
                $data['uslugi_first_thumb'] = $this->model_tool_image->resize('no_image.png', 40, 40);
                $data['uslugi_first_image'] = '';
            }
            
            if($uslugi_second_thumb = $this->config->get('uslugi_second_thumb')){
                $data['uslugi_second_thumb'] = $this->model_tool_image->resize($uslugi_second_thumb, 40, 40);
                $data['uslugi_second_image'] = $uslugi_second_thumb;
            }else{
                $data['uslugi_second_thumb'] = $this->model_tool_image->resize('no_image.png', 40, 40);
                $data['uslugi_second_image'] = '';
            }
            
            if($uslugi_third_thumb = $this->config->get('uslugi_third_thumb')){
                $data['uslugi_third_thumb'] = $this->model_tool_image->resize($uslugi_third_thumb, 40, 40);
                $data['uslugi_third_image'] = $uslugi_third_thumb;
            }else{
                $data['uslugi_third_thumb'] = $this->model_tool_image->resize('no_image.png', 40, 40);
                $data['uslugi_third_image'] = '';
            }
            
            
            if($header_email = $this->config->get('header_email')){
                $data['header_email'] = $header_email;
            }else{
                $data['header_email'] = '';
            }
            
            if($uslugi_header = $this->config->get('uslugi_header')){
                $data['uslugi_header'] = $uslugi_header;
            }else{
                $data['uslugi_header'] = '';
            }
            
            if($uslugi_pre_header = $this->config->get('uslugi_pre_header')){
                $data['uslugi_pre_header'] = $uslugi_pre_header;
            }else{
                $data['uslugi_pre_header'] = '';
            }
            
            if($uslugi_first_header = $this->config->get('uslugi_first_header')){
                $data['uslugi_first_header'] = $uslugi_first_header;
            }else{
                $data['uslugi_first_header'] = '';
            }
            
            if($uslugi_first_descr = $this->config->get('uslugi_first_descr')){
                $data['uslugi_first_descr'] = $uslugi_first_descr;
            }else{
                $data['uslugi_first_descr'] = '';
            }
            
            if($uslugi_second_header = $this->config->get('uslugi_second_header')){
                $data['uslugi_second_header'] = $uslugi_second_header;
            }else{
                $data['uslugi_second_header'] = '';
            }
            
            if($uslugi_second_descr = $this->config->get('uslugi_second_descr')){
                $data['uslugi_second_descr'] = $uslugi_second_descr;
            }else{
                $data['uslugi_second_descr'] = '';
            }
            
            if($uslugi_third_header = $this->config->get('uslugi_third_header')){
                $data['uslugi_third_header'] = $uslugi_second_header;
            }else{
                $data['uslugi_third_header'] = '';
            }
            
            if($uslugi_third_descr = $this->config->get('uslugi_third_descr')){
                $data['uslugi_third_descr'] = $uslugi_third_descr;
            }else{
                $data['uslugi_third_descr'] = '';
            }
            
            $data['placeholder'] = $this->model_tool_image->resize('no_image.png', 40, 40); 
            
            if($first_header = $this->config->get('first_header')){
                $data['first_header'] = $first_header;
            }else{
                $data['first_header'] = '';
            }
            
            if($first_pre_header = $this->config->get('first_pre_header')){
                $data['first_pre_header'] = $first_pre_header;
            }else{
                $data['first_pre_header'] = '';
            }
            
            if($header_phone1 = $this->config->get('header_phone1')){
                $data['header_phone1'] = $header_phone1;
            }else{
                $data['header_phone1'] = '';
            }
            
            if($header_phone2 = $this->config->get('header_phone2')){
                $data['header_phone2'] = $header_phone2;
            }else{
                $data['header_phone2'] = '';
            }
			
			if($video_title = $this->config->get('video_title')){
                $data['video_title'] = $video_title;
            }else{
                $data['video_title'] = '';
            }
			
			if($video_desc = $this->config->get('video_desc')){
                $data['video_desc'] = $video_desc;
            }else{
                $data['video_desc'] = '';
            }
			
			if($preim_title = $this->config->get('preim_title')){
                $data['preim_title'] = $preim_title;
            }else{
                $data['preim_title'] = '';
            }
			
			if($preim_desc = $this->config->get('preim_desc')){
                $data['preim_desc'] = $preim_desc;
            }else{
                $data['preim_desc'] = '';
            }
			
			if($part_title = $this->config->get('part_title')){
                $data['part_title'] = $part_title;
            }else{
                $data['part_title'] = '';
            }
			
			if($part_desc = $this->config->get('part_desc')){
                $data['part_desc'] = $part_desc;
            }else{
                $data['part_desc'] = '';
            }
			
			
			if($about_title = $this->config->get('about_title')){
                $data['about_title'] = $about_title;
            }else{
                $data['about_title'] = '';
            }
			
			if($about_desc = $this->config->get('about_desc')){
                $data['about_desc'] = $about_desc;
            }else{
                $data['about_desc'] = '';
            }
			
			if($footer_wid_title1 = $this->config->get('footer_wid_title1')){
                $data['footer_wid_title1'] = $footer_wid_title1;
            }else{
                $data['footer_wid_title1'] = '';
            }
			
			if($footer_wid_desc1 = $this->config->get('footer_wid_desc1')){
                $data['footer_wid_desc1'] = $footer_wid_desc1;
            }else{
                $data['footer_wid_desc1'] = '';
            }
			
			
			
			
			if($footer_wid_title2 = $this->config->get('footer_wid_title2')){
                $data['footer_wid_title2'] = $footer_wid_title2;
            }else{
                $data['footer_wid_title2'] = '';
            }
			
			if($footer_wid_desc2 = $this->config->get('footer_wid_desc2')){
                $data['footer_wid_desc2'] = $footer_wid_desc2;
            }else{
                $data['footer_wid_desc2'] = '';
            }
			
			if($footer_wid_title3 = $this->config->get('footer_wid_title3')){
                $data['footer_wid_title3'] = $footer_wid_title3;
            }else{
                $data['footer_wid_title3'] = '';
            }
			
			if($footer_wid_desc3 = $this->config->get('footer_wid_desc3')){
                $data['footer_wid_desc3'] = $footer_wid_desc3;
            }else{
                $data['footer_wid_desc3'] = '';
            }
			
			if($footer_wid_title4 = $this->config->get('footer_wid_title4')){
                $data['footer_wid_title4'] = $footer_wid_title4;
            }else{
                $data['footer_wid_title4'] = '';
            }
			
			if($footer_wid_desc4 = $this->config->get('footer_wid_desc4')){
                $data['footer_wid_desc4'] = $footer_wid_desc4;
            }else{
                $data['footer_wid_desc4'] = '';
            }
			
			if($footer_wid_title5 = $this->config->get('footer_wid_title5')){
                $data['footer_wid_title5'] = $footer_wid_title5;
            }else{
                $data['footer_wid_title5'] = '';
            }
			
			if($footer_wid_desc5 = $this->config->get('footer_wid_desc5')){
                $data['footer_wid_desc5'] = $footer_wid_desc5;
            }else{
                $data['footer_wid_desc5'] = '';
            }
			
			if($consult_title = $this->config->get('consult_title')){
                $data['consult_title'] = $consult_title;
            }else{
                $data['consult_title'] = '';
            }
			
			if($consult_desc = $this->config->get('consult_desc')){
                $data['consult_desc'] = $consult_desc;
            }else{
                $data['consult_desc'] = '';
            }
			
			if($preimbl1_title = $this->config->get('preimbl1_title')){
                $data['preimbl1_title'] = $preimbl1_title;
            }else{
                $data['preimbl1_title'] = '';
            }
			
			if($preimbl2_title = $this->config->get('preimbl2_title')){
                $data['preimbl2_title'] = $preimbl2_title;
            }else{
                $data['preimbl2_title'] = '';
            }
			
			if($preimbl3_title = $this->config->get('preimbl3_title')){
                $data['preimbl3_title'] = $preimbl3_title;
            }else{
                $data['preimbl3_title'] = '';
            }
            
            if($face_link = $this->config->get('face_link')){
                $data['face_link'] = $face_link;
            }else{
                $data['face_link'] = '';
            }
            
            if($inst_link = $this->config->get('inst_link')){
                $data['inst_link'] = $inst_link;
            }else{
                $data['inst_link'] = '';
            } 
			if($about_descr = $this->config->get('about_descr')){
                $data['about_descr'] = $about_descr;
            }else{
                $data['about_descr'] = '';
            }
			
            
            if($pint_link = $this->config->get('pint_link')){
                $data['pint_link'] = $pint_link;
            }else{
                $data['pint_link'] = '';
            }
            
            if($twit_link = $this->config->get('twit_link')){
                $data['twit_link'] = $twit_link;
            }else{
                $data['twit_link'] = '';
            }
			if($vk_link = $this->config->get('vk_link')){
                $data['vk_link'] = $vk_link;
            }else{
                $data['vk_link'] = '';
            }
			if($coty_foo = $this->config->get('coty_foo')){
                $data['coty_foo'] = $coty_foo;
            }else{
                $data['coty_foo'] = '';
            }
			
			if($video_sl_main = $this->config->get('video_sl_main')){
                $data['video_sl_main'] = unserialize($video_sl_main);
            }else{
                $data['video_sl_main'] = array();
            }
			
			if($my_list = $this->config->get('my_list')){
                $data['list_blocks'] = unserialize($my_list);
            }else{
                $data['list_blocks'] = array();
            }
			
			if ($chert_images = $this->config->get('chert_image')) {
				$asf = array();
				$data['chert_images'] = unserialize($chert_images);
				foreach($data['chert_images'] as $im){
					$asf[]=array(
						'thumb' => $this->model_tool_image->resize($im, 40, 40),
						'image' => $im
					);
				}
				$data['chert_images'] = $asf;
			} else {
				$data['chert_images'] = array();
			}
			
			if($preimbl1 = $this->config->get('preimbl1')){
                $data['preimbl1'] = unserialize($preimbl1);
            }else{
                $data['preimbl1'] = array();
            }
			
			if($preimbl2 = $this->config->get('preimbl2')){
                $data['preimbl2'] = unserialize($preimbl2);
            }else{
                $data['preimbl2'] = array();
            }
			
			if($preimbl3 = $this->config->get('preimbl3')){
                $data['preimbl3'] = unserialize($preimbl3);
            }else{
                $data['preimbl3'] = array();
            }
            
             if($price_file= $this->config->get('price_file')){
                $data['price_file'] = $price_file;
            }
            
            $imgs = $this->model_dispsett_header->getImgSlider();
            
            if(!empty($imgs)){
                $data['imgsall'] = unserialize($imgs[0]['value']);
                for($a=1;$a<=5;$a++){
                if(isset($data['imgsall'][$a])){
                        $data['image'.$a.'0'] = $data['imgsall'][$a][0]; 
                        $data['image'.$a.'1'] = $data['imgsall'][$a][1]; 
                        $data['thum'.$a.'0'] = $this->model_tool_image->resize($data['imgsall'][$a][0], 40, 40); 
                        $data['thum'.$a.'1'] = $this->model_tool_image->resize($data['imgsall'][$a][1], 40, 40); 
                    }else{
                        $data['image'.$a.'0'] ='';
                        $data['image'.$a.'1'] = '';
                        $data['thum'.$a.'0'] =$this->model_tool_image->resize('no_image.png', 40, 40); 
                        $data['thum'.$a.'1'] =$this->model_tool_image->resize('no_image.png', 40, 40);
                    }
                   
               }
            }else{
                $data['image10']=$data['image11']=$data['image20']=$data['image21']=$data['image30']=$data['image31']=$data['image40']=$data['image41']=$data['image50']=$data['image51']= '';
                $data['thum10']=$data['thum11']=$data['thum20']=$data['thum21']=$data['thum30']=$data['thum31']=$data['thum40']=$data['thum41']=$data['thum50']=$data['thum51'] = $this->model_tool_image->resize('no_image.png', 40, 40); 
            }
			
			
			
            
           $this->response->setOutput($this->load->view('dispsett/header.tpl', $data));
    }
    
    public function edit_param() {
        $data=array();
        $this->load->model('dispsett/header');
        $imagesall = array();
        for($a=1;$a<=5;$a++){
             if($this->request->post['image'.$a][0] != '' && $this->request->post['image'.$a][1] != ''){
              $imagesall[$a]=array($this->request->post['image'.$a][0],$this->request->post['image'.$a][1]); 
             }
        }
       if(!empty($imagesall)){
         $data['imagesall'] = $imagesall;
       }
        
       if(isset($this->request->post['del_file_price'])){
           $this->model_dispsett_header->deleteOpt('price_file');
       }
       
       if(isset($this->request->files['price_file']['error']) && $this->request->files['price_file']['error'] == 0){
           move_uploaded_file($this->request->files['price_file']['tmp_name'], DIR_UPLOAD . $this->request->files['price_file']['name']);
           $new_tmp = '/system/storage/upload/'.$this->request->files['price_file']['name'];
          $this->model_dispsett_header->saveOptVal('price_file',$new_tmp);
       }
       
       $this->model_dispsett_header->saveOptVal('header_email',$this->request->post['header_email']);
       $this->model_dispsett_header->saveOptVal('header_phone1',$this->request->post['header_phone1']);
       $this->model_dispsett_header->saveOptVal('header_phone2',$this->request->post['header_phone2']);
       
       $this->model_dispsett_header->saveOptVal('face_link',$this->request->post['face_link']);
       $this->model_dispsett_header->saveOptVal('inst_link',$this->request->post['inst_link']);
       $this->model_dispsett_header->saveOptVal('pint_link',$this->request->post['pint_link']);
       $this->model_dispsett_header->saveOptVal('twit_link',$this->request->post['twit_link']);
       $this->model_dispsett_header->saveOptVal('vk_link',$this->request->post['vk_link']);
       $this->model_dispsett_header->saveOptVal('first_pre_header',$this->request->post['first_pre_header']);
       $this->model_dispsett_header->saveOptVal('first_header',$this->request->post['first_header']);
       $this->model_dispsett_header->saveOptVal('uslugi_pre_header',$this->request->post['uslugi_pre_header']);
       $this->model_dispsett_header->saveOptVal('uslugi_header',$this->request->post['uslugi_header']);
       $this->model_dispsett_header->saveOptVal('uslugi_first_header',$this->request->post['uslugi_first_header']);
       $this->model_dispsett_header->saveOptVal('uslugi_first_descr',$this->request->post['uslugi_first_descr']);
       $this->model_dispsett_header->saveOptVal('uslugi_second_header',$this->request->post['uslugi_second_header']);
       $this->model_dispsett_header->saveOptVal('uslugi_second_descr',$this->request->post['uslugi_second_descr']);
       $this->model_dispsett_header->saveOptVal('uslugi_third_header',$this->request->post['uslugi_third_header']);
       $this->model_dispsett_header->saveOptVal('uslugi_third_descr',$this->request->post['uslugi_third_descr']);
       $this->model_dispsett_header->saveOptVal('uslugi_first_thumb',$this->request->post['uslugi_first_image']);
       $this->model_dispsett_header->saveOptVal('uslugi_second_thumb',$this->request->post['uslugi_second_image']);
       $this->model_dispsett_header->saveOptVal('uslugi_third_thumb',$this->request->post['uslugi_third_image']);
       
	   $this->model_dispsett_header->saveOptVal('video_title',$this->request->post['video_title']);
	   $this->model_dispsett_header->saveOptVal('video_desc',$this->request->post['video_desc']);
	   $this->model_dispsett_header->saveOptVal('preim_title',$this->request->post['preim_title']);
	   $this->model_dispsett_header->saveOptVal('preim_desc',$this->request->post['preim_desc']);
	   $this->model_dispsett_header->saveOptVal('part_title',$this->request->post['part_title']);
	   $this->model_dispsett_header->saveOptVal('part_desc',$this->request->post['part_desc']);
	   $this->model_dispsett_header->saveOptVal('about_title',$this->request->post['about_title']);
	   $this->model_dispsett_header->saveOptVal('about_desc',$this->request->post['about_desc']);
	    $this->model_dispsett_header->saveOptVal('consult_title',$this->request->post['consult_title']);
	   $this->model_dispsett_header->saveOptVal('consult_desc',$this->request->post['consult_desc']);
	   
	   
	    $this->model_dispsett_header->saveOptVal('footer_wid_title1',$this->request->post['footer_wid_title1']);
	   $this->model_dispsett_header->saveOptVal('footer_wid_desc1',$this->request->post['footer_wid_desc1']);
	   $this->model_dispsett_header->saveOptVal('footer_wid_title2',$this->request->post['footer_wid_title2']);
	   $this->model_dispsett_header->saveOptVal('footer_wid_desc2',$this->request->post['footer_wid_desc2']);
	   $this->model_dispsett_header->saveOptVal('footer_wid_title3',$this->request->post['footer_wid_title3']);
	   $this->model_dispsett_header->saveOptVal('footer_wid_desc3',$this->request->post['footer_wid_desc3']);
	   $this->model_dispsett_header->saveOptVal('footer_wid_title4',$this->request->post['footer_wid_title4']);
	   $this->model_dispsett_header->saveOptVal('footer_wid_desc4',$this->request->post['footer_wid_desc4']);
	   $this->model_dispsett_header->saveOptVal('footer_wid_title5',$this->request->post['footer_wid_title5']);
	   $this->model_dispsett_header->saveOptVal('footer_wid_desc5',$this->request->post['footer_wid_desc5']);
	   $this->model_dispsett_header->saveOptVal('coty_foo',$this->request->post['coty_foo']);
	   
	   
	   $this->model_dispsett_header->saveOptVal('about_descr',$this->request->post['about_descr']);
	   
	   $this->model_dispsett_header->saveOptVal('preimbl1_title',$this->request->post['preimbl1_title']);
	   $this->model_dispsett_header->saveOptVal('preimbl2_title',$this->request->post['preimbl2_title']);
	   $this->model_dispsett_header->saveOptVal('preimbl3_title',$this->request->post['preimbl3_title']);
       
	   if(isset($this->request->post['video'])){
		   $last_vid = array();
		   foreach($this->request->post['video'] as $video){
			   if($video != ''){
				   $last_vid[] = $video;
			   }
		   }
		   $this->model_dispsett_header->saveOptVal('video_sl_main',serialize($last_vid));
	   }
	   
	   if(isset($this->request->post['preimbl1'])){
		   $preimbl1 = array();
		   foreach($this->request->post['preimbl1'] as $preimbl11){
			   if($preimbl11 != ''){
				   $preimbl1[] = $preimbl11;
			   }
		   }
		   $this->model_dispsett_header->saveOptVal('preimbl1',serialize($preimbl1));
	   }
	   
	   if(isset($this->request->post['preimbl2'])){
		   $preimbl2 = array();
		   foreach($this->request->post['preimbl2'] as $preimbl22){
			   if($preimbl22 != ''){
				   $preimbl2[] = $preimbl22;
			   }
		   }
		   $this->model_dispsett_header->saveOptVal('preimbl2',serialize($preimbl2));
	   }
	   
	   if(isset($this->request->post['preimbl3'])){
		   $preimbl3 = array();
		   foreach($this->request->post['preimbl3'] as $preimbl33){
			   if($preimbl33 != ''){
				   $preimbl3[] = $preimbl33;
			   }
		   }
		   $this->model_dispsett_header->saveOptVal('preimbl3',serialize($preimbl3));
	   }
	   
	    if(isset($this->request->post['chert_image'])){
		   $chert_image = array();
		   foreach($this->request->post['chert_image'] as $chert_image1){
			   if($chert_image1 != ''){
				   $chert_image[] = $chert_image1;
			   }
		   }
		   $this->model_dispsett_header->saveOptVal('chert_image',serialize($chert_image));
	   }
	   
	    if(isset($this->request->post['l_bl_p'])){
		   $my_list = array();
		   foreach($this->request->post['l_bl_p'] as $list){
			   if($list['title'] != '' && $list['after_title'] != '' && $list['description'] != ''){
				   $my_list[] = $list;
			   }
		   }
		   $this->model_dispsett_header->saveOptVal('my_list',serialize($my_list));
	   }
	   
	   
      
            
       $this->model_dispsett_header->saveOpt($data);
       
       $this->response->redirect($this->url->link('dispsett/header','token='.$this->request->get['token']));
    }
}