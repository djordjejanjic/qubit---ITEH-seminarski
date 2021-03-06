<?php 
  // Headeri
  header('Access-Control-Allow-Origin: *');
  header('Content-Type: application/json');
  header('Access-Control-Allow-Methods: DELETE');
  header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods, Authorization, X-Requested-With');

  include_once '../../config/Database.php';
  include_once '../../models/Post.php';

  $database = new Database();
  $db = $database->connect();

  $post = new Post($db);

  // sirovi podaci
  $data = json_decode(file_get_contents("php://input"));

  // id za izmenu
  $post->id = $data->id;

  // izbrisi vest
  if($post->delete()) {
    echo json_encode(
      array('message' => 'Vest izbrisana')
    );
  } else {
    echo json_encode(
      array('message' => 'Vest izbrisana')
    );
  }
