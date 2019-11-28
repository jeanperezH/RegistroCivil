<template>
<!-- Contenido Principal -->
        <main class="main">
            <!-- Breadcrumb -->
            <ol class="breadcrumb">
                <li class="breadcrumb-item">Home</li>
                <li class="breadcrumb-item"><a href="#">Admin</a></li>
                <li class="breadcrumb-item active">Dashboard</li>
            </ol>
            <div class="container-fluid">
                <!-- Ejemplo de tabla Listado -->
                <div class="card">
                    <div class="card-header">
                        <i class="fa fa-align-justify"></i>MATRIMONIO
                        <button type="button" class="btn btn-secondary" data-toggle="modal" data-target="#modalNuevo">
                            <i class="icon-plus"></i>&nbsp;Nuevo
                        </button>
                    </div>
                    <div class="card-body">
                        <div class="form-group row">
                            <div class="col-md-6">
                                <div class="input-group">
                                    <select class="form-control col-md-3" id="opcion" name="opcion">
                                      <option value="fecha">Fecha</option>
                                      <option value="apellidop">Apellidos Contrayente</option>
                                      <option value="apellidom">Apellidos Contrayenta</option>
                                    </select>
                                    <input type="text" id="texto" name="texto" class="form-control" placeholder="Texto a buscar">
                                    <button type="submit" class="btn btn-primary"><i class="fa fa-search"></i> Buscar</button>
                                </div>
                            </div>
                        </div>
                        <table class="table table-bordered table-striped table-sm">
                            <thead>
                                <tr>
                                    <th>Opciones</th>
                                    <th>Libro</th>
                                    <th>Folio</th>
                                    <th>Nombres Contrayente</th>
                                    <th>Apellidos Contrayente</th>
                                    <th>Nombres Contrayenta</th>
                                    <th>Apellidos Contrayenta</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>
                                        <center>
                                            <button type="button" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#modalNuevo">
                                                <i class="icon-pencil"></i>
                                            </button> &nbsp;
                                            <button type="button" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#modalNuevo">
                                                <i class="icon-printer"></i>
                                            </button>
                                        </center>
                                    </td>
                                    <td>1</td>
                                    <td>1</td>
                                    <td>José</td>
                                    <td>Cerron Aguilar</td>
                                    <td>Ana Luisa</td>
                                    <td>Ramirez Justo</td>
                                </tr>
                                <tr>
                                    <td>
                                        <center>
                                            <button type="button" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#modalNuevo">
                                                <i class="icon-pencil"></i>
                                            </button> &nbsp;
                                            <button type="button" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#modalNuevo">
                                                <i class="icon-printer"></i>
                                            </button>
                                        </center>
                                    </td>
                                    <td>1</td>
                                    <td>1</td>
                                    <td>José</td>
                                    <td>Cerron Aguilar</td>
                                    <td>Ana Luisa</td>
                                    <td>Ramirez Justo</td>
                                </tr>
                                <tr>
                                    <td>
                                        <center>
                                            <button type="button" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#modalNuevo">
                                                <i class="icon-pencil"></i>
                                            </button> &nbsp;
                                            <button type="button" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#modalNuevo">
                                                <i class="icon-printer"></i>
                                            </button>
                                        </center>
                                    </td>
                                    <td>1</td>
                                    <td>1</td>
                                    <td>José</td>
                                    <td>Cerron Aguilar</td>
                                    <td>Ana Luisa</td>
                                    <td>Ramirez Justo</td>
                                </tr>
                                
                            </tbody>
                        </table>
                        <nav>
                            <ul class="pagination">
                                <li class="page-item">
                                    <a class="page-link" href="#">Ant</a>
                                </li>
                                <li class="page-item active">
                                    <a class="page-link" href="#">1</a>
                                </li>
                                <li class="page-item">
                                    <a class="page-link" href="#">2</a>
                                </li>
                                <li class="page-item">
                                    <a class="page-link" href="#">3</a>
                                </li>
                                <li class="page-item">
                                    <a class="page-link" href="#">4</a>
                                </li>
                                <li class="page-item">
                                    <a class="page-link" href="#">Sig</a>
                                </li>
                            </ul>
                        </nav>
                    </div>
                </div>
                <!-- Fin ejemplo de tabla Listado -->
            </div>
            <!--Inicio del modal agregar/actualizar-->
            <div class="modal fade" id="modalNuevo" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" style="display: none;" aria-hidden="true">
                <div class="modal-dialog modal-primary modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title">Nuevo Matrimonio</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">×</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form action="" method="post" enctype="multipart/form-data" class="form-horizontal">
                                <div class="form-group row">
                                    <label class="col-md-3 form-control-label" for="text-input">Folio</label>
                                    <div class="col-md-9">
                                        <input type="number"  name="folio" class="form-control" min="1" max="700">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-3 form-control-label" for="text-input">N° Libro</label>
                                    <div class="col-md-9">
                                        <input type="number"  name="libro" class="form-control" min="1" max="700">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-3 form-control-label" for="text-input">N° Partida</label>
                                    <div class="col-md-9">
                                        <input type="number"  name="partida" class="form-control" min="1" max="700">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-3 form-control-label" for="text-input">Fecha de Matrimonio</label>
                                    <div class="col-md-9">
                                        <input type="date"  name="fecha" class="form-control">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-3 form-control-label" for="text-input">Apellidos Contrayente</label>
                                    <div class="col-md-9">
                                        <input type="text"  name="apellidoV" class="form-control" placeholder="Apellidos Contrayente">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-3 form-control-label" for="text-input">Nombres Contrayente</label>
                                    <div class="col-md-9">
                                        <input type="text"  name="nombresV" class="form-control" placeholder="Nombres Contrayente">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-3 form-control-label" for="text-input">Apellidos Contrayenta</label>
                                    <div class="col-md-9">
                                        <input type="text"  name="apellidoM" class="form-control" placeholder="Apellidos Contrayenta">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-3 form-control-label" for="text-input">Nombres Contrayenta</label>
                                    <div class="col-md-9">
                                        <input type="text"  name="nombresM" class="form-control" placeholder="Nombres Contrayente">
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                            <button type="button" class="btn btn-primary">Guardar</button>
                        </div>
                    </div>
                    <!-- /.modal-content -->
                </div>
                <!-- /.modal-dialog -->
            </div>
            <!--Fin del modal-->
            <!-- Inicio del modal Eliminar -->
            <div class="modal fade" id="modalEliminar" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" style="display: none;" aria-hidden="true">
                <div class="modal-dialog modal-danger" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title">Eliminar Categoría</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">×</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <p>Estas seguro de eliminar la categoría?</p>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                            <button type="button" class="btn btn-danger">Eliminar</button>
                        </div>
                    </div>
                    <!-- /.modal-content -->
                </div>
                <!-- /.modal-dialog -->
            </div>
            <!-- Fin del modal Eliminar -->
        </main>
        <!-- /Fin del contenido principal -->

</template>

<script>
    export default {
        mounted() {
            console.log('Component mounted.')
        }
    }
</script>
