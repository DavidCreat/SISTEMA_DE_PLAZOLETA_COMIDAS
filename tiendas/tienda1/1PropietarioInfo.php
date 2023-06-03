 <!--INICIO DEL DASH BOARD INTERNO-->
<!-- partial -->
<div class="main-panel">
<div class="content-wrapper">
            <div class="row">
              <div class="col-xl-3 col-sm-6 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    

                  <!--CONTENIDO DASHBOARD-->

                    <div class="row">
                      <div class="col-9">
                      </div>
                      <div class="col-3">
                        <div class="icon icon-box-success ">
                          <span class="mdi mdi-arrow-top-right icon-item"></span>
                        </div>
                      </div>
                    </div>
                    <h6 class="text-muted font-weight-normal">PANEL DE ADMINISTRADOR</h6>
                  </div>
                </div>
              </div>
              <div class="col-xl-3 col-sm-6 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <div class="row">
                      <div class="col-9">
                      </div>
                      <div class="col-3">
                        <div class="icon icon-box-success">
                          <span class="mdi mdi-arrow-top-right icon-item"></span>
                        </div>
                      </div>
                    </div>
                    <h6 class="text-muted font-weight-normal">SUBIDA DE DATOS</h6>
                  </div>
                </div>
              </div>
              <div class="col-xl-3 col-sm-6 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <div class="row">
                      <div class="col-9">
                      </div>
                      <div class="col-3">
                        <div class="icon icon-box-danger">
                          <span class="mdi mdi-arrow-bottom-left icon-item"></span>
                        </div>
                      </div>
                    </div>
                    <h6 class="text-muted font-weight-normal">ENTRADA DE DATOS</h6>
                  </div>
                </div>
              </div>
              <div class="col-xl-3 col-sm-6 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <div class="row">
                      <div class="col-9">
                      </div>
                      <div class="col-3">
                        <div class="icon icon-box-success ">
                          <span class="mdi mdi-arrow-top-right icon-item"></span>
                        </div>
                      </div>
                    </div>
                    <h6 class="text-muted font-weight-normal">BASE DE DATOS INTEGRADA</h6>
                  </div>
                </div>
              </div>
            </div>
          <div>

            <div class="row">
              <div class="col-sm-4 grid-margin">
                <div class="card">
                  <div class="card-body">
                    <h5>productos resgitrados</h5>
                    <div class="row">
                      <div class="col-8 col-sm-12 col-xl-8 my-auto">
                        <div class="d-flex d-sm-block d-md-flex align-items-center">
                          <h2 class="mb-0">En espera de datos</h2>
                          <p class="text-success ml-2 mb-0 font-weight-medium">+0.0%</p>
                        </div>
                        <h6 class="text-muted font-weight-normal">intproduct</h6>
                      </div>
                      <div class="col-4 col-sm-12 col-xl-4 text-center text-xl-right">
                        <i class="icon-lg mdi mdi-codepen text-primary ml-auto"></i>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-sm-4 grid-margin">
                <div class="card">
                  <div class="card-body">
                    <h5>productos registrados</h5>
                    <div class="row">
                      <div class="col-8 col-sm-12 col-xl-8 my-auto">
                        <div class="d-flex d-sm-block d-md-flex align-items-center">
                          <h2 class="mb-0">En espera de datos</h2>
                          <p class="text-success ml-2 mb-0 font-weight-medium">+0.0%</p>
                        </div>
                        <h6 class="text-muted font-weight-normal">intproduct</h6>
                      </div>
                      <div class="col-4 col-sm-12 col-xl-4 text-center text-xl-right">
                        <i class="icon-lg mdi mdi-wallet-travel text-danger ml-auto"></i>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-sm-4 grid-margin">
                <div class="card">
                  <div class="card-body">
                    <h5>productos registrados</h5>
                    <div class="row">
                      <div class="col-8 col-sm-12 col-xl-8 my-auto">
                        <div class="d-flex d-sm-block d-md-flex align-items-center">
                          <h2 class="mb-0">En espera de datos</h2>
                          <p class="text-danger ml-2 mb-0 font-weight-medium">+0.0% </p>
                        </div>
                        <h6 class="text-muted font-weight-normal">intproduct</h6>
                      </div>
                      <div class="col-4 col-sm-12 col-xl-4 text-center text-xl-right">
                        <i class="icon-lg mdi mdi-monitor text-success ml-auto"></i>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <!--INFORMACION DE LOS ADMINISTRAORES-->
            <div class="row ">
              <div class="col-12 grid-margin">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">USUARIOS REGISTRADOS</h4>
                    <div class="table-responsive">
                    <div class="row">
                      <!--INICIO DE LA TABLA--->
                    <div class="table-responsive">
                      <table class="table">
                        <thead>
                          <tr>
                            <th>Nombre</th>
                            <th>Precio</th>
                            <th>Foto</th>
                            <th>Categoria</th>
                            <th>Estado</th>
                          </tr>
                        </thead>
                        <?php $viewDatauser = mysqli_query($conexion, $platoInfo);
                          while($row=mysqli_fetch_assoc($viewDatauser)){
                        ?>
                        <tbody>
                          <tr>
                            <td><?php echo $row["nombre"];?></td>
                            <td><?php echo $row["precio"];?></td>
                            <td><?php echo $row["foto"];?></td>
                            <td><?php echo $row["categoria"];?></td>
                            <td><?php echo $row["estado"];?></td>
                            <td><label class="badge badge-danger"><?php echo $row["rol_id"];?></label></td>
                          </tr>
                        </tbody> <?php } ?>
                      </table>
                      

                    </div>
                    </div>
                    </div>

                      <!--AQUI VA LA INFO DE ADMIS EN PHP-->
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <!---PARTE DE RECOMENACIONES DE LOS DUEÑOS DE RESTAURANTES-->
            <div class="row">
              <div class="col-md-6 col-xl-4 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <div class="d-flex flex-row justify-content-between">
                      <h4 class="card-title">MENSAJES</h4>
                    </div>
                    <!--INFORMACION PHP MENSAJES ADMINS-->
                  </div>
                </div>
              </div>
              
              <!--FLUJO DE INFORMACION DE REGISTROS DE USUARIOS-->
              <div class="col-md-6 col-xl-4 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">USUARIOS ENTRANTES</h4>
                    <div class="owl-carousel owl-theme full-width owl-carousel-dash portfolio-carousel" id="owl-carousel-basic">
                    </div>
                  </div>
                </div>
              </div>

              <!--AÑADIR USUARIOS ADMIN-->
              <div class="col-md-12 col-xl-4 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    
                  </div>
                </div>
              </div>
            </div>

            <!---INFIERIOR DASH--->