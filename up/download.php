<?php
$ft = filter_var(htmlentities($_GET["f_type"]),FILTER_SANITIZE_STRING);
$fn = filter_var(htmlentities($_GET["f_name"]),FILTER_SANITIZE_STRING);

//header("Content-disposition: attachment; Content-type: $ft; filename=$fn");

header("Content-Description: File Transfer");
header("Content-Type: $ft");
header("Content-Disposition: attachment; filename=".basename($fn));
header("Content-Transfer-Encoding: chunked");
header("Expires: 0");
header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
header("Pragma: public");
readfile("$fn");
?>