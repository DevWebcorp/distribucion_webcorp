<?php

namespace App\Controllers;

class Facturas extends BaseController
{
    public function index()
    {
        helper('menu');
            $session = session();
            //Js Scripts ['script1.js' , 'script2.js' , 'script3.js']
            $data_fotter['scripts'] = ["facturas.js"];
            $data_fotter['external_scripts'] = ["//cdn.jsdelivr.net/npm/sweetalert2@11"];
            
            //Css Shets
            $data_header['styles'] = ["starlight.css", "solimaq.css"];
            //Vars
            $data_header['title'] = "Facturas";
            $data_header['description'] = "Alta de proveedor";
            $data_left['menu'] = get_menu();

            echo view('header_provedor', $data_header);
            echo view('left_panel_provedor', $data_left);
            echo view('head_panel');
          
            echo view('right_panel');
            echo view('fotter_panel', $data_fotter);
            echo view('Facturas/Facturas_view');
       
    }

    public function upload_xml()
    {
        $session = session();
        $file = $this->request->getFile('file_xml');
        $file_pdf = $this->request->getFile('file_pdf');

        $xml = simplexml_load_file($file);
        $ns = $xml->getNamespaces(true);
        $xml->registerXPathNamespace('c', $ns['cfdi']);
        $xml->registerXPathNamespace('t', $ns['tfd']);


        foreach ($xml->xpath('//cfdi:Comprobante//cfdi:Emisor') as $Emisor){ 
            $nombre_emisor = $Emisor['Nombre'];
        }

        foreach ($xml->xpath('//cfdi:Comprobante//cfdi:Receptor') as $Receptor){ 
            $nombre_receptor = $Receptor['Nombre'];
        
         } 

         foreach ($xml->xpath('//cfdi:Comprobante//cfdi:Concepto') as $Concepto){ 
            $des = $Concepto['Descripcion'];
            $importe = $Concepto['Importe'];
        
         } 

         foreach ($xml->xpath('//cfdi:Comprobante//cfdi:Impuestos//cfdi:Traslados//cfdi:Traslado') as $Traslado){  
            $IVA = $Traslado['TasaOCuota'];
           
        
         }
         
         
       
        
         foreach ($xml->xpath('//cfdi:Comprobante') as $cfdiComprobante){ 
            $total = $cfdiComprobante['Total']; 
      } 

      $model = model('App\Models\Model_Facturas\Facturas');

      $newName = $file->getRandomName();
      $file->move('../public/images', $newName);

      $name = $file_pdf->getRandomName();
      $file_pdf->move('../public/images', $name);

      $data = [
        'id_user' => $session->get('unique'),
        'factura_pdf' => $name,
        'factura_xml' => $newName,
        'fecha_upload' => date("Y-m-d"),
        'origen' => $nombre_emisor,
        'destino' =>$nombre_receptor,
        'concepto' =>$des,
        'importe' =>$importe,
        "iva" => $IVA,
        "total" => $total,
    ];

        $model->insert($data);

        $response = [
            'status'   => 200,
            'error'    => null,
            'messages' => [
                'success' => 'Guardado con exito'
            ]
          ];
          return json_encode($response);

    
    }

    public function get_data(){
        $session = session();
        $id = $session->get('unique');
        $model = model('App\Models\Model_Facturas\Facturas');
        $data['data'] = $model->get_facturas($id);

        return json_encode($data);

    }

    public function get_data_admin(){
        $session = session();
        //$id = $session->get('unique');
        $model = model('App\Models\Model_Facturas\Facturas');
        $data['data'] = $model->get_fact();

        return json_encode($data);

    }

    public function pagadas(){
        helper('menu');
            $session = session();
            //Js Scripts ['script1.js' , 'script2.js' , 'script3.js']
           // $data_fotter['scripts'] = ["facturas_pagadas.js"];
            $data_fotter['external_scripts'] = ["//cdn.jsdelivr.net/npm/sweetalert2@11"];
            
            //Css Shets
            $data_header['styles'] = ["starlight.css", "solimaq.css"];
            //Vars
            $data_header['title'] = "Facturas";
            $data_header['description'] = "Alta de proveedor";
            $data_left['menu'] = get_menu();

            echo view('header_provedor', $data_header);
            echo view('left_panel_provedor', $data_left);
            echo view('head_panel');
          
            echo view('right_panel');
            echo view('fotter_panel', $data_fotter);
            echo view('Facturas/Facturas_pagadas');
    }

    public function get_pagadas(){
        $session = session();
        $id = $session->get('unique');
        $model = model('App\Models\Model_Facturas\Facturas');
        $data['data'] = $model->get_facturas_pagadas($id);

        return json_encode($data);

    }

    public function por_pagar(){
        helper('menu');
        $session = session();
        //Js Scripts ['script1.js' , 'script2.js' , 'script3.js']
       // $data_fotter['scripts'] = ["facturas_pagadas.js"];
        $data_fotter['external_scripts'] = ["//cdn.jsdelivr.net/npm/sweetalert2@11"];
        
        //Css Shets
        $data_header['styles'] = ["starlight.css", "solimaq.css"];
        //Vars
        $data_header['title'] = "Facturas";
        $data_header['description'] = "Alta de proveedor";
        $data_left['menu'] = get_menu();

        echo view('header_provedor', $data_header);
        echo view('left_panel_provedor', $data_left);
        echo view('head_panel');
      
        echo view('right_panel');
        echo view('fotter_panel', $data_fotter);
        echo view('Facturas/Facturas_por_pagar');

    }

    public function get_por_pagar(){
        $session = session();
        $id = $session->get('unique');
        $model = model('App\Models\Model_Facturas\Facturas');
        $data['data'] = $model->get_pagar($id);
        return json_encode($data);

    }
    
    public function listado()
    {
        helper('menu');
        $session = session();
        //Js Scripts ['script1.js' , 'script2.js' , 'script3.js']
        $data_fotter['scripts'] = ["facturas.js"];
        $data_fotter['external_scripts'] = ["//cdn.jsdelivr.net/npm/sweetalert2@11"];
        //Css Shets
        $data_header['styles'] = ["starlight.css", "solimaq.css"];
        //Vars
        $data_header['title'] = "Facturas";
        $data_header['description'] = "Listado de facturas";
        $data_left['menu'] = get_menu();

        echo view('header', $data_header);
        echo view('left_panel', $data_left);
        echo view('head_panel');

        echo view('right_panel');
        echo view('fotter_panel', $data_fotter);

        //Variables del modelo

        echo view('Facturas/Listado_view');
    }

    public function fecha_pago(){
        $request = \Config\Services::request();

        $fecha = $_POST;
        $fecha_pago = $_POST["fecha-pago"];
        $id = $_POST["idfactura"];
        $model = model('App\Models\Model_Facturas\Facturas');
        //var_dump($id);
        $data = [
            'fecha_pago' => $fecha_pago 
        ];

        $model->fecha_pago($id, $data);

        $response = [
            'status'   => 200,
            'error'    => null,
            'messages' => [
                'success' => 'Guardado con exito'
            ]
          ];
          return redirect()->to(base_url('/Facturas/listado'));  



    }

    public function estado() {
        $request = \Config\Services::request();
        $estado = $_POST["estado"];
        $id = $_POST["idestado"];
        $model = model('App\Models\Model_Facturas\Facturas');

        $data = [
            'status' => $estado 
        ];

        $model->estado($id, $data);
    //var_dump($_POST);
        $response = [
            'status'   => 200,
            'error'    => null,
            'messages' => [
                'success' => 'Guardado con exito'
            ]
        ];
        //return json_encode($response); 
        return redirect()->to(base_url('/Facturas/listado'));


       

    }


}
