<?php

namespace App\Models;

use CodeIgniter\Model;

class Model_Empresa extends Model{

    public function listarDatos()
    {
        $db = \Config\Database::connect();
        $builder = $db->table('business');
        $builder->select('*');
        $query = $builder->get();
        return $query->getResult();
    }

    public function insertar($data)
    {
        //var_dump($data);

        $db = \Config\Database::connect();
        $builder = $db->table('business');
        $builder->insert($data);

    }

    public function obtenerDatos($id){
        $db = \Config\Database::connect();
        $builder = $db->table('business');
        $builder->select('*');
        $query = $builder->getWhere(['id' => $id]);
        return $query->getResult();
    }

    
    public function actualizar($id, $actualiza_datos){    
        $db = \Config\Database::connect();
        $builder = $db->table('business');
        $builder->set($actualiza_datos);
        $builder->where('id', $id);
        $builder->update();
        //UPDATE business SET $data WHERE id = $id;
    }

    public function eliminar($idempresa){
        //var_dump($id);
        $db = \Config\Database::connect();        
        $builder = $db->table('business');        
        $builder->delete(['id' => $idempresa]);
        //echo ("exito");
        //DELETE FROM business WHERE id = $idempresa;
    }



    public function get_data_product($id){
            $db=\Config\Database::connect();
            $builder = $db->table('cat_products');
            $builder->select('*');
            $builder->where('id',$id);
            $query= $builder->get();
            return $query->getResultArray();
        }

    public function get_empresa_product($id){
            $db=\Config\Database::connect();
            $builder = $db->table('business');
            $builder->select('cat_products.id,cat_products.name');
            $builder->join('cat_products','business.id=cat_products.business_id');
            $builder->where('business.id',$id);
            $builder->where('cat_products.deleted_at', '0000-00-00 00:00:00');
            $query= $builder->get();
            return $query->getResultArray();
        }





}

?>