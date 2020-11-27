<?php


    class Pages extends Controller
    {

       public function index()
       {
          if( isLoggedIn() ) {
             redirect('client');
          }
          $data = [
              'title' => 'Admin area',
              'description' => 'A simple REST MVC PHP PDO for clients management.'
          ];
          $this->view('pages/index', $data);
       }

       public function about()
       {
          $data = [
              'title' => 'About Us',
              'description' => 'A simple REST MVC PHP PDO for clients management.'
          ];
          $this->view('pages/about',$data);
       }
    }