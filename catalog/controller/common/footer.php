<?php
class ControllerCommonFooter extends Controller {
	public function index() {
		$this->load->language('common/footer');

		$data['scripts'] = $this->document->getScripts('footer');

		$data['text_information'] = $this->language->get('text_information');
		$data['text_service'] = $this->language->get('text_service');
		$data['text_extra'] = $this->language->get('text_extra');
		$data['text_contact'] = $this->language->get('text_contact');
		$data['text_return'] = $this->language->get('text_return');
		$data['text_sitemap'] = $this->language->get('text_sitemap');
		$data['text_manufacturer'] = $this->language->get('text_manufacturer');
		$data['text_voucher'] = $this->language->get('text_voucher');
		$data['text_affiliate'] = $this->language->get('text_affiliate');
		$data['text_special'] = $this->language->get('text_special');
		$data['text_account'] = $this->language->get('text_account');
		$data['text_order'] = $this->language->get('text_order');
		$data['text_wishlist'] = $this->language->get('text_wishlist');
		$data['text_newsletter'] = $this->language->get('text_newsletter');

		$this->load->model('catalog/information');

		$data['informations'] = array();

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
		
		
		
		
		if($footer_wid_title1 = $this->config->get('footer_wid_title1')){$data['footer_wid_title1'] = $footer_wid_title1;}else{$data['footer_wid_title1'] = '';}
		if($footer_wid_title2 = $this->config->get('footer_wid_title2')){$data['footer_wid_title2'] = $footer_wid_title2;}else{$data['footer_wid_title2'] = '';}
		if($footer_wid_title3 = $this->config->get('footer_wid_title3')){$data['footer_wid_title3'] = $footer_wid_title3;}else{$data['footer_wid_title3'] = '';}
		if($footer_wid_title4 = $this->config->get('footer_wid_title4')){$data['footer_wid_title4'] = $footer_wid_title4;}else{$data['footer_wid_title4'] = '';}
		if($footer_wid_title5 = $this->config->get('footer_wid_title5')){$data['footer_wid_title5'] = $footer_wid_title5;}else{$data['footer_wid_title5'] = '';}

		if($footer_wid_desc1 = $this->config->get('footer_wid_desc1')){$data['footer_wid_desc1'] = $footer_wid_desc1;}else{$data['footer_wid_desc1'] = '';}
		if($footer_wid_desc2 = $this->config->get('footer_wid_desc2')){$data['footer_wid_desc2'] = $footer_wid_desc2;}else{$data['footer_wid_desc2'] = '';}
		if($footer_wid_desc3 = $this->config->get('footer_wid_desc3')){$data['footer_wid_desc3'] = $footer_wid_desc3;}else{$data['footer_wid_desc3'] = '';}
		if($footer_wid_desc4 = $this->config->get('footer_wid_desc4')){$data['footer_wid_desc4'] = $footer_wid_desc4;}else{$data['footer_wid_desc4'] = '';}
		if($footer_wid_desc5 = $this->config->get('footer_wid_desc5')){$data['footer_wid_desc5'] = $footer_wid_desc5;}else{$data['footer_wid_desc5'] = '';}
		
		if($coty_foo = $this->config->get('coty_foo')){$data['coty_foo'] = $coty_foo;}else{$data['coty_foo'] = '';}
		
		
		
		
		
		foreach ($this->model_catalog_information->getInformations() as $result) {
			if ($result['bottom']) {
				$data['informations'][] = array(
					'title' => $result['title'],
					'href'  => $this->url->link('information/information', 'information_id=' . $result['information_id'])
				);
			}
		}

		$data['contact'] = $this->url->link('information/contact');
		$data['return'] = $this->url->link('account/return/add', '', 'SSL');
		$data['sitemap'] = $this->url->link('information/sitemap');
		$data['manufacturer'] = $this->url->link('product/manufacturer');
		$data['voucher'] = $this->url->link('account/voucher', '', 'SSL');
		$data['affiliate'] = $this->url->link('affiliate/account', '', 'SSL');
		$data['special'] = $this->url->link('product/special');
		$data['account'] = $this->url->link('account/account', '', 'SSL');
		$data['order'] = $this->url->link('account/order', '', 'SSL');
		$data['wishlist'] = $this->url->link('account/wishlist', '', 'SSL');
		$data['newsletter'] = $this->url->link('account/newsletter', '', 'SSL');

		$data['powered'] = sprintf($this->language->get('text_powered'), $this->config->get('config_name'), date('Y', time()));

		// Whos Online
		if ($this->config->get('config_customer_online')) {
			$this->load->model('tool/online');

			if (isset($this->request->server['REMOTE_ADDR'])) {
				$ip = $this->request->server['REMOTE_ADDR'];
			} else {
				$ip = '';
			}

			if (isset($this->request->server['HTTP_HOST']) && isset($this->request->server['REQUEST_URI'])) {
				$url = 'http://' . $this->request->server['HTTP_HOST'] . $this->request->server['REQUEST_URI'];
			} else {
				$url = '';
			}

			if (isset($this->request->server['HTTP_REFERER'])) {
				$referer = $this->request->server['HTTP_REFERER'];
			} else {
				$referer = '';
			}

			$this->model_tool_online->addOnline($ip, $this->customer->getId(), $url, $referer);
		}
                $data['footeraction'] = $this->url->link('common/footer/sendFormFooter');

		if (file_exists(DIR_TEMPLATE . $this->config->get('config_template') . '/template/common/footer.tpl')) {
			return $this->load->view($this->config->get('config_template') . '/template/common/footer.tpl', $data);
		} else {
			return $this->load->view('default/template/common/footer.tpl', $data);
		}
	}
        
        public function sendFormFooter() {
             $mailfrom = $this->request->post['mail'];
            $mailname = $this->request->post['name'];
            
            $new_message = new Mail();
            $new_message->setTo($this->config->get('config_email'));
            $new_message->setFrom('admin@atom4.beauty-service.od.ua');
            $new_message->setSender($mailname);
            $new_message->setSubject('Получение консультации');
            $message = "Имя: ".$mailname."\r\n"
                    . "E-mail: ".$mailfrom; 
            $new_message->setText($message); 
            $new_message->send();
            
        }
        
        public function sendContactForm() {
             $mailfrom = $this->request->post['mail'];
            $mailname = $this->request->post['name'];
            $telephone = $this->request->post['tel'];
            $mess = $this->request->post['message'];
            
            $new_message = new Mail();
            $new_message->setTo($this->config->get('config_email'));
            $new_message->setFrom('admin@atom4.beauty-service.od.ua');
            $new_message->setSender($mailname);
            $new_message->setSubject('Со страницы КОНТАКТЫ');
            $message = "Имя: ".$mailname."\r\n"
                    . "E-mail: ".$mailfrom."\r\n"
                    . "Телефон: ".$telephone."\r\n"
                    . "Содержание: ".$mess; 
            $new_message->setText($message); 
            $new_message->send();
        }
}
