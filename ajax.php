<?php
	

	
	$action = (isset($_GET['action'])) ? $_GET['action'] : '';
	
	if($action!=''){
		$action();
	}

	function save_score(){
		$response = array('status'=>'not ok');
		$curDir = getcwd();
		$score = (isset($_GET['score'])) ? $_GET['score'] : 0;
		$name = (isset($_GET['name'])) ? $_GET['name'] : '';
		if($score!='' && $name!=''){

			if(!file_exists($curDir.'/data/'.$name.'.json')){
				$response['status'] = 'ok';
				$createFile = fopen($curDir.'/data/'.$name.'.json','w');
				$createJson = json_encode(array('score'=>$score,'name'=>$name));
				fwrite($createFile, $createJson);
				fclose($createFile);

			}	
		}
		echo json_encode($response);
		
		//if(file_exists(filename))
	}

?>