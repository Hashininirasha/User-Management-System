<?php

	function verify_query($result_set){

		global $con;
		if(!$result_set){
			die("Database query failed: " .mysqli_error());
		}
		
	}

?>