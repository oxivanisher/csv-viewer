<?php

// $GLOBALS["sources"][$filename]["fields"][$cnt++] = "Title"; 0
// $GLOBALS["sources"][$filename]["fields"][$cnt++] = "Year"; 1
// $GLOBALS["sources"][$filename]["fields"][$cnt++] = "Country"; 2
// $GLOBALS["sources"][$filename]["fields"][$cnt++] = "Duration"; 3
// $GLOBALS["sources"][$filename]["fields"][$cnt++] = "Genere"; 4
// $GLOBALS["sources"][$filename]["fields"][$cnt++] = "Medium"; 5
// $GLOBALS["sources"][$filename]["fields"][$cnt++] = "Loaned"; 6
// loandate 7
// cover 8

function runReport() {
	$ret = null;
	$rowCnt = 0;
	foreach (loadCsv("movies.csv") as $row) {
		#"<img src='" . $row[8] . "' style='max-height: 16px; max-width: 16px'/>"
		$ret[$rowCnt][0] = "<abbr title='" . $row[2] . " " . $row[1] . "'>" . htmlspecialchars($row[0]) . "</abbr>";
		$ret[$rowCnt][1] = $row[3];
		$ret[$rowCnt][2] = "<abbr title='" . $row[4] . "'>" . $row[5] . "</abbr>";
		$ret[$rowCnt][3] = "<abbr title='" . $row[7] . "'>" . htmlspecialchars($row[6]) . "</abbr>";
		$rowCnt++;
	}
	return $ret;
}

function checkAlert() {
	true;
}

?>
