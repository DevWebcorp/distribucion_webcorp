<section class="mg-t-100">
    <div class="container mt-5">
        <div class="row mt-5">
            <div class="col-12 mt-5">
                <h2 class="mb-2">Validación de nuevo proveedor</h2>

                <h4 class="col-12 mb-3" style="color: #384250 !important;">
                    <span class="fa-stack h5 mb-0">
                        <i class="fa fa-circle fa-stack-2x"></i>
                        <i class="fa fa-tasks fa-stack-1x fa-inverse mt-2"></i>
                    </span>
                    Datos generales
                    <hr style=" border: 1px solid black;">
                </h4>
                

                <table class="table table-responsive table-bordered">
                    <tbody>
                        <tr>
                            <td>
                                <p class="font-weight-bold text-dark p-registro">Razón social</p>
                            </td>
                            <td>
                                <p class="p-registro"><?php echo ($proveedor[0]['razon_social']) ?></p>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <p class="font-weight-bold text-dark p-registro">Nombre comercial:</p>
                            </td>
                            <td>
                                <p class="p-registro"><?php echo ($proveedor[0]['commercial_name']) ?></p>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <p class="font-weight-bold text-dark p-registro">R.F.C:</p>
                            </td>
                            <td>
                                <p class="p-registro"><?php echo ($proveedor[0]['rfc']) ?> </p>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <p class="font-weight-bold text-dark p-registro">Producto o servicio</p>
                            </td>
                            <td>
                                <p class="p-registro"><?php echo ($proveedor[0]['product']) ?></p>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <p class="font-weight-bold text-dark p-registro">Página web</p>
                            </td>
                            <td>
                                <p class="p-registro"><?php echo ($proveedor[0]['web']) ?></p>
                            </td>
                        </tr>
                    </tbody>
                </table>


                <h4 class="col-12 mb-3" style="color: #384250 !important;">
                    <span class="fa-stack h5 mb-0">
                        <i class="fa fa-circle fa-stack-2x"></i>
                        <i class="fa fa-user fa-stack-1x fa-inverse mt-2"></i>
                    </span>
                    Datos de contacto
                    <hr style=" border: 1px solid black;">
                </h4>

                <table class="table table-responsive table-bordered mb-3">
                    <tbody>
                        <tr>
                            <td>
                                <p class="font-weight-bold text-dark p-registro">Nombre de contacto principal</p>
                            </td>
                            <td>
                                <p class="p-registro"><?php echo ($contacto[0]['contrato']) ?></p>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <p class="font-weight-bold text-dark p-registro">Teléfono fijo</p>
                            </td>
                            <td>
                                <p class="p-registro"><?php echo ($contacto[0]['telefono']) ?></p>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <p class="font-weight-bold text-dark p-registro">Teléfono movil</p>
                            </td>
                            <td>
                                <p class="p-registro"><?php echo ($contacto[0]['celular']) ?> </p>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <p class="font-weight-bold text-dark p-registro">Email</p>
                            </td>
                            <td>
                                <p class="p-registro"><?php echo ($usuario[0]['email']) ?></p>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <p class="font-weight-bold text-dark p-registro">Calle</p>
                            </td>
                            <td>
                                <p class="p-registro"><?php echo ($contacto[0]['calle']) ?></p>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <p class="font-weight-bold text-dark p-registro">Exterior</p>
                            </td>
                            <td>
                                <p class="p-registro"><?php echo ($contacto[0]['exterior']) ?></p>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <p class="font-weight-bold text-dark p-registro">Interior</p>
                            </td>
                            <td>
                                <p class="p-registro"><?php echo ($contacto[0]['interior']) ?></p>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <p class="font-weight-bold text-dark p-registro">Colonia o municipio</p>
                            </td>
                            <td>
                                <p class="p-registro"><?php echo ($contacto[0]['colonia']) ?></p>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <p class="font-weight-bold text-dark p-registro">Código postal</p>
                            </td>
                            <td>
                                <p class="p-registro"><?php echo ($contacto[0]['cp']) ?></p>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <p class="font-weight-bold text-dark p-registro">Ciudad</p>
                            </td>
                            <td>
                                <p class="p-registro"><?php echo ($contacto[0]['ciudad']) ?></p>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <p class="font-weight-bold text-dark p-registro">Estado</p>
                            </td>
                            <td>
                                <p class="p-registro"><?php echo ($contacto[0]['estado']) ?></p>
                            </td>
                        </tr>
                    </tbody>
                </table>

                <h4 class="col-12 mb-3" style="color: #384250 !important;">
                    <span class="fa-stack h5 mb-0">
                        <i class="fa fa-circle fa-stack-2x"></i>
                        <i class="fa fa-university fa-stack-1x fa-inverse mt-2"></i>
                    </span>
                    Datos bancarios
                    <hr style=" border: 1px solid black;">
                </h4>

                <table class="table table-responsive table-bordered">
                    <tbody>
                        <tr>
                            <td>
                                <p class="font-weight-bold text-dark p-registro">Banco</p>
                            </td>
                            <td>
                                <p class="p-registro"><?php echo ($banco[0]['banco']) ?></p>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <p class="font-weight-bold text-dark p-registro">Número de cuenta</p>
                            </td>
                            <td>
                                <p class="p-registro"><?php echo ($banco[0]['n_cta']) ?></p>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <p class="font-weight-bold text-dark p-registro">Clabe</p>
                            </td>
                            <td>
                                <p class="p-registro"><?php echo ($banco[0]['clabe']) ?> </p>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <p class="font-weight-bold text-dark p-registro">Moneda</p>
                            </td>
                            <td>
                                <p class="p-registro"><?php echo ($banco[0]['moneda']) ?></p>
                            </td>
                        </tr>
                    </tbody>
                </table>

            </div>

            <div class="col-12 text-right mb-3">
                <form method="POST" id="form_aprobacion" enctype="multipart/form-data">
                    <input name="id" type="hidden" value="<?php echo ($proveedor[0]['user_id']);  ?>">
                    <button type="submit" class="btn btn-primary">Aceptar</button>
                    <button class="btn btn-secondary">Cancelar</button>
                </form>
            </div>
        </div>
    </div>
    </div>

</section>