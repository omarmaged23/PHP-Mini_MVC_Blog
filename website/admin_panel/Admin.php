<?php

class Admin
{
  private static $conn;
  public function __construct()
  {
    $conn = new Connection();
    self::$conn = $conn->getConnection();
  }
  public function add(string $name, string $description, float $price, string $color, string $image, int $small_qty, int $medium_qty, int $large_qty, string $category, string $status)
  {
    $total_qty = $small_qty + $medium_qty + $large_qty;
    try {
      $sql = "INSERT INTO products(name,description,total_qty,price,color,image,small_qty,medium_qty,large_qty,category_id,status) VALUES(:name,:description,:total_qty,:price,:color,:image,:small_qty,:medium_qty,:large_qty,:category_id,:status)";
      $stmt = self::$conn->prepare($sql);
      $stmt->execute([
        ":name" => $name,
        ":description" => $description,
        ":total_qty" => $total_qty,
        ":price" => $price,
        ":color" => $color,
        ":image" => $image,
        ":category_id" => $category,
        ":small_qty" => $small_qty,
        ":medium_qty" => $medium_qty,
        ":large_qty" => $large_qty,
        ":status" => $status
      ]);
    } catch (PDOException $e) {
      echo "Error adding product ==> ", $e->getMessage();
    }
  }
  public function read()
  {
    try {
      $sql = "SELECT * FROM products";
      $rows = self::$conn->prepare($sql);
      $rows->execute();
      $results = $rows->fetchAll(PDO::FETCH_ASSOC);
      return $results;
    } catch (PDOException $e) {
      echo "Error read function " . $e->getMessage();
    }
  }
  public function read_by_id($id)
  {
    try {
      $sql = "SELECT * FROM products WHERE product_id = $id";
      $rows = self::$conn->prepare($sql);
      $rows->execute();
      $results = $rows->fetchAll(PDO::FETCH_ASSOC);
      return $results;
    } catch (PDOException $e) {
      echo "Error read function " . $e->getMessage();
    }
  }
  public function update(int $id, string $name, string $description, float $price, string $color, string $image, int $small_qty, int $medium_qty, int $large_qty, string $category, string $status)
  {
    $total_qty = $small_qty + $medium_qty + $large_qty;
    try {
      $sql = "UPDATE products SET name=:name,description=:description,total_qty=:total_qty,price=:price,color=:color,image=:image,small_qty=:small_qty,medium_qty=:medium_qty,large_qty=:large_qty,category_id=:category_id,status=:status 
              WHERE product_id = $id";
      $stmt = self::$conn->prepare($sql);
      $stmt->execute([
        ":name" => $name,
        ":description" => $description,
        ":total_qty" => $total_qty,
        ":price" => $price,
        ":color" => $color,
        ":image" => $image,
        ":category_id" => $category,
        ":small_qty" => $small_qty,
        ":medium_qty" => $medium_qty,
        ":large_qty" => $large_qty,
        ":status" => $status
      ]);
    } catch (PDOException $e) {
      echo "Error updating product ==> ", $e->getMessage();
    }
  }
  public function delete($id)
  {
    $sql = "DELETE from products WHERE product_id=$id";
    $stmt = self::$conn->prepare($sql);
    $stmt->execute();
  }
  public function order_list()
  {
    try {
      $sql =
        "select  o.order_id,u.username,o.order_date,o.invoice_price,o.status
      from orders o
      join users u
      on u.user_id=o.user_id";
      $stmt = self::$conn->prepare($sql);
      $stmt->execute();
      $results = $stmt->fetchAll();
      return $results;
    } catch (PDOException $e) {
      echo "Admin orderlist error " . $e->getMessage();
    }
  }
  public function updt_order($id, $status)
  {
    try {
      $sql = "UPDATE orders SET status = :status where order_id=$id";
      $stmt = self::$conn->prepare($sql);
      $stmt->execute([":status" => $status]);
    } catch (PDOException $e) {
      die("updt order error " . $e->getMessage());
    }
  }
  public function get_total_orders()
  {
    try {
      $sql = "SELECT * FROM orders";
      $rows = self::$conn->prepare($sql);
      $rows->execute();
      $results = $rows->fetchAll(PDO::FETCH_ASSOC);
      return $results;
    } catch (PDOException $e) {
      echo "Error read function " . $e->getMessage();
    }
  }
}
