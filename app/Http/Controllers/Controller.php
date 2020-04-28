<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function enumerer($table,$champ)
    {
        $sql = DB::select("SHOW COLUMNS FROM ".$table. " LIKE '".$champ."'");
        //$row = mysql_fetch_row($sql);
        $row=$sql[0]->Type;
        $chaine = substr($row, 5, -1);
        return $chaine = explode(",", $chaine);
    }
    
}
