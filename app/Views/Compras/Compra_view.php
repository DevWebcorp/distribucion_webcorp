
<link href="../../assets/lib/datatables/jquery.dataTables.css" rel="stylesheet">
<link href="../../assets/lib/select2/css/select2.min.css" rel="stylesheet">
<script src="../../assets/lib/jquery/jquery.js"></script>
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/css/all.min.css" rel="stylesheet"/>



<div class="sl-mainpanel prueba" >
  
  <!--<nav class="breadcrumb sl-breadcrumb">
    <span class="breadcrumb-item active">Compras</span>
    
  </nav>-->



  <div class="sl-pagebody">

  <div class="sidebar-social">
        <ul>
            <li>
                <a href="<?= base_url();?>/carrito" class="cart" title="Carrito de compras"  rel="nofollow"><i class="fas fa-shopping-cart"></i><span>Carrito</span>
                    <span id="cart_menu_num" data-action="cart-can" class="badge rounded-circle">0</span>
                </a>
            </li>
        </ul>
    </div>


    <div class="sl-page-title">
      <h5 class="prueba">Compras</h5>

     
    </div><!-- sl-page-title -->

   

    
    <div class="container-fluid d-flex justify-content-center">
      <div id="productos" class="row mt-5">
        <?php 
              /*foreach($products_x_proveddor as $productos){
                //var_dump($productos);
                echo('<div class="col-sm-4">
                        <div class="card"> <img src="../images/'.$productos->media_path.'" class="card-img-top" width="100%">
                          <div class="card-body pt-0 px-0">
                            <div class="d-flex flex-row justify-content-between mb-0 px-3"> <span class="text-muted mt-1">Precio</span>
                                <h6>'.$productos->name.'</h6>
                              </div>
                              <hr class="mt-2 mx-3">
                              <div class="d-flex flex-row justify-content-between mb-0 px-3"> <span class="text-muted mt-1">Precio</span>
                                  <h6>&dollar;'.$productos->supplier_price.'</h6>
                              </div>
                              <hr class="mt-2 mx-3">
                              <div class="d-flex flex-row justify-content-between px-3 pb-4">
                                  <div class="d-flex flex-column"><span class="text-muted">capacidad</span></div>
                                  <div class="d-flex flex-column">
                                      <h5 class="mb-0">'.$productos->ability.'</h5>
                                  </div>
                              </div>
                              <div class="d-flex flex-row justify-content-between p-3 mid">
                                  <div class="d-flex flex-column"><small class="text-muted mb-1">ENGINE</small>
                                      <div class="d-flex flex-row"><img src="https://imgur.com/iPtsG7I.png" width="35px" height="25px">
                                          <div class="d-flex flex-column ml-1"><small class="ghj">1.4L MultiAir</small><small class="ghj">16V I-4 Turbo</small></div>
                                      </div>
                                  </div>
                                  <div class="d-flex flex-column"><small class="text-muted mb-2">HORSEPOWER</small>
                                      <div class="d-flex flex-row"><img src="https://imgur.com/J11mEBq.png">
                                          <h6 class="ml-1">135 hp&ast;</h6>
                                      </div>
                                  </div>
                              </div> <small class="text-muted key pl-3">Standard key Features</small>
                              <div class="mx-3 mt-3 mb-2"><button type="button" class="btn btn-success btn-block"><small>Agregar</small></button></div> <small class="d-flex justify-content-center text-muted">*Legal Disclaimer</small>
                          </div>
                        </div>
                      </div>');

              }*/
        ?>
      </div>
    </div>


    
    

  </div><!-- sl-pagebody -->
  
</div><!-- sl-mainpanel -->

<script src="../../assets/lib/datatables/jquery.dataTables.js"></script>
<script src="../../assets/lib/datatables-responsive/dataTables.responsive.js"></script>
<script src="../../assets/lib/select2/js/select2.min.js"></script>


<script>

  $(document).ready(function () {  
      //alert("dentro de la funcion");
    const ruta = "<?= base_url(); ?>/rescompra";                                                                                                                               
      $.ajax({  
          type: "GET",  
          url: ruta,    
          dataType: "json", 
          success: function (data) {
            const producto = data['products_x_proveddor'];
        
            console.log(producto);
            //const contenedorpro = document.getElementById('productos');
            let html = '';
            
              for (var i = 0; i < producto.length; i++) {
                html += '<div class="col-sm-4">'+
                            '<div class="card">'+ 
                                '<img src="../images/'+producto[i].media_path+'" class="card-img-top" width="100%">'+
                                '<div class="card-body pt-0 px-0">'+
                                    '<div class="d-flex flex-row justify-content-between mb-0 px-3">'+
                                        '<span class="text-muted mt-1">'+'Producto'+'</span>'+
                                            '<h6>'+producto[i].name+'</h6>'+
                                    '</div>'+
                                    '<hr class="mt-2 mx-3">'+
                                    '<div class="d-flex flex-row justify-content-between mb-0 px-3">'+ '<span class="text-muted mt-1">'+'Precio'+'</span>'+
                                        '<h6>'+'&dollar;'+producto[i].supplier_price+'</h6>'+
                                    '</div>'+
                                    '<hr class="mt-2 mx-3">'+
                                    '<div class="d-flex flex-row justify-content-between px-3 pb-4">'+
                                        '<div class="d-flex flex-column">'+
                                        '<span class="text-muted mt-1">'+'Vendido por'+'</span>'+
                                            '<h6>'+producto[i].business_name+'</h6>'+
                                        '</div>'+
                                        '<div class="mx-3 mt-3 mb-2">'+
                                            '<button type="button" onclick="AgregarProducto('+producto[i].id+","+producto[i].supplier_price+')" class="btn btn-success btn-block">'+
                                            '<small>'+'Agregar'+'<i class="fa fa-cart-plus" aria-hidden="true"></i>'+'</small>'+'</button>'+
                                        '</div>'+    
                                    '</div>'+
                                '</div>'+
                            '</div>'+   
                        '</div>';
              }

              $('#productos').html(html);

          }, //End of AJAX Success function  
      }); 

      const carrito = "<?= base_url(); ?>/rescompra/get_productosclient";

      $.ajax({
            
        url : carrito,
        method : 'GET', 
        dataType : 'json',
        success : function(procart){
        console.log(procart)
                
           
        },
        error: function(error){
                alert('hubo un error al enviar los datos');
        }
    });




  }); 


   //Agregar Productos
   var numproduct = 0;
   function AgregarProducto(idproducto, precio) {
    

        const ruta = "<?= base_url(); ?>/rescompra/agregar_carrito";

        data = {
        idproducto: idproducto,
        precio : precio

        }

        var carritojson = JSON.stringify(data);

        $.ajax({
            
            url : ruta,
            data : carritojson, 
            method : 'post', //en este caso
            dataType : 'json',
            success : function(response){
                if(response.status ===200){
                    let html2 = '';
                     numproduct = numproduct + 1;

                    html2 += '<div class="alert alert-success" role="alert">'+
                        '<button type="button" class="close" data-dismiss="alert" aria-label="Close">'+
                            '<span aria-hidden="true">'+'&times;'+'</span>'+
                        '</button>'+
                        '<strong class="d-block d-sm-inline-block-force">'+response['messages'].success;+'</strong>'+ 
                    '</div>';

                    $('#mensaje').html(html2);
                    $('#cart_menu_num').html(numproduct);
                    //document.getElementById("demo").textContent = a;


                }else{
                    alert("hubo un erro al agregar el articulo intentelo mas tarde");

                }
           
            },
            error: function(error){
                alert('hubo un error al enviar los datos');
            }
        });
    }


</script>


<style>
@import url('https://fonts.googleapis.com/css2?family=Roboto:wght@500&display=swap');

body {
    background: #F5F1EE;
    font-family: 'Roboto', sans-serif
}

.card {
    width: 250px;
    border-radius: 10px;
    margin-bottom: 10px;
}

.card-img-top {
    border-top-right-radius: 10px;
    border-top-left-radius: 10px
}

span.text-muted {
    font-size: 12px
}

small.text-muted {
    font-size: 8px
}

h5.mb-0 {
    font-size: 1rem
}

small.ghj {
    font-size: 9px
}

.mid {
    background: #ECEDF1
}

h6.ml-1 {
    font-size: 13px
}

small.key {
    text-decoration: underline;
    font-size: 9px;
    cursor: pointer
}sss

.btn-danger {
    color: #FFCBD2
}

.btn-danger:focus {
    box-shadow: none
}

small.justify-content-center {s
    font-size: 9px;
    cursor: pointer;
    text-decoration: underline
}

@media screen and (max-width:600px) {
    .col-sm-4 {
        margin-bottom: 50px
    }
}

/* carrito */

.sidebar-social li {
  text-align: center;
  width: 31.9%;
  margin-bottom: 3px !important;
  display: inline-block;
  font-size: 10px;
  padding: 0;
  float: right;
}

.sidebar-social i {
  display: block;
  margin: 0 auto 10px auto;
  width: 32px;
  height: 32px;
  margin: 10px auto 0;
  line-height: 32px;
  text-align: center;
  font-size: 20px;
  color: #444444;
  margin-top: 0;
  padding-top: 5px;
}

.sidebar-social a {
  text-decoration: none;
  width: 100%;
  height: 100%;
  display: block;
  margin: 0;
  padding: 0;
}

.sidebar-social a span {
  color: black;
  font-size: 15px;
  padding: 5px 0 10px 0;
  display: block;
  text-transform: uppercase;
  font-family: 'Montserrat';
  letter-spacing: 1px;
}
/* CSS para posicionar el bade cerca del carrito*/
.cart {
  position: relative;
}

#cart_menu_num {
  position: absolute;
  top: 0;
  left: 55%;
  background: red;
  width: 15px;
  height: 15px;
  border-radius: 50%;
  display: flex;
  justify-content: center;
  align-items: center;
  color: white;
  padding: 2px;
}
</style>









