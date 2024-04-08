<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;



class DataClient extends Model
{
    use HasFactory;

    protected $fillable = [
        'type',
        'value',
    ];

    public function category()
    {
        return $this->belongsTo(DataCategory::class, 'data_category_id');
    }
}
