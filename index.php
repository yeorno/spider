<?php  
include_once('simple_html_dom.php');
date_default_timezone_set('PRC');
$html = file_get_html('http://www.310win.com/others/kaijiang_dc_11.html');
error_reporting(0);
echo "<pre>";
$data = [];
foreach($html->find('td') as $key => $e)
	if($key > 9){
		array_push($data,$e->innertext);
	}

$result = array_chunk($data,10);
$matchSp = [];
foreach ($result as $key => $value) {
	

	if(trim($value[1]) == '足球'){
		

		$matchSp[] = [
			'sp' => strip_tags(trim($value[9])),
			'type' => 3,
			'result' => trim($value[8]),
			'create_time' => time(),
			'line' => substr(date('ymd',strtotime(date('Y').'-'.trim($value[3]))).'-' .trim($value[0]),1),
			
		];
		
	}
}

var_dump($matchSp);


	
	
    