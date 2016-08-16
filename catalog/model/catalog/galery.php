<?php
class ModelCatalogGalery extends Model {
	public function getInformation($galery_id) {
		$query = $this->db->query("SELECT DISTINCT * FROM " . DB_PREFIX . "galery i LEFT JOIN " . DB_PREFIX . "galery_description id ON (i.galery_id = id.galery_id) WHERE i.galery_id = '" . (int)$galery_id . "' AND id.language_id = '" . (int)$this->config->get('config_language_id') . "' AND i.status = '1'");

		return $query->row;
	}

	public function getInformations() {
		$query = $this->db->query("SELECT * FROM " . DB_PREFIX . "galery i LEFT JOIN " . DB_PREFIX . "galery_description id ON (i.galery_id = id.galery_id) WHERE id.language_id = '" . (int)$this->config->get('config_language_id') . "' AND i.status = '1' ORDER BY i.sort_order, LCASE(id.title) ASC");

		return $query->rows;
	}
}