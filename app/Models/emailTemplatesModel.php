<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class emailTemplatesModel extends Model
{
    use HasFactory;
    protected $table = 'email_templates';
    protected $fillable = [
        'purpose',
        'mail_subject',
        'body',
        'is_active',
        'variables'
    ];
}
