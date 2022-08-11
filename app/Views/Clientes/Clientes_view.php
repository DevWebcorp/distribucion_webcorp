<link href="../../assets/lib/datatables/jquery.dataTables.css" rel="stylesheet">
<link href="../../assets/lib/select2/css/select2.min.css" rel="stylesheet">
<script src="../../assets/lib/jquery/jquery.js"></script>


<div class="sl-mainpanel prueba " style="width:100%;  overflow: scroll;">
  <nav class="breadcrumb sl-breadcrumb">
    
    <span class="breadcrumb-item active">Tabla Clientes</span>
  </nav>



  <div class="sl-pagebody">
    <div class="sl-page-title">
      <h5 class="prueba">Clientes</h5>
      <!--<p>DataTables is a plug-in for the jQuery Javascript library.</p>-->
    </div><!-- sl-page-title -->

    <div>
      <!--<button class="btn btn-success" onclick="location.href='<?php echo base_url(); ?>/proveedores/agregar'">+ NUEVO PROVEEDOR</button>-->
      <!--<button class="btn btn-success" data-toggle="modal" data-target="#modaldemo3">Nuevo Proveedor</button>-->
    </div>
    </br>
    </br>




    <div class="card pd-20 pd-sm-40">
      <h6 class="card-body-title">Tabla Clientes</h6>
      <!--<p class="mg-b-20 mg-sm-b-30">Searching, ordering and paging goodness will</p>-->

      <div class="table-wrapper">
        <table id="datatable1" class="table display responsive nowrap">
          <thead>
            <tr>
              <th class="wd-15p">Nombre</th>
              <th class="wd-15p">RFC</th>
              <th class="wd-20p">Correo</th>
              <th class="wd-15p">Telefono</th>
              <th class="wd-10p">Movil</th>
              <th class="wd-15p">Ciudad</th>
              <th class="wd-15p">Municipio</th>
              <th class="wd-15p">Calle</th>
              <th class="wd-15p">Codigo Postal</th>
              <th class="wd-15p">Numero</th>
              <th class="wd-15p">Datos principales</th>
              <th class="wd-15p">Ver Detalle</th>
            </tr>
          </thead>
          <tbody>
            <?php
            foreach ($get_clientes as $clientes) {
              //print_r($pro);

              echo ('<tr>');
                echo ('<td>' . $clientes->name . '</td>');
                echo ('<td>' . $clientes->rfc . '</td>');
                echo ('<td>' . $clientes->email . '</td>');
                echo ('<td>' . $clientes->phone . '</td>');
                echo ('<td>' . $clientes->mobile . '</td>');
                echo ('<td>' . $clientes->adress_city . '</td>');
                echo ('<td>' . $clientes->adress_county . '</td>');
                echo ('<td>' . $clientes->adress_street . '</td>');
                echo ('<td>' . $clientes->adress_postal_code . '</td>');
                echo ('<td>' . $clientes->adress_number . '</td>');
                /*echo ('<td>' . '<button class="btn btn-info "  onclick="mandarId()">' . 'principales' . '</button>' . '</td>');
                echo ('<td>' . '<button class="btn btn-teal">' . 'Detalle' . '</button>' . '</td>');*/
              echo ('</tr>');
            }

            ?>
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

  </script>
