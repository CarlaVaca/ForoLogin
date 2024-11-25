<?php
$mysqli = new //mysqli("fdb1028.awardspace.net","4555447_forologin","Russell09*","4555447_forologin");
mysqli("localhost","root","","forologin");

// Check connection
if ($mysqli -> connect_errno) {
  echo "Failed to connect to MySQL: " . $mysqli -> connect_error;
  exit();
}
?>
