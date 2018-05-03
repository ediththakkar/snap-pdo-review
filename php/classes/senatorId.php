<?php
namespace Edu/Cnm/

require_once("autoload.php");
require_once(dirname(_DIR_,2) . "/vendor/autoload.php");

use Ramsey\Uuid\Uuid;


class Id implements \JsonSerializable {
	use ValidateUuid;




/**
* inserts this Id into mySQL
*
* @param \PDO $pdo PDO connection object
* @throws \PDOException when mySQL related errors occur
* @throws \TypeError if $pdo is not a PDO connection object
**/
public function insert(\PDO $pdo) : void {

// create query template
$query = "INSERT INTO id(senatorId, senatorName, senatorNumLives) VALUES(:senatorId, :senatorName, :senatorNumLives)";
$statement = $pdo->prepare($query);

// bind the member variables to the place holders in the template
$parameters = ["senatorId" => $this->senatorId->getBytes(), "senatorName" => $this->senatorName->getBytes(), "senatorNumLives" => $this->senatorNumLives];
$statement->execute($parameters);

}

/**
* deletes this Id from mySQL
*
* @param \PDO $pdo PDO connection object
* @throws \PDOException when mySQL related errors occur
* @throws \TypeError if $pdo is not a PDO connection object
**/
public function delete(\PDO $pdo) : void {

// create query template
$query = "DELETE FROM Id WHERE senatorId = :senatorId";
$statement = $pdo->prepare($query);

// bind the member variables to the place holder in the template
$parameters = ["senatorId" => $this->senatorId->getBytes()];
$statement->execute($parameters);
}

/**
* updates this Id in mySQL
*
* @param \PDO $pdo PDO connection object
* @throws \PDOException when mySQL related errors occur
* @throws \TypeError if $pdo is not a PDO connection object
**/
public function update(\PDO $pdo) : void {

// create query template
$query = "UPDATE Id SET senatorId = :senatorId, senatorName = :senatorName, senatorNumLives = :senatorNumLives WHERE senatorId = :senatorId";
$statement = $pdo->prepare($query);


$parameters = ["senatorId" => $this->senatorId->getBytes(),"senatorName" => $this->senatorName->getBytes(), "senatorNumLives" => $this->senatorNumLives];
$statement->execute($parameters);
}