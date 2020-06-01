<?php
 define('HOST', '127.0.0.1');
 define('USER', 'root');
 define('PASSWORD', '12345678');
 define('DB', 'projetoLogin');

 $connection = mysqli_connect(HOST, USER, PASSWORD, DB) or die ('Cannot connect to database');
