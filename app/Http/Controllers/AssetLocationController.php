<?php

namespace App\Http\Controllers;

use App\Http\Requests\AssetLocationStore;
use App\Service\DataMessage;
use App\Service\Location;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Log;

class AssetLocationController extends Controller
{
    use DataMessage;

    protected $locationService;

    /**
     * LocationController constructor.
     * @param $locationService
     */
    public function __construct(Location $locationService)
    {
        $this->locationService = $locationService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('assets.locations.list');
    }

    /**
     * Process datatables ajax request.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function anyData()
    {
        return $this->locationService->datatableData();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['parent'] = $this->locationService->locationSelect('parent_id');
        return view('assets.locations.add', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param AssetLocationStore $request
     * @return \Illuminate\Http\Response
     */
    public function store(AssetLocationStore $request)
    {
        $this->locationService->store($request->except(['_token']));

        return redirect('asset-location')->with($this->getMessage('store'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $location = $this->locationService->getLocationById($id);
        if (! $location) {
            return redirect('asset-location')->withErrors($this->getMessage('siteNotFound'));
        }

        $data['location'] = $location;
        $data['parent'] = $this->locationService->locationSelect('parent_id', $location->parent_id);

        return view('assets.locations.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param AssetLocationStore $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(AssetLocationStore $request, $id)
    {
        $this->locationService->update($id, $request->except(['_token']));

        return redirect('asset-location')->with($this->getMessage('update'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $destroy = $this->locationService->destroy($id);
        if ($destroy) {
            return redirect('asset-location')->with($this->getMessage('delete'));
        }

        return redirect('asset-location')->withErrors($this->getMessage('siteNotFound'));
    }
}
