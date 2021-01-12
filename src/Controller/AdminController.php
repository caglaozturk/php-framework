<?php
namespace BigBear\Controller;

use BigBear\System\Controller;

class AdminController extends Controller
{
    public function index(){
        $this->render('admin/index', [
            'data' => 'Woman Developer!'
        ]);
    }
}