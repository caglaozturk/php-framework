<?php

namespace BigBear\Model;

use BigBear\System\Model;
use \PDO;

class TicketModel extends Model{
    protected $tableName = 'tickets';

    public function deleteTicket(){
        echo $this->delete(['id' => 1]);
        echo '<br/>';
        echo $this->delete(['id' => 1 , 'title' => 'ticket']);
        echo '<br/>';
        echo $this->delete(['title' => 'ticket']);
        echo '<br/>';
        echo $this->delete('*');
    }

    public function whereTicket(){
        //$this->where('birinci');
        $this->where('birinci', '2');
        $this->where('birinci', '3', 'ikinci');
        $this->where('birinci', '5s', 'ikinci', 'ucuncu');
    }
}