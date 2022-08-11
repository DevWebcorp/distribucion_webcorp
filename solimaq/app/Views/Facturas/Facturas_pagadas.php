<link href="../../../assets/lib/datatables/jquery.dataTables.css" rel="stylesheet">
<link href="../../../assets/lib/select2/css/select2.min.css" rel="stylesheet">
<script src="../../../assets/lib/jquery/jquery.js"></script>


<div class="sl-mainpanel">

  <div class="sl-pagebody">
    <div class="card pd-20 pd-sm-40">
      <h5 class="text-dark"><?= $title;?></h5>
      <p class="text-dark"><?= $description;?></p>
      <div class="table-wrapper table-responsive mt-5">
        <table id="datatable1" class="table table-info table-bordered" style="width: 100%;">
          <thead>
            <tr>
              <th class="wd-15p">PDF</th>
              <th class="wd-15p">FECHA SUBIDA</th> 
              <th class="wd-15p">ORIGEN</th>
              <th class="wd-15p">DESTINO </th>
              <th class="wd-20p">CONCEPTO</th>
              <th class="wd-20p">IMPORTE</th>
              <th class="wd-20p">IVA</th>
              <th class="wd-20p">TOTAL</th>
              <th class="wd-20p">FECHA PAGO</th>
              <th class="wd-20p">Pagado</th>
            </tr>
          </thead>
          <tbody>
            
          </tbody>
        </table>
      </div><!-- table-wrapper -->
    </div><!-- card -->

 


<!-- MODAL para subir factura -->
<div id="modal_factura" class="modal fade">
  <div class="modal-dialog modal-dialog-vertical-center" role="document">
    <div class="modal-content bd-0 tx-14">
      <div class="modal-header bg-success pd-y-20 pd-x-25">
        <h6 class="tx-14 mg-b-0 tx-uppercase text-white tx-bold">Subir factura</h6>
        <button type="button" class="close text-white" data-dismiss="modal" aria-label="Cerrar">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="pd-20">
        <div class="card pd-20 pd-sm-40">
          <form  method="POST" id="form-factura" enctype="multipart/form-data">
            <div class="form-layout">
              <div class="row mg-b-25">
                <div class="col-lg-12">
                  <div class="form-group">
                    <label class="form-control-label">Factura PDF: </label>
                    <div class="file-drop-area">
                      <span class="choose-file-button">Subir Archivo</span>
                      <span class="file-message">Arrastra el archivo aqui</span>
                      <input id="file_user" class="file-input" type="file" required name="file_pdf" accept=".pdf">
                    </div>
                  </div>
                </div>

                <div class="col-lg-12">
                  <div class="form-group">
                    <label class="form-control-label">Factura XML: </label>
                    <div class="file-drop-area">
                      <span class="choose-file-button">Subir Archivo</span>
                      <span class="file-message">Arrastra el archivo aqui</span>
                      <input id="file_user" class="file-input" type="file" required name="file_xml" accept=".xml">
                    </div>
                  </div>
                </div>

              </div>
            </div>
         
        </div>
      </div><!-- modal-body -->
      <div class="modal-footer">
        <button type="submit"  class="btn btn-success pd-x-20"><i class="fa fa-floppy-o mr-1" aria-hidden="true"></i>Subir factura</button>
        <button type="button" class="btn btn-secondary pd-x-20" data-dismiss="modal"><i class="fa fa-times mr-1" aria-hidden="true"></i>Cancelar</button>
      </div><!-- modal-footer -->
    </div><!-- modal-content -->
    </form>  
  </div><!-- modal-dialog -->
</div><!-- modal_actualizacion -->

<script src="../../../assets/lib/datatables/jquery.dataTables.js"></script>
<script src="../../../assets/lib/datatables-responsive/dataTables.responsive.js"></script>
<script src="../../../assets/lib/select2/js/select2.min.js"></script>


<script>
  var dataTable = $('#datatable1').DataTable({
    ajax: BASE_URL + '/Facturas/get_pagadas',

    columns: [
      {
        data: "factura_pdf",
          render: function(data, type, row, meta) {
            return '<a href="'+BASE_URL+'../../public/images/'+data+'" target="_blank"><img src="../../../assets/img/pdf.png" >    </a>'

            }
          },      
        {
            data: 'fecha_upload'
        },
       
        {
            data: 'origen'
        },
        {
            data: 'destino'
        },
        {
            data: 'concepto'
        },{
            data: 'importe'
        },
        {
            data: 'iva'
        },
        {
            data: 'total'
        },
        {
            data: 'fecha_pago'
        },
        {
            data: 'status',
              render: function(data, type, row, meta) {
                return data == "0" ? '<i class="fa fa-times-circle fa-2x" aria-hidden="true" style="color: red;"></i>'
                 : '<i class="fa fa-check-circle fa-2x" aria-hidden="true" style="color: green;"></i>' 
              }

        }
       /*  {
            data: "id",
            render: function(data, type, row, meta) {
                return '<button id="' + row.id + '"" class="btn btn-warning btn-update btn-radio pd-x-20"><i class="fa fa-pencil fa-lg" aria-hidden="true"></i> ACTUALIZAR</button>' +
                    '<button id="' + row.id + '" data-toggle="modal" data-target="#modal_delete" class="btn btn-danger btn-radio pd-x-20 ml-1 "><i class="fa fa-trash-o fa-lg" aria-hidden="true"></i> ELIMINAR</button>'


            }
        }, */
    ],
    language: {
        searchPlaceholder: 'Buscar...',
        sSearch: '',
        lengthMenu: '_MENU_ Filas por página',
    }
});

function reloadData() {
    //$('#loader').toggle();
    dataTable.ajax.reload();
   // $('#loader').toggle();
}


</script>