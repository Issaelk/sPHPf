<?php
namespace coldstarstudios\framework;
/**
 * This class is used to create a debug inform system in the app framework.
 * The debug window will appear as a fixed menu in the bottom of the page
 * when an error is throwed.
 *
 * @author Marcos Sigueros Fernández
 * @license MIT
 */
class Error {
    /**
     * This holds the exception data.
     * @var \Exception
     */
    public $exception;
    
    /**
     * @var \Application
     */
    public $Application;
    
    function __construct($Application, $exception){
        $this->exception = $exception;
        $this->Application = $Application;
        //echo '<pre>'.print_r($Application, true).'</pre>';
    }
        
    function response(){

        $this->Application->data['error']['code'] = $this->exception->getCode();
        $this->Application->data['error']['message'] = $this->exception->getMessage();
        $this->Application->data['error']['file'] = $this->exception->getFile();
        $this->Application->data['error']['line'] = $this->exception->getLine();
        
        try{
            $no_production_view = new Response($this->Application->folders['error'], $this->Application->data);
            $production_view = new Response($this->Application->folders['error_production'], $this->Application->data);
            
            if($this->Application->production)
                $production_view->renderView();
            else
                $no_production_view->renderView();
            
        } catch (\Exception $z) {
            echo "Error message: #".$z->getCode()." ---- ".$z->getMessage()." ".$z->getFile()." ".$z->getLine();
        }
    }
}
?>