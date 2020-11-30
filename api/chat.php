<?php
//This is interface used to communicate with chat using customapi commands
//query params: key - $var from config.php
//              pattern - id, that will be used to identify patterns in database

require_once("StreamElements.php");
require_once("config.php");
require_once("db.php");

header("Content-Type: text/plain; charset=utf-8");

if (isset($_GET["key"], $_GET["pattern"]))
{
  $patternId = $_GET["pattern"];
  if ($_GET["key"] == $key)
  {
    //Initialize DB
    $db = new DatabaseConnector($db["host"], $db["username"], $db["password"], $db["database"]);
    //Get pattern
    $pattern = $db->getPattern($patternId);

    //Initialize SE bot
    $bot = new StreamElements($bearer, "Bearer");
    if (empty($pattern))
    {
      //If pattern DOES NOT exist send "Pattern Not Found" message
      $bot->botSay("Pattern \"$patternId\" not found");
    }
    else
    {
      //If pattern DOES exist, send messages
      foreach ($pattern["messages"] as $message)
      {
        if (!empty($message))
        {
          $bot->botSay($message);
          usleep(500000);
        }
      }
    }
  }
}
