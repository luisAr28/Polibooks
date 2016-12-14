<table border="solid">
                    <thead>
                        <tr bgcolor="white">

                            <th>Maquina</th>
                            <th>Nombre Maquina</th>
                            <th></th>
                         </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($disponibles as $c):?>

                        <tr bgcolor="white">

                        <td><?=$c->idComputadora?></td>
                        <td><?=$c->Nombre?></td>
                        
                        </tr>

                        <?php endforeach;?>
                    </tbody>
                </table>
<?= form_open('http://localhost/Polibooks/Main_controller/liberarCompuPrestamo') ?>
<?php
    $compu=array(
    'name' => 'compu',
    'placeholder' => 'escribe el número de computadora'
    );
?>

<?= form_label('Computadora: ','compu') ?>
<?= form_input($compu) ?>
<?= form_submit('','Liberar') ?>
<?= form_close()?>

<?= form_open('http://localhost/Polibooks/Main_controller/confirmarCompuPrestamo') ?>
<?php
    $compu=array(
    'name' => 'compu',
    'placeholder' => 'escribe el número de computadora'
    );
?>

<?= form_label('Computadora: ','compu') ?>
<?= form_input($compu) ?>
<?= form_submit('','Confirmar') ?>
<?= form_close()?>
</body>
</html>

</body>
</html>
