<?php
class Users extends Controller
{
  private $userModel;
  public function __construct()
  {
    $this->userModel = $this->model('User');
  }
  public function register()
  {
    //check for post
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
      // Sanitize POST data
      $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
      // Init data
      $data = [
        'name' => strip_tags(trim($_POST['name'])),
        'email' => strip_tags(trim($_POST['email'])),
        'password' => strip_tags(trim($_POST['password'])),
        'confirm_password' => strip_tags(trim($_POST['confirm_password'])),
        'name_err' => '',
        'email_err' => '',
        'password_err' => '',
        'confirm_password_err' => ''
      ];
      // Validate Email
      if (empty($data['email'])) {
        $data['email_err'] = 'Please enter email';
      } else {
        // Check if email exists
        if ($this->userModel->findUserByEmail($data['email'])) {
          $data['email_err'] = 'Email already exists';
        }
      }
      // Validate Name
      if (empty($data['name'])) {
        $data['name_err'] = 'Please enter name';
      }
      // Validate Password
      if (empty($data['password'])) {
        $data['password_err'] = 'Please enter password';
      } else if (strlen($data['password'] < 6)) {
        $data['password_err'] = 'Password must be at least 6 characters';
      }
      // Validate Password_confirm
      if (empty($data['confirm_password'])) {
        $data['confirm_password_err'] = 'Please re-enter password';
      } else {
        if ($data['password'] != $data['confirm_password']) {
          $data['confirm_password_err'] = 'Passwords do not match';
        }
      }
      // Make sure the form is free of errors
      if (empty($data['email_err']) && empty($data['name_err']) && empty($data['password_err']) && empty($data['confirm_password_err'])) {
        // No errors is found
        // Hash password
        $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);
        // Call register function from model
        if ($this->userModel->register($data)) {
          flash('register_success', 'You are now registered and can log in');
          redirect("users/login");
        } else {
          die('Something went wrong');
        }
      } else {
        // Load the view
        $this->view('users/register', $data);
      }
    } else {
      $data = [
        'name' => '',
        'email' => '',
        'password' => '',
        'confirm_password' => '',
        'name_err' => '',
        'email_err' => '',
        'password_err' => '',
        'confirm_password_err' => ''
      ];
      // Load view
      $this->view('users/register', $data);
    }
  }
  public function login()
  {
    //check for post
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
      // Sanitize POST data
      $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
      // Init data
      $data = [
        'email' => strip_tags(trim($_POST['email'])),
        'password' => strip_tags(trim($_POST['password'])),
        'email_err' => '',
        'password_err' => '',
      ];
      // Validate Email
      if (empty($data['email'])) {
        $data['email_err'] = 'Please enter email';
      }
      // Validate Password
      if (empty($data['password'])) {
        $data['password_err'] = 'Please enter password';
      }
      // Check for email existance
      if ($this->userModel->findUserByEmail($data['email'])) {
        // user is found
      } else {
        if (empty($data['email_err']) && empty($data['password_err']))
          $data['email_err'] = $data['password_err'] = 'Incorrect email or password';
      }
      // Make sure the form is free of errors
      if (empty($data['email_err']) && empty($data['password_err'])) {
        // No errors is found
        // Check and set logged in user
        $loggedInUser = $this->userModel->login($data['email'], $data['password']);
        if ($loggedInUser) {
          // Create user session
          $this->createUserSession($loggedInUser);
        } else {
          $data['email_err'] = $data['password_err'] = 'Email or password is incorrect';
          $this->view('users/login', $data);
        }
      } else {
        // Load the view
        $this->view('users/login', $data);
      }
    } else {
      $data = [
        'email' => '',
        'password' => '',
        'email_err' => '',
        'password_err' => '',
      ];
      // Load view
      $this->view('users/login', $data);
    }
  }
  public function createUserSession($user)
  {
    $_SESSION['user_id'] = $user->id;
    $_SESSION['user_email'] = $user->email;
    $_SESSION['user_name'] = $user->name;
    redirect('posts/index');
  }
  public function logout()
  {
    session_destroy();
    redirect('users/login');
  }
}
