<?php 
  class Post {

    private $conn;
    private $table = 'cart';

    public $email_akun;
    public $id_game;


    public function __construct($db) {
      $this->conn = $db;
    }

    public function read() {
      // Create query
      $query = 'SELECT * FROM ' . $this->table . ' ORDER BY email_akun';
      
      // Prepare statement
      $stmt = $this->conn->prepare($query);

      // Execute query
      $stmt->execute();

      return $stmt;
    }

    public function read_single() {
          $query = 'SELECT * FROM ' . $this->table . ' WHERE email_akun = :email_akun';

          $stmt = $this->conn->prepare($query);

          $stmt->bindParam('email_akun', $this->email_akun);

          $stmt->execute();

          $row = $stmt->fetch(PDO::FETCH_ASSOC);

          $this->email_akun = $row['email_akun'];
          $this->id_game = $row['id_game'];
    }

    public function create() {
      // Create query
      $query = 'INSERT INTO ' . $this->table . ' SET email_akun = :email_akun, id_game = :id_game';

      // Prepare statement
      $stmt = $this->conn->prepare($query);

      // Clean data
      $this->email_akun = htmlspecialchars(strip_tags($this->email_akun));
      $this->id_game = htmlspecialchars(strip_tags($this->id_game));

      // Bind data
      $stmt->bindParam(':email_akun', $this->email_akun);
      $stmt->bindParam(':id_game', $this->id_game);

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
      $query = 'DELETE FROM ' . $this->table . ' WHERE email_akun = :email_akun';

      // Prepare statement
      $stmt = $this->conn->prepare($query);

      // Clean data
      $this->email_akun = htmlspecialchars(strip_tags($this->email_akun));

      // Bind data
      $stmt->bindParam(':email_akun', $this->email_akun);

      // Execute query
      if($stmt->execute()) {
        return true;
      }

      // Print error if something goes wrong
      printf("Error: %s.\n", $stmt->error);

      return false;
    }
  }
