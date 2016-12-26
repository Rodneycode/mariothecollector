<?php
	

	echo getcwd();
	$action = (isset($_GET['action'])) ? $_GET['action'] : '';

	if($action!=''){
		$action();
	}

	function save_score(){

		//if(file_exists(filename))
	}

?>