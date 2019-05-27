<?php

function GetTitle_cat($con){
	
		$categories = array();
		$result = mysqli_query($con,"select * from categories");//js onclick
		while($row = mysqli_fetch_array($result)){
				$categories[$row['cat_id']] = array('name' => $row['cat_title'],'id' => $row['cat_id']);
			}

		return $categories;

	} 
?>