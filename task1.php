<?php

echo "<h2>Task 1 - Binary to text</h2>";

$binary = "01110000 01110010 01101001 01101110 01110100 00100000 01101111 01110101
01110100 00100000 01111001 01101111 01110101 01110010 00100000 01101110
01100001 01101101 01100101 00100000 01110111 01101001 01110100 01101000
00100000 01101111 01101110 01100101 00100000 01101111 01100110 00100000
01110000 01101000 01110000 00100000 01101100 01101111 01101111 01110000
01110011";


echo "<h4>Binary text:</h4>";
echo "$binary<br>";


echo "<h4>Text:</h4>";

function binaryToString($binary)
{
  $binaries = explode(' ', $binary);

  $string = null;
  foreach ($binaries as $binary) {
    $string .= pack('H*', dechex(bindec($binary)));
  }

  return $string;
}

echo binaryToString($binary);

echo "<h4>Loop name:</h4>";

$name = "Christian";

echo "Name: $name<br>";

function loopName($name)
{
  $str = "";
  for ($i = 0; $i < strlen($name); $i++) {
    $str .= $name[$i] . " ";
  }
  return $str;
}

echo "Loop: " . loopName($name);

?>
