<?php 
namespace App\Controllers;

use App\Models\HomeModel;
use CodeIgniter\Controller;

class Checkout extends BaseController
{
    public function __construct() {	
        $db = db_connect();
        $this->homeModel = new HomeModel($db);
    }
    public function index()
    {
        $this->session = \Config\Services::session();
        if($this->session->get('user_name')!=null && $this->session->get('user_id') > 0){
            if (isset($_COOKIE['cart'])) {
                $cartArray = explode(',', $_COOKIE['cart']);
            }
            $filteredArr = array_filter($cartArray, function($value) { 
                return $value !== ''; 
            }); 
            foreach($filteredArr as $items){
                $data['items'][] = $this->homeModel->get_items($items);
            }
            echo view('checkout',$data);
        } else{
            echo view('login');
        }
    }
}