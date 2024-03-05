<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @mixin IdeHelperlogin_info
 */
class Login_info extends Model
{
    use HasFactory;
    
    public function clients()
    {
        return $this->belongsToMany(Client::class);
    }
}
