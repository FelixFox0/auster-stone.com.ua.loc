<?php
class ModelCatalogSkidki extends Model{
    public function getSkidki() {
        $allSkidki = $this->db->query('SELECT * FROM '.DB_PREFIX.'skidki');
        return $allSkidki->rows;
    }
    public function get_skidka($id) {
        $skidka = $this->db->query("SELECT * FROM ".DB_PREFIX."skidki WHERE `id_skidki`='".$id."'");
        return $skidka->rows[0];
    }
    public function deleteSkidka($id_skidka) {
        $this->db->query('DELETE FROM '.DB_PREFIX.'skidki WHERE id_skidki="'.$id_skidka.'"');
    }
     public function addSkidki($elements) {
         $sql = "INSERT INTO ".DB_PREFIX."skidki SET `name_skidki`='".$elements['name']."', `razmer_skidki`='".$elements['razmer']."', `type_time_skidki`='".$elements['type_time']."', `type_skidki`='".$elements['type_skidki']."'";
         if($elements['type_time'] == 0){
             $sql.=", `time_skidki`='".$elements['time']."'";
         }
         if($elements['type_skidki'] == 0){
             $users=  serialize($elements['input-users']);
             $sql.=", `users_skidki`='".$users."'";
         }elseif($elements['type_skidki'] == 1){
             $categs=  serialize($elements['input-categs']);
             $sql.=", `categs_skidki`='".$categs."'";
         }
         $this->db->query($sql);
     }
     public function editSkidki($elements) {
        $sql = "UPDATE ".DB_PREFIX."skidki SET `name_skidki`='".$elements['name']."', `razmer_skidki`='".$elements['razmer']."', `type_time_skidki`='".$elements['type_time']."', `type_skidki`='".$elements['type_skidki']."'";
         if($elements['type_time'] == 0){
             $sql.=", `time_skidki`='".$elements['time']."'";
         }else{
            $sql.=", `time_skidki`= NULL";
         }
         if($elements['type_skidki'] == 0){
             $users=  serialize($elements['input-users']);
             $sql.=", `users_skidki`='".$users."', `categs_skidki`= NULL";
         }elseif($elements['type_skidki'] == 1){
             $categs=  serialize($elements['input-categs']);
             $sql.=", `categs_skidki`='".$categs."', `users_skidki`= NULL";
         }
         $sql.=" WHERE `id_skidki`='".$elements['id_skidki']."'";
         $asd = $this->db->query($sql);
     }
}

