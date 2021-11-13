<?php namespace App\Controllers;

use CodeIgniter\Controller;

class dashboard extends Controller
{
    public function index()
    {
        $session = session();
        echo "Welcome Back, ".$session->get('username');
        
    }
}