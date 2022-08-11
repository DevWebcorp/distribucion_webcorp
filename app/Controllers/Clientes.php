<?php

    namespace App\Controllers;

    class Clientes extends BaseController
    {
        public function index()
        {
            helper('menu');
            $session = session();
            $validar = $session->get('token');
            if($validar !=null){
                //Js Scripts ['script1.js' , 'script2.js' , 'script3.js']
                $data_fotter['scripts'] = ["dashboard.js"];
                //Css Shets
                $data_header['styles'] = ["starlight.css"];
                //Vars
                $data_header['title'] = "Dashboard";
                $data_header['description'] = "Main Admin";
                $data_left['menu'] = get_menu();

                //Model data_clientes

                $model_clientes = model('App\Models\Model_clientes_table\Model_Clientes');
                $data_clientes['get_clientes'] = $model_clientes->get_clientes();
                
                echo view('header' , $data_header);
                echo view('left_panel' , $data_left);
                echo view('head_panel');
                echo view('Clientes/Clientes_view',$data_clientes);
                echo view('right_panel');
                echo view('fotter_panel' , $data_fotter);
            }else{
                return redirect()->to(base_url());
            }    
        }
    }

?>    