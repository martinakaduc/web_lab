<?php
echo("FOR LOOP: <br>");
for ($i=0; $i<100; $i+=1) {
  if ($i % 2 == 1) {
    echo(strval($i)."<br>");
  }
}

echo("WHILE LOOP: <br>");
$i = 0;
while ($i < 100) {
  if ($i % 2 == 1) {
    echo(strval($i)."<br>");
  }
  $i += 1;
}
?>
