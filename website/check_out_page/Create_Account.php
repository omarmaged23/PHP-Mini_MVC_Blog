<?php
class Create_Account
{
  private $table = "users";
  private static $conn;
  private $errorMsg = [];
  public function __construct()
  {
    $conn = new Connection();
    self::$conn = $conn->getConnection();
  }
  public function Create($username, $email, $password)
  {
    try {
      $sql = "SELECT * FROM $this->table WHERE email=:email OR username=:username";
      $select = self::$conn->prepare($sql);
      $select->execute([":email" => $email, ":username" => $username]);
      $row = $select->fetch(PDO::FETCH_ASSOC);
      if ($row) {
        if ($row['email'] == $email) {
          $this->errorMsg["email"] = "Email address already exists please change your email to proceed";
          return $this->errorMsg;
        } else if ($row['username'] == $username) {
          $this->errorMsg["username"] = "username already exists please change your username to proceed";
          return $this->errorMsg;
        }
      }
    } catch (PDOException $e) {
      echo $e->getMessage() . " Retrieval error in create account (CRUD Class)";
    }
    /* ----------------------------------------------------------------------------- */
    try {
      $sql = "INSERT INTO $this->table (username,email,password) 
              Values( :username , :email , :password )";
      $stmt = self::$conn->prepare($sql);
      $stmt->bindParam(':username', $username);
      $stmt->bindParam(':email', $email);
      $password = password_hash($password, PASSWORD_DEFAULT);
      $stmt->bindParam(':password', $password);
      $stmt->execute();
    } catch (PDOException $e) {
      echo $e->getMessage() . " Insertion error in create account (CRUD Class)";
    }
  }
}
