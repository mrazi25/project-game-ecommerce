<?php 
  // Headers
  header('Access-Control-Allow-Origin: *');
  header('Content-Type: application/json');
  include_once '../../../config/Database.php';
  include_once '../../../moduls/DataProduct.php';
  $database = new Database();
  $db = $database->connect();
  $post = new Post($db);
  $post->id = isset($_GET['id']) ? $_GET['id'] : die();
  $post->read_single();
  $post_arr = array(
    'id' => $post->id,
    'judul' => $post->judul,
    'harga' => $post->harga,
    'developer' => $post->developer,
    'terjual' => $post->terjual,
    'file_foto' => $post->file_foto,
    'deskripsi' => $post->deskripsi,
  );

  print_r(json_encode($post_arr));
