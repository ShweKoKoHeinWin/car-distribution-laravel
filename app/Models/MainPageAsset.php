<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MainPageAsset extends Model
{
    use HasFactory;

    protected $fillable = ['banner_video', 'banner_text', 'about_img', 'about_text', 'about_imgs', 'location', 'email', 'phone'];
}
