    <select id="especialidadid" name="data[RegLlamada][especialidad]">
        <option value="" selected="" >Seleccione Especialidad</option>
        <?php
            foreach($especialidades as $especialidad):
                $id = $especialidad['Medico']['espec'];
                $nombre = $especialidad['Medico']['espec'];
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