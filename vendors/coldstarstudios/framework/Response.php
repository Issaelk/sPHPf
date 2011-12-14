<?php
namespace coldstarstudios\framework;
use coldstarstudios\forms\Input;

/**
 * This class generates a response in a simple way. Loads the view and
 * uses the array inside $vars.
 *
 * Then whatever template engine could be added, in this case twig.
 *
 * @author Marcos Sigueros Fernández
 * @license MIT
 */
class Response implements \coldstarstudios\framework\interfaces\Response{
    public $view;
    public $vars = array();
    
    function __construct($view, $vars = array()) {
        $this->view = $view;
        $this->vars = $vars;
    }
    
    // The render is provided by twig
    function renderView() {
        // This will show all the view using the model and the controller
        //echo $this->view;
        print_r($this->vars);
        $vars = $this->vars;
        include('view/'.$this->view);
    }

}
?>