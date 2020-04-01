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

/**
 * Returns all snows of a given type
 */
function getSnowsOfType($type)
{
    require ".const.php";
    $dbh = getPDO();
    try {
        $query = 'SELECT * FROM snows WHERE snowtype_id = :tid AND state IN (1,2,3) ORDER BY length';
        $statement = $dbh->prepare($query);//prepare query
        $statement->execute(["tid" => $type]);//execute query
        $queryResult = $statement->fetchAll(PDO::FETCH_ASSOC);//prepare result for client
        $dbh = null;
        if ($debug) var_dump($queryResult);
        return $queryResult;
    } catch (PDOException $e) {
        print "Error!: " . $e->getMessage() . "<br/>";
        return null;
    }
}

function getSnowType($id)
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
function getSnow($id)
{
    require ".const.php";
    $dbh = getPDO();
    try {
        $query = 'SELECT * FROM snows INNER JOIN snowtypes ON snowtype_id=snowtypes.id WHERE snows.id=:id';
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

function updateSnow($snowdata)
{
    if (isset($snowdata['available']))
    {
        $snowdata['available'] = 1; // replace the value 'on' from the html form by a 1
    }
    else
    {
        $snowdata['available'] = 0; // put a 0 if the checkbox was not checked
    }
    require ".const.php";
    $dbh = getPDO();
    try {
        $query = 'UPDATE snows SET code = :code, length = :length, state = :state, available = :available WHERE id = :snowid';
        $statement = $dbh->prepare($query);//prepare query
        $statement->execute($snowdata);//execute query
        $_SESSION['flashmessage'] = 'Modifications enregistrées';
        $dbh = null;
        return true;
    } catch (PDOException $e) {
        print "Error!: " . $e->getMessage() . "<br/>";
        $_SESSION['flashmessage'] = "Erreur lors de l'enregistrement";
        return null;
    }
}

/**
 * Take the snow out of the stock
 * @param $snowid
 * @return bool|null
 */
function withdraw($snowid)
{
    require ".const.php";
    $dbh = getPDO();
    try {
        $query = 'UPDATE snows SET available = false WHERE id = :snowid';
        $statement = $dbh->prepare($query);//prepare query
        $statement->execute(['snowid' => $snowid]);//execute query
        $dbh = null;
        return true;
    } catch (PDOException $e) {
        print "Error!: " . $e->getMessage() . "<br/>";
        $_SESSION['flashmessage'] = "Erreur lors de l'enregistrement";
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
