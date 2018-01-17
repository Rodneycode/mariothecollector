<?php
	//echo filesize(getcwd() . '/players.json');
	$readFile = fopen('players.json','r+') or die("can't open file");
	$contents = fread($readFile, filesize(getcwd().'/players.json'));
	$players = json_decode($contents);
	$hasMatch = 0;
	
	$name = 'john';
	$score = 15;
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



	
?>