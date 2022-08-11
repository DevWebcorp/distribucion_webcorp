<?php namespace App\Models;
	
	use CodeIgniter\Model;

	class Cotization_product extends Model {
        
        protected $table="cotization_x_products";
		protected $primaryKey="id";
		protected $returnType="array";
		protected $useSoftDeletes=false;
		protected $allowedFields=['id','id_cat_products','id_cotization','price','percent','numero_porcent','total_porcent','numero_porcent_res','total_porcent_res'];
		protected $useTimestamps=false;
		protected $validationRules=[];
		protected $validationMessages=[];
		protected $skipValidation=false;
    
    	 

    	public function cotization_x_products($id){
    	$db      = \Config\Database::connect();
        $builder = $db->table('cotization_x_products');
        $builder->select('cotization_x_products.id,cat_products.name,cat_products.description,cat_products.link_youtube,cotization_x_products.price,cotization_x_products.percent');
        $builder->join('cat_products', 'cat_products.id = cotization_x_products.id_cat_products');
        $builder->where('cotization_x_products.id_cotization',$id);
        $query3 = $builder->get();
        return $query3->getResultArray();
    	}


    	public function cat_products($id){
    		      $db      = \Config\Database::connect();
        $builder = $db->table('cotization_x_products');
        $builder->select('*');
        $builder->join('cat_products', 'cat_products.id = cotization_x_products.id_cat_products');
        $builder->where('cotization_x_products.id_cotization',$id);
        $query = $builder->get();
        return $query->getResultArray();
    	}


    	public function cotization($id){
    		 $db      = \Config\Database::connect();
    	$builder3 = $db->table('users');
        $builder3->select('*');
        $builder3->join('cotization', 'cotization.id_user_client = users.id');
        $builder3->where('cotization.id',$id);
        $query3 = $builder3->get();
        return $query3->getResultArray();
    	}


    	public function cotization_vendor($id){
    		 $db      = \Config\Database::connect();
    		/*En esta parte se muestra los datos del usuario que es vendedor*/
        $builder2 = $db->table('users');
        $builder2->select('*');
        $builder2->join('cotization', 'cotization.id_user_vendor = users.id');
        $builder2->where('cotization.id',$id);
        $query2 = $builder2->get();
        return $query2->getResultArray();

    	}
    
    }