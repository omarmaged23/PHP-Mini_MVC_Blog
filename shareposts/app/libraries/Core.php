<?php

/**
 * App Core Class
 * Creates URL & loads core controller
 * URL FORMAT - /controller/method/params
 */
class Core
{
  protected $currentController = "Pages";
  protected $currentMethod = "index";
  protected $params = [];

  public function __construct()
  {
    // print_r($this->getUrl());
    $url = $this->getUrl();
    // Look for controllers for the first value
    /*  Since site move through index.php in public folder make sure
        that write path relative to index.php public location
    */
    if ($url) {
      if (file_exists('../app/controllers/' . ucwords($url[0]) . '.php')) {
        // If exists set as controller
        $this->currentController = ucwords($url[0]);
        // Unset 0 index (remove controller from url array)
        unset($url[0]);
      }
    }

    // Require the current controller class
    require_once '../app/controllers/' . $this->currentController . '.php';
    // Instantiate object from controller class
    $this->currentController = new $this->currentController;

    // Check the second part of the url
    if (isset($url[1])) {
      //check if method exists
      if (method_exists($this->currentController, $url[1])) {
        $this->currentMethod = $url[1];
        //unset 1 index (remove method from url array)
        unset($url[1]);
      }
    }

    // Get Params
    $this->params = $url ? array_values($url) : [];
    // call a callback with array of params
    call_user_func_array(
      [$this->currentController, $this->currentMethod],
      $this->params
    );
  }

  public function getUrl()
  {
    if (isset($_GET['url'])) {
      $url = rtrim($_GET['url'], '/');
      $url = filter_var($url, FILTER_SANITIZE_URL);
      $url = explode('/', $url);
      return $url;
    }
  }
}
