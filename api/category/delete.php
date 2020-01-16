<?php
  // Hederi
  header('Access-Control-Allow-Origin: *');
  header('Content-Type: application/json');
  header('Access-Control-Allow-Methods: DELETE');
  header('Access-Control-Allow-Headers: Access-Control-Allow-Headers, Content-Type, Access-Control-Allow-Methods, Authorization,X-Requested-With');

  include_once '../../config/Database.php';
  include_once '../../models/category.php';
 
  $database = new Database();
  $db = $database->connect();

  $category = new Category($db);

  $data = json_decode(file_get_contents("php://input"));

  $category->id = $data->id;

  // Izbrisi kategoriju
  if($category->delete()) {
    echo json_encode(
      array('message' => 'Kategorija izbrisana')
    );
  } else {
    echo json_encode(
      array('message' => 'Kategorija nije izbrisana')
    );
  }
