<?php

namespace App\Controllers;

class Registro extends BaseController
{
    public function index()
    {

        $request = \Config\Services::request();
        $id_grupo = $request->getPost('id_grupo');
        if(isset($id_grupo)){

            $data['id_group'] = $id_grupo;


            helper('menu');
            $session = session();
            //Js Scripts ['script1.js' , 'script2.js' , 'script3.js']
            $data_fotter['scripts'] = ["dashboard.js", "Registro.js"];
            $data_fotter['external_scripts'] = ["//cdn.jsdelivr.net/npm/sweetalert2@11"];
            
            //Css Shets
            $data_header['styles'] = ["starlight.css", "solimaq.css"];
            //Vars
            $data_header['title'] = "Registro";
            $data_header['description'] = "Alta de proveedor";
            $data_left['menu'] = get_menu();
            echo view('Proveedores/Menu_proveedor');      
            echo view('header', $data_header);      
            echo view('fotter_panel', $data_fotter);
            echo view('Registro_proveedor', $data);

        }

    }

    
}
