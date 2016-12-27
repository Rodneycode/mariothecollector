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
			$response['status'] = 'ok';

			if(file_exists('players.json')){

				$readFile = fopen('players.json','r+') or die("can't open file");
				$contents = fread($readFile, filesize(getcwd().'/players.json'));
				$players = json_decode($contents);
				$hasMatch = 0;
				$index = 0;

				foreach ($players as $key => $value) {
					if($value->name==$name){
						$hasMatch = 1;
						$players[$index]->score = $score;
					}
				}

				if($hasMatch==0){
					$tmp = new stdClass;
					$tmp->score = $score;
					$tmp->name = $name;
					$players[] = $tmp;
					//array_push($newPlayers,array('score'=>$score,'name'=>$name));
				
				}
				$createJson = json_encode($players);
				fclose($readFile);

				$readFile = fopen('players.json','w') or die("can't open file");
				$contents = fread($readFile, filesize(getcwd().'/players.json'));
				fwrite($readFile,$createJson);
				fclose($readFile);
			}else{
				$createFile = fopen('players.json','w') or die("can't open file");
				$createJson = json_encode(array(array('score'=>$score,'name'=>$name)));
				fwrite($createFile, $createJson);
				fclose($createFile);	
			}
			
		}
		echo json_encode($response);
		
		//if(file_exists(filename))
	}

?>