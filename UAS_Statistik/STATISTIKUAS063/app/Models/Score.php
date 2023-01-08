<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Score extends Model
{
    use HasFactory;
    protected $table ='scores';
    protected $guarded = [];
    protected $primaryKey = 'id';
    protected $fillable = ['NIM','Name','Score'];
}
