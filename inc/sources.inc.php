<?php

# whoisonline
$filename = "whoisonline.inc.php"; $cnt = 0;
$GLOBALS["sources"][$filename]["name"] = "Online IPs";
$GLOBALS["sources"][$filename]["fields"][$cnt++] = "Type";
$GLOBALS["sources"][$filename]["fields"][$cnt++] = "Comment";
$GLOBALS["sources"][$filename]["fields"][$cnt++] = "Hidden";
$GLOBALS["sources"][$filename]["fields"][$cnt++] = "Owner";
$GLOBALS["sources"][$filename]["fields"][$cnt++] = "IP";
$GLOBALS["sources"][$filename]["fields"][$cnt++] = "MAC";

# Zimbra Account Usage
$filename = "accountusage.csv"; $cnt = 0;
$GLOBALS["sources"][$filename]["name"] = "Zimbra Account Usage";
$GLOBALS["sources"][$filename]["fields"][$cnt++] = "Address";
$GLOBALS["sources"][$filename]["fields"][$cnt++] = "MB Used";
$GLOBALS["sources"][$filename]["fields"][$cnt++] = "MB Quota";
$GLOBALS["sources"][$filename]["fields"][$cnt++] = "Account Status";

# Gabi Urls
$filename = "urls.csv"; $cnt = 0;
$GLOBALS["sources"][$filename]["name"] = "Gabi URLs";
$GLOBALS["sources"][$filename]["fields"][$cnt++] = "User";
$GLOBALS["sources"][$filename]["fields"][$cnt++] = "Date";
$GLOBALS["sources"][$filename]["fields"][$cnt++] = "URL";

# Zimbra Account Usage Report
$filename = "zimbraAccounts.inc.php"; $cnt = 0;
$GLOBALS["sources"][$filename]["name"] = "Zimbra Account Usage Report";
$GLOBALS["sources"][$filename]["fields"][$cnt++] = "Domain";
$GLOBALS["sources"][$filename]["fields"][$cnt++] = "User";
$GLOBALS["sources"][$filename]["fields"][$cnt++] = "Used";
$GLOBALS["sources"][$filename]["fields"][$cnt++] = "Quota";
$GLOBALS["sources"][$filename]["fields"][$cnt++] = "% Q";
$GLOBALS["sources"][$filename]["fields"][$cnt++] = "Archive";
$GLOBALS["sources"][$filename]["fields"][$cnt++] = "Trash";
$GLOBALS["sources"][$filename]["fields"][$cnt++] = "Total";
$GLOBALS["sources"][$filename]["fields"][$cnt++] = "Status";

# Gabi URL's
$filename = "gabiUrls.inc.php"; $cnt = 0;
$GLOBALS["sources"][$filename]["name"] = "Gabi Urls";
$GLOBALS["sources"][$filename]["fields"][$cnt++] = "User";
$GLOBALS["sources"][$filename]["fields"][$cnt++] = "Date";
$GLOBALS["sources"][$filename]["fields"][$cnt++] = "URL";

# WWW Data Dir Size
$filename = "wwwSize.inc.php"; $cnt = 0;
$GLOBALS["sources"][$filename]["name"] = "WWW Dir Size Report";
$GLOBALS["sources"][$filename]["fields"][$cnt++] = "Server";
$GLOBALS["sources"][$filename]["fields"][$cnt++] = "Directory";
$GLOBALS["sources"][$filename]["fields"][$cnt++] = "Size in MB";


# Mail Data Dir Size
$filename = "mailSize.inc.php"; $cnt = 0;
$GLOBALS["sources"][$filename]["name"] = "Mail Dir Size Report";
$GLOBALS["sources"][$filename]["fields"][$cnt++] = "Server";
$GLOBALS["sources"][$filename]["fields"][$cnt++] = "Domain";
$GLOBALS["sources"][$filename]["fields"][$cnt++] = "User";
$GLOBALS["sources"][$filename]["fields"][$cnt++] = "Size in MB";


?>
