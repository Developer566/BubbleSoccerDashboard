<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class quoteModel extends Model
{
    use HasFactory;
    protected $table = 'quote_data';
    protected $primaryKey = 'id';

    protected $fillable = [
        'mail_subject',
        'name',
        'players',
        'date',
        'day_of_week',
        'time',
        'age',
        'date',
        'duration',
        'activities',
        'telephone',
        'location',
        'ref_number'
    ];
}
