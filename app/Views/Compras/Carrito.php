<link href="../../assets/lib/datatables/jquery.dataTables.css" rel="stylesheet">
<link href="../../assets/lib/select2/css/select2.min.css" rel="stylesheet">
<script src="../../assets/lib/jquery/jquery.js"></script>


<div class="sl-mainpanel prueba " style="width:100%;  overflow: scroll;">
  <!--<nav class="breadcrumb sl-breadcrumb">
    
    <span class="breadcrumb-item active">Productos</span>
  </nav>-->



  <div class="sl-pagebody">
    <div class="sl-page-title">
      <h5 class="prueba">Carrito</h5>
      <!--<p>DataTables is a plug-in for the jQuery Javascript library.</p>-->
    </div><!-- sl-page-title -->

    <div>
      <!--<button class="btn btn-success" onclick="location.href='<?php echo base_url(); ?>/proveedores/agregar'">+ NUEVO PROVEEDOR</button>-->
      <!--<button class="btn btn-success" data-toggle="modal" data-target="#modaldemo3">Nuevo Proveedor</button>-->
    </div>
    </br>
    </br>

    <div class="card pd-20 pd-sm-40">
      <h6 class="card-body-title"></h6>
      <!--<p class="mg-b-20 mg-sm-b-30">Searching, ordering and paging goodness will</p>-->

      <div class="table-wrapper">
        <table id="datatable1" class="table display responsive nowrap">
          <thead>
            <tr>
              <th class="wd-10p">Producto</th>
              <th class="wd-10p">precio</th>
              <th class="wd-10p">imagen</th>
              
            </tr>
          </thead>
          <tbody id="dataproductos">
          </tbody>
        </table>
      </div><!-- table-wrapper -->
    </div><!-- card -->

  </div><!-- sl-pagebody -->
  <footer class="sl-footer">
    <div class="footer-left">
      <div class="mg-b-2">Copyright &copy; 2017. Starlight. All Rights Reserved.</div>
      <div>Made by ThemePixels.</div>
    </div>
    <div class="footer-right d-flex align-items-center">
      <span class="tx-uppercase mg-r-10">Share:</span>
      <a target="_blank" class="pd-x-5" href="https://www.facebook.com/sharer/sharer.php?u=http%3A//themepixels.me/starlight"><i class="fa fa-facebook tx-20"></i></a>
      <a target="_blank" class="pd-x-5" href="https://twitter.com/home?status=Starlight,%20your%20best%20choice%20for%20premium%20quality%20admin%20template%20from%20Bootstrap.%20Get%20it%20now%20at%20http%3A//themepixels.me/starlight"><i class="fa fa-twitter tx-20"></i></a>
    </div>
  </footer>
</div><!-- sl-mainpanel -->


<script src="../../assets/lib/datatables/jquery.dataTables.js"></script>
<script src="../../assets/lib/datatables-responsive/dataTables.responsive.js"></script>
<script src="../../assets/lib/select2/js/select2.min.js"></script>


<script>

  $('#datatable1').DataTable({
    bLengthChange: false,
    searching: false,
    responsive: false
  });



 

  $(document).ready(function () {  
      //alert("dentro de la funcion");
      const carrito = "<?= base_url(); ?>/rescompra/get_productosclient";

      $.ajax({
            
        url : carrito,
        method : 'GET', 
        dataType : 'json',
        success : function(data){
            const productos = data['get_products'];
            console.log(productos);

            let html = '';
            let i;

            for (i = 0; i < productos.length; i++) {
            html += '<tr>' +
                '<td>' + productos[i].name + '</td>' +
                '<td>' + '$' + productos[i].price + '</td>' +
                '<td>' + '<img style="width: 19%;" src="../../public/images/' + productos[i].media_path + '" class="img-thumbnail"/>' + '</td>' +
               

                '</tr>';
            }

            $('#dataproductos').html(html);
        
                
           
        },
        error: function(error){
                alert('hubo un error al enviar los datos');
        }
    });


  }); 

  </script>
