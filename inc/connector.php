<?php
   // Connecting Database Driver.

	final class dbdriver{
		public static $connection;

		public function connect($host,$user,$password,$dbname){
			if($host && $user && $password && $dbname){
				if($this -> connection = mysqli_connect($host,$user,$password,$dbname)){
					return true;
				}
				else{
					return false;
				}
			}
			else{
				return false;
			}
		}

		public function disconnect(){
			$this -> connection = false;
		}

		public function query($querystring){
			if($querystring){
				$querystring = (string)$querystring;

				return mysqli_query($this -> connection,$querystring);
			}
			else{
				return false;
			}
		}

		public function fetch($queryobject){
			if($queryobject){
				return mysqli_fetch_assoc($queryobject);
			}
			else{
				return false;
			}
		}

		public function escape($string){
			if($string){
				$string = (string) $string;

				return mysqli_real_escape_string($this -> connection,$string);
			}
			else{
				return "";
			}
		}

		public function numrows($query){
               if($query){
                    return mysqli_num_rows($query);
               }
               else{
                    return 0;
               }
        }

        // DB DRIVER COMPLETED!
	}
?>