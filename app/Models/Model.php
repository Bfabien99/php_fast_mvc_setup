<?php
namespace App\Models;

use Database\DB;

/**
 * Summary of Model
 * 
 * interact with Database
 */
class Model
{
    protected $dbConnect;

    /**
     * Summary of __construct
     * 
     * Connect to Database
     */
    public function __construct()
    {
        $this->dbConnect = DB::getConnection();
    }
}