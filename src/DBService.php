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

class DBService {

	/** @var \PDO */
	private $db;

	/**
	 * DBService constructor.
	 */
	public function __construct() {
		$this->db = new PDO('mysql:host='.DB_HOST.';dbname='.DB_NAME.';charset=utf8mb4', DB_USERNAME, DB_PASSWORD);
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
		// Basic SQL
		$sql = 'INSERT INTO lead
				(first_name,last_name,email,phone,street_address,street_address2, city_address, state_address, zip_address, home_sqft, date_created) 
				VALUES(:first_name,:last_name,:email,:phone,:street_address, :street_address2, :city_address, :state_address, :zip_address, :home_sqft, :date_created)';

		$query = $this->db->prepare($sql);

		$lead_array = $this->convertLeadIntoInsertableArray( $lead );

		$query->execute($lead_array);

	}

	/**
	 * @param \Lead $lead
	 */
	public function updateLeadBasedOnEmail(Lead $lead){
		$sql = 'UPDATE lead SET first_name = :first_name,
								last_name = :last_name,
								phone = :phone,
								street_address= :street_address, 
								street_address2 = :street_address2, 
								city_address = :city_address, 
								state_address = :state_address, 
								zip_address = :zip_address, 
								home_sqft = :home_sqft
				WHERE email = :email';


		$query = $this->db->prepare($sql);

		$lead_array = $this->convertLeadIntoInsertableArray( $lead );

		$query->execute($lead_array);
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

		return $query->fetchAll(PDO::FETCH_CLASS, Lead::class);

	}

	/**
	 * @param string $email
	 *
	 * @return \Lead[] array
	 */
	public function retrieveLeadByEmail(string $email){
		$sql = "SELECT * FROM lead WHERE email=`$email`";

		$query = $this->db->query($sql);

		return $query->fetchAll(PDO::FETCH_CLASS, Lead::class);

	}

	/**
	 * Convert Lead into an array suitable for prepared statements
	 * @param \Lead $lead
	 *
	 * @return array|null
	 */
	private function convertLeadIntoInsertableArray( Lead $lead ) {
		$lead_array = $lead->convertToArray();

		$lead_array = array_flip( $lead_array );

		array_walk( $lead_array, function ( $value ) {
			return ':' . $value;
		} );

		$lead_array = array_flip( $lead_array );

		return $lead_array;
}
}