<?php

function pollgraphs_results_page($node){
	$data = advpoll_get_data($node);
	$results = advpoll_get_votes($node->nid,$data->behavior);
    $final = advpoll_update_choices($data->choices, $results['choices']);
	$chartarr = array();
	$chartarr[] = array('Question', 'Answer');
	foreach($final as $choice){
	$chartarr[] = array($choice['title'] , $choice['votes'] );	
	}
	$javaarr = json_encode($chartarr);
//	$data = advpoll_get_votes($node->nid);
//	$results = advpoll_display_results($node->nid, $data, $page = 1);
	//$data = advpoll_get_data($node);
	//var_dump($results);
	//var_dump($final);
	drupal_add_js('https://www.google.com/jsapi', 'external');
	
$heredoc = <<<SCRIPT
	  google.load("visualization", "1", {packages:["corechart"]});
      google.setOnLoadCallback(drawChart);
      function drawChart() {
        var data = google.visualization.arrayToDataTable({$javaarr});

      var options = {
        
        pieSliceText: 'label',
        title: '{$node->title}',
      };

        var chart = new google.visualization.PieChart(document.getElementById('piechart'));
        chart.draw(data, options);
      }
SCRIPT;
	drupal_add_js($heredoc,'inline');
	
	
	
	
	
	
	$content = array();

	$content['raw_markup'] = array(
		'#type' => 'markup',
		'#markup' => 'This is where we will show graphs based on votes. Maybe we can use Google Charts Api',
		'#prefix' => '<div id="piechart" style="width: 900px; height: 500px;">',
		'#suffix' => '</div>'
		);
	return $content;
}
