<?php if (isset($resultados) && is_array($resultados) && $resultados): ?>
      <H3>Resultados de la última operación:</H3>
      <UL>
          <?php array_walk($resultados, function ($r) {
              echo '<LI>' . $r . '</LI>';
          }); ?>
      </UL>
  <?php endif; ?>