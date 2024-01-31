<?php
class Connection
{
  private static $conn = null;
  private $host = "localhost";
  private $db = "clothing_store";
  private $username = "root";
  private $password = "";
  public function __construct()
  {
    if (self::$conn) {
      return;
    }
    try {
      self::$conn = new PDO("mysql:host=$this->host;dbname=$this->db", $this->username, $this->password);
      self::$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $e) {
      die($e->getMessage());
    }
  }
  public function getConnection()
  {
    return self::$conn;
  }
}
