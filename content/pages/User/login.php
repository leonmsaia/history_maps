<div class="login-page">
  <div class="login-form-box z-depth-1">
    <h1>DELIGHT</h1>
    <h3>Login To Your Account</h3>

    <?php echo form_open("User/loginAction");?>
      <div class="input-field">
        <input type="text" name="logmail" id="logmail" placeholder="Username" />
        <label for="logmail">Username</label>
      </div>
      <div class="input-field">
        <input type="password" name="logpass" id="logpass" placeholder="Password" />
        <label for="logpass">Password</label>
      </div>
      <div class="input-field">
        <input type="checkbox" id="remember">
        <label for="remember">Remember Me!</label>
        </div>
      <button class="btn waves-effect waves-light red" type="submit">Sign In</button>
      <a href="<?php echo base_url();?>user/forget" title="">Forgot Password?</a>
      <a href="<?php echo base_url();?>user/register" title="">Create An Account</a>
    <?php echo form_close();?>

  </div>
</div>
