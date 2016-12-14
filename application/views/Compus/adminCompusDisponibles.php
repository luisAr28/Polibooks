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
<?= form_open('http://localhost/Polibooks/Main_controller/obtenerCompuPrestamo2') ?>
<?php
    $compu=array(
    'name' => 'compu',
    'placeholder' => 'escribe el número de computadora'
    );

    $alumno=array(
    'name' => 'boleta',
    'placeholder' => 'Boleta'
    );
?>

<?= form_label('Computadora: ','compu') ?>
<?= form_input($compu) ?>
</br></br>
<?= form_label('Boleta: ','boleta') ?>
<?= form_input($alumno) ?>
</br></br>
<?= form_submit('','Reservar') ?>
<?= form_close()?>
</body>
</html>
