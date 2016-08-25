<?php
class ControllerCatalogKurs extends Controller {
    public function index(){
        $this->load->model('catalog/kurs');
        $this->request->post['new_kurs']= str_replace(',', '.', $this->request->post['new_kurs']);
//        var_dump($this->model_catalog_kurs->GetProductCategory($this->request->post['category_id']));
        foreach ($this->model_catalog_kurs->GetProductCategory($this->request->post['category_id']) as $value) {
//            var_dump($value['product_id']);
            $this->model_catalog_kurs->editKursProduct($value['product_id'], $this->request->post['new_kurs']);
            
        }
    }
}
?>