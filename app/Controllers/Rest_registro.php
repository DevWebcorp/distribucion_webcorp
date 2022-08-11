<?php

namespace App\Controllers;
use CodeIgniter\RESTful\ResourceController;
use CodeIgniter\API\ResponseTrait;
helper('sendmail');

class Rest_registro extends ResourceController
{
    use ResponseTrait;

    public function index()
    {    
        $request = \Config\Services::request();
        /* $password =  bin2hex(random_bytes(5)); */

        $model_generales = model('App\Models\Model_registro\Generales');
        $model_contacto = model('App\Models\Model_registro\Contacto');
        $model_banco = model('App\Models\Model_registro\Banco');
        $model_user = model('App\Models\Model_user\Table_user');

        $correo = $_POST['correo'];
        $id_empresa = $_POST['grupo'];
        $usuario = [
            'id_group' => $id_empresa,
            'email' =>$correo
        ];
        $id_user = $model_user->insert($usuario);

        $nombre_servicio = $_POST['nombre_comercial'];
        $producto = $_POST['producto'];
        $general = [
            'razon_social' => $request->getPost('r_social'),
            'commercial_name' => $nombre_servicio,
            'rfc' => $request->getPost('rfc_proveedor'),
            'product' => $producto,
            'web' => $request->getPost('pagina'),
            'user_id' =>$id_user
        ];        
        $info_general = $model_generales->insert($general);

        $contacto = [
            'contrato' => $request->getPost('nombre_contrato'),
            'telefono' => $request->getPost('tel_fijo'),
            'celular' => $request->getPost('tel_movil'),
            //'email' => $request->getPost('correo'),
            'calle' => $request->getPost('calle'),
            'exterior' => $request->getPost('exterior'),
            'interior' => $request->getPost('interior'),
            'colonia' => $request->getPost('colonia'),
            'cp' => $request->getPost('cod_p'),
            'ciudad' => $request->getPost('city'),
            'estado' => $request->getPost('edo'),
            'user_id' =>$id_user
        ];        
        $info_contacto = $model_contacto->insert($contacto);        

        $banco = [
            'banco' => $request->getPost('banco'),
            'n_cta' => $request->getPost('num_cuenta'),
            'clabe' => $request->getPost('clabe'),
            'moneda' => $request->getPost('moneda'),
            'user_id' =>$id_user
        ];        
        $info_banco = $model_banco->insert($banco);

        switch($id_empresa){
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

        if($info_general > 0 && $info_contacto >0){
            //$model_grupo = model('App\Models\group_models\Crud_group_model');
           // $empresa = $model_grupo->get_name();
            $correo_contador = "gmontes@solimaq.mx";
            //$correo_contador = "jesus.sanchez@webcorp.com.mx";
           // $correo_contador = "belcros90@gmail.com";


            $asunto = "Registro Solimaq"; 
            $usuario = $id_user;
            $data['empresa'] = $empresa;
            $data['nom_servicio'] = $nombre_servicio;
            $data['producto'] = $producto;            
            $data['id_user'] =$id_user;

            $asunto = 'Registro de proveedor';
            $mensaje = view('Login/enviar_acceso', $data );
            $file = null;
            $email = send_email($correo, $asunto, $mensaje, $file);
            //echo view('Login/Signin_view' ,  $data);
        }else{				
            $data['title'] = "Solimaq";
            $data['error'] = "Ha ocurrido un error inesperado, por favor intentelo de nuevo." ;
            //echo view('Login/sign_up' ,  $data);
        }

       
            $response = [
                'status'   => 200,
                'error'    => null,
                'messages' => [
                    'success' => 'DATOS INSERTADOS CON EXITO'
                ],               
            ];
            return $this->respondCreated($response); 
       
            $response = [
                'status'   => 400,
                'error'    => null,
                'messages' => [
                    'success' => 'HUBO UN ERROR INTENTALO DE NUEVO'
                ]
              ];
            return $this->respondCreated($response);    

        
    }

    
}
