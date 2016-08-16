<?php
class ControllerInformationGalery extends Controller {
	public function index() {
		$this->load->language('information/galery');

		$this->load->model('catalog/galery');

		$data['breadcrumbs'] = array();

		$data['breadcrumbs'][] = array(
			'text' => $this->language->get('text_home'),
			'href' => $this->url->link('common/home')
		);

		if (isset($this->request->get['galery_id'])) {
			$galery_id = (int)$this->request->get['galery_id'];
		} else {
			$galery_id = 0;
		}

		$galery_info = $this->model_catalog_galery->getInformation($galery_id);

		if ($galery_info) {

			if ($galery_info['meta_title']) {
				$this->document->setTitle($galery_info['meta_title']);
			} else {
				$this->document->setTitle($galery_info['title']);
			}

			$this->document->setDescription($galery_info['meta_description']);
			$this->document->setKeywords($galery_info['meta_keyword']);

			$data['breadcrumbs'][] = array(
				'text' => $galery_info['title'],
				'href' => $this->url->link('information/galery', 'galery_id=' .  $galery_id)
			);

			if ($galery_info['meta_h1']) {
				$data['heading_title'] = $galery_info['meta_h1'];
			} else {
				$data['heading_title'] = $galery_info['title'];
			}

			$data['button_continue'] = $this->language->get('button_continue');

			$data['description'] = html_entity_decode($galery_info['description'], ENT_QUOTES, 'UTF-8');

			$data['continue'] = $this->url->link('common/home');

			$data['column_left'] = $this->load->controller('common/column_left');
			$data['column_right'] = $this->load->controller('common/column_right');
			$data['content_top'] = $this->load->controller('common/content_top');
			$data['content_bottom'] = $this->load->controller('common/content_bottom');
			$data['footer'] = $this->load->controller('common/footer');
			$data['header'] = $this->load->controller('common/header');

			if (file_exists(DIR_TEMPLATE . $this->config->get('config_template') . '/template/information/galery.tpl')) {
				$this->response->setOutput($this->load->view($this->config->get('config_template') . '/template/information/galery.tpl', $data));
			} else {
				$this->response->setOutput($this->load->view('default/template/information/galery.tpl', $data));
			}
		} else {
			$data['breadcrumbs'][] = array(
				'text' => $this->language->get('text_error'),
				'href' => $this->url->link('information/galery', 'galery_id=' . $galery_id)
			);

			$this->document->setTitle($this->language->get('text_error'));

			$data['heading_title'] = $this->language->get('text_error');

			$data['text_error'] = $this->language->get('text_error');

			$data['button_continue'] = $this->language->get('button_continue');

			$data['continue'] = $this->url->link('common/home');

			$this->response->addHeader($this->request->server['SERVER_PROTOCOL'] . ' 404 Not Found');

			$data['column_left'] = $this->load->controller('common/column_left');
			$data['column_right'] = $this->load->controller('common/column_right');
			$data['content_top'] = $this->load->controller('common/content_top');
			$data['content_bottom'] = $this->load->controller('common/content_bottom');
			$data['footer'] = $this->load->controller('common/footer');
			$data['header'] = $this->load->controller('common/header');

			if (file_exists(DIR_TEMPLATE . $this->config->get('config_template') . '/template/error/not_found.tpl')) {
				$this->response->setOutput($this->load->view($this->config->get('config_template') . '/template/error/not_found.tpl', $data));
			} else {
				$this->response->setOutput($this->load->view('default/template/error/not_found.tpl', $data));
			}
		}
	}

	public function agree() {
		$this->load->model('catalog/galery');

		if (isset($this->request->get['galery_id'])) {
			$galery_id = (int)$this->request->get['galery_id'];
		} else {
			$galery_id = 0;
		}

		$output = '';

		$galery_info = $this->model_catalog_galery->getInformation($galery_id);

		if ($galery_info) {
			$output .= html_entity_decode($galery_info['description'], ENT_QUOTES, 'UTF-8') . "\n";
		}

		$this->response->setOutput($output);
	}
}