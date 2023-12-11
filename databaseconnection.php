
<?php


class DatabaseConnection
{
    public function __construct($host,$user,$pass)
    {
        $conn = mysqli_connect($host,$user,$pass);

        if (!$conn)
        {
            die ("<h1>Database Connection Failed</h1>". mysqli_connect_error());
        }
         echo "Database Connected Successfully";
        return $this->conn = $conn;
        
    }
}

$db = new DatabaseConnection('localhost','root','');
?>