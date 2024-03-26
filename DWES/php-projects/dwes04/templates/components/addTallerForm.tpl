<form action="?accion=crear_taller" method="post">
    <div class="form__control">
        <label class="form__label" for="name">Nombre</label>
        <input class="form__input" id="name" name="name" type="text" required>
    </div>
    <div class="form__control">
        <label class="form__label" for="description">Descripción</label>
        <input class="form__input" id="description" name="description" type="text" required>
    </div>
    <div class="form__control">
        <label class="form__label" for="place">Ubicación</label>
        <input class="form__input" id="place" name="place" type="text" required>
    </div>
    <div class="form__control">
        <label class="form__label" form="dayWeek">Dia de la Semana</label>
        <select id="" name="dayWeek" id="dayWeek" required>
            {html_options options=$dayOptions selected=$daySelected}
        </select>
    </div>
    <div class="form__control">
        <label class="form__label" for="iniHour">Hora de Inicio</label>
        <input class="form__input" id="iniHour" name="iniHour" type="time" required>
    </div>
    <div class="form__control">
        <label class="form__label" for="endHour">Hora de Final</label>
        <input class="form__input" id="endHour" name="endHour" type="time" required>
    </div>
    <div class="form__control">
        <label class="form__label" for="quota">Cupo</label>
        <input class="form__input" id="quota" name="quota" type="number"  min="5" max="30" required>
    </div>

    <button class="form__button" type="submit">Enviar</button>
</form>
