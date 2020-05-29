
<div class="row">
	<div class="col-xs-4">
		<div ><img style="width: 100%; height: 100%;" src="<?php echo base_url(); ?>assets/proy/images/cabecera_001.png"></div>
	</div>
	<div class="col-xs-8">
		<b style="text-aling:center">SISTEMA DE INFORMACION BAJO AMBIENTE WEB</b><br>
    <b>PARA EL CONTROL DE EQUIPOS Y SOPORTE TECNICO</b> <br>
    <b>DE LA COORDINACIÓN DE TELEMÁTICA – NPF</b><br>
	</div>
</div> <br>
<div class="row">
	<div class="col-xs-6">
		<b>Usuario</b><br>
		<b>Nombres y apellidos:</b> <?php echo $usuario->nom_usuario;?> <?php echo $usuario->ape_usuario;?> <br>
		<b>Nro Documento:</b> <?php echo $usuario->ci_usuario;?><br>
		<b>Correo:</b> <?php echo $usuario->correo_usuario;?><br>
    <b>cargo:</b><?php echo $usuario->cargo;?><br>
    <b>Dependencia:</b><?php echo $usuario->dependencia;?><br>
		<b>Tipo de Usuario:</b><?php echo $usuario->tipo;?><br>
	</div>
