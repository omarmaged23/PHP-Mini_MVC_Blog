<?php
class Validation
{
  private $errors = [];
  private $data = [];
  private static $fields = ["email", "password"];
  private static $Register_fields = ["username", "email", "password", "confirm_password"];
  private static $conn;
  public function __construct($post_data)
  {
    $this->data = $post_data;
    $conn = new Connection();
    self::$conn = $conn->getConnection();
  }
  /**
   *
   * @validate Login Form
   * @return array_of_errors
   */
  public function validateLoginForm()
  {
    foreach (self::$fields as $field) {
      if (!array_key_exists($field, $this->data)) {
        trigger_error($field . " must be filled to proceed");
        return;
      }
    }
    try {
      $email = htmlspecialchars(strip_tags(trim($this->data["email"])));
      $password = htmlspecialchars(strip_tags(trim($this->data["password"])));
      $sql = "SELECT * FROM users WHERE email=:email LIMIT 1";
      $select = self::$conn->prepare($sql);
      $select->execute([":email" => $email]);
      $row = $select->fetch(PDO::FETCH_ASSOC);
      //
      if ($select->rowCount() > 0) {
        if (password_verify($password, $row["password"])) {
          return 0;
        } else {
          $error['login'] = 'Invalid email or password';
          return $error;
        }
      } else {
        $error['login'] = 'Invalid email or password';
        return $error;
      }
      // 
    } catch (PDOException $e) {
      echo "LoginValidationForm Error ==> ", $e->getMessage();
    }
  }
  /**
   *
   * @validate Registeration Form
   * @return array_of_errors
   */
  public function validateRegisterForm()
  {
    foreach (self::$Register_fields as $field) {
      if (!array_key_exists($field, $this->data)) {
        trigger_error($field . " must be filled to proceed");
        return;
      }
    }
    $this->validateUsername();
    $this->validateEmail();
    $this->validatePassword();
    return $this->errors;
  }
  /**
   *
   * @validate Username
   * @return void
   */
  private function validateUsername()
  {
    $val = htmlspecialchars(strip_tags(trim($this->data["username"])));
    if (empty($val)) {
      $this->addError("username", "username cannot be empty");
    } else {
      if (!preg_match('/^[a-zA-Z0-9]{6,12}$/', $val)) {
        $this->addError("username", "username must be 6-12 chars and contain a numeric value");
      }
    }
    /* 
    Verify that the username is unique
    */
  }
  /**
   *
   * @validate Email
   * @return void
   */
  private function validateEmail()
  {
    $val = htmlspecialchars(strip_tags(trim($this->data["email"])));
    if (empty($val)) {
      $this->addError("email", "email cannot be empty");
    } else {
      if (!filter_var($val, FILTER_VALIDATE_EMAIL)) {
        $this->addError("email", "email address must be valid");
      }
    }
    /* 
    Verify that the email is unique
    */
  }
  /**
   *
   * @validate Password
   * @return void
   */
  private function validatePassword()
  {
    $val = htmlspecialchars(strip_tags(trim($this->data["password"])));
    $val2 = htmlspecialchars(strip_tags(trim($this->data["confirm_password"])));
    if (empty($val) || empty($val2)) {
      $this->addError("password", "password fields cannot be empty");
    } else if ($val != $val2) {
      $this->addError("password", "password fields doesn't match");
    } else {
      if (!preg_match('/^[a-zA-Z0-9]{6,12}$/', $val)) {
        $this->addError("password", "password must be 6-12 chars and contain a numeric value");
      }
    }
  }
  private function addError($key, $val)
  {
    $this->errors[$key] = $val;
  }
}
