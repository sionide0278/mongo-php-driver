--TEST--
Decimal128: [basx373] Engineering notation tests
--DESCRIPTION--
Generated by scripts/convert-bson-corpus-tests.php

DO NOT EDIT THIS FILE
--FILE--
<?php

require_once __DIR__ . '/../utils/tools.php';

$bson = hex2bin('1800000013640007000000000000000000000000004C3000');

// BSON to Canonical BSON
echo bin2hex(fromPHP(toPHP($bson))), "\n";

// BSON to Canonical extJSON
echo json_canonicalize(toJSON($bson)), "\n";

$json = '{"d" : {"$numberDecimal" : "7E6"}}';

// extJSON to Canonical extJSON
echo json_canonicalize(toJSON(fromJSON($json))), "\n";

$canonicalJson = '{"d" : {"$numberDecimal" : "7E+6"}}';

// Canonical extJSON to Canonical extJSON
echo json_canonicalize(toJSON(fromJSON($canonicalJson))), "\n";

// extJSON to Canonical BSON
echo bin2hex(fromJSON($json)), "\n";

// Canonical extJSON to Canonical BSON
echo bin2hex(fromJSON($canonicalJson)), "\n";

?>
===DONE===
<?php exit(0); ?>
--EXPECT--
1800000013640007000000000000000000000000004c3000
{"d":{"$numberDecimal":"7E+6"}}
{"d":{"$numberDecimal":"7E+6"}}
{"d":{"$numberDecimal":"7E+6"}}
1800000013640007000000000000000000000000004c3000
1800000013640007000000000000000000000000004c3000
===DONE===