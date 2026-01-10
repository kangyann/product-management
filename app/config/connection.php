<?php
/** Get All Requirement for Database from Enviorement */
$db_host = env("DATABASE_HOST");
$db_name = env("DATABASE_NAME");
$db_user = env("DATABASE_USERNAME");
$db_pass = env("DATABASE_PASSWORD");

/** Try Connect Database */
$c = mysqli_connect($db_host, $db_user, $db_pass, $db_name);

/** Validataion */
if (mysqli_error($c)) {
    /** Error */
    die("Database connected failed : " . mysqli_connect_error());
}
/** Return Mysqli */
return $c;
