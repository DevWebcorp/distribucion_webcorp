<?php


namespace App\Controllers;
use CodeIgniter\RESTful\ResourceController;
use CodeIgniter\API\ResponseTrait;


class Rescompra extends ResourceController
{
    use ResponseTrait;

    public function index()
    {
        $model_proxpro = model('App\Models\Model_Compras\Model_Compras');
        $data_productos['cat_products'] = $model_proxpro->cat_products();
        foreach ($data_productos['cat_products'] as $key) {
            $key->proveedores = $model_proxpro->get_products_x_proveddor($key->id);
        }
        return $this->respond($data_productos,200);
    }

    public function agregar_carrito(){
        $request = \Config\Services::request();
        $model_proxpro = model('App\Models\Model_Compras\Model_Compras');
        $json = $request->getJSON();

        $user_model = model('App\Models\session\users', false);
        $session = \Config\Services::session();
        $user_data = $user_model->select('id')->where('activation_token' , $session->get('token'))->first();

        $compra = [
            'pro_x_product' => $json->idproducto,
            'price'    => $json->precio,
            'user_id' =>$user_data
        ];


       $model_proxpro->addcar($compra);

       $response = [
        'status'   => 200,
        'error'     => null,
        'messages' => [
            'success'=>'SE AGREGO CORRECTAMENTE AL CARRITO'
           
        ]
    ];


    return $this->respondCreated($response);

    }

    public function get_productosclient(){
        $model_proxpro = model('App\Models\Model_Compras\Model_Compras');
        $user_model = model('App\Models\session\users', false);
        $session = \Config\Services::session();
        $user_data = $user_model->select('id')->where('activation_token' , $session->get('token'))->first();
        $data_productos['get_products'] = $model_proxpro->get_products($user_data);

        // Respond with 201 status code
        return $this->respond($data_productos,200);

    }

    public function delete_carrito(){
        $request = \Config\Services::request();
        $model_proxpro = model('App\Models\Model_Compras\Model_Compras');
        $json = $request->getJSON();

       

        $producto = $json->idproducto;
        


       $model_proxpro->deletecar($producto);

       $response = [
        'status'   => 200,
        'error'     => null,
        'messages' => [
            'success'=>'SE AGREGO CORRECTAMENTE AL CARRITO'
           
        ]
    ];


    return $this->respondCreated($response);

    }
}




/*namespace App\Controllers;

use CodeIgniter\RESTful\ResourceController;

class Compra extends ResourceController
{
    //protected $modelName = 'App\Models\Model_Compras\Model_Compras';
    
    //protected $format    = 'json';

    public function index()
    {
        $model_proxpro = model('App\Models\Model_Compras\Model_Compras');
        $data_productos = $model_proxpro->products_x_proveddor();
        $data = json_encode($data_productos);

        //var_dump($data);
        return $this->respond($data);
        //return $this->respond($this->modelNma->products_x_proveddor()); 
    }

    // ...
}









/*namespace App\Controllers;

use App\Models\Access;

class Compra extends BaseController
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
                $model_proxpro = model('App\Models\Model_Compras\Model_Compras');
                $data_productos["products_x_proveddor"] = $model_proxpro->products_x_proveddor();

                //var_dump($data_productos);

                
                echo view('header' , $data_header);
                echo view('left_panel' , $data_left);
                echo view('head_panel');
                echo view('Compras/Compra_view',$data_productos);
                echo view('right_panel');
                echo view('fotter_panel' , $data_fotter);
	}
}*/