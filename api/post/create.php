<?php 
  // Headeri
  header('Access-Control-Allow-Origin: *');
  header('Content-Type: application/json');
  header('Access-Control-Allow-Methods: POST');
  header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods, Authorization, X-Requested-With');

  include_once '../../config/Database.php';
  include_once '../../models/Post.php';

  $database = new Database();
  $db = $database->connect();

  $post = new Post($db);

  // sirovi podaci
  $data = json_decode(file_get_contents("php://input"));

  $post->title = $data->title;
  $post->body = $data->body;
  $post->author = $data->author;
  $post->category_id = $data->category_id;

  // kreiraj vest
  if($post->create()) {
    echo json_encode(
      array('message' => 'Vest kreirana')
    );
  } else {
    echo json_encode(
      array('message' => 'Vest nije kreirana')
    );
  }

