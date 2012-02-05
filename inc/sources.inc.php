<?php

# whoisonline
$filename = "whoisonline.csv"; $cnt = 0;
$GLOBALS[sources][$filename][name] = "Who is online?";
$GLOBALS[sources][$filename][fields][$cnt++] = "Type";
$GLOBALS[sources][$filename][fields][$cnt++] = "MAC Address";
$GLOBALS[sources][$filename][fields][$cnt++] = "Comment";

# Zimbra Account Usage
$filename = "accountusage.csv"; $cnt = 0;
$GLOBALS[sources][$filename][name] = "Zimbra Account Usage";
$GLOBALS[sources][$filename][fields][$cnt++] = "Address";
$GLOBALS[sources][$filename][fields][$cnt++] = "MB Used";
$GLOBALS[sources][$filename][fields][$cnt++] = "MB Quota";
$GLOBALS[sources][$filename][fields][$cnt++] = "Account Status";

# Gabi Urls
$filename = "urls.csv"; $cnt = 0;
$GLOBALS[sources][$filename][name] = "Gabi URLs";
$GLOBALS[sources][$filename][fields][$cnt++] = "User";
$GLOBALS[sources][$filename][fields][$cnt++] = "Date";
$GLOBALS[sources][$filename][fields][$cnt++] = "URL";



# Zimbra Account Usage Report
$filename = "zimbraAccounts.inc.php"; $cnt = 0;
$GLOBALS[sources][$filename][name] = "Zimbra Account Usage Report";
$GLOBALS[sources][$filename][fields][$cnt++] = "Domain";
$GLOBALS[sources][$filename][fields][$cnt++] = "User";
$GLOBALS[sources][$filename][fields][$cnt++] = "MB Used";
$GLOBALS[sources][$filename][fields][$cnt++] = "MB Quota";
$GLOBALS[sources][$filename][fields][$cnt++] = "MB Archive";
$GLOBALS[sources][$filename][fields][$cnt++] = "MB Total";
$GLOBALS[sources][$filename][fields][$cnt++] = "Account Status";

# Zimbra Account Usage Report
$filename = "gabiUrls.inc.php"; $cnt = 0;
$GLOBALS[sources][$filename][name] = "Gabi Urls";
$GLOBALS[sources][$filename][fields][$cnt++] = "User";
$GLOBALS[sources][$filename][fields][$cnt++] = "Date";
$GLOBALS[sources][$filename][fields][$cnt++] = "URL";


?>
