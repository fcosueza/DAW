{include file="header.tpl" title="Página Principal"}
{include file="components/searchForm.tpl" errorMsg=$errorMsg|default: null}
{include file="components/resultTable.tpl" talleres=$talleres}
{include file="footer.tpl"}
