<?php
$GLOBALS[wwwReport][search] = "wwwsize-";

function runReport() {
    $finalRet = array();

    foreach (getFilelist($GLOBALS[csv_path], ".csv") as $file) {
        if (strrpos($file, $GLOBALS[wwwReport][search]) > -1) {
            $tmpRet = processFile($file);
            $finalRet = array_merge($finalRet, $tmpRet);
        }
    }
    return $finalRet;
}

function processFile($file) {
	$serverName = str_replace(".csv", "", str_replace($GLOBALS[wwwReport][search], "", $file));

	$ret = null;
	$rowCnt = 0;
	foreach (loadCsv($file) as $row) {
		$ret[$rowCnt][0] = $serverName;
		$ret[$rowCnt][1] = $row[1];
		$ret[$rowCnt][2] = round($row[0] / 1024 / 1024, 2 ) ;
		$rowCnt++;
	}
	return $ret;
}


?>
