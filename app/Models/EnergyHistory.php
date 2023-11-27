<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EnergyHistory extends Model
{
    use HasFactory;

    protected $table = 'energy_histories';
    //protected $fillable = ['classification_type'];
    // guardedで指定した列は、Eloquentから更新できない。
    protected $guarded = ['id', 'created_at', 'updated_at'];
}
