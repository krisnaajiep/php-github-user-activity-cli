<?php

require_once 'functions.php';

if (isset($argv[1])) {
  $events = getGithubEvents($argv[1]);
  var_dump($events);
}
