<?php
/**
 * @file DBService.php
 * @author Michael A. Sypes <michael@sypes.org>
 * @project boldleads
 *
 * @abstract
 * This class will handle the DB connection for storing and retrieving leads
 */

/*
 * For speed I'm just defining the credentials here,
 * which, of course, would never be the case in real life.
 */
define( 'DB_HOST' , 'localhost');
define( 'DB_NAME' , 'boldleads');
define( 'DB_USERNAME' , 'boldleads');
define( 'DB_PASSWORD' , 'boldleads');

require_once 'Lead.php';

class DBService {

	/** @var \PDO */
	private $db;

	/**
	 * DBService constructor.
	 */
	public function __construct() {
		$this->db = new PDO('mysql:host='.DB_HOST.';dbname='.DB_NAME, DB_USERNAME, DB_PASSWORD);
	}

	/**
	 * Convenience function
	 * @param \Lead $lead
	 */
	public function storeLead(Lead $lead){
		if($this->retrieveLeadByEmail($lead->getEmail())){
			$this->updateLeadBasedOnEmail($lead);
		}
		else{
			$this->insertNewLead($lead);
		}
	}

	/**
	 * @param \Lead $lead
	 */
	public function insertNewLead(Lead $lead){
		$allowed_params = [':first_name', ':last_name', ':email', ':phone',
			':street_address', ':street_address2', ':city_address',
			':state_address', ':zip_address', ':home_sqft', ':date_created'];

		// Basic SQL
		$sql = 'INSERT INTO lead
				(first_name,last_name,email,phone,street_address,street_address2, city_address, state_address, zip_address, home_sqft, date_created) 
				VALUES('.implode(', ', $allowed_params).')';

		$query = $this->db->prepare($sql);

		$lead_array = $this->convertLeadIntoInsertableArray( $lead );

		// Remove disallowed params
		$lead_array = array_filter($lead_array, function($key) use ($allowed_params) {
			return in_array($key, $allowed_params);
		}, ARRAY_FILTER_USE_KEY);

		// Date
		if(empty($lead_array[':date_created'])){
			$lead_array[':date_created'] = date('Y-m-d');
 		}

		return $query->execute( $lead_array );

	}

	/**
	 * @param \Lead $lead
	 */
	public function updateLeadBasedOnEmail(Lead $lead){
		$params = ['first_name', 'last_name', 'phone',
			'street_address', 'street_address2', 'city_address',
			'state_address', 'zip_address', 'home_sqft'];

		$set_stmts = [];
		foreach($params as $param){
			$set_stmts[] = $param . ' = :' . $param;
		}

		$sql = 'UPDATE lead SET ' . implode(', ', $set_stmts) . ' WHERE email = "'. $lead->getEmail().'"';


		$query = $this->db->prepare($sql);

		$lead_array = $this->convertLeadIntoInsertableArray( $lead );

		// Remove disallowed params
		$lead_array = array_filter($lead_array, function($key) use ($params) {
			return in_array(str_replace(':', '', $key), $params);
		}, ARRAY_FILTER_USE_KEY);

		$success = $query->execute( $lead_array );

		return $success;
	}

	/**
	 * @return \Lead[] array
	 */
	public function retrieveAllLeads(){
		$sql = 'SELECT * FROM lead';

		$query = $this->db->query($sql);

		return $query->fetchAll(PDO::FETCH_CLASS, Lead::class);
	}

	/**
	 * @param int $id
	 *
	 * @return \Lead[] array
	 */
	public function retrieveLeadById(int $id){
		$sql = 'SELECT * FROM lead WHERE id=' . $id;

		$query = $this->db->query($sql);

		if(!$query){
			return false;
		}
		else{
			$result = $query->fetchAll(PDO::FETCH_CLASS, Lead::class);
			return  array_shift($result);
		}

	}

	/**
	 * @param string $email
	 *
	 * @return \Lead[] array
	 */
	public function retrieveLeadByEmail(string $email){
		$sql = "SELECT * FROM lead WHERE email='$email'";

		$query = $this->db->query($sql);

		if(!$query){
			return false;
		}
		else{
			$result = $query->fetchAll(PDO::FETCH_CLASS, Lead::class);
			return  array_shift($result);
		}

	}

	/**
	 * Convert Lead into an array suitable for prepared statements
	 * @param \Lead $lead
	 *
	 * @return array|null
	 */
	private function convertLeadIntoInsertableArray( Lead $lead ) {
		$lead_array = $lead->convertToArray();

		$modified_array =[];
		foreach($lead_array as $key => $value){
			$modified_array[':'.$key] = $value;
		}

		return $modified_array;
}
}