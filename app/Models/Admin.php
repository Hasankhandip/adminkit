<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Admin extends Authenticatable {
    use HasFactory;
    protected $guarded = ['id'];

    // public function bannerContent(){
    //     return $this->belongsTo(FrontendBanner::class);
    // }
}
