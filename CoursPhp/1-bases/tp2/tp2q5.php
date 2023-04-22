<?php
for ($i = 1; $i <= 63; $i++) {
    $t1[] = $i;
}
$t2[] = 0;
foreach ($t1 as $val) {
    $t2[] = $val / 10;
}

foreach ($t2 as $reel) {
    $t3[(string) $reel] = sin($reel);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>

<body>
  <?php
    echo '<table style="border-collapse:collapse"><tr><th style="border:1px solid black">x</th><th style="border:1px solid black">sin(x)</th></tr>';
      foreach ($t3 as $x => $sinx) {
        echo '<tr><td style="border:1px solid black">' . $x . '</td><td style="border:1px solid black">' . $sinx . '</td></tr>';
      }
    echo '</table>';
  ?>

</body>

</html>