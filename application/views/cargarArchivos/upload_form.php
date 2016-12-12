
<body>	
<?=heading('Suba un archivo pdf', 2);?>
<?=$error;?>
<?=form_open_multipart('Main_controller/do_upload');?>
<input type="file" name="userfile" size="20" />
<br />
<input type="submit" value="Subir Archivo" />
<?=form_close()?>
<h5><?=br(1).anchor('Main_controller/info', 'Listado de archivos para descargar'); ?></h5>
<h6><?=anchor('Main_controller/Perfil', 'Volver al menu principal'); ?></h6>
</body>
</html>
