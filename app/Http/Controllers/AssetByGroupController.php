<?php

namespace App\Http\Controllers;

use App\Http\Requests\AssetStore;
use App\Service\Asset;
use App\Service\DataMessage;
use App\Service\ImageService;
use App\Service\Location;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Log;

class AssetByGroupController extends Controller
{
    use DataMessage;


    //
    /**
     * @var Asset
     */
    private $assetService;
    /**
     * @var ImageService
     */
    private $imageService;
    /**
     * @var Location
     */
    private $locationService;

    /**
     * AssetByGroupController constructor.
     * @param Asset $assetService
     * @param Location $locationService
     * @param ImageService $imageService
     */
    public function __construct(Asset $assetService, Location $locationService, ImageService $imageService)
    {
        $this->assetService = $assetService;
        $this->imageService = $imageService;
        $this->locationService = $locationService;
    }

    public function index(Request $request, $group = '')
    {
        $location = $this->locationService->getLocationByName($group);
        $sName = '';
        $sType = '';
        $sLocation = '';
        if ($request->has('submit')) {
            $sName = $request->input('name');
            $sType = $request->input('asset_type_id');
            $sLocation = $request->input('location_id');
        }
        $data['sName'] = $sName;
        $data['sType'] = $sType;
        $data['sLocation'] = $sLocation;
        // set action column width
        $data['actionWidth'] = ( $group == 'commercial' ? '302px' : '280px' );
        $data['location'] = $location;
        $locationSelect = $this->assetService->location()->locationNestedByParentSelect('location_id', $location->id, null, false);
        $data['locationSelect'] = $locationSelect;
        $data['assetType'] = $this->locationService->assetTypeByLocationSelect('asset_type_id', $location->id, null, false);
        $data['group'] = $group;

        return view('grouped-assets.list', $data);
    }

    public function anyData(Request $request)
    {
        return $this->assetService->groupedDatatableData($request->all());
    }

    public function create($group = '')
    {
        $location = $this->locationService->getLocationByName($group);
        $data['assetType'] = $this->locationService->assetTypeByLocationSelect('asset_type_id', $location->id, null, false);
        $data['locationSelect'] = $this->assetService->location()->locationNestedByParentSelect('location_id', $location->id, null, false);
        $data['location'] = $location;
        $data['group'] = $group;
        $data['codeLabel'] = ( $group == 'commercial' ? 'Account ID' : 'Code' );
        $data['locationLabel'] = ( $group == 'ict' ? 'Class' : 'Location / Class' );
        $data['assetFormUrl'] = url('/asset/asset-type-form/');

        return view('grouped-assets.add', $data);
    }

    public function store(AssetStore $request, $group = '')
    {
        $location = $this->locationService->getLocationByName($group);
        $inputs = $request->except(['_token']);
        $this->assetService->store($inputs);

        return redirect('/asset-by-group/' . $group)->with($this->getMessage('store'));
    }

    public function edit(Request $request, $group = '', $id)
    {
        $location = $this->locationService->getLocationByName($group);
        $asset = $this->assetService->getAssetById($id);
        $images = $asset->images;
        $options = ['disabled' => 'disabled', 'class' => 'form-control', 'id' => 'asset-type'];
        $data['locationSelect'] = $this->assetService->location()->locationNestedByParentSelect('location_id', $location->id, $asset->location_id, false);
        $data['asset'] = $asset;
        $data['assetImages'] = $images;
        $data['assetType'] = $this->locationService->assetTypeByLocationSelect('asset_type_id', $location->id, $asset->asset_type_id, false, $options);
        $data['assetFormUrl'] = url('/asset/asset-type-edit-form/' . $asset->id);
        $data['group'] = $group;
        $data['location'] = $location;

        return view('grouped-assets.edit', $data);
    }

    public function update(Request $request, $group = '', $id)
    {
        $location = $this->locationService->getLocationByName($group);
        $inputs = $request->except(['_token']);
        $this->assetService->update($id, $inputs);

        return redirect('asset-by-group/' . $group)->with($this->getMessage('update'));
    }

    public function detail($group = '', $assetId)
    {
        $location = $this->locationService->getLocationByName($group);
        $asset = $this->assetService->getAssetById($assetId);
        $data['assetId'] = $assetId;
        $data['asset'] = $asset;
        $data['location'] = $location;
        $data['group'] = $group;
        $data['detailTemplate'] = $this->assetService->getDetailTemplate($asset->asset_type_id);
        $data['assetDetail'] = $this->assetService->getDetailData($assetId);

        return view('grouped-assets.detail', $data);
    }

    public function destroy($group = '', $id)
    {
        $this->assetService->destroy($id);

        return redirect('/asset-by-group/' . $group)->with($this->getMessage('delete'));
    }

    public function assetTypeForm($assetType)
    {
        $data['assetType'] = $assetType;
        $data['assetFormUrl'] = url('/asset/asset-type-form/');
        $data['performance'] = $this->assetService->assetPerformance()->assetPerformanceSelect('asset_performance_id');
        $data['condition'] = $this->assetService->assetCondition()->assetConditionSelect('asset_condition_id');
        $formTemplate = $this->assetService->getFormTemplate($assetType);

        echo \View::make($formTemplate, $data)->render();
    }

    public function assetTypeEditForm($assetId, $assetType)
    {
        $asset = $this->assetService->getAssetById($assetId);
        $detail = $this->assetService->getDetailData($assetId);

        $data['assetDetail'] = $detail;
        $data['assetType'] = $assetType;
        $data['assetFormUrl'] = url('/asset/asset-type-edit-form/');
        $data['performance'] = $this->assetService->assetPerformance()->assetPerformanceSelect('asset_performance_id', $detail->asset_performance_id);
        $data['condition'] = $this->assetService->assetCondition()->assetConditionSelect('asset_condition_id', $detail->asset_condition_id);
        $formTemplate = $this->assetService->getEditFormTemplate($assetType);

        echo \View::make($formTemplate, $data)->render();
    }
}
