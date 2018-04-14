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

	public function storeLead(Lead $lead){
		// Basic SQL
		$sql = 'INSERT INTO lead
				(first_name,last_name,email,phone,street_address,street_address2, city_address, state_address, zip_address, date_created) 
				VALUES(:first_name,:last_name,:email,:phone,:street_address, :street_address2, :city_address, :state_address, :zip_address, :date_created)';

		$query = $this->db->prepare($sql);

		// convert Lead values into array
		$lead_array = $lead->convertToArray();
		$lead_array = array_flip($lead_array);
		array_walk($lead_array, function($value){
			return ':'.$value;
		});
		$lead_array = array_flip($lead_array);

		$query->execute($lead_array);

	}

	public function retrieveAllLeads(){
		$sql = 'SELECT * FROM lead';

		$query = $this->db->query($sql);

		return $query->fetchAll(PDO::FETCH_CLASS, Lead::class);
	}

	public function retrieveLeadById(int $id){
		$sql = 'SELECT * FROM lead WHERE id=' . $id;

		$query = $this->db->query($sql);

		return $query->fetchAll(PDO::FETCH_CLASS, Lead::class);

	}

	public function retrieveLeadByEmail(string $email){
		$sql = "SELECT * FROM lead WHERE email=`$email`";

		$query = $this->db->query($sql);

		return $query->fetchAll(PDO::FETCH_CLASS, Lead::class);

	}
}