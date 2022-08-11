<?php

namespace App\Controllers;

class Products extends BaseController
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

        //Database
        $entity_producto = model('App\Models\Product');
        $productos = $entity_producto->findAll();
       
        $data["get_empresas"] = $entity_producto->get_empresas();
        $data["productos"] = $entity_producto->get_productos();
        $data["get_proveedores"] = $entity_producto->get_proveedor();

        $data_header['title'] = "Productos";
        $data_header['description'] = "Main Admin";
        echo view('header', $data_header);
        echo view('left_panel', $data_left);
        echo view('head_panel');
        echo view('ProductViews/ProductList', $data);
        echo view('right_panel');
        echo view('fotter_panel', $data_fotter);
    }

    public function crearProducto()
    {
        $file = $this->request->getFile('foto');
        $ficha = $this->request->getFile('ficha');
        

        $precio_sugerido = $_POST['currency-field'];
        $precio = str_replace("$", "", $precio_sugerido);
        $precio_real_sugerido = str_replace(",", "", $precio);

        $precio_venta = $_POST['field'];
        $precio2 = str_replace("$", "", $precio_venta);
        $precio_real_venta = str_replace(",", "", $precio2);

        if (!$file->isValid()) {
            $datos = [
                "name" => $_POST['nombre'],
                "type" => $_POST['serie'],
                "model" => $_POST['modelo'],
                "ability" => $_POST['capacidad'],
                "description" => $_POST['descripcion'],
                "english_name" => $_POST['namei'],
                "model_china" => $_POST['modchina'],
                "cost_china" => $precio_real_sugerido,
                "model_china" => $_POST['modelochino'],
                "su_price" => $precio_real_venta,
                "delivery_time" => $_POST['entrega'],
                "manufacture_time" => $_POST['fabricacion'],
                "c_date" => date("Y-m-d h:i:s"),
                "link_youtube" => $_POST['youtube'],
                "proveedor_id" => $_POST['proveedor_producto'],
                "business_id" => $_POST['empresa']
            ];
            $productoModel = model('App\Models\Product');
            $productoModel->create_product($datos);
            return redirect()->to(base_url() . '/products');
        } else {

            $newName = $file->getRandomName();
            $file->move('../public/images', $newName);

            $name = $ficha->getName();
            $ficha->move('../public/FichaTecnica', $name);


            $datos = [
                "name" => $_POST['nombre'],
                "type" => $_POST['serie'],
                "model" => $_POST['modelo'],
                "ability" => $_POST['capacidad'],
                "description" => $_POST['descripcion'],
                "english_name" => $_POST['namei'],
                "media_path" => $newName,
                "cost_china" => $precio_real_sugerido,
                "model_china" => $_POST['modelochino'],
                "file_path" => $name,
                "su_price" => $precio_real_venta,
                "delivery_time" => $_POST['entrega'],
                "manufacture_time" => $_POST['fabricacion'],
                "c_date" => date("Y-m-d h:i:s"),
                "link_youtube" => $_POST['youtube'],
                "proveedor_id" => $_POST['proveedor_producto'],
                "business_id" => $_POST['empresa']
            ];

            $productoModel = model('App\Models\Product');
            $productoModel->create_product($datos);
            return redirect()->to(base_url() . '/products');
        }
    }

    public function actualizarProducto()
    {
        $request = \Config\Services::request();
        $id = $request->getPost('idproducto');


        $file = $this->request->getFile('foto');
        $ficha = $this->request->getFile('ficha');

        $precio_sugerido = $_POST['update_precio_real_sugerido'];
        $precio = str_replace("$", "", $precio_sugerido);
        $precio_real_sugerido = str_replace(",", "", $precio);

        $precio_venta = $_POST['update_precio_real_venta'];
        $precio2 = str_replace("$", "", $precio_venta);
        $precio_real_venta = str_replace(",", "", $precio2);

        $validar = $file->isValid();
        $validar_Ficha = $ficha->isValid();

        if ($validar == true) {
            $filename = '../public/Images/' . $request->getPost('nameimg');
            if (file_exists($filename)) {
                $success = unlink($filename);
                echo ("Foto borrada");

                if (!$success) {
                    echo ("Error al borrar el archivo");
                }
            }
        }

        if ($validar_Ficha == true) {
            $filename = '../public/Images/' . $request->getPost('fichatecnica');
            if (file_exists($filename)) {
                $success = unlink($filename);
                echo ("Foto borrada");
                if (!$success) {
                    echo ("Error al borrar el archivo");
                }
            }
        }

        if (!$file->isValid() && !$ficha->isValid()) {
            $data = [
                "name" => $_POST['update_nombre'],
                "type" => $_POST['update_serie'],
                "model" => $_POST['update_modelo'],
                "ability" => $_POST['update_capacidad'],
                "description" => $_POST['update_descripcion'],
                "english_name" => $_POST['update_namei'],
                "cost_china" => $precio_real_sugerido,
                "model_china" => $_POST['update_modelo_china'],
                "su_price" => $precio_real_venta,
                "delivery_time" => $_POST['update_entrega'],
                "manufacture_time" => $_POST['update_fabricacion'],
                "c_date" => date("Y-m-d h:i:s"),
                "link_youtube" => $_POST['update_youtube'],
                "proveedor_id" => $_POST['proveedor_producto'],
                "business_id" => $_POST['empresa']
            ];


            $productoModel = model('App\Models\Product');
            $productoModel->update($id, $data);
            return redirect()->to(base_url() . '/products');
        } else if ($file->isValid() && !$ficha->isValid()) {

            $newName = $file->getRandomName();
            $file->move('../public/images', $newName);

            $data = [
                "name" => $_POST['update_nombre'],
                "type" => $_POST['update_serie'],
                "model" => $_POST['update_modelo'],
                "ability" => $_POST['update_capacidad'],
                "description" => $_POST['update_descripcion'],
                "english_name" => $_POST['update_namei'],
                "media_path" => $newName,
                "cost_china" => $precio_real_sugerido,
                "model_china" => $_POST['update_modelo_china'],
                "su_price" => $precio_real_venta,
                "delivery_time" => $_POST['update_entrega'],
                "manufacture_time" => $_POST['update_fabricacion'],
                "c_date" => date("Y-m-d h:i:s"),
                "link_youtube" => $_POST['update_youtube'],
                "proveedor_id" => $_POST['proveedor_producto'],
                "business_id" => $_POST['empresa']
            ];
            $productoModel = model('App\Models\Product');
            $productoModel->update_product($data, $id);
            return redirect()->to(base_url() . '/products');
        } else if (!$file->isValid() && $ficha->isValid()) {


            $name = $ficha->getRandomName();
            $ficha->move('../public/FichaTecnica', $name);

            $data = [
                "name" => $_POST['update_nombre'],
                "type" => $_POST['update_serie'],
                "model" => $_POST['update_modelo'],
                "ability" => $_POST['update_capacidad'],
                "description" => $_POST['update_descripcion'],
                "english_name" => $_POST['update_namei'],
                "cost_china" => $precio_real_sugerido,
                "model_china" => $_POST['update_modelo_china'],
                "file_path" => $name,
                "su_price" => $precio_real_venta,
                "delivery_time" => $_POST['update_entrega'],
                "manufacture_time" => $_POST['update_fabricacion'],
                "c_date" => date("Y-m-d h:i:s"),
                "link_youtube" => $_POST['update_youtube'],
                "proveedor_id" => $_POST['proveedor_producto'],
                "business_id" => $_POST['empresa']
            ];
            $productoModel = model('App\Models\Product');
            $productoModel->update_product($data, $id);
            return redirect()->to(base_url() . '/products');
        } else if ($file->isValid() && $ficha->isValid()) {
            $newName = $file->getRandomName();
            $file->move('../public/images', $newName);

            $name = $ficha->getRandomName();
            $ficha->move('../public/FichaTecnica', $name);

            $data = [
                "name" => $_POST['update_nombre'],
                "type" => $_POST['update_serie'],
                "model" => $_POST['update_modelo'],
                "ability" => $_POST['update_capacidad'],
                "description" => $_POST['update_descripcion'],
                "english_name" => $_POST['update_namei'],
                "media_path" => $newName,
                "cost_china" => $precio_real_sugerido,
                "model_china" => $_POST['update_modelo_china'],
                "file_path" => $name,
                "su_price" => $precio_real_venta,
                "delivery_time" => $_POST['update_entrega'],
                "manufacture_time" => $_POST['update_fabricacion'],
                "c_date" => date("Y-m-d h:i:s"),
                "link_youtube" => $_POST['update_youtube'],
                "proveedor_id" => $_POST['proveedor_producto'],
                "business_id" => $_POST['empresa']
            ];
            $productoModel = model('App\Models\Product');
            $productoModel->update_product($data, $id);
            return redirect()->to(base_url() . '/products');
        }
    }

    public function delete_product()
    {
        $id = $_POST['id_delete'];
        $productoModel = model('App\Models\Product');
        $productoModel->delete($id);
        /*$productoModel->delete_product($id);*/
        return redirect()->to(base_url() . '/products');
    }

    public function get_data()
    {
        $id = $_POST['id'];
        $productoModel = model('App\Models\Product');
        $data = $productoModel->get_json_data($id);
        echo json_encode($data);
    }
}
