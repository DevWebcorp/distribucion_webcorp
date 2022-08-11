<?php

namespace App\Controllers;

class Empresas extends BaseController
{
    public function index()
    {
        helper('menu');
        $session = session();
        //Js Scripts ['script1.js' , 'script2.js' , 'script3.js']
        $data_fotter['scripts'] = ["dashboard.js"];
        //Css Shets
        $data_header['styles'] = ["starlight.css", "solimaq.css","empresas.css"];
        //Vars
        $data_header['title'] = "Empresas";
        $data_header['description'] = "Main Admin";
        $data_left['menu'] = get_menu();

        echo view('header', $data_header);
        echo view('left_panel', $data_left);
        echo view('head_panel');

        echo view('right_panel');
        echo view('fotter_panel', $data_fotter);

        //Variables del modelo

        $model_empresa = model('App\Models\Model_Empresa\Model_Empresa');
        $empresas['listarDatos'] = $model_empresa->listarDatos();

        echo view('Empresas/Empresas_view', $empresas);
    }

    public function crear()
    {
        $request = \Config\Services::request();

        $path = '../public/images/logos/';
        $file = $this->request->getFile('logo');
        $newName = $file->getRandomName();
        $file->move(WRITEPATH . $path, $newName);
        $logo = $file->getName(); 

        //var_dump($file);

       $nombre = $request->getPost('nombre');
        $direccion = $request->getPost('direccion');
        $marca = $request->getPost('marca');
        $razon = $request->getPost('razon');
        $rfc = $request->getPost('rfc');
        $tel = $request->getPost('tel');
        $correo = $request->getPost('correo');

        $data = [
            'business_name' => $nombre,
            'logo' => $logo,
            'address' => $direccion,
            'marca' => $marca,
            'razon_social' => $razon,
            'rfc' => $rfc,
            'tel' => $tel,
            'correo' => $correo
        ];

        $model_empresa = model('App\Models\Model_Empresa\Model_Empresa');
        $model_empresa->insertar($data);

        return redirect()->to(base_url('/empresas')); 
    }

    public function obtenerEmpresa()
    {
        $request = \Config\Services::request();
        $id = $request->getPost('id');
        $model_empresa = model('App\Models\Model_Empresa\Model_Empresa');
        $data = $model_empresa->obtenerDatos($id);
        echo json_encode($data);
    }

    public function editarDatos()
    {
        $request = \Config\Services::request();

        $path = '../../../public/images/logos';
        $file = $this->request->getFile('logo');
        $newName = $file->getRandomName();
        $file->move(WRITEPATH . $path, $newName);
        $logo = $file->getName(); 

        $nombre = $request->getPost('nombre');
        $direccion = $request->getPost('direccion');
        $id = $request->getPost('id');
        $marca = $request->getPost('marca');
        $razon = $request->getPost('razon');
        $rfc = $request->getPost('rfc');
        $tel = $request->getPost('tel');
        $correo = $request->getPost('correo');

        $actualiza_datos = [
            'business_name' => $nombre,
            'logo' =>$logo,
            'address' => $direccion,
            'marca' => $marca,
            'razon_social' => $razon,
            'rfc' => $rfc,
            'tel' => $tel,
            'correo' => $correo

        ];
        $model_empresa = model('App\Models\Model_Empresa\Model_Empresa');
        $model_empresa->actualizar($id, $actualiza_datos);
        return redirect()->to(base_url('/empresas'));
    }

    public function borrar()
    {
        $request = \Config\Services::request();
        $id_empresa = $request->getPost('id_emp');
        $model_empresa = model('App\Models\Model_Empresa\Model_Empresa');
        $model_empresa->eliminar($id_empresa);
        return redirect()->to(base_url('/empresas'));
    }

    
}
