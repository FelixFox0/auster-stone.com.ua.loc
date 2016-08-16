<?php

class ControllerCheckoutExport extends Controller{
    public function index() {
        header('Content-Type: text/xml');
        //DIR_EXPORT
        ///index.php?route=checkout/export&key=wah8d2d3890hf238d2
        if(isset($this->request->get['key']) && $this->request->get['key'] == 'wah8d2d3890hf238d2'){
            $this->load->model('checkout/export');
             if(file_exists(DIR_EXPORT.'orders.xml')){
               unlink (DIR_EXPORT.'orders.xml'); 
            }
            $n_date=date("Y-m-d_H:i:s");
            $xmlstr = '<?xml version="1.0" encoding="UTF-8"?><КоммерческаяИнформация ДатаФормирования="'.$n_date.'" ВерсияСхемы="2.04"><Заказы></Заказы></КоммерческаяИнформация>';
            $exportxml = new SimpleXMLElement($xmlstr);
            
            $orders= $this->model_checkout_export->getOrders();
            if($orders){
                foreach ($orders as $order) {
                  $zakazi = $exportxml->Заказы;
                  $zakaz = $zakazi->addChild('Заказ');
                  $zakaz->addChild('Ид',$order['order_id']);
                  
                  $timesmap_str = strtotime($order['date_added']);
                  $zakaz->addChild('Дата',date('Y-m-d',$timesmap_str));
                  $zakaz->addChild('Время',date('H:i:s',$timesmap_str));
                  $zakaz->addChild('Сумма',$this->recountPrice($order['total']));
                  $zakaz->addChild('Типоплаты',$order['payment_method']);
                  $zakaz->addChild('Статус',$order['order_status']);
                  $zakaz->addChild('Идклиента',$order['customer_id']);
                  $zakaz->addChild('ФИО',$order['fio']);
                  $zakaz->addChild('Телефон',$order['telephone']);
                  $zakaz->addChild('Элпочта',$order['email']);
                  
                  $tovari = $zakaz->addChild('Товары');
                  
                  $products = $this->model_checkout_export->getProducts($order['order_id']);
                  if($products){
                      foreach ($products as $product) {
                          $tovar = $tovari->addChild('Товар');
                          
                          
                          $tovar->addChild('Ид', $product['product_id']);
                          $tovar->addChild('Название',$product['name']);
                          $tovar->addChild('Количество',$product['quantity']);
                          $tovar->addChild('Цена',$this->recountPrice($product['total']));
                      }
                  }
                }
            }
           
            echo $exportxml->asXML();
           // echo $exportxml->asXML(DIR_EXPORT.'orders.xml');
        }
    }
    
    public function recountPrice($param) {
             $data = explode('.',round($param,2));
                if(!isset($data[1])){
                    $data[1] = '00';
                }elseif(strlen($data[1]) == 1){
                    $data[1].='0';
                }
                
                return $data[0].'.'.$data[1];
                
        }
}



