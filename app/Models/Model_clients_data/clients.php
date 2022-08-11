<?php namespace App\Models;
	
	use CodeIgniter\Model;

	class Clients extends Model {
        
        protected $table="clients_data";
		protected $primaryKey="id";
		protected $returnType="array";
		protected $useSoftDeletes=false;
		protected $allowedFields=['id','name','email','rfc','phone','mobile','adress_country','adress_city','adress_county','adress_street','adress_postal_code','adress_number','id_user'];
		protected $useTimestamps=false;
		protected $validationRules=[];
		protected $validationMessages=[];
		protected $skipValidation=false;
    
    

    public function max(){
    	$db      = \Config\Database::connect();
    	$builder = $db->table('users');
    	$builder->selectMax('id');
    	$query = $builder->get();
    	return $query->getResultArray();

    }
    
    }