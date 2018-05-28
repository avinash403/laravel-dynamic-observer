<?php 

return [
  'paths' => [
    'migrations' => 'migrations'
  ],
  'migration_base_class' => 'Tests\Migration',
  'environments' => [
    'default_migration_table' => 'phinxlog',
    'dev' => [
      'adapter' => 'sqlite',
      'name' => 'tests/database/database.sqlite'
    ]
  ]
];