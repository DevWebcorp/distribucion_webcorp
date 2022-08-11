<link href="../../assets/lib/datatables/jquery.dataTables.css" rel="stylesheet">
<link href="../../assets/lib/select2/css/select2.min.css" rel="stylesheet">
<script src="../../assets/lib/jquery/jquery.js"></script>


<div class="sl-mainpanel ">
  <div class="sl-pagebody">

    <div class="card pd-20 pd-sm-40">
      <h5 class="text-dark">COMPRAS MAQUINARIA</h5>
      <h6 class="card-body-title mg-t-20">Tabla de Compras</h6>
      <div class="table-wrapper">
        <table id="datatable1" class="table table-responsive compras" style="width: 100%;">
          <thead>
            <tr>
              <th class="wd-10p">DATE</th>
              <th class="wd-10p">COMPANY</th>
              <th class="wd-10p">SUPPLIER</th>
              <th class="wd-15p">MACHINE </th>
              <th class="wd-10p">PRICE</th>
              <th class="wd-15p">CLIENTE</th>
              <th class="wd-15p">GENERAR PDF</th>
              <th class="wd-15p">ENVIAR PDF</th>
              <th class="wd-15p">EDITAR</th>
              <th class="wd-15p">ELIMINAR</th>
            </tr>
          </thead>
          <tbody>
            <?php
            foreach ($compra as $data) {
              echo ('<tr>');
              echo ('<td>' . $data['c_date'] . '</td>');
              echo ('<td>' . $data['business_name'] . '</td>');
              echo ('<td>' . $data['name_proveedor'] . '</td>');
              echo ('<td>' . $data['name'] . '</td>');
              echo ('<td>' . '$' . number_format($data['price'], "2") . '</td>');
              echo ('<td>' . '<button class="btn btn-primary" data-toggle="modal" data-target="#modaldemoac" onclick="mandarId(' . $data['id'] . ')" id="actualizar"><i class="fa fa-user mr-1" aria-hidden="true"></i>' . 'CLIENTE' . '</button>' . '</td>');
              echo ('<td>' . '<a href="' . base_url() . '/Generar_Compra/compra_pdf/' . $data['id'] . '" >' . '<button class="btn btn-teal"><i class="fa fa-file-pdf-o mr-1" aria-hidden="true"></i>' . 'Generar PDF' . '</button>' . '</td>');
              echo ('<td>' . '<button class="btn btn_sendemail"  data-target="#modal_email" id="' . $data['id'] . '"><i class="fa fa-envelope-o mr-1" aria-hidden="true"></i>' . 'Enviar correo' . '</button>' . '</td>');
              echo ('<td>' . '<button class="btn btn-warning" data-toggle="modal" data-target="#modalGenerar" onclick="mandarId(' . $data['id'] . ')" id="actualizar"><i class="fa fa-pencil mr-1" aria-hidden="true"></i>' . 'Editar' . '</button>' . '</td>');
              echo ('<td>' . '<button class="btn btn-danger" data-toggle="modal" data-target="#modaldemo2" onclick="deleteId(' . $data['id'] . ')"><i class="fa fa-trash mr-1" aria-hidden="true"></i>' . 'Eliminar' . '</button>' . '</td>');
              echo ('</tr>');
            }

            ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>

<!--Eliminar proveedor-->
<div id="modaldemo2" class="modal fade">
  <div class="modal-dialog modal-sm" role="document">
    <div class="modal-content bd-0 tx-14">
      <div class="modal-header bg-danger pd-x-20">
        <h6 class="tx-14 mg-b-0 tx-uppercase text-white tx-bold">Eliminar Compra</h6>
        <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class=" pd-20">
        <p class="mg-b-5">¿Desea eliminar estos datos?</p>
        <form id="DeleteForm" method="POST" action="<?php echo base_url() ?>/Generar_Compra/delete_compra">
          <input class="form-control" id="id_prove" name="id" type="hidden">
        </form>
      </div>
      <div class="modal-footer justify-content-center">
        <button form="DeleteForm" type="submit" class="btn btn-danger"><i class="fa fa-trash mr-1" aria-hidden="true"></i>Eliminar</button>
        <button type="button" class="btn btn-secondary pd-x-20" data-dismiss="modal"><i class="fa fa-times mr-1" aria-hidden="true"></i>Cancelar</button>
      </div>
    </div>
  </div>
</div>


<!--Modal de Actulizar compra -->
<div id="modalGenerar" class="modal fade">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content tx-size-sm">
      <div class="modal-header bg-warning pd-x-20">
        <h6 class="tx-14 mg-b-0 tx-uppercase text-white tx-bold">Actualizar Compra</h6>
        <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body pd-20">
        <div class="card pd-20 pd-sm-40">
          <h6 class="card-body-title">Datos Para Actualizar Compra</h6>
          <p class="mg-b-20 mg-sm-b-30">Edite el campo a actualizar</p>
          <form id="Ngenerar" method="POST" action="<?php echo base_url() ?>/Generar_Compra/update_compra">
            <div class="form-layout">
              <div class="row mg-b-25">
                <div class="col-lg-4">
                  <div class="form-group">
                    <label class="form-control-label">DATE: <span class="tx-danger">*</span></label>
                    <div class="wd-200">
                      <div class="input-group">
                        <span class="input-group-addon"><i class="icon ion-calendar tx-16 lh-0 op-6"></i></span>
                        <input id="fecha" name="fecha" id="datepickerNoOfMonths" type="date" class="form-control" placeholder="MM/DD/YYYY" required>
                      </div>
                    </div>
                  </div>
                </div>

                <div class="col-lg-4">
                  <div class="form-group">
                    <label class="form-control-label">COMPANY: <span class="tx-danger">*</span></label>
                    <input id="company" class="form-control" type="text" name="model" placeholder="MODEL NAME ON PLATE " required disabled>

                  </div>
                </div>

                <div class="col-lg-4">
                  <div class="form-group">
                    <label class="form-control-label">SUPPLIER : <span class="tx-danger">*</span></label>
                    <input id="name_proveedor" class="form-control" type="text" name="model" placeholder="MODEL NAME ON PLATE " required disabled>

                  </div>
                </div>

                <div class="col-lg-4">
                  <div class="form-group">
                    <label class="form-control-label">MACHINE : <span class="tx-danger">*</span></label>
                    <input id="machine" class="form-control" type="text" name="model" placeholder="MODEL NAME ON PLATE " required disabled>

                  </div>
                </div>

                <div class="col-lg-4">
                  <div class="form-group">
                    <label class="form-control-label">MODEL NAME ON PLATE : <span class="tx-danger">*</span></label>
                    <input id="model" class="form-control" type="text" name="model" placeholder="MODEL NAME ON PLATE " required>
                  </div>
                </div>
                <div class="col-lg-4">
                  <div class="form-group">
                    <label class="form-control-label">SERIAL NUMBER: <span class="tx-danger">*</span></label>
                    <input id="serial" class="form-control" type="text" name="serial" placeholder="SERIAL NUMBER" required>
                  </div>
                </div>
                <div class="col-lg-4">
                  <div class="form-group">
                    <label class="form-control-label">CAPACITY: <span class="tx-danger">*</span></label>
                    <input id="capacity" class="form-control" type="text" name="capacity" placeholder="CAPACITY" required>
                  </div>
                </div>

                <div class="col-lg-4">
                  <div class="form-group">
                    <label class="form-control-label">VOLTAGE: <span class="tx-danger">*</span></label>
                    <input id="voltage" class="form-control" type="text" name="voltage" placeholder="VOLTAGE" required>
                  </div>
                </div>

                <div class="col-lg-4">
                  <div class="form-group">
                    <label class="form-control-label">COLOR OR PAINT: <span class="tx-danger">*</span></label>
                    <input id="color" class="form-control" type="text" name="color" placeholder="COLOR OR PAINT" required>
                  </div>
                </div>
                <div class="col-lg-4">
                  <div class="form-group">
                    <label class="form-control-label">OTHER DETAILS: <span class="tx-danger"></span></label>
                    <input id="others" class="form-control" type="text" name="other" placeholder="OTHER DETAILS">
                  </div>
                </div>
                <div class="col-lg-4">
                  <div class="form-group">
                    <label class="form-control-label">DELIVERY TIME <span class="tx-danger">*</span></label>
                    <input id="delivery" class="form-control" type="text" name="delivery" placeholder="DELIVERY TIME" required>
                  </div>
                </div>
                <div class="col-lg-4">
                  <div class="form-group">
                    <label class="form-control-label">PRICE<span class="tx-danger">*</span></label>
                    <input id="price" readonly="readonly" required class="form-control" type="text" name="currency-field" id="price" pattern="^\d{1,3}(,\d{3})*(\.\d+)?$" value="" data-type="currency" placeholder="$1,000,000.00">
                    <input id="id" class="form-control" type="hidden" name="idpxp" placeholder="PRICE" readonly="readonly" required>
                  </div>
                </div>
                <div class="col-lg-4">
                  <div class="form-group">
                    <input id="pricechange" type="checkbox"><span> Change Price</span>

                  </div>
                </div>

                <div class="col-lg-4">
                  <div class="form-group">
                    <label class="form-control-label">ADVANCE PAYMENT (%)<span class="tx-danger">*</span></label>
                    <input class="form-control" type="number" min="1" step="1" name="advancePayment" id="advancePayment" placeholder="PERCETAGE OF ADVANCE PAYMENT" required>
                  </div>
                </div>
                <div class="col-lg-4">
                  <div class="form-group">
                    <label class="form-control-label">ADVANCE PAYMENT ($)<span class="tx-danger">*</span></label>
                    <input class="form-control" type="text" name="advancePaymentPrice" id="advancePaymentPrice" placeholder="ADVANCE PAYMENT" readonly="readonly" required>
                  </div>
                </div>

                <div class="col-lg-4">
                  <div class="form-group">
                    <label class="form-control-label">PAYMENT BEFORE SHIPMENT (%)<span class="tx-danger">*</span></label>
                    <input class="form-control" type="text" min="1" step="1" name="beforeLoading" id="beforeLoading" placeholder="PERCETAGE OF PAYMENT" required>
                  </div>
                </div>
                <div class="col-lg-4">
                  <div class="form-group">
                    <label class="form-control-label">PAYMENT BEFORE SHIPMENT ($)<span class="tx-danger">*</span></label>
                    <input class="form-control" type="text" name="priceBeforeLoading" id="priceBeforeLoading" placeholder="PAYMENT" readonly="readonly" required>
                  </div>
                </div>

              </div>
            </div>
          </form>
        </div>
        <div class="modal-footer">
          <button type="submit" id="form" form="Ngenerar" class="btn btn-warning pd-x-20"><i class="fa fa-pencil mr-1" aria-hidden="true"></i>Actualizar</button>
          <button type="button" class="btn btn-secondary pd-x-20" data-dismiss="modal"><i class="fa fa-times mr-1" aria-hidden="true"></i>Cancelar</button>
        </div>
      </div>
    </div><!-- modal-dialog -->
  </div><!-- modal -->



  <div id="modal_email" class="modal fade">
    <div class="modal-dialog modal-sm" role="document">
      <div class="modal-content bd-0 tx-14">
        <div class="modal-header pd-x-20">
          <h6 class="tx-14 mg-b-0 tx-uppercase tx-inverse tx-bold">Mandar e-mail</h6>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body pd-20">
          <p class="mg-b-5">Inserte el correo al que desea mandar la compra</p>
          <form id="sendMail" method="POST" action="<?php echo base_url() ?>/Generar_Compra/email">
            <div class="form-group">
              <label class="form-control-label">Correo electrónico <span class="tx-danger">*</span></label>
              <input id="name_correo" class="form-control" type="text" name="name_correo" placeholder="Correo electrónico" required>
              <input type="text" id="id_email" name="id_email" value="" hidden>
            </div>

        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-info pd-x-20">Aceptar</button>
          <button type="button" class="btn btn-secondary pd-x-20" data-dismiss="modal">Cerrar</button>
        </div>
        </form>
      </div>
    </div><!-- modal-dialog -->
  </div><!-- modal -->




  <script src="../../assets/lib/datatables/jquery.dataTables.js"></script>
  <script src="../../assets/lib/datatables-responsive/dataTables.responsive.js"></script>
  <script src="../../assets/lib/select2/js/select2.min.js"></script>





  <script>
    function deleteId(idprove) {
      $("#id_prove").val(idprove);
    }

    //Actualizar compra //

    function mandarId(idcompra) {
      const ruta = "<?= base_url(); ?>/Generar_Compra/get_compra";

      data = {
        id: idcompra

      }

      $.ajax({
        type: "POST",
        url: ruta,
        dataType: "JSON",
        data: data,
        success: function(response) {
          console.log(response);
          let fecha = response.c_date;
          $("#fecha").val(fecha);
          $('#company').val(response.business_name);
          $('#name_proveedor').val(response.name_proveedor);
          $('#machine').val(response.name);
          $('#model').val(response.MODEL);
          $('#serial').val(response.SERIAL_NUMBER);
          $('#capacity').val(response.CAPACITY);
          $('#voltage').val(response.VOLTAGE);
          $('#color').val(response.COLOR);
          $('#others').val(response.OTHER);
          $('#delivery').val(response.DELIVERY);
          $('#price').val(response.price);
          $('#id').val(response.id);
          $('#advancePayment').val(response.before_Payment);
          $('#beforeLoading').val(response.before_Loading);

        },

      });
    }

    //Cálculo de precios y porcentaje de avance de pago
    $('#advancePayment').change(function() {
      const priceValue = parseFloat(document.getElementById("price").value);
      const percentage = parseFloat(document.getElementById("advancePayment").value);
      let totalprice = (percentage * priceValue) / 100;
      $('#advancePaymentPrice').val(totalprice);
    });
    //Cálculo de precios y porcentaje de avance de pago antes de carga
    $('#beforeLoading').change(function() {
      const priceValue = parseFloat(document.getElementById("price").value);
      const percentage = parseFloat(document.getElementById("beforeLoading").value);
      let totalprice = (percentage * priceValue) / 100;
      $('#priceBeforeLoading').val(totalprice);
    });


    //envío de pdf por correo
    $('.btn_sendemail').on('click', function() {
      let id = $(this).attr('id');
      let json = {
        id: id
      };
      $.ajax({
        url: '<?php echo base_url() . '/Generar_Compra/get_email_json' ?>',
        type: "POST",
        data: json,
        dataType: "JSON",
        success: function(success) {
          $('#id_email').val(id);
          $('#name_correo').val(success.email);
          $('#modal_email').modal('show');
        }

      }); //AJAX
    });

    //Checkbox para cambio de precio
    document.getElementById('pricechange').onchange = function() {
      document.getElementById('price').readOnly = !this.checked;
    };


    $("input[data-type='currency']").on({
      keyup: function() {
        formatCurrency($(this));
      },
      blur: function() {
        formatCurrency($(this), "blur");
      }
    });


    function formatNumber(n) {
      return n.replace(/\D/g, "").replace(/\B(?=(\d{3})+(?!\d))/g, ",")
    }


    function formatCurrency(input, blur) {
      var input_val = input.val();
      if (input_val === "") {
        return;
      }
      var original_len = input_val.length;
      var caret_pos = input.prop("selectionStart");
      if (input_val.indexOf(".") >= 0) {
        var decimal_pos = input_val.indexOf(".");
        var left_side = input_val.substring(0, decimal_pos);
        var right_side = input_val.substring(decimal_pos);
        left_side = formatNumber(left_side);
        right_side = formatNumber(right_side);
        if (blur === "blur") {
          right_side += "00";
        }
        right_side = right_side.substring(0, 2);
        input_val = left_side + "." + right_side;

      } else {
        input_val = formatNumber(input_val);
        input_val = input_val;

        if (blur === "blur") {
          input_val += ".00";
        }
      }

      input.val(input_val);
      var updated_len = input_val.length;
      caret_pos = updated_len - original_len + caret_pos;
      input[0].setSelectionRange(caret_pos, caret_pos);
    }

    $('#datatable1').DataTable({
      language: {
        searchPlaceholder: 'Buscar...',
        sSearch: '',
        lengthMenu: '_MENU_ Filas por página',
      }
    });
  </script>