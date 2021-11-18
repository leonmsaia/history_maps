<div class="login-page">
  <div class="login-form-box z-depth-1">
    <h1>DELIGHT</h1>
    <h3>Rellenar el siguiente formulario para poder registrarse.</h3>
    <?php echo form_open("User/registerUserAction");?>
      <div class="row">
        <div class="col-12">
          <div class="input-field">
            <input type="text" name="first_name" id="first_name"/>
            <label for="first_name">Nombre</label>
          </div>
          <div class="input-field">
            <input type="text" name="last_name" id="last_name"/>
            <label for="last_name">Apellido</label>
          </div>
          <div class="input-field">
            <input type="email" name="email" id="email"/>
            <label for="email">Email</label>
          </div>
          <div class="input-field">
            <input type="password" name="password" id="password"/>
            <label for="password">Contraseña</label>
          </div>
          <div class="input-field">
            <input type="password" name="password_confirm" id="password_confirm"/>
            <label for="password_confirm">Confirmar Contraseña</label>
          </div>
        </div>
        <div class="col-12">
          <button type="submit" class="btn waves-effect waves-light red">Registrarme</button>
        </div>
        <div class="col-12">
            <p>Al crear esta cuenta, esta aceptando <br>los <a href="<?php echo base_url();?>terms">Terminos y Condiciones</a></p>
        </div>
      </div>
    <?php echo form_close();?>
  </div>
</div>
