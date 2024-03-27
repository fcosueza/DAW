{include file="header.tpl" title="Talleres Asociación Respira"}

<div>
    {if isset($errors)}
        <h2>El formulario no se ha enviado correctamente. Los errores son los siguientes:</h2>
        <ul class="errorList">
            {foreach $errors as $attr => $msg}
                <li>{include file="components/errorMsg.tpl" errorMsg=$msg}</li>
                {/foreach}
        </ul>
    {else}
        <h1>El taller se ha guardado correctamente.</h1>
    {/if}
</div>

{include file="footer.tpl"}
