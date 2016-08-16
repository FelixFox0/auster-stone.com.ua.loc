<?php
class ModelCatalogRubriki extends Model {
	public function addCategory($data) {
		$this->event->trigger('pre.admin.rubriki.add', $data);

		$this->db->query("INSERT INTO " . DB_PREFIX . "rubriki SET parent_id = '" . (int)$data['parent_id'] . "', `top` = '" . (isset($data['top']) ? (int)$data['top'] : 0) . "', `column` = '" . (int)$data['column'] . "', sort_order = '" . (int)$data['sort_order'] . "', status = '" . (int)$data['status'] . "', date_modified = NOW(), date_added = NOW()");

		$rubriki_id = $this->db->getLastId();

		if (isset($data['image'])) {
			$this->db->query("UPDATE " . DB_PREFIX . "rubriki SET image = '" . $this->db->escape($data['image']) . "' WHERE rubriki_id = '" . (int)$rubriki_id . "'");
		}

		foreach ($data['rubriki_description'] as $language_id => $value) {
			$this->db->query("INSERT INTO " . DB_PREFIX . "rubriki_description SET rubriki_id = '" . (int)$rubriki_id . "', language_id = '" . (int)$language_id . "', name = '" . $this->db->escape($value['name']) . "', description = '" . $this->db->escape($value['description']) . "', meta_title = '" . $this->db->escape($value['meta_title']) . "', meta_h1 = '" . $this->db->escape($value['meta_h1']) . "', meta_description = '" . $this->db->escape($value['meta_description']) . "', meta_keyword = '" . $this->db->escape($value['meta_keyword']) . "'");
		}

		// MySQL Hierarchical Data Closure Table Pattern
		$level = 0;

		$query = $this->db->query("SELECT * FROM `" . DB_PREFIX . "rubriki_path` WHERE rubriki_id = '" . (int)$data['parent_id'] . "' ORDER BY `level` ASC");

		foreach ($query->rows as $result) {
			$this->db->query("INSERT INTO `" . DB_PREFIX . "rubriki_path` SET `rubriki_id` = '" . (int)$rubriki_id . "', `path_id` = '" . (int)$result['path_id'] . "', `level` = '" . (int)$level . "'");

			$level++;
		}

		$this->db->query("INSERT INTO `" . DB_PREFIX . "rubriki_path` SET `rubriki_id` = '" . (int)$rubriki_id . "', `path_id` = '" . (int)$rubriki_id . "', `level` = '" . (int)$level . "'");

		if (isset($data['rubriki_filter'])) {
			foreach ($data['rubriki_filter'] as $filter_id) {
				$this->db->query("INSERT INTO " . DB_PREFIX . "rubriki_filter SET rubriki_id = '" . (int)$rubriki_id . "', filter_id = '" . (int)$filter_id . "'");
			}
		}

		if (isset($data['rubriki_store'])) {
			foreach ($data['rubriki_store'] as $store_id) {
				$this->db->query("INSERT INTO " . DB_PREFIX . "rubriki_to_store SET rubriki_id = '" . (int)$rubriki_id . "', store_id = '" . (int)$store_id . "'");
			}
		}

		// Set which layout to use with this rubriki
		

		if (isset($data['keyword'])) {
			$this->db->query("INSERT INTO " . DB_PREFIX . "url_alias SET query = 'rubriki_id=" . (int)$rubriki_id . "', keyword = '" . $this->db->escape($data['keyword']) . "'");
		}

		$this->cache->delete('rubriki');

		$this->event->trigger('post.admin.rubriki.add', $rubriki_id);

		return $rubriki_id;
	}

	public function editCategory($rubriki_id, $data) {
		$this->event->trigger('pre.admin.rubriki.edit', $data);

		$this->db->query("UPDATE " . DB_PREFIX . "rubriki SET parent_id = '" . (int)$data['parent_id'] . "', `top` = '" . (isset($data['top']) ? (int)$data['top'] : 0) . "', `column` = '" . (int)$data['column'] . "', sort_order = '" . (int)$data['sort_order'] . "', status = '" . (int)$data['status'] . "', date_modified = NOW() WHERE rubriki_id = '" . (int)$rubriki_id . "'");

		if (isset($data['image'])) {
			$this->db->query("UPDATE " . DB_PREFIX . "rubriki SET image = '" . $this->db->escape($data['image']) . "' WHERE rubriki_id = '" . (int)$rubriki_id . "'");
		}

		$this->db->query("DELETE FROM " . DB_PREFIX . "rubriki_description WHERE rubriki_id = '" . (int)$rubriki_id . "'");

		foreach ($data['rubriki_description'] as $language_id => $value) {
			$this->db->query("INSERT INTO " . DB_PREFIX . "rubriki_description SET rubriki_id = '" . (int)$rubriki_id . "', language_id = '" . (int)$language_id . "', name = '" . $this->db->escape($value['name']) . "', description = '" . $this->db->escape($value['description']) . "', meta_title = '" . $this->db->escape($value['meta_title']) . "', meta_h1 = '" . $this->db->escape($value['meta_h1']) . "', meta_description = '" . $this->db->escape($value['meta_description']) . "', meta_keyword = '" . $this->db->escape($value['meta_keyword']) . "'");
		}

		// MySQL Hierarchical Data Closure Table Pattern
		$query = $this->db->query("SELECT * FROM `" . DB_PREFIX . "rubriki_path` WHERE path_id = '" . (int)$rubriki_id . "' ORDER BY level ASC");

		if ($query->rows) {
			foreach ($query->rows as $rubriki_path) {
				// Delete the path below the current one
				$this->db->query("DELETE FROM `" . DB_PREFIX . "rubriki_path` WHERE rubriki_id = '" . (int)$rubriki_path['rubriki_id'] . "' AND level < '" . (int)$rubriki_path['level'] . "'");

				$path = array();

				// Get the nodes new parents
				$query = $this->db->query("SELECT * FROM `" . DB_PREFIX . "rubriki_path` WHERE rubriki_id = '" . (int)$data['parent_id'] . "' ORDER BY level ASC");

				foreach ($query->rows as $result) {
					$path[] = $result['path_id'];
				}

				// Get whats left of the nodes current path
				$query = $this->db->query("SELECT * FROM `" . DB_PREFIX . "rubriki_path` WHERE rubriki_id = '" . (int)$rubriki_path['rubriki_id'] . "' ORDER BY level ASC");

				foreach ($query->rows as $result) {
					$path[] = $result['path_id'];
				}

				// Combine the paths with a new level
				$level = 0;

				foreach ($path as $path_id) {
					$this->db->query("REPLACE INTO `" . DB_PREFIX . "rubriki_path` SET rubriki_id = '" . (int)$rubriki_path['rubriki_id'] . "', `path_id` = '" . (int)$path_id . "', level = '" . (int)$level . "'");

					$level++;
				}
			}
		} else {
			// Delete the path below the current one
			$this->db->query("DELETE FROM `" . DB_PREFIX . "rubriki_path` WHERE rubriki_id = '" . (int)$rubriki_id . "'");

			// Fix for records with no paths
			$level = 0;

			$query = $this->db->query("SELECT * FROM `" . DB_PREFIX . "rubriki_path` WHERE rubriki_id = '" . (int)$data['parent_id'] . "' ORDER BY level ASC");

			foreach ($query->rows as $result) {
				$this->db->query("INSERT INTO `" . DB_PREFIX . "rubriki_path` SET rubriki_id = '" . (int)$rubriki_id . "', `path_id` = '" . (int)$result['path_id'] . "', level = '" . (int)$level . "'");

				$level++;
			}

			$this->db->query("REPLACE INTO `" . DB_PREFIX . "rubriki_path` SET rubriki_id = '" . (int)$rubriki_id . "', `path_id` = '" . (int)$rubriki_id . "', level = '" . (int)$level . "'");
		}

		$this->db->query("DELETE FROM " . DB_PREFIX . "rubriki_filter WHERE rubriki_id = '" . (int)$rubriki_id . "'");

		if (isset($data['rubriki_filter'])) {
			foreach ($data['rubriki_filter'] as $filter_id) {
				$this->db->query("INSERT INTO " . DB_PREFIX . "rubriki_filter SET rubriki_id = '" . (int)$rubriki_id . "', filter_id = '" . (int)$filter_id . "'");
			}
		}

		$this->db->query("DELETE FROM " . DB_PREFIX . "rubriki_to_store WHERE rubriki_id = '" . (int)$rubriki_id . "'");

		if (isset($data['rubriki_store'])) {
			foreach ($data['rubriki_store'] as $store_id) {
				$this->db->query("INSERT INTO " . DB_PREFIX . "rubriki_to_store SET rubriki_id = '" . (int)$rubriki_id . "', store_id = '" . (int)$store_id . "'");
			}
		}

		

		

		$this->db->query("DELETE FROM " . DB_PREFIX . "url_alias WHERE query = 'rubriki_id=" . (int)$rubriki_id . "'");

		if ($data['keyword']) {
			$this->db->query("INSERT INTO " . DB_PREFIX . "url_alias SET query = 'rubriki_id=" . (int)$rubriki_id . "', keyword = '" . $this->db->escape($data['keyword']) . "'");
		}

		$this->cache->delete('rubriki');

		$this->event->trigger('post.admin.rubriki.edit', $rubriki_id);
	}

	public function deleteCategory($rubriki_id) {
		$this->event->trigger('pre.admin.rubriki.delete', $rubriki_id);

		$this->db->query("DELETE FROM " . DB_PREFIX . "rubriki_path WHERE rubriki_id = '" . (int)$rubriki_id . "'");

		$query = $this->db->query("SELECT * FROM " . DB_PREFIX . "rubriki_path WHERE path_id = '" . (int)$rubriki_id . "'");

		foreach ($query->rows as $result) {
			$this->deleteCategory($result['rubriki_id']);
		}

		$this->db->query("DELETE FROM " . DB_PREFIX . "rubriki WHERE rubriki_id = '" . (int)$rubriki_id . "'");
		$this->db->query("DELETE FROM " . DB_PREFIX . "rubriki_description WHERE rubriki_id = '" . (int)$rubriki_id . "'");
		$this->db->query("DELETE FROM " . DB_PREFIX . "rubriki_filter WHERE rubriki_id = '" . (int)$rubriki_id . "'");
		$this->db->query("DELETE FROM " . DB_PREFIX . "rubriki_to_store WHERE rubriki_id = '" . (int)$rubriki_id . "'");
		$this->db->query("DELETE FROM " . DB_PREFIX . "information_to_rubriki WHERE rubriki_id = '" . (int)$rubriki_id . "'");
		$this->db->query("DELETE FROM " . DB_PREFIX . "url_alias WHERE query = 'rubriki_id=" . (int)$rubriki_id . "'");

		$this->cache->delete('rubriki');

		$this->event->trigger('post.admin.rubriki.delete', $rubriki_id);
	}

	public function repairCategories($parent_id = 0) {
		$query = $this->db->query("SELECT * FROM " . DB_PREFIX . "rubriki WHERE parent_id = '" . (int)$parent_id . "'");

		foreach ($query->rows as $rubriki) {
			// Delete the path below the current one
			$this->db->query("DELETE FROM `" . DB_PREFIX . "rubriki_path` WHERE rubriki_id = '" . (int)$rubriki['rubriki_id'] . "'");

			// Fix for records with no paths
			$level = 0;

			$query = $this->db->query("SELECT * FROM `" . DB_PREFIX . "rubriki_path` WHERE rubriki_id = '" . (int)$parent_id . "' ORDER BY level ASC");

			foreach ($query->rows as $result) {
				$this->db->query("INSERT INTO `" . DB_PREFIX . "rubriki_path` SET rubriki_id = '" . (int)$rubriki['rubriki_id'] . "', `path_id` = '" . (int)$result['path_id'] . "', level = '" . (int)$level . "'");

				$level++;
			}

			$this->db->query("REPLACE INTO `" . DB_PREFIX . "rubriki_path` SET rubriki_id = '" . (int)$rubriki['rubriki_id'] . "', `path_id` = '" . (int)$rubriki['rubriki_id'] . "', level = '" . (int)$level . "'");

			$this->repairCategories($rubriki['rubriki_id']);
		}
	}

	public function getCategory($rubriki_id) {
		$query = $this->db->query("SELECT DISTINCT *, (SELECT GROUP_CONCAT(cd1.name ORDER BY level SEPARATOR '&nbsp;&nbsp;&gt;&nbsp;&nbsp;') FROM " . DB_PREFIX . "rubriki_path cp LEFT JOIN " . DB_PREFIX . "rubriki_description cd1 ON (cp.path_id = cd1.rubriki_id AND cp.rubriki_id != cp.path_id) WHERE cp.rubriki_id = c.rubriki_id AND cd1.language_id = '" . (int)$this->config->get('config_language_id') . "' GROUP BY cp.rubriki_id) AS path, (SELECT DISTINCT keyword FROM " . DB_PREFIX . "url_alias WHERE query = 'rubriki_id=" . (int)$rubriki_id . "') AS keyword FROM " . DB_PREFIX . "rubriki c LEFT JOIN " . DB_PREFIX . "rubriki_description cd2 ON (c.rubriki_id = cd2.rubriki_id) WHERE c.rubriki_id = '" . (int)$rubriki_id . "' AND cd2.language_id = '" . (int)$this->config->get('config_language_id') . "'");

		return $query->row;
	}

	public function getCategoriesByParentId($parent_id = 0) {
		$query = $this->db->query("SELECT *, (SELECT COUNT(parent_id) FROM " . DB_PREFIX . "rubriki WHERE parent_id = c.rubriki_id) AS children FROM " . DB_PREFIX . "rubriki c LEFT JOIN " . DB_PREFIX . "rubriki_description cd ON (c.rubriki_id = cd.rubriki_id) WHERE c.parent_id = '" . (int)$parent_id . "' AND cd.language_id = '" . (int)$this->config->get('config_language_id') . "' ORDER BY c.sort_order, cd.name");

		return $query->rows;
	}

	public function getCategories($data = array()) {
		$sql = "SELECT cp.rubriki_id AS rubriki_id, GROUP_CONCAT(cd1.name ORDER BY cp.level SEPARATOR '&nbsp;&nbsp;&gt;&nbsp;&nbsp;') AS name, c1.parent_id, c1.sort_order, c1.status,(select count(information_id) as information_count from " . DB_PREFIX . "information_to_rubriki pc where pc.rubriki_id = c1.rubriki_id) as information_count FROM " . DB_PREFIX . "rubriki_path cp LEFT JOIN " . DB_PREFIX . "rubriki c1 ON (cp.rubriki_id = c1.rubriki_id) LEFT JOIN " . DB_PREFIX . "rubriki c2 ON (cp.path_id = c2.rubriki_id) LEFT JOIN " . DB_PREFIX . "rubriki_description cd1 ON (cp.path_id = cd1.rubriki_id) LEFT JOIN " . DB_PREFIX . "rubriki_description cd2 ON (cp.rubriki_id = cd2.rubriki_id) WHERE cd1.language_id = '" . (int)$this->config->get('config_language_id') . "' AND cd2.language_id = '" . (int)$this->config->get('config_language_id') . "'";

		if (!empty($data['filter_name'])) {
			$sql .= " AND cd2.name LIKE '" . $this->db->escape($data['filter_name']) . "%'";
		}

		$sql .= " GROUP BY cp.rubriki_id";

		$sort_data = array(
			'information_count',
			'name',
			'sort_order'
		);

		if (isset($data['sort']) && in_array($data['sort'], $sort_data)) {
			$sql .= " ORDER BY " . $data['sort'];
		} else {
			$sql .= " ORDER BY sort_order";
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
	}

	public function getCategoryDescriptions($rubriki_id) {
		$rubriki_description_data = array();

		$query = $this->db->query("SELECT * FROM " . DB_PREFIX . "rubriki_description WHERE rubriki_id = '" . (int)$rubriki_id . "'");

		foreach ($query->rows as $result) {
			$rubriki_description_data[$result['language_id']] = array(
				'name'             => $result['name'],
				'meta_title'       => $result['meta_title'],
				'meta_h1'          => $result['meta_h1'],
				'meta_description' => $result['meta_description'],
				'meta_keyword'     => $result['meta_keyword'],
				'description'      => $result['description']
			);
		}

		return $rubriki_description_data;
	}

	public function getCategoryFilters($rubriki_id) {
		$rubriki_filter_data = array();

		$query = $this->db->query("SELECT * FROM " . DB_PREFIX . "rubriki_filter WHERE rubriki_id = '" . (int)$rubriki_id . "'");

		foreach ($query->rows as $result) {
			$rubriki_filter_data[] = $result['filter_id'];
		}

		return $rubriki_filter_data;
	}

	public function getCategoryStores($rubriki_id) {
		$rubriki_store_data = array();

		$query = $this->db->query("SELECT * FROM " . DB_PREFIX . "rubriki_to_store WHERE rubriki_id = '" . (int)$rubriki_id . "'");

		foreach ($query->rows as $result) {
			$rubriki_store_data[] = $result['store_id'];
		}

		return $rubriki_store_data;
	}

	

	public function getTotalCategories() {
		$query = $this->db->query("SELECT COUNT(*) AS total FROM " . DB_PREFIX . "rubriki");

		return $query->row['total'];
	}

	public function getAllCategories() {
		$query = $this->db->query("SELECT * FROM " . DB_PREFIX . "rubriki c LEFT JOIN " . DB_PREFIX . "rubriki_description cd ON (c.rubriki_id = cd.rubriki_id) LEFT JOIN " . DB_PREFIX . "rubriki_to_store c2s ON (c.rubriki_id = c2s.rubriki_id) WHERE cd.language_id = '" . (int)$this->config->get('config_language_id') . "' AND c2s.store_id = '" . (int)$this->config->get('config_store_id') . "'  ORDER BY c.parent_id, c.sort_order, cd.name");

		$rubriki_data = array();
		foreach ($query->rows as $row) {
			$rubriki_data[$row['parent_id']][$row['rubriki_id']] = $row;
		}

		return $rubriki_data;
	}
	
	
}
