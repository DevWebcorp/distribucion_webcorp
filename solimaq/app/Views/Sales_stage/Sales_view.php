      <script src="../../assets/lib/jquery/jquery.js"></script>

      <link href="../../assets/lib/datatables/jquery.dataTables.css" rel="stylesheet">
      <link href="../../assets/lib/select2/css/select2.min.css" rel="stylesheet">


      <!-- ########## START: MAIN PANEL ########## -->
      <div class="sl-mainpanel">

          <div class="sl-pagebody">
              <div class="card pd-20 pd-sm-40">


              <div class="sl-page-title">
                  <h5><?php echo $title; ?></h5>
                  <p><?php echo $description; ?></p>
              </div><!-- sl-page-title -->

                  <div class="col-md-3">
                      <button id="btn-insert" class="btn btn-success pd-x-20"><i class="fa fa-plus mr-1" aria-hidden="true"></i>Nuevo estado de venta</button><br><br>
                  </div>


                  <!-- BASIC MODAL -->
                  <div id="insert_sales_stage" class="modal fade">
                      <div class="modal-dialog modal-dialog-vertical-center" role="document">
                          <div class="modal-content bd-0 tx-14">
                              <div class="modal-header bg-success pd-y-20 pd-x-25">
                                  <h6 class="tx-14 mg-b-0 tx-uppercase text-white tx-bold">Nueva etapa de venta</h6>
                                  <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                                      <span aria-hidden="true">&times;</span>
                                  </button>
                              </div>

                              <form method="POST" action="<?php echo base_url() . '/Sales_stage/insert_sales' ?>">
                                  <div class=" pd-25">
                                      <div class="card pd-20 pd-sm-40 form-layout form-layout-4">
                                          <p class="mg-b-20 mg-sm-b-30">Inserte por favor los siguientes campos.</p>
                                          <div class="row">
                                              <label class="col-12 form-control-label">Nombre de etapa de venta: <span class="tx-danger">*</span></label>
                                              <div class="col-sm-12 mg-t-10 mg-sm-t-0">
                                                  <input type="text" class="form-control" name="name" placeholder="Nombre de etapa de venta" required>
                                              </div>
                                          </div><!-- row -->

                                          <div class="row mg-t-20">
                                              <label class="col-12 form-control-label">Descripción: <span class="tx-danger">*</span></label>
                                              <div class="col-sm-12 mg-t-10 mg-sm-t-0">
                                                  <textarea rows="2" class="form-control" name="descripcion" placeholder="Descripción" required></textarea>
                                              </div>
                                          </div>

                                      </div><!-- card -->
                                  </div>
                                  <div class="modal-footer">
                                      <button type="submit" class="btn btn-success pd-x-20"><i class="fa fa-plus mr-1" aria-hidden="true"></i>Agregar</button>
                                      <button type="button" class="btn btn-secondary pd-x-20" data-dismiss="modal"><i class="fa fa-times mr-1" aria-hidden="true"></i>Cancelar</button>
                                  </div>
                              </form>
                          </div>
                      </div><!-- modal-dialog -->
                  </div><!-- modal -->



                  <div class="table-wrapper">
                      <table id="datatable1" class="table table-responsive etapas-venta" style="width: 100%;">
                          <thead>
                              <tr>
                                  <th class="wd-15p">Nombre</th>
                                  <th class="wd-15p">Descripcion de la venta</th>
                                  <th class="wd-15p">Acciones</th>
                              </tr>
                          </thead>
                          <tbody>

                              <?php foreach ($sales_stage as $key) : ?>
                                  <tr>

                                      <td><?php echo $key['name']; ?></td>
                                      <td> <?php echo $key['description']; ?></td>

                                      <td>
                                          <div class="d-flex">
                                              <button id="<?php echo $key['id']; ?>" data-toggle="modal" data-target="#modal_update" class="btn btn-warning btn-update pd-x-20 mr-1"><i class="fa fa-pencil mr-1" aria-hidden="true"></i>Actualizar</button>
                                              <button id="<?php echo $key['id']; ?>" data-toggle="modal" data-target="#modal_delete" class="btn btn btn-danger pd-x-20"><i class="fa fa-trash mr-1" aria-hidden="true"></i>Eliminar</button>
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
                              <h6 class="tx-14 mg-b-0 tx-uppercase text-white tx-bold">Eliminar</h6>
                              <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">&times;</span>
                              </button>
                          </div>
                          <form method="POST" action="<?php echo base_url() . '/Sales_stage/delete_sales_stage' ?>">
                              <div class="pd-20">
                                  <p class="mg-b-5">¿Desea eliminar estos datos? </p>
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
                              <h6 class="tx-14 mg-b-0 tx-uppercase text-white tx-bold">Actualizar etapa de venta</h6>
                              <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">&times;</span>
                              </button>
                          </div>
                          <form method="POST" action="<?php echo base_url() . '/Sales_stage/update_sales_stage' ?>">
                              <div class=" pd-25">
                                  <div class="card pd-20 pd-sm-40 form-layout form-layout-4">
                                      <p class="mg-b-20 mg-sm-b-30">Edite el campo que quiere actualizar.</p>
                                      <div class="row">
                                           <label class="col-12 form-control-label">Nombre de etapa de venta: <span class="tx-danger">*</span></label>
                                          <div class="col-sm-12 mg-t-10 mg-sm-t-0">
                                              <input type="text" class="form-control" name="update_name" id="update_name" placeholder="Nombre de etapa de venta" required>
                                          </div>
                                      </div><!-- row -->

                                      <div class="row mg-t-20">
                                           <label class="col-12 form-control-label">Descripción: <span class="tx-danger">*</span></label>
                                          <div class="col-sm-12 mg-t-10 mg-sm-t-0">
                                              <textarea rows="2" class="form-control" name="update_descripcion" id="update_descripcion" placeholder="Descripcion" required></textarea>
                                              <input type="hidden" name="id_sales" id="id_sales">
                                          </div>
                                      </div>

                                  </div><!-- card -->
                              </div>
                              <div class="modal-footer">
                                  <button type="submit" class="btn btn-warning pd-x-20"><i class="fa fa-pencil mr-1" aria-hidden="true"></i>Actualizar</button>
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
                  $(document).ready(function() {
                      $('.btn-update').on('click', function() {
                          let id_buton = $(this).attr('id');
                          let json = {
                              id: id_buton
                          };
                          $.ajax({
                              url: '<?php echo base_url() . '/Sales_stage/get_sales_json' ?>',
                              type: "POST",
                              data: json,
                              dataType: "JSON",
                              success: function(success) {
                                  console.log(success);
                                  $('#id_sales').val(id_buton);
                                  $('#update_name').val(success.name);
                                  $('#update_descripcion').val(success.description);

                              }

                          }); //AJAX

                          $('#modal_update').modal('show');
                      });

                  }); //Ready function

                  $('#datatable1').DataTable({
                      language: {
                          searchPlaceholder: 'Buscar...',
                          sSearch: '',
                          lengthMenu: '_MENU_ Filas por página',
                      }
                  });

                  $('.btn-danger').on('click', function() {

                      let id = $(this).attr('id');
                      $('#id_delete').val(id);
                      $('#modal_delete').modal('show');

                  });


                  $('#btn-insert').on('click', function() {
                      $('#insert_sales_stage').modal('show');
                  });
              </script>