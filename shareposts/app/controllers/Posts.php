<?php
class Posts extends Controller
{
  private $postModel;
  private $userModel;
  public function __construct()
  {
    if (!isLoggedIn()) {
      redirect('users/login');
    }
    $this->postModel = $this->model('post');
    $this->userModel = $this->model('user');
  }
  public function index()
  {
    $posts = $this->postModel->getPosts();
    $data = [
      'posts' => $posts
    ];
    $this->view('posts/index', $data);
  }
  public function add()
  {
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
      // Sanitize Post Array
      $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
      $data = [
        'title' => trim($_POST['title']),
        'body' => trim($_POST['body']),
        'user_id' => $_SESSION['user_id'],
        'title_err' => '',
        'body_err' => ''
      ];
      // Validate data
      if (empty($data['title'])) {
        $data['title_err'] = 'Please enter title';
      }
      if (empty($data['body'])) {
        $data['body_err'] = 'Please enter body';
      }
      // Verify there is no errors
      if (empty($data['title_err']) && empty($data['body_err'])) {
        // Validated
        if ($this->postModel->addPost($data)) {
          flash('post_message', 'Post Added');
          redirect('posts/index');
        } else {
          die('Something went wrong');
        }
      } else {
        //Load view with errors
        $this->view('posts/add', $data);
      }
    } else {
      $data = [
        'title' => '',
        'body' => ''
      ];
      $this->view('posts/add', $data);
    }
  }
  public function edit($id)
  {
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
      // Sanitize Post Array
      $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
      $data = [
        'id' => $id,
        'title' => trim($_POST['title']),
        'body' => trim($_POST['body']),
        'user_id' => $_SESSION['user_id'],
        'title_err' => '',
        'body_err' => ''
      ];
      // Validate data
      if (empty($data['title'])) {
        $data['title_err'] = 'Please enter title';
      }
      if (empty($data['body'])) {
        $data['body_err'] = 'Please enter body';
      }
      // Verify there is no errors
      if (empty($data['title_err']) && empty($data['body_err'])) {
        // Validated
        if ($this->postModel->editPost($data)) {
          flash('post_message', 'Post Edited');
          redirect('posts/index');
        } else {
          die('Something went wrong');
        }
      } else {
        //Load view with errors
        $this->view('posts/edit', $data);
      }
    } else {
      $post = $this->postModel->getPostById($id);
      // Check for owner
      if ($post->user_id != $_SESSION['user_id']) {
        redirect('posts/index');
      }
      $data = [
        'id' => $id,
        'title' => trim($post->title),
        'body' => trim($post->body)
      ];
      $this->view('posts/edit', $data);
    }
  }
  public function delete($id)
  {
    $post = $this->postModel->getPostById($id);
    if ($post->user_id != $_SESSION['user_id']) {
      redirect('posts/index');
    }
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
      if ($this->postModel->deletePost($id)) {
        flash('post_message', 'Post Deleted');
        redirect('posts/index');
      } else {
        flash('post_message', 'Something went wrong', 'alert alert-danger');
        redirect('posts/index');
      }
    }
  }
  public function show($id)
  {
    $post = $this->postModel->getPostById($id);
    $user = $this->userModel->getUserById($post->user_id);
    $data = [
      'post' => $post,
      'user' => $user
    ];

    $this->view('posts/show', $data);
  }
}
