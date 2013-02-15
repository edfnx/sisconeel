    <select id="medicoid" name="data[RegLlamada][medico_id]">
        <option value="" selected="" >Seleccione Medico</option>
        <?php
            foreach($medicos as $medico){
                $id = $medico['Medico']['id'];
                $nombre = $medico['Medico']['medico'];
                echo "<option value='$id'>$nombre</option>";
            }
        ?>
    </select>
    <br />