<table class="table">
    <thead class="table__head">
        <tr>
            <th class="table__cell">Id</th>
            <th class="table__cell">Nombre</th>
            <th class="table__cell">Descripción</th>
            <th class="table__cell">Ubicacion</th>
            <th class="table__cell">Dia Semana</th>
            <th class="table__cell">Hora Inicio</th>
            <th class="table__cell">Hora Fin</th>
            <th class="table__cell">Cupo Máximo</th>
        </tr>
    </thead>
    <tbody>
        {foreach $talleres as $taller}
            <tr>
                <td class="table__cell">{$taller->getId()}</td>
                <td class="table__cell">{$taller->getNombre()}</td>
                <td class="table__cell">{$taller->getDescripcion()}</td>
                <td class="table__cell">{$taller->getUbicacion()}</td>
                <td class="table__cell">{$taller->getDia()}</td>
                <td class="table__cell">{$taller->getHoraInicio()}</td>
                <td class="table__cell">{$taller->getHoraFinal()}</td>
                <td class="table__cell">{$taller->getCupo()}</td>
            </tr>
        {/foreach}
    </tbody>
</table>
