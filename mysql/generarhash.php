<?php
echo "esas";
echo "\n";
$p = password_hash("esas", PASSWORD_DEFAULT);
echo $p;
echo "\n";
if(password_verify("esas", $p))
echo "ok";
else
echo "No funciona";