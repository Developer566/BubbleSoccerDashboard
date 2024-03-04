<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class contactformModel extends Model
{
    use HasFactory;
    protected $table = 'contact_form_data';
    protected $primaryKey = 'id';
    protected $fillable = ['full_name', 'email', 'contact_number', 'message'];
}
