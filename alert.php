<?php

if (PHP_SAPI !== 'cli') {
	die ("Only available in CLI.\n");
}

# CSV Output

# Settings
require_once("inc/settings.inc.php");

# Load saved svc file settings
require_once("inc/sources.inc.php");

# Load PHP functions
require_once("inc/functions.inc.php");

# Looping trough Files
foreach (getFilelist($GLOBALS["reports_path"], ".inc.php") as $file) {
    $pos = strrpos($file, ".inc.php");
    if ($pos > 1) {
        if (empty($GLOBALS["sources"][$file]["name"])) {
            $name = substr($file, 0, $pos);
            $name = str_replace("_", " ", $name);
            $name = ucfirst($name);
        } else {
            $name = $GLOBALS["sources"][$file]["name"];
        }
    }
	echo "Found report " . $name . "\n";
	include($GLOBALS["reports_path"] . "/" . $file);
	checkAlert();

	# not allowd to overwrite function
	exit;
}


?>
