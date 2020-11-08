<?php

function shortest($init, $end,$matrix, $cities){
	$init = array_keys($cities,$init)[0];	#Get keys for origin and destination cities
	$end = array_keys($cities,$end)[0];
	$distances=array_fill(0,count($cities),INF);
	$q = $cities;
	$allcosts = array();
	$nextcost=0;
	$nextto = $init;
	# Get next with shrotest distance
	while (count($q) >1) {
		# Get array with costs for current city
		$nextneigh=array_filter($matrix[$nextto]);
		# for each value of the array (not zero)
		foreach($nextneigh as $key => $value){
			# calculate cost to the next node
			$nextstep = $next_cost + $value;
			#if cost is less than what it costs currently, save
			if ($nextstep < $distances[$key]) {
				$distances[$key] = $nextstep;
				$allcosts[$key]= array("cost" => $nextstep, "previous" => $cities[$nextto],'num'=> $nextto);
			}
		}
		# Get unvisted city with min cost (and its cost)
		unset($q[$nextto]);
		$next_cost=min(array_intersect_key(array_filter($distances),$q));
		$nextto=array_keys(array_intersect_key(array_filter($distances),$q),$next_cost)[0];
	};
	# Create path of cities to visit, and return
	$distances[$init]=0;
	$city=$end;
	$path=array();
	while ($city != $init){
		$path[]=$cities[$city];
		$city=$allcosts[$city]['num'];
	}
	$path[]=$cities[$init];

	return array_reverse($path);	#return json object -> json_encode(array_reverse($path));
};

# Input data
$init='Logroño';
$end='Ciudad Real';
$cities=['Logroño','Zaragoza','Teruel','Madrid','Lleida','Alicante','Castellón','Segovia','Ciudad Real'];
$connections=array([0,4,6,8,0,0,0,0,0],
        [4,0,2,0,2,0,0,0,0],
        [6,2,0,3,5,7,0,0,0],
        [8,0,3,0,0,0,0,0,0],
        [0,2,5,0,0,0,4,8,0],
        [0,0,7,0,0,0,3,0,7],
        [0,0,0,0,4,3,0,0,6],
        [0,0,0,0,8,0,0,0,4],
        [0,0,0,0,0,7,6,4,0]);

$shortest_path = shortest($init,$end,$connections,$cities);
print_r($shortest_path);

?>
