<?php

function runReport() {

    $url = "http://localhost/whoisonline.php?mode=csv";
    $numOfFields = 6;
    $rowCount = 0;
    $ret = null;
    foreach (loadUrl($url) as $row) {
        if (count($row) < 2)
            continue;
        for ($i = 0; $i < $numOfFields; $i++) {
            $ret[$rowCount][$i] = $row[$i];
        }
        $rowCount++;
    }
    return $ret;
}

function checkAlert() {
    true;
}

?>
