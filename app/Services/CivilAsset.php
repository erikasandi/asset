<?php

namespace App\Service;


class CivilAsset extends AssetHandler
{

    public $formTemplate = 'assets.asset-type-forms.civil';
    public $editFormTemplate = 'assets.asset-type-forms.civil-edit';
    public $detailTemplate = 'assets.asset-type-details.civil';
    public $detailRelation = 'civil';

    /**
     * CivilAsset constructor.
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
                'specification', 'contractor', 'construction_date', 'function', 'asset_performance_id', 'asset_condition_id', 'performance_detail', 'condition_detail', 'reservoir_capacity'
            ]
        );

        $params = [];
        if ($assetParams['specification'] != '') {
            $params['specification'] = $assetParams['specification'];
        }
        if ($assetParams['contractor'] != '') {
            $params['contractor'] = $assetParams['contractor'];
        }
        if ($assetParams['construction_date'] != '') {
            $params['construction_date'] = $assetParams['construction_date'];
        }
        if ($assetParams['function'] != '') {
            $params['function'] = $assetParams['function'];
        }
        if ($assetParams['asset_performance_id'] != '') {
            $params['asset_performance_id'] = $assetParams['asset_performance_id'];
        }
        if ($assetParams['asset_condition_id'] != '') {
            $params['asset_condition_id'] = $assetParams['asset_condition_id'];
        }
        if ($assetParams['performance_detail'] != '') {
            $params['performance_detail'] = $assetParams['performance_detail'];
        }
        if ($assetParams['condition_detail'] != '') {
            $params['condition_detail'] = $assetParams['condition_detail'];
        }
        if ($assetParams['reservoir_capacity'] != '') {
            $params['reservoir_capacity'] = $assetParams['reservoir_capacity'];
        }

        return $asset->civil()->create($params);
    }

    function update($id, array $inputs)
    {
        $asset = $this->updateAsset($id, $inputs);
        $assetDetail = $asset->civil;

        $assetDetail->specification = $inputs['specification'];
        $assetDetail->contractor = $inputs['contractor'];
        $assetDetail->construction_date = $inputs['construction_date'];
        $assetDetail->function = $inputs['function'];
        $assetDetail->asset_performance_id = $inputs['asset_performance_id'];
        $assetDetail->asset_condition_id = $inputs['asset_condition_id'];
        $assetDetail->performance_detail = $inputs['performance_detail'];
        $assetDetail->condition_detail = $inputs['condition_detail'];
        $assetDetail->reservoir_capacity = $inputs['reservoir_capacity'];

        return $assetDetail->save();
    }
}