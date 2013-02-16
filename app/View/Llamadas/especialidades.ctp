    <select id="especialidadid" name="data[RegLlamada][especialidade_id]">
        <option value="" selected="" >Seleccione Especialidad</option>
        <?php
            foreach($especialidades as $especialidad):
                $id = $especialidad['Especialidade']['id'];
                $nombre = $especialidad['Especialidade']['especialidad'];
                echo "<option value='$id'>$nombre</option>";
            endforeach;
        ?>
    </select>
    <?php
        echo $this->Ajax->observeField('especialidadid',
                                array(
                                        'url'=>array('action'=>'medicos'),
                                        'update'=>'divmedico'
                                        ));
    ?>