<?php
class help
{
  private static $conn;
  public function __construct()
  {
    $conn = new Connection();
    self::$conn = $conn->getConnection();
  }
  public function read($cat)
  {
    try {
      $sql = "SELECT * FROM products WHERE category_id=$cat";
      $rows = self::$conn->prepare($sql);
      $rows->execute();
      $results = $rows->fetchAll(PDO::FETCH_ASSOC);
      return $results;
    } catch (PDOException $e) {
      echo "Error read category function (women page) " . $e->getMessage();
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
      echo "Error read by id help function " . $e->getMessage();
    }
  }
  public function read_all()
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
  public function getUser($email)
  {
    try {
      $email = htmlspecialchars(strip_tags(trim($email)));
      $sql = "SELECT * FROM users WHERE email=:email LIMIT 1";
      $select = self::$conn->prepare($sql);
      $select->execute([":email" => $email]);
      $row = $select->fetch(PDO::FETCH_ASSOC);
      return $row;
    } catch (PDOException $e) {
      die("getUser Error ==> " . $e->getMessage());
    }
  }
  public function getAddress($id)
  {
    try {
      $sql = "SELECT address FROM users WHERE user_id=:id LIMIT 1";
      $select = self::$conn->prepare($sql);
      $select->execute([":id" => $id]);
      $row = $select->fetch(PDO::FETCH_ASSOC);
      if (isset($row['address']))
        return $row['address'];
      else {
        return "";
      }
    } catch (PDOException $e) {
      die("getUser Error ==> " . $e->getMessage());
    }
  }
  public function updateAddress($id, $address)
  {
    try {
      $sql = "UPDATE users SET address=:address WHERE user_id=:id";
      $stmt = self::$conn->prepare($sql);
      $stmt->execute([":address" => $address, ":id" => $id]);
    } catch (PDOException $e) {
      die("UpdateAddress Error ==> " . $e->getMessage());
    }
  }
  public function InsertOrder($id, $total)
  {
    try {
      $sql = "INSERT INTO orders(user_id,invoice_price) VALUES(:id,:total)";
      $stmt = self::$conn->prepare($sql);
      $stmt->execute([":id" => $id, ":total" => $total]);
      return self::$conn->lastInsertId();
    } catch (PDOException $e) {
      die("insert order Error ==> " . $e->getMessage());
    }
  }
  public function InsertOrderItem($order_id, $product_id, $item_qty, $item_total_price, $size)
  {
    try {
      $sql = "INSERT INTO order_item(order_id ,product_id,item_qty,item_total_price,size) VALUES(:order_id ,:product_id,:item_qty,:item_total_price,:size)";
      $stmt = self::$conn->prepare($sql);
      $stmt->execute([
        ":order_id" => $order_id,
        ":product_id" => $product_id,
        ":item_qty" => $item_qty,
        ":item_total_price" => $item_total_price,
        ":size" => $size,
      ]);
    } catch (PDOException $e) {
      die("insert order item Error ==> " . $e->getMessage());
    }
  }
  public function updateProduct($id, $qty, $size)
  {
    try {
      $sql = "SELECT * FROM products WHERE product_id = $id";
      $rows = self::$conn->prepare($sql);
      $rows->execute();
      $results = $rows->fetchAll(PDO::FETCH_ASSOC);
      $results = $results[0];
    } catch (PDOException $e) {
      echo "Error select product before update help function " . $e->getMessage();
    }
    $str = "";
    if ($size == "S") {
      $str = "small_qty";
    } else if ($size == "M") {
      $str = "medium_qty";
    } else {
      $str = "large_qty";
    }
    $status = "in_stock";
    $row = $results[$str];
    $total = $results['total_qty'];
    $row_qty = $row - $qty;
    $total = $total - $qty;
    if (!$total)
      $status = "out_stock";
    try {
      $sql = "UPDATE products SET $str=:qty ,total_qty=:total,status=:status WHERE product_id=:id";
      $stmt = self::$conn->prepare($sql);
      $stmt->execute([":qty" => $row_qty, ":total" => $total, ":status" => $status, ":id" => $id]);
    } catch (PDOException $e) {
      die("UpdateAddress Error ==> " . $e->getMessage());
    }
  }
  public function getOrders($user_id)
  {
    try {
      $sql = "SELECT * FROM orders WHERE user_id = :id";
      $rows = self::$conn->prepare($sql);
      $rows->execute([':id' => $user_id]);
      $results = $rows->fetchAll(PDO::FETCH_ASSOC);
      return $results;
    } catch (PDOException $e) {
      echo "Error getOrders help function " . $e->getMessage();
    }
  }
}
