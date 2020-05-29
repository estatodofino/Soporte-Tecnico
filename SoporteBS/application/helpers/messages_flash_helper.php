<?php 
defined("BASEPATH") or die("Acceso prohibido");

if(!function_exists('messages_flash'))
{
	/**
	* @desc - muestra mensajes al usuario
	* @param $type - string con el tipo de panel de bootstrap
	* @param $flash - string mensaje a mostrar al usuario
	* @param $headMessage - string con el texto de la cabeceral del panel
	* @param $validation - bool, si es true son errores de form_validation, por defecto false
	* @return panel bootstrap con el contenido del mensaje
	*/
	function messages_flash($type,$flash,$headMessage, $validation = false)
	{ 
		$ci =& get_instance();
		if($validation == true && validation_errors())
		{
		?>
		<div class="callout callout-<?php echo $type ?>">
			<p><b><?php echo $headMessage ?></b></p>
				<p><?php echo $flash ?></p>
						 			    
		</div>
		<?php
		}
		else if($ci->session->flashdata($flash))
		{
		?>
		<div class="callout callout-<?php echo $type ?>">
			<p><b><?php echo $headMessage ?></b></p>
			 <p>
			    <?php echo $ci->session->flashdata($flash) ?>
			 </p>
		</div>
		<?php
		}
	}
}