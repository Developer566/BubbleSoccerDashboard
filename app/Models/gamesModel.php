<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class gamesModel extends Model
{
    use HasFactory;
    protected $table = "games";
    protected $primaryKey = 'id';
    protected $fillable = ['game_title', 'event_description', 'whats_included', 'additional_info'];
}
