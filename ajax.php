<?php
	

	
	$action = (isset($_GET['action'])) ? $_GET['action'] : '';
	
	if($action!=''){
		$action();
	}

	function save_score(){
		$response = array('status'=>'not ok');
		$score = (isset($_GET['score'])) ? $_GET['score'] : 0;
		$name = (isset($_GET['name'])) ? $_GET['name'] : '';
		if($score!='' && $name!=''){
			if(!file_exists('datas/'.$name.'.json')){
				$response['status'] = 'ok';
				$createFile = fopen('datas/'.$name.'.json','w') or die("can't open file");
				$createJson = json_encode(array('score'=>$score,'name'=>$name));
				fwrite($createFile, $createJson);
				fclose($createFile);
			}

		}
		echo json_encode($response);
		
		//if(file_exists(filename))
	}

?>