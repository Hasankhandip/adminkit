<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GeneralSetting extends Model {
    use HasFactory;
    protected $fillable = [
        'site_name',
        'timezone',
        'currency_code',
        'currency_symbol',
    ];
}
