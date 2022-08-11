<link href="../../assets/lib/datatables/jquery.dataTables.css" rel="stylesheet">
<link href="../../assets/lib/select2/css/select2.min.css" rel="stylesheet">
<script src="../../assets/lib/jquery/jquery.js"></script>


<div class="sl-mainpanel prueba ">

  <div class="sl-pagebody">
    
    <div class="card pd-20 pd-sm-40">
    <div>
      <h5 class="text-dark">COSTOS Y GASTOS</h5>
      <!--<button class="btn btn-success" onclick="location.href='<?php echo base_url(); ?>/proveedores/agregar'">+ NUEVO PROVEEDOR</button>-->
      <button class="btn btn-success mb-3" data-toggle="modal" data-target="#modaldemo3"><i class="fa fa-plus mr-1" aria-hidden="true"></i>Nuevo costo o gasto</button>
    </div>
      <h6 class="card-body-title">Tabla Costos y Gastos</h6>
      <!--<p class="mg-b-20 mg-sm-b-30">Searching, ordering and paging goodness will</p>-->

      <div class="table-wrapper">
        <table id="datatable1" class="table display responsive nowrap">
          <thead>
            <tr>
              <th class="wd-15p">Fecha</th>
              <th class="wd-15p">Tipo de Costo</th>
              <th class="wd-15p">Proyecto</th>
              <th class="wd-20p">Tipo de Gasto</th>
              <th class="wd-15p">Tipo Doc</th>
              <th class="wd-10p">Proveedor</th>
              <th class="wd-20p">Razón Social</th>
              <th class="wd-20p">RFC</th>
              <th class="wd-20p">Importe sin I.V.A.</th>
              <th class="wd-20p">I.V.A. Acreditable</th>
              <th class="wd-20p">Importe Total</th>

            </tr>
          </thead>
          <tbody>
            <?php
            /* foreach ($get_provedor as $pro) {
              //print_r($pro);

              echo ('<tr>');
              echo ('<td>' . $pro->name_proveedor . '</td>');
              echo ('<td>' . $pro->p_address_country . '</td>');
              echo ('<td>' . $pro->p_address_city . '</td>');
              echo ('<td>' . $pro->p_address_county . '</td>');
              echo ('<td>' . $pro->p_address_postal_code . '</td>');
              echo ('<td>' . $pro->p_address_number . '</td>');
              echo ('<td>' . $pro->rfc . '</td>');
              echo ('<td>' . '<button class="btn btn-warning" data-toggle="modal" data-target="#modalproductos" onclick="getProductos(' . $pro->id_proveedor . ')">' . 'Productos' . '</button>' . '</td>');
              echo ('<td>' . '<button class="btn btn-primary" data-toggle="modal" data-target="#modaldemoac" onclick="mandarId(' . $pro->id_proveedor . ')" id="actualizar">' . 'Editar' . '</button>' . '</td>');
              echo ('<td>' . '<button class="btn btn-danger" data-toggle="modal" data-target="#modaldemo2" onclick="deleteId(' . $pro->id_proveedor . ')">' . 'Eliminar' . '</button>' . '</td>');
              echo ('</tr>');
            }*/

            ?>
          </tbody>
        </table>
      </div><!-- table-wrapper -->
    </div><!-- card -->

  </div><!-- sl-pagebody -->