{include file="header.tpl" title="Talleres Asociación Respira"}
{include file="components/searchForm.tpl" errorMsg=$errorMsg|default: null}
{include file="components/resultTable.tpl" talleres=$talleres}
{include file="components/addTallerButton.tpl"}
{include file="footer.tpl"}
