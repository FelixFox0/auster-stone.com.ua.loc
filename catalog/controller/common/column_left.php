<?php
class ControllerCommonColumnLeft extends Controller {
	public function index() {
		$this->load->model('design/layout');

		if (isset($this->request->get['route'])) {
			$route = (string)$this->request->get['route'];
		} else {
			$route = 'common/home';
		}

		$layout_id = 0;

		if ($route == 'product/category' && isset($this->request->get['path'])) {
			$this->load->model('catalog/category');

			$path = explode('_', (string)$this->request->get['path']);

			$layout_id = $this->model_catalog_category->getCategoryLayoutId(end($path));
		}

		if ($route == 'product/product' && isset($this->request->get['product_id'])) {
			$this->load->model('catalog/product');

			$layout_id = $this->model_catalog_product->getProductLayoutId($this->request->get['product_id']);
		}

		if ($route == 'information/information' && isset($this->request->get['information_id'])) {
			$this->load->model('catalog/information');

			$layout_id = $this->model_catalog_information->getInformationLayoutId($this->request->get['information_id']);
		}

		if (!$layout_id) {
			$layout_id = $this->model_design_layout->getLayout($route);
		}

		if (!$layout_id) {
			$layout_id = $this->config->get('config_layout_id');
		}

		$this->load->model('extension/module');
		$this->load->model('catalog/category');

                
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
                
		$data['modules'] = array();

		$modules = $this->model_design_layout->getLayoutModules($layout_id, 'column_left');

		foreach ($modules as $module) {
			$part = explode('.', $module['code']);

			if (isset($part[0]) && $this->config->get($part[0] . '_status')) {
				$data['modules'][] = $this->load->controller('module/' . $part[0]);
			}

			if (isset($part[1])) {
				$setting_info = $this->model_extension_module->getModule($part[1]);

				if ($setting_info && $setting_info['status']) {
					$data['modules'][] = $this->load->controller('module/' . $part[0], $setting_info);
				}
			}
		}

		if (file_exists(DIR_TEMPLATE . $this->config->get('config_template') . '/template/common/column_left.tpl')) {
			return $this->load->view($this->config->get('config_template') . '/template/common/column_left.tpl', $data);
		} else {
			return $this->load->view('default/template/common/column_left.tpl', $data);
		}
	}
}