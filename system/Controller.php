<?php 

namespace BigBear\System;
use BigBear\System\Helpers;

class Controller{

    private static $_variables = [];

    protected $helper;
    protected $input;
    protected $session;

    public function __construct()
    {
        $this->helper = new Helpers();
        $this->input = new Input();
        $this->session = new Session();
    }

    public function render($view, $variables = null)
    {
        if (!self::$_variables) {
            self::$_variables = $variables;
        }

        $level = ob_get_level();

        ob_start();

        try {
            //NULL ve 0(false) hariç true döner
            if (self::$_variables) {
                extract(self::$_variables);
            }
            if ($variables) {
                extract($variables);
            }
            $file = $this->helper->getViewDir() . DIRECTORY_SEPARATOR . $view . '.template.php';
            if (is_file($file) && is_readable($file)) {
                include $file;
            } else {
                header('HTTP/1.1 404 Not Found');
                throw new \Exception('View file is not found!');
            }
        } catch (Exception $e) {
            while (ob_get_level() > $level) {
                ob_end_clean();
            }

            throw $e;
        }

        echo  ob_get_clean();
    }
    
}