<?php namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\usermodel;

class register extends Controller{
    public function index()
    {
        helper(['form']);
        $data=[];
        echo view('register_view', $data);
    }
    
    public function save()
    {
        $request = \Config\Services::request();
        helper(['form']);
        $rules = [
            'name'=> 'required|min_length[3]|max_length[25]',
            'email' => 'required|min_length[6]|max_length[50]|valid_email|is_unique[tbl_users.email]',
            'password' => 'required|min_length[6]|max_length[20]',
            'confpass' => 'matches[password]'
        ];

        if($this->validate($rules)){
            $model  = new usermodel();
            // $primaryKey = 'pk_user';
            $data = [
                'username' => $request->getVar('name'),
                'email' => $request->getVar('email'),
                'password' => password_hash($request->getVar('password'), PASSWORD_DEFAULT),
                'plain_password' => $request->getVar('password'),
                'created_date' => date('Y-m-d')
            ];
            // print_r($data);
            $model->save($data);
            // print_r($this->db->last_query(),1);
            return redirect()->to('/login');
        }else{
            $data['validation'] = $this->validator;
            echo view('register_view', $data);
        }
    }
}
