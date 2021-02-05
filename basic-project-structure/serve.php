<?php

$finfo = finfo_open(FILEINFO_MIME_TYPE);
header("Content-type" . finfo_file($finfo, $_GET["file"]));
finfo_close($finfo);

if ($_GET["v"] !== "no") {
	header("Cache-Control: max-age=31536000");
}


echo file_get_contents($_GET["file"]);