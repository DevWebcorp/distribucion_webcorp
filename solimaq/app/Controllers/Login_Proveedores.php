<?php
namespace App\Controllers;
use App\Models\Model_login;
	
class Login_Proveedores extends BaseController
{
	public function verify_login()
	{
		$correo=$_POST['email'];
		$password=$_POST['password'];
		$log=new Model_login();
		$data['login']=$log->get_login($correo,$password);
       
	    if(count($data['login'])>0){
			$hashed=$data['login'][0]->password;
			if(password_verify( $password , $hashed )){
				//echo "Contraseña correcta";
				$session = session();
				$newdata = [
                    'unique' => $data['login'][0]->id,
                    'group' => $data['login'][0]->id_group,
					'username'  => $data['login'][0]->user_name,
					'email'     => $data['login'][0]->email,
					'token'		=> $data['login'][0]->activation_token,
					'logged_in' => TRUE
				];
				$session->set($newdata);
                $response = [
                    'status'   => 200,
                    'error'    => null,
                    'messages' => [
                        'success' => 'Bienvenido'
                    ]
                  ];
                  return json_encode($response);


				//return redirect()->to(base_url().'/inicio'); 
			}else{
                $response = [
                    'status'   => 400,
                    'error'    => null,
                    'messages' => [
                        'success' => 'CONTRASEÑA O CORREO INVALIDO'
                    ]
                  ];

                  return json_encode($response);
			}
		}else{
            $response = [
                'status'   => 400,
                'error'    => null,
                'messages' => [
                    'success' => 'CONTRASEÑA O CORREO INVALIDO'
                ]
              ];

              return json_encode($response);

        }	
	} 

	public function sign_out()
	{
		$session = session();
		$session->destroy();
		return redirect()->to(base_url());
	}
}