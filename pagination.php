<?php


function getPagination($page, $page_count){
	if($page > $page_count || $page < 1){
		$page = 1;
	}
	$page_tabs = 9;
	$page_show = 7;
	$page_middle = 5;
	$pag = "";
	$en = "";
	$dis = "disabled";
	$dots = "...";
	$prev = "<<";
	$next = ">>";
	//
	//"previous"
	$value = $prev;
	$visible = ($page == 1) ? $dis : $en;
	$link = ($page == 1) ? "" : getLink($page - 1);
	$pag .= getPageTab($link, $visible, $value);
	//
	//"middle"
	if($page_count <= $page_tabs){
		$to = $page_tabs;
		for($i = 1; $i <= $page_count; $i++){
			$pag .= getPageTab(getLink($i), (($i == $page) ? $dis : $en), $i);
		}
	}
	else{
		$left = ($page <= ($page_count - $page_show + 1));
		$right = ($page >= $page_show);
		//
		$left_pag = ($left && !$right);
		$right_pag = (!$left && $right);
		$middle_pag = ($left && $right);
		$none_pag = (!$left && !$right);
		//
		if($left_pag || $none_pag){
			for($i = 1; $i <= ($page_tabs - 2); $i++){
				$pag .= getPageTab(getLink($i), (($i == $page) ? $dis : $en), $i);
			}
			//
			$pag .= getPageTab(getLink($page), $dis, $dots);
			$pag .= getPageTab(getLink($page_count), $en, $page_count);
		}
		elseif($middle_pag || $none_pag){
			$pag .= getPageTab(getLink(1), $en, 1);
			$pag .= getPageTab(getLink($page), $dis, $dots);
			for($i = ($page - floor($page_middle / 2)); $i <= ($page + floor($page_middle / 2)); $i++){
				$pag .= getPageTab(getLink($i), (($i == $page) ? $dis : $en), $i);
			}
			$pag .= getPageTab(getLink($page), $dis, $dots);
			$pag .= getPageTab(getLink($page_count), $en, $page_count);
		}
		elseif($right_pag || $none_pag){
			$pag .= getPageTab(getLink(1), $en, 1);
			$pag .= getPageTab(getLink($page), $dis, $dots);
			//
			for($i = (($page_count - $page_show) + 1); $i <= $page_count; $i++){
				$pag .= getPageTab(getLink($i), (($i == $page) ? $dis : $en), $i);
			}
		}
	}
	//
	//"next"
	$value = $next;
	$visible = ($page == $page_count) ? $dis : $en;
	$link = ($page == $page_count) ? "" : getLink($page + 1);
	$pag .= getPageTab($link, $visible, $value);
	//
	echo "<div class='pag'>" . $pag . "</div>";
}

function getLink($page){
	return "http://example.com/?page=" . $page;
}

function getPageTab($link, $visible, $value){
	$button = "<a class='button' href='%link%'><button %visible%>%value%</button></a>";
	return str_replace(array("%link%", "%visible%", "%value%"), array($link, $visible, $value), $button);

}


?>

<html>
<head>
	<style>
		body{
			background-color: #41a0bf;
		}
		
		.button{
			padding: 3px;
		}

		.button button{
			padding: 10px;
			background-color: #ee4e4e;
			text-decoration: none;
			color: #fff;
			cursor:pointer;
			border: none;
		}

		.button button:hover{
			background-color: #de1818;
			color: #fff;
			cursor:pointer;
		}

		.button button:disabled{
			background-color: #f6efcc;
			color: #6d643c;
			cursor: text;
		}

		#pags{
			text-align: center;
		}

		h3{
			color: #f6efcc;
			text-shadow: 2px 2px #de1818;
		}
		
		h1{
			color: #41a0bf;
			text-shadow: 3px 3px #de1818;
			font-size: 250%;
		}
		
		h2{
			color: #41a0bf;
			text-shadow: 3px 3px #de1818;
		}
		
		h1 a{
			color: #41a0bf;
			text-shadow: 3px 3px #5A0086;
			text-decoration: none;
		}
	</style>
</head>
<body>
<div id="pags">
	<!--	examples	-->
	<h1>Simple pagination generator</h1>
	<h1 id="project"><a href="https://github.com/beso9595/simple-pagination-generator" target="_blank">View Project</a></h1>
	<h3>$page = 1, $page_count = 200;</h3>
	<?php getPagination(1, 200); ?>
	<h3>$page = 2, $page_count = 200;</h3>
	<?php getPagination(2, 200); ?>
	<h3>$page = 7, $page_count = 200;</h3>
	<?php getPagination(7, 200); ?>
	<h3>$page = 150, $page_count = 200;</h3>
	<?php getPagination(150, 200); ?>
	<h3>$page = 195, $page_count = 200;</h3>
	<?php getPagination(195, 200); ?>
	<h3>$page = 200, $page_count = 200;</h3>
	<?php getPagination(200, 200); ?>
	<h3>$page = 201, $page_count = 200;</h3>
	<?php getPagination(201, 200); ?>
	<h3>$page = 1, $page_count = 2;</h3>
	<?php getPagination(1, 2); ?>
	<h3>$page = 2, $page_count = 2;</h3>
	<?php getPagination(2, 2); ?>
	<h3>$page = 1, $page_count = 1;</h3>
	<?php getPagination(1, 1); ?>
	<h3>$page = 5, $page_count = 10;</h3>
	<?php getPagination(5, 10); ?>
	<h3>$page = 8, $page_count = 10;</h3>
	<?php getPagination(8, 10); ?>
	<h3>$page = 10000, $page_count = 10500;</h3>
	<?php getPagination(10000, 10500); ?>
	<h3>$page = 10495, $page_count = 10500;</h3>
	<?php getPagination(10495, 10500); ?>
	<h2>Powered by beso9595</h2>
</div>
</body>
</html>