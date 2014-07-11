<?php
// create db
$create_db_string = "mysql -uroot -proot < ". __DIR__. "/../configs/main.sql";
exec($create_db_string);

echo "finishing".PHP_EOL;
