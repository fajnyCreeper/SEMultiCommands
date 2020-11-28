<?php
class DatabaseConnector
{
  private $database;

  private $table;

  private $connection;

  public function __construct($host, $username, $password, $database)
  {
    $this->database = $database;
    $this->table = "patternList";
    $this->connection = new mysqli($host, $username, $password, $database);
  }

  public function __destruct()
  {
    $this->connection->close();
  }

  //Get one specific pattern from database
  public function getPattern($patternId)
  {
    $sql = "SELECT * FROM `$this->database`.`$this->table` WHERE pattern='$patternId'";
    $result = $this->connection->query($sql);

    if ($result->num_rows == 0)
      return null;

    $result = $result->fetch_assoc();
    $array = array("pattern" => $result["pattern"], "messages" => array($result["message1"], $result["message2"], $result["message3"], $result["message4"], $result["message5"]));
    return $array;
  }
}
