<?php 
  // Headers
  header('Access-Control-Allow-Origin: *');
  header('Content-Type: application/json');
  include_once '../../../config/Database.php';
  include_once '../../../moduls/DataAccount.php';
  $database = new Database();
  $db = $database->connect();
  $post = new Post($db);

  $post->id = isset($_GET['id']) ? $_GET['id'] : die();

  $post->read_single();
  if($post) {
    $post_arr = array(
      'id' => $post->id,
      'email' => $post->email,
      'pass' => $post->pass,
      'jenis_akun' => $post->jenis_akun
    );
    print_r(json_encode($post_arr));
  } else {
    echo json_encode(
      array('message' => 'No Posts Found')
    );
  }
