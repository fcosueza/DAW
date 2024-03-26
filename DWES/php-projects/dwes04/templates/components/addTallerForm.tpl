<form action="?accion=crear_taller" method="post">
    <div class="form__control">
        <label class="form__label" for="name">Nombre</label>
        <input class="form__input" name="name" type="text" required>
    </div>
    <div class="form__control">
        <label class="form__label" for="description">Descripción</label>
        <input class="form__input" name="description" type="text" required>
    </div>
    <div class="form__control">
        <label class="form__label" for="place">Ubicación</label>
        <input class="form__input" name="place" type="text" required>
    </div>
    <div class="form__control">
        <label class="form__label" form="dayWeek">Dia de la Semana</label>
        <select name="dayWeek" id="dayWeek">
            {html_options options=$dayOptions selected=$daySelected}
        </select>
    </div>
    <div class="form__control">
        <label class="form__label" for="iniHour">Hora de Inicio</label>
        <input class="form__input" name="iniHour" type="time" required>
    </div>
    <div class="form__control">
        <label class="form__label" for="iniHour">Hora de Inicio</label>
        <input class="form__input" name="iniHour" type="time" required>
    </div>
    <div class="form__control">
        <label class="form__label" for="iniHour">Cupo</label>
        <input class="form__input" name="iniHour" type="number"  min="5" max="30" required>
    </div>

    <button type="submit">Enviar</button>
</form>
