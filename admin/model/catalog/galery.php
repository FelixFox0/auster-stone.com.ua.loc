<?php
class ModelCatalogGalery extends Model {
	public function addInformation($data) {
		$this->event->trigger('pre.admin.galery.add', $data);

		$this->db->query("INSERT INTO " . DB_PREFIX . "galery SET blog = '". (isset($data['blog']) ? (int)$data['blog'] : 0) ."' ,sort_order = '" . (int)$data['sort_order'] . "', bottom = '" . (isset($data['bottom']) ? (int)$data['bottom'] : 0) . "', status = '" . (int)$data['status'] . "'");

		$galery_id = $this->db->getLastId();

                if (isset($data['image'])) {
			$this->db->query("UPDATE " . DB_PREFIX . "galery SET image = '" . $this->db->escape($data['image']) . "' WHERE galery_id = '" . (int)$galery_id . "'");
		}
                
		foreach ($data['galery_description'] as $language_id => $value) {
			$this->db->query("INSERT INTO " . DB_PREFIX . "galery_description SET galery_id = '" . (int)$galery_id . "', language_id = '" . (int)$language_id . "', title = '" . $this->db->escape($value['title']) . "', description = '" . $this->db->escape($value['description']) . "', meta_title = '" . $this->db->escape($value['meta_title']) . "', meta_h1 = '" . $this->db->escape($value['meta_h1']) . "', meta_description = '" . $this->db->escape($value['meta_description']) . "', meta_keyword = '" . $this->db->escape($value['meta_keyword']) . "'");
		}

		


		if (isset($data['keyword'])) {
			$this->db->query("INSERT INTO " . DB_PREFIX . "url_alias SET query = 'galery_id=" . (int)$galery_id . "', keyword = '" . $this->db->escape($data['keyword']) . "'");
		}
                
               
                

		$this->cache->delete('galery');

		$this->event->trigger('post.admin.galery.add', $galery_id);

		return $galery_id;
	}

	public function editInformation($galery_id, $data) {
		$this->event->trigger('pre.admin.galery.edit', $data);

		$this->db->query("UPDATE " . DB_PREFIX . "galery SET blog = '". (isset($data['blog']) ? (int)$data['blog'] : 0) ."' , sort_order = '" . (int)$data['sort_order'] . "', bottom = '" . (isset($data['bottom']) ? (int)$data['bottom'] : 0) . "', status = '" . (int)$data['status'] . "' WHERE galery_id = '" . (int)$galery_id . "'");
                if (isset($data['image'])) {
			$this->db->query("UPDATE " . DB_PREFIX . "galery SET image = '" . $this->db->escape($data['image']) . "' WHERE galery_id = '" . (int)$galery_id . "'");
		}
		$this->db->query("DELETE FROM " . DB_PREFIX . "galery_description WHERE galery_id = '" . (int)$galery_id . "'");

		foreach ($data['galery_description'] as $language_id => $value) {
			$this->db->query("INSERT INTO " . DB_PREFIX . "galery_description SET galery_id = '" . (int)$galery_id . "', language_id = '" . (int)$language_id . "', title = '" . $this->db->escape($value['title']) . "', description = '" . $this->db->escape($value['description']) . "', meta_title = '" . $this->db->escape($value['meta_title']) . "', meta_h1 = '" . $this->db->escape($value['meta_h1']) . "', meta_description = '" . $this->db->escape($value['meta_description']) . "', meta_keyword = '" . $this->db->escape($value['meta_keyword']) . "'");
		}

		

		$this->db->query("DELETE FROM " . DB_PREFIX . "url_alias WHERE query = 'galery_id=" . (int)$galery_id . "'");

		if ($data['keyword']) {
			$this->db->query("INSERT INTO " . DB_PREFIX . "url_alias SET query = 'galery_id=" . (int)$galery_id . "', keyword = '" . $this->db->escape($data['keyword']) . "'");
		}
              
               	$this->cache->delete('galery');

		$this->event->trigger('post.admin.galery.edit', $galery_id);
	}

	public function deleteInformation($galery_id) {
		$this->event->trigger('pre.admin.galery.delete', $galery_id);

		$this->db->query("DELETE FROM " . DB_PREFIX . "galery WHERE galery_id = '" . (int)$galery_id . "'");
		$this->db->query("DELETE FROM " . DB_PREFIX . "galery_description WHERE galery_id = '" . (int)$galery_id . "'");
	
		$this->db->query("DELETE FROM " . DB_PREFIX . "url_alias WHERE query = 'galery_id=" . (int)$galery_id . "'");

		$this->cache->delete('galery');

		$this->event->trigger('post.admin.galery.delete', $galery_id);
	}

	public function getInformation($galery_id) {
		$query = $this->db->query("SELECT DISTINCT *, (SELECT keyword FROM " . DB_PREFIX . "url_alias WHERE query = 'galery_id=" . (int)$galery_id . "') AS keyword FROM " . DB_PREFIX . "galery WHERE galery_id = '" . (int)$galery_id . "'");

		return $query->row;
	}

	public function getInformations($data = array()) {
		if ($data) {
			$sql = "SELECT * FROM " . DB_PREFIX . "galery i LEFT JOIN " . DB_PREFIX . "galery_description id ON (i.galery_id = id.galery_id) WHERE id.language_id = '" . (int)$this->config->get('config_language_id') . "'";

			$sort_data = array(
				'id.title',
				'i.sort_order'
			);

			if (isset($data['sort']) && in_array($data['sort'], $sort_data)) {
				$sql .= " ORDER BY " . $data['sort'];
			} else {
				$sql .= " ORDER BY id.title";
			}

			if (isset($data['order']) && ($data['order'] == 'DESC')) {
				$sql .= " DESC";
			} else {
				$sql .= " ASC";
			}

			if (isset($data['start']) || isset($data['limit'])) {
				if ($data['start'] < 0) {
					$data['start'] = 0;
				}

				if ($data['limit'] < 1) {
					$data['limit'] = 20;
				}

				$sql .= " LIMIT " . (int)$data['start'] . "," . (int)$data['limit'];
			}

			$query = $this->db->query($sql);

			return $query->rows;
		} else {
			$galery_data = $this->cache->get('galery.' . (int)$this->config->get('config_language_id'));

			if (!$galery_data) {
				$query = $this->db->query("SELECT * FROM " . DB_PREFIX . "galery i LEFT JOIN " . DB_PREFIX . "galery_description id ON (i.galery_id = id.galery_id) WHERE id.language_id = '" . (int)$this->config->get('config_language_id') . "' ORDER BY id.title");

				$galery_data = $query->rows;

				$this->cache->set('galery.' . (int)$this->config->get('config_language_id'), $galery_data);
			}

			return $galery_data;
		}
	}

	public function getInformationDescriptions($galery_id) {
		$galery_description_data = array();

		$query = $this->db->query("SELECT * FROM " . DB_PREFIX . "galery_description WHERE galery_id = '" . (int)$galery_id . "'");

		foreach ($query->rows as $result) {
			$galery_description_data[$result['language_id']] = array(
				'title'            => $result['title'],
				'description'      => $result['description'],
				'meta_title'       => $result['meta_title'],
				'meta_h1'          => $result['meta_h1'],
				'meta_description' => $result['meta_description'],
				'meta_keyword'     => $result['meta_keyword']
			);
		}

		return $galery_description_data;
	}

	


	public function getTotalInformations() {
		$query = $this->db->query("SELECT COUNT(*) AS total FROM " . DB_PREFIX . "galery");

		return $query->row['total'];
	}

	public function getTotalInformationsByLayoutId($layout_id) {
		$query = $this->db->query("SELECT COUNT(*) AS total FROM " . DB_PREFIX . "galery_to_layout WHERE layout_id = '" . (int)$layout_id . "'");

		return $query->row['total'];
	}
        
        
}