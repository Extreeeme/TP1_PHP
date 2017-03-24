<?php

	/**
	* USERS
	*/
	class User
	{
		public $firstName;
		public $lastName;
		public $birth_Date;
		public $adress;
		public $zip_Code;
		public $phone_Number;
		public $service;
		function __construct($firstName, $lastName, $birth_Date, $adress, $zip_Code, $phone_Number, $service)
		{
			$this->firstName = $firstName;
			$this->lastName = $lastName;
			$this->birth_Date = $birth_Date;
			$this->adress = $adress;
			$this->zip_Code = $zip_Code;
			$this->phone_Number =$phone_Number;
			$this->service = $service;
		}
	}