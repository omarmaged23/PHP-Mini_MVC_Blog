<?php

/**
 * Base Controller
 * Loads models and view
 */
class Controller
{
  // protected $postModel;
  // Load the model
  public function model($model)
  {
    //require model file
    if (file_exists('../app/models/' . $model . '.php')) {
      require_once '../app/models/' . $model . '.php';
      //instantiate the model
      return new $model();
    } else {
      // in case of error
      die("Model '$model' doesn't exist " . __LINE__);
    }
  }
  // Load the view
  public function view($view, $data = [])
  {
    if (file_exists('../app/views/' . $view . '.php')) {
      require_once '../app/views/' . $view . '.php';
    } else {
      // in case of error
      die("View '$view' doesn't exist " . __LINE__);
    }
  }
}
