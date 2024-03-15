{include file="header.tpl" title="Página de inicio" exclude="principal"}
{$logged=isset($smarty.session.usuario)}    

<table border="1px solid blue">
    <thead>
        <tr>
            <th>Id</th>
            <th>Codigo</th>
            <th>Descripción</th>
            <th>Precio</th>
            <th>Stock</th>     
            {if $logged}            
                 <th>Operaciones</th>
            {/if}
        </tr>
    </thead>
    <tbody>
        {foreach $productos as $producto}
        <tr>
            <td>
                {$producto->getId()}
            </td>
            <td>
                {$producto->getCod()}
            </td>
            <td>
                {$producto->getDescripcion()}
            </td>
            <td>
                {$producto->getPrecio()}
            </td>
            <td>
                {$producto->getStock()}
            </td>
            {if $logged}            
            <td>
                {include file="bloques/add_to_fav_form.tpl" idprod=$producto->getId()}
            </td>
            {/if}
        </tr>
        {/foreach}
    </tbody>
    <tfoot>
    <tr>
    <td {if $logged} colspan="6" {else} colspan="5" {/if} style="text-align:center">

    </td>
    </tr>
    </tfoot>
</table>
{include file="footer.tpl"}