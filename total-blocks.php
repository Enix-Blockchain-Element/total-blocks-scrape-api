<?php

// explorer.enix.ai API

/*$json_response = file_get_contents('https://explorer.enix.ai/api/?module=block&action=eth_block_number');
$json_data = json_decode($json_response, true);

if($json_data['result'] != ''){
	echo number_format(hexdec($json_data['result']), 0);
}

function dec2hex($number)
{
  $hexvalues = array('0','1','2','3','4','5','6','7',
             '8','9','A','B','C','D','E','F');
  $hexval = '';
   while($number != '0')
   {
      $hexval = $hexvalues[bcmod($number,'16')].$hexval;
      $number = bcdiv($number,'16',0);
  }
  return $hexval;
}*/

$doc = new DomDocument;
$doc->validateOnParse = true;
$doc->loadHTML(mb_convert_encoding(file_get_contents('https://explorer.enix.ai/'), 'HTML-ENTITIES', 'UTF-8'));

$xpath = new DOMXpath($doc);
$dashboard_banner_items = $xpath->query('//span[@class="dashboard-banner-network-stats-value"]');
$totalBlocks = 0;

foreach($dashboard_banner_items as $container) {
	
  if ($container->getAttribute('data-selector') == "block-count"){
  	$totalBlocks = $container->nodeValue;
  }
  
}

echo $totalBlocks;
exit;

?>