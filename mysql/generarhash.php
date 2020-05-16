<?php
echo "esas";
echo "\n";
$p = password_hash("esas", PASSWORD_DEFAULT);
echo $p;
echo "\n";
if(password_verify("esas", '$2y$10$vbWN8Aa1OYbAXqCFfOxBdOW4W4P1aktiKGdZmiuKOQlzOUQIABr7e'))
echo "ok";
else
echo "No funciona";