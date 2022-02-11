<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Campaign extends Model
{

    protected $fillable = ['campaign_name', 'campaign_date','name','surname','email','employee_id','phone','points'];
    use HasFactory;
}
