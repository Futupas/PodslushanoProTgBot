<?php
    function clean_table($table_name) {
        $dbconn = pg_connect(
            "host=ec2-54-246-85-151.eu-west-1.compute.amazonaws.com 
            dbname=d8nilnb6mk38pt 
            user=voqikmunsqssqs 
            password=9fc79459fcaf28e056d6f0438c9fb09540ea492cb43dc007ffa291505b0cae2a 
            port=5432")
                or die('Не удалось соединиться: ' . pg_last_error());
            $query = "DELETE FROM \"$table_name\" WHERE true";
            $result = pg_query($query) or die('Ошибка запроса: ' . pg_last_error());
            pg_free_result($result);
            pg_close($dbconn);
    };


    clean_table('users'); echo("users were cleaned\n");
    clean_table('orders'); echo("orders were cleaned\n");
    clean_table('chat_messages'); echo("chat_messages were cleaned\n");
    clean_table('order_executors'); echo("order_executors were cleaned\n");
?>