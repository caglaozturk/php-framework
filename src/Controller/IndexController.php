<?php
namespace BigBear\Controller;

use BigBear\System\{Controller,Loader};

class IndexController extends Controller
{
    public function index(){
        /*
        echo $this->helper->slug('Merhaba düNYA');
        $ticketModel = Loader::loadModel('Ticket');
        $ticketModel->deleteTicket();
        $ticketModel->whereTicket();
        */
        $this->render('test', [
            'deger' => 'Home'
        ]);
    }
}
