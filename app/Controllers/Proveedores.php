<?php

namespace App\Controllers;

class Proveedores extends BaseController
{

    public function index()
    {
        helper('menu');
        $session = session();
        $validar = $session->get('token');



        if ($validar != null) {
            $data_left['menu'] = get_menu();
            //Js Scripts ['script1.js' , 'script2.js' , 'script3.js']
            $data_fotter['scripts'] = ["dashboard.js"];

            //Css Shets
            $data_header['styles'] = ["starlight.css", "solimaq.css"];

            //Vars
            $data_header['title'] = "Proveedores";
            $data_header['description'] = "Main Admin";


            //variables del modelo

            $model_proveedor = model('App\Models\Model_proveedor\Model_proveedor');
            //$data_producto['obtener_productos'] = $model_proveedor->obtener_productos();
            $data_producto['get_provedor'] = $model_proveedor->get_provedor();
            $data_producto['get_empresa'] = $model_proveedor->get_empresa();
            // $data_producto['get_proveedor'] = $model_proveedor->get_proveedores();

            $entity_producto = model('App\Models\Product');
            $productos = $entity_producto->findAll();
            $data_producto['obtener_productos'] = $productos;

            echo view('header', $data_header);
            echo view('left_panel', $data_left);
            echo view('head_panel');
            echo view('Proveedores/Proveedores_view', $data_producto);
            echo view('right_panel');
            echo view('fotter_panel', $data_fotter);
        } else {
            return redirect()->to(base_url());
        }
    }

    public function datos_proveedor($id_user=0)
    {
        helper('menu');
        $session = session();
        $validar = $session->get('token');

        if ($validar != null) {
            $data['id_user'] = $id_user;
            $data_left['menu'] = get_menu();
            //Js Scripts ['script1.js' , 'script2.js' , 'script3.js']
            $data_fotter['scripts'] = ["dashboard.js", "Aprobacion_proveedor.js"];
            $data_fotter['external_scripts'] = ["//cdn.jsdelivr.net/npm/sweetalert2@11"];

            //Css Shets
            $data_header['styles'] = ["starlight.css", "solimaq.css"];

            //Vars
            $data_header['title'] = "Alta proveedor";
            $data_header['description'] = "Main Admin";
        
            $model_generales = model('App\Models\Model_registro\Generales');        
            $data['proveedor'] = $model_generales->get_datos($id_user);

            $model_contacto = model('App\Models\Model_registro\Contacto');
            $data['contacto'] = $model_contacto->get_datos($id_user);

            $model_usuario = model('App\Models\Model_user\Table_user');
            $data['usuario'] = $model_usuario->get_table_usuarios($id_user);

            $model_banco = model('App\Models\Model_registro\Banco');
            $data['banco'] = $model_banco->get_table_banco($id_user);

            
            echo view('header', $data_header);
            // echo view('left_panel', $data_left); 
            // echo view('head_panel'); 
            echo view('Login/Menu_solimed');
            echo view('Proveedores/Datos_proveedores_view', $data);
            echo view('right_panel');
            echo view('fotter_panel', $data_fotter);  

                      
             
        } else {
            return redirect()->to(base_url());
        }
    }

    public function update_datos_proveedor(){       
        $session = session();
        $validar = $session->get('token');
        $id_user = $_POST['id'];
        
        if ($validar != null) {
            $model_usuario = model('App\Models\Model_user\Table_user');            
          
            $bytes = openssl_random_pseudo_bytes(4);
            $bytes2 = openssl_random_pseudo_bytes(4);
            $random = bin2hex($bytes);
            $token = bin2hex($bytes2);
            $password_hashed=password_hash($random,PASSWORD_DEFAULT);
            $token=password_hash($token,PASSWORD_DEFAULT);
            $datos = $model_usuario->select("email,id_group")->where("id",$id_user)->first();

            switch($datos['id_group']){
                case '9':
                    $empresa = 'Asiatodo';
                    break;
                case '10':
                    $empresa = 'Optisort';
                    break;
                case '11':
                    $empresa = 'Pyron';
                    break;
                case '12':
                    $empresa = 'Solifood';
                    break;
                case '13':
                    $empresa = 'Solimed';
                    break;
                case '14':
                    $empresa = 'Soliwaste';
                    break;
                case '15':
                    $empresa = 'Sortimex';
                    break;
                default:
                    $empresa = 'Solimaq';
                break;
            }

        
         $data =[
                'active' => 1,
                'user_name' => 'PE2022'.$id_user,
                'password' => $password_hashed,
                'activation_token' => $token

            ];

            $model_usuario->update($id_user,$data);

            $datos_email['empresa'] = $empresa;
            $datos_email['user'] = [
                'usuario' => $datos['email'],
                'password' => $random
                
            ];

          



           //$correo = 'jesusweb.2021@gmail.com';
            $correo = $datos['email'];
            $asunto = 'Aprobación de proveedor';
            $mensaje = view('Login/aprobacion_proveedor', $datos_email );
            $file = null; 
            $email = send_email($correo, $asunto, $mensaje, $file);

            $response = [
                'status'   => 200,
                'error'    => null,
                'messages' => [
                    'success' => 'DATOS INSERTADOS CON EXITO'
                ],               
            ];
            return json_encode($response); 
            
          
            //$password = $_POST['passwd'];
            //$password_hashed = password_hash($password,PASSWORD_DEFAULT);
    
            /* $data = [
                'user_name' => $usuario,
                "password" => $password
            ];
            $model_usuario->update($id_user, $data); */
        } else {
            return redirect()->to(base_url());
        }
    }

    public function agregar()
    {

        //libreria codeigniter para recivir repuestas de metodo http

        $request = \Config\Services::request();

        $path = '../public/images/logos/';
        $file = $this->request->getFile('logo');
        $newfile = $file->getRandomName();
        $file->move(WRITEPATH . $path, $newfile);
        $logo = $file->getName(); 

        $contacto = $request->getPost('contacto');
        $telefono = $request->getPost('Phone');
        $embarque = $request->getPost('embarque');
        //$banco = $request->getPost('bank');
        $empresa = $request->getPost('empresa');
        $marca = $request->getPost('marca');
        $correo = $request->getPost('correo');
        /* $cp = $request->getPost('cp');
        $numero = $request->getPost('numero');*/
        //$rfc = $request->getPost('rfc');


        $datos_proveedor = [
            'contact' => $contacto,
            'phone'    => $telefono,
            'embark' => $embarque,
            'name_proveedor' => $empresa,
            'Marca' => $marca,
            'email' => $correo,
            'logo' => $logo,
            'c_date' => date("Y-m-d h:i:s")


        ];

        $model_proveedor = model('App\Models\Model_proveedor\Model_proveedor');
        $model_proveedor->insert_proveedor($datos_proveedor);


        return redirect()->to(base_url('/proveedores'));
    }

    public function Actualizar()
    {

        $request = \Config\Services::request();
        $id_prove = $request->getPost('id_proveedor');
        $model_proveedor = model('App\Models\Model_proveedor\Model_proveedor');
        $id_provedor = $model_proveedor->get_prove($id_prove);
        echo json_encode($id_provedor);
    }

    public function Adatos()
    {
        $request = \Config\Services::request();

        $empresa = $request->getPost('empresa');
        $contacto = $request->getPost('contacto');
        $Telefono = $request->getPost('phone');
        $Enbarque = $request->getPost('embark');
        $correo = $request->getPost('correo');
        $marca = $request->getPost('marca');
        $id_prove = $request->getPost('id');

        $actualiza_provedor = [
            'name_proveedor' => $empresa,
            'Marca' => $marca,
            'embark' => $Enbarque,
            'contact' => $contacto,
            'phone'    => $Telefono,
            'email' => $correo,
            'c_date' => date("Y-m-d h:i:s")
        ];



        $model_proveedor = model('App\Models\Model_proveedor\Model_proveedor');
        $model_proveedor->update_provedor($id_prove, $actualiza_provedor);
        return redirect()->to(base_url('/proveedores'));
    }

    public function Delete()
    {
        $request = \Config\Services::request();
        $id_proveedor = $request->getPost('id_prove');
        $id = (int)$id_proveedor;
        $model_proveedor = model('App\Models\Model_proveedor\Model_proveedor');
        $model_proveedor->delete_prove($id);
        return redirect()->to(base_url('/proveedores'));
    }




    public function asignar_product()
    {

        $request = \Config\Services::request();
        $id_prove = $request->getPost('idform');
        $productos = $request->getPost('productos');
        $precio = $request->getPost('precio');
        $model_proveedor = model('App\Models\Model_proveedor\Model_proveedor');
        $model_proveedor->insert_pxp($productos, $precio, $id_prove);
        return redirect()->to(base_url('/proveedores'));
    }

    public function Get_products()
    {
        $request = \Config\Services::request();
        $idprovedor = $request->getPost('id');
        $model_proveedor = model('App\Models\Model_proveedor\Model_proveedor');
        $get_products = $model_proveedor->get_productos($idprovedor);
        echo json_encode($get_products);
    }

    public function Get_producto()
    {

        $request = \Config\Services::request();
        $idproducto = $request->getPost('id_producto');
        $model_proveedor = model('App\Models\Model_proveedor\Model_proveedor');
        $get_produco = $model_proveedor->getproduct($idproducto);
        echo json_encode($get_produco);
    }

    public function Delete_producto()
    {

        $request = \Config\Services::request();
        $idproducto = $request->getPost('id_product');
        $model_proveedor = model('App\Models\Model_proveedor\Model_proveedor');
        $model_proveedor->borrar($idproducto);
        return redirect()->to(base_url('/proveedores'));
    }

    public function Productos_update()
    {
        $request = \Config\Services::request();

        $idproducto = $request->getPost('acid');

        $actualiza_pxp = [
            'supplier_price' => $request->getPost('precio')
        ];


        $model_proveedor = model('App\Models\Model_proveedor\Model_proveedor');
        $model_proveedor->update_product($actualiza_pxp, $idproducto);
        return redirect()->to(base_url('/proveedores'));
    }

    public function get_price_x_product()
    {

        $request = \Config\Services::request();
        $idpxp = $request->getPost('id');
        $model_proveedor = model('App\Models\Model_proveedor\Model_proveedor');
        $get_price = $model_proveedor->get_price($idpxp);
        // var_dump($get_price);
        echo json_encode($get_price);
    }

    public function get_model_china()
    {
        $request = \Config\Services::request();
        $idmodelchina = $request->getPost('id');
        $model_proveedor = model('App\Models\Model_proveedor\Model_proveedor');
        $get_model_china = $model_proveedor->get_model_china($idmodelchina);
        echo json_encode($get_model_china);
    }
}
