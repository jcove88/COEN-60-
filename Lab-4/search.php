<!DOCTYPE html> 
<html>
<title>My Search Page</title>
<body>
	<h1>Search for a text</h1>
		<div>
				<form action="<?php echo $_SERVER["PHP_SELF"];?>" method="get">
				Query: <input name="query" type="text" value="<?php if (isset($_GET["query"])) echo $_GET["query"]; ?>">
				<input type="Submit" value="submit"/>
				</form>
		</div>
</body>

<?php
$start_time = microtime(true);

if(isset($_GET['query'])) {
	$query = $_GET['query'];
}
else
{
	$query = " ";
}
$texts = glob("doc/*.txt");
$count = 0;
if (isset($_GET['query'])) {
	echo "query is:", $query;
	foreach ($texts as $text_file) {
		$string = file_get_contents($text_file);
		if (strpos($string, $query) !== false) {
			$count++;
			$strpos = strpos($string, $query);
			$list = basename($text_file, ".txt");
			echo "<ul><li class = docitem><a href='" . $text_file . "'>" . $list . "</a></li></ul><br>";
			echo (substr($string, $strpos-30, 1500)) . "<br>";
		}
	}
	if (strpos($string, $query) === false) {
		echo "No results were found. Please try a different Word.";
		echo "<br>";
	}
}
$end_time = microtime(true);
echo "<br>";
$result_time = $end_time - $start_time;
echo $count . " results found in " . round($result_time, 3) . " seconds.";
?>
</html>			
