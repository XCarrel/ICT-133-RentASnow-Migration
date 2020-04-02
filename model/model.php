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

function select($query, $params, $multirecord)
{
    require ".const.php";
    $dbh = getPDO();
    try
    {
        $statement = $dbh->prepare($query);//prepare query
        $statement->execute($params);//execute query
        if ($multirecord)
        {
            $queryResult = $statement->fetchAll(PDO::FETCH_ASSOC);
        } else
        {
            $queryResult = $statement->fetch(PDO::FETCH_ASSOC);
        }
        $dbh = null;
        if ($debug) var_dump($queryResult);
        return $queryResult;
    } catch (PDOException $e)
    {
        print "Error!: " . $e->getMessage() . "<br/>";
        return null;
    }
}

function selectOne($query, $params)
{
    return select($query, $params, false);
}

function selectMany($query, $params)
{
    return select($query, $params, true);
}

function insert($query, $params)
{
    require ".const.php";
    $dbh = getPDO();
    try
    {
        $statement = $dbh->prepare($query);//prepare query
        $statement->execute($params);//execute query
        return $dbh->lastInsertId();
        // TODO bugfix: this creates two records!!!!
    } catch (PDOException $e)
    {
        print "Error!: " . $e->getMessage() . "<br/>";
        $_SESSION['flashmessage'] = "Erreur lors de l'enregistrement";
        return null;
    }
}

function execute($query, $params)
{
    require ".const.php";
    $dbh = getPDO();
    try
    {
        $statement = $dbh->prepare($query);//prepare query
        $statement->execute($params);//execute query
        $dbh = null;
        return true;
    } catch (PDOException $e)
    {
        print "Error!: " . $e->getMessage() . "<br/>";
        $_SESSION['flashmessage'] = "Erreur lors de l'enregistrement";
        return null;
    }
}

function getNews()
{
    return selectMany('SELECT * FROM news ORDER BY date desc', []);
}

function getSnows()
{
    return selectMany('SELECT * FROM snowtypes ORDER BY brand,model desc', []);
}

/**
 * Returns all snows of a given type
 */
function getSnowsOfType($type)
{
    return selectMany('SELECT * FROM snows WHERE snowtype_id = :tid AND state IN (1,2,3) ORDER BY length', ["tid" => $type]);//execute query
}

function getSnowType($id)
{
    return selectOne('SELECT * FROM snowtypes WHERE id=:id', ['id' => $id]);
}

function getSnow($id)
{
    return selectOne('SELECT *, snows.id as snowid FROM snows INNER JOIN snowtypes ON snowtype_id=snowtypes.id WHERE snows.id=:id', ['id' => $id]);
}

/**
 * Return all the rents in which the snow is
 * @param $id
 * @return mixed|null
 */
function getRentsOfSnow($id)
{
    return selectMany('
            SELECT firstname, lastname, start_on, nbDays, rents.status
            FROM snows 
                INNER JOIN rentsdetails ON snow_id=snows.id 
                INNER JOIN rents ON rent_id = rents.id 
                INNER JOIN users ON user_id=users.id
            WHERE snows.id=:id;',
        ['id' => $id]);
}

function updateSnow($snowdata)
{
    if (isset($snowdata['available']))
    {
        $snowdata['available'] = 1; // replace the value 'on' from the html form by a 1
    } else
    {
        $snowdata['available'] = 0; // put a 0 if the checkbox was not checked
    }
    execute('UPDATE snows SET code = :code, length = :length, state = :state, available = :available WHERE id = :snowid', $snowdata);//execute query
    $_SESSION['flashmessage'] = 'Modifications enregistrées';
}

/**
 * Take the snow out of the stock
 * @param $snowid
 * @return bool|null
 */
function withdraw($snowid)
{
    execute('UPDATE snows SET available = 0 WHERE id = :snowid',['snowid' => $snowid]);//execute query
}

/**
 * Put the snow back into the stock
 * @param $snowid
 * @return bool|null
 */
function returnSnow($snowid)
{
    execute('UPDATE snows SET available = 1 WHERE id = :snowid',['snowid' => $snowid]);//execute query
}

/**
 * @return mixed
 */
function createRent($userid)
{
    return insert("INSERT INTO rents (status, start_on, user_id) VALUES (:status, :date, :userid);",["status" => 'open', "date" => '2020-02-02', "userid" => $userid]);//execute query
}

function addSnowToRent($snow, $rent)
{
    return insert("INSERT INTO rentsdetails (snow_id, rent_id, nbDays, status) VALUES (:snow_id, :rent_id, :nbDays, :status);",['snow_id' => $snow['snowid'], 'rent_id' => $rent, 'nbDays' => 30, 'status' => 'open']);//execute query
}

function getUserByEmail($email)
{
    return selectOne('SELECT * FROM users WHERE email=:email',['email' => $email]);//execute query
}

?>
