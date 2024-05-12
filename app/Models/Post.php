<?php

namespace App\Models;

use App\Enums\Package\PackageStatusEnum;
use App\Enums\Post\PostStatusEnum;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property string title
 * @property string description
 * @property PackageStatusEnum status
 * @property int user_id
 */

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'status',
        'user_id'
    ];

    protected $casts = [
        'status' => PostStatusEnum::class
    ];
}
