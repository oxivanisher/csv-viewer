<?php

# Functions
function loadCsv($file) {
	$row = 0;
	$return = false;
	if (($handle = fopen($GLOBALS[csv_path] . $file, "r")) !== FALSE) {
		while (($data = fgetcsv($handle, 1000, ";")) !== FALSE) {
			$row++;
			for ($c=0; $c < count($data); $c++)
				$return[$row][$c] = $data[$c];
		}
		fclose($handle);
	}
	return $return;
}

function getFilelist($dir, $search) {
	$ret = array();
	if (is_dir($dir)) {
	    if ($dh = opendir($dir)) {
	        while (($file = readdir($dh)) !== false) {
				if ($file != "." && $file != ".." && (strrpos($file, $search) > 0)) {
					array_push($ret, $file);
				}
	        }
	        closedir($dh);
	    }
	}
	return $ret;
}

function renderCsvNav() {
	# Create Nav
	$ret = null;
	foreach (getFilelist($GLOBALS[csv_path], ".csv") as $file) {
		$pos =  strrpos($file, ".csv");
		if ($pos > 1) {
			if ($GLOBALS[sources][$file][name] == "") {
				$name = substr($file, 0, $pos);
				$name = str_replace("_", " ", $name);
				$name = ucfirst($name);
			} else {
				$name = $GLOBALS[sources][$file][name];
			}
			if ($_GET[file] == $file) {
				$active = "class='active'";
			} else {
				$active = "";
			}
			$ret .= "<li " . $active . "><a href='?file=" . $file . "'>" . $name . "</a></li>";
		}
	}
	if (! $ret) {
		$ret = "No CSV File found in folder: " . $GLOBALS[csv_path];
	}
	return $ret;
}

function renderReportsNav() {
	$ret = null;
	
	foreach (getFilelist($GLOBALS[reports_path], ".inc.php") as $file) {
		$pos =  strrpos($file, ".inc.php");
		if ($pos > 1) {
			if ($GLOBALS[sources][$file][name] == "") {
				$name = substr($file, 0, $pos);
				$name = str_replace("_", " ", $name);
				$name = ucfirst($name);
			} else {
				$name = $GLOBALS[sources][$file][name];
			}
			if ($_GET[file] == $file) {
				$active = "class='active'";
			} else {
				$active = "";
			}
			$ret .= "<li " . $active . "><a href='?file=" . $file . "'>" . $name . "</a></li>";
		}
	}
	if (! $ret) {
		$ret = "No Report File found in folder: " . $GLOBALS[reports_path];
	}

	return $ret;
}

function renderTable($data) {
	$table = "<table class='table table-striped' id='dt_cvstable'>";

	$tbody = "<tbody>";
	foreach ($data as $row) {
		$tbody .= "<tr>";
		$cnt = 0;
		foreach ($row as $col) {
			$cnt++;
			$tbody .= "<td>" . makeClickableURL($col) . "</td>";
		}
		$tbody .= "</tr>";
	}
	$tbody .= "</tbody>";

	$thead = "<thead><tr>";
	$tsorthead .= "<thead><tr>";
	$fieldcount = count($GLOBALS[sources][$_GET[file]][fields]);
	if ($fieldcount > 0) {
		for ($i = 0; $i < $fieldcount; $i++) {
				$tsorthead .= "<th><input style='width:100%;'/></th>";
				$thead .= "<th>" . $GLOBALS[sources][$_GET[file]][fields][$i] . "</th>";
           }
	} else {
		for ($i = 1; $i <= $cnt; $i++) {
			$tsorthead .= "<th><input style='width:100%;'/></th>";
			$thead .= "<th>Field " . $i . "</th>";
		}
	}
	$thead .= "</tr></thead>";
	$tsorthead .= "</tr></thead>";

	return $table . $thead  . $tsorthead . $tbody . "</table>";
}

function makeClickableURL($url) {
	$in = array('`((?:https?|ftp)://\S+[[:alnum:]]/?)`si', '`((?<!//)(www\.\S+[[:alnum:]]/?))`si');
	$out = array('<a href="$1" rel="nofollow" target="new">$1</a> ', '<a href="http://$1" rel="nofollow" target="new">$1</a>');
	return preg_replace($in, $out, $url);
}

?>
