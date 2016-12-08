<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AssetCondition extends Model
{
    use HasManyAsset;

    public $timestamps = false;
    public $fillable = ['name', 'description'];

    public function assetDetails()
    {
        return $this->hasMany(AssetDetail::class);
    }

    public function ictAssets()
    {
        return $this->hasMany(IctDetail::class);
    }
}
