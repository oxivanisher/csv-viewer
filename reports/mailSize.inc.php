<?php
$GLOBALS[mailReport][search] = "mailsize-";

function runReport() {
    $finalRet = array();

    foreach (getFilelist($GLOBALS[csv_path], ".csv") as $file) {
        if (strrpos($file, $GLOBALS[mailReport][search]) > -1) {
            $tmpRet = processFile($file);
            $finalRet = array_merge($finalRet, $tmpRet);
        }
    }
    return $finalRet;
}

function processFile($file) {
	$ret = null;
	$accountDb = null;

	$serverName = str_replace(".csv", "", str_replace($GLOBALS[mailReport][search], "", $file));

	foreach (loadCsv($file) as $row) {
		$colCnt = 0;
		$tmpArray = split("/", $row[1]);
		$tmpCnt = count($tmpArray);
		$accountDb[$tmpArray[($tmpCnt - 2)]][$tmpArray[($tmpCnt - 1)]][mbused] = toMb($row[0]);
	}	

	$rowCnt = 0;
	foreach ($accountDb as $domain => $domainData) {
		$domainMbused = 0;
		foreach ($domainData as $user => $userData) {
			$ret[$rowCnt][0] = $serverName;
			$ret[$rowCnt][1] = $domain;
			$ret[$rowCnt][2] = $user;
			$ret[$rowCnt][3] = $userData[mbused];

			$domainMbused = $domainMbused + $userData[mbused];
	
			$rowCnt++;
		}

		$ret[$rowCnt][0] = $serverName;
		$ret[$rowCnt][1] = $domain;
		$ret[$rowCnt][2] = "Domain Total";
		$ret[$rowCnt][3] = $domainMbused;

		$rowCnt++;
	}
	return $ret;
}


?>
