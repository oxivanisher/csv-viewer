<?php

function runReport() {
	$ret = null;
	$rowCnt = 0;
	foreach (loadCsv("urls.csv") as $row) {
		$ret[$rowCnt][0] = $row[0];
		$ret[$rowCnt][1] = substr($row[1], 0, strrpos($row[1], "."));
		$ret[$rowCnt][2] = $row[2];
		$rowCnt++;
	}
	return $ret;
}

function runReport() {
	true;
}

?>
