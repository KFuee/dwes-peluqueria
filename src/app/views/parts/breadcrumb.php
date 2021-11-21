<nav class="mb-4" style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
  <ol class="breadcrumb">
    <?php
    $contador = 1;
    foreach ($breadItems as $href => $texto) {
      if ($contador === count($breadItems))
        echo "<li class='breadcrumb-item active'>$texto</li>";
      else
        echo "<li class='breadcrumb-item'><a href='$href'>$texto</a></li>";

      $contador++;
    }
    ?>
  </ol>
</nav>
