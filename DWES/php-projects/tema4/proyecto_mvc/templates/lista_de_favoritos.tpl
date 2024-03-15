{include file="header.tpl" title="Lista de favoritos" exclude="listfavs"}
<H2>Esta es tu lista de productos favoritos</H2>
<table border="1px solid blue">
    <thead>
        <tr>
            <th>ID</th>            
            <th>Codigo</th>
            <th>Descripción</th>
            <th>Precio</th>            
            <th>Operaciones</th>
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
                {include file="bloques/remove_from_fav_form.tpl" idprod=$producto->getId()}
            </td>            
        </tr>
        {/foreach}
    </tbody>
</table>
{include file="footer.tpl"}
