<?php
namespace BigBear\Controller;

use BigBear\System\Controller;


class ErrorController extends Controller
{
    public function error404(){
        $this->render('error/404');
    }
}
