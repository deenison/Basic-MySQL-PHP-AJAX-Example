<?php
if (!function_exists('getPDOConnection')) {
    /**
     * Creates a new PDO connection based on the parameters.
     *
     * @link    http://php.net/manual/en/class.pdo.php
     *
     * @param   string  $user      // The db username
     * @param   string  $pwd       // The db user's password
     * @param   string  $host      // The host where the database is located in
     * @param   string  $dbCharset // The db' charset
     *
     * @return  PDO
     **/
    function getPDOConnection($user, $pwd, $dbName, $host = "localhost", $dbCharset = "UTF8")
    {
        $dsn = "mysql:host={$host};dbname={$dbName};charset={$dbCharset}";

        $instanceOptions = array(
            PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            PDO::ATTR_EMULATE_PREPARES   => false,
        );

        $pdo = new PDO($dsn, $user, $pwd, $instanceOptions);

        return $pdo;
    }
}

if (!function_exists('getDatabase')) {
    /**
     * Creates and return a PDO connection based on the project default parameters.
     *
     * @return void
     **/
    function getDatabase()
    {
        if (empty(DB_NAME)) {
            throw new Exception("Database name is missing.");
        }

        return getPDOConnection(DB_USER, DB_PASSWORD, DB_NAME, DB_HOST, "UTF8");
    }
}
