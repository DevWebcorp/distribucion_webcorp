<script src="../../assets/lib/jquery/jquery.js"></script>

<link href="../../assets/lib/datatables/jquery.dataTables.css" rel="stylesheet">
<link href="../../assets/lib/select2/css/select2.min.css" rel="stylesheet">


<!-- ########## START: MAIN PANEL ########## -->
<div class="sl-mainpanel">

    <div class="sl-pagebody">
        <div class="card pd-20 pd-sm-40">

            <div class="sl-page-title">
                <h5>Productos</h5>
                <p class="mg-b-20 mg-sm-b-30">Catálogo de productos</p>
            </div><!-- sl-page-title -->

            <div class="col-md-3">
                <a href="" class="btn btn-success" data-toggle="modal" data-target="#modaldemo1"><i class="fa fa-plus mr-1" aria-hidden="true"></i>Nuevo producto</a><br><br>
            </div>


            <!-- BASIC MODAL -->
            <div id="modaldemo1" class="modal fade">
                <div class="modal-dialog modal-dialog-vertical-center" role="document">
                    <div class="modal-content bd-0 tx-14">
                        <div class="modal-header bg-success pd-y-20 pd-x-25">
                            <h6 class="tx-14 mg-b-0 tx-uppercase text-white tx-bold">Nuevo producto</h6>
                            <button type="button" class="close text-white" data-dismiss="modal" aria-label="Cerrar">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>

                        <form method="POST" action="<?php echo base_url(); ?>/products/crearProducto" enctype="multipart/form-data">
                            <div class=" pd-25">
                                <div class="card pd-20 pd-sm-40 form-layout form-layout-4">
                                    <p class="mg-b-20 mg-sm-b-30">Inserte la información correspondiente en los siguientes campos.</p>
                                    <div class="row">
                                        <label class="col-sm-4 form-control-label">MÁQUINA: <span class="tx-danger">*</span></label>
                                        <div class="col-sm-12 mg-t-10 mg-sm-t-0">
                                            <input type="text" class="form-control" name="nombre" placeholder="Categoría del producto" required>
                                        </div>
                                    </div><!-- row -->

                                    <div class="row mg-t-20">
                                        <label class="col-sm-12 form-control-label">SERIE: <span class="tx-danger">*</span></label>
                                        <div class="col-sm-12 mg-t-10 mg-sm-t-0">
                                            <input type="text" class="form-control" name="serie" placeholder="Serie del producto" required>
                                        </div>
                                    </div>

                                    <div class="row mg-t-20">
                                        <label class="col-sm-12 form-control-label">MODELO: <span class="tx-danger">*</span></label>
                                        <div class="col-sm-12 mg-t-10 mg-sm-t-0">
                                            <input type="text" class="form-control" name="modelo" placeholder="Modelo del producto" required>
                                        </div>
                                    </div>

                                    <div class="row mg-t-20">
                                        <label class="col-sm-12 form-control-label">CAPACIDAD: <span class="tx-danger">*</span></label>
                                        <div class="col-sm-12 mg-t-10 mg-sm-t-0">
                                            <input type="text" class="form-control" name="capacidad" placeholder="Capacidad de producción" required>
                                        </div>
                                    </div>

                                    <div class="row mg-t-20">
                                        <label class="col-sm-12 form-control-label">DESCRIPCIÓN: <span class="tx-danger">*</span></label>
                                        <div class="col-sm-12 mg-t-10 mg-sm-t-0">
                                            <textarea rows="2" class="form-control" name="descripcion" placeholder="Breve descripción" required></textarea>
                                        </div>
                                    </div>

                                    <div class="row mg-t-20">
                                        <label class="col-sm-12 form-control-label">NOMBRE EN INGLES: <span class="tx-danger">*</span></label>
                                        <div class="col-sm-12 mg-t-10 mg-sm-t-0">
                                            <input type="text" class="form-control" name="namei" placeholder="Nombre en ingles" required>
                                        </div>
                                    </div>

                                    <div class="row mg-t-20">
                                        <label class="col-sm-12 form-control-label">IMAGEN DEL PRODUCTO: <span class="tx-danger">*</span></label>
                                        <div class="col-sm-12 mg-t-10 mg-sm-t-0">
                                            <input type="file" class="form-control" name="foto" />
                                        </div>
                                    </div><!-- row -->

                                    <div class="row mg-t-20">
                                        <label class="col-sm-12 form-control-label">COSTO CHINA: <span class="tx-danger">*</span></label>
                                        <div class="col-sm-12 mg-t-10 mg-sm-t-0">
                                            <input required class="form-control" type="text" name="currency-field" id="price" pattern="^\$\d{1,3}(,\d{3})*(\.\d+)?$" value="" data-type="currency" placeholder="Costo China">
                                        </div>
                                    </div><!-- row -->

                                    <div class="row mg-t-20">
                                        <label class="col-sm-12 form-control-label">MODELO CHINA: <span class="tx-danger">*</span></label>
                                        <div class="col-sm-12 mg-t-10 mg-sm-t-0">
                                            <input class="form-control" type="text" name="modelochino" placeholder="Modelo china" required>
                                        </div>
                                    </div>

                                    <div class="row mg-t-20">
                                        <label class="col-sm-12 form-control-label">FICHA TECNICA: <span class="tx-danger">*</span></label>
                                        <div class="col-sm-12 mg-t-10 mg-sm-t-0">
                                            <input type="file" class="form-control" name="ficha" />
                                        </div>
                                    </div><!-- row -->


                                    <div class="row mg-t-20">
                                        <label class="col-sm-12 form-control-label">PRECIO DE VENTA: <span class="tx-danger">*</span></label>
                                        <div class="col-sm-12 mg-t-10 mg-sm-t-0">
                                            <input required class="form-control" type="text" name="field" id="price" pattern="^\$\d{1,3}(,\d{3})*(\.\d+)?$" value="" data-type="currency" placeholder="Precio de Venta">
                                        </div>
                                    </div><!-- row -->

                                    <div class="row mg-t-20">
                                        <label class="col-sm-12 form-control-label">DÍAS DE ENTREGA: <span class="tx-danger">*</span></label>
                                        <div class="col-sm-12 mg-t-10 mg-sm-t-0">
                                            <input type="number" class="form-control" name="entrega" placeholder="Días de entrega" required>
                                        </div>
                                    </div>

                                    <div class="row mg-t-20">
                                        <label class="col-sm-12 form-control-label">DÍAS DE FABRICACIÓN: <span class="tx-danger">*</span></label>
                                        <div class="col-sm-12 mg-t-10 mg-sm-t-0">
                                            <input type="number" class="form-control" name="fabricacion" placeholder="Días de fabricación" required>
                                        </div>
                                    </div>

                                    <div class="row mg-t-20">
                                        <label class="col-sm-12 form-control-label">Link de youtube: <span class="tx-danger">*</span></label>
                                        <div class="col-sm-12 mg-t-10 mg-sm-t-0">
                                            <input type="text" class="form-control" name="youtube" placeholder="Link de youtube" required>
                                        </div>
                                    </div>

                                    <div class="row mg-t-20">
                                        <label class="col-sm-12 form-control-label">Empresa: <span class="tx-danger">*</span></label>
                                        <div class="col-sm-12 mg-t-10 mg-sm-t-0">
                                            <select id="empleado" name="empresa" class="form-control select2" data-placeholder="Choose country" required>
                                                <option value="" name="empresa">Selecciona Empresa</option>
                                                <?php
                                                foreach ($get_empresas as $empresa) {
                                                    echo ('<option  value="' . $empresa->id . '" name="empresa">' . $empresa->business_name . '</option>');
                                                }
                                                ?>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="row mg-t-20">
                                        <label class="col-sm-12 form-control-label">Proveedor: <span class="tx-danger">*</span></label>
                                        <div class="col-sm-12 mg-t-10 mg-sm-t-0">
                                            <select id="proveedor" name="proveedor_producto" class="form-control select2" data-placeholder="Choose country" required>
                                                <option value="" name="proveedor_producto">Selecciona Proveedor</option>
                                                <?php
                                                foreach ($get_proveedores as $proveedor) {
                                                    echo ('<option  value="' . $proveedor->id_proveedor . '" name="proveedor_producto">' . $proveedor->name_proveedor . '</option>');
                                                }  
                                                ?>
                                            </select>
                                        </div>
                                    </div>
                                </div><!-- card -->
                            </div>
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-success pd-x-20"><i class="fa fa-plus mr-1" aria-hidden="true"></i>Agregar producto</button>
                                <button type="button" class="btn btn-secondary pd-x-20" data-dismiss="modal"><i class="fa fa-times mr-1" aria-hidden="true"></i>Cancelar</button>
                            </div>
                        </form>
                    </div>
                </div><!-- modal-dialog -->
            </div><!-- modal -->

            <div class="">
                <table id="datatable1" class="table table-responsive productos" style="width: 100%;">
                    <thead>
                        <tr>
                            <th class="wd-15p">IMAGEN/th>
                            <th class="wd-15p">EMPRESA</th>
                            <th class="wd-15p">MÁQUINA</th>
                            <th class="wd-15p">SERIE</th>
                            <th class="wd-15p">MODELO</th>
                            <th class="wd-15p">CAPACIDAD</th>
                            <th class="wd-15p">PRECIO DE VENTA</th>
                            <th class="wd-15p">TIEMPO DE ENTREGA</th>
                            <th class="wd-15p">ACCIONES</th>
                            
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $count = 0;
                        foreach ($productos as $producto) :
                            $count++;
                          
                        ?>
                            <tr>
                                <td><img style="width: 50%;" src="../../public/images/<?php echo $producto->media_path; ?> " class="img-thumbnail" /></td>
                                <td> <?php echo $producto->business_name; ?></td>
                                <td><?php echo $producto->name; ?></td>
                                <td> <?php echo $producto->type; ?></td>
                                <td> <?php echo $producto->model; ?></td>
                                <td> <?php echo $producto->ability; ?></td>
                                <td> <?php echo number_format($producto->su_price,2,'.',','); ?></td>
                                <td> <?php echo $producto->delivery_time; ?></td>
                                <td>
                                    <div class="d-flex">
                                        <button onclick="ActualizarId(<?php echo $producto->id; ?>)" id="<?php echo $producto->id; ?>" data-toggle="modal" data-target="#modal_update" class="btn btn-warning btn-update pd-x-20 mr-1"><i class="fa fa-eye" aria-hidden="true"></i>Detalles</button>
                                        <button onclick="mandarId(<?php echo $producto->id; ?>)" data-toggle="modal" data-target="#modal_delete" class="btn btn btn-danger pd-x-20"><i class="fa fa-trash mr-1" aria-hidden="true"></i>Eliminar</button>
                                    </div>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div><!-- table-wrapper -->
        </div><!-- card -->

        <!--Modal delete-->
        <div id="modal_delete" class="modal fade">
            <div class="modal-dialog modal-sm" role="document">
                <div class="modal-content bd-0 tx-14">
                    <div class="modal-header bg-danger pd-x-20">
                        <h6 class="tx-14 mg-b-0 tx-uppercase text-white tx-bold">Elimianr producto</h6>
                        <button type="button" class="close text-white" data-dismiss="modal" aria-label="Cerrar">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form method="POST" action="<?php echo base_url() . '/Products/delete_product' ?>">
                        <div class=" pd-20">
                            <p class="mg-b-5">¿Desea eliminar este producto? </p>
                            <input type="hidden" name="id_delete" id="id_delete">
                        </div>
                        <div class="modal-footer justify-content-center">
                            <button type="submit" class="btn btn-danger pd-x-20"><i class="fa fa-trash mr-1" aria-hidden="true"></i>Eliminar</button>
                            <button type="button" class="btn btn-secondary pd-x-20" data-dismiss="modal"><i class="fa fa-times mr-1" aria-hidden="true"></i>Cancelar</button>
                        </div>
                    </form>
                </div>
            </div><!-- modal-dialog -->
        </div><!-- modal -->

        <div id="modal_update" class="modal fade">
            <div class="modal-dialog modal-dialog-vertical-center" role="document">
                <div class="modal-content bd-0 tx-14">
                    <div class="modal-header bg-warning pd-y-20 pd-x-25">
                        <h6 class="tx-14 mg-b-0 tx-uppercase text-white tx-bold">Actualizar producto</h6>
                        <button type="button" class="close text-white" data-dismiss="modal" aria-label="Cerrar">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form method="POST" action="<?php echo base_url() . '/Products/actualizarProducto' ?>" enctype="multipart/form-data">
                        <div class="pd-25">
                            <div class="card pd-20 pd-sm-40 form-layout form-layout-4">
                                <p class="mg-b-20 mg-sm-b-30">Edite el campo que quiere actualizar.</p>
                                <p class="mg-b-20 mg-sm-b-30">Atención: cargar una nueva imagen reemplazará la anterior</p>
                                <div class="row">
                                    <input type="hidden" name="idproducto" id="id_producto">
                                    <label class="col-sm-4 form-control-label">MAQUINA: <span class="tx-danger">*</span></label>
                                    <div class="col-sm-12 mg-t-10 mg-sm-t-0">
                                        <input type="text" class="form-control" name="update_nombre" id="update_nombre" placeholder="Categoría del producto" required>
                                    </div>
                                </div><!-- row -->

                                <div class="row mg-t-20">
                                    <label class="col-sm-12 form-control-label">SERIE: <span class="tx-danger">*</span></label>
                                    <div class="col-sm-12 mg-t-10 mg-sm-t-0">
                                        <input type="text" class="form-control" name="update_serie" id="update_serie" placeholder="Serie del producto" required>
                                    </div>
                                </div>

                                <div class="row mg-t-20">
                                    <label class="col-sm-12 form-control-label">MODELO: <span class="tx-danger">*</span></label>
                                    <div class="col-sm-12 mg-t-10 mg-sm-t-0">
                                        <input type="text" class="form-control" name="update_modelo" id="update_modelo" placeholder="Modelo del producto" required>
                                    </div>
                                </div>

                                <div class="row mg-t-20">
                                    <label class="col-sm-12 form-control-label">CAPACIDAD: <span class="tx-danger">*</span></label>
                                    <div class="col-sm-12 mg-t-10 mg-sm-t-0">
                                        <input type="text" class="form-control" name="update_capacidad" id="update_capacidad" placeholder="Capacidad de producción" required>
                                    </div>
                                </div>

                                <div class="row mg-t-20">
                                    <label class="col-sm-12 form-control-label">DESCRIPCIÓN: <span class="tx-danger">*</span></label>
                                    <div class="col-sm-12 mg-t-10 mg-sm-t-0">
                                        <textarea rows="2" class="form-control" name="update_descripcion" id="update_descripcion" placeholder="Breve descripción" required></textarea>
                                    </div>
                                </div>

                                <div class="row mg-t-20">
                                    <label class="col-sm-12 form-control-label">NOMBRE EN INGLES: <span class="tx-danger">*</span></label>
                                    <div class="col-sm-12 mg-t-10 mg-sm-t-0">
                                        <input type="text" class="form-control" name="update_namei" id="update_namei" placeholder="Nombre en ingles" required>
                                    </div>
                                </div>
                               
                                <div class="row mg-t-20">
                                    <label class="col-sm-12 form-control-label">Imagen del producto: <span class="tx-danger">*</span></label>
                                    <div class="col-sm-12 mg-t-10 mg-sm-t-0">
                                        <input type="file" class="form-control" name="foto" id="foto" />
                                        <input type="hidden" name="nameimg" id="nameimg">
                                    </div>
                                </div><!-- row -->

                                <div class="row">
                                    <div id="imagen" class="col-lg-4">

                                    </div>
                                </div>

                                <div class="row mg-t-20">
                                    <label class="col-sm-12 form-control-label">COSTO CHINA: <span class="tx-danger">*</span></label>
                                    <div class="col-sm-12 mg-t-10 mg-sm-t-0">
                                        <input required class="form-control" type="text" name="update_precio_real_sugerido" id="update_precio_real_sugerido" pattern="^\$\d{1,3}(,\d{3})*(\.\d+)?$" value="" data-type="currency" placeholder="Costo de venta">
                                    </div>
                                </div><!-- row -->

                                <div class="row mg-t-20">
                                    <label class="col-sm-12 form-control-label">MODELO CHINA: <span class="tx-danger">*</span></label>
                                    <div class="col-sm-12 mg-t-10 mg-sm-t-0">
                                        <input class="form-control" type="text" id="update_modelo_china"  name="update_modelo_china" placeholder="Modelo china" required>
                                    </div>
                                </div>

                                <div class="row mg-t-20">
                                    <label class="col-sm-12 form-control-label">FICHA TÉCNICA: <span class="tx-danger"></span></label>
                                    <div class="row mg-t-20">
                                        <div id="archivo" class="col-lg-12">

                                        </div>
                                    </div>
                                    <div class="col-sm-12 mg-t-10 mg-sm-t-0">
                                        <input type="file" class="form-control" name="ficha" id="ficha" />
                                        <input type="hidden" class="form-control" name="fichatecnica" id="fichatecnica" />
                                    </div>
                                </div><!-- row -->

                                <div class="row mg-t-20">
                                    <label class="col-sm-12 form-control-label">PRECIO DE VENTA: <span class="tx-danger">*</span></label>
                                    <div class="col-sm-12 mg-t-10 mg-sm-t-0">
                                        <input required class="form-control" type="text" name="update_precio_real_venta" id="update_precio_real_venta" pattern="^\$\d{1,3}(,\d{3})*(\.\d+)?$" value="" data-type="currency" placeholder="Precio de Venta" />
                                    </div>
                                </div><!-- row -->

                                <div class="row mg-t-20">
                                    <label class="col-sm-12 form-control-label">TIEMPO DE ENTREGA: <span class="tx-danger">*</span></label>
                                    <div class="col-sm-12 mg-t-10 mg-sm-t-0">
                                        <input required type="text" class="form-control" name="update_entrega" id="entrega" placeholder="Tiempo de entrega">
                                    </div>
                                </div>

                                <div class="row mg-t-20">
                                    <label class="col-sm-12 form-control-label">TIEMPO DE FABRICACIÓN: <span class="tx-danger">*</span></label>
                                    <div class="col-sm-12 mg-t-10 mg-sm-t-0">
                                        <input required type="text" class="form-control" name="update_fabricacion" id="fabricacion" placeholder="Tiempo de fabricación">
                                    </div>
                                </div>

                                <div class="row mg-t-20">
                                    <label class="col-sm-12 form-control-label">Link de youtube: <span class="tx-danger">*</span></label>
                                    <div class="col-sm-12 mg-t-10 mg-sm-t-0">
                                        <input required type="text" class="form-control" name="update_youtube" id="update_youtube" placeholder="Link de youtube">
                                    </div>
                                </div>

                                <div class="row mg-t-20">
                                    <label class="col-sm-12 form-control-label">Empresa: <span class="tx-danger">*</span></label>
                                    <div class="col-sm-12 mg-t-10 mg-sm-t-0">
                                        <select id="id_empresa" name="empresa" class="form-control select2" data-placeholder="Choose country" required>
                                            <option value="" name="empresa">Selecciona Empresa</option>
                                            <?php
                                            foreach ($get_empresas as $empresa) {
                                                echo ('<option  value="' . $empresa->id . '" name="empresa">' . $empresa->business_name . '</option>');
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>

                                <div class="row mg-t-20">
                                    <label class="col-sm-12 form-control-label">Proveedor: <span class="tx-danger">*</span></label>
                                    <div class="col-sm-12 mg-t-10 mg-sm-t-0">
                                        <select id="upd_proveedor" name="proveedor_producto" class="form-control select2" data-placeholder="Choose country" required>
                                            <option value="" name="proveedor_producto">Selecciona Proveedor</option>
                                            <?php
                                            foreach ($get_proveedores as $proveedor) {
                                                echo ('<option  value="' . $proveedor->id_proveedor . '" name="proveedor_producto">' . $proveedor->name_proveedor . '</option>');
                                            }  
                                            ?>
                                        </select>
                                    </div>
                                </div>

                            </div><!-- card -->
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-warning pd-x-20"><i class="fa fa-pencil mr-1" aria-hidden="true"></i>Actualizar producto</button>
                            <button type="button" class="btn btn-secondary pd-x-20" data-dismiss="modal"><i class="fa fa-times mr-1" aria-hidden="true"></i>Cancelar</button>
                        </div>
                    </form>

                </div>
            </div><!-- modal-dialog -->
        </div><!-- modal -->




        <script src="../../assets/lib/datatables/jquery.dataTables.js"></script>
        <script src="../../assets/lib/datatables-responsive/dataTables.responsive.js"></script>
        <script src="../../assets/lib/select2/js/select2.min.js"></script>

        <script>
            $('#datatable1').DataTable({
                language: {
                    searchPlaceholder: 'Buscar...',
                    sSearch: '',
                    lengthMenu: '_MENU_ Filas por página',
                }
            });

            function mandarId(id) {
                $("#id_delete").val(id);
            }

            function ActualizarId(id) {
                let json = {
                    id: id
                };

                $.ajax({
                    url: '<?php echo base_url() . '/Products/get_data' ?>',
                    type: "POST",
                    data: json,
                    dataType: "JSON",
                    success: function(success) {
                        console.log(success);
                        $('#id_producto').val(success[0].id);
                        $('#update_nombre').val(success[0].name);
                        $('#update_serie').val(success[0].type);
                        $('#update_modelo').val(success[0].model);
                        $('#update_capacidad').val(success[0].ability);
                        $('#update_descripcion').val(success[0].description);
                        $('#update_namei').val(success[0].english_name);
                        $('#update_precio_real_sugerido').val(success[0].cost_china);
                        $('#update_modelo_china').val(success[0].model_china);
                        $('#update_precio_real_venta').val(success[0].su_price);
                        $('#nameimg').val(success[0].media_path);
                        $('#fichatecnica').val(success[0].file_path);
                        $('#entrega').val(success[0].delivery_time);
                        $('#fabricacion').val(success[0].manufacture_time);
                        $('#update_youtube').val(success[0].link_youtube);
                        $('#id_empresa').val(success[0].business_id);
                        $('#upd_proveedor').val(success[0].proveedor_id);

                        let html = '';
                        html += '<img src="../../public/images/' + success[0].media_path + '" class="img-thumbnail" style="height =80px"/>'
                        $('#imagen').html(html);


                        let html2 = '';
                        html2 += '<a href="../../public/FichaTecnica/' + success[0].file_path + '" target="_blank">' + success[0].file_path + '</a>'
                        $('#archivo').html(html2);

                    }

                }); //AJAX

            }



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
                if (input_val === "") {
                    return;
                }

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