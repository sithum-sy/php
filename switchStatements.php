<?php
$favcolor = "green";

switch ($favcolor) {
  case "red":
    echo "Your favorite color is red!";
    break;
  case "blue":
    echo "Your favorite color is blue!";
    break;
  case "green":
    echo "Your favorite color is green!"; //if no break; - prints the nest case or the defalt case as well
  default:
    echo "Your favorite color is neither red, blue, nor green!";
}
?>
 