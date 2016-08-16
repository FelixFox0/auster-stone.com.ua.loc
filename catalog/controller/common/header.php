<?php
class ControllerCommonHeader extends Controller {
	public function index() {
		// Analytics
		$this->load->model('extension/extension');
                $this->currency->set('UAH');
		$data['analytics'] = array();

		$analytics = $this->model_extension_extension->getExtensions('analytics');

		foreach ($analytics as $analytic) {
			if ($this->config->get($analytic['code'] . '_status')) {
				$data['analytics'][] = $this->load->controller('analytics/' . $analytic['code']);
			}
		}

		if ($this->request->server['HTTPS']) {
			$server = $this->config->get('config_ssl');
		} else {
			$server = $this->config->get('config_url');
		}

		if (is_file(DIR_IMAGE . $this->config->get('config_icon'))) {
			$this->document->addLink($server . 'image/' . $this->config->get('config_icon'), 'icon');
		}

		$data['title'] = $this->document->getTitle();

		$data['base'] = $server;
		$data['description'] = $this->document->getDescription();
		$data['keywords'] = $this->document->getKeywords();
		$data['links'] = $this->document->getLinks();
		$data['styles'] = $this->document->getStyles();
		$data['scripts'] = $this->document->getScripts();
		$data['lang'] = $this->language->get('code');
		$data['direction'] = $this->language->get('direction');

                $data['main_slider'] = unserialize($this->config->get('img_sliders'));
                
		$data['name'] = $this->config->get('config_name');

                
                if($header_email = $this->config->get('header_email')){
                $data['header_email'] = $header_email;
            }else{
                $data['header_email'] = '';
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
                
                
		if (is_file(DIR_IMAGE . $this->config->get('config_logo'))) {
			$data['logo'] = $server . 'image/' . $this->config->get('config_logo');
		} else {
			$data['logo'] = '';
		}

		$this->load->language('common/header');
		$data['og_url'] = (isset($this->request->server['HTTPS']) ? HTTPS_SERVER : HTTP_SERVER) . substr($this->request->server['REQUEST_URI'], 1, (strlen($this->request->server['REQUEST_URI'])-1));
		$data['og_image'] = $this->document->getOgImage();

		$data['text_home'] = $this->language->get('text_home');

		// Wishlist
		if ($this->customer->isLogged()) {
			$this->load->model('account/wishlist');

			$data['text_wishlist'] = sprintf($this->language->get('text_wishlist'), $this->model_account_wishlist->getTotalWishlist());
		} else {
			$data['text_wishlist'] = sprintf($this->language->get('text_wishlist'), (isset($this->session->data['wishlist']) ? count($this->session->data['wishlist']) : 0));
		}

		$data['text_shopping_cart'] = $this->language->get('text_shopping_cart');
		$data['text_logged'] = sprintf($this->language->get('text_logged'), $this->url->link('account/account', '', 'SSL'), $this->customer->getFirstName(), $this->url->link('account/logout', '', 'SSL'));

		$data['text_account'] = $this->language->get('text_account');
		$data['text_register'] = $this->language->get('text_register');
		$data['text_login'] = $this->language->get('text_login');
		$data['text_order'] = $this->language->get('text_order');
		$data['text_transaction'] = $this->language->get('text_transaction');
		$data['text_download'] = $this->language->get('text_download');
		$data['text_logout'] = $this->language->get('text_logout');
		$data['text_lc'] = $this->language->get('text_lc');
		$data['text_checkout'] = $this->language->get('text_checkout');
		$data['text_page'] = $this->language->get('text_page');
		$data['text_category'] = $this->language->get('text_category');
		$data['text_all'] = $this->language->get('text_all');
                $data['recall'] = $this->language->get('recall');

		$data['home'] = $this->url->link('common/home');
		$data['wishlist'] = $this->url->link('account/wishlist', '', 'SSL');
		$data['logged'] = $this->customer->isLogged();
		$data['account'] = $this->url->link('account/account', '', 'SSL');
		$data['register'] = $this->url->link('account/register', '', 'SSL');
		$data['login'] = $this->url->link('account/login', '', 'SSL');
		$data['order'] = $this->url->link('account/order', '', 'SSL');
		$data['transaction'] = $this->url->link('account/transaction', '', 'SSL');
		$data['download'] = $this->url->link('account/download', '', 'SSL');
		$data['logout'] = $this->url->link('account/logout', '', 'SSL');
		$data['link_lc'] = $this->url->link('account/account', '', 'SSL');
		$data['shopping_cart'] = $this->url->link('checkout/cart');
		$data['checkout'] = $this->url->link('checkout/checkout', '', 'SSL');
		$data['contact'] = $this->url->link('information/contact');
		$data['telephone'] = $this->config->get('config_telephone');
                $data['telephone1'] = $this->config->get('config_telephone1');
                $data['m_email'] = $this->config->get('config_email');
                
                
                $this->load->model('catalog/information');
                $dostavka = $this->model_catalog_information->getInformation(6);
                $data['dostavka']['title']=$dostavka['title'];
                $data['dostavka']['url']= $this->url->link('information/information','information_id='.$dostavka['information_id']);
		
                $status = true;

		if (isset($this->request->server['HTTP_USER_AGENT'])) {
			$robots = explode("\n", str_replace(array("\r\n", "\r"), "\n", trim($this->config->get('config_robots'))));

			foreach ($robots as $robot) {
				if ($robot && strpos($this->request->server['HTTP_USER_AGENT'], trim($robot)) !== false) {
					$status = false;

					break;
				}
			}
		}

		// Menu
		$this->load->model('catalog/category');

		$this->load->model('catalog/product');

		$data['categories'] = array();

		$categories = $this->model_catalog_category->getCategories(0);

		foreach ($categories as $category) {
			if ($category['top']) {
				// Level 2
				$children_data = array();

				$children = $this->model_catalog_category->getCategories($category['category_id']);

				foreach ($children as $child) {
					$filter_data = array(
						'filter_category_id'  => $child['category_id'],
						'filter_sub_category' => true
					);

					$children_data[] = array(
						'name'  => $child['name'] . ($this->config->get('config_product_count') ? ' (' . $this->model_catalog_product->getTotalProducts($filter_data) . ')' : ''),
						'href'  => $this->url->link('product/category', 'path=' . $category['category_id'] . '_' . $child['category_id'])
					);
				}

				// Level 1
				$data['categories'][] = array(
					'name'     => $category['name'],
					'children' => $children_data,
					'column'   => $category['column'] ? $category['column'] : 1,
					'href'     => $this->url->link('product/category', 'path=' . $category['category_id'])
				);
			}
		}

		$data['language'] = $this->load->controller('common/language');
		$data['currency'] = $this->load->controller('common/currency');
		$data['search'] = $this->load->controller('common/search');
		$data['cart'] = $this->load->controller('common/cart');
                $data['cart_total'] = $this->currency->format($this->cart->getTotal()).' - ';
                $data['cart_total'] .= $this->cart->countProducts().' шт.';
                
                //////////////////////START MENU///////////////////
                $about_comp = $this->model_catalog_information->getInformation(4);
                $data['main_menu'][0] = array(
                    'name'  => $about_comp['title'],
                    'href'  => $this->url->link('information/information', 'information_id=4'),
                    'active' =>false
                );
                $data['main_menu'][1] = array(
                    'name'  => $this->language->get('product_title'),
                    'href'  => $this->url->link('product/catalog'),
                    'active' =>false
                );
                $about_uslugi = $this->model_catalog_information->getInformation(7);
                $data['main_menu'][2] = array(
                    'name'  => $about_uslugi['title'],
                    'href'  => $this->url->link('information/information', 'information_id=7'),
                    'active' =>false
                );
                $data['main_menu'][3] = array(
                   // 'name'  => $this->language->get('statti_title'),
                    'name'  => 'Строительство',
                    //'href'  => $this->url->link('information/statti'),
                    'href'  => 'http://stonehenge.org.ua',
                    'active' =>false
                );
                 $konts_a = $this->model_catalog_information->getInformation(8);
                $data['main_menu'][4] = array(
                    'name'  => $konts_a['title'],
                    'href'  => $this->url->link('information/information', 'information_id=8'),
                    'active' =>false
                );
                if(isset($this->request->get['route'])){
                    if($this->request->get['route'] == 'information/information'){
                        if(isset($this->request->get['information_id'])){
                            if($this->request->get['information_id']==4){
                                $data['main_menu'][0]['active'] = true;
                            }elseif($this->request->get['information_id']==7){
                                $data['main_menu'][2]['active'] = true;
                            }elseif($this->request->get['information_id']==8){
                                $data['main_menu'][4]['active'] = true;
                            }
                        }
                    }elseif($this->request->get['route'] == 'product/catalog'){
                        $data['main_menu'][1]['active'] = true;
                    }elseif($this->request->get['route'] == 'information/statti'){
                        $data['main_menu'][3]['active'] = true;
                    }
                }
                //////////////////END MENU/////////////////////////
                
                $data['formaction'] = $this->url->link('common/header/sendTopForm');
                
		// For page specific css
		if (isset($this->request->get['route'])) {
			if (isset($this->request->get['product_id'])) {
				$class = '-' . $this->request->get['product_id'];
			} elseif (isset($this->request->get['path'])) {
				$class = '-' . $this->request->get['path'];
			} elseif (isset($this->request->get['manufacturer_id'])) {
				$class = '-' . $this->request->get['manufacturer_id'];
			} else {
				$class = '';
			}

			$data['class'] = str_replace('/', '-', $this->request->get['route']) . $class;
		} else {
			$data['class'] = 'common-home';
		}

		if (file_exists(DIR_TEMPLATE . $this->config->get('config_template') . '/template/common/header.tpl')) {
			return $this->load->view($this->config->get('config_template') . '/template/common/header.tpl', $data);
		} else {
			return $this->load->view('default/template/common/header.tpl', $data);
		}
	}
        
        public function sendTopForm() {
            $mailname = $this->request->post['fio'];
            $mailtel = $this->request->post['tel'];
            $mailmessage = $this->request->post['message'];
            
            $new_message = new Mail();
            $new_message->setTo($this->config->get('config_email'));
            $new_message->setFrom('admin@atom4.beauty-service.od.ua');
            $new_message->setSender($mailname);
            $new_message->setSubject('С формы обратной связи');
            $message = "ФИО: ".$mailname."\r\n"
                        . "Телефон: ".$mailtel."\r\n"
                        . "Сообщение: ".$mailmessage;
            $new_message->setText($message); 
            $new_message->send();
            
            
        }
}
