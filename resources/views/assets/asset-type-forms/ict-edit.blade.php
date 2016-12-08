<div class="row">
    <div class="asset-type-2 form">
        <div class="col-md-6">
            <div class="form-group ">
                <label>Brand</label>
                <input type="text" name="brand" value="{!! $assetDetail->brand !!}" class="form-control">
            </div>
            <div class="form-group ">
                <label>Specification</label>
                <textarea class="form-control" name="specification">{!! $assetDetail->specification !!}</textarea>
            </div>
            <div class="form-group ">
                <label>Location</label>
                <input type="text" name="location" value="{!! $assetDetail->location !!}" class="form-control">
            </div>
            <div class="form-group ">
                <label>Status</label>
                <input type="text" name="status" value="{!! $assetDetail->status !!}" class="form-control">
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group ">
                <label>Install Date</label>
                <input type="text" name="install_date" class="form-control date-picker" value="@if ($assetDetail->install_date != ''){!! Carbon\Carbon::createFromFormat('Y-m-d', $assetDetail->install_date)->format('m/d/Y') !!}@endif">
            </div>
            <div class="form-group ">
                <label>Condition</label>
                {!! $condition !!}
            </div>
            <div class="form-group ">
                <label>Condition Detail</label>
                <textarea class="form-control" name="condition_detail">{!! $assetDetail->condition_detail !!}</textarea>
            </div>
        </div>
    </div>
</div>