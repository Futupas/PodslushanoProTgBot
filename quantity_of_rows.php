<?php
// Соединение, выбор базы данных

$quantity = 0;


$dbconn = pg_connect(
  "host=ec2-54-246-85-151.eu-west-1.compute.amazonaws.com 
  dbname=d8nilnb6mk38pt 
  user=voqikmunsqssqs 
  password=9fc79459fcaf28e056d6f0438c9fb09540ea492cb43dc007ffa291505b0cae2a 
  port=5432")
        or die('Не удалось соединиться: ' . pg_last_error());
    
    // Выполнение SQL-запроса
    $query = "SELECT 
    nspname AS schemaname,relname,reltuples
  FROM pg_class C
  LEFT JOIN pg_namespace N ON (N.oid = C.relnamespace)
  WHERE 
    nspname NOT IN ('pg_catalog', 'information_schema') AND
    relkind='r' 
  ORDER BY reltuples DESC;
  ";
    $result = pg_query($query) or die('Ошибка запроса: ' . pg_last_error());
    
    while ($line = pg_fetch_array($result, null, PGSQL_ASSOC)) {
        $quantity += 1* $line['reltuples'];
    }
    
    
    // Очистка результата
    pg_free_result($result);
    
    // Закрытие соединения
    pg_close($dbconn);


    echo $quantity;
    echo ' / 10000 ('.round($quantity/10000*100, 1).'%)';
?>