{include file="header.tpl" title="Página Principal"}
{include file="components/searchForm.tpl"}
{include file="components/errorMsg.tpl" errorMsg=$error|default:""}
{include file="components/resultTable.tpl" talleres=$talleres}
{include file="footer.tpl"}
