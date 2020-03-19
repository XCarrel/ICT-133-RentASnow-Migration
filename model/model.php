<?php
/**
 * Created By PhpStorm
 * Date: 24.01.2020
 * Time: 16:55
 */

function getPDO()
{
    require ".const.php";
    $dbh = new PDO('mysql:host=' . $dbhost . ';dbname=' . $dbname, $user, $pass);
    return $dbh;
}

function getNews()
{
    require ".const.php";
    $dbh = getPDO();
    try {
        $query = 'SELECT * FROM news ORDER BY date desc';
        $statement = $dbh->prepare($query);//prepare query
        $statement->execute();//execute query
        $queryResult = $statement->fetchAll(PDO::FETCH_ASSOC);//prepare result for client
        $dbh = null;
        if ($debug) var_dump($queryResult);
        return $queryResult;
    } catch (PDOException $e) {
        print "Error!: " . $e->getMessage() . "<br/>";
        return null;
    }
}

function getSnows()
{
    require ".const.php";
    $dbh = getPDO();
    try {
        $query = 'SELECT * FROM snowtypes ORDER BY brand,model desc';
        $statement = $dbh->prepare($query);//prepare query
        $statement->execute();//execute query
        $queryResult = $statement->fetchAll(PDO::FETCH_ASSOC);//prepare result for client
        $dbh = null;
        if ($debug) var_dump($queryResult);
        return $queryResult;
    } catch (PDOException $e) {
        print "Error!: " . $e->getMessage() . "<br/>";
        return null;
    }
}

function getSnow($id)
{
    require ".const.php";
    $dbh = getPDO();
    try {
        $query = 'SELECT * FROM snowtypes WHERE id=:id';
        $statement = $dbh->prepare($query);//prepare query
        $statement->execute(['id' => $id]);//execute query
        $queryResult = $statement->fetch(PDO::FETCH_ASSOC);//prepare result for client
        $dbh = null;
        if ($debug) var_dump($queryResult);
        return $queryResult;
    } catch (PDOException $e) {
        print "Error!: " . $e->getMessage() . "<br/>";
        return null;
    }
}
function getUsers()
{
    return json_decode(file_get_contents("model/dataStorage/users.json"),true);
}
function putUsers($tab)
{
    file_put_contents('model/dataStorage/users.json', json_encode($tab));
}

function getUserByEmail($email)
{
    require ".const.php";
    $dbh = getPDO();
    try {
        $query = 'SELECT * FROM users WHERE email=:email';
        $statement = $dbh->prepare($query);//prepare query
        $statement->execute(['email' => $email]);//execute query
        $queryResult = $statement->fetch(PDO::FETCH_ASSOC);//prepare result for client
        $dbh = null;
        return $queryResult;
    } catch (PDOException $e) {
        print "Error!: " . $e->getMessage() . "<br/>";
        return null;
    }
}
?>
