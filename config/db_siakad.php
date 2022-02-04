<?php

return [
  /*
    'class' => 'yii\db\Connection',
    'dsn' =>  'pgsql:host=180.250.165.150;port=5432;dbname=iainmigrasi',
    'username' => 'iain',
    'password' => 'ampelakademik!3',
    'charset' => 'utf8',
    */
      'class' => 'yii\db\Connection',
    'dsn' =>  'pgsql:host=103.211.49.150;port=5432;dbname=siakad1',
    'username' => 'siakad',
    'password' => 'U1n54_si@k4d',
    'charset' => 'utf8',
    'enableSchemaCache' => true,

    // Duration of schema cache.
    'schemaCacheDuration' => 3600,

    // Name of the cache component used to store schema information
    'schemaCache' => 'cache',
];
