<?php 
  class Post {

    private $conn;
    private $table = 'product';

    public $id;
    public $judul;
    public $harga;
    public $developer;
    public $terjual;
    public $file_foto;
    public $deskripsi;


    public function __construct($db) {
      $this->conn = $db;
    }

    public function read() {
      // Create query
      $query = 'SELECT * FROM ' . $this->table . ' ORDER BY Id';
      
      // Prepare statement
      $stmt = $this->conn->prepare($query);

      // Execute query
      $stmt->execute();

      return $stmt;
    }

    public function read_single() {
          $query = 'SELECT * FROM ' . $this->table . ' WHERE id = :id';

          $stmt = $this->conn->prepare($query);

          $stmt->bindParam(':id', $this->id);

          $stmt->execute();

          $row = $stmt->fetch(PDO::FETCH_ASSOC);
          if($row){
            $this->id = $row['id'];
            $this->judul = $row['judul'];
            $this->harga = $row['harga'];
            $this->developer = $row['developer'];
            $this->terjual = $row['terjual'];
            $this->file_foto = $row['file_foto'];
            $this->deskripsi = $row['deskripsi'];
          }
          
    }
  }
