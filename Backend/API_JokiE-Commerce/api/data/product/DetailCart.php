<?php 
  // Headers
  header('Access-Control-Allow-Origin: *');
  header('Content-Type: application/json');
  include_once '../../../config/Database.php';
  include_once '../../../moduls/DataCart.php';
  $database = new Database();
  $db = $database->connect();
  $post = new Post($db);
  $post->email_akun = isset($_GET['email_akun']) ? $_GET['email_akun'] : die();
  $post->read_single();
  $post_arr = array(
    'email_akun' => $post->email_akun,
    'id_game' => $post->id_game,
  );

  print_r(json_encode($post_arr));
