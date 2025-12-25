<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MatchEvent extends Model
{
    protected $fillable = [
        'match_id',
        'minute',
        'type',
        'team_side',
        'player_name',
        'description',
    ];

    public function match()
    {
        return $this->belongsTo(MatchGame::class);
    }
}
