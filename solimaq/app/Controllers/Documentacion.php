<?php

namespace App\Controllers;

    use App\Models\Access;

    class Documentacion extends BaseController
    {
        
       /* public function index()
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

            //Datos files 

            $model_documentacion = model('App\Models\Model_Document\Model_Documentacion');
            $data['get_type_file'] = $model_documentacion->select_type_document();
            $data['select_documents'] = $model_documentacion->select_documents();

            //var_dump($data);

            echo view('header' , $data_header);
            echo view('left_panel' , $data_left);
            echo view('head_panel');
            echo view('Document/Documentacion_view', $data);
            echo view('right_panel');
            echo view('fotter_panel' , $data_fotter);
        }*/

        public function agregar_archivos(){

            $request = \Config\Services::request();
            $type_file = $request->getPost('type');
            $id = $request->getPost('id_bussines');

            $files = $this->request->getFiles();
            $dir = "Files";
            $path = uploads_file($files, $dir);

            $model_documentacion = model('App\Models\Model_Document\Model_Documentacion');
            $model_documentacion->insert_documentacion($type_file,$path,$id);
            return redirect()->to(base_url('/Empresas'));
           
           

        }

        public function doc_empresa(){
            $request = \Config\Services::request();
            $id = $request->getPost('id_empresa');

            helper('menu');
            $session = session();
            //Js Scripts ['script1.js' , 'script2.js' , 'script3.js']
            $data_fotter['scripts'] = ["dashboard.js" ,"notificacion.js"];
            //Css Shets
            $data_header['styles'] = ["starlight.css", "solimaq.css"];
            //Vars
            $data_header['title'] = "Documentación";
            $data_header['description'] = "Main Admin";
            $data_left['menu'] = get_menu();

            //Datos files 

            //var_dump($id);

            $model_documentacion = model('App\Models\Model_Document\Model_Documentacion');
            $data['get_type_file'] = $model_documentacion->select_type_document();
            $data['select_documents'] = $model_documentacion->select_documents($id);
            $data['dataempresa'] = $model_documentacion->dataempresa($id);

           //var_dump($data);

            echo view('header' , $data_header);
            echo view('left_panel' , $data_left);
            echo view('head_panel');
            echo view('Document/Documents_Empresa', $data);
            echo view('right_panel');
            echo view('fotter_panel' , $data_fotter);

        }

        public function delete_doc(){
            $model_documentacion = model('App\Models\Model_Document\Model_Documentacion');
            $request = \Config\Services::request();
            $id = $request->getPost('id');

            $filename = $model_documentacion->get_fle($id);
            $name = $filename[0]->name_file;

           // var_dump($name);

            //$filename = '../public/Images/'.$request->getPost('nameimg');
            if (file_exists($name)) {
                $success = unlink($name);
                $mensaje ="Foto borrada"; 

                if (!$success) {
                    $mensaje ="Error al borrar el archivo"; 
                }
            }

          
            $model_documentacion->delete_file($id);
            return redirect()->to(base_url('/Empresas'));

            






        }
    }
