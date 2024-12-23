<form  class="form flex center" action="?accion=crear_taller" method="post">
    <div class="form__header">
        <h2 class="form__title">Taller Nuevo</h2>
    </div>
    <div class="form__control flex">
        <label class="form__label" for="nombre">Nombre</label>
        <input class="form__input" id="nombre" name="nombre" type="text" required>
    </div>
    <div class="form__control flex">
        <label class="form__label" for="descripcion">Descripción</label>
        <input class="form__input" id="descripcion" name="descripcion" type="text" required>
    </div>
    <div class="form__control flex">
        <label class="form__label" for="ubicacion">Ubicación</label>
        <input class="form__input" id="ubicacion" name="ubicacion" type=ubicacion" required>
    </div>
    <div class="form__control flex">
        <label class="form__label" for="dia">Dia de la Semana</label>
        <select class="form__select" id="dia" name="dia" required>
            {html_options options=$options selected=$selected}
        </select>
    </div>
    <div class="form__control flex">
        <label class="form__label" for="hora_inicio">Hora de Inicio</label>
        <input class="form__input" id="hora_inicio" name="hora_inicio" type="time" required>
    </div>
    <div class="form__control flex">
        <label class="form__label" for="hora_final">Hora de Final</label>
        <input class="form__input" id="hora_final" name="hora_final" type="time" required>
    </div>
    <div class="form__control flex">
        <label class="form__label" for="cupo">Cupo</label>
        <input class="form__input" id="cupo" name="cupo" type="number"  min="5" max="30" required>
    </div>

    <button class="form__button" type="submit">Enviar</button>
</form>