<div class="col s12">

	<div class="col s6">
		<div class="widget z-depth-1">
			<div class="loader"></div>
			<div class="widget-title">
				<h3>Datos del Usuario</h3>
				<p>Datos basicos de configuracion de cuenta.</p>
				<a class="options dropdown-button waves-effect" href="#" title="" data-activates='dropdown3'><i class="ti-more-alt"></i></a>
			</div>

			<?php foreach ($user_information->result() as $usr_nfo): ?>
					<?php echo form_open("User/user_profile_save_common", 'class="col s12"');?>
						<div class="row">
							<div class="input-field col s12">
								<input value="<?php echo $usr_nfo->username;?>" id="username_val" name="username_val" type="text" class="validate">
								<label for="username_val">Nombre de Usuario</label>
							</div>
							<div class="input-field col s6">
								<input value="<?php echo $usr_nfo->first_name;?>" id="first_name_val" name="first_name_val" type="text" class="validate">
								<label for="first_name_val">Nombre</label>
							</div>
							<div class="input-field col s6">
								<input value="<?php echo $usr_nfo->last_name;?>" id="last_name_val" name="last_name_val" type="text" class="validate">
								<label for="last_name_val">Apellido</label>
							</div>
						</div>
						<div class="row">
							<div class="input-field col s6">
								<input value="<?php echo $usr_nfo->birth;?>" id="birth_val" name="birth_val" type="text" class="validate">
								<label for="birth_val">Fecha de Nacimiento</label>
							</div>
							<div class="input-field col s6">
								<input value="<?php echo $usr_nfo->user_data_associated_company;?>" id="company_val" name="company_val" type="text" class="validate">
								<label for="company_val">Establecimiento Educativo</label>
							</div>
						</div>
						<div class="row">
							<div class="input-field col s12">
								<textarea id="bio_val" class="materialize-textarea" name="bio_val"><?php echo $usr_nfo->user_data_associated_bio;?></textarea>
								<label for="bio_val">Biografia</label>
							</div>
						</div>
						<div class="row">
							<div class="input-field col s6">
									<input value="<?php echo $usr_nfo->email;?>" id="email_val" name="email_val" type="email" class="validate">
									<label for="email_val">Email</label>
							</div>
							<div class="input-field col s6">
									<input value="<?php echo $usr_nfo->phone;?>" id="phone_val" name="phone_val" type="text" class="validate">
									<label for="phone_val">Telefono</label>
							</div>
						</div>
						<div class="row">
							<div class="input-field col s4">
									<input value="<?php echo $usr_nfo->user_data_associated_twitter;?>" id="twitter_val" name="twitter_val" type="text" class="validate">
									<label for="twitter_val">Twitter</label>
							</div>
							<div class="input-field col s4">
									<input value="<?php echo $usr_nfo->user_data_associated_linkedin;?>" id="linkedin_val" name="linkedin_val" type="text" class="validate">
									<label for="linkedin_val">LinkedIn</label>
							</div>
							<div class="input-field col s4">
									<input value="<?php echo $usr_nfo->user_data_associated_academia;?>" id="academia_val" name="academia_val" type="text" class="validate">
									<label for="academia_val">Academia.Edu</label>
							</div>
						</div>
						<div class="row">
							<div class="col s12">
								<button class="btn waves-effect waves-light red" type="submit">Guardar</button>
							</div>
						</div>
					<?php echo form_close();?>
			<?php endforeach; ?>

		</div>
	</div>

		<div class="col s6">
			<div class="widget z-depth-1">
				<div class="loader"></div>
				<div class="widget-title">
					<h3>Configuracion de Seguridad</h3>
					<p>Cambios de contraseña y aspectos de la seguridad.</p>
					<a class="options dropdown-button waves-effect" href="#" title="" data-activates='dropdown3'><i class="ti-more-alt"></i></a>
				</div>
				<form class="col s12">
					<div class="row">
						<div class="input-field col s12">
							<input id="first_name" type="text" class="validate">
							<label for="first_name">Contraseña Actual</label>
						</div>
					</div>
					<div class="row">
						<div class="input-field col s12">
							<input id="last_name" type="text" class="validate">
							<label for="last_name">Nueva Contraseña</label>
						</div>
					</div>
					<div class="row">
						<div class="input-field col s12">
							<input id="last_name" type="text" class="validate">
							<label for="last_name">Repita Nueva Contraseña</label>
						</div>
					</div>
					<div class="row">
						<div class="col s12">
							<button class="btn waves-effect waves-light red" type="submit">Guardar</button>
						</div>
					</div>
			</form>
		</div>
	</div>



</div>
