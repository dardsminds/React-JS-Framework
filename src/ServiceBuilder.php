<?php

namespace JavascriptFrameworks\React;

class ServiceBuilder
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
		$db['database'] = 'database';

		$db = new \mysqli($db['hostname'], $db['username'], $db['password'], $db['database']);

		if ($db->connect_error) {
			throw new \Exception("MySQL Fatal Error: {$mysqli->connect_error}");
		}

		return $db;
	}
}
