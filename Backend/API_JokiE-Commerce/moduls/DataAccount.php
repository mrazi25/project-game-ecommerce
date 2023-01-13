<?php 
  class Post {

    private $conn;
    private $table = 'account';

    public $id;
    public $email;
    public $pass;
    public $jenis_akun;


    public function __construct($db) {
      $this->conn = $db;
    }

    public function read() {
      // Create query
      $query = 'SELECT * FROM ' . $this->table . ' ORDER BY email';
      
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
          $this->email = $row['email'];
          $this->pass = $row['pass'];
          $this->jenis_akun = $row['jenis_akun'];
    }

    public function create() {
      // Create query
      $query = 'INSERT INTO ' . $this->table . ' SET id = null, email = :email, pass = :pass, jenis_akun = :jenis_akun';

      // Prepare statement
      $stmt = $this->conn->prepare($query);

      // Clean data
      $this->email = htmlspecialchars(strip_tags($this->email));
      $this->pass = htmlspecialchars(strip_tags($this->pass));
      $this->jenis_akun = htmlspecialchars(strip_tags($this->jenis_akun));

      // Bind data
      $stmt->bindParam(':email', $this->email);
      $stmt->bindParam(':pass', $this->pass);
      $stmt->bindParam(':jenis_akun', $this->jenis_akun);

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
      $query = 'UPDATE ' . $this->table . ' SET email = :email, pass = :pass, jenis_akun = :jenis_akun WHERE id = :id';

      // Prepare statement
      $stmt = $this->conn->prepare($query);

      // Clean data
      
      $this->email = htmlspecialchars(strip_tags($this->email));
      $this->pass = htmlspecialchars(strip_tags($this->pass));
      $this->jenis_akun = htmlspecialchars(strip_tags($this->jenis_akun));
      $this->id = htmlspecialchars(strip_tags($this->id));

      // Bind data
      
      $stmt->bindParam(':email', $this->email);
      $stmt->bindParam(':pass', $this->pass);
      $stmt->bindParam(':jenis_akun', $this->jenis_akun);
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
