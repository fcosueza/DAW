<form class="form" action="http://php-projects/dwes04/index.php"  method="post">
    <input class="form__input" id="day" name="day" type="text" placeholder="Introduce el dia de la semana..">
    <button class="form__button" type="submit">Buscar</button>

    {if isset($error)}
        {include file="components/errorMsg.tpl" errorMsg=$error}
    {/if}
</form>