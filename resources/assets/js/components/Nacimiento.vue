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
                    <i class="fa fa-align-justify"></i>Nacimiento
                    <button
                        type="button"
                        @click="abrirModal('nacimiento', 'registrar')"
                        class="btn btn-success"
                    >
                        <i class="icon-plus"></i>&nbsp;Nuevo
                    </button>
                </div>
                <div class="card-body">
                    <div class="form-group row">
                        <div class="col-md-6">
                            <div class="input-group">
                                <select
                                    class="form-control col-md-3"
                                    v-model="criterio"
                                >
                                    <option value="fecha"
                                        >Fecha Nacimiento</option
                                    >
                                    <option value="fecha"
                                        >Fecha Registrada</option
                                    >
                                    <option value="apellidop">Apellidos</option>
                                    <option value="apellidom">Nombres</option>
                                </select>
                                <input
                                    type="text"
                                    v-model="buscar"
                                    @keyup.enter="
                                        listarNacimiento(1, buscar, criterio)
                                    "
                                    class="form-control"
                                    placeholder="Texto a buscar"
                                />
                                <button
                                    type="submit"
                                    class="btn btn-success"
                                    @click="
                                        listarNacimiento(1, buscar, criterio)
                                    "
                                >
                                    <i class="fa fa-search"></i> Buscar
                                </button>
                            </div>
                        </div>
                    </div>
                    <table class="table table-bordered table-striped table-sm">
                        <thead>
                            <tr>
                                <th>Libro</th>
                                <th>Folio</th>
                                <th>N° Partida</th>
                                <th>Nombres</th>
                                <th>Apellidos</th>
                                <th>Fecha Nacimiento</th>
                                <th>Opciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr
                                v-for="nacimiento in arrayNacimiento"
                                :key="nacimiento.id"
                            >
                                <td v-text="nacimiento.libro"></td>
                                <td v-text="nacimiento.folio"></td>
                                <td v-text="nacimiento.n_partida"></td>
                                <td v-text="nacimiento.nombres"></td>
                                <td v-text="nacimiento.apellidos"></td>
                                <td v-text="nacimiento.fecha_n"></td>
                                <td>
                                    <button
                                        type="button"
                                        @click="
                                            abrirModal(
                                                'nacimiento',
                                                'actualizar',
                                                nacimiento
                                            )
                                        "
                                        class="btn btn-warning btn-sm"
                                    >
                                        <i class="icon-pencil"></i>
                                    </button>
                                    &nbsp;
                                    <button
                                        type="button"
                                        class="btn btn-success btn-sm"
                                        data-toggle="modal"
                                        data-target="#modalNuevo"
                                    >
                                        <i class="icon-printer"></i>
                                    </button>
                                    <button
                                        type="button"
                                        class="btn btn-info btn-sm"
                                        data-toggle="modal"
                                        data-target="#modalNuevo"
                                    >
                                        <i class="icon-eye"></i>
                                    </button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <nav>
                        <ul class="pagination">
                            <li
                                class="page-item"
                                v-if="pagination.current_page > 1"
                            >
                                <a
                                    class="page-link"
                                    href="#"
                                    @click.prevent="
                                        cambiarPagina(
                                            pagination.current_page - 1,
                                            buscar,
                                            criterio
                                        )
                                    "
                                    >Ant</a
                                >
                            </li>
                            <li
                                class="page-item "
                                v-for="page in pagesNumber"
                                :key="page"
                                :class="[page == isActived ? 'active' : '']"
                            >
                                <a
                                    class="page-link"
                                    href="#"
                                    @click.prevent="
                                        cambiarPagina(page, buscar, criterio)
                                    "
                                    v-text="page"
                                ></a>
                            </li>

                            <li
                                class="page-item"
                                v-if="
                                    pagination.current_page <
                                        pagination.last_page
                                "
                            >
                                <a
                                    class="page-link"
                                    href="#"
                                    @click.prevent="
                                        cambiarPagina(
                                            pagination.current_page + 1,
                                            buscar,
                                            criterio
                                        )
                                    "
                                    >Sig</a
                                >
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>
            <!-- Fin ejemplo de tabla Listado -->
        </div>
        <!--Inicio del modal agregar/actualizar-->
        <div
            class="modal fade"
            tabindex="-1"
            :class="{ mostrar: modal }"
            role="dialog"
            aria-labelledby="myModalLabel"
            style="display: none;"
            aria-hidden="true"
        >
            <div class="modal-dialog modal-primary modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" v-text="tituloModal"></h4>
                        <button
                            type="button"
                            class="close"
                            @click="cerrarModal()"
                            aria-label="Close"
                        >
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form
                            action=""
                            method="post"
                            enctype="multipart/form-data"
                            class="form-horizontal"
                        >
                            <div class="form-group row">
                                <label
                                    class="col-md-3 form-control-label"
                                    for="text-input"
                                    >N° Libro</label
                                >
                                <div class="col-md-9">
                                    <input
                                        type="number"
                                        v-model="libro"
                                        class="form-control"
                                        min="1"
                                        max="700"
                                    />
                                </div>
                            </div>
                            <div class="form-group row">
                                <label
                                    class="col-md-3 form-control-label"
                                    for="text-input"
                                    >Folio</label
                                >
                                <div class="col-md-9">
                                    <input
                                        type="number"
                                        v-model="folio"
                                        class="form-control"
                                        min="1"
                                        max="700"
                                    />
                                </div>
                            </div>

                            <div class="form-group row">
                                <label
                                    class="col-md-3 form-control-label"
                                    for="text-input"
                                    >N° Partida</label
                                >
                                <div class="col-md-9">
                                    <input
                                        type="number"
                                        v-model="n_partida"
                                        class="form-control"
                                        min="1"
                                        max="700"
                                    />
                                </div>
                            </div>
                            <div class="form-group row">
                                <label
                                    class="col-md-3 form-control-label"
                                    for="text-input"
                                    >Fecha de Registrada</label
                                >
                                <div class="col-md-9">
                                    <input
                                        type="date"
                                        v-model="fecha_r"
                                        class="form-control"
                                    />
                                </div>
                            </div>
                            <div class="form-group row">
                                <label
                                    class="col-md-3 form-control-label"
                                    for="text-input"
                                    >Fecha de Nacimiento</label
                                >
                                <div class="col-md-9">
                                    <input
                                        type="date"
                                        v-model="fecha_n"
                                        class="form-control"
                                    />
                                </div>
                            </div>

                            <div class="form-group row">
                                <label
                                    class="col-md-3 form-control-label"
                                    for="text-input"
                                    >Apellidos</label
                                >
                                <div class="col-md-9">
                                    <input
                                        type="text"
                                        v-model="apellidos"
                                        class="form-control"
                                        placeholder="Apellidos "
                                    />
                                </div>
                            </div>
                            <div class="form-group row">
                                <label
                                    class="col-md-3 form-control-label"
                                    for="text-input"
                                    >Nombres</label
                                >
                                <div class="col-md-9">
                                    <input
                                        type="text"
                                        v-model="nombres"
                                        class="form-control"
                                        placeholder="Nombres "
                                    />
                                </div>
                            </div>
                            <div class="form-group row">
                                <label
                                    class="col-md-3 form-control-label"
                                    for="text-input"
                                    >Anexo</label
                                >
                                <div class="col-md-9">
                                    <select
                                        class="form-control "
                                        v-model="anexo"
                                    >
                                        <option value="Pucará">Pucará</option>
                                        <option value="Asca">Asca</option>
                                        <option value="Raquina">Raquina</option>
                                        <option value="Suclla">Suclla</option>
                                        <option value="Pachachaca"
                                            >Pachachaca</option
                                        >
                                        <option value="2 de mayo"
                                            >2 de mayo</option
                                        >
                                        <option value="Chucos">Chucos</option>
                                        <option value="Marcavalle"
                                            >Marcavalle</option
                                        >
                                        <option value="Talhuis">Talhuis</option>
                                        <option value="Pucapuquio"
                                            >Pucapuquio</option
                                        >
                                        <option value="La Libertad"
                                            >La Libertad</option
                                        >
                                        <option value="Patala">Patala</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label
                                    class="col-md-3 form-control-label"
                                    for="text-input"
                                    >Acta</label
                                >
                                <div class="col-md-9">
                                    <input
                                        @change="img"
                                        type="file"
                                        name="acta"
                                        class="form-control"
                                        accept="image/*"
                                    />
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button
                            type="button"
                            class="btn btn-secondary"
                            @click="cerrarModal()"
                        >
                            Cerrar
                        </button>
                        <button
                            type="button"
                            v-if="tipoAccion == 1"
                            class="btn btn-primary"
                            @click="registrarNacimiento()"
                        >
                            Guardar
                        </button>
                        <button
                            type="button"
                            v-if="tipoAccion == 2"
                            class="btn btn-primary"
                        >
                            Actualizar
                        </button>
                    </div>
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>
        <!--Fin del modal-->
    </main>
    <!-- /Fin del contenido principal -->
</template>

<script>
export default {
    data() {
        return {
            nacimiento_id: 0,
            libro: "",
            folio: "",
            n_partida: "",
            fecha_r: "",
            fecha_n: "",
            apellidos: "",
            nombres: "",
            anexo: "",
            acta: null,
            arrayNacimiento: [],
            modal: 0,
            tituloModal: "",
            tipoAccion: 0,
            pagination: {
                total: 0,
                current_page: 0,
                per_Page: 0,
                last_page: 0,
                from: 0,
                to: 0
            },
            offset: 3,
            criterio: "nombres",
            buscar: ""
        };
    },
    computed: {
        isActived: function() {
            return this.pagination.current_page;
        },
        //calcula los elementos de la paginacion
        pagesNumber: function() {
            if (!this.pagination.to) {
                return [];
            }
            var from = this.pagination.current_page - this.offset;
            if (from < 1) {
                from = 1;
            }
            var to = from + this.offset * 2;
            if (to >= this.pagination.last_page) {
                to = this.pagination.last_page;
            }
            var pagesArrary = [];
            while (from <= to) {
                pagesArrary.push(from);
                from++;
            }
            return pagesArrary;
        }
    },
    methods: {
        listarNacimiento(page, buscar, criterio) {
            let me = this;
            //var url='/nacimiento?page=' + page+'&buscar=' +buscar+'&criterio='+criterio;
            axios
                .get("/nacimiento")
                .then(function(response) {
                    //axios.get(url).then(function(response){
                    //var respuesta = response.data;
                    //me.arrayNacimiento=respuesta.nacimientos.data;
                    //me.pagination=respuesta.pagination;
                    me.arrayNacimiento = response.data;
                })
                .catch(function(error) {
                    console.log(error);
                });
        },
        img(e) {
            const target = e.target;
            const value =
                target.type === "file" ? target.files[0] : target.value;
            console.log(value);
            this.acta=value;
        },
        registrarNacimientoB() {
            let me = this;
            axios
                .post("/nacimiento/registrar", {
                    libro: me.libro,
                    folio: me.folio,
                    n_partida: me.n_partida,
                    fecha_r: me.fecha_r,
                    fecha_n: me.fecha_n,
                    apellidos: me.apellidos,
                    nombres: me.nombres,
                    anexo: me.anexo,
                    acta: me.acta
                })
                .then(function(response) {
                    me.cerrarModal();
                    me.listarNacimiento();
                })
                .catch(function(error) {
                    console.log(error);
                });
        },
        cambiarPagina(page, buscar, criterio) {
            let me = this;
            //actualiza la pagina actual
            me.pagination.current_page = page;
            //
            me.listarNacimiento(page, buscar, criterio);
        },
        abrirModal(modelo, accion, data = []) {
            switch (modelo) {
                case "nacimiento": {
                    switch (accion) {
                        case "registrar": {
                            this.modal = 1;
                            this.tituloModal = "Registar Nacimiento";
                            this.libro = "";
                            this.folio = "";
                            this.n_partida = "";
                            this.fecha_r = "";
                            this.fecha_n = "";
                            this.apellidos = "";
                            this.nombres = "";
                            this.anexo = "";
                            this.acta = "";
                            this.tipoAccion = 1;
                            break;
                        }
                        case "actualizar": {
                            //console.log(data);
                            this.modal = 1;
                            this.tituloModal = "Actualizar Nacimiento";
                            this.tipoAccion = 2;
                            this.nacimiento_id = data["id"];
                            this.libro = "";
                            this.folio = "";
                            this.n_partida = "";
                            this.fecha_r = "";
                            this.fecha_n = "";
                            this.apellidos = "";
                            this.nombres = "";
                            this.anexo = "";
                            this.acta = "";
                            break;
                        }
                    }
                }
            }
        },
        registrarNacimiento() {
            var me = this;
            var formData = new FormData();
            formData.append("libro", me.libro);
            formData.append("folio", me.folio);
            formData.append("n_partida", me.n_partida);
            formData.append("fecha_r", me.fecha_r);
            formData.append("fecha_n", me.fecha_n);
            formData.append("apellidos", me.apellidos);
            formData.append("nombres", me.nombres);
            formData.append("anexo", me.anexo);
            console.log(formData);
            formData.append("acta", me.acta);
            console.log(me.acta.name);
            axios
                .post("/nacimiento/registrar", {
                    formData,
                    onUploadProgress: ProgressEvent => {
                        console.log(
                            "Upload Progress",
                            Math.round(
                                (ProgressEvent.loaded / ProgressEvent.total) *
                                    100
                            ) + " %"
                        );
                    },
                    headers : {
                        'Content-Type': 'multipart/form-data'
                    }
                })
                .then(function(response) {
                    console.log(response);
                    me.cerrarModal();
                    me.listarNacimiento();
                })
                .catch(function(error) {
                    console.log(error);
                });
        },
        cerrarModal() {
            this.modal = 0;
            this.tituloModal = "";
            this.libro = "";
            this.folio = "";
            this.n_partida = "";
            this.fecha_r = "";
            this.fecha_n = "";
            this.apellidos = "";
            this.nombres = "";
            this.anexo = "";
            this.acta = "";
        }
    },
    mounted() {
        this.listarNacimiento();
        //
    }
};
</script>
<style>
.modal-content {
    width: 100% !important;
    position: absolute !important;
}
.mostrar {
    display: list-item !important;
    opacity: 1 !important;
    position: absolute !important;
    background-color: #5a4f4f7a !important;
}
</style>
