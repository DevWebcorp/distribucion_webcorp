<?php

namespace App\Models;

use CodeIgniter\Model;

class Model_Compra extends Model
{
    protected $table      = 'buys_x_proveedor';
    protected $primaryKey = 'id';

    protected $useAutoIncrement = true;

    protected $returnType     = 'array';
    protected $useSoftDeletes = true;

    protected $allowedFields = ['c_date', 'MODEL','SERIAL_NUMBER','CAPACITY','VOLTAGE','COLOR','OTHER','DELIVERY',
        'pro_x_product','price','user_id','bussiness_id', 'before_Payment', 'before_Loading',
        'advancePaymentPrice','priceBeforeLoading', 'name_file'];

    protected $useTimestamps = false;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    protected $validationRules    = [];
    protected $validationMessages = [];
    protected $skipValidation     = false;


    public function get_compra(){
			
        return $this->asArray()
        ->select('buys_x_proveedor.*,business.business_name, proveedor.name_proveedor,cat_products.name')
        ->join('business', 'business.id = buys_x_proveedor.bussiness_id')
        ->join('proveedor_x_products', 'proveedor_x_products.id = buys_x_proveedor.pro_x_product')
        ->join('proveedor', 'proveedor.id_proveedor = proveedor_x_products.id_proveedor')
        ->join('cat_products', 'cat_products.id = proveedor_x_products.id_product')->findAll();
        //->where('buys_x_proveedor.deleted_at','0000-00-00 00:00:00')->find();
    }

    public function get_compras($id){
        	
        return $this->asArray()
        ->select('buys_x_proveedor.*,business.business_name, proveedor.name_proveedor,cat_products.name')
        ->join('business', 'business.id = buys_x_proveedor.bussiness_id')
        ->join('proveedor_x_products', 'proveedor_x_products.id = buys_x_proveedor.pro_x_product')
        ->join('proveedor', 'proveedor.id_proveedor = proveedor_x_products.id_proveedor')
        ->join('cat_products', 'cat_products.id = proveedor_x_products.id_product')
        ->where('buys_x_proveedor.id', $id)->first();
    }

    public function get_pdf_compra($id){
        return $this->asArray()
        ->select('buys_x_proveedor.*,business.business_name, proveedor.name_proveedor, proveedor.phone,proveedor.email,
         proveedor.marca,cat_products.name, cat_products.media_path , users.user_name, proveedor.contact')
        ->join('business', 'business.id = buys_x_proveedor.bussiness_id')
        ->join('proveedor_x_products', 'proveedor_x_products.id = buys_x_proveedor.pro_x_product')
        ->join('proveedor', 'proveedor.id_proveedor = proveedor_x_products.id_proveedor')
        ->join('cat_products', 'cat_products.id = proveedor_x_products.id_product')
        ->join('users', 'users.id = buys_x_proveedor.user_id')
        ->where('buys_x_proveedor.id', $id)->first();
    }



   












}



