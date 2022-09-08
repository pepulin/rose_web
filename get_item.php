<?php
  if ( $name = $_GET['name'] ?? '' ) {
	// Get the contents of the JSON file 
	$strJsonFileContents = file_get_contents('static/list_weapon.json');
	$weapons = json_decode($strJsonFileContents, true);
	$weapon_html = '';
	foreach ($weapons as $weapon) {
		if($weapon['Name'] == $name) {
			$weapon_html = "<div style='background: #000; color: #fff; font-family: Verdana; font-size: 12px; font-weight: normal !important; max-width: 100% !important; width: 500px; padding: 3px;'>
			<div style='float:right; width:40px; height:40px; background: url(//rose.freecluster.eu/static/icons/{$weapon['Icon Number']}.png);'>
				&nbsp;
			</div>
			<strong><span style='color:#00ffff;'>{$weapon['Name']}</span></strong>
			<br>
			<span style='color: #A6CAF0'>Classification:</span> {$weapon['Item Type']} &nbsp;&nbsp;&nbsp; <span style='color: #A6CAF0'>Hitting Rate:</span> {$weapon['Accuracy']}  <br>
			<span style='color: #A6CAF0'>Life Span:</span> 100% &nbsp;&nbsp;&nbsp; <span style='color: #A6CAF0'>Durability:</span> {$weapon['Durability']}
			<br>	
			<span style='color: #A6CAF0'>Attack Power:</span> {$weapon['ATK']} &nbsp;&nbsp;&nbsp; <span style='color: #A6CAF0'>Attack Speed:</span> {$weapon['ATK Speed']}
			<br>
			<span style='color: #A6CAF0'>Attack Distance:</span> {$weapon['Range']}
			<br>   
			<span style='color:#00ff00;'>[Equipment Condition: {$weapon['Req1']} {$weapon['Val1']}]</span>
			<br>
			<span style='color:#00ff00;'>[Equipment Condition: {$weapon['Req2']} {$weapon['Val2']}]</span>
			<br> <span style='color: #A6CAF0'>Weight:</span> 50
			<br>				{$weapon['Description']}
			</div><br>";
			header( 'Content-Type: text/javascript' );
			echo json_encode($weapon_html);
			return;
		}
	}
	if($weapon_html == '') {
		echo 'Cannot find that item.';
	}
}
?>