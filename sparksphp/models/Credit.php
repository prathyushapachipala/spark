<?php
  class Credit {
    // DB Stuff
    private $conn;
    private $table = 'credit';

    // Properties
    public $credit_id;
    public $username;
    public $email;

    // Constructor with DB
    public function __construct($db) {
      $this->conn = $db;
    }

    // Get categories
    public function read() {
      // Create query
      $query = 'SELECT
        credit_id,
        username,
        email
      FROM
        ' . $this->table . '
      ORDER BY
      username DESC';

      // Prepare statement
      $stmt = $this->conn->prepare($query);

      // Execute query
      $stmt->execute();

      return $stmt;
    }

    // Get Single Category
  public function read_single(){
    // Create query
    $query = 'SELECT
          credit_id,
          username,email
        FROM
          ' . $this->table . '
      WHERE credit_id = ?
      LIMIT 0,1';

      //Prepare statement
      $stmt = $this->conn->prepare($query);

      // Bind ID
      $stmt->bindParam(1, $this->credit_id);

      // Execute query
      $stmt->execute();

      $row = $stmt->fetch(PDO::FETCH_ASSOC);

      // set properties
      $this->credit_id = $row['credit_id'];
      $this->username = $row['username'];
      $this->email = $row['email'];
  }

  // Create Category
  public function create() {
    // Create Query
    $query = 'INSERT INTO ' .
      $this->table . '
    SET
      username = :username';

  // Prepare Statement
  $stmt = $this->conn->prepare($query);

  // Clean data
  $this->username = htmlspecialchars(strip_tags($this->username));

  // Bind data
  $stmt-> bindParam(':username', $this->username);

  // Execute query
  if($stmt->execute()) {
    return true;
  }

  // Print error if something goes wrong
  printf("Error: $s.\n", $stmt->error);

  return false;
  }

  // Update Category
  public function update() {
    // Create Query
    $query = 'UPDATE ' .
      $this->table . '
    SET
      username = :username
      WHERE
      credit_id = :credit_id';

  // Prepare Statement
  $stmt = $this->conn->prepare($query);

  // Clean data
  $this->username = htmlspecialchars(strip_tags($this->username));
  $this->credit_id = htmlspecialchars(strip_tags($this->credit_id));
  

  // Bind data
  $stmt-> bindParam(':username', $this->username);
  $stmt-> bindParam(':credit_id', $this->credit_id);
  

  // Execute query
  if($stmt->execute()) {
    return true;
  }

  // Print error if something goes wrong
  printf("Error: $s.\n", $stmt->error);

  return false;
  }

  // Delete Category
  public function delete() {
    // Create query
    $query = 'DELETE FROM ' . $this->table . ' WHERE credit_id = :credit_id';

    // Prepare Statement
    $stmt = $this->conn->prepare($query);

    // clean data
    $this->credit_id = htmlspecialchars(strip_tags($this->credit_id));

    // Bind Data
    $stmt-> bindParam(':credit_id', $this->credit_id);

    // Execute query
    if($stmt->execute()) {
      return true;
    }

    // Print error if something goes wrong
    printf("Error: $s.\n", $stmt->error);

    return false;
    }
  }
