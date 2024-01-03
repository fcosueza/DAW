<?php /** NOTA: requiere de la existencia de $secciones y $ver en el contexto global */ ?>
<header>
<nav>
<?php
echo "<UL>";
array_walk($secciones, function ($s) use ($ver) {
    $txt=htmlentities($s['nombre']);
    if ($ver!==$s['link'])
    {
        $link=urlencode($s['link']);    
        echo "<LI><A href='?ver=$link'>$txt</A></LI>";
    }
    else
    {
        echo "<LI><STRONG>$txt</STRONG></LI>";
    }
});
echo "<UL>";
?>
</nav>
</header> 