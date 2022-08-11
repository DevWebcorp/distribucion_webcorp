<?php

namespace App\Controllers;

class Inicio_provedor extends BaseController
{
    public function index()
    {
            helper('menu');
            $session = session();
            //Js Scripts ['script1.js' , 'script2.js' , 'script3.js']
            $data_fotter['scripts'] = ["facturas.js"];
            $data_fotter['external_scripts'] = ["//cdn.jsdelivr.net/npm/sweetalert2@11"];
            
            //Css Shets
            $data_header['styles'] = ["starlight.css", "solimaq.css"];
            //Vars
            $data_header['title'] = "Facturas";
            $data_header['description'] = "Alta de proveedor";
            $data_left['menu'] = get_menu();

            echo view('header_provedor', $data_header);
            echo view('left_panel_provedor', $data_left);
            echo view('head_panel');
          
            echo view('right_panel');
            echo view('fotter_panel', $data_fotter);
            echo view('Facturas/Facturas_view');
    
           // echo view('header_provedor', $data_header);      
            //echo view('fotter_panel', $data_fotter);
            //echo view('Registro_proveedor', $data);

    }

    
}
