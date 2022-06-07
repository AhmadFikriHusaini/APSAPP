<?php
$rand1 = rand(1, 9);
$rand2 = rand(1, 9);
$operator = array('*', '+');
$randoperator = $operator[rand(0, 1)];
switch ($randoperator) {
    case "+":
        $finalvalue = $rand1 + $rand2;
        break;
    case "*":
        $finalvalue = $rand1 * $rand2;
        break;
};
