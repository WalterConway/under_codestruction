<?php

/**
 * This is the "base controller class". All other "real" controllers extend this class.
 * Whenever a controller is created, we also
 * 1. initialize a session
 */
class Controller {

    /** @var View View The view object */
    public $View;

    /**
     * Name: __construct
     * Description:
     * Construct the (base) controller. This happens when a real controller is constructed, like in
     * the constructor of IndexController when it says: parent::__construct();
     * @author FRAMEWORK
     * @Date ?
     */
    function __construct() {
        // always initialize a session
        Session::init();

        // create a view object to be able to use it inside a controller, like $this->View->render();
        $this->View = new View();
    }

}
