<?php

/**
    * Example to set-up and call databasefiller.class.php
    * Martin Latter, 14/12/2014
*/

declare(strict_types=1);

date_default_timezone_set('Europe/London');
ini_set('memory_limit', '256M'); # for inserting a large number of rows ($aConfiguration['num_rows'])

require('classes/databasefiller.class.php');
header('Content-Type: text/html; charset=utf-8');


/**
    * Configuration array settings to pass to databasefiller.class.php
*/

$aConfiguration =
[
    # output type toggle
    'debug' => false, # set TRUE for verbose screen output and no database insertion, FALSE for database insertion

    # number of rows to insert
    'num_rows' => 10,
        // optimise mysqld variables in my.cnf/my.ini files when inserting a large number of rows (e.g. 50000)

    # database details, keep the order
    # port = int|null
    # socket = string|null
    'db_details' => [
        'host' => 'localhost',
        'username' => 'USERNAME',
        'password' => 'PASSWORD',
        'database' => 'dbfilltest',
        'port' => NULL,
        'socket' => NULL
    ],

    # schema file
    'schema_file' => 'test.sql',

    # database connection encoding
    'encoding' => 'utf8', # latin1 / utf8 etc

    # random data toggle - set to false for a much faster fixed character fill - but ... no unique indexes permitted
    'random_data' => true,

    # random character range: ASCII integer values
    'low_char' => 33,
    'high_char' => 126,

    // 'incremental_ints' => true,
    // 'populate_primary_key' => true, # experimental

    # CLI usage: rows of SQL generated before displaying progress percentage
    'row_counter_threshold' => 1000
];


$oDF = new DatabaseFiller($aConfiguration);

echo $oDF->displayMessages();
