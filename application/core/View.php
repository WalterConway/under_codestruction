<?php

/**
 * Class View
 * The part that handles all the output
 */
class View {

    /**
     * Name: render
     * Description:
     * simply includes (=shows) the view. this is done from the controller. In the controller, you usually say
     * $this->view->render('help/index'); to show (in this example) the view index.php in the folder help.
     * Usually the Class and the method are the same like the view, but sometimes you need to show different views.
     * To the homepage
     * @author FRAMEWORK
     * @Date ?
     * @param string $filename Path of the to-be-rendered view, usually folder/file(.php)
     * @param array $data Data to be used in the view
     */
    public function render($filename, $data = null) {
        if ($data) {
            foreach ($data as $key => $value) {
                $this->{$key} = $value;
            }
        }

        require Config::get('PATH_VIEW', 'gen') . '_templates/header.php';
        require Config::get('PATH_VIEW', 'gen') . $filename . '.php';
        require Config::get('PATH_VIEW', 'gen') . '_templates/footer.php';
    }

    /**
     * Name: renderWithoutHeaderAndFooter
     * Description:
     * Same like render(), but does not include header and footer
     * To the homepage
     * @author FRAMEWORK
     * @Date ?
     * @param string $filename Path of the to-be-rendered view, usually folder/file(.php)
     * @param mixed $data Data to be used in the view
     */
    public function renderWithoutHeaderAndFooter($filename, $data = null) {
        if ($data) {
            foreach ($data as $key => $value) {
                $this->{$key} = $value;
            }
        }

        require Config::get('PATH_VIEW', 'gen') . $filename . '.php';
    }

    /**
     * Name: renderJSON
     * Description:
     * Renders pure JSON to the browser, useful for API construction
     * To the homepage
     * @author FRAMEWORK
     * @Date ?
     * @param $data
     */
    public function renderJSON($data) {
        echo json_encode($data);
    }

    /**
     * Name: renderFeedbackMessages
     * Description:
     * renders the feedback messages into the view
     * To the homepage
     * @author FRAMEWORK
     * @Date ?
     */
    public function renderFeedbackMessages() {
        // echo out the feedback messages (errors and success messages etc.),
        // they are in $_SESSION["feedback_positive"] and $_SESSION["feedback_negative"]
        require Config::get('PATH_VIEW', 'gen') . '_templates/feedback.php';

        // delete these messages (as they are not needed anymore and we want to avoid to show them twice
        Session::set('feedback_positive', null);
        Session::set('feedback_negative', null);
    }

    /**
     * Name: checkForActiveController
     * Description:
     * Checks if the passed string is the currently active controller.
     * Useful for handling the navigation's active/non-active link.
     * @author FRAMEWORK
     * @Date ?
     * @param string $filename
     * @param string $navigation_controller
     * @return bool Shows if the controller is used or not
     */
    public static function checkForActiveController($filename, $navigation_controller) {
        $split_filename = explode("/", $filename);
        $active_controller = $split_filename[0];
        if ($active_controller == $navigation_controller) {
            return true;
        }
        return false;
    }

    /**
     * Name: checkForActiveAction
     * Description:
     * Checks if the passed string is the currently active controller-action (=method).
     * Useful for handling the navigation's active/non-active link.
     * @author FRAMEWORK
     * @Date ?
     * @param string $filename
     * @param string $navigation_action
     * @return bool Shows if the action/method is used or not
     */
    public static function checkForActiveAction($filename, $navigation_action) {
        $split_filename = explode("/", $filename);
        $active_action = $split_filename[1];
        if ($active_action == $navigation_action) {
            return true;
        }
        return false;
    }

    /**
     * Name: checkForActiveControllerAndAction
     * Description:
     * Checks if the passed string is the currently active controller and controller-action.
     * Useful for handling the navigation's active/non-active link.
     * @author FRAMEWORK
     * @Date ?
     * @param string $filename
     * @param string $navigation_controller_and_action
     * @return bool
     */
    public static function checkForActiveControllerAndAction($filename, $navigation_controller_and_action) {
        $split_filename = explode("/", $filename);
        $active_controller = $split_filename[0];
        $active_action = $split_filename[1];
        $split_filename = explode("/", $navigation_controller_and_action);
        $navigation_controller = $split_filename[0];
        $navigation_action = $split_filename[1];
        if ($active_controller == $navigation_controller AND $active_action == $navigation_action) {
            return true;
        }
        return false;
    }

}
