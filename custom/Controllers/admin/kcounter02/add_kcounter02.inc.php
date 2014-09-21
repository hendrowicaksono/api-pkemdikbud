<?php
# Developer: Hendro Wicaksono (hendrowicaksono@yahoo.com)
header('Content-Type: application/json');
$response = array ();
global $app;
#echo 'create new author yo';
$request = $app->request();
#$request = Slim::getInstance()->request();
$body = $request->getBody();
$input = json_decode($body); 
#echo 'okeh bro';
#var_dump($input);
#echo $input->author_name."\n";

#check id_number
#echo $input->id_number;
$s_detail = 'select * FROM item WHERE item_code=\''.$input->barcode.'\'';

try {
  $db = dbConnection();
  if ($db) {
    $stmt = $db->prepare($s_detail);
    #$stmt->bindParam("id_number", $id_number);
    $stmt->execute();
    $db = null;
    $response['dbconnection'] = '1';
    if ($stmt->rowCount() > 0) {
      $response['exist'] = '1';
      $sql = "INSERT INTO kcounter02 (";
      $sql .= "tos,";
      $sql .= "barcode,";
      $sql .= "datetime";
      $sql .= ") VALUES (";
      $sql .= ":tos,";
      $sql .= ":barcode,";
      $sql .= ":datetime";
      $sql .= ")";

      $datetime = time();
      $db = dbConnection();
      $stmt = $db->prepare($sql);
      $stmt->bindParam("tos", $input->jenis);
      $stmt->bindParam("barcode", $input->barcode);
      $stmt->bindParam("datetime", $datetime);
      $stmt->execute();
      $db = null;

      $response['message'] = 'Data successfully added!';
      #echo json_encode($response);

    } else {
      $response['exist'] = '0';
      $response['message'] = '<strong>Invalid Barcode!</strong>';
      /**
      if ((trim($input->institution) == '') OR (strlen($input->institution) < 3 )) {
        $response['message'] = 'Untuk non member Jangan lupa isi data institusi dengan minimal 3 karakter.';
      } else {
        $response['dbconnection'] = '1';
        $response['exist'] = '1';
        $sql = "INSERT INTO kcounter01 (";
        $sql .= "tos,";
        $sql .= "id_number,";
        $sql .= "institution,";
        $sql .= "datetime";
        $sql .= ") VALUES (";
        $sql .= ":tos,";
        $sql .= ":id_number,";
        $sql .= ":institution,";
        $sql .= ":datetime";
        $sql .= ")";

        $datetime = time();
        $db = dbConnection();
        $stmt = $db->prepare($sql);
        $stmt->bindParam("tos", $input->jenis);
        $stmt->bindParam("id_number", $input->id_number);
        $stmt->bindParam("institution", $input->institution);
        $stmt->bindParam("datetime", $datetime);
        $stmt->execute();
        $db = null;

        $response['message'] = 'Data successfully added ya!';
      }
      **/
    }
  } else {
    $response['dbconnection'] = '0';
    $response['message'] = 'Fail to connect to database';
  }
} catch(PDOException $e) {
  $response['dbconnection'] = '0';
  $response['message'] = $e->getMessage();
}
#var_dump ($response);
echo json_encode($response);

exit;
?>