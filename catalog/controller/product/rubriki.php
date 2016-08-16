<?php
class ControllerProductRubriki extends Controller {
	public function index() {
        $data = array();
        $this->load->language('information/information');
        $this->load->language('catalog/rubriki');
       $this->load->model('catalog/information');
       $this->load->model('catalog/rubriki');
        
       $nrubrica = $this->model_catalog_rubriki->getCategory($this->request->get['path']);
       
        
             $main_categs= $this->model_catalog_rubriki->getCategories();
                $count=0;
                foreach($main_categs as $cat){
                    $main_categs[$count]['url'] = $this->url->link('product/rubriki', 'path='.$cat['rubriki_id']);
                    $main_categs[$count]['path'] = $cat['rubriki_id'];
                    $main_categs[$count]['child']=$this->model_catalog_rubriki->getCategories($cat['rubriki_id']);
                    if($main_categs[$count]['child']){
                         $catcount = 0;
                       foreach($main_categs[$count]['child'] as $children){
                           $main_categs[$count]['child'][$catcount]['url'] = $this->url->link('product/rubriki', 'path='.$children['rubriki_id']);
                           $main_categs[$count]['child'][$catcount]['path'] = $children['rubriki_id'];
                            $main_categs[$count]['child'][$catcount]['child']=$this->model_catalog_rubriki->getCategories($children['rubriki_id']);
                            if($main_categs[$count]['child'][$catcount]['child']){
                                $keys = 0;
                                foreach ($main_categs[$count]['child'][$catcount]['child'] as $asd){
                                    $main_categs[$count]['child'][$catcount]['child'][$keys]['url'] = $this->url->link('product/rubriki', 'path='.$asd['rubriki_id']);
                                    $main_categs[$count]['child'][$catcount]['child'][$keys]['path'] = $asd['path'];
                                    $keys++;
                                }
                            }
                            $catcount++;
                       }
                    }
                    $count++;
                }
                
                $data['main_categs']=$main_categs;
        
        
       $blog_arr = array();
       $limitInform = 10;
       $blog_arr['limit']= $limitInform;
       $blog_arr['path']= $this->request->get['path'];
       $data['path_now'] = $blog_arr['path'];
       if (isset($this->request->get['page'])) {
                $blog_arr['offset'] = ($this->request->get['page']-1)*$limitInform;
            }
       $informations = $this->model_catalog_information->getInformationsBlog($blog_arr);
      
        
        
        $data['title_blog'] = $this->language->get('title_blog');
        $data['no_information'] = $this->language->get('no_information');
        $data['heading_title']= $nrubrica['name'];
        $this->load->model('tool/image');
        
       if($informations){
            $this->document->setDescription($nrubrica['meta_description']);
            $this->document->setKeywords($nrubrica['meta_keyword']);
            $this->document->addLink($this->url->link('product/rubriki', 'path=' . $this->request->get['path']), 'canonical');
            $this->document->addScript('catalog/view/javascript/jquery/magnific/jquery.magnific-popup.min.js');
            $this->document->addStyle('catalog/view/javascript/jquery/magnific/magnific-popup.css');
            $this->document->addScript('catalog/view/javascript/jquery/datetimepicker/moment.js');
            $this->document->addScript('catalog/view/javascript/jquery/datetimepicker/locale/'.$this->session->data['language'].'.js');
            $this->document->addScript('catalog/view/javascript/jquery/datetimepicker/bootstrap-datetimepicker.min.js');
            $this->document->addStyle('catalog/view/javascript/jquery/datetimepicker/bootstrap-datetimepicker.min.css');
           
            $information_total = $this->model_catalog_information->getTotalInformation($blog_arr);
            
           
            if (isset($this->request->get['page'])) {
                $page = $this->request->get['page'];
            }else{
                $page=1;
            }
            
            $pagination = new Pagination();
            $pagination->total =  $information_total;
            $pagination->page = $page;
            $pagination->limit = $limitInform;
            $pagination->url = $this->url->link('information/statti', 'page={page}');
            $data['pagination'] = $pagination->render();
            
            
            
            
            
           
            
            $data['informations']=array();
            foreach ($informations as $inf){
                if(isset($inf['image'])){
                    $img = $this->model_tool_image->resize($inf['image'], $this->config->get('config_image_popup_width'), $this->config->get('config_image_popup_height'));
                }else{
                    $img = false;
                }
                if(isset($inf['description'])){
                    $description = utf8_substr(strip_tags(html_entity_decode($inf['description'], ENT_QUOTES, 'UTF-8')), 0, 350) . '..';
                }else{
                    $description = false;
                }
                
                $data['informations'][]=array(
                    'name'          => $inf['title'],
                    'description'   => $description,
                    'img'           => $img,
                    'href'          => $this->url->link('information/information','information_id='.$inf['information_id'])
                );
            }
       }else{
           
       }
       
        $data['footer'] = $this->load->controller('common/footer');
	$data['header'] = $this->load->controller('common/header');
       
       if (file_exists(DIR_TEMPLATE . $this->config->get('config_template') . '/template/product/rubriki.tpl')) {
                $this->response->setOutput($this->load->view($this->config->get('config_template') . '/template/product/rubriki.tpl', $data));
        } else {
                $this->response->setOutput($this->load->view('default/template/product/rubriki.tpl', $data));
        }

    }
}
