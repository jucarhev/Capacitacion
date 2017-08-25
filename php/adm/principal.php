<div class="izquierda">		
	<div id="content">
        <script type="text/javascript">
		$(document).ready(function(){
		        var button = $('#upload');
		        new AjaxUpload(button,{
		            action: 'procesa.php',
		            name: 'image',
		            onComplete: function(){
		            	galeria();
		            }
		        });
		    });

function mes(){
alert("Asegures");
}
</script>
    <input type="submit" id="upload" value="Subir Foto">
    </div>
<div id="galeria">
	
</div>
</div>
<div class="derecha">
	<div>
		<form action="" method="post" onsubmit="avisoAdm();return false">
			<input type="text" id="Aviso"  placeholder="Escriba un aviso" class="" size="50" required> 
			<input type="submit" name="" value="Enviar aviso" >			
		</form>
		<input type="submit" name="" value="Recargar" onclick="MAavisos();return false">
	</div>
	<hr>
	<div id="avisos"></div>
</div>