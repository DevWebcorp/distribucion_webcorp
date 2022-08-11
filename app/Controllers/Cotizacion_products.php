<?php namespace App\Controllers;
require_once __DIR__ . '/vendor/autoload.php';

class Cotizacion_products extends BaseController
{
	public function detalles($id)
	{

        helper('menu');
        $session = session();
        $data_left['menu'] = get_menu();
    //Js Scripts ['script1.js' , 'script2.js' , 'script3.js']
        $data_fotter['scripts'] = ["dashboard.js"];

        //Css Shets
        $data_header['styles'] = ["starlight.css","select2.min.css","jquery.dataTables.css"];

        //Vars

        //Database
        $data_header['title'] = "Dashboard";
        $data_header['description'] = "Main Admin";
        $entity_model=model('App\Models\Model_cotizacion\Cotizacion',false);
        $data['cotizaciones']=$entity_model->find($id);
        $id_vendor=$data['cotizaciones']['id_user_vendor'];
        $id_client=$data['cotizaciones']['id_user_client'];


        $vendor=$entity_model->vendor($id_vendor);
        $data['vendor']=$vendor;



        $data['client']=$entity_model->client($id_client);
        /*Aqui termino el inner join*/

        /*Aqui es para recuperar los datos de los productos*/
        $entity_model_product=model('App\Models\Product',false);
        $data['cat_product']=$entity_model_product->get_products();
        $data['id_cotization']=$id;

        
        $entity_model_cotization_products=model('App\Models\Model_cotization_product\cotization_product',false);
        $data['exist_data']=$entity_model_cotization_products->cotization_x_products($id);


      $array=[];

        foreach ($data['exist_data'] as $key) {
                    
                $precio=$key['price'];
                $porcentaje=$key['percent']/100;
                $porcentaje_total=$porcentaje*$precio;
                
                $final=$precio-$porcentaje_total;
                array_push($array, $final);
                    
         }


                $suma_producto_base=array_sum($array);
                //$data['total_base_producto']=bcdiv($suma_producto_base, '1', 2);
                $data['total_base_producto']=$suma_producto_base;





        /*Aqui termina*/
        echo view('header' , $data_header);
        echo view('left_panel',$data_left);
        echo view('head_panel');
        echo view('Cotizacion_products/Cotizacion_products_view',$data);
        echo view('right_panel');
        echo view('fotter_panel' , $data_fotter);
	}



    public function get_products_json(){
        $id=$_POST['id'];
        $entity_model=model('App\Models\Product',false);
        $data=$entity_model->get_json_data($id);
        echo json_encode($data);
    }

    public function insert(){
         $entity_model=model('App\Models\Model_cotization_product\cotization_product',false);

        $id_cotization=$_POST['id_cotization'];
        $id_product=$_POST['id_product'];
        $price=$_POST['price_product'];
        $percent=$_POST['percent_insert'];
        for($i=0;$i<count($id_product);$i++){
            $data=[
                "id_cat_products"=>$id_product[$i],
                "id_cotization"=>$id_cotization,
                "price"=>$price[$i],
                "percent"=>$percent[$i]
            ];
         $entity_model->insert($data);

        }

        //var_dump($_POST);
        return redirect()->to(base_url().'/cotizaciones');
    }


    public function report_view($id = null){
        var_dump($id);
        // $response = service('response');
        // $response->setHeader('Content-type',' application/pdf');
        //$id=$_POST['id_cot'];
        $output = '/var/www/html/solimaq/public/Cotizaciones/cotizacion'.$id.'.pdf';
        $output2 = '../public/Cotizaciones/cotizacion'.$id.'.pdf';
        $outputWeb = '/Cotizaciones/cotizacion'.$id.'.pdf';
        $name_file='cotizacion'.$id.'.pdf';
        $mpdf = new \Mpdf\Mpdf();
        


        /*$mpdf->WriteHTML($this->body_ficha_tecnica($id));
        $mpdf->AddPage();
        $mpdf->WriteHTML($this->body_ficha_tecnica2());
        $mpdf->AddPage();
        $mpdf->WriteHTML($this->body_ficha_tecnica3());
        $mpdf->AddPage();*/
        $mpdf->WriteHTML($this->body($id));
        $mpdf->Output($output2 ,'F');
        $entity_model_cotization=model('App\Models\Model_cotizacion\Cotizacion',false);
        $entity_model_cotization->insert_name_cotization($id,$name_file);

        return redirect()->to(path_file.$outputWeb);
        //redirect($outputWeb);
        
    }


    public function body($id){
        $entity_model_cotization_products=model('App\Models\Model_cotization_product\cotization_product',false);
         $entity_model=model('App\Models\Model_user\User',false);
        $data['query']=$entity_model_cotization_products->cat_products($id);

  
        $data['client']=$entity_model_cotization_products->cotization($id);
     
        $data['vendor']=$entity_model_cotization_products->cotization_vendor($id);


        /*Termina*/
        //var_dump($data['client'][0]['id_user_client']);
        $id_client=$data['client'][0]['id_user_client'];
        $data['address_client']=$entity_model->get_clients_id($id_client);
        //var_dump($data);
        return view('Cotizacion_products/Pdf',$data);
    }


    public function delete_producto_from_db(){
        $id=$_POST['id'];

        $entity_model=model('App\Models\Model_cotization_product\cotization_product',false);
        $entity_model->where('id', $id)->delete();
        $result = array('msg' =>"Se borro exitosamente", 'code'=>404);
        echo json_encode($result);


    }



    //FICHA TECNICA

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


    public function body_ficha_tecnica($id){
         $entity_model_cotization_products=model('App\Models\Model_cotization_product\cotization_product',false);
         $entity_model=model('App\Models\Model_user\User',false);
        $data['query']=$entity_model_cotization_products->cat_products($id);


        $data['client']=$entity_model_cotization_products->cotization($id);

        //recuperar datos del vendedor
        $data['vendor']=$entity_model_cotization_products->cotization_vendor($id);

        //Recuperar datos del cliente
        $id_client=$data['client'][0]['id_user_client'];
        $data['address_client']=$entity_model->get_clients_id($id_client);

        var_dump($data['vendor']);
        //echo path_file.'/ficha_tecnica/vi_2.png';
        return view('Cotizacion/Cotizacion_ficha_tecnica',$data);
    }

    public function body_ficha_tecnica2(){
        //echo path_file.'/ficha_tecnica/vi_2.png';
        return view('Cotizacion/Cotizacion_ficha_tecnica2');
    }

    public function body_ficha_tecnica3(){
        //echo path_file.'/ficha_tecnica/vi_2.png';
        return view('Cotizacion/Cotizacion_ficha_tecnica3');
    }
}