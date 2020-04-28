<?php 

namespace App\Scopes;


use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Carbon;

/**
 * summary
 */
trait DateScopable
{
    /**
     * summary
     */
    public function scopeOneDayOld(Builder $query)
    {
        $query->where('created_at','<=',Carbon::parse('1 day ago'));
    }
}


?>