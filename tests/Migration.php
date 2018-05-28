<?php 

namespace Tests;

use Illuminate\Database\Capsule\Manager as Capsule;
use Phinx\Migration\AbstractMigration;

class Migration extends AbstractMigration {

    /** @var \Illuminate\Database\Capsule\Manager $capsule */
    public $capsule;

    /** @var \Illuminate\Database\Schema\Builder $capsule */
    public $schema;

    public function init()  {
        $this->capsule = new Capsule;
        $this->capsule->addConnection([
          'driver'    => 'sqlite',
          'database'  => 'tests/database/database.sqlite',
        ]);

        $this->capsule->bootEloquent();
        $this->capsule->setAsGlobal();
        $this->schema = $this->capsule->schema();
    }
}