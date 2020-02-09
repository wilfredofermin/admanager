<style >
.container {
  max-width: 1600px;
}
.widget-user .widget-user-image > img {
  width: 114px;
  height: auto;
  border: 2px solid #99cf16;
}
.widget-user .widget-user-header {
  padding: 6rem;
  height: 134px;
  border-top-left-radius: 0.25rem;
  border-top-right-radius: 0.25rem;
}
.img-circle {
  border-radius: 35%;
}
.nav-pills .nav-link.active,
.nav-pills .show > .nav-link {
  color: #fff;
  background-color: #8778b2;
}
.nav-tabs .nav-link.active,
.nav-tabs .nav-item.show .nav-link {
  color: #f4f4f5;
  background-color: #8778b2;
  border-color: #728e1d #dee2e6 #98c61b;
}
</style>

// Login informacion tutorial :https://www.youtube.com/watch?v=5j2VZLkVCVA&list=PLB4AdipoHpxaHDLIaMdtro1eXnQtl_UvE&index=30
<template>
  <div class="container">
    <div class="row card card-primary card-outline">
      <div class="col-md-12 mt-2">
        <!-- Widget: user widget style 1 -->
        <div class="box box-widget widget-user">
          <!-- Add the bg color to the header using any of the bg-* classes -->
          <div
            class="widget-user-header bg-black"
            style="background: url('https://ak9.picdn.net/shutterstock/videos/11211479/thumb/1.jpg') center center;"
          >
            <h2 class="widget-user-username">{{form.nombre + ' '+ form.apellidos | capitalize}}</h2>
            <h5 class="widget-user-desc">{{form.tipo | capitalize}}</h5>
          </div>
          <div class="widget-user-image">
            <img class="img-circle" src="/img/profile/wfermin.jpg" alt="User Avatar" />
          </div>
          <div class="box-footer">
            <div class="row">
              <div class="col-sm-4 border-right">
                <div class="description-block">
                  <h5 class="description-header">26</h5>
                  <span class="description-text">SOLICITUDES PENDIENTES</span>
                </div>
                <!-- /.description-block -->
              </div>
              <!-- /.col -->
              <div class="col-sm-4 border-right">
                <div class="description-block">
                  <h5 class="description-header">120</h5>
                  <span class="description-text">SOLICITUDES CERRADAS</span>
                </div>
                <!-- /.description-block -->
              </div>
              <!-- /.col -->
              <div class="col-sm-4">
                <div class="description-block">
                  <h5 class="description-header">3</h5>
                  <span class="description-text">SOLICITUDES VENCIDAS</span>
                </div>
                <!-- /.description-block -->
              </div>
              <!-- /.col -->
            </div>
            <!-- /.row -->
          </div>
        </div>
        <br />
        <!-- /.widget-user -->
        <div class="col-lg-12">
          <div class="card">
            <div class="card-body">
                <!-- Aqui body del formulario -->
                <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab" aria-controls="pills-profile" aria-selected="true">Profile</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link " id="pills-actividad-tab" data-toggle="pill" href="#pills-actividad" role="tab" aria-controls="pills-actividad" aria-selected="false">Actividad</a>
                </li>
               
                <li class="nav-item">
                    <a class="nav-link" id="pills-contact-tab" data-toggle="pill" href="#pills-contact" role="tab" aria-controls="pills-contact" aria-selected="false">Contact</a>
                </li>
                </ul>
                <div class="tab-content" id="pills-tabContent">
               
                <div class="tab-pane fade show active" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">

                   <!-- Inicio aqui -->
                  <form @submit.prevent="ActualizarUsuario()">
                    <div class="form-group">
                      <input
                        v-model="form.nombre"
                        type="text"
                        name="nombre"
                        placeholder="Nombre"
                        ref="nombre"
                        class="form-control"
                        :class="{ 'is-invalid': form.errors.has('nombre') }"
                      />
                      <has-error :form="form" field="nombre"></has-error>
                    </div>

                    <div class="form-group">
                      <input
                        v-model="form.apellidos"
                        type="text"
                        name="apellidos"
                        placeholder="Apellidos"
                        class="form-control"
                        :class="{ 'is-invalid': form.errors.has('apellidos') }"
                      />
                      <has-error :form="form" field="apellidos"></has-error>
                    </div>
                    <!-- <div class="form-group" v-show="!editmode"> -->
                    <div class="form-group">
                      <input
                        v-model="form.email"
                        type="text"
                        name="email"
                        placeholder="Correo electronico"
                        class="form-control"
                        :class="{ 'is-invalid': form.errors.has('email') }"
                      />
                      <has-error :form="form" field="email"></has-error>
                    </div>
                    <div class="form-group">
                      <textarea
                        v-model="form.bio"
                        name="bio"
                        id="bio"
                        class="form-control"
                        rows="5"
                        placeholder="Descripcion del usuario (Opcional)"
                      >
                         class="form-control" :class="{ 'is-invalid': form.errors.has('bio') }">
                    </textarea>
                      <has-error :form="form" field="bio"></has-error>
                    </div>

                    <div class="form-group">
                      <select
                        name="tipo"
                        v-model="form.tipo"
                        id="tipo"
                        class="form-control"
                        :class="{ 'is-invalid':form.errors.has('tipo')}"
                      >
                        <option value selected disabled hidden>Indique un rol</option>
                        <option value="user">Usuario Estandar</option>
                        <option value="admin">Administrador</option>
                        <option value="gestion">Gestion</option>
                      </select>
                      <has-error :form="form" field="tipo"></has-error>
                    </div>
                    <form>
                    <div class="form-group">
                      <label for="Foto">
                        <i class="fas fa-edit"></i>Cambiar imagen
                      </label>
                      <input
                        type="file"
                        @change="ActualizarFoto"
                        class="form-control-file"
                        id="foto"
                      />
                    </div>
                  </form>
                    <small>
                      <b>Contraseña</b>(Dejar vacio de no cambiar)
                    </small>
                    <div class="form-group">
                      <input
                        v-model="form.password"
                        type="password"
                        name="password"
                        placeholder="Contraseña"
                        class="form-control"
                        :class="{ 'is-invalid': form.errors.has('password') }"
                      />
                      <has-error :form="form" field="password"></has-error>
                    </div>

                    <!-- Fin contenido  -->
                    <div class="center-block">
                      <center>
                        <button type="submit" class="btn btn-primary">
                          <i class="fa fa-retweet"></i> Actualizar Info
                        </button>
                      </center>
                    </div>
                  </form>
                </div>
                 <div class="tab-pane fade " id="pills-actividad" role="tabpanel" aria-labelledby="pills-actividad-tab">
                     ACTIVIDAD AQUI
                     </div>
                <div class="tab-pane fade" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab">...</div>
                </div>
                <!-- Fin body formulario -->
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- /.card -->
</template>

<script>
export default {
  data() {
    return {
      form: new Form({
        id: "",
        activo: "",
        nombre: "",
        apellidos: "",
        foto: "",
        tipo: "",
        email: "",
        remember: false
      })
    };
  },

  methods: {
      ActualizarUsuario(){
         this.form.put('api/profile')
                  .then(() =>{
                         toast.fire({
                            type: "success",
                            title: "Perfil actualizado exitosamente"
                        
                         });

                  })
                  .catch(() =>{

                  });  
      },
    ActualizarFoto(e) {
      // console.log('Tengo la imagen')
      let file = e.target.files[0];

      let reader = new FileReader();

      reader.onloadend = file => {
        // console.log("RESULT", reader.result);
        this.form.foto = reader.result;
      };
      reader.readAsDataURL(file);
    }
  },

  created() {
    axios.get("api/profile").then(({ data }) => this.form.fill(data));
  }
};
</script>
