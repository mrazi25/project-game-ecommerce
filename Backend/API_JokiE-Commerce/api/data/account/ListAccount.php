<?php 
  // Headers
  header('Access-Control-Allow-Origin: *');
  header('Content-Type: application/json');

  include_once '../../../config/Database.php';
  include_once '../../../moduls/DataAccount.php';

  $database = new Database();
  $db = $database->connect();

  $post = new Post($db);
  $result = $post->read();
  $num = $result->rowCount();
  if($num > 0) {
    $posts_arr = array();

    while($row = $result->fetch(PDO::FETCH_ASSOC)) {
      extract($row);
      
      $post_item = array(
        'id' => $id,
        'email' => $email,
        'pass' => $pass,
        'jenis_akun' => $jenis_akun
      );
      array_push($posts_arr, $post_item);
    }

    echo json_encode($posts_arr);

  } else {
    echo json_encode(
      array('message' => 'No Posts Found')
    );
  }
