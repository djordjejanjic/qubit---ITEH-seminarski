<?php
  // Headers
  header('Access-Control-Allow-Origin: *');
  header('Content-Type: application/json');
  header('Access-Control-Allow-Methods: PUT');
  header('Access-Control-Allow-Headers: Access-Control-Allow-Headers, Content-Type, Access-Control-Allow-Methods, Authorization,X-Requested-With');

  include_once '../../config/Database.php';
  include_once '../../models/category.php';
 
  $database = new Database();
  $db = $database->connect();


  $category = new Category($db);

  $data = json_decode(file_get_contents("php://input"));

  $category->id = $data->id;

  $category->name = $data->name;

  // Izmeni kategoriju
  if($category->update()) {
    echo json_encode(
      array('message' => 'Kategorija izmenjena')
    );
  } else {
    echo json_encode(
      array('message' => 'Kategorija nije izmenjena')
    );
  }
