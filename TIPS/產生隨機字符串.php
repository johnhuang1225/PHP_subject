<?php

$seed = join('', array_merge(range('a', 'z'), range('A', 'Z')));
$string = substr(str_shuffle($seed), 0, 10);
echo $string;

