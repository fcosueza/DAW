<?php if (isset($errors) && is_array($errors) && $errors): ?>
      <H3>Errores de la última operación:</H3>
      <UL>
          <?php array_walk($errors, function ($e) {
              echo '<LI>' . $e . '</LI>';
          }); ?>
      </UL>
  <?php endif; ?>