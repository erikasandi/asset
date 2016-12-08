<?php

namespace App\Service;


class ICTAsset extends AssetHandler
{
    public $formTemplate = 'assets.asset-type-forms.ict';
    public $editFormTemplate = 'assets.asset-type-forms.ict-edit';
    public $detailTemplate = 'assets.asset-type-details.ict';
    public $detailRelation = 'ict';

    /**
     * ICTAsset constructor.
     */
    public function __construct()
    {
        parent::__construct();
    }

    function store(array $inputs)
    {
        $asset = $this->storeAsset($inputs);
        $assetParams = array_only(
            $inputs,
            [
                'brand', 'specification', 'location', 'status', 'asset_condition_id', 'condition_detail', 'install_date'
            ]
        );

        $params = [];

        if ($assetParams['brand'] != '') {
            $params['brand'] = $assetParams['brand'];
        }

        if ($assetParams['specification'] != '') {
            $params['specification'] = $assetParams['specification'];
        }

        if ($assetParams['location'] != '') {
            $params['location'] = $assetParams['location'];
        }

        if ($assetParams['status'] != '') {
            $params['status'] = $assetParams['status'];
        }

        if ($assetParams['asset_condition_id'] != '') {
            $params['asset_condition_id'] = $assetParams['asset_condition_id'];
        }

        if ($assetParams['condition_detail'] != '') {
            $params['condition_detail'] = $assetParams['condition_detail'];
        }

        if ($assetParams['install_date'] != '') {
            $params['install_date'] = $assetParams['install_date'];
        }

        return $asset->ict()->create($params);
    }

    function update($id, array $inputs)
    {
        $asset = $this->updateAsset($id, $inputs);

        $assetDetail = $asset->ict;
        $assetDetail->brand = $inputs['brand'];
        $assetDetail->specification = $inputs['specification'];
        $assetDetail->location = $inputs['location'];
        $assetDetail->status = $inputs['status'];
        $assetDetail->asset_condition_id = $inputs['asset_condition_id'];
        $assetDetail->condition_detail = $inputs['condition_detail'];
        $assetDetail->install_date = $inputs['install_date'];

        return $assetDetail->save();
    }
}