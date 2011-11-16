<?php

$directory = './';

// Fetch the 'dir' parameter if necessary
if (isset($_GET['dir'])) {
	$directory = $_GET['dir'];
}

// Find all CSS files in the directory
$css_files = glob("$directory/*.css");

$count = 1;
$output_css = '';
$output_contents = "/******************************\n\n * DIRECTORY: $directory\n";

foreach ($css_files as $css_file)
{
	$title = str_replace('.CSS', '', strtoupper($css_file));
	$title = str_replace('.', '', strtoupper($title));
	$title = str_replace('/', '', strtoupper($title));
	
	// CSS section header
	$css = "/******************************\n";
	$css .= " * $count. " . $title .  "\n";
	$css .= " *****************************/\n";
	
	// Add to the contents list
	$output_contents .= " * $count. " . $title .  "\n";
	
	// Actual CSS
	$css .= file_get_contents($css_file);
	
	$output_css .= $css . "\n";
	
	$count++;
}

$output_contents .= " *****************************/\n\n";

header('Content-type: text/css');
echo $output_contents;
echo $output_css;

?>

