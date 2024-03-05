<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @mixin IdeHelperclients
 */
class Clients extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'mail'];

    public function loginInfos()
{
    return $this->belongsToMany(Login_Info::class,  'client_login_infos', 'client_id', 'login_info_id');
}
}
