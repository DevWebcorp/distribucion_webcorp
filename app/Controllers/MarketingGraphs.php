<?php

    namespace App\Controllers;



    class MarketingGraphs extends BaseController
    {
        public function index()
        {
                    helper('menu');
                    $session = session();
    
                    //Js Scripts ['script1.js' , 'script2.js' , 'script3.js']
                    $data_fotter['scripts'] = ["dashboard.js"];
                    //Css Shets
                    $data_header['styles'] = ["starlight.css"];
                    //Vars
                    $data_header['title'] = "Dashboard";
                    $data_header['description'] = "Main Admin";
                    $data_left['menu'] = get_menu();

                    $controllerName =  explode( "\\" , get_class());
                    $name = strtolower($controllerName[count($controllerName) - 1]);

                    $Model_Breadcrumb=model('App\Models\Model_Breadcrumb');
                    $data_leads['parent'] = $Model_Breadcrumb->obtener_parent($name);

                    //Datos de Model marketing graphs
    
                    $graficas = model('App\Models\Model_MarketingGraphs\Model_MarketingGraphs');
                    $data_leads['leads'] = $graficas->get_leads();
                    /*$algo = $graficas->get_activo();
                    $activo = count($algo);
                    $array [] = $activo;*/
                    $data_leads['best']  = $graficas->best_camping();
                    $data_leads['worse']  = $graficas->worse_camping();

    
                    echo view('header' , $data_header);
                    echo view('left_panel' , $data_left);
                    echo view('head_panel');
                    echo view('MarketingGraphs/MarketingGraphs_view',$data_leads);
                    echo view('right_panel');
                    echo view('fotter_panel' , $data_fotter);
    
    
    
                  
        }

    }

?>    