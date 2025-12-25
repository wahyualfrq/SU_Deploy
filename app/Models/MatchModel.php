<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MatchModel extends Model
{
    protected $table = 'matches';

    protected $fillable = [
        'home_club_id',
        'away_club_id',
        'match_date',
        'stadium',
        'status',
    ];

    protected $casts = [
        'match_date' => 'datetime',
    ];

    /* =========================
     * RELATIONS
     * ========================= */

    public function homeClub()
    {
        return $this->belongsTo(Club::class, 'home_club_id');
    }

    public function awayClub()
    {
        return $this->belongsTo(Club::class, 'away_club_id');
    }

    public function tickets()
    {
        return $this->hasMany(Ticket::class, 'match_id');
    }
}
