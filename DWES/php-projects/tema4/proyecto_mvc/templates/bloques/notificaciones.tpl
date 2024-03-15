{if isset($notificaciones) && is_array($notificaciones) && count($notificaciones)>0}
<div class="notificaciones">
<ul>
    {foreach from=$notificaciones item=notificacion}
        <li>{$notificacion}</li>
    {/foreach}
</ul>
</div>
{/if}