<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Weather extends Model
{
    use HasFactory;

    // Eğer tablo adınız 'weather' ise bunu belirtin
    protected $table = 'weather';  // Tablo adı 'weathers' yerine 'weather' ise

    protected $fillable = ['city', 'temperature', 'description', 'humidity'];
}
