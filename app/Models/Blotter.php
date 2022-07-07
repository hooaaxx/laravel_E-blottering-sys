<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blotter extends Model
{
    use HasFactory;

    protected $table = 'blotters';

    protected $fillable = [
        'user_id',
        'case_number',
        'pass_to',
        'approval',
        'municipal',
        'barangay',
        'complainant_img',
        'complainant_firstname',
        'complainant_lastname',
        'complainant_number',
        'complainant_address',
        'respondent_img',
        'respondent_firstname',
        'respondent_lastname',
        'respondent_number',
        'respondent_address',
        'when',
        'where',
        'what'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
