<?php

namespace App\Models;

use App\Enums\Package\PackageStatusEnum;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property string name
 * @property float price
 * @property int publications
 * @property PackageStatusEnum status
 */

class Package extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'name',
        'price',
        'publications',
        'status'
    ];

    protected $casts = [
        'status' => PackageStatusEnum::class
    ];
}
