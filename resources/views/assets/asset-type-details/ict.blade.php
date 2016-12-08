<div class="row">
    <div class="asset-type-2">
        <div class="col-md-6">
            <div class="form-group row">
                <label class="form-label col-md-12">Brand :</label>
                <span class="col-md-12">{!! $assetDetail->brand !!}</span>
            </div>
            <div class="form-group row">
                <label class="form-label col-md-12">Specification :</label>
                <span class="col-md-12">{!! $assetDetail->specification !!}</span>
            </div>
            <div class="form-group row">
                <label class="form-label col-md-12">Location :</label>
                <span class="col-md-12">{!! $assetDetail->location !!}</span>
            </div>
            <div class="form-group row">
                <label class="form-label col-md-12">Status :</label>
                <span class="col-md-12">{!! $assetDetail->status !!}</span>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group row">
                <label class="form-label col-md-12">Install Date :</label>
                <span class="col-md-12">{!! $assetDetail->install_date !!}</span>
            </div>
            <div class="form-group row">
                <label class="form-label col-md-12">Condition :</label>
                <span class="col-md-12">{!! $assetDetail->assetCondition->name !!}</span>
            </div>
            <div class="form-group row">
                <label class="form-label col-md-12">Condition Detail :</label>
                <span class="col-md-12">{!! $assetDetail->condition_detail !!}</span>
            </div>
        </div>
    </div>
</div>