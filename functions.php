<?php
function search_data($db,$str)
{
    $result =  $db->query("SELECT * FROM books WHERE title like('%$str%')");
    return $result;
}
function show_all_data($db)
{
    $result =  $db->query("SELECT * FROM books WHERE 1");
    return $result;
}

function connect_db()
{
    $host = "localhost";
    $username = "root";
    $password = "";
    $dbname = "Bookstore";
    $port = "8000";
    
    try {
        $dsn ="mysql:host=$host;dbname=$dbname";
        $conn = new PDO($dsn, $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $conn;
    } catch (PDOException $e) {
        echo "Connection failed: " . $e->getMessage();
    }
    return $conn;
}