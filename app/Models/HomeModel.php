<?php

namespace App\Models;

use CodeIgniter\Model;
use CodeIgniter\Database\ConnectionInterface;

class HomeModel extends Model
{
    protected $db;

    public function __construct(ConnectionInterface &$db) {
        $this->db =& $db;
    }
    public function get_products(){
        return $this->db
            ->table('products')
            ->select('*')
            ->where(['IsDeleted' => 0 ])
            ->get()
            ->getResult();
    }
    public function get_items($item){
        return $this->db
            ->table('products')
            ->select('product_name,price')
            ->where(['product_id' => $item ])
            ->where(['IsDeleted' => 0 ])
            ->get()
            ->getResult();
    }
}