<?php

require 'source/currency.php';

$currency=new Currency();

$currencies=$currency->getCurrencies();

require 'views/currency-converter.php';

?>

