<?php
# Developer: Hendro Wicaksono (hendrowicaksono@yahoo.com)
$response = array();
$response['name'] = 'API for Kemdikbud Counter app!';
$response['description'] = 'Barebone Rest-based API for Kemdikbud Counter app.';
$response['version'] = '0.1';
header('Content-Type: application/json');

#debug
echo '{'."\n";
foreach ($response as $key => $value) {
	echo '  "'.$key.'" : '.'"'.$value.'"'."\n";
}
echo '}';

#echo json_encode ($response);
exit;
?>