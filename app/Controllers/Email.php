<?php

namespace App\Controllers;


class Email extends BaseController
{
	public function index($id){
        //echo("hola mundo");
                /*select users.user_name from cotization inner join users on
cotization.id_user_vendor=users.id where cotization.id=4*/
        $db      = \Config\Database::connect();
        $builder = $db->table('cotization');
        $builder->select('users.user_name');
        $builder->join('users', 'cotization.id_user_vendor = users.id');
        $builder->where('cotization.id',$id);
        $query = $builder->get();
        $data['query']=$query->getResultArray();

/*select * from cotization_x_products inner join cat_products on
cat_products.id=cotization_x_products.id_cat_products where cotization_x_products.id_cotization=4*/

        $db      = \Config\Database::connect();
        $builder = $db->table('cotization_x_products');
        $builder->select('*');
        $builder->join('cat_products', 'cat_products.id = cotization_x_products.id_cat_products');
        $builder->where('cotization_x_products.id_cotization',$id);
        $query = $builder->get();
        $data['products']=$query->getResultArray();


       // var_dump($data['query'][0]['user_name']);
      // var_dump($data['products'][0]['name']);


        $correo_envio ="sergiofloresgonzalez1@gmail.com";
        $file = array("./../public/Cotizaciones/cotizacion".$id.".pdf");

        //$file="";

        $mensaje = "Estimado ".$data['query'][0]['user_name'].":
        Se han generado las cotizaciones adjuntas de acuerdo a su solicitud:
        ".$data['products'][0]['name']." [Link de youtube]
        He sido asignado como su vendedor, y estaré a sus órdenes por este medio o por
        whatsapp [Link de whatsapp del vendedor] para mayores detalles o consultas que tenga.
        Un cordial saludo
        [Firma del correo";
        $asunto = "Solimaq Prueba";

        //Esta es la funcion Global
        send_email($correo_envio,$asunto,$mensaje,$file);

        echo "Correo enviado exitosamente";



	}


        /*public function index($id){
        //echo("hola mundo");

        $correo_envio ="sergiofloresgonzalez1@gmail.com";
        $file = array("./../public/Cotizaciones/cotizacion".$id.".pdf",
        "./../assets/img/img2.jpg","./../assets/img/gengar.png",
        "./../assets/img/img3.jpg");

        //$file="";

        $mensaje = "Soliq entrega";
        $asunto = "Solimaq Prueba";

        //Esta es la funcion Global
        send_email($correo_envio,$asunto,$mensaje,$file);








        }*/
}






