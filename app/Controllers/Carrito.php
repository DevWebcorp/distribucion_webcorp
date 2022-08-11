<?php


namespace App\Controllers;



class Carrito extends BaseController
{
       

	public function index()
	{
                helper('menu');
                $session = session();
                //Js Scripts ['script1.js' , 'script2.js' , 'script3.js']
                $data_fotter['scripts'] = ["dashboard.js" ,"notificacion.js"];
                //Css Shets
                $data_header['styles'] = ["starlight.css"];
                //Vars
                $data_header['title'] = "Dashboard";
                $data_header['description'] = "Main Admin";
                $data_left['menu'] = get_menu();

                //datos de productos x proveedor
                //$model_proxpro = model('App\Models\Model_Compras\Model_Compras');
                //$data_productos["products_x_proveddor"] = $model_proxpro->products_x_proveddor();

                //var_dump($data_productos);

                
                echo view('header' , $data_header);
                echo view('left_panel' , $data_left);
                echo view('head_panel');
                echo view('Compras/Carrito');
                echo view('right_panel');
                echo view('fotter_panel' , $data_fotter);
	}
}