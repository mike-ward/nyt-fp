<?php

// set the output-file
$outputfile = "/var/www/nyt/nyt.jpg";

// set path to todays NYT frontpage
$pathToPdf="https://static01.nyt.com/images/".date('Y')."/".date('m')."/".date('d')."/nytfrontpage/scan.pdf";

// check if there is any today
$file_headers = @get_headers($pathToPdf);
if(!$file_headers || $file_headers[0] == 'HTTP/1.1 404 Not Found') {
    $exists = false;
}
else {
    $exists = true;
}

// if there's none today, get yesterdays
if(!$exists) {
	$yesterday = date('Y/m/d',strtotime("-1 days"));
	$pathToPdf="https://static01.nyt.com/images/".$yesterday."/nytfrontpage/scan.pdf";
}

?>
<meta http-equiv="refresh" content="21600">
<body style="margin-top:-100px;margin-left:-27px">
<p><?=$pathToPdf?><p>
</body>