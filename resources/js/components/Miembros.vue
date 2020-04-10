<style>
.widget-user .widget-user-username {
  color: #fff;
}

.widget-user .widget-user-desc {
  color: #fff;
}
</style>

<template>
  <div row mt-4>
    <div class="container-fluid">
      <div>
        <div class="card">
          <div class="card-header">
            <h3 class="card-title">TABLA DE MIEMBROS</h3>
            <div class="card-tools">
              <button type="button" class="btn btn-primary">
                <i class="fa fa-user-plus" aria-hidden="true"></i> Agregar
              </button>
            </div>
          </div>
          <div class="card-tool"></div>

          <!-- /.card-header -->
          <div class="card-body table-responsive p-0">
            <table class="table table-hover">
              <thead>
                <tr>
                  <th width="5%">ID</th>
                  <th width="20%">Nombre</th>
                  <th width="20%">Usuario</th>
                  <th width="20%">Correo Electronico</th>
                  <th width="15%">Rol</th>
                  <th width="10%">Estado</th>
                  <th width="10%">Fecha Creacion</th>
                  <th width="10%" text-align:center>Opciones</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>183</td>
                  <td>John Doe</td>
                  <td>jdee</td>
                  <td>jdoe@viva.com.do</td>
                  <td>Publicar</td>
                  <td>Activo</td>
                  <td>20-Agoto-2019</td>
                  <td text-align:center>
                    <a ref="#">
                      <i class="fas fa-edit azul"></i>
                      <i class="fas fa-trash rojo"></i>
                    </a>
                  </td>
                </tr>
              </tbody>
            </table>
          </div>
          <!-- /.card-body -->
        </div>
        <!-- /.card -->
      </div>
    </div>
  </div>
</template>

<script>
export default {
  mounted() {
    console.log("Component mounted.");
  }
};
</script>
