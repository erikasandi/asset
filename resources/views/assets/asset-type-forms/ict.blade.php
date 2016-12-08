<div class="row">
    <div class="asset-type-2 form">
        <div class="col-md-6">
            <div class="form-group ">
                <label>Brand</label>
                <input type="text" name="brand" class="form-control">
            </div>
            <div class="form-group ">
                <label>Specification</label>
                <textarea class="form-control" name="specification"></textarea>
            </div>
            <div class="form-group ">
                <label>Location</label>
                <input type="text" name="location" class="form-control">
            </div>
            <div class="form-group ">
                <label>Status</label>
                <input type="text" name="status" class="form-control">
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group ">
                <label>Install Date</label>
                <input type="text" name="install_date" class="form-control date-picker">
            </div>
            <div class="form-group ">
                <label>Condition</label>
                {!! $condition !!}
            </div>
            <div class="form-group ">
                <label>Condition Detail</label>
                <textarea class="form-control" name="condition_detail"></textarea>
            </div>
        </div>
    </div>
</div>