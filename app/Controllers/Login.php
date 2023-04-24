<?php namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\UserModel;
use App\Models\LoginModel;

class Login extends Controller
{
    protected $session;
    public function __construct() {	
        $db = db_connect();
        $this->LoginModel = new LoginModel($db);
    }
    public function index()
    {
        $this->session = \Config\Services::session();
        if($this->session->get('user_name')!=null && $this->session->get('user_id') > 0){
            return redirect()->to('/home');
        }else{
            echo view('login');
        }
    } 

    public function auth()
    {
        $session    = session();
        $model      = new UserModel();
        $username   = $this->request->getVar('username');
        $password = $this->request->getVar('password');
        $data       = $model->where('user_name', $username)
                            ->first();
        if($data){
            $pass = $data['password'];
            $verify_pass = password_verify($password, $pass);
            $info = [
                'user_name'  => $data['user_name'],
                'id'         => $data['user_id'],
            ];
            if ( $data['IsDeleted'] == 0 ) {
                if ($verify_pass) {
                    $ses_data = [
                        'user_id' => $data['user_id'],
                        'user_name' => $data['user_name'],
                        'logged_in' => TRUE
                    ];
                    $session->set($ses_data);
                    return redirect()->to('/home');
                }
            }
        }
    } 
}