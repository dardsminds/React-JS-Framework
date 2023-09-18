<?php

namespace JavascriptFrameworks\React;

class Provider
{
	/**
	 * @param array $configuration Builder configurations that will apply to all service instances
	 */
	public function __construct(array $configuration)
	{
		$this->db = $this->buildDbConnector();
	}

	/**
	 * Build Database connection from the given configuration data
	 *
	 * @return $db database MySQLi object
	 */
	public function buildDbConnector()
	{
		$db = [];
		$db['hostname'] = 'localhost';
		$db['username'] = 'root';
		$db['password'] = '';
		$db['database'] = 'test';

		$db = new \mysqli($db['hostname'], $db['username'], $db['password'], $db['database']);

		if ($db->connect_error) {
			throw new \Exception("MySQL Fatal Error: {$mysqli->connect_error}");
		}

		return $db;
	}

	/**
	 * find the available list of Car Makes
	 *
	 * @return array
	 */
	public function findCarMakes(){
		$makes = [];

			$sql = '
				SELECT `make_id`, `make`
				FROM `vehicles`.`ref_makes`
			';

			$res = $this->db->query($sql);

			if ($res && $res->num_rows) {
				while ($row = $res->fetch_assoc()) {
					$make_id = $row['make_id'];
					$makes[] = [
						'id' => $make_id,
						'make' => $row['make']
					];
				}
			}

		usort($makes, function ($item1, $item2) {
			return $item1['make'] <=> $item2['make'];
		});

		return $makes;
	}

	/**
	 * Find list of Site types and the number of project of each
	 *
	 * @return array
	 */
	public function findSiteTypesWithProjectCount(){
		$site_types = [];

			$sql = '
				SELECT 
				lpp.`website_type`,
				`make`
				FROM `launch_projects`.`projects` lpp
				INNER JOIN `launch_projects`.`products` p ON p.`product_id` = lpp.`website_type`
			';

			$res = $this->db->query($sql);

			if ($res && $res->num_rows) {
				while ($row = $res->fetch_assoc()) {
					$make_id = $row['make_id'];
					$makes[$make_id] = $row['make'];
				}
			}

		return $makes;
	}
}
