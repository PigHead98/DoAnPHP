<?php

function GetTitle_brand($con){
	
		$brands = array();
		$result = mysqli_query($con,"select * from brands");//js onclick
		while($row = mysqli_fetch_array($result)){
				$brands[$row['brand_id']] = array('name' => $row['brand_title'],'id' => $row['brand_id']);
			}
		return $brands;

	} 
?>