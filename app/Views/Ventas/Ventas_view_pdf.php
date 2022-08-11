<link href="../../assets/lib/datatables/jquery.dataTables.css" rel="stylesheet">
<link href="../../assets/lib/select2/css/select2.min.css" rel="stylesheet">
<script src="../../assets/lib/jquery/jquery.js"></script>




<style type="text/css">
  table {
   width: 100%;
   border: 1px solid #000;
}
th, td {
   width: 25%;
   text-align: left;
   vertical-align: top;
   border: 1px solid #000;
   border-collapse: collapse;
   padding: 0.3em;
   caption-side: bottom;
}
caption {
   padding: 0.3em;
   color: #fff;
    background: #000;
}
th {
   background: #eee;
}


</style>
<div class="sl-mainpanel">
  <nav class="breadcrumb sl-breadcrumb">
    <span class="breadcrumb-item active"></span>
  </nav>

  <div class="sl-pagebody">
    <div class="sl-page-title">

      <!--<p>DataTables is a plug-in for the jQuery Javascript library.</p>-->
      <img style="width: 50%; float: right;" src="<?php echo path."assets/img/logo_b.jpg"?>"  alt="solimaq">
    </div><!-- sl-page-title -->

    <div class="card pd-20 pd-sm-40">

      <div class="col-md-12 row">
        <div class ="col-md-6">
          <?php
          echo ("<h5>Detalle Venta</h5>");
            echo('<h5 class="card-body-title">'."Vendedor:".$vendedor.'</h5>');

            foreach ($get_header as $header){
              setlocale(LC_ALL, 'es_MX');
              $fecha = (new \DateTime($header->c_date))->format("d-m-Y") . PHP_EOL;
              //$inicio = strftime("%A, %d de %B del %Y", strtotime($fecha));
              echo('<h5 class="card-body-title">'."Cliente:".$header->cliente.'</h5>');
              echo('<h5 class="card-body-title">'."Fecha:".$fecha.'</h5>');
            }


          ?>

        </div>

      </div>



    <!--pagos -->


      <h6 class="card-body-title">Productos<button id="btnproductos" style="margin-left:10px" class="btn btn-info btn-circle"><i class="fa fa-plus-square"></i></button></h6>


      <!--<p class="mg-b-20 mg-sm-b-30">Searching, ordering and paging goodness will</p>-->

      <div class="table-wrapper" id="tab_productos">
        <table id="datatable1" class="table display responsive nowrap">
          <thead>
            <tr>
              <th class="wd-20p">Nombre del Producto</th>
              <th class="wd-15p">Descripcion</th>

              <th class="wd-15p">Precio</th>
              <th class="wd-15p">Porcentaje</th>
              <th class="wd-15p">Total</th>
            </tr>
          </thead>
          <tbody>
            <?php
            //var_dump($get_header);
              $total_productos = array();
            foreach ($get_productos as $producto) {
              $porciento = round($producto->price * $producto->percent / 100, 2);
              $total_product = round($producto->price - $porciento, 2);
              array_push($total_productos,$total_product);

              echo ('<tr>');
                echo ('<td>' . $producto->name . '</td>');
                echo ('<td>' . $producto->description. '</td>');

                echo ('<td>' . "$" .$producto->price. '</td>');
                echo ('<td>' . $producto->percent . '%'.'</td>');
                echo ('<td>' . "$" .$total_product.'</td>');
              echo ('</tr>');
            }
            $total_productos2 = array_sum($total_productos);

            echo ('<tr>');
                echo ('<td>' . "". '</td>');
                echo ('<td>' . "". '</td>');
                echo ('<td>' . "". '</td>');

                echo ('<td>'.'<strong>'. "Total".'</strong>'. '</td>');
                echo ('<td>'.'<strong>'.'$'. $total_productos2. '</strong>'. '</td>');
              echo ('</tr>');
            ?>
          </tbody>
        </table>
      </div><!-- table-wrapper -->




      <h6 class="card-body-title" style="margin-top: 20px;">Venta<button id="btnventa" style="margin-left:48px" class="btn btn-info btn-circle"><i class="fa fa-plus-square"></i></button></h6>
      <!--<p class="mg-b-20 mg-sm-b-30">Searching, ordering and paging goodness will</p>-->

      <div class="table-wrapper" id="tab_venta">
        <table id="datatable1" class="table display responsive nowrap">
          <thead>
            <tr>
              <th class="wd-20p">Subtotal</th>
              <th class="wd-15p">Porcentaje</th>
              <th class="wd-15p">IVA</th>
              <th class="wd-15p">Total</th>
              <th class="wd-15p">Fecha</th>
            </tr>
          </thead>
          <tbody>
            <?php
            //var_dump($get_productos);
            foreach ($get_sale as $venta) {
              $impuesto = round($venta->tax * $venta->subtotal / 100, 2);
              $total = round($impuesto + $venta->subtotal, 2);
              echo ('<tr>');
              echo ('<td>' . "$" . $venta->subtotal . '</td>');
              echo ('<td>' . $venta->tax . '%' . '</td>');
              echo ('<td>' . "$" . $impuesto . '</td>');
              echo ('<td>' . "$" . $total . '</td>');
              echo ('<td>' . $venta->c_date . '</td>');

              echo ('</tr>');
            }

            ?>
          </tbody>
        </table>
      </div><!-- table-wrapper -->
      <!-- Archivos -->



      <h6 class="card-body-title" style="margin-top: 20px;">Pagos</h6>


      <div id="tb_pagos">


        <div class="table-wrapper" style="margin-top: 30px;">
          <table id="datatable3" class="table display responsive nowrap">
            <thead>
              <tr>
                <th class="wd-10p">Monto</th>
                <th class="wd-10p">status</th>
                <th class="wd-10p">Categoria Pago</th>
                <th class="wd-10p">Descripción</th>
                <th class="wd-10p">Evidencia</th>


              </tr>
            </thead>
            <tbody id="tbfiles">
              <?php
              //var_dump($get_payments);
                $array = array();
              foreach ($get_payments as $payment) {
                array_push($array,$payment->amount);
                $filename =  basename($payment->path);

                echo ('<tr>');
                echo ('<td>' . '$' . $payment->amount . '</td>');
                echo ('<td>' . $payment->status . '</td>');
                echo ('<td>' . $payment->name . '</td>');
                echo ('<td>' . $payment->description . '</td>');
                echo ('<td>' . '<a href="../../' . $payment->path . '" target="_blank">' . $filename . '</a>');

                echo ('</tr>');
              }

                $suma = array_sum($array);
              ?>
            </tbody>
          </table>
        </div><!-- table-wrapper -->


      <div class="table-wrapper" style="margin-top: 10px;">
        <table id="mytable" class="table display responsive nowrap">
          <thead>
            <tr>
              <th class="wd-10p">Pagado</th>
              <th class="wd-10p">Total venta</th>
              <th class="wd-10p">Adeudo</th>
            </tr>
          </thead>
          <tbody>
            <?php

              $adeudo = round ($total - $suma,2);
              echo ('<tr>');
              echo ('<td id="suma">' . '$' .$suma. '</td>');
              echo ('<td id="total">' .'$'. $total . '</td>');
              echo ('<td id="adeudo">' . '$'.$adeudo . '</td>');
              echo ('</tr>');
            ?>
          </tbody>
        </table>
      </div><!-- table-wrapper -->
    </div>




    </div><!-- card -->

    <footer class="sl-footer">
      <div class="footer-left">
        <div class="mg-b-2">Copyright &copy; 2021. Starlight. All Rights Reserved.</div>
        <div>Made by SOLIMAQ.</div>
      </div>
      <div class="footer-right d-flex align-items-center">

        <a target="_blank" class="pd-x-5" href="https://www.facebook.com/sharer/sharer.php?u=http%3A//themepixels.me/starlight"><i class="fa fa-facebook tx-20"></i></a>
        <a target="_blank" class="pd-x-5" href="https://twitter.com/home?status=Starlight,%20your%20best%20choice%20for%20premium%20quality%20admin%20template%20from%20Bootstrap.%20Get%20it%20now%20at%20http%3A//themepixels.me/starlight"><i class="fa fa-twitter tx-20"></i></a>
      </div>
    </footer>
  </div><!-- sl-mainpanel -->






<style>
  .btn-circle.btn-xl {
    width: 70px;
    height: 70px;
    padding: 10px 16px;
    border-radius: 35px;
    font-size: 24px;
    line-height: 1.33;
  }

  .btn-circle {
    width: 30px;
    height: 30px;
    padding: 6px 0px;
    border-radius: 15px;
    text-align: center;
    font-size: 12px;
    line-height: 1.42857;
  }

  #total{
    color:blue;
  }

  #adeudo{
    color:red;

  }

  #suma{
    color:green;

  }

  #btnfile{
    border-radius: 10px;
  }


</style>


<script src="../../assets/lib/datatables/jquery.dataTables.js"></script>
<script src="../../assets/lib/datatables-responsive/dataTables.responsive.js"></script>
<script src="../../assets/lib/select2/js/select2.min.js"></script>
<script src="https://code.jquery.com/jquery-3.5.0.js"></script>









<script>
  $("#tbfiles").hide();
  $("#tab_productos").hide();
  $("#tab_venta").hide();
  $("#tb_pagos").hide();

  $("#btnmas").click(function() {
    $("#tbfiles").toggle();
  });

  $("#btnproductos").click(function() {
    $("#tab_productos").toggle();
  });

  $("#btnventa").click(function() {
    $("#tab_venta").toggle();
  });

  $("#btnpagos").click(function() {
    $("#tb_pagos").toggle();
  });





  //Actualizar Pago

  //Actualizar Proveedor//
  function actualizar(idpayment) {
    //alert(idpayment);
    const ruta = "<?= base_url(); ?>/ventas/get_pago";
    data = {
      id_payment: idpayment

    }

    $.ajax({
      type: "POST",
      url: ruta,
      dataType: "JSON",
      data: data,
      success: function(response) {
        console.log(response);

        $("#monto").val(response[0].amount);
        $("#status").val(response[0].status);
        $('#idpago').val(response[0].id_cat_payments);
        $('#id_payment').val(response[0].id);

      },

    });


  }

  //Borrar pago

  function borarId(idpago) {
    $('#id_pagos').val(idpago);

  }

  //Borrar Archivo

  function fileId(idfile){
    $('#idfile').val(idfile);
  }



  /*$('#datatable1').DataTable({
    responsive: true,
    language: {
      searchPlaceholder: 'Search...',
      sSearch: '',
      lengthMenu: '_MENU_ items/page',
    }
  });*/


  //Valor del total adeudo
  const valor = $("#adeudo").text();
  if(valor === "$0"){
    $("#nuevopago").prop('disabled', true);
  }


  </script>