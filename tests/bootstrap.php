<?php 

require "vendor/autoload.php";

use Illuminate\Database\Capsule\Manager as Capsule;

$capsule = new Capsule;

$capsule->addConnection([
   "driver" => "sqlite",
   "database" => "tests/database/database.sqlite",
]);

//Make this Capsule instance available globally.
$capsule->setAsGlobal();

// Setup the Eloquent ORM.
$capsule->bootEloquent();
$capsule->bootEloquent();
