<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fixture extends Model
{
    use HasFactory;
    protected $fillable = ['home_team_id', 'away_team_id','home_team_name', 'away_team_name', 'field_id', 'time_slot', 'round', 'match_date'];
}
