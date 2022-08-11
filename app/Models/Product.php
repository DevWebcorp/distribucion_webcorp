<?php 


    namespace App\Models;
    use CodeIgniter\Model;

    class Product extends Model{

        protected $table      = 'cat_products';
        protected $primaryKey = 'id';
        protected $useAutoIncrement = true;
        protected $returnType     = 'array';
        protected $useSoftDeletes = true;
        protected $allowedFields = ['id', 'name', 'type', 'model', 'ability', 'description','media_path', 'su_price',
            'delivery_time', 'c_date', 'link_youtube', 'business_id', 'proveedor_id', 'english_name', 'cost_china', 'model_china', 'file_path', 'manufacture_time'];
        protected $deletedField  = 'deleted_at';
    
        /*protected $useTimestamps = false;
        protected $createdField  = 'created_at';
        protected $updatedField  = 'updated_at';
        protected $deletedField  = 'deleted_at';
    
        protected $validationRules    = [];
        protected $validationMessages = [];*/
        protected $skipValidation     = false;
        //protected $deletedField = "c_date";



        public function get_json_data($id){
            $Productos = $this->db->query("SELECT * from cat_products WHERE id='".$id."'");
            return $Productos->getResult();	
        }
        public function get_products(){
            $Productos = $this->db->query("SELECT * FROM cat_products WHERE  deleted_at= '0000-00-00 00:00:00' ");
            return $Productos->getResult();
        }

        public function create_product($datos){
            $table = $this->db->table('cat_products');
            $table->insert($datos);
        }

        public function update_product($data, $id){
            $Product = $this->db->table('cat_products');
            $Product->where('id', $id);
            $Product->update($data);
        }

        public function get_empresas(){
            $db = \Config\Database::connect();
            $builder = $db->table('business');
            $builder->select('business.business_name,business.id');
            $query = $builder->get();
            return $query->getResult();
        }

        public function get_productos(){
            $db = \Config\Database::connect();
            $builder = $db->table('cat_products');
            $builder->select('cat_products.*,business.business_name, proveedor.name_proveedor');
            $builder->join('business', 'business.id = cat_products.business_id');
            $builder->join('proveedor', 'proveedor.id_proveedor = cat_products.proveedor_id');
            $builder->where('cat_products.deleted_at', '0000-00-00 00:00:00');
            $query = $builder->get();
            return $query->getResult();
        }
            
        public function get_proveedor(){       
            $db = \Config\Database::connect();
            $builder = $db->table('proveedor');
            $builder->select('proveedor.id_proveedor, proveedor.name_proveedor');
            $query = $builder->get();
            return $query->getResult();
        }
    }

?>    