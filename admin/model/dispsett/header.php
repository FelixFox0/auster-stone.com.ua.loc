<?php
class ModelDispsettHeader extends Model{
    public function getImgSlider(){
        $imgs =  $this->db->query('SELECT value FROM '.DB_PREFIX.'setting WHERE code="config1" AND `key`="img_sliders"');
        return $imgs->rows;
    }
    public function saveOpt($data){
        if(isset($data['imagesall'])){
            $test_im = $this->testOpt('img_sliders');
            $val_im = serialize($data['imagesall']);
            if($test_im>0){
                $asdd = $this->db->query("UPDATE ".DB_PREFIX."setting SET `value`='".$val_im."', `serialized` ='0' WHERE `code`='config1' AND `key`='img_sliders'");
            }else{
                $this->db->query("INSERT INTO ".DB_PREFIX."setting SET `code`='config1',`key`='img_sliders',`value`='".$val_im."', `serialized` ='0'");
            }
        }else{
            $this->db->query("DELETE FROM ".DB_PREFIX."setting WHERE `code`='config1' AND `key`='img_sliders'");
        }
      
    }
    public function saveOptVal($key,$data){
        $dren_test = $this->testOpt($key);
        if(!$dren_test){
            $this->db->query("INSERT INTO ".DB_PREFIX."setting SET `code`='config1',`key`='".$key."',`value`='".$data."', `serialized` ='0'");
        }else{
            $asdd = $this->db->query("UPDATE ".DB_PREFIX."setting SET `value`='".$data."', `serialized` ='0' WHERE `code`='config1' AND `key`='".$key."'");
        }
    }
    
    public function deleteOpt($key) {
        $this->db->query("DELETE FROM ".DB_PREFIX."setting WHERE `code`='config1' AND `key`='".$key."'");
    }
    
    public function testOpt($field){
        $asd = $this->db->query('SELECT value FROM '.DB_PREFIX.'setting WHERE code="config1" AND `key`="'.$field.'"');
        return $asd->num_rows;
    }
}