<?php
class ControllerCatalogSkidki extends Controller{
    private $error = array();
    
    public function index() {
            $this->language->load('catalog/skidki');

            $this->document->setTitle($this->language->get('heading_title'));

            $this->load->model('catalog/skidki');

            $this->getList();
    }
    
    public function getList() {
        $data = array();
        $url='';
        $data['breadcrumbs'] = array();

        $data['breadcrumbs'][] = array(
                'text' => $this->language->get('text_home'),
                'href' => $this->url->link('common/dashboard', 'token=' . $this->session->data['token'], 'SSL')
        );

        $data['breadcrumbs'][] = array(
                'text' => $this->language->get('heading_title'),
                'href' => $this->url->link('catalog/skidki', 'token=' . $this->session->data['token'] . $url, 'SSL')
        );
        
        $data['add'] = $this->url->link('catalog/skidki/add', 'token=' . $this->session->data['token'] . $url, 'SSL');
        $data['delete'] = $this->url->link('catalog/skidki/delete', 'token=' . $this->session->data['token'] . $url, 'SSL');
        
        $data['button_add'] = $this->language->get('button_add');
        $data['button_delete'] = $this->language->get('button_delete');
        $data['button_edit'] = $this->language->get('button_delete');
        $data['text_confirm'] = $this->language->get('text_confirm');
        $data['heading_title'] = $this->language->get('heading_title');
        $data['text_list'] = $this->language->get('text_list');
        
        $all_skidki = $this->model_catalog_skidki->getSkidki();
        $data['all_skidki'] = array();
        foreach($all_skidki as $skidka){
            if($skidka['type_time_skidki'] == 1){
                $period = 'неограниченный период';
            }else{
                $period = $skidka['time_skidki'];
            } 
            if($skidka['type_skidki'] == 0){
                $type_skidki = 'Скидка для пользователей';
            }else{
                $type_skidki = "Скидка для категорий";
            }
            
            
            $data['all_skidki'][]=array(
                'id_skidki' => $skidka['id_skidki'],
                'name_skidki' => $skidka['name_skidki'],
                'razmer_skidki' => $skidka['razmer_skidki'],
                'type_time_skidki' => $period,
                'type_skidki' => $type_skidki,
                'edit'       => $this->url->link('catalog/skidki/edit', 'token=' . $this->session->data['token'] . '&id_skidki=' . $skidka['id_skidki'] . $url, 'SSL')
            );
        }
        
        $data['header'] = $this->load->controller('common/header');
        $data['column_left'] = $this->load->controller('common/column_left');
        $data['footer'] = $this->load->controller('common/footer');
        
        $this->response->setOutput($this->load->view('catalog/skidki_list.tpl', $data));
    }
    
    public function add() {
         $this->language->load('catalog/skidki');
         $this->load->model('catalog/skidki');
        $data= array();
        
        
        $url='';
        $data['breadcrumbs'] = array();

        $data['breadcrumbs'][] = array(
                'text' => $this->language->get('text_home'),
                'href' => $this->url->link('common/dashboard', 'token=' . $this->session->data['token'], 'SSL')
        );

        $data['breadcrumbs'][] = array(
                'text' => $this->language->get('heading_title'),
                'href' => $this->url->link('catalog/skidki', 'token=' . $this->session->data['token'] . $url, 'SSL')
        );
        
        
        $data['button_save']=$this->language->get('button_save');
        $data['cancel']=$this->url->link('catalog/skidki', 'token=' . $this->session->data['token'] . $url, 'SSL');
        $data['button_cancel']=$this->language->get('button_cancel');
        $data['heading_title'] = $this->language->get('heading_title_add');
        $data['text_form'] = $this->language->get('heading_title_add');
        $data['entry_name'] = $this->language->get('entry_name');
        $data['entry_razmer'] = $this->language->get('entry_razmer');
        $data['entry_type_time'] = $this->language->get('entry_type_time');
        $data['text_totime'] = $this->language->get('text_totime');
        $data['text_neog'] = $this->language->get('text_neog');
        $data['entry_time'] = $this->language->get('entry_time');
        $data['entry_type'] = $this->language->get('entry_type');
        $data['text_tousers'] = $this->language->get('text_tousers');
        $data['entry_users'] = $this->language->get('entry_users');
        $data['text_tocategs'] = $this->language->get('text_tocategs');
        $data['entry_categs'] = $this->language->get('entry_categs');
        $data['action'] = $this->url->link('catalog/skidki/add', 'token=' . $this->session->data['token'] . $url, 'SSL');
        
        $this->load->model('customer/customer');
        $data['all_cust'] = $this->model_customer_customer->getCustomers();
        
        $this->load->model('catalog/category');
        $data['all_categs'] = $this->model_catalog_category->getCategories();
        
        if(!empty($this->request->post)){
            $this->validate();
        }
        if (isset($this->error['warning'])) {
                $data['error_warning'] = $this->error['warning'];
        } else {
                $data['error_warning'] = '';
        }
        if (isset($this->error['error_name'])) {
                $data['error_name'] = $this->error['error_name'];
        }
        if (isset($this->error['error_razmer'])) {
                $data['error_razmer'] = $this->error['error_razmer'];
        }
        if (isset($this->error['error_time'])) {
                $data['error_time'] = $this->error['error_time'];
        }
        if (isset($this->error['error_input_users'])) {
                $data['error_input_users'] = $this->error['error_input_users'];
        }
        if (isset($this->error['error_input_categs'])) {
                $data['error_input_categs'] = $this->error['error_input_categs'];
        }
        /*Значения*/
        if(isset($this->request->post['name'])){
            $data['val_name'] = $this->request->post['name'];
        }else{
            $data['val_name']='';
        }
        
        if(isset($this->request->post['razmer'])){
            $data['val_razmer'] = $this->request->post['razmer'];
        }else{
            $data['val_razmer']='';
        }
        
        if(isset($this->request->post['type_time'])){
            $data['val_type_time'] = $this->request->post['type_time'];
        }else{
            $data['val_type_time']=0;
        }
        
        if(isset($this->request->post['time'])){
            $data['val_time'] = $this->request->post['time'];
        }else{
            $data['val_time']='';
        }
        
        if(isset($this->request->post['type_skidki'])){
            $data['val_type_skidki'] = $this->request->post['type_skidki'];
        }else{
            $data['val_type_skidki']=0;
        }
        
        if(isset($this->request->post['input-users'])){
            $data['val_input_users'] = $this->request->post['input-users'];
        }else{
            $data['val_input_users'] = array();
        }
        
        if(isset($this->request->post['input-categs'])){
            $data['val_input_categs'] = $this->request->post['input-categs'];
        }else{
            $data['val_input_categs'] = array();
        }
        
        
        
        /**/
        if(empty($this->error) && !empty($this->request->post)){
            $this->model_catalog_skidki->addSkidki($this->request->post);
            $this->response->redirect($this->url->link('catalog/skidki', 'token=' . $this->session->data['token'] . $url, 'SSL'));
        }else{
           $data['header'] = $this->load->controller('common/header');
            $data['column_left'] = $this->load->controller('common/column_left');
            $data['footer'] = $this->load->controller('common/footer');
            $this->response->setOutput($this->load->view('catalog/skidki_form.tpl', $data)); 
        }
      }
    
    public function validate(){
        if (!$this->user->hasPermission('modify', 'catalog/skidki')) {
                $this->error['warning'] = $this->language->get('error_permission');
        }
        if ((utf8_strlen($this->request->post['name']) < 1)) {
                $this->error['error_name'] = $this->language->get('error_name');
        } 
        if (!ctype_digit($this->request->post['razmer']) || (int)$this->request->post['razmer'] < 0 || (int)$this->request->post['razmer'] >100 ) {
            $this->error['error_razmer'] = $this->language->get('error_razmer');
        } 
        if($this->request->post['type_time'] == 0 && $this->request->post['time'] ==''){
            $this->error['error_time'] = $this->language->get('error_time');
        }
        if($this->request->post['type_skidki']==0 && !isset($this->request->post['input-users'])){
            $this->error['error_input_users'] = $this->language->get('error_input_users');
        }
        if($this->request->post['type_skidki']==1 && !isset($this->request->post['input-categs'])){
            $this->error['error_input_categs'] = $this->language->get('error_input_categs');
        }
        
        return !$this->error;
    }
    
    public function delete(){
        $this->load->model('catalog/skidki');
        if (isset($this->request->post['selected']) && $this->validateDelete()){
            foreach ($this->request->post['selected'] as $value) {
                $this->model_catalog_skidki->deleteSkidka($value);
            }
        }
        $this->response->redirect($this->url->link('catalog/skidki','token='.$this->request->get['token'], 'SSL'));
    }
    public function edit(){
         $this->language->load('catalog/skidki');
         $this->load->model('catalog/skidki');
         
        $data= array();
        
        $pr_skidka = $this->model_catalog_skidki->get_skidka($this->request->get['id_skidki']);
        
        $url='&id_skidki='.$this->request->get['id_skidki'];
        $data['breadcrumbs'] = array();

        $data['breadcrumbs'][] = array(
                'text' => $this->language->get('text_home'),
                'href' => $this->url->link('common/dashboard', 'token=' . $this->session->data['token'], 'SSL')
        );

        $data['breadcrumbs'][] = array(
                'text' => $this->language->get('heading_title'),
                'href' => $this->url->link('catalog/skidki', 'token=' . $this->session->data['token'] . $url, 'SSL')
        );
        
        
        $data['button_save']=$this->language->get('button_save');
        $data['cancel']=$this->url->link('catalog/skidki', 'token=' . $this->session->data['token'] . $url, 'SSL');
        $data['button_cancel']=$this->language->get('button_cancel');
        $data['heading_title'] = $this->language->get('heading_title_edit');
        $data['text_form'] = $this->language->get('heading_title_edit');
        $data['entry_name'] = $this->language->get('entry_name');
        $data['entry_razmer'] = $this->language->get('entry_razmer');
        $data['entry_type_time'] = $this->language->get('entry_type_time');
        $data['text_totime'] = $this->language->get('text_totime');
        $data['text_neog'] = $this->language->get('text_neog');
        $data['entry_time'] = $this->language->get('entry_time');
        $data['entry_type'] = $this->language->get('entry_type');
        $data['text_tousers'] = $this->language->get('text_tousers');
        $data['entry_users'] = $this->language->get('entry_users');
        $data['text_tocategs'] = $this->language->get('text_tocategs');
        $data['entry_categs'] = $this->language->get('entry_categs');
        $data['action'] = $this->url->link('catalog/skidki/edit', 'token=' . $this->session->data['token'] . $url, 'SSL');
        
        $this->load->model('customer/customer');
        $data['all_cust'] = $this->model_customer_customer->getCustomers();
        
        $this->load->model('catalog/category');
        $data['all_categs'] = $this->model_catalog_category->getCategories();
        
        if(!empty($this->request->post)){
            $this->validate();
        }
        if (isset($this->error['warning'])) {
                $data['error_warning'] = $this->error['warning'];
        } else {
                $data['error_warning'] = '';
        }
        if (isset($this->error['error_name'])) {
                $data['error_name'] = $this->error['error_name'];
        }
        if (isset($this->error['error_razmer'])) {
                $data['error_razmer'] = $this->error['error_razmer'];
        }
        if (isset($this->error['error_time'])) {
                $data['error_time'] = $this->error['error_time'];
        }
        if (isset($this->error['error_input_users'])) {
                $data['error_input_users'] = $this->error['error_input_users'];
        }
        if (isset($this->error['error_input_categs'])) {
                $data['error_input_categs'] = $this->error['error_input_categs'];
        }
        /*Значения*/
        if(isset($this->request->post['name'])){
            $data['val_name'] = $this->request->post['name'];
        }elseif(isset($pr_skidka['name_skidki'])){
            $data['val_name'] = $pr_skidka['name_skidki'];
        }else{
            $data['val_name']='';
        }
        
        if(isset($this->request->post['razmer'])){
            $data['val_razmer'] = $this->request->post['razmer'];
        }elseif(isset($pr_skidka['razmer_skidki'])){
            $data['val_razmer']=$pr_skidka['razmer_skidki'];
        }else{
            $data['val_razmer']='';
        }
        
        if(isset($this->request->post['type_time'])){
            $data['val_type_time'] = $this->request->post['type_time'];
        }elseif(isset($pr_skidka['type_time_skidki'])){
            $data['val_type_time']=$pr_skidka['type_time_skidki'];
        }else{
            $data['val_type_time']=0;
        }
        
        if(isset($this->request->post['time'])){
            $data['val_time'] = $this->request->post['time'];
        }elseif(isset($pr_skidka['time_skidki']) && $pr_skidka['time_skidki']){
            $data['val_time']=$pr_skidka['time_skidki'];
        }else{
            $data['val_time']='';
        }
        
        if(isset($this->request->post['type_skidki'])){
            $data['val_type_skidki'] = $this->request->post['type_skidki'];
        }elseif(isset($pr_skidka['type_skidki'])){
            $data['val_type_skidki']=$pr_skidka['type_skidki'];
        }else{
            $data['val_type_skidki']=0;
        }
        
        if(isset($this->request->post['input-users'])){
            $data['val_input_users'] = $this->request->post['input-users'];
        }elseif(isset($pr_skidka['users_skidki']) && $pr_skidka['users_skidki']){
            $data['val_input_users']=  unserialize($pr_skidka['users_skidki']);
        }else{
            $data['val_input_users'] = array();
        }
        
        if(isset($this->request->post['input-categs'])){
            $data['val_input_categs'] = $this->request->post['input-categs'];
        }elseif(isset($pr_skidka['categs_skidki']) && $pr_skidka['categs_skidki']){
            $data['val_input_categs']=  unserialize($pr_skidka['categs_skidki']);
        }else{
            $data['val_input_categs'] = array();
        }
        
        
        
        /**/
        if(empty($this->error) && !empty($this->request->post)){
            $send_edit =$this->request->post;
            $send_edit['id_skidki'] = $this->request->get['id_skidki'];
            $this->model_catalog_skidki->editSkidki($send_edit);
            $this->response->redirect($this->url->link('catalog/skidki', 'token=' . $this->session->data['token'] . $url, 'SSL'));
        }else{
           $data['header'] = $this->load->controller('common/header');
            $data['column_left'] = $this->load->controller('common/column_left');
            $data['footer'] = $this->load->controller('common/footer');
            $this->response->setOutput($this->load->view('catalog/skidki_form.tpl', $data)); 
        }
    }
    protected function validateDelete() {
            if (!$this->user->hasPermission('modify', 'catalog/skidki')) {
                    $this->error['warning'] = 'Warning';
            }

            return !$this->error;
    }
}

