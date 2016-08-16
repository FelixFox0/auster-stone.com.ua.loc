<?php
class ModelCatalogInformation extends Model {
	public function getInformation($information_id) {
		$query = $this->db->query("SELECT DISTINCT * FROM " . DB_PREFIX . "information i LEFT JOIN " . DB_PREFIX . "information_description id ON (i.information_id = id.information_id) LEFT JOIN " . DB_PREFIX . "information_to_store i2s ON (i.information_id = i2s.information_id) WHERE i.information_id = '" . (int)$information_id . "' AND id.language_id = '" . (int)$this->config->get('config_language_id') . "' AND i2s.store_id = '" . (int)$this->config->get('config_store_id') . "' AND i.status = '1'");

		return $query->row;
	}

	public function getInformations() {
		$query = $this->db->query("SELECT * FROM " . DB_PREFIX . "information i LEFT JOIN " . DB_PREFIX . "information_description id ON (i.information_id = id.information_id) LEFT JOIN " . DB_PREFIX . "information_to_store i2s ON (i.information_id = i2s.information_id) WHERE id.language_id = '" . (int)$this->config->get('config_language_id') . "' AND i2s.store_id = '" . (int)$this->config->get('config_store_id') . "' AND i.status = '1' ORDER BY i.sort_order, LCASE(id.title) ASC");

		return $query->rows;
	}

	public function getInformationLayoutId($information_id) {
		$query = $this->db->query("SELECT * FROM " . DB_PREFIX . "information_to_layout WHERE information_id = '" . (int)$information_id . "' AND store_id = '" . (int)$this->config->get('config_store_id') . "'");

		if ($query->num_rows) {
			return $query->row['layout_id'];
		} else {
			return 0;
		}
	}
        
        public function getInformationsBlog($data=array()) {
                if(isset($data['offset'])){
                    $offset = ' OFFSET '.$data['offset'];
                }else{
                    $offset = '';
                }
                if(isset($data['path'])){
                    $path = " LEFT JOIN ".DB_PREFIX."information_to_rubriki itr ON(i.information_id = itr.information_id) ";
                    $path_and = " AND itr.rubriki_id='".$data['path']."' ";
                }else{
                    $path ='';
                    $path_and  ='';
                }
		$query = $this->db->query("SELECT * FROM " . DB_PREFIX . "information i ".$path." LEFT JOIN " . DB_PREFIX . "information_description id ON (i.information_id = id.information_id) LEFT JOIN " . DB_PREFIX . "information_to_store i2s ON (i.information_id = i2s.information_id) WHERE id.language_id = '" . (int)$this->config->get('config_language_id') . "' AND i2s.store_id = '" . (int)$this->config->get('config_store_id') . "' ".$path_and." AND i.status = '1' AND i.blog = '1' ORDER BY i.sort_order, LCASE(id.title) ASC LIMIT ".$data['limit'].$offset);

		return $query->rows;
	}
        
        public function getTotalInformation($data=array()) {
            if(isset($data['path'])){
                    $path = " LEFT JOIN ".DB_PREFIX."information_to_rubriki itr ON(i.information_id = itr.information_id) ";
                    $path_and = " AND itr.rubriki_id='".$data['path']."' ";
                }else{
                    $path ='';
                    $path_and  ='';
                }
            $query = $this->db->query("SELECT COUNT(DISTINCT i.information_id) AS total FROM " . DB_PREFIX . "information i ".$path." WHERE i.status = '1' AND i.blog = '1'".$path_and);

		return $query->row['total'];
        }
        
        
}