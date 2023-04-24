<?php 
namespace App\Controllers;

use App\Models\HomeModel;
use CodeIgniter\Controller;

class Home extends BaseController
{
    public function __construct() {	
        $db = db_connect();
        $this->homeModel = new HomeModel($db);
    }
    public function index()
    {
        $this->session = \Config\Services::session();
        if($this->session->get('user_name')!=null && $this->session->get('user_id') > 0){
            $data['products'] = $this->homeModel->get_products();
            echo view('home',$data);
        } else{
            echo view('login');
        }
    }
}