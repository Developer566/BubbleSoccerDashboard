<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class sentQuotesModel extends Model
{
    use HasFactory;
    protected $table = 'sent_quotes';
    protected $primaryKey = 'id';
    protected $fillable = [
        'mail_subject',
        'email',
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
        'ref_number',
        'quote_id',
        'total_cost',
        'per_person_cost',
        'deposit_fee',
        'message',
        'duedate',
        'event_type',
        'game_selection',
        'remaining_option',
        'is_sent'
    ];
}
