<?php

namespace App\Controllers;

class Home extends BaseController
{
    protected $session;

    public function __construct(){
        $this->session = \Config\Services::session();
        $this->session->start();
    }

    public function index()
    {  
        if(!empty($this->session->get('token')))
        {
            $userdata = [];
            $userdata['email'] = $this->session->get('email');
            $userdata['token'] = $this->session->get('token');
            $userdata['logged_in'] = $this->session->get('logged_in');
            return view('dashboard', $userdata);
            // session_destroy();
        }
        else{
            return view('login');
        }
    }

    public function register()
    {
        return view('register');
    }

    public function auth_login() {

        $data = array(
            'email' => trim($_POST['email']),
            'password' => trim($_POST['password'])
        );
   
        $ch = curl_init('http://127.0.0.1:8000/api/login');
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        $response = curl_exec($ch);
        curl_close($ch);

        if(!empty(json_decode($response)->token)){
            $token = json_decode($response)->token;
            $userdata = [
                'email'  => trim($_POST['email']),
                'token'     => $token,
                'logged_in' => true,
            ];
            $this->session->set($userdata);    
        }
        
        echo $response;
    }
    
    public function auth_register() {
        $data = array(
            'name' => trim($_POST['name']),
            'email' => trim($_POST['email']),
            'password' => trim($_POST['password']),

        );
    
        $ch = curl_init('http://127.0.0.1:8000/api/register');
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        $response = curl_exec($ch);
        curl_close($ch);
    
        echo $response;
    }

    public function logout()
    {
        session_destroy();
        return redirect('/'); 
    }
}
