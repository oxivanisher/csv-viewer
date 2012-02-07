<?php
$GLOBALS[accountReport][search] = "accountusage-";

function runReport() {
	$finalRet = array();

	foreach (getFilelist($GLOBALS[csv_path], ".csv") as $file) {
		if (strrpos($file, $GLOBALS[accountReport][search]) > -1) {
			$tmpRet = processFile($file);
			$finalRet = array_merge($finalRet, $tmpRet);
		}
	}
	return $finalRet;
}

function processFile($file) {
	$ret = null;
	$archiveDb = "";
	$accountDb = "";

	$serverName = str_replace(".csv", "", str_replace($GLOBALS[accountReport][search], "", $file));

	foreach (loadCsv($file) as $row) {
		$colCnt = 0;
		list($user, $domain) = split("@", $row[0]);
		if (strrpos($domain, ".archive") > 0) {
			$tmpUser = substr($user, 0, strrpos($user, "-"));
			$tmpDomain = substr($domain, 0, strrpos($domain, ".archive"));
			$archiveDb[$tmpDomain][$tmpUser][mbarchive] = $row[1];
		} else {
			$accountDb[$domain][$user][mbused] = $row[1];
			$accountDb[$domain][$user][mbquota] = $row[2];
			$accountDb[$domain][$user][accstatus] = $row[3];
		}
	}	

	$rowCnt = 0;
	foreach ($accountDb as $domain => $domainData) {
		$domainMbused = 0;
		$domainMbquota = 0;
		$domainMbarchive = 0;
		foreach ($domainData as $user => $userData) {
			$ret[$rowCnt][0] = $domain;
			$ret[$rowCnt][1] = $user;
			$ret[$rowCnt][2] = $userData[mbused];
			$ret[$rowCnt][3] = $userData[mbquota];

			if ($archiveDb[$domain][$user][mbarchive] == "") {
				$ret[$rowCnt][4] = "0";
			} else {
				$ret[$rowCnt][4] = $archiveDb[$domain][$user][mbarchive];
			}

			$domainMbused = $domainMbused + $ret[$rowCnt][2];
			$domainMbquota = $domainMbquota + $ret[$rowCnt][3];
			$domainMbarchive = $domainMbarchive + $ret[$rowCnt][4];
			
			$ret[$rowCnt][5] = $ret[$rowCnt][2] + $ret[$rowCnt][4];
			$ret[$rowCnt][6] = $userData[accstatus];

			$rowCnt++;
		}

		$ret[$rowCnt][0] = $domain;
		$ret[$rowCnt][1] = "&nbsp;";
		$ret[$rowCnt][2] = $domainMbused;
		$ret[$rowCnt][3] = $domainMbquota;
		$ret[$rowCnt][4] = $domainMbarchive;
		$ret[$rowCnt][5] = $domainMbused + $domainMbarchive;
		$ret[$rowCnt][6] = "Total (on " . $serverName . ")";

		$rowCnt++;
	}
	return $ret;
}


?>
