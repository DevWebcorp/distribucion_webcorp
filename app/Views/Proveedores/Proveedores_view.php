<link href="../../assets/lib/datatables/jquery.dataTables.css" rel="stylesheet">
<link href="../../assets/lib/select2/css/select2.min.css" rel="stylesheet">
<script src="../../assets/lib/jquery/jquery.js"></script>


<div class="sl-mainpanel prueba">
  <div class="sl-pagebody">
    
    </br>
    </br>

    <div class="card pd-20 pd-sm-40">
      <div class="sl-page-title">
        <h5 class="prueba">PROVEEDORES</h5>
        <!--<p>DataTables is a plug-in for the jQuery Javascript library.</p>-->
      </div><!-- sl-page-title -->
      <div>
        <!--<button class="btn btn-success" onclick="location.href='<?php echo base_url(); ?>/proveedores/agregar'">+ NUEVO PROVEEDOR</button>-->
        <button class="btn btn-success" data-toggle="modal" data-target="#modaldemo3"><i class="fa fa-plus" aria-hidden="true"></i> Nuevo Proveedor</button>

        <button data-toggle="modal" data-target="#modalGenerar" class="btn btn-teal"><i class="fa fa-shopping-bag" aria-hidden="true"></i> GENERAR ORDEN DE COMPRA</button>
      </div>
      <h6 class="card-body-title mg-t-20">Tabla Proveedores</h6>

      <!--<p class="mg-b-20 mg-sm-b-30">Searching, ordering and paging goodness will</p>-->

      <div class="table-wrapper">
        <table id="datatable1" class="table table-responsive proveedores">
          <thead>
            <tr>
              <th class="wd-15p">LOGO EMPRESA</th>
              <th class="wd-15p">NOMBRE COMERCIAL</th>
              <th class="wd-15p">MARCA</th>
              <th class="wd-10p">PUERTO DE EMBARQUE</th>
              <th class="wd-15p">CONTACTO</th>
              <th class="wd-10p">TEL/WHATSAPP</th>
              <th class="wd-10p">CORREO</th>
              <th class="wd-10p">ASIGNAR PRODUCTOS</th>
              <th class="wd-15p">Editar Proveedor</th>
              <th class="wd-15p">Eliminar Proveedor</th>
            </tr>
          </thead>
          <tbody>
            <?php
            foreach ($get_provedor as $pro) {
              //print_r($pro);

              echo ('<tr>');
              echo ('<td>' . '<img class = "img-fluid" src = "../../public/images/logos/' . $pro->logo . '">'. '</td>');
              echo ('<td>' . $pro->name_proveedor . '</td>');
              echo ('<td>' . $pro->Marca . '</td>');
              echo ('<td>' . $pro->embark . '</td>');
              echo ('<td>' . $pro->contact . '</td>');
              echo ('<td>' . $pro->phone . '</td>');
              echo ('<td>' . $pro->email . '</td>');
              echo ('<td>' . '<button class="btn btn-primary" data-toggle="modal" data-target="#modalproductos" onclick="getProductos(' . $pro->id_proveedor . ')"><i class="fa fa-eye" aria-hidden="true"></i>' . ' Productos' . '</button>' . '</td>');
              echo ('<td>' . '<button class="btn btn-warning" data-toggle="modal" data-target="#modaldemoac" onclick="mandarId(' . $pro->id_proveedor . ')" id="actualizar"><i class="fa fa-pencil" aria-hidden="true"></i>'.  ' Actualizar' . '</button>' . '</td>');
              echo ('<td>' . '<button class="btn btn-danger" data-toggle="modal" data-target="#modaldemo2" onclick="deleteId(' . $pro->id_proveedor . ')"><i class="fa fa-trash-o mr-1" aria-hidden="true"></i>' . 'Eliminar' . '</button>' . '</td>');
              //echo ('<td>' . '<button class="btn btn-teal">' . 'orden de compra ' . '</button>' . '</td>');
              echo ('</tr>');
            }

            ?>
          </tbody>
        </table>
      </div><!-- table-wrapper -->
    </div><!-- card -->

  </div><!-- sl-pagebody -->

</div><!-- sl-mainpanel -->

<!-- Modal Productos -->
<div id="modalproductos" class="modal fade">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content tx-size-sm">
      <div class="modal-header bg-primary pd-x-20">
        <h6 class="tx-14 mg-b-0 tx-uppercase text-white tx-bold">PRODUCTOS</h6>
        <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class=" pd-20">
        <form id="obtenerid" method="POST">
          <input type="hidden" id="idproverdorx">
        </form>
        <button class="btn btn-success" form="#obtenerid" id="getId" data-toggle="modal" data-target="#modalCreateProduct">Asignar Productos</button>
        <br>
        <br>
        <div class="card pd-0 pd-sm-0">
          <h6 class="card-body-title">Tabla de productos</h6>
          <!--<p class="mg-b-20 mg-sm-b-30">Searching, ordering and paging goodness will be immediately added to the table, as shown in this example.</p>-->

          <div class="table-wrapper">
            <table id="datatable3" class="table table-bordered table-primary">
              <thead class="bg-info">
                <tr>
                  <th class="wd-10p">Nombre</th>
                  <th class="wd-15p">tipo</th>
                  <th class="wd-15p">Modelo</th>
                  <th class="wd-15p">capacidad</th>
                  <th class="wd-15p">Imagen</th>
                  <th class="wd-15p">Precio</th>
                  <th class="wd-10p">Eliminar</th>
                </tr>
              </thead>
              <tbody id="dataproductos">
                <!-- aqui van los datos de la tabla de productos -->

              </tbody>
            </table>
          </div><!-- table-wrapper -->
        </div><!-- card -->
      </div><!-- modal-body -->
      <!--<div class="modal-footer">
                <button type="button" class="btn btn-info pd-x-20">Save changes</button>
                <button type="button" class="btn btn-secondary pd-x-20" data-dismiss="modal">Close</button>
              </div>-->
    </div>
  </div><!-- modal-dialog -->
</div><!-- modal -->



<!--Modal de Actualizacion proveedor -->

<div id="modaldemoac" class="modal fade">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content tx-size-sm">
      <div class="modal-header bg-warning pd-x-20">
        <h6 class="tx-14 mg-b-0 tx-uppercase text-white tx-bold">Actualizar Proveedor</h6>
        <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class=" pd-20">
        <div class="card pd-20 pd-sm-40">
          <h6 class="card-body-title">Datos del Proveedor</h6>
          <p class="mg-b-20 mg-sm-b-30">Remplaza los datos a Actualizar.</p>

          <form id="CreateForm" method="POST" action="<?php echo base_url() ?>/proveedores/adatos">
            <div class="form-layout">
              <div class="row mg-b-25">
                <div class="col-lg-4">
                  <div class="form-group">
                    <label class="form-control-label">NOMBRE COMERCIAL: <span class="tx-danger">*</span></label>
                    <input id="empresa" class="form-control" type="text" name="empresa" placeholder="Solimaq" required>
                    <!--<select id ="empresa" name="empresa" class="form-control select2" data-placeholder="Choose country" required>
                        <?php
                        /*foreach ($get_empresa as $key) {
                        echo ('<option  value="' . $key->id . '" name="empresa">' . $key->business_name . '</option>');
                        }*/
                        ?>
                      </select>-->
                  </div>
                </div><!-- col-4 -->
                <div class="col-lg-4">
                  <div class="form-group">
                    <label class="form-control-label">MARCA: <span class="tx-danger">*</span></label>
                    <input class="form-control" id="marca" type="text" name="marca" placeholder="Ciudad">
                  </div>
                </div><!-- col-4 -->
                <div class="col-lg-4">
                  <div class="form-group">
                    <label class="form-control-label">PUERTO DE EMBARQUE: <span class="tx-danger">*</span></label>
                    <input class="form-control" id="embark" type="text" name="embark" placeholder="Calle">
                  </div>
                </div><!-- col-4 -->
                <div class="col-lg-4">
                  <div class="form-group">
                    <label class="form-control-label">CONTACTO: <span class="tx-danger">*</span></label>
                    <input class="form-control" id="contacto" type="text" name="contacto" placeholder="Ciudad">
                  </div>
                </div><!-- col-4 -->

                <div class="col-lg-4">
                  <div class="form-group">
                    <label class="form-control-label">TEL/WHATSAPP: <span class="tx-danger">*</span></label>
                    <input class="form-control" id="phone" type="text" name="phone" placeholder="Municipio">
                  </div>
                </div><!-- col-4 -->

                <div class="col-lg-4">
                  <div class="form-group">
                    <label class="form-control-label">CORREO: <span class="tx-danger">*</span></label>
                    <input class="form-control" id="correo" type="email" name="correo" placeholder="Correo">
                  </div>
                </div><!-- col-4 -->
                <!--<div class="col-lg-4">
                  <div class="form-group">
                    <label class="form-control-label">Numero: <span class="tx-danger">*</span></label>
                    <input class="form-control" id="numero" type="text" name="numero" placeholder="Numero">
                  </div>
                </div> col-4 -->
                <!--  <div class="col-lg-4">
                  <div class="form-group">
                    <label class="form-control-label">RFC: <span class="tx-danger">*</span></label>
                    <input class="form-control" id="rfc" type="text" name="rfc" placeholder="RFC">
                  </div>
                </div>-->

                <div class="col-lg-4">
                  <div class="form-group">
                    <input type="hidden" class="form-control" id="id" name="id" placeholder="RFC">
                  </div>
                </div>
              </div><!-- row -->

          </form>

        </div><!-- form-layout -->
      </div>
    </div><!-- modal-body -->
    <div class="modal-footer">
      <button type="submit" form="CreateForm" class="btn btn-warning pd-x-20"><i class="fa fa-pencil mr-1" aria-hidden="true"></i>Actualizar</button>
      <button type="button" class="btn btn-secondary pd-x-20" data-dismiss="modal"><i class="fa fa-times mr-1" aria-hidden="true"></i>Cancelar</button>
    </div>
  </div>
</div><!-- modal-dialog -->
</div>

<!--Eliminar proveedor-->
<div id="modaldemo2" class="modal fade">
  <div class="modal-dialog modal-sm" role="document">
    <div class="modal-content bd-0 tx-14">
      <div class="modal-header bg-danger pd-x-20">
        <h6 class="tx-14 mg-b-0 tx-uppercase text-white tx-bold">Eliminar Proveedor</h6>
        <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class=" pd-20">
        <p class="mg-b-5">¿Desea eliminar este registro?</p>
        <form id="DeleteForm" method="POST" action="<?php echo base_url() ?>/proveedores/delete">
          <input class="form-control" id="id_prove" name="id_prove" type="hidden">
        </form>
      </div>
      <div class="modal-footer justify-content-center">
        <button form="DeleteForm" type="submit" class="btn btn-danger"><i class="fa fa-trash-o mr-1" aria-hidden="true"></i>Eliminar</button>
        <button type="button" class="btn btn-secondary pd-x-20" data-dismiss="modal"><i class="fa fa-times mr-1" aria-hidden="true"></i>Cancelar</button>
      </div>
    </div>
  </div><!-- modal-dialog -->
</div><!-- modal -->


<!-- Agregar Proveedor -->
<div id="modaldemo3" class="modal fade">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content tx-size-sm">
      <div class="modal-header bg-success pd-x-20">
        <h6 class="tx-14 mg-b-0 tx-uppercase text-white tx-bold">Agregar Nuevo Proveedor</h6>
        <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="pd-20">
        <div class="card pd-20 pd-sm-40">
          <h6 class="card-body-title">Datos del Proveedor</h6>
          <p class="mg-b-20 mg-sm-b-30">Rellena todos los campos</p>

          <form id="Nprovedor" method="POST" action="<?php echo base_url() ?>/Proveedores/agregar" enctype="multipart/form-data">
            <div class="form-layout">
              <div class="row mg-b-25">
                <div class="col-lg-4">
                  <div class="form-group">
                    <label class="form-control-label">NOMBRE COMERCIAL: <span class="tx-danger">*</span></label>
                    <input class="form-control" type="text" name="empresa" placeholder="Solimaq" required>
                    <!--<select id ="empleado" name="empresa" class="form-control select2" data-placeholder="Choose country" required>
                       <option value="" name="empresa">Selecciona Empresa</option>
                        <?php
                        /*foreach ($get_empresa as $key) {
                        echo ('<option  value="' . $key->id . '" name="empresa">' . $key->business_name . '</option>');
                        }*/
                        ?>
                      </select>-->
                  </div>
                </div><!-- col-4 -->

                <div class="col-lg-4">
                  <div class="form-group">
                    <label class="form-control-label">MARCA: <span class="tx-danger">*</span></label>
                    <input class="form-control" type="text" name="marca" placeholder="Marca" required>
                  </div>
                </div><!-- col-4 -->
                <div class="col-lg-4">
                  <div class="form-group">
                    <label class="form-control-label">PUERTO DE EMBARQUE: <span class="tx-danger">*</span></label>
                    <input class="form-control" type="text" name="embarque" placeholder="embarque" required>
                  </div>
                </div><!-- col-4 -->
                <div class="col-lg-4">
                  <div class="form-group">
                    <label class="form-control-label">CONTACTO: <span class="tx-danger">*</span></label>
                    <input class="form-control" type="text" name="contacto" placeholder="Contacto" required>
                  </div>
                </div><!-- col-4 -->

                <div class="col-lg-4">
                  <div class="form-group">
                    <label class="form-control-label">TEL/WHATSAPP <span class="tx-danger">*</span></label>
                    <input class="form-control" type="number" name="Phone" placeholder="Phone" required>
                  </div>
                </div><!-- col-4 -->

                <div class="col-lg-4">
                  <div class="form-group">
                    <label class="form-control-label">CORREO: <span class="tx-danger">*</span></label>
                    <input class="form-control" type="email" name="correo" placeholder="SOLIMAQ@MAIL.COM" required>
                  </div>
                </div><!-- col-4 -->

                <div class="col-lg-4">
                  <div class="form-group">
                    <label class="form-control-label">LOGO <span class="tx-danger">*</span></label>
                    <span class="choose-file-button">Subir Archivo</span>
                    <span class="file-message">Arrastra el archivo aqui</span>
                    <input class="file-input" type="file" multiple required accept=".mp4, .jpg, .png" name="logo" id="logo">
                  </div>
                </div><!-- col-4 -->
                <!-- <div class="col-lg-4">
                  <div class="form-group">
                    <label class="form-control-label">RFC: <span class="tx-danger">*</span></label>
                    <input class="form-control" type="text" name="rfc" placeholder="RFC" required>
                  </div>
                </div>   -->
                <!--<div class="col-lg-4">
                
                  <div class="form-group">
                    <label class="form-control-label">Calle: <span class="tx-danger">*</span></label>
                    <input class="form-control" type="text" name="calle" placeholder="Calle" required>
                  </div>
                </div>
                <div class="col-lg-4">
                  <div class="form-group">
                    <label class="form-control-label">Codigo Postal: <span class="tx-danger">*</span></label>
                    <input class="form-control" type="text" name="cp" placeholder="C.P." required>
                  </div>
                </div>
                <div class="col-lg-4">
                  <div class="form-group">
                    <label class="form-control-label">Numero: <span class="tx-danger">*</span></label>
                    <input class="form-control" type="text" name="numero" placeholder="Numero" required>
                  </div>
                </div>
                <div class="col-lg-4">
                  <div class="form-group">
                    <label class="form-control-label">RFC: <span class="tx-danger">*</span></label>
                    <input class="form-control" type="text" name="rfc" placeholder="RFC" required>
                  </div>
                </div>-->
              </div>
            </div>
          </form>

        </div><!-- form-layout -->
      </div><!-- modal-body -->
      <div class="modal-footer">
        <button type="submit" id="enviarform" form="Nprovedor" class="btn btn-success pd-x-20"><i class="fa fa-plus mr-1" aria-hidden="true">Agregar</i></button>
        <button type="button" class="btn btn-secondary pd-x-20" data-dismiss="modal"><i class="fa fa-times mr-1" aria-hidden="true"></i>Cancelar</button>
      </div>
    </div>
  </div><!-- modal-dialog -->
</div><!-- modal -->



<!-- Modal Guardar Productos -->

<div id="modalCreateProduct" class="modal fade">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content tx-size-sm">
      <div class="modal-header bg-success pd-x-20">
        <h6 class="tx-14 mg-b-0 tx-uppercase text-white tx-bold">Asignar productos</h6>
        <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class=" pd-20">

        <form id="Productosform" method="POST" action="<?php echo base_url() ?>/proveedores/asignar_product">
          <div class="inputs">
            <div class="row mg-b-25">
              <div class="col-lg-6">
                <div class="form-group mg-b-10-force">
                  <label class="form-control-label">Product: <span class="tx-danger">*</span></label>
                  <select name="productos[]" class="form-control select2" data-placeholder="Choose country">
                    <?php
                    foreach ($obtener_productos as $key) {
                      echo ('<option  value="' . $key["id"] . '" name="producto">' . $key["name"] . '</option>');
                    }
                    ?>
                  </select>
                </div>
              </div><!-- col-4 -->

              <!-- <div class="col-lg-4">
                <div class="form-group">
                  <label class="form-control-label">Precio: <span class="tx-danger">*</span></label>
                  <input class="form-control" type="text" name="precio[]" placeholder="Precio" required>
                </div>
              </div>col-4 -->
              <div class="col-lg-2 pd-t-25">
                <div class="form-group">
                  <button class="btn btn-success" type="button" onclick="nuevo();"><i class="fa fa-plus mr-1" aria-hidden="true"></i>Agregar Producto</button>
                </div>
              </div><!-- col-4 -->
            </div><!-- row -->
          </div>
          <input type="hidden" name="enviar">
          <input id="idform" name="idform" class="form-control" type="hidden">
        </form>

      </div><!-- modal-body -->
      <div class="modal-footer">
        <button form="Productosform" type="submit" class="btn btn-info pd-x-20"><i class="fa fa-floppy-o mr-1" aria-hidden="true"></i>Guardar Productos</button>
        <button type="button" class="btn btn-secondary pd-x-20" data-dismiss="modal"><i class="fa fa-times mr-1" aria-hidden="true"></i>Cancelar</button>
      </div>
    </div>
  </div><!-- modal-dialog -->
</div><!-- modal -->


<!-- Modal Actualizar Producto -->

<div id="modalacproducto" class="modal fade">
  <div class="modal-dialog modal-dialog-vertical-center" role="document">
    <div class="modal-content bd-0 tx-14">
      <div class="modal-header pd-y-20 pd-x-25">
        <h6 class="tx-14 mg-b-0 tx-uppercase tx-inverse tx-bold">Actualizar producto</h6>
        <button type="button" class="close" data-dismiss="modal" aria-label="Cerrar">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form method="POST" action="<?php echo base_url() ?>/proveedores/productos_update" enctype="multipart/form-data">
        <div class="modal-body pd-25">
          <div class="card pd-20 pd-sm-40 form-layout form-layout-4">
            <h6 class="card-body-title">Producto</h6>
            <p class="mg-b-20 mg-sm-b-30">Remplaza los datos a Actualizar.</p>
            <div class="row mg-t-20">
              <label class="col-sm-12 form-control-label">Precio: <span class="tx-danger">*</span></label>
              <div class="col-sm-12 mg-t-10 mg-sm-t-0">
                <input id="precio" type="text" class="form-control" name="precio" placeholder="Precio sugerido" required>
              </div>
            </div><!-- row -->
            <div class="col-lg-4">
              <div class="form-group">
                <input class="form-control" id="acid" name="acid" type="hidden">
              </div>
            </div><!-- col-4 -->

          </div><!-- card -->
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-info pd-x-20">Actualizar producto</button>
          <button type="button" class="btn btn-secondary pd-x-20" data-dismiss="modal">Cerrar</button>
        </div>
      </form>

    </div>
  </div><!-- modal-dialog -->
</div><!-- modal -->




<!--Modal de eliminar poducto -->

<div id="delproducto" class="modal fade">
  <div class="modal-dialog modal-sm" role="document">
    <div class="modal-content bd-0 tx-14">
      <div class="modal-header bg-danger pd-x-20">
        <h6 class="tx-14 mg-b-0 tx-uppercase text-white tx-bold">Eliminar Producto</h6>
        <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class=" pd-20">
        <p class="mg-b-5">¿Desea eliminar este producto?</p>
        <form id="DeleteProduct" method="POST" action="<?php echo base_url() ?>/proveedores/delete_producto">
          <input class="form-control" id="id_product" name="id_product" type="hidden">
        </form>
      </div>
      <div class="modal-footer justify-content-center">
        <button form="DeleteProduct" type="submit" class="btn btn-danger"><i class="fa fa-trash-o mr-1" aria-hidden="true"></i>Eliminar</button>
        <button type="button" class="btn btn-secondary pd-x-20" data-dismiss="modal"><i class="fa fa-times mr-1" aria-hidden="true"></i>Cancelar</button>
      </div>
    </div>
  </div><!-- modal-dialog -->
</div><!-- modal -->



<!--Modal de generar compra -->

<div id="modalGenerar" class="modal fade">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content tx-size-sm">
      <div class="modal-header bg-teal pd-x-20">
        <h6 class="tx-14 mg-b-0 tx-uppercase text-white tx-bold">Generar Compra</h6>
        <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="pd-20">
        <div class="card pd-20 pd-sm-40">
          <h6 class="card-body-title">Datos Para Generar Compra</h6>
          <p class="mg-b-20 mg-sm-b-30">Rellena todos los campos</p>

          <form id="Ngenerar" method="POST" action="<?php echo base_url() ?>/Generar_Compra/insert_compra">
            <div class="form-layout">
              <div class="row mg-b-25">
                <div class="col-lg-4">
                  <div class="form-group">
                    <label class="form-control-label">DATE: <span class="tx-danger">*</span></label>
                    <div class="wd-200">
                      <div class="input-group">
                        <span class="input-group-addon"><i class="icon ion-calendar tx-16 lh-0 op-6"></i></span>
                        <input name="fecha" id="datepickerNoOfMonths" type="date" class="form-control" placeholder="MM/DD/YYYY">
                      </div>
                    </div><!-- wd-200 -->
                  </div>
                </div><!-- col-4 -->

                <div class="col-lg-4">
                  <div class="form-group">
                    <label class="form-control-label">COMPANY: <span class="tx-danger">*</span></label>
                    <select name="company" class="form-control select2" data-placeholder="Choose country">
                      <option value="" name="empresa">Selecciona Empresa</option>
                      <?php
                      foreach ($get_empresa as $key) {
                        echo ('<option  value="' . $key->id . '" name="prov">' . $key->business_name . '</option>');
                      }
                      ?>
                    </select>
                  </div>
                </div><!-- col-4 -->

                <div class="col-lg-4">
                  <div class="form-group">
                    <label class="form-control-label">SUPPLIER : <span class="tx-danger">*</span></label>
                    <select name="prov" class="form-control select2" data-placeholder="Choose country">
                      <option value="" name="prov">Selecciona Proveedor</option>
                      <?php
                      foreach ($get_provedor as $key) {
                        echo ('<option  value="' . $key->id_proveedor . '" name="prov">' . $key->name_proveedor . '</option>');
                      }
                      ?>
                    </select>
                  </div>
                </div><!-- col-4 -->

                <div class="col-lg-4">
                  <div class="form-group">
                    <label class="form-control-label">MACHINE : <span class="tx-danger">*</span></label>
                    <select id="select-maquina" name="maquina" class="form-control select2" data-placeholder="Choose country">
                      
                  
                      
                    </select>
                  </div>
                </div><!-- col-4 -->

                <div class="col-lg-4">
                  <div class="form-group">
                    <label class="form-control-label">MODEL NAME ON PLATE : <span class="tx-danger">*</span></label>
                    <input class="form-control" type="text" name="model" placeholder="MODEL NAME ON PLATE " required>
                  </div>
                </div><!-- col-4 -->

                <div class="col-lg-4">
                  <div class="form-group">
                    <label class="form-control-label">MODEL CHINA : <span class="tx-danger">*</span></label>
                    <input readonly="readonly" required class="form-control" type="text" name="modelchina" id="modelchina" pattern="^\$\d{1,3}(,\d{3})*(\.\d+)?$" value="" placeholder="MODELO CHINA">
                    <input id="idmodelchina" class="form-control" type="hidden" name="idmodelchina" placeholder="MODEL CHINA" readonly="readonly" required>
                  </div>
                </div><!-- col-4 -->

                <div class="col-lg-4">
                  <div class="form-group">
                    <label class="form-control-label">SERIAL NUMBER: <span class="tx-danger">*</span></label>
                    <input class="form-control" type="text" name="serial" placeholder="SERIAL NUMBER" required>
                  </div>
                </div><!-- col-4 -->
                <div class="col-lg-4">
                  <div class="form-group">
                    <label class="form-control-label">CAPACITY: <span class="tx-danger">*</span></label>
                    <input class="form-control" type="text" name="capacity" placeholder="CAPACITY" required>
                  </div>
                </div><!-- col-4 -->

                <div class="col-lg-4">
                  <div class="form-group">
                    <label class="form-control-label">VOLTAGE: <span class="tx-danger">*</span></label>
                    <input class="form-control" type="text" name="voltage" placeholder="VOLTAGE" required>
                  </div>
                </div><!-- col-4 -->

                <div class="col-lg-4">
                  <div class="form-group">
                    <label class="form-control-label">COLOR OR PAINT: <span class="tx-danger">*</span></label>
                    <input class="form-control" type="text" name="color" placeholder="COLOR OR PAINT" required>
                  </div>
                </div><!-- col-4 -->
                <div class="col-lg-4">
                  <div class="form-group">
                    <label class="form-control-label">OTHER DETAILS: <span class="tx-danger"></span></label>
                    <input class="form-control" type="text" name="other" placeholder="OTHER DETAILS" >
                  </div>
                </div><!-- col-4 -->
                <div class="col-lg-4">
                  <div class="form-group">
                    <label class="form-control-label">DELIVERY TIME  <span class="tx-danger">*</span></label>
                    <input class="form-control" type="text" name="delivery" placeholder="DELIVERY TIME" required>
                  </div>
                </div><!-- col-4 -->
                <div class="col-lg-4">
                  <div class="form-group">
                    <label class="form-control-label">PRICE<span class="tx-danger">*</span></label>
                    <input readonly="readonly" required class="form-control" type="text" name="currency-field" id="price" pattern="^\$\d{1,3}(,\d{3})*(\.\d+)?$" value="" data-type="currency" placeholder="$1,000,000.00">
                    
                    <input id="idpxp" class="form-control" type="hidden" name="idpxp" placeholder="PRICE" readonly="readonly" required>
                  </div>
                </div><!-- col-4 -->
                <div class="col-lg-4">
                  <div class="form-group">
                    <input id="pricechange" type="checkbox"><span> Change Price</span>
                   
                  </div>
                </div><!-- col-4 -->

                  <div class="col-lg-4">
                      <div class="form-group">
                          <label class="form-control-label">ADVANCE PAYMENT (%)<span class="tx-danger">*</span></label>
                          <input class="form-control" type="number" min="1" step="1" name="advancePayment"
                                 id="advancePayment" placeholder="PERCETAGE OF ADVANCE PAYMENT" required>
                      </div>
                  </div>
                  <div class="col-lg-4">
                      <div class="form-group">
                          <label class="form-control-label">ADVANCE PAYMENT ($)<span class="tx-danger">*</span></label>
                          <input class="form-control" type="text" name="advancePaymentPrice"
                                 id="advancePaymentPrice" placeholder="ADVANCE PAYMENT" readonly="readonly" required>
                      </div>
                  </div>

                  <div class="col-lg-4">
                      <div class="form-group">
                          <label class="form-control-label">PAYMENT BEFORE SHIPMENT (%)<span class="tx-danger">*</span></label>
                          <input class="form-control" type="text" min="1" step="1" name="beforeLoading"
                                 id="beforeLoading" placeholder="PERCETAGE OF PAYMENT" required>
                      </div>
                  </div>
                  <div class="col-lg-4">
                      <div class="form-group">
                          <label class="form-control-label">PAYMENT BEFORE SHIPMENT ($)<span class="tx-danger">*</span></label>
                          <input class="form-control" type="text" min="1" step="1" name="priceBeforeLoading"
                                 id="priceBeforeLoading" placeholder="PAYMENT" readonly="readonly" required>
                      </div>
                  </div>

              </div>
            </div>
          </form>

        </div><!-- form-layout -->
      </div><!-- modal-body -->
      <div class="modal-footer">
        <button type="submit" id="form" form="Ngenerar" class="btn btn-teal pd-x-20"><i class="fa fa-floppy-o mr-1" aria-hidden="true"></i>Guardar</button>
        <button type="button" class="btn btn-secondary pd-x-20" data-dismiss="modal"><i class="fa fa-times mr-1" aria-hidden="true"></i>Cancelar</button>
      </div>
    </div>
  </div><!-- modal-dialog -->
</div><!-- modal -->


<script src="../../assets/lib/datatables/jquery.dataTables.js"></script>
<script src="../../assets/lib/datatables-responsive/dataTables.responsive.js"></script>
<script src="../../assets/lib/select2/js/select2.min.js"></script>





<script>
  
  //clonar formulario
  let nuevo = function() {
    $("<section/>").insertBefore("[name='enviar']")
      .append($(".inputs").html())
      .find("button")
      .attr("onclick", "eliminar(this)")
      .text("Eliminar");
  }

  let eliminar = function(obj) {
    $(obj).closest("section").remove();
  }

  //imagen de usuario

$(document).on('change', '#logo', function() {
    // alert("dentro");

    var filesCount = $(this)[0].files.length;
    var textbox = $(this).prev();
    var ext = $(this).val().split('.').pop();
    var archivo = document.getElementById("logo").files[0];



    if (ext == "png" || "jpg") {
        if (filesCount === 1) {

            var reader = new FileReader();
            reader.readAsDataURL(archivo);
            var fileName = $(this).val().split('\\').pop();
            textbox.text(fileName);
            reader.onloadend = function() {
                document.getElementById("img").src = reader.result;
            }
        } else {
            textbox.text(filesCount + ' files selected');
        }

    } else {
        $(this).val('');
        alert("el archivo debe ser una imagen");
    }
});



  //Actualizar Proveedor//
  function mandarId(idpro) {
    const ruta = "<?= base_url(); ?>/proveedores/actualizar";
    data = {
      id_proveedor: idpro

    }

    $.ajax({
      type: "POST",
      url: ruta,
      dataType: "JSON",
      data: data,
      success: function(response) {

        $("#empresa").val(response[0].name_proveedor);
        $("#marca").val(response[0].Marca);
        $("#contacto").val(response[0].contact);
        $("#phone").val(response[0].phone);
        $("#embark").val(response[0].embark);
        $("#correo").val(response[0].email);
        $("#id").val(response[0].id_proveedor);


      },

    });


  }

  function deleteId(idprove) {
    $("#id_prove").val(idprove);
  }

  //Cálculo de precios y porcentaje de pago en avance
  $('#advancePayment').change( function() {
    const precio = $('#price').val();
    const precio_ad = precio.replace(/[^a-zA-Z 0-9.]+/g, "");
    //alert(precio_ad);
    const priceValue = parseFloat(precio_ad);
    const percentage = parseFloat(document.getElementById("advancePayment").value);
    let totalprice = (percentage*priceValue)/100;
    $('#advancePaymentPrice').val(totalprice);
  });
  //Cálculo de precios y porcentaje de pago en avance antes de carga
  $('#beforeLoading').change( function() {
    const precio = $('#price').val();
    const precio_ad = precio.replace(/[^a-zA-Z 0-9.]+/g, "");
    const priceValue = parseFloat(precio_ad);
    const percentage = parseFloat(document.getElementById("beforeLoading").value);
    let totalprice = (percentage*priceValue)/100;
    $('#priceBeforeLoading').val(totalprice);
  });


  //Obtener productos
  function getProductos(id_provedor) {

    $("#idproverdorx").val(id_provedor);

    const ruta = "<?= base_url(); ?>/proveedores/get_products";

    data = {
      id: id_provedor
    }

    $.ajax({
      type: "POST",
      url: ruta,
      dataType: "JSON",
      data: data,
      success: function(data) {
        let html = '';
        let i;

        for (i = 0; i < data.length; i++) {
          html += '<tr>' +
            '<td>' + data[i].name + '</td>' +
            '<td>' + data[i].type + '</td>' +
            '<td>' + data[i].model + '</td>' +
            '<td>' + data[i].ability + '</td>' +
            '<td>' + '<img src="../../public/images/' + data[i].media_path + '" class="img-thumbnail"/>' + '</td>' +
            '<td>' + '$' + data[i].cost_china + '</td>' +
            '<td>' + '<button class="btn btn-danger" data-toggle="modal" data-target="#delproducto" onclick="productoDelete(' + data[i].id + ')"><i class="fa fa-trash-o mr-1" aria-hidden="true"></i>' + 'Eliminar' + '</button>' + '</td>' +

            '</tr>';
        }

        $('#dataproductos').html(html);

      },
      error: function() {
        alert("Hubo un erro al obtener los datos");
      }

    });
  }

  $(function() {
    $("#getId").on("click", function() {
      const id = $("#idproverdorx").val();
      $("#idform").val(id)

    });

  });


  function productoId(idproducto) {

    const ruta = "<?= base_url(); ?>/proveedores/get_producto";

    data = {
      id_producto: idproducto

    }

    $.ajax({
      type: "POST",
      url: ruta,
      dataType: "JSON",
      data: data,
      success: function(response) {

        $("#precio").val(response[0].cost_china);
        $("#acid").val(response[0].id);


      },

    });

  }

  function productoDelete(idproducto) {
    //alert(idproducto);
    $("#id_product").val(idproducto);

  }


  //'use strict';

  $('#datatable1').DataTable({
    language: {
      searchPlaceholder: 'Buscar...',
      sSearch: '',
      lengthMenu: '_MENU_ Filas por página',
    }
  });

  /*$('#datatable3').DataTable({
    responsive: true,

    language: {
      searchPlaceholder: 'Search...',
      sSearch: '',
      lengthMenu: '_MENU_ items/page',
    }
  });*/

  $('#datatable2').DataTable({
    bLengthChange: false,
    searching: false,
    responsive: true
  });

  // Select2
  $('.dataTables_length select').select2({
    minimumResultsForSearch: Infinity
  });

  



  //Traer productos del proveedor//

  $("select[name=prov]").change(function() {
    let id = $('select[name=prov]').val();
    const ruta = "<?= base_url(); ?>/proveedores/Get_products";

    var getmaquina = $("#select-maquina");

    data = {
      id: id
    }
    console.log(data);

    $.ajax({
      type: "POST",
      url: ruta,
      dataType: "JSON",
      data: data,
      success: function(data) {
        console.log(data);
        $('#select-maquina').empty();
        getmaquina.append('<option  value="">Selecciona Maquina</option>');
        $(data).each(function(i, v) { // indice, valor
                //console.log(v);
                getmaquina.append('<option  value="' + v.id_product + '">' + v.english_name + '</option>');
         })
         price
        //$('#rol').val(data[0].name);

      },
      error: function() {
        alert("Hubo un erro al obtener los datos");
      }

    })


  });

  //MODELO CHINA
  $("select[name=maquina]").change(function() {
    let idproduct = $('select[name=maquina]').val();
    const ruta = "<?= base_url(); ?>/proveedores/get_model_china";

    //alert(idproduct);

    //var getmaquina = $("#maquina");

    data = {
      id: idproduct
    }

    console.log(data);

    $.ajax({
      type: "POST",
      url: ruta,
      dataType: "JSON",
      data: data,
      success: function(data) {
        console.log(data);
        $("#modelchina").val(data[0].model_china);
        $("#idmodelchina").val(data[0].id);
      },
      error: function() {
        alert("Hubo un erro al obtener los datos");
      }

    })


  });

  //Obtener precio del producto//

  $("select[name=maquina]").change(function() {
    let idproduct = $('select[name=maquina]').val();
    const ruta = "<?= base_url(); ?>/proveedores/get_price_x_product";

    //alert(idproduct);

    //var getmaquina = $("#maquina");

    data = {
      id: idproduct
    }

    console.log(data);

    $.ajax({
      type: "POST",
      url: ruta,
      dataType: "JSON",
      data: data,
      success: function(data) {
        console.log(data);
        $("#price").val(data[0].cost_china);
        $("#idpxp").val(data[0].id);


        
        
      },
      error: function() {
        alert("Hubo un erro al obtener los datos");
      }

    })


  });

  //Checkbox cambiar precio

  document.getElementById('pricechange').onchange = function() {
    document.getElementById('price').readOnly = !this.checked;
};


//Formato de moneda
// Jquery Dependency

$("input[data-type='currency']").on({
    keyup: function() {
      formatCurrency($(this));
    },
    blur: function() { 
      formatCurrency($(this), "blur");
    }
});


function formatNumber(n) {
  // format number 1000000 to 1,234,567
  return n.replace(/\D/g, "").replace(/\B(?=(\d{3})+(?!\d))/g, ",")
}


function formatCurrency(input, blur) {
  // appends $ to value, validates decimal side
  // and puts cursor back in right position.
  
  // get input value
  var input_val = input.val();
  
  // don't validate empty input
  if (input_val === "") { return; }
  
  // original length
  var original_len = input_val.length;

  // initial caret position 
  var caret_pos = input.prop("selectionStart");
    
  // check for decimal
  if (input_val.indexOf(".") >= 0) {

    // get position of first decimal
    // this prevents multiple decimals from
    // being entered
    var decimal_pos = input_val.indexOf(".");

    // split number by decimal point
    var left_side = input_val.substring(0, decimal_pos);
    var right_side = input_val.substring(decimal_pos);

    // add commas to left side of number
    left_side = formatNumber(left_side);

    // validate right side
    right_side = formatNumber(right_side);
    
    // On blur make sure 2 numbers after decimal
    if (blur === "blur") {
      right_side += "00";
    }
    
    // Limit decimal to only 2 digits
    right_side = right_side.substring(0, 2);

    // join number by .
    input_val = "$" + left_side + "." + right_side;

  } else {
    // no decimal entered
    // add commas to number
    // remove all non-digits
    input_val = formatNumber(input_val);
    input_val = "$" + input_val;
    
    // final formatting
    if (blur === "blur") {
      input_val += ".00";
    }
  }
  
  // send updated string to input
  input.val(input_val);

  // put caret back in the right position
  var updated_len = input_val.length;
  caret_pos = updated_len - original_len + caret_pos;
  input[0].setSelectionRange(caret_pos, caret_pos);
}


</script>