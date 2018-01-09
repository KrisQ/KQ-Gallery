<?php 


    function __autoload($class_name) {

    	$class_name = strtolower($class_name);
    	$the_path = "includes/{$class_name}.php";

    	if(file_exists($the_path)) {
    		require_once($the_path);
    	} else {
    		die ("THE FILE NAMED {$class_name}.php was not found man");
    	}


    }

    function redirect ($location) {

    	header("Location: {$location}");

    }


?>