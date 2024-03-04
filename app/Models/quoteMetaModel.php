<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class quoteMetaModel extends Model
{
    use HasFactory;
    protected $table = 'quote_meta_data';
    protected $primaryKey = 'id';
    protected $fillable = ['quote_id', 'key', 'value'];

}
