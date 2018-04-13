<?php
/**
 * @file Lead.php
 * @author Michael A. Sypes <michael@sypes.org>
 * @project boldleads
 *
 * @abstract Entity object represents a lead in the system
 */

class Lead {
	/** @var string $first_name */
	private $first_name;

	/** @var string $last_name */
	private $last_name;

	/** @var string $email */
	private $email;

	/** @var string $phone */
	private $phone;

	/** @var string $street_address */
	private $street_address;

	/** @var string $street_address2 */
	private $street_address2;

	/** @var string $city_address */
	private $city_address;

	/** @var string $state_address */
	private $state_address;

	/** @var string $zip_address */
	private $zip_address;

	/** @var int $home_sqft */
	private $home_sqft;

	/**
	 * @return string
	 */
	public function getFirstName() {
		return $this->first_name;
	}

	/**
	 * @param string $first_name
	 */
	public function setFirstName( $first_name ) {
		$this->first_name = $first_name;
	}

	/**
	 * @return string
	 */
	public function getLastName() {
		return $this->last_name;
	}

	/**
	 * @param string $last_name
	 */
	public function setLastName( $last_name ) {
		$this->last_name = $last_name;
	}

	/**
	 * @return string
	 */
	public function getEmail() {
		return $this->email;
	}

	/**
	 * @param string $email
	 */
	public function setEmail( $email ) {
		$this->email = $email;
	}

	/**
	 * @return string
	 */
	public function getPhone() {
		return $this->phone;
	}

	/**
	 * @param string $phone
	 */
	public function setPhone( $phone ) {
		$this->phone = $phone;
	}

	/**
	 * @return string
	 */
	public function getStreetAddress() {
		return $this->street_address;
	}

	/**
	 * @param string $street_address
	 */
	public function setStreetAddress( $street_address ) {
		$this->street_address = $street_address;
	}

	/**
	 * @return string
	 */
	public function getStreetAddress2() {
		return $this->street_address2;
	}

	/**
	 * @param string $street_address2
	 */
	public function setStreetAddress2( $street_address2 ) {
		$this->street_address2 = $street_address2;
	}

	/**
	 * @return string
	 */
	public function getCityAddress() {
		return $this->city_address;
	}

	/**
	 * @param string $city_address
	 */
	public function setCityAddress( $city_address ) {
		$this->city_address = $city_address;
	}

	/**
	 * @return string
	 */
	public function getStateAddress() {
		return $this->state_address;
	}

	/**
	 * @param string $state_address
	 */
	public function setStateAddress( $state_address ) {
		$this->state_address = $state_address;
	}

	/**
	 * @return string
	 */
	public function getZipAddress() {
		return $this->zip_address;
	}

	/**
	 * @param string $zip_address
	 */
	public function setZipAddress( $zip_address ) {
		$this->zip_address = $zip_address;
	}

	/**
	 * @return int
	 */
	public function getHomeSqft() {
		return $this->home_sqft;
	}

	/**
	 * @param int $home_sqft
	 */
	public function setHomeSqft( $home_sqft ) {
		$this->home_sqft = $home_sqft;
	}


}