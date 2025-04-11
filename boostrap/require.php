<?php

require_once ROOT_PATH . "/config/dbFunction.php";
require_once ROOT_PATH . "/config/sessionFunction.php";
startSession();

require_once ROOT_PATH . "/config/authFunction.php";
require_once ROOT_PATH . "/config/globalFunctions.php";
require_once ROOT_PATH . "/config/validationFunction.php";
require_once ROOT_PATH . "/config/paginationFunction.php";
require_once ROOT_PATH . "/routes/router.php";
