<?php
class ModelCheckoutExport extends Model{
    public function getOrders() {
        $orders = $this->db->query("SELECT o.order_id, o.date_added, o.total, o.customer_id, o.fio, o.email, o.telephone, o.payment_method , os.name AS order_status FROM ".DB_PREFIX."order o LEFT JOIN ".DB_PREFIX."order_status os ON(o.order_status_id = os.order_status_id) ORDER BY o.order_id DESC");
       
        if($orders->num_rows>0){
            return $orders->rows;
        }else{
            return false;
        }
    }
    
    public function getProducts($order_id) {
        $products = $this->db->query("SELECT product_id, name, quantity, total FROM ".DB_PREFIX."order_product WHERE order_id='".$order_id."'");
        
        if($products->num_rows>0){
            return $products->rows;
        }else{
            return false;
        }
        
    }
}

