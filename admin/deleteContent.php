<?php

require_once "../lib/db.php";
require_once "../lib/content.php";
require_once "../core/functions.php";


$content=new Content();
$content->deleteContent($_GET['id']);
reDirect("contentList.php");











?>