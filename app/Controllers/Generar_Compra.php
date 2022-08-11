<?php

namespace App\Controllers;
require_once __DIR__ . '/vendor/autoload.php';

class Generar_Compra extends BaseController
{

    public function index()
    {
        helper('menu');
        $session = session();
        $validar = $session->get('token');
        if($validar !=null){
            $data_left['menu'] = get_menu();
            $data_fotter['scripts'] = ["dashboard.js"];
            $data_header['styles'] = ["starlight.css", "solimaq.css"];
            $data_header['title'] = "Generar compra";
            $data_header['description'] = "Main Admin";
            $compra_model = model('App\Models\Model_Compra\Model_Compra', false);
            $data['compra'] = $compra_model->get_compra();

            echo view('header', $data_header);
            echo view('left_panel', $data_left);
            echo view('head_panel');
            echo view('Generar_Compra/Generar_Compra_view',$data);
            echo view('right_panel');
            echo view('fotter_panel', $data_fotter);

        }else{
            return redirect()->to(base_url());
        }

    }

    public function insert_compra(){
        $session = session();
        $token = $session->get('token');
        $user_model = model('App\Models\session\users', false);
        $compra_model = model('App\Models\Model_Compra\Model_Compra', false);
        $id = $user_model->select('id')->where('activation_token' ,$token)->find();
        $request = \Config\Services::request();

        $precio = str_replace ("$" , "" , $request->getPost('currency-field'));
        $precio_real = str_replace ("," , "" , $precio);

        $id_proveedor = $request->getPost('prov');
        $id_maquina = $request->getPost('maquina');
        $model_proveedores = model('App\Models\Model_proveedor\Model_proveedor');
        $id_pxpro = $model_proveedores->get_idpxp($id_proveedor, $id_maquina);

        //var_dump($id_pxpro);

        $compra = [
            'c_date' => $request->getPost('fecha'),
            'MODEL'    => $request->getPost('model'),
            'SERIAL_NUMBER'    => $request->getPost('serial'),
            'CAPACITY'    => $request->getPost('capacity'),
            'VOLTAGE'    => $request->getPost('voltage'),
            'COLOR'    => $request->getPost('color'),
            'OTHER'    => $request->getPost('other'),
            'DELIVERY'    => $request->getPost('delivery'),
            'price'    => $precio_real,
            'pro_x_product'    => $id_pxpro[0]->id,
            'user_id'    => $id[0]['id'],
            'bussiness_id'    => $request->getPost('company'),
            'before_Payment'  => $request->getPost('advancePayment'),
            'advancePaymentPrice'  => $request->getPost('advancePaymentPrice'),
            'before_Loading' => $request->getPost('beforeLoading'),
            'priceBeforeLoading' => $request->getPost('priceBeforeLoading')
        ];

       
        $compra_model->insert($compra);
        return redirect()->to(base_url('/Generar_Compra'));
    }

    public function delete_compra(){
        $compra_model = model('App\Models\Model_Compra\Model_Compra', false);
        $request = \Config\Services::request();
        $id_buy =  $request->getPost('id');
        $compra_model->delete($id_buy);
        return redirect()->to(base_url('/Generar_Compra'));



    }

    public function get_compra(){
        $compra_model = model('App\Models\Model_Compra\Model_Compra', false);
        $request = \Config\Services::request();
        $id = $request->getPost('id');
        $generar_compra = $compra_model->get_compras($id);
        echo json_encode($generar_compra);
    }

    public function update_compra(){
        $compra_model = model('App\Models\Model_Compra\Model_Compra', false);
        $request = \Config\Services::request();
        $precio = $request->getPost('currency-field');
        $precio_real = str_replace ("," , "" , $precio);
        $id = $request->getPost('idpxp');


        $data = [
            'c_date' => $request->getPost('fecha'),
            'MODEL'    => $request->getPost('model'),
            'SERIAL_NUMBER'    => $request->getPost('serial'),
            'CAPACITY'    => $request->getPost('capacity'),
            'VOLTAGE'    => $request->getPost('voltage'),
            'COLOR'    => $request->getPost('color'),
            'OTHER'    => $request->getPost('other'),
            'DELIVERY'    => $request->getPost('delivery'),
            'price'    => $precio_real,
            'before_Payment'  => $request->getPost('advancePayment'),
            'advancePaymentPrice'  => $request->getPost('advancePaymentPrice'),
            'before_Loading' => $request->getPost('beforeLoading'),
            'priceBeforeLoading' => $request->getPost('priceBeforeLoading')
        ];

        $compra_model->update($id, $data);
        return redirect()->to(base_url('/Generar_Compra'));

    }

    public function compra_pdf($id =1){

        $compra_model = model('App\Models\Model_Compra\Model_Compra', false);
        $data['data'] = $compra_model->get_pdf_compra($id);


        $output = '/var/www/html/solimaq/public/Compras/compra'.$id.'.pdf';
        $output2 = '../public/Compras/compra'.$id.'.pdf';
        $outputWeb = '/Compras/compra'.$id.'.pdf';
        $name_file='compra'.$id.'.pdf';

        $response = service('response');
        $response->setHeader('Content-type',' application/pdf');
        $mpdf = new \Mpdf\Mpdf();
        $mpdf->WriteHTML($this->body($data));
        $mpdf->AddPage();
        $mpdf->Output($output2,'F');

        $data = ['name_file' => $name_file];
        var_dump($data);

        $compra_model->update($id, $data);

        return redirect()->to(path_file.$outputWeb);

    }


    //Mandar pdf a los de email
    public function email()
    {
        $id = $_POST['id_email'];
        $correo = $_POST['name_correo'];

        $entity_model = model('App\Models\Model_Compra\Model_Compra', false);
        $data['query'] = $entity_model->get_pdf_compra($id);
        $file = array("../public/Compras/compra" . $id . ".pdf");


        $mensaje = "Estimado " . $data['query']['user_name'] . ":
        Se ha generado la orden de compra adjunta de acuerdo a su solicitud:";

        $mensaje .= " Producto: '" . $data['query']['MODEL'] . "' .Número de serie '" . $data['query']['SERIAL_NUMBER'] . "'";

        $mensaje .= "
        Un cordial saludo";

        $asunto = "Solimaq";


        //Esta es la funcion Global para el envío del pdf por correo
        $data = send_email($correo, $asunto, $mensaje, $file);
        if ($data == 0) {
            return redirect()->to(base_url() . '/Generar_Compra');
        } else {
            helper('menu');
            $session = session();
            $validar = $session->get('token');
            if ($validar != null) {
                $data_left['menu'] = get_menu();
                $data_fotter['scripts'] = ["dashboard.js"];
                $data_header['styles'] = ["starlight.css"];
                $data_header['title'] = "Dashboard";
                $data_header['description'] = "Main Admin";
                $compra_model = model('App\Models\Model_Compra\Model_Compra', false);
                $data['compra'] = $compra_model->get_compra();

                echo view('header', $data_header);
                echo view('left_panel', $data_left);
                echo view('head_panel');
                echo view('Generar_Compra/Generar_Compra_view', $data);
                echo view('right_panel');
                echo view('fotter_panel', $data_fotter);
            }
        }
    }

    public function body($data){
        return view('Generar_Compra/Compra_pdf',$data);
    }

    public function get_email_json(){
        $id=$_POST['id'];
        $entity_model = model('App\Models\Model_Compra\Model_Compra', false);
        $data = $entity_model->get_pdf_compra($id);
        echo json_encode($data);
    }



}