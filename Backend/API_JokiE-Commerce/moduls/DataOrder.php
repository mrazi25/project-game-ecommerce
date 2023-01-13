<?php 
  class Post {

    private $conn;
    private $table = 'order_game';

    public $id;
    public $email_akun;
    public $id_game;
    public $nama_game;
    public $harga_game;


    public function __construct($db) {
      $this->conn = $db;
    }

    public function read() {
      // Create query
      $query = 'SELECT * FROM ' . $this->table . ' ORDER BY id';
      
      // Prepare statement
      $stmt = $this->conn->prepare($query);

      // Execute query
      $stmt->execute();

      return $stmt;
    }

    public function read_single() {
          $query = 'SELECT * FROM ' . $this->table . ' WHERE id = ?';

          $stmt = $this->conn->prepare($query);

          $stmt->bindParam(1, $this->id);

          $stmt->execute();

          $row = $stmt->fetch(PDO::FETCH_ASSOC);

          $this->id = $row['id']; 
          $this->email = $row['email_akun'];
          $this->id = $row['id_game'];         
          $this->email = $row['nama_game'];
          $this->pass = $row['harga_game'];
    }

    public function create() {
      // Create query
      $query = 'INSERT INTO ' . $this->table . ' SET id = null, email_akun = :email_akun, id_game = :id_game, nama_game = :nama_game, harga_game = :harga_game';

      // Prepare statement
      $stmt = $this->conn->prepare($query);

      // Clean data
      $this->email_akun = htmlspecialchars(strip_tags($this->email_akun));
      $this->id_game = htmlspecialchars(strip_tags($this->id_game));
      $this->nama_game = htmlspecialchars(strip_tags($this->nama_game));
      $this->harga_game = htmlspecialchars(strip_tags($this->harga_game));

      // Bind data
      $stmt->bindParam(':email_akun', $this->email_akun);
      $stmt->bindParam(':id_game', $this->id_game);
      $stmt->bindParam(':nama_game', $this->nama_game);
      $stmt->bindParam(':harga_game', $this->harga_game);

      // Execute query
      if($stmt->execute()) {
        return true;
      }

      // Print error if something goes wrong
      printf("Error: %s.\n", $stmt->error);

      return false;
    }

    // Update Post
    public function update() {
      // Create query
      $$query = 'UPDATE ' . $this->table . ' SET email_akun = :email_akun, id_game = :id_game, nama_game = :nama_game, harga_game = :harga_game WHERE id = :id';

      // Prepare statement
      $stmt = $this->conn->prepare($query);
      
      // Clean data
      $this->email_akun = htmlspecialchars(strip_tags($this->email_akun));
      $this->id_game = htmlspecialchars(strip_tags($this->id_game));
      $this->nama_game = htmlspecialchars(strip_tags($this->nama_game));
      $this->harga_game = htmlspecialchars(strip_tags($this->harga_game));
      $this->id = htmlspecialchars(strip_tags($this->id));

      // Bind data
      $stmt->bindParam(':email_akun', $this->email_akun);
      $stmt->bindParam(':id_game', $this->id_game);
      $stmt->bindParam(':nama_game', $this->nama_game);
      $stmt->bindParam(':harga_game', $this->harga_game);
      $stmt->bindParam(':id', $this->id);

      // Execute query
      if($stmt->execute()) {
        return true;
      }

      // Print error if something goes wrong
      printf("Error: %s.\n", $stmt->error);

      return false;
    }

    // Delete Post
    public function delete() {
      // Create query
      $query = 'DELETE FROM ' . $this->table . ' WHERE id = :id';

      // Prepare statement
      $stmt = $this->conn->prepare($query);

      // Clean data
      $this->id = htmlspecialchars(strip_tags($this->id));

      // Bind data
      $stmt->bindParam(':id', $this->id);

      // Execute query
      if($stmt->execute()) {
        return true;
      }

      // Print error if something goes wrong
      printf("Error: %s.\n", $stmt->error);

      return false;
    }

    public function deleteBug() {
      // Create query
      $query = 'DELETE FROM ' . $this->table . ' WHERE email = :email';

      // Prepare statement
      $stmt = $this->conn->prepare($query);

      // Clean data
      $this->email = htmlspecialchars(strip_tags($this->email));

      // Bind data
      $stmt->bindParam(':email', $this->email);

      // Execute query
      if($stmt->execute()) {
        return true;
      }

      // Print error if something goes wrong
      printf("Error: %s.\n", $stmt->error);

      return false;
    }
  }
