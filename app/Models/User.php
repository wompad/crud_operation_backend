<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    protected $table = 'tbl_users';
    
    protected $fillable = [
        'firstname',
        'middlename',
        'lastname',
        'birthdate',
        'present_address',
        'contact_number',
        'email_address'
    ];
}
