<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContactUs extends Model
{
    use HasFactory;
    protected $fillable=[
        'school_contact_no',
        'email',
        'principle_contact_no',
        'school_co_contact_no'
    ];
}
