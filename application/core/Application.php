<?php

/**
 * Class Application
 * The heart of the application
 */
class Application {

    /** @var mixed Instance of the controller */
    private $controller;

    /** @var array URL parameters, will be passed to used controller-method */
    private $parameters = array();

    /** @var string Just the name of the controller, useful for checks inside the view ("where am I ?") */
    private $controller_name;

    /** @var string Just the name of the controller's method, useful for checks inside the view ("where am I ?") */
    private $action_name;

    /**
     * Name: 
     * Description:
     * Start the application, analyze URL elements, call according controller/method or relocate to fallback location
     * @author FRAMEWORK (modified by: Walter Conway, removed header replaced with redirect which uses header)
     * @Date ?
     */
    public function __construct() {
        // create array with URL parts in $url
        $this->splitUrl();

        // check for controller: no controller given ? then make controller = default controller (from config)
        if (!$this->controller_name) {
            $this->controller_name = Config::get('DEFAULT_CONTROLLER', 'gen');
        }

        // check for action: no action given ? then make action = default action (from config)
        if (!$this->action_name OR ( strlen($this->action_name) == 0)) {
            $this->action_name = Config::get('DEFAULT_ACTION', 'gen');
        }

        // rename controller name to real controller class/file name ("index" to "IndexController")
        $this->controller_name = ucwords($this->controller_name) . 'Controller';

        // does such a controller exist ?
        if (file_exists(Config::get('PATH_CONTROLLER', 'gen') . $this->controller_name . '.php')) {

            // load this file and create this controller
            // example: if controller would be "car", then this line would translate into: $this->car = new car();
            require Config::get('PATH_CONTROLLER', 'gen') . $this->controller_name . '.php';
            $this->controller = new $this->controller_name();

            // check for method: does such a method exist in the controller ?
            if (method_exists($this->controller, $this->action_name)) {
                if (!empty($this->parameters)) {
                    // call the method and pass arguments to it
                    call_user_func_array(array($this->controller, $this->action_name), $this->parameters);
                } else {
                    // if no parameters are given, just call the method without parameters, like $this->index->index();
                    $this->controller->{$this->action_name}();
                }
            } else {
                Redirect::to('error/index');
            }
        } else {
            Redirect::to('error/index');
        }
    }

    /**
     * Name: splitUrl
     * Description:
     * Get and split the URL
     * @author FRAMEWORK
     * @Date ?
     */
    private function splitUrl() {
        if (Request::get('url')) {

            // split URL
            $url = trim(Request::get('url'), '/');
            $url = filter_var($url, FILTER_SANITIZE_URL);
            $url = explode('/', $url);

            // put URL parts into according properties
            $this->controller_name = isset($url[0]) ? $url[0] : null;
            $this->action_name = isset($url[1]) ? $url[1] : null;

            // remove controller name and action name from the split URL
            unset($url[0], $url[1]);

            // rebase array keys and store the URL parameters
            $this->parameters = array_values($url);
        }
    }

}
