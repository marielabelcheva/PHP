<?php 
$microtimeValue = microtime(true);
print($microtimeValue);
print("\n");
$roundedValue = round($microtimeValue);
print($roundedValue);
print("\n");
if ($roundedValue % 2 == 0)
  print("Bye");
else
  print("Mariela");
?>