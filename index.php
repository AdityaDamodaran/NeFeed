<?php
$rss = new DOMDocument();
$rss->load('http://feeds.reuters.com/reuters/technologyNews');
$feed = array();
echo 'here';
foreach ($rss->getElementsByTagName('item') as $node) {
	$item = array ( 
		'title' => $node->getElementsByTagName('title')->item(0)->nodeValue,
		'desc' => $node->getElementsByTagName('description')->item(0)->nodeValue,
		'link' => $node->getElementsByTagName('link')->item(0)->nodeValue,
		'date' => $node->getElementsByTagName('pubDate')->item(0)->nodeValue,
		);
	array_push($feed, $item);
}
$limit = 25;
for($x=0;$x<$limit;$x++) {
	$title = str_replace(' & ', ' &amp; ', $feed[$x]['title']);
	$link = $feed[$x]['link'];
	$description = $feed[$x]['desc'];
	$date = date('l F d, Y', strtotime($feed[$x]['date']));
	echo '<p><strong><a href="'.$link.'" title="'.$title.'">'.$title.'</a></strong><br />';
	echo '<small><em>Posted on '.$date.'</em></small></p>';
	echo '<p>'.$description.'</p>';
}
/*
$rss->load('http://feeds.foxnews.com/foxnews/most-popular');
 $feed = array();
foreach ($rss->getElementsByTagName('item') as $node) {
	$item = array ( 
		'title' => $node->getElementsByTagName('title')->item(0)->nodeValue,
		'desc' => $node->getElementsByTagName('description')->item(0)->nodeValue,
		'link' => $node->getElementsByTagName('link')->item(0)->nodeValue,
		'date' => $node->getElementsByTagName('pubDate')->item(0)->nodeValue,
//		'img' => mysql_real_escape_string(strip_tags($node->description, //'<img>')),
		);
	array_push($feed, $item);
}
$limit = 5;
for($x=0;$x<$limit;$x++) {
	$title = str_replace(' & ', ' &amp; ', $feed[$x]['title']);
	$link = $feed[$x]['link'];
	$description = $feed[$x]['desc'];
	$date = date('l F d, Y', strtotime($feed[$x]['date']));
	echo '<p><strong><a href="'.$link.'" title="'.$title.'">'.$title.'</a></strong><br />';
	echo '<small><em>Posted on '.$date.'</em></small></p>';
//	echo $img;
	echo '<p>'.$description.'</p>';
}
*/
?>
<p>&nbsp;</p>
