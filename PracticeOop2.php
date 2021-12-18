<?php
		//Tạo trait
		trait Active 
        {
			public function defindYourSelf() {
				return get_class();
			}
		}
		
		abstract class Country
		{
			protected $slogan;
			
			public function setSlogan($slogan) {
            	return $this->slogan = $slogan;
        	}

	        public function getSlogan () {
	            return $this->slogan;
	        }

			abstract public function sayHello();
		}

		interface Boss
		{
			public function checkValidSlogan();
		}

		class EnglandCountry extends Country implements Boss
		{
			use Active;
			public function sayHello() : string {
			    return $this->slogan;
			}

			public function checkValidSlogan() {
				$str = strtolower($this->slogan);
				if (strpos($str,"england") == true || strpos($str,"english") == false){
	                return true;
	            } else {
	                return false;
	            } 
			}
		}

		class VietnamCountry extends Country implements Boss 
		{
			use Active;
			public function sayHello() : string {
			    return $this->slogan;
			}
			public function checkValidSlogan() {
				$str = strtolower($this->slogan);
				if (strpos($str,"vietnam") == true && strpos($str,"hust") == true) {
	                return true;
	            } else {
	                return false;
	            } 
			}
		}

		$englandCountry = new EnglandCountry();
		$vietnamCountry = new VietnamCountry();

		$englandCountry->setSlogan("England is a country that is part of the United Kingdom. It shares land borders with Wales to the west and Scotland to the north. The Irish Sea lies west of England and the Celtic Sea to the southwest.");

		$vietnamCountry->setSlogan("Vietnam is the easternmost country on the Indochina Peninsula. With an estimated 94.6 million inhabitants as of 2016, it is the 15th most populous country in the world.");

		$englandCountry->setSlogan("Hello");
		echo $englandCountry->sayHello();
		echo "</br>";

		$vietnamCountry->setSlogan("Xin chào");
		echo $vietnamCountry->sayHello();
		echo "</br>";

		var_dump($englandCountry->checkValidSlogan()); // true
		echo "<br>";
		var_dump($vietnamCountry->checkValidSlogan()); // false
		echo "<br>";

		//In ra tên class
		echo 'I am ' . $englandCountry->defindYourSelf(); 
		echo "<br>";
		echo 'I am ' . $vietnamCountry->defindYourSelf();