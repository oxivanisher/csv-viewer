<?php
$GLOBALS["accountReport"]["search"] = "accountusage-";

function runReport() {
	$finalRet = array();

	foreach (getFilelist($GLOBALS["csv_path"], ".csv") as $file) {
		if (strrpos($file, $GLOBALS["accountReport"]["search"]) > -1) {
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

	$serverName = str_replace(".csv", "", str_replace($GLOBALS["accountReport"]["search"], "", $file));

	foreach (loadCsv($file) as $row) {
		$colCnt = 0;
		list($user, $domain) = split("@", $row[0]);
		if (strrpos($domain, ".archive") > 0) {
			$tmpUser = substr($user, 0, strrpos($user, "-"));
			$tmpDomain = substr($domain, 0, strrpos($domain, ".archive"));
			$archiveDb[$tmpDomain][$tmpUser]["mbarchive"] = toMb($row[1]);
		} else {
			$accountDb[$domain][$user]["mbused"] = toMb($row[1]);
			$accountDb[$domain][$user]["mbquota"] = toMb($row[2]);
			$accountDb[$domain][$user]["percentquota"] = round(100 / $row[2] * $row[1]);
			$accountDb[$domain][$user]["trash"] = toMb($row[4]);
			$accountDb[$domain][$user]["accstatus"] = str_replace(" account)", "", str_replace("(", "", $row[3]));
		}
	}	

	$rowCnt = 0;
	foreach ($accountDb as $domain => $domainData) {
		$domainMbused = 0;
		$domainMbquota = 0;
		$domainMbarchive = 0;
		$domainMbtrash = 0;
		foreach ($domainData as $user => $userData) {
			$ret[$rowCnt][0] = $domain;
			$ret[$rowCnt][1] = $user;
			$ret[$rowCnt][2] = $userData["mbused"];
			$ret[$rowCnt][3] = $userData["mbquota"];
			$ret[$rowCnt][4] = $userData["percentquota"];

			if ($archiveDb[$domain][$user]["mbarchive"] == "") {
				$ret[$rowCnt][5] = "0";
			} else {
				$ret[$rowCnt][5] = $archiveDb[$domain][$user]["mbarchive"];
			}
		
			$ret[$rowCnt][6] = $userData["trash"];
			$ret[$rowCnt][7] = $ret[$rowCnt][2] + $ret[$rowCnt][5];
			$ret[$rowCnt][8] = $userData["accstatus"];
	
			$domainMbused = $domainMbused + $userData["mbused"];
			$domainMbquota = $domainMbquota + $userData["mbquota"];
			$domainMbarchive = $domainMbarchive + $ret[$rowCnt][5];
			$domainMbtrash = $domainMbtrash + $userData["trash"];
	
			$rowCnt++;
		}

		$ret[$rowCnt][0] = $domain;
		$ret[$rowCnt][1] = "on " . $serverName;
		$ret[$rowCnt][2] = $domainMbused;
		$ret[$rowCnt][3] = $domainMbquota;
		$ret[$rowCnt][4] = round(100 / $domainMbquota * $domainMbused);
		$ret[$rowCnt][5] = $domainMbarchive;
		$ret[$rowCnt][6] = $domainMbtrash;
		$ret[$rowCnt][7] = $domainMbused + $domainMbarchive;
		$ret[$rowCnt][8] = "Total";

		$rowCnt++;
	}
	return $ret;
}

function runReport() {
    true;
}

?>
