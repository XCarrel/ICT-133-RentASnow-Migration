<?php

function getPDO()
{
    require "../../.const.php";
    $dbh = new PDO('mysql:host=' . $dbhost . ';dbname=' . $dbname, $user, $pass);
    return $dbh;
}

function getUsers()
{
    $dbh = getPDO();
    try {
        $query = 'SELECT * FROM users';
        $statement = $dbh->prepare($query);//prepare query
        $statement->execute();//execute query
        $queryResult = $statement->fetchAll(PDO::FETCH_ASSOC);//prepare result for client
        $dbh = null;
        return $queryResult;
    } catch (PDOException $e) {
        print "Error!: " . $e->getMessage() . "<br/>";
        return null;
    }
}

$users = getUsers();

foreach ($users as $user)
{
    $hash = password_hash($user['firstname'],PASSWORD_DEFAULT);
    echo $user['firstname']." => $hash \n";
    $dbh = getPDO();
    try {
        $query = 'UPDATE users SET password=:password WHERE id=:id';
        $statement = $dbh->prepare($query);//prepare query
        $statement->execute(['id' => $user['id'], 'password' => $hash]);//execute query
        $dbh = null;
    } catch (PDOException $e) {
        print "Error!: " . $e->getMessage() . "<br/>";
        return null;
    }
}
