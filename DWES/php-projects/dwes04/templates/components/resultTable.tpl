<table class="table">
    <thead class="table__head">
        <tr>
            <th>Id</th>
            <th>Nombre</th>
            <th>Descripción</th>
            <th>Ubicacion</th>
            <th>Dia Semana</th>
            <th>Hora Inicio</th>
            <th>Hora Fin</th>
            <th>Cupo Máximo</th>
        </tr>
    </thead>
    <tbody>
        {foreach talleres as taller}
            <tr>
                <td class="table__cell">{$taller->getId()}</td>
                <td class="table__cell">{$taller->getNombre()}</td>
                <td class="table__cell">{$taller->getDescripcion}</td>
                <td class="table__cell">{$taller->getUbicacion()}</td>
                <td class="table__cell">{$taller->getDia()}</td>
                <td class="table__cell">{$taller->getHoraInicio()}</td>
                <td class="table__cell">{$taller->getHoraFinal()}</td>
                <td class="table__cell">{$taller->getCupo}</td>
            </tr>
        {/foreach}
    </tbody>
</table>
