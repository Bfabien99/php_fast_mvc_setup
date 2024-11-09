<?php
namespace App\Models;

use Database\DB;

class Model
{
    protected $dbConnect;

    public function __construct()
    {
        $this->dbConnect = DB::getConnection();
    }
}