<?php
    class ModelCatalogKurs extends Model {
        public function GetProductCategory($category_id) {
            $query = $this->db->query("SELECT product_id FROM " . DB_PREFIX . "product_to_category WHERE category_id = '" . (int)$category_id . "'");
		return $query->rows;
        }
        public function editKursProduct($product_id, $new_kurs) {
            $this->db->query("UPDATE " . DB_PREFIX . "product SET product_curs='".$new_kurs."'");

        }
    }
?>