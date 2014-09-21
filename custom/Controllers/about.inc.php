<?php
# Developer: Hendro Wicaksono (hendrowicaksono@yahoo.com)

$response = array();
$response['developer'] = 'Hendro Wicaksono';
$response['framework'] = 'Slim (http://slimframework.com).';

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