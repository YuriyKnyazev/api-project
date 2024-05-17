<?php

namespace App\Models;

use App\Enums\Package\PackageStatusEnum;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property int publications
 */

class PackageUser extends Model
{
    use HasFactory;

    protected $table = 'package_user';
}
