<?php namespace App\Models;

	use CodeIgniter\Model;

	class Cotizacion extends Model {

		protected $table="cotization";
		protected $primaryKey="id";
		protected $returnType="array";
		protected $useSoftDeletes=false;
		protected $allowedFields=['id','id_user_vendor','id_user_client','global_percent','c_date',"name_data_contact",
		"email_data_contact",
		"phone_data_contact",
		"movil_data_contact",
        "empresa",
        "tratamiento",
		"calle",
		"interior",
		"exterior",
		"colonia",
		"localidad",
		"estado",
		"municipio",
		"postal",
		"referencia",
		"country"];
		protected $useTimestamps=false;
		protected $validationRules=[];
		protected $validationMessages=[];
		protected $skipValidation=false;




		public function vendor($id_vendor){
			/*Aqui hago el inner join de vendor*/
			$db      = \Config\Database::connect();
			$builder = $db->table('users');
			$builder->select('user_name');
			$builder->join('cotization', 'cotization.id_user_vendor = users.id');
			$query= $builder->getWhere(['cotization.id_user_vendor'=>$id_vendor]);
			$vendor=$query->getResultArray();
			return $vendor[0]['user_name'];

		}


		public function client($id_client){
			/*Aqui hago el inner join de client*/
        $db      = \Config\Database::connect();
        $builder = $db->table('users');
        $builder->select('*');
        $builder->join('cotization', 'cotization.id_user_client = users.id');
        $query= $builder->getWhere(['cotization.id_user_client'=>$id_client]);
        $client=$query->getResultArray();
        return $client[0]['user_name'];
		}


		public function email_username_vendor($id){
			 //echo("hola mundo");
                /*select users.user_name from cotization inner join users on
                cotization.id_user_vendor=users.id where cotization.id=4*/
                $db      = \Config\Database::connect();
                $builder = $db->table('cotization');
                $builder->select('*');
                $builder->join('users', 'cotization.id_user_client = users.id');
                $builder->where('cotization.id',$id);
                $query = $builder->get();
                return $query->getResultArray();
            }

        public function email_products($id){
        	/*select * from cotization_x_products inner join cat_products on
cat_products.id=cotization_x_products.id_cat_products where cotization_x_products.id_cotization=4*/

       	$db      = \Config\Database::connect();
        $builder = $db->table('cotization_x_products');
        $builder->select('*');
        $builder->join('cat_products', 'cat_products.id = cotization_x_products.id_cat_products');
        $builder->where('cotization_x_products.id_cotization',$id);
        $query = $builder->get();
        return $query->getResultArray();
        }



        public function users_cotization(){

        	$db      = \Config\Database::connect();
        	$builder = $db->table('users');
        	$builder->select('cotization.id as id_cotization,users.id,users.user_name,clients_data.id as id_client,clients_data.name,clients_data.mobile,cotization.phone_data_contact,cotization.empresa,clients_data.email,clients_data.email,cotization.c_date, cat_products.model,  cat_products.name AS maquina, cotization_x_products.price');
        	$builder->join('cotization', 'cotization.id_user_vendor = users.id');
            $builder->join('clients_data', 'cotization.id_user_client = clients_data.id_user');
            $builder->join('cotization_x_products', 'cotization.id=cotization_x_products.id_cotization');
            $builder->join('cat_products', 'cat_products.id=cotization_x_products.id_cat_products');
            $builder->where('cotization.show_cotization',0);
            
        	$query= $builder->get();
        	return $query->getResultArray();

        }


        public function users_x_products(){

            $db      = \Config\Database::connect();
            $builder = $db->table('cotization_x_products');
    $builder->select('cotization_x_products.id_cotization,cat_products.name,cotization_x_products.price');
            $builder->join('cat_products', 'cat_products.id=cotization_x_products.id_cat_products');
            /*$builder->join('cotization_x_products', 'cotization.id=cotization_x_products.id_cotization');
            $builder->join('cat_products', 'cat_products.id=cotization_x_products.id_cat_products');*/
            //$builder->where('cotization.show_cotization',0);
            $query= $builder->get();
            return $query->getResultArray();

        }

        public function clients_data_cotization(){
        	//Corresponde con la tabla de los clientes
        	$db      = \Config\Database::connect();
        	$builder = $db->table('clients_data');
        	$builder->select('*');
        	$builder->join('cotization', 'cotization.id_user_client = clients_data.id_user');
            $builder->join('users', 'users.id = clients_data.id_user');
        	$query= $builder->get();
        	return $query->getResultArray();
        }

        public function users_clients_data(){
        	/*Aqui hago el inner join de client este es el select de nueva cotizacion */
        $db      = \Config\Database::connect();
        $builder = $db->table('users');
        $builder->select('*');
        $builder->where('id_group', 2);
        $query= $builder->get();
        return $query->getResultArray();
        }


        public function get_admin_vendor(){
            $db      = \Config\Database::connect();
            $builder = $db->table('users');
            $builder->where('id_group', 1);
            $builder->orWhere('id_group', 3);
            $query= $builder->get();
            return $query->getResultArray();
        }


        public function get_email($id){
            $db      = \Config\Database::connect();
            $builder = $db->table('clients_data');
            $builder->select('*');
            $builder->join('cotization', 'cotization.id_user_client = clients_data.id_user');
            $builder->join('users', 'users.id = clients_data.id_user');
            $builder->where('cotization.id',$id);
            $query= $builder->get();
            return $query->getResultArray();
        }



        public function get_client_exist($id){
            $db      = \Config\Database::connect();
            $builder = $db->table('clients_data');
            $builder->select('*');
            $builder->where('id_user',$id);
            $query= $builder->get();
            return $query->getResultArray();
        }


        public function empresa_x_vendor($id){
            $db      = \Config\Database::connect();
            $builder = $db->table('users');
            $builder->select('*');
            $builder->join('business','business.id=users.business.id');
            $builder->where('users.id_user',$id);
            $query= $builder->get();
            return $query->getResultArray();
        }


        public function insert_name_cotization($id,$name){
            $db      = \Config\Database::connect();
            $builder = $db->table('cotization');
            $builder->set('name_file',$name);
            $builder->where('id', $id);
            $builder->update();
        }

        public function get_empresa_product($id){
            $db=\Config\Database::connect();
            $builder = $db->table('business');
            $builder->select('cat_products.id,cat_products.name');
            $builder->join('business','business.id=cat_products.business_id');
            $builder->where('business.id',$id);
            $query= $builder->get();
            return $query->getResultArray();
        }


        public function max_cotization(){
        $db      = \Config\Database::connect();
        $builder = $db->table('cotization');
        $builder->selectMax('id');
        $query = $builder->get();
        return $query->getResultArray();

    }

    public function get_data_date($inicio,$final,$id_vendor){
         $db=\Config\Database::connect();
            $builder = $db->table('cotization');
            $builder->select('cotization.id,cotization.c_date,users.user_name,cotization_x_products.price,cat_products.name,cotization.empresa,cotization.phone_data_contact,cotization.email_data_contact');
            $builder->join('users','users.id=cotization.id_user_vendor');
            //$builder->join('clients_data','clients_data.id_user=users.id');
            $builder->join('cotization_x_products','cotization_x_products.id_cotization=cotization.id');
            $builder->join('cat_products','cat_products.id=cotization_x_products.id_cat_products');
            $builder->where("cotization.id_user_vendor",$id_vendor);
            $builder->where("cotization.c_date BETWEEN '".$inicio."' AND '".$final."'");
            $query= $builder->get();
            return $query->getResultArray();
    }


    }