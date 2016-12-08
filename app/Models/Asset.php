<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Asset extends Model
{
    public $fillable = ['code', 'name', 'location_id', 'asset_type_id', 'site_id'];

    public function detail()
    {
        return $this->hasOne(AssetDetail::class);
    }

    public function mechanical()
    {
        return $this->hasOne(MechanicalDetail::class);
    }

    public function civil()
    {
        return $this->hasOne(CivilDetail::class);
    }

    public function networkPipe()
    {
        return $this->hasOne(NetworkPipeDetail::class);
    }

    public function commercial()
    {
        return $this->hasOne(CommercialDetail::class);
    }

    public function ict()
    {
        return $this->hasOne(IctDetail::class);
    }

    public function bills()
    {
        return $this->hasMany(AssetBill::class);
    }

    public function assetType()
    {
        return $this->belongsTo(AssetType::class);
    }

    public function location()
    {
        return $this->belongsTo(Location::class);
    }

    public function site()
    {
        return $this->belongsTo(Site::class);
    }

    public function images()
    {
        return $this->hasMany(AssetImage::class);
    }

}
