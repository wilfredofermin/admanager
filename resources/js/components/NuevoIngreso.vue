<template>
  <div class="card card-primary card-outline">
    <div class="card-body">
      <div class="row mt-3">
        <div class="col-md-12">
          <div class="card">
            <div class="card-header">
              <div class="card-title">
                <h4>
                  <i class="far fa-circle fa fa-users"></i> Solicitudes
                </h4>
              </div>
              <div class="card-tools">
                <button
                  type="button"
                  class="btn btn-block btn-primary btn-md"
                  @click="MostrarModal()"
                >
                  <i class="fas fa-user-plus ta-fw"></i> Agregar
                </button>
              </div>
            </div>
            <div class="box-body table-responsive no-padding">
              <table class="table table-hover">
                <tbody>
                  <tr>
                    <th width="5%">ID</th>
                    <th width="5%">Cedula</th>
                    <th width="20%">Nombre</th>
                    <th width="15%">Puesto</th>
                    <th width="15%">Departamento</th>
                    <th width="5%">Estado</th>
                    <th width="5%">Prioridad</th>
                    <th width="15%">Fecha Creacion</th>
                    <th width="5%" text-align:center>Opciones</th>
                  </tr>
                  <tr v-for="user in users" :key="user.id">
                    <td>{{user.nombre | capitalize }}</td>
                    <td>{{user.apellidos | capitalize}}</td>
                    <td v-if="user.activo">
                      <toggle-button
                        :value="true"
                        color="#99CF16"
                        :sync="true"
                        :labels="true"
                        disabled
                      />
                    </td>
                    <td v-else>
                      <toggle-button
                        :value="false"
                        color="#99CF16"
                        :sync="true"
                        :labels="true"
                        disabled
                      />
                    </td>
                    <td>{{user.tipo | capitalize }}</td>
                    <td>{{user.email}}</td>
                    <td>{{user.created_at | fechas }}</td>
                    <td>{{user.updated_at | fechas }}</td>

                    <!-- <td><span class="label label-success">Approved</span></td>
                    <td>Bacon ipsum dolor sit amet salami venison chicken flank fatback doner.</td>-->
                    <td>
                      <a href="#" @click="EditarModal(user)">
                        <i class="fas fa-edit green"></i>
                      </a>
                      |
                      <a
                        href="#"
                        @click="EliminarUsuario(user.id,user.nombre,user.apellidos)"
                      >
                        <i class="fas fa-trash rojo"></i>
                      </a>
                    </td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
      <!-- Modal -->
      <form
        @submit.prevent="editmode ? ActualizarUsuario() : CrearUsuario()"
        @keydown="form.onKeydown($event) "
      >
        <div
          class="modal fade"
          id="addnew"
          tabindex="-1"
          role="dialog"
          aria-labelledby="addnew"
          aria-hidden="true"
        >
          <div class="modal-dialog modal-dialog-centered modal-lg cl" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" v-show="!editmode" id="addnew">NUEVA SOLICITUD</h5>
                <h5 class="modal-title" v-show="editmode" id="addnew">ACTUALIZAR INFO</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <div class="alert alert-secondary" role="alert" v-show="editmode">
                  <div class="form-group centered">
                    <div class="col-md-12">
                      <div class="btn-group btn-group-toggle" data-toggle="buttons">
                        <label class="btn btn-secondary active">
                          <input type="radio" name="options" id="Normal" checked /> Normal
                        </label>
                        <label class="btn btn-secondary">
                          <input type="radio" name="options" id="alta" autocomplete="off" /> Alta
                        </label>
                        <label class="btn btn-secondary">
                          <input type="radio" name="options" id="baja" autocomplete="off" /> Baja
                        </label>
                      </div>
                    </div>
                  </div>
                  <!-- <small>Activo ?</small> -->
                  <br />
                </div>
                <!-- CEDULA -->
                <div class="card card-header">
                  <div class="row">
                    <div class="div col-3">
                      <div class="form-group">
                        <div class="input-group mb-3">
                          <div class="input-group-prepend">
                            <span class="input-group-text">
                              <i class="fas fa-fingerprint"></i>
                            </span>
                          </div>
                          <input
                            v-model="form.cedula"
                            outlined
                            autofocus
                            type="text"
                            name="cedula"
                            placeholder="Cedula"
                            ref="cedula"
                            onkeypress="return event.charCode >= 48 && event.charCode <= 57"
                            pattern="\d*"
                            maxlength="11"
                            id="cedula"
                            class="form-control"
                            :class="{ 'is-invalid': form.errors.has('cedula') }"
                          />
                          <has-error :form="form" field="nombre"></has-error>
                        </div>
                      </div>
                    </div>
                  </div>
                  <!-- -------------------------------------------------------------------------------------------------- -->
                  <!-- PRIMER NOMBRE -->
                  <div class="row">
                    <div class="col-md-10">
                      <div class="form-group">
                        <div class="input-group mb-3">
                          <div class="input-group-prepend">
                            <span class="input-group-text">
                              <i class="fas fa-user"></i>
                            </span>
                          </div>
                          <input
                            v-model="form.primerNombre"
                            type="text"
                            name="primerNombre"
                            placeholder="Primer Nombre"
                            ref="primerNombre"
                            id="primerNombre"
                            class="form-control"
                            :class="{ 'is-invalid': form.errors.has('primerNombre') }"
                          />
                          <has-error :form="form" field="primerNombre"></has-error>
                        </div>
                      </div>
                    </div>
                    <!-- SEGUNDO NOMBRE -->
                    <div class="col-md-2">
                      <div class="form-group">
                        <div class="input-group mb-3">
                          <div class="input-group-prepend">
                            <span class="input-group-text">
                              <i class="fas fa-user"></i>
                            </span>
                          </div>
                          <input
                            v-model="form.segundoNombre"
                            type="text"
                            name="segundoNombre"
                            placeholder="SN"
                            text-transform:
                            lowercase
                            ref="SN"
                            pattern="\d*"
                            maxlength="1"
                            id="segundoNombre"
                            autofocus
                            class="form-control"
                            :class="{ 'is-invalid': form.errors.has('segundoNombre') }"
                          />
                          <has-error :form="form" field="segundoNombre"></has-error>
                        </div>
                      </div>
                    </div>
                  </div>
                  <!-- -------------------------------------------------------------------------------------------------- -->
                  <!-- PRIMER APELLIDO -->
                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                        <div class="input-group mb-3">
                          <div class="input-group-prepend">
                            <span class="input-group-text">
                              <i class="fas fa-user-tag"></i>
                            </span>
                          </div>
                          <input
                            v-model="form.primerApellido"
                            type="text"
                            name="primerApellido"
                            placeholder="Primer Apellido"
                            ref="primerApellido"
                            id="primerApellido"
                            class="form-control"
                            :class="{ 'is-invalid': form.errors.has('primerApellido') }"
                          />
                          <has-error :form="form" field="primerApellido"></has-error>
                        </div>
                      </div>
                    </div>
                    <!-- SEGUNDO APELLIDO -->
                    <div class="col-md-6">
                      <div class="form-group">
                        <div class="input-group mb-3">
                          <div class="input-group-prepend">
                            <span class="input-group-text">
                              <i class="fas fa-user-tag"></i>
                            </span>
                          </div>
                          <input
                            v-model="form.segundoApellido"
                            type="text"
                            name="segundoApellido"
                            placeholder="Segundo Nombre | opcional"
                            text-transform:
                            lowercase
                            ref="segundoApellido"
                            id="segundoApellido"
                            autofocus
                            class="form-control"
                            :class="{ 'is-invalid': form.errors.has('segundoApellido') }"
                          />
                          <has-error :form="form" field="segundoApellido"></has-error>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <!-- -------------------------------------------------------------------------------------------------- -->
                <!-- DEPARTAMENTO -->
                <div class="row">
                  <div class="col-md-4">
                    <div class="form-group">
                      <select
                        name="tipo"
                        v-model="form.departamento"
                        id="departamento"
                        class="form-control"
                        :class="{ 'is-invalid':form.errors.has('departamento')}"
                      >
                        <!-- <option selected disabled>Indique un rol</option> -->
                        <option value selected disabled hidden>Departamento</option>
                        <option value="user">Usuario Estandar</option>
                        <option value="admin">Administrador</option>
                        <option value="gestion">Gestion</option>
                      </select>
                      <has-error :form="form" field="departamento"></has-error>
                    </div>
                  </div>
                  <!-- PUESTO -->
                  <div class="col-md-4">
                    <div class="form-group">
                      <select
                        name="puesto"
                        v-model="form.puesto"
                        id="puesto"
                        class="form-control"
                        :class="{ 'is-invalid':form.errors.has('puesto')}"
                      >
                        <option value selected disabled hidden>Puesto</option>
                        <option value="user">Usuario Estandar</option>
                        <option value="admin">Administrador</option>
                        <option value="gestion">Gestion</option>
                      </select>
                      <has-error :form="form" field="tipo"></has-error>
                    </div>
                  </div>
                  <!-- LOCALIDAD -->
                  <div class="col-md-4">
                    <div class="form-group">
                      <select
                        name="localidad"
                        v-model="form.localidad"
                        id="localidad"
                        class="form-control"
                        :class="{ 'is-invalid':form.errors.has('localidad')}"
                      >
                        <option value selected disabled hidden>Localidad</option>
                        <option value="user">Usuario Estandar</option>
                        <option value="admin">Administrador</option>
                        <option value="gestion">Gestion</option>
                      </select>
                      <has-error :form="form" field="tipo"></has-error>
                    </div>
                  </div>
                </div>
                <!-- -------------------------------------------------------------------------------------------------- -->
                <!-- SUPERVISOR -->
                <div class="form-group">
                  <div class="input-group mb-3">
                    <div class="input-group-prepend">
                      <span class="input-group-text">
                        <i class="fas fa-eye"></i>
                      </span>
                    </div>
                    <input
                      v-model="form.supervisor"
                      type="email"
                      name="supervisor"
                      placeholder="Supervisor | Correo Electronico "
                      text-transform:
                      lowercase
                      ref="supervisor"
                      id="supervisor"
                      autofocus
                      class="form-control"
                      :class="{ 'is-invalid': form.errors.has('supervisor') }"
                    />
                    <has-error :form="form" field="supervisor"></has-error>
                  </div>
                </div>
                <!-- Fin contenido -->
                <!-- -------------------------------------------------------------------------------------------------- -->
                <div class="modal-footer">
                  <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
                  <button v-show="editmode" type="submit" class="btn btn-success">Actualizar</button>
                  <button v-show="!editmode" type="submit" class="btn btn-primary">Agregar</button>
                </div>
              </div>
            </div>
          </div>
        </div>
      </form>
      <!-- fin modal -->
    </div>
  </div>
</template>

<script>
export default {
  data() {
    return {
      //Modal multiproposito -> Ref : https://www.youtube.com/watch?v=IsKXpM1lwew&list=PL2GMR7k4bG4QOzLtn4WgMmLAjfKiAvRa1&index=25
      editmode: false,
      users: {},
      form: new Form({
        id: "",
        activo: false,
        primerNombre: "",
        segundoNombre: "",
        primerApellido: "",
        segundoApellido: "",
        departamento: "",
        puesto: "",
        localidad: "",
        supervisor: "",
        remember: false
      })
    };
  },
  methods: {
    ActualizarUsuario() {
      // 1 - Cargo el progress bar
      this.$Progress.start();
      // 2 - Enviamos la peticion al servidor
      this.form
        .put("/api/user/" + this.form.id)
        // 3 - Evaluamos los datos - si esto todo correcto
        .then(() => {
          //4- Muestro la notificacion
          swal.fire(
            this.form.nombre + " " + this.form.apellidos,
            "Ha sido <b>actualizado exitosamente !</b> ",
            "success"
          );
          // 5 - Mostramos el progress bar que finalizacion
          this.$Progress.finish();

          // 6 - Recargamos los datos
          Fire.$emit("RecargarData");

          //6 - Cierro la ventana modal
          $("#addnew").modal("hide");
          // toast.fire({
          // type: 'success',
          // title: 'Usuario actualizado exitosamente'
          // });
        })
        // Si se produce algun error
        .catch(() => {
          // Muestro una progress bar de error
          this.$Progress.fail();
        });
    },

    EditarModal(user) {
      this.editmode = true;
      this.form.reset();
      $("#addnew").modal("show");
      this.form.fill(user);
    },

    MostrarModal: function() {
      this.editmode = false;
      this.form.reset();
      $("#addnew").modal("show");
      this.$refs.cedula.focus();
      this.$refs.cedula.$el.focus();
    },
    EliminarUsuario(id, nombre, apellidos) {
      swal
        .fire({
          title: "Estas seguro?",
          html:
            "El usuario  " + nombre + " " + apellidos + " " + "sera eliminado",
          type: "warning",
          footer:
            '<button type="button" class="btn btn-block btn-danger btn-flat parpadea ">Una vez eliminado no podrás revertirlo !</button>',
          showCancelButton: true,
          confirmButtonColor: "#3085d6",
          cancelButtonColor: "#d33",
          confirmButtonText: "Si, eliminalo!"
        })
        .then(result => {
          if (result.value) {
            //Envio el request al servidor - backend
            this.form.delete("/api/user/" + id).then(() => {
              swal.fire(
                nombre + " " + apellidos,
                "Ha sido <b>removido del sistema</b>",
                "success"
              );
              Fire.$emit("RecargarData");
            });
          }
        });
    },

    CargarUsuarios() {
      axios.get("api/user").then(({ data }) => (this.users = data.data));
    },
    CrearUsuario() {
      this.form
        .post("/api/user")
        //DE TODO ESTAR CORRECTO ----> video tutorail : https://www.youtube.com/watch?v=97JFc7g_0wE&list=PL2GMR7k4bG4QOzLtn4WgMmLAjfKiAvRa1&index=22
        .then(() => {
          // Submit the form via a POST request
          // 1- Cargo el progress bar
          this.$Progress.start();
          // 2- Hago la peticion de la data
          //3- Recargo los datos
          Fire.$emit("RecargarData");
          //4- Cierro la ventana modal
          $("#addnew").modal("hide");
          //5- Cargo la barra como finalizado por proceso
          this.$Progress.finish();
          //6- Hago la notificacion
          toast.fire({
            type: "success",
            title: "Usuario creado exitosamente"
          });
        })
        //DE LO CONTRARIO
        .catch(() => {
          this.$Progress.fail();
        });
    }
  },
  created() {
    this.CargarUsuarios();

    // RECARGAR DATA

    // Opcion A
    // Referencia : https://vuejs.org/v2/guide/components-custom-events.html
    // Metodo de recarga con Vue - video referencia : https://www.youtube.com/watch?v=DHuTkJzH2jI&list=PL2GMR7k4bG4QOzLtn4WgMmLAjfKiAvRa1&index=21
    Fire.$on("RecargarData", () => {
      this.CargarUsuarios();
    });

    // Opcion B
    //Actualizar datos cada 3 segundos video referencia : https://www.youtube.com/watch?v=AqO_afAc1kQ&list=PL2GMR7k4bG4QOzLtn4WgMmLAjfKiAvRa1&index=20
    // setInterval(() => this.CargarUsuarios() , 3000);
  }
};
</script>

