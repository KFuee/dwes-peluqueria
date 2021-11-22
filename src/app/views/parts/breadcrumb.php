<nav class="mb-4" style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
  <ol class="breadcrumb">
    <?php
    $breadItems = explode('/', $_GET['url']);
    $bLenght = count($breadItems);

    if ($bLenght === 0 || $bLenght === 1 && $breadItems[0] === 'home')
      echo "<li class='breadcrumb-item active'>Home</li>";
    else if ($bLenght === 1 && $breadItems[0] !== 'home') {
      echo "<li class='breadcrumb-item'><a href='/home'>Home</a></li>";
      echo "<li class='breadcrumb-item active'>" . ucwords($breadItems[0]) . "</li>";
    } else {
      echo "<li class='breadcrumb-item'><a href='/home'>Home</a></li>";
      for ($i = 0; $i < $bLenght; $i++) {
        $item = array_shift($breadItems);
        if ($i === $bLenght - 1)
          echo "<li class='breadcrumb-item active'>" . ucwords($item) . "</li>";
        else
          echo "<li class='breadcrumb-item'><a href='/$item'>"
            . ucwords($item) . "</a></li>";
      }
    }
    ?>
  </ol>
</nav>
