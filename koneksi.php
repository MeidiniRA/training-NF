<?php
/* Connect to a MySQL database using driver invocation */
$dsn = 'mysql:dbname=dbcuti;host=localhost';
$user = 'root';
$password = '';

try {
    $dbh = new PDO($dsn, $user, $password);
    $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    //ATTR_ERRMODE = Melihat dan menghandle kesalahan
    //ARRMODE_EXCEPTION =melempar kesalahan tersebut ke PDOException
    //tips buffer query
    $dbh->setAttribute(PDO::MYSQL_ATTR_USE_BUFFERED_QUERY, TRUE);
} catch (PDOException $e) {
    echo 'Gagal Koneksi: ' . $e->getMessage();
}

?>