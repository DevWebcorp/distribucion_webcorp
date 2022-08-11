<?php

namespace App\Controllers;

use CodeIgniter\HTTP\Request;
use CodeIgniter\HTTP\UserAgent;

class Users extends BaseController
{
    public function index()
    {
        $data_left['menu'] = get_menu();
        //Js Scripts ['script1.js' , 'script2.js' , 'script3.js']
        $data_fotter['scripts'] = ["dashboard.js"];

        //Css Shets
        $data_header['styles'] = ["starlight.css", "solimaq.css"];

        //Vars

        //Database
        $entity = model('App\Models\Model_user\User');
        $entity_user = model('App\Models\Model_user\Table_user', false);
        $entity_busines = model('App\Models\Model_Empresa\Model_Empresa', false);
        $data['busine'] = $entity_busines->listarDatos();
        $data['users'] = $entity_user->findAll();
        //$data['users']=$entity->get_users_data();
        $data['groups'] = $entity->groups();
        $data_header['title'] = "Usuarios";
        $data_header['description'] = "Main Admin";
        $entity_model = model('App\Models\session\Group_modules', false);
        //var_dump($data['users']); 
        echo view('header', $data_header);
        echo view('fotter_panel', $data_fotter);
        echo view('left_panel', $data_left);
        echo view('head_panel');
        echo view('Users/Users_table', $data);
        echo view('right_panel');
    }

    public function tabla_usuarios()
    {
        $entity_user = model('App\Models\Model_user\Table_user', false);
        $data['data'] = $entity_user->get_table_usuarios();
        return json_encode($data);
    }

    public function new_user()
    {
        helper('menu');
        $session = session();
        $data_left['menu'] = get_menu();

        //Js Scripts ['script1.js' , 'script2.js' , 'script3.js']
        $data_fotter['scripts'] = ["dashboard.js"];

        //Css Shets
        $data_header['styles'] = ["starlight.css", "solimaq.css"];

        //Database
        $entity = model('App\Models\Model_register\Register');
        $entity_busines = model('App\Models\Model_Empresa\Model_Empresa', false);
        $data['busine'] = $entity_busines->listarDatos();
        $data['groups'] = $entity->get_groups();
        $data['error'] = 0;
        $data_header['title'] = "Registro de usuario";
        $data_header['description'] = "REGISTRO DE USUARIO";
        $entity_model = model('App\Models\session\Group_modules', false);
        echo view('header', $data_header);
        echo view('left_panel', $data_left);
        echo view('head_panel');
        echo view('Users/Users_view', $data);
        echo view('right_panel');
        echo view('fotter_panel', $data_fotter);
    }


    public function table_clients()
    {
        //Js Scripts ['script1.js' , 'script2.js' , 'script3.js']
        $data_fotter['scripts'] = ["dashboard.js"];

        //Css Shets
        $data_header['styles'] = ["starlight.css", "solimaq.css"];

        //Vars

        //Database
        $entity = model('App\Models\Model_register\Register');
        $data['groups'] = $entity->get_groups();
        $data_header['title'] = "Dashboard";
        $data_header['description'] = "Main Admin";
        $entity_model = model('App\Models\session\Group_modules', false);
        $data_left['menu'] = $entity_model->find();
        echo view('header', $data_header);
        echo view('left_panel', $data_left);
        echo view('head_panel');
        echo view('Users/Users_view', $data);
        echo view('right_panel');
        echo view('fotter_panel', $data_fotter);
    }

    public function insert_client()
    {
       
        $db = \Config\Database::connect();
        $db->connID;

        $agent = $this->request->getUserAgent();
        $currentAgent = $agent->getBrowser() . ' ' . $agent->getVersion();
        $request = service('request');

        $ip = $request->getIPAddress();
        $currentAgent;


        $session = session();
        $token = $session->token;
        $entity_model = model('App\Models\Model_user\Table_user', false);
        $find_name_session = $entity_model->where('activation_token', $token)->first();
        $name_session = $find_name_session["user_name"];



        $model_user = model('App\Models\Model_user\User');
        $username = $_POST['username'];
        $password = $_POST['password'];
        $password_hashed = password_hash($password, PASSWORD_DEFAULT);
        $about = $_POST['about'];
        $email = $_POST['email'];
        $id_empresa = $_POST['id_empresa'];
        $id_group = $_POST['id_group'];
        $token = $this->generate_token();

        ////////////////////////////////////////////////

        /* $name_photo = ""; */

        $file = $this->request->getFile('file');
        if ($file->getsize() > 0) {
            $path = "../public/images";
            $file->move($path, $file->getRandomName());
            $name_photo = $file->getName();
        } else {
            $name_photo = "";
        }

        ///////////////////////////////////////////////////////////////////////////

        $datos = [
            "user_name" => $username,
            "c_date" => date("Y-m-d h:i:s"),
            "password" => $password_hashed,
            "email" => $email,
            "activation_token" => $token,
            "id_group" => $id_group,
            "about" => $about,
            "photo" => $name_photo,
            "active" => 0,
            "business_id" => $id_empresa
        ];

        $numero_base = $this->exist_email($email);
        if ($numero_base == 0) {


            if ($id_group == 2) {
                $name_client = $_POST['name_client'];
                $rfc = $_POST['rfc'];
                $address_country = $_POST['address_country'];
                $address_county = $_POST['addres_county'];
                $street = $_POST['address_street'];
                $postal = $_POST['address_postal_code'];
                $number = $_POST['address_number'];
                $city = $_POST['addres_city'];



                $last_id['id'] = $model_user->insert_user($datos);
                $id_user = $last_id['id'][0]->id;

                $datos = [
                    "name" => $name_client,
                    "rfc" => $rfc,
                    "adress_country" => $address_country,
                    "adress_county" => $address_county,
                    "adress_street" => $street,
                    "adress_postal_code" => $postal,
                    "adress_number" => $number,
                    "adress_city" => $city,
                    "id_user" => $id_user
                ];
                $model_user->insert_client($datos);
                $db->query("call pa_user(1," . $name_session . "," . $ip . "," . $username . "," . $email . "," . $about . ");");
                //$db->callFunction('pa_user', $name_session, $ip, $username,$email,$about);
                return redirect()->to(base_url() . '/users/users');
            } else {
                $model_user->insert_user($datos);
                $db->query("call pa_user(1,'" . $name_session . "','" . $ip . "','" . $username . "','" . $email . "','" . $about . "');");
                //$db->callFunction('pa_user', $name_session, $ip, $username,$email,$about);
                return redirect()->to(base_url() . '/users');
            }
        } else {
            helper('menu');
            $session = session();
            $data_left['menu'] = get_menu();

            //Js Scripts ['script1.js' , 'script2.js' , 'script3.js']
            $data_fotter['scripts'] = ["dashboard.js"];

            //Css Shets
            $data_header['styles'] = ["starlight.css", "solimaq.css"];

            //Database
            $entity = model('App\Models\Model_register\Register');
            $data['groups'] = $entity->get_groups();
            $data['error'] = 1;
            $data_header['title'] = "NUEVO USUARIO";
            $data_header['description'] = "REGISTRO DE USUARIO";
            $entity_model = model('App\Models\session\Group_modules', false);
            echo view('header', $data_header);
            echo view('left_panel', $data_left);
            echo view('head_panel');
            echo view('Users/Users_view', $data);
            echo view('right_panel');
            echo view('fotter_panel', $data_fotter);
            //echo "<script>alert('Ya hay un usuario con ese correo');</script>";
            //return redirect()->to(base_url().'/users');
        }
    }


    public function get_data_json()
    {
        $id = $_POST['id'];
        $model_user = model('App\Models\Model_user\User');
        $data = $model_user->get_json_data($id);
        echo json_encode($data);
    }


    public function update_client()
    {
        $name_client = $_POST['update_name'];
        $rfc = $_POST['update_rfc'];
        $address_country = $_POST['update_adress_country'];
        $address_county = $_POST['update_adress_county'];
        $street = $_POST['update_adress_street'];
        $postal = $_POST['update_adress_postal_code'];
        $number = $_POST['update_number'];
        $city = $_POST['update_adress_city'];
        $id = $_POST['id'];

        $datos = [
            "name" => $name_client,
            "rfc" => $rfc,
            "adress_country" => $address_country,
            "adress_county" => $address_county,
            "adress_street" => $street,
            "adress_postal_code" => $postal,
            "adress_number" => $number,
            "adress_city" => $city
        ];
        $model_user = model('App\Models\Model_user\User');
        $model_user->update_client($datos, $id);
        return redirect()->to(base_url() . '/users');
    }


    public function delete_client()
    {
        $id = $_POST['id_delete'];
        $model_user = model('App\Models\Model_user\User');
        $model_user->delete_client($id);
        return redirect()->to(base_url() . '/users');
    }

    public function get_users_json()
    {
        $id = $_POST['id'];
        $model_user = model('App\Models\Model_user\User');
        $data = $model_user->get_json_users($id);
        echo json_encode($data);
    }


    public function update_users()
    {

        $request = \Config\Services::request();
        $entity_busines = model('App\Models\Model_Empresa\Model_Empresa', false);
        $model_user = model('App\Models\Model_user\User');
        $data['busine'] = $entity_busines->listarDatos();
        $name = $_POST['update_name'];
        $correo = $_POST['email_update'];
        $password = $_POST['password_update'];
        $about = $_POST['update_about'];
        $id = $_POST['id_users'];
        $id_empresas = $_POST['id_update_empresa'];
        $id_groups = $_POST['id_update_groups'];
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);
        $model_user2 = model('App\Models\Model_user\Table_user');


        $foto_user = $this->request->getFile('foto');
        $validar = $foto_user->isValid();
        $nombre_archivo = $request->getPost('nameimg');       

        $foto_perfil = $this->foto_perfil($validar, $nombre_archivo, $foto_user);

        $data = [
            "user_name" => $name,
            "email" => $correo,
            "about" => $about,
            "id_group" => $id_groups,
            "password" => $hashed_password,
            "business_id" => $id_empresas,
            "photo" => $foto_perfil
        ];
        $model_user2->update($id, $data);
        return redirect()->to(base_url() . '/users');
    }


    public function foto_perfil($validar, $nombre_archivo, $foto_user)
    {
        if ($validar == true) {
            $nombre_archivo = '../public/images/' . $nombre_archivo;
            if (file_exists($nombre_archivo)) {
                $success = unlink($nombre_archivo);
                $nueva_imagen = $foto_user->getRandomName();
                $foto_user->move('../public/images', $nueva_imagen);
                return $nombre_img = $foto_user->getName();

                if (!$success) {
                    echo ("Error al borrar el archivo");
                }
            }
            echo "Exito";
        } else {
            return $nombre_img = $nombre_archivo;
            echo "Error. No se cambio la imagen  ";
        }
    }


    public function borrar_usuarios()
    {
        $request = \Config\Services::request();
        $id = $request->getPost('id');      
        $model_user = model('App\Models\Model_user\Table_user', false);
        //var_dump($model_user);
        $model_user->delete($id);
        return redirect()->to(base_url() . '/users'); 
    }



    //para comprobar si ya existe el usuario en la base de datos
    public function exist_email($email)
    {
        $model_user = model('App\Models\Model_user\Table_user', false);
        $data['number'] = $model_user->findCount($email);

        if ($data['number'] == 0) {
            // echo "No hay nada";
            return 0; //0 es porque no hay
        } else {
            //echo "Hay datos en la base";
            return 1;
        }
    }

    public function generate_token()
    {
        return bin2hex(random_bytes(24));
    }
}
