<?php namespace App\Controllers;
require_once __DIR__ . '/vendor/autoload.php';

class Cotizaciones extends BaseController
{
	public function index()
	{

        helper('menu');
        $session = session();
        $data_left['menu'] = get_menu();
    //Js Scripts ['script1.js' , 'script2.js' , 'script3.js']
        $data_fotter['scripts'] = ["dashboard.js"];

        //Css Shets
        $data_header['styles'] = ["starlight.css", "solimaq.css"];

        //Vars

        //Database
        $data_header['title'] = "Cotizaciones";
        $data_header['description'] = "Main Admin";
        $entity_model=model('App\Models\Model_cotizacion\Cotizacion',false);
        $entity_model_user=model('App\Models\Model_user\Table_user',false);
        $entity_model_empresa=model('App\Models\Model_Empresa\Model_Empresa',false);
        $data['business']=$entity_model_empresa->listarDatos();
        $data['cotizaciones']=$entity_model->findAll();

        //Toke
        $token=$session->get('token');
        $get_token=$entity_model_user->where('activation_token',$token)->first();
        $data['id_group']=$get_token['id_group'];
        $data['get_token']=$get_token;

        //Selected del vendedor

        $data['users']=$entity_model_user->where('id_group','3')->findAll();
        $data['vendor']=$entity_model->users_cotization();

        $data['vendor_x_product']=$entity_model->users_x_products();
        //$data['client']=$entity_model->clients_data_cotization();

        /*Clients del select */
        $data['clients']=$entity_model->users_clients_data();


        /*Aqui termino el inner join*/

        $data['error_email']=0;
        
        //var_dump($data['business'][0]->business_name);

        //var_dump($data['vendor_x_product']);

        echo view('header' , $data_header);
        echo view('left_panel',$data_left);
        echo view('head_panel');
        echo view('Cotizacion/Cotizacion_views',$data);
        echo view('right_panel');
        echo view('fotter_panel' , $data_fotter);
	}


    public function insert_cotizacion(){
        $entity_model=model('App\Models\Model_cotizacion\Cotizacion',false);
        $entity_model_clients=model('App\Models\Model_clients_data\clients',false);
        $entity_model_user=model('App\Models\Model_user\Table_user',false);
        $entity_model_cotization_product=model('App\Models\Model_cotization_product\cotization_product',false);
       
      /*  $id_user_vendor=$_POST['id_user_vendor'];
        
       // $global_percent=$_POST['global_percent'];
        $type=$_POST['selected_type_client'];

        if($type==1){

        $name_contact=$_POST['name_data_contact'];
        $email=$_POST['email_data_contact'];
        $phone=$_POST['phone_data_contact'];
        $movil=$_POST['movil_data_contact'];
        $calle=$_POST['calle'];
        $exterior=$_POST['exterior'];
        $interior=$_POST['interior'];
        $colonia=$_POST['colonia'];
        $localidad=$_POST['localidad'];
        $estado=$_POST['estado'];
        $municipio=$_POST['municipio'];
        $codigo_postal=$_POST['codigo_postal'];
        $referencia=$_POST['referencia'];
        $pais=$_POST['country'];



        $password=12345;
        $password_hashed=password_hash($password,PASSWORD_DEFAULT);
        $token=$this->generate_token();
        $id_group=2;
        $about="Soy un cliente";



        $entity_model=model('App\Models\Model_cotizacion\Cotizacion',false);
        $entity_model_clients=model('App\Models\Model_clients_data\clients',false);
        $entity_model_user=model('App\Models\Model_user\Table_user',false);


        $data_users=[
            "user_name" => $name_contact,
            "c_date"=>date("Y-m-d h:i:s"),
            "password" => $password_hashed,
            "email"=>$email,
            "activation_token"=>$token,
            "id_group"=>$id_group,
            "about" => $about,
            "active"=>0

        ];

        $entity_model_user->insert($data_users);


        $max_id_client=$entity_model_clients->max();

        


       $data_client=[
            "name"=>$name_contact,
            "email"=>$email,
            "phone"=>$phone,
            "mobile"=>$movil,
            "adress_city"=>$calle,
            "adress_number"=>$interior,
            "adress_city"=>$estado,
            "adress_county"=>$municipio,
            "adress_number"=>$codigo_postal,
            "adress_country"=>$pais,
            "id_user"=>$max_id_client[0]['id']

        ];

        
       $entity_model_clients->insert($data_client);



        
        $data=[
            "id_user_vendor"=>$id_user_vendor,
            "id_user_client"=>$max_id_client[0]['id'],
            "name_data_contact"=>$name_contact,
            "email_data_contact"=>$email,
            "phone_data_contact"=>$phone,
            "movil_data_contact"=>$movil,
            "calle"=>$calle,
            "interior"=>$interior,
            "exterior"=>$exterior,
            "colonia"=>$colonia,
            "localidad"=>$localidad,
            "estado"=>$estado,
            "municipio"=>$municipio,
            "postal"=>$codigo_postal,
            "referencia"=>$referencia,
            "country"=>$pais

        ];


        

       

        
        $entity_model->insert($data);



        return redirect()->to(base_url().'/cotizaciones');

        }else{
            $id_user_client=$_POST['id_user_client'];
            $entity_model=model('App\Models\Model_cotizacion\Cotizacion',false);
            $data=$entity_model->get_client_exist($id_user_client);
            
            $data_client=[
            "id_user_vendor"=>$id_user_vendor,
            "id_user_client"=>$id_user_client,
            "name_data_contact"=>$data[0]['name'],
            "email_data_contact"=>$data[0]['email'],
            "phone_data_contact"=>$data[0]['phone'],
            "movil_data_contact"=>$data[0]['mobile'],
            "calle"=>$data[0]['adress_street'],
            "interior"=>$data[0]['adress_number'],
            "municipio"=>$data[0]['adress_county'],
            "postal"=>$data[0]['adress_postal_code'],
            "country"=>$data[0]['adress_country'],
            "id_user"=>$id_user_client

        ];

        $entity_model=model('App\Models\Model_cotizacion\Cotizacion',false);
        $entity_model->insert($data_client);
         return redirect()->to(base_url().'/cotizaciones');





            


        }*/

        $type=$_POST['selected_type_client'];
        $id_user_vendor=$_POST['id_user_vendor'];
        /* $numero_porcent=$_POST['txt_numero_porcent'];
        $total_porcent=$_POST['txt_total_porcent'];
        $numero_porcent_rest=$_POST['txt_numero_porcent_rest'];
        $total_porcent_rest=$_POST['txt_total_porcent_rest']; */


        if($type==1){
            //var_dump($_POST);
        $name=$_POST['name'];
        $empresa=$_POST['empresa'];
        $correo=$_POST['correo'];
        $telefono=$_POST['telefono'];
        $su_price=$_POST['su_price'];
        $selected_product=$_POST['selected_empresa'];

        $password=12345;
        $password_hashed=password_hash($password,PASSWORD_DEFAULT);
        $token=$this->generate_token();
        $id_group=2;
        $about="Soy un cliente";

         $data_users=[
            "user_name" => $name,
            "c_date"=>date("Y-m-d h:i:s"),
            "password" => $password_hashed,
            "email"=>$correo,
            "activation_token"=>$token,
            "id_group"=>$id_group,
            "about" => $about,
            "active"=>0

        ];

        $entity_model_user->insert($data_users);


        $max_id_client=$entity_model_clients->max();




       $data_client=[
            "name"=>$name,
            "email"=>$correo,
            "phone"=>$telefono,
            "id_user"=>$max_id_client[0]['id']

        ];


       $entity_model_clients->insert($data_client);




        $data=[
            "id_user_vendor"=>$id_user_vendor,
            "id_user_client"=>$max_id_client[0]['id'],
            "name_data_contact"=>$name,
            "email_data_contact"=>$correo,
            "phone_data_contact"=>$telefono,
            "empresa"=>$empresa,
            

        ];







        $entity_model->insert($data);

        $data_get=$entity_model->max_cotization();




        $data_cot_pro=[

            "id_cat_products"=>$selected_product,
            "id_cotization"=>$data_get[0]['id'],
            "price"=>$su_price,
            "percent"=>0
        ];

        $entity_model_cotization_product->insert($data_cot_pro);


        return redirect()->to(base_url().'/cotizaciones');
        
        }else{

            //var_dump($_POST);
            $id_user_client=$_POST['id_user_client'];
            $empresa=$_POST['list_empresa'];
            $su_price=$_POST['su_price'];
            $selected_product=$_POST['selected_empresa'];

            $entity_model=model('App\Models\Model_cotizacion\Cotizacion',false);
            $data=$entity_model->get_client_exist($id_user_client);

            $data_client=[
                "id_user_vendor"=>$id_user_vendor,
                "id_user_client"=>$id_user_client,
                "name_data_contact"=>$data[0]['name'],
                "email_data_contact"=>$data[0]['email'],
                "phone_data_contact"=>$data[0]['phone'],
                "movil_data_contact"=>$data[0]['mobile'],
                "calle"=>$data[0]['adress_street'],
                "interior"=>$data[0]['adress_number'],
                "municipio"=>$data[0]['adress_county'],
                "postal"=>$data[0]['adress_postal_code'],
                "country"=>$data[0]['adress_country'],
                "id_user"=>$id_user_client

            ];

            $entity_model=model('App\Models\Model_cotizacion\Cotizacion',false);
            $entity_model->insert($data_client);

            $data_get=$entity_model->max_cotization();

            $data_cot_pro=[

                "id_cat_products"=>$selected_product,
                "id_cotization"=>$data_get[0]['id'],
                "price"=>$su_price,
                "percent"=>0
            ];

            $entity_model_cotization_product->insert($data_cot_pro);

            return redirect()->to(base_url().'/cotizaciones');
        } 



    }

    public function get_cotizacion_json(){
                $id=$_POST['id'];
                $entity_model=model('App\Models\Model_cotizacion\Cotizacion',false);
                $data=$entity_model->find($id);
                echo json_encode($data);
    }

    public function update_cotizaciones(){
        $id_user_vendor=$_POST['id_user_vendor_update'];
        $id_user_client=$_POST['id_user_client_update'];
        $global_percent=$_POST['global_percent_update'];
        $id=$_POST['id_cotizacion_update'];

         $data=[
            "id_user_vendor"=>$id_user_vendor,
            "id_user_client"=>$id_user_client,
            "global_percent"=>$global_percent
        ];

        $entity_model=model('App\Models\Model_cotizacion\Cotizacion',false);
        $entity_model->update($id,$data);
        return redirect()->to(base_url().'/cotizaciones');
    }

    public function delete_cotizaciones(){
        $id=$_POST['id_delete'];
        $entity_model=model('App\Models\Model_cotizacion\Cotizacion',false);
        $entity_model->delete($id);
        return redirect()->to(base_url().'/cotizaciones');
    }


    public function view_table_contizaciones(){

    	helper('menu');
        $session = session();
        $data_left['menu'] = get_menu();
    //Js Scripts ['script1.js' , 'script2.js' , 'script3.js']
        $data_fotter['scripts'] = ["dashboard.js"];

        //Css Shets
        $data_header['styles'] = ["starlight.css"];

        //Vars

        //Database
        $data_header['title'] = "Dashboard";
        $data_header['description'] = "Main Admin";
        $entity_model=model('App\Models\Model_cotizacion\Cotizacion',false);
        $entity_model_user=model('App\Models\Model_user\Table_user',false);
        $data['cotizaciones']=$entity_model->findAll();

        //Selected del vendedor

        $data['users']=$entity_model_user->where('id_group','3')->findAll();

        $data['vendor']=$entity_model->users_cotization();
        $data['client']=$entity_model->clients_data_cotization();
        $data['clients']=$entity_model->users_clients_data();

        $response = service('response');
        $response->setHeader('Content-type',' application/pdf');
        $mpdf = new \Mpdf\Mpdf();
        $mpdf->WriteHTML($this->body($data));
        $mpdf->Output();

    }


    public function body($data){
    	return view('Cotizacion/Cotizacion_pdf',$data);
    }



    //Mandar pdf a los de email

    public function email(){
        $id=$_POST['id_email'];
        $correo=$_POST['name_correo'];
        $telefono=$_POST['movil'];

/*select * from cotization_x_products inner join cat_products on
cat_products.id=cotization_x_products.id_cat_products where cotization_x_products.id_cotization=4*/
        $entity_model=model('App\Models\Model_cotizacion\Cotizacion',false);
        $data['query']=$entity_model->email_username_vendor($id);
        $data['products']=$entity_model->email_products($id);


       // $correo_envio ="sergiofloresgonzalez1@gmail.com";
        $file = array("./../public/Cotizaciones/cotizacion".$id.".pdf");


        $mensaje = "Estimado ".$data['query'][0]['user_name'].":
        Se han generado las cotizaciones adjuntas de acuerdo a su solicitud:";

        foreach ($data['products'] as $key) {
            $mensaje.=" producto '".$key['name']."' link de producto '".$key['link_youtube']."'";
        }

        $mensaje.=" para mayores detalles o consultas que tenga.
        <a href='https://wa.me/".$telefono."/?text=Saludos'><img src='../../../../assets/img/whatsapp.png' alt='link whatsapp' width='50' height='50'></a>
        Un cordial saludo
        [Firma del correo]";

        $asunto = "Solimaq Prueba";




        //Esta es la funcion Global
        $data=send_email($correo,$asunto,$mensaje,$file);
        if($data==0){
            return redirect()->to(base_url().'/cotizaciones');
        }else{
            helper('menu');
        $session = session();
        $data_left['menu'] = get_menu();
    //Js Scripts ['script1.js' , 'script2.js' , 'script3.js']
        $data_fotter['scripts'] = ["dashboard.js"];

        //Css Shets
        $data_header['styles'] = ["starlight.css"];

        //Vars

        //Database
        $data_header['title'] = "Dashboard";
        $data_header['description'] = "Main Admin";
        $entity_model=model('App\Models\Model_cotizacion\Cotizacion',false);
        $entity_model_user=model('App\Models\Model_user\Table_user',false);
        $data['cotizaciones']=$entity_model->findAll();

        //Selected del vendedor

        $data['users']=$entity_model_user->where('id_group','3')->findAll();

        $data['vendor']=$entity_model->users_cotization();
        $data['client']=$entity_model->clients_data_cotization();
        $data['clients']=$entity_model->users_clients_data();

        /*Aqui termino el inner join*/
        $data['error_email']=1;

        echo view('header' , $data_header);
        echo view('left_panel',$data_left);
        echo view('head_panel');
        echo view('Cotizacion/Cotizacion_views',$data);
        echo view('right_panel');
        echo view('fotter_panel' , $data_fotter);
        }

        //echo "Correo enviado exitosamente";

    }


    public function get_email_json(){
                $id=$_POST['id'];
                $entity_model=model('App\Models\Model_cotizacion\Cotizacion',false);
                $data=$entity_model->get_email($id);
                echo json_encode($data);
    }

    public function generate_token(){
            return bin2hex(random_bytes(24));
         }

    public function get_empresa_json(){
         $id=$_POST['id'];

         $entity_model=model('App\Models\Model_Empresa\Model_Empresa',false);
         $data=$entity_model->get_empresa_product($id);
         echo json_encode($data);
    }

    public function get_product_data_json(){
         $id=$_POST['id'];

         $entity_model=model('App\Models\Model_Empresa\Model_Empresa',false);
         $data=$entity_model->get_data_product($id);
         echo json_encode($data);
    }


    public function ficha_tecnica(){
        //$stylesheet = file_get_contents(path_file.'/ficha_tecnica/style.css');
      //  $html = mb_convert_encoding($html, 'UTF-8', 'UTF-8');
        $response = service('response');
        $response->setHeader('Content-type',' application/pdf');
        $mpdf = new \Mpdf\Mpdf();
        //$mpdf->WriteHTML($html);
        //$mpdf->allow_charset_conversion=true;
        //$mpdf->charset_in='UTF-8';
        //$mpdf->WriteHTML($stylesheet);
       // $mpdf->SetHTMLHeader('<img style="position:absolute;top:5.18in;left:2.95in;width:3.73in;height:4.54in" src='. path_file."/ficha_tecnica/ri_2.png".' />');
        //$mpdf->SetDisplayMode('fullpage');
        
        $mpdf->WriteHTML($this->body_ficha_tecnica3());
        $mpdf->Output();
    }


    public function body_ficha_tecnica(){
        //echo path_file.'/ficha_tecnica/vi_2.png';
        return view('Cotizacion/Cotizacion_ficha_tecnica');
    }

    public function body_ficha_tecnica2(){
        //echo path_file.'/ficha_tecnica/vi_2.png';
        return view('Cotizacion/Cotizacion_ficha_tecnica2');
    }

    public function body_ficha_tecnica3(){
        //echo path_file.'/ficha_tecnica/vi_2.png';
        return view('Cotizacion/Cotizacion_ficha_tecnica3');
    }

    public function get_date_coti(){
        $date_inicio=date_create($_POST['date_inicio']);
        $date_final=date_create($_POST['date_final']);
        $id_vendor=$_POST['vendor'];

        $date_inicio_structura=date_format($date_inicio,"Y/m/d");
        $date_final_structura=date_format($date_final,"Y/m/d");

       // var_dump($date_inicio_structura);

        $entity_model=model('App\Models\Model_cotizacion\Cotizacion',false);
        $data['date']=$entity_model->get_data_date($date_inicio_structura,$date_final_structura,$id_vendor);

        //var_dump($data['date']);

        $response = service('response');
        $response->setHeader('Content-type',' application/pdf');
        $mpdf = new \Mpdf\Mpdf();
        $mpdf->WriteHTML($this->body_ficha_list_date($data));
        $mpdf->Output();
       // var_dump($data);
       // echo json_encode($data);

    }


    public function body_ficha_list_date($data){
        //echo path_file.'/ficha_tecnica/vi_2.png';
        return view('Cotizacion/Cotizacion_date',$data);
    }



}