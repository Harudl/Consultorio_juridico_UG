<tbody>
<?php foreach($resultado as $fila){ ?>
                            <tr>
                            <td></td>
                                <td><?php echo $fila['nombresA'];?></td>
                                <td><?php echo $fila['personal_nombre'];?></td>
                                <td><?php echo $fila['Fecha_patrocinio']; ?></td>

                                <td><?php echo $fila['unidad_judicial']; ?></td>
                                <td><?php echo $fila['num_causa']; ?></td>
                                <td><?php echo $fila['materia_nombre'];?></td>
                                <td><?php echo $fila['tema'];?></td>
                                <td><?php echo $fila['estado_nombre']; ?></td>   
                                                   
                                <td><?php echo $fila['resumen'];?></td>                 
                                   
                            </tr>    
                            <?php } ?>       
</tbody>