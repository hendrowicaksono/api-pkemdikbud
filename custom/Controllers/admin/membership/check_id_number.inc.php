<?php
# Developer: Hendro Wicaksono (hendrowicaksono@yahoo.com)
$response = array ();
$response['name'] = 'Check ID Number';
$response['description'] = 'Check ID Number.';

$s_detail = 'select * FROM member WHERE member_id=:id_number';
#echo $id_number;

try {
  $db = dbConnection();
  if ($db) {
    $stmt = $db->prepare($s_detail);
    $stmt->bindParam("id_number", $id_number);
    $stmt->execute();
    $db = null;
    #echo $stmt->rowCount();
    $response['dbconnection'] = '1';
    if ($stmt->rowCount() > 0) {
      $response['exist'] = '1';
    } else {
      $response['exist'] = '0';
    }

  } else {
    $response['dbconnection'] = '0';
    $response['message'] = 'Fail to connect to database';
  }
} catch(PDOException $e) {
  $response['dbconnection'] = '0';
  $response['message'] = $e->getMessage();
}

header('Content-Type: application/json');
#echo json_encode ($response);

#debug
echo '{'."\n";
foreach ($response as $key => $value) {
  echo '  "'.$key.'" : '.'"'.$value.'"'."\n";
}
echo '}';

exit;

?>