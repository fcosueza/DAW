<div class="result">
    {if isset($errors)}
        <h2 class="result__title">Formulario con Errores!!</h2>
        <p class="result__text">
            El formulario no se ha podido enviar correctamente debido a que hay
            errores en los campos. En la siguiente lista, se muestran todos los
            errores que se han encontrado:
        </p>
        <ul class="errorList">
            {foreach $errors as $attr => $msg}
                <li>{include file="components/errorMsg.tpl" errorMsg=$msg}</li>
                {/foreach}
        </ul>
    {else}
        <h2 class="result__title">Formulario Enviado!!</h2>
        <p class="result__text">
            El formulario se ha enviado correctamente y el nuevo taller se ha
            añadido a la base de datos. El ID asignado a dicho taller es:
        </p>
        <h3 class="result__id">Taller ID: {$id}</h3>
    {/if}
</div>