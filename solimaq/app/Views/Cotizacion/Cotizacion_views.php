<script src="../../assets/lib/jquery/jquery.js"></script>

<link href="../../assets/lib/datatables/jquery.dataTables.css" rel="stylesheet">
<link href="../../assets/lib/select2/css/select2.min.css" rel="stylesheet">
<script type="text/javascript">

  let mensaje_email=<?php echo $error_email;?>;

  if(mensaje_email==1){
    alert('No se pudo mandar el email , intentalo mas tarde.');
  }

</script>

<!-- ########## START: MAIN PANEL ########## -->
<div class="sl-mainpanel">

    <div class="sl-pagebody">
        <div class="sl-page-title">
        </div><!-- sl-page-title -->
        <div class="card pd-20 pd-sm-40">
            <div>
              <button id="btn-insert" class="btn btn-info pd-x-20"><i class="fa fa-plus" aria-hidden="true"></i> Nueva cotizacion</button>
              <button  class="btn btn-success pd-x-20"><a  style="color:white;" href="<?php echo base_url().'/cotizaciones/view_table_contizaciones';?>"><i class="fa fa-file" aria-hidden="true"></i> Generar pdf lista</a></button>
              <button id='all_list_cotizacion' class="btn btn-teal pd-x-20"><i class="fa fa-list" aria-hidden="true"></i> Listar cotizaciones</button>
              <br><br>
            </div>


            <!-- BASIC MODAL -->
            <div id="insert_Cotizaciones" class="modal fade">
                <div class="modal-dialog modal-dialog-vertical-center" role="document">
                    <div class="modal-content bd-0 tx-14">
                        <div class="modal-header pd-y-20 pd-x-25">
                            <h6 class="tx-14 mg-b-0 tx-uppercase tx-inverse tx-bold">Insertar Nueva cotizacion</h6>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>

                        <form method="POST" action="<?php echo base_url().'/Cotizaciones/insert_cotizacion'?>">
                            <div class="modal-body pd-25">
                                <div class="card pd-20 pd-sm-40 form-layout form-layout-4">
                                    <h6 class="card-body-title">Nueva cotizacion</h6>
                                    <p class="mg-b-20 mg-sm-b-30">Inserte por favor los siguientes campos.</p>
                                    <div class="row">
                                        <!--   <label class="col-sm-4 form-control-label">Nombre de cotizacion: <span class="tx-danger">*</span></label>-->
                                        <div class="col-sm-12 mg-t-10 mg-sm-t-0">
                                          <label>Vendedor</label>

                                          <?php if($id_group==1){
                                            echo "<select name='id_user_vendor' class='form-control'>";
                                               foreach($users as $key){
                                                echo "<option value='".$key['id']."'> ".$key['user_name']."</option>";
                                               }


                                            echo "</select>";
                                          }else{
                                            echo "<br><label>".$get_token['user_name']."</label><br>";
                                            echo "<input type='hidden' name='id_user_vendor' id='".$get_token['id']."' value=".$get_token['id'].">";
                                          }?>

                                        </div>

                                    </div><!-- row -->
                                    <div class="row mg-t-20">
                                        
                                        <label>Selecciona</label>
                                        <select name="selected_type_client" id="selected_type_client" class="form-control">
                                            <option value="">Selecciona</option>
                                            <option value="1">Nuevo cliente</option>
                                            <option value="2">Cliente existente</option>    
                                        </select>

                                        
                                        
                                        
                                    </div>
                                    <div class="row mg-t-20" id="append_new_client">
                                            
                                        </div>

                                    <div id="append_new_selected_empresa">

                                        </div>

                                    <div class="col-sm-12 mg-t-10 mg-sm-t-0" id="append_checkbox">

                                    </div>


                                    
                                </div><!-- card -->
                            </div>
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-info pd-x-20">Insertar cotizacion</button>
                                <button type="button" class="btn btn-secondary pd-x-20" data-dismiss="modal">Cerrar</button>
                            </div>
                        </form>
                    </div>
                </div><!-- modal-dialog -->
            </div><!-- modal -->



            <div class="table-wrapper">
                <table id="datatable1" class="table display responsive nowrap">
                    <thead>
                        <tr>
                          <th class="wd-15p">Fecha</th>
                            <th class="wd-15p">Vendedor</th>
                            <th class="wd-15p">Cliente</th>
                            <th class="wd-15p">Empresa</th>

                            <th class="wd-15p">Correo</th>
                            <th class="wd-15p">Telefono</th>
                            <th class="wd-15p">Comprobante</th>
                            <th class="wd-15p">Maquina</th>
                            <th class="wd-15p">Modelo</th>
                            <th class="wd-15p">Precio venta</th>
                            <th class="wd-15p">Enviar email</th>
                            <th class="wd-15p">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>


                       <?php foreach($vendor as $key1):?>
                            <tr>
                                <td><?php echo date('m-d-y',strtotime( $key1['c_date']));?></td>
                                <td><?php echo $key1['user_name'];?></td>
                                <td><?php echo $key1['name'];?></td>
                                <td><?php echo $key1['empresa'];?></td>
                                <td><?php echo $key1['email'];?></td>
                                <td><?php echo $key1['mobile'];?></td>
                                <td><a href='<?php echo base_url().'/Cotizacion_products/report_view/'.$key1['id_cotization']?>'>Ver comprobante</a></td>
                                <td><?php echo $key1['maquina'];?></td>
                                <td><?php echo $key1['model'];?></td>
                                <td><?php echo number_format($key1['price'],2,'.',',');?></td>
                                <td><button class="btn_sendemail" id='<?php echo $key1["id_cotization"] ?>'>Email</button></td>
                                <td><button id='<?php echo $key1["id_cotization"]; ?>' data-toggle="modal" data-target="#modal_update" class="btn btn-warning btn-update pd-x-20"><i class = "fa fa-pencil mr-1" aria-hidden="true"></i> Actualizar</button>
                                  <button id='<?php echo $key1["id_cotization"];?>' data-toggle="modal" data-target="#modal_delete" class="btn btn btn-danger pd-x-20"><i class = "fa fa-trash mr-1" aria-hidden="true"></i> Eliminar</button>
                                  <button class="btn btn-success pd-x-20" data-toggle="modal" data-target="#modaldemo3" onclick="cliente('<?php echo $key1['id_cotization'].','. $key1['id_client']?>')"><i class="fa fa-user-plus" aria-hidden="true"></i> Generar pdf productos</button></td>

                               

                            </tr>
                       <?php endforeach;?>

                    </tbody>
                </table>
            </div><!-- table-wrapper -->
        </div><!-- card -->

        <!--Modal delete-->
        <div id="modal_delete" class="modal fade">
            <div class="modal-dialog modal-sm" role="document">
                <div class="modal-content bd-0 tx-14">
                    <div class="modal-header pd-x-20">
                        <h6 class="tx-14 mg-b-0 tx-uppercase tx-inverse tx-bold">Notice</h6>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form method="POST" action="<?php echo base_url().'/Cotizaciones/delete_cotizaciones'?>">
                        <div class="modal-body pd-20">
                            <p class="mg-b-5">¿Estas Seguro que quieres eliminar ? </p>
                            <input type="hidden" name="id_delete" id="id_delete">
                        </div>
                        <div class="modal-footer justify-content-center">
                            <button type="submit" class="btn btn-info pd-x-20">Eliminar</button>
                            <button type="button" class="btn btn-secondary pd-x-20" data-dismiss="modal">Close</button>
                        </div>
                    </form>
                </div>
            </div><!-- modal-dialog -->
        </div><!-- modal -->

        <div id="modal_update" class="modal fade">
            <div class="modal-dialog modal-dialog-vertical-center" role="document">
                <div class="modal-content bd-0 tx-14">
                    <div class="modal-header pd-y-20 pd-x-25">
                        <h6 class="tx-14 mg-b-0 tx-uppercase tx-inverse tx-bold">Actualizar cotizacion</h6>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>


                    <form method="POST" action="<?php echo base_url().'/Cotizaciones/update_cotizaciones'?>">
                        <div class="modal-body pd-25">
                            <div class="card pd-20 pd-sm-40 form-layout form-layout-4">
                                <h6 class="card-body-title">Actualizar cotizacion</h6>
                                <p class="mg-b-20 mg-sm-b-30">Inserte por favor los siguientes campos.</p>
                                <div class="row">
                                        <!--   <label class="col-sm-4 form-control-label">Nombre de cotizacion: <span class="tx-danger">*</span></label>-->
                                        <div class="col-sm-12 mg-t-10 mg-sm-t-0">
                                          <label>Vendedor</label>
                                            <select name="id_user_vendor_update" id="id_user_vendor_update" class="form-control">
                                              <?php foreach($users as $key):?>
                                                <option value="<?= $key['id']?>"><?= $key['user_name']?></option>
                                              <?php endforeach;?>
                                            </select>
                                        </div>

                                    </div><!-- row -->
                                    <div class="row mg-t-20">
                                        <!--  <label class="col-sm-4 form-control-label">Descripción: <span class="tx-danger">*</span></label>-->
                                        <div class="col-sm-12 mg-t-10 mg-sm-t-0">
                                          <label>Cliente</label>
                                            <select name="id_user_client_update" id="id_user_client_update" class="form-control">
                                              <?php foreach($users as $key):?>
                                                <option value="<?= $key['id']?>"><?= $key['user_name']?></option>
                                              <?php endforeach;?>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="row mg-t-20">
                                        <!--  <label class="col-sm-4 form-control-label">Descripción: <span class="tx-danger">*</span></label>-->
                                        <div class="col-sm-12 mg-t-10 mg-sm-t-0">
                                            <input type="text" name="global_percent_update" id="global_percent_update" class="form-control" placeholder="Porcentaje">
                                            <input type="hidden" name="id_cotizacion_update" id="id_cotizacion_update">
                                        </div>
                                    </div>

                            </div><!-- card -->
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-info pd-x-20">Actualizar venta</button>
                            <button type="button" class="btn btn-secondary pd-x-20" data-dismiss="modal">Cerrar</button>
                        </div>
                    </form>

                </div>
            </div><!-- modal-dialog -->
        </div><!-- modal -->


<!-- Modal mensaje -->

<div id="mensaje" class="modal fade">
  <div class="modal-dialog modal-sm" role="document">
    <div class="modal-content bd-0 tx-14">
      <div class="modal-header pd-x-20">
        <h6 class="tx-14 mg-b-0 tx-uppercase tx-inverse tx-bold">Prospecto a cliente</h6>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body pd-20">
        <p class="mg-b-5">Desea continuar con la accion, al dar aceptar no podra volver a ver los datos de este
        prospecto?</p>
        <form id="DeleteProduct" method="POST" action="<?php echo base_url() ?>/proveedores/delete_producto">
          <input class="form-control" id="id_product" name="id_product" type="hidden">
        </form>
      </div>
      <div class="modal-footer justify-content-center">
        <button  form="cliente" type="submit" class="btn btn-info pd-x-20">Aceptar</button>
        <button  onclick="mostrar()" type="button" class="btn btn-secondary pd-x-20" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div><!-- modal-dialog -->
</div><!-- modal -->


<div id="modal_email" class="modal fade">
  <div class="modal-dialog modal-sm" role="document">
    <div class="modal-content bd-0 tx-14">
      <div class="modal-header pd-x-20">
        <h6 class="tx-14 mg-b-0 tx-uppercase tx-inverse tx-bold">Mandar email</h6>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body pd-20">
        <p class="mg-b-5">Desea mandar a este correo la cotizacion?</p>
        <form method="POST" action="<?php echo base_url() ?>/Cotizaciones/email">
          <input type="hidden" value="" id="name_correo" name="name_correo">
          <input class="form-control" id="id_email" name="id_email" type="hidden">
          <input type="hidden" name="movil" value="" id="movil_correo">

      </div>
      <div class="modal-footer justify-content-center">
        <button type="submit" class="btn btn-info pd-x-20">Aceptar</button>
        <button  onclick="mostrar()" type="button" class="btn btn-secondary pd-x-20" data-dismiss="modal">Close</button>
      </div>
      </form>
    </div>
  </div><!-- modal-dialog -->
</div><!-- modal -->



        <!--Modal de Cliente -->

<div  id="modaldemo3" class="modal fade">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content tx-size-sm">
      <div class="modal-header pd-x-20">
        <h6 class="tx-14 mg-b-0 tx-uppercase tx-inverse tx-bold">Buscar</h6>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form id="DeleteProduct" method="POST" action="<?php echo base_url() ?>/Cotizaciones/get_date_coti">
      <div class="modal-body pd-20">
        <label>Fecha de inicio:</label><input type="date" class="form-control" name="date_inicio" id="date_inicio">
        <br>
        <label>Fecha de salida:</label><input type="date" class="form-control" name="date_final" id="date_final">
        <br>
        <label>Nombre del vendedor:</label>
        <select name="vendor" id="vendor" class="form-control">
        <?php
        foreach($users as $key){
            echo "<option value='".$key['id']."'> ".$key['user_name']."</option>";
             }

        ?>
    </select>
    <br>
    <button type="submit" id="btn_search_date" class="btn btn-info pd-x-20">Buscar</button>
</form>



        <div>
            <div id="append_list">

            </div>
        </div>


      </div><!-- modal-body -->
      <div class="modal-footer">

        <!--<button type="submit" id="enviarform" form="cliente" class="btn btn-info pd-x-20">Guardar</button>-->
        <button type="button" class="btn btn-secondary pd-x-20" data-dismiss="modal">Cerrar</button>
      </div>
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
                                url: '<?php echo base_url().'/Cotizaciones/get_cotizacion_json'?>',
                                type: "POST",
                                data: json,
                                dataType: "JSON",
                                success: function(success) {
                                  console.log(success);
                                   $('#id_cotizacion_update').val(id_buton);
                                   $('#global_percent_update').val(success.global_percent);
                                   $("#id_user_vendor_update option[value="+ success.id_user_vendor +"]").attr("selected",true);
                                   $("#id_user_client_update option[value="+ success.id_user_client +"]").attr("selected",true);
                                }

                            }); //AJAX

                            $('#modal_update').modal('show');
                        });

              });//Ready function


                        $('.btn-danger').on('click', function() {

                            let id = $(this).attr('id');
                            $('#id_delete').val(id);
                            $('#modal_delete').modal('show');

                        });


              $('#btn-insert').on('click',function(){
                $('#insert_Cotizaciones').modal('show');
              });


              ////////////modulo de sales

              /*function sale(id) {
                  //alert(id);
                  const ruta = "<?= base_url(); ?>/ventas/get_precio";

                  data = {
                      id: id
                  }

                      $.ajax({
                      type: "POST",
                      url: ruta,
                      dataType: "JSON",
                      data: data,
                      success: function(data) {
                         if(data===1){
                              location.href ="<?= base_url(); ?>/ventas";

                         }else{
                              location.href ="<?= base_url(); ?>/cotizaciones";
                         }

                      },
                      error: function() {
                          alert("Hubo un erro al obtener los datos");
                      }

                      });

              }*/

              $('#persona').on('change', function() {
                  let person = this.value;

                  if(person ==="Persona Moral"){
                    $('#correo').hide();
                    $('#telefono').hide();
                    $('#movil').hide();
                    $('#legal').show();
                    $('#acta').show();
                    $('#notario').show();

                  }else{
                    $('#correo').show();
                    $('#telefono').show();
                    $('#movil').show();
                    $('#legal').hide();
                    $('#acta').hide();
                    $('#notario').hide();
                  }

                //alert( this.value );
            });

            function cliente(idcotizacion, idcliente) {
                //alert(idcliente);

                $('#id_cotizacion').val(idcotizacion);
                $("#id_client").val(idcliente);
            }

            function visible(){
              $('#modaldemo3').modal('hide');

            }

            function mostrar(){
              $('#modaldemo3').modal('show');

            }


            $('.btn_sendemail').on('click',function(){
                let id=$(this).attr('id');
               // alert(id);
                let json = {
                                id: id
                            };
                 $.ajax({
                                url: '<?php echo base_url().'/Cotizaciones/get_email_json'?>',
                                type: "POST",
                                data: json,
                                dataType: "JSON",
                                success: function(success) {

                                    $('#id_email').val(id);
                                  $('#name_correo').val(success[0].email);
                                  $('#movil_correo').val(success[0].mobile);
                                  $('#modal_email').modal('show');

                                }

                    }); //AJAX
            });


            $(document).on('change', '#selected_type_client', function(event) {

        let type_select=$("#selected_type_client option:selected").val();
               if(type_select==1){
                    $('#remove').remove();
                    $('#append_new_client').append("<div id='remove'><div class='col-sm-12 mg-t-10 mg-sm-t-0'><label>Nombre</label><input type='text' class='form-control' name='name' placeholder='Nombre del contacto'><br><label>Empresa</label><input type='text' class='form-control' name='empresa' placeholder='Nombre de la empresa'><br><label>Correo</label><input type='text' placeholder='Correo electronico' class='form-control' name='correo'><br><label>Telefono</label><input type='text' class='form-control' name='telefono' placeholder='Telefono de contacto'><br><select class='form-control' name='list_empresa' id='id_empresa'><option value=''>Desplegar lista de empresas</option><?php foreach($business as $key):?><option value='<?= $key->id; ?>'><?= $key->business_name;?></option><?php endforeach;?></select></div></div>");
               }else{
                  $('#remove').remove();
                  $('#remove_empresa').remove();
                  $('#append_new_client').append('<div id="remove"><div><label>Cliente</label><select name="id_user_client" class="col-md-12 form-control" required><option value="">Selecciona disponibles</option><?php foreach($clients as $key):?><option value="<?= $key['id']?>"><?= $key['user_name']?></option><?php endforeach;?></select></div><br><div><select class="form-control" name="list_empresa" id="id_empresa"><option value="">Desplegar lista de empresas"</option><?php foreach($business as $key):?><option value="<?= $key->id; ?>"><?= $key->business_name;?></option><?php endforeach;?></select></div></div>');

               }
           });





            $(document).on('click','#id_empresa',function(event){
                    event.preventDefault();
                    let type_select=$("#id_empresa option:selected").val();
                   // alert(type_select);

                    let json={id:type_select};
                    $.ajax({
                                url: '<?php echo base_url().'/Cotizaciones/get_empresa_json'?>',
                                type: "POST",
                                data: json,
                                dataType: "JSON",
                                success: function(success) {
                                   
                                    $('#remove_empresa').remove();


                                    $('#append_new_selected_empresa').append("<div class='row mg-t-20' id='remove_empresa'><select class='form-control' name='selected_empresa' id='selected_empresa' required><option>Desplegar listado de productos</option></select> <br><label>Precio</label><br><input type='text' class='form-control' name='su_price' id='id_su_price' readonly><br><input type='checkbox' class='check_active'><label>Activar checkbox para modificar precio</label><br></div>"); //<label>COTIZACIONES DE PAGO</label><div>ANTICIPO A LA FIRMA DEL CONTRATO CONTRA AVISO DE EMBARQUE</div><br><input type='text' name='txt_numero_porcent' value='' id='text_numero_porcent' placeholder='porcentaje a pagar'> <input type='text' name='txt_total_porcent' id='txt_total_porcent' value='' placeholder='total a pagar'><br><input type='text' name='txt_numero_porcent_rest' id='text_numero_porcent_rest' value='' placeholder='porcentaje restante'><input type='text' name='txt_total_porcent_rest' value='' id='txt_total_porcent_rest' placeholder='cantidad que falta de pagar'>
                                    key();
                                    for(let i=0;i<success.length;i++){
                                        $('#selected_empresa').append("<option value='"+success[i].id+"'>"+success[i].name+"</option>");
                                    }

                                    check();

                                },
                                error:function(error){
                                    console.log(error);
                                }

                    }); //AJAX
            }) 






            function key(){
            $('#text_numero_porcent').keyup(function(){
                let numero=$('#text_numero_porcent').val();
                let precio_original=$('#id_su_price').val();


                                     
                                      let porcentaje_total=(numero*parseFloat(precio_original))/100;
                                      let numero_que_falta=precio_original-porcentaje_total;
                                      let porcentaje_restante=100-numero;


                $('#txt_total_porcent').val(porcentaje_total);
                $('#txt_total_porcent_rest').val(numero_que_falta);
                $('#text_numero_porcent_rest').val(porcentaje_restante);
                console.log(numero);
                //alert(numero);
            })

        }



            $(document).on('click','#selected_empresa',function(event){

                let type_select=$("#selected_empresa option:selected").val();

               

                let json={id:type_select};

                $.ajax({
                                url: '<?php echo base_url().'/Cotizaciones/get_product_data_json'?>',
                                type: "POST",
                                data: json,
                                dataType: "JSON",
                                success: function(success) {
                                   console.log(success);
                                   $('#id_su_price').val(success[0].su_price);

                                },
                                error:function(error){
                                    console.log(error);
                                }

                    }); //AJAX


            });




            function check(){

            $('.check_active').on('click',function(){
                if($(this).is(':checked')){
                    $('#id_su_price').prop('readonly',false);
                }else{
                    $('#id_su_price').prop('readonly',true);
                }
            })
}



//Para la lista de musica

    $('#all_list_cotizacion').on('click',function(){
        $('#modaldemo3').modal('show');
    });


    $('#btn_search_date').on('click',function(){
        let dat_ini=$('#date_inicio').val();
        let dat_fin=$('#date_final').val();
        let id_order=$("#vendor option:selected").val();


        //alert(dat_ini);

                let json = {
                                date_inicio: dat_ini,
                                date_final:dat_fin,
                                id_order:id_order
                            };
                 $.ajax({
                                url: '<?php echo base_url().'/Cotizaciones/get_date_coti'?>',
                                type: "POST",
                                data: json,
                                dataType: "JSON",
                                success: function(success) {

                                    for(let i=0;i<success.length;i++){
                                        $('#append_list').append('<a href="<?= base_url().'/Cotizacion_products/report_view/'?>'+success[i].id+'">Reporte'+success[i].id+'</a><br>');

                                    }





                                }

                    }); //AJAX
    })
           


           $('#datatable1').DataTable({
                            responsive: false,
                            "scrollX": true,
                            language: {
                                searchPlaceholder: 'Search...',
                                sSearch: '',
                                lengthMenu: '_MENU_ items/page',
                            }
                        });


        </script>