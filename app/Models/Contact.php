<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use HasFactory;

    protected $fillable = [
        'contact_list_id',
        'first_name',
        'middle_name',
        'last_name',
        'email',
        'phone_number',
        'dob',
        'address',
        'picture',
    ];

    public function contact_list() {
        return $this->belongsTo(ContactList::class);
    }
}
