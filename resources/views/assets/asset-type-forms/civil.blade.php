<div class="row">
    <div class="asset-type-2">
        <div class="col-md-6">
            <div class="form-group ">
                <label>Brand</label>
                <textarea class="form-control" name="specification"></textarea>
            </div>
            <div class="form-group ">
                <label>Contractor</label>
                <input type="text" name="contractor" class="form-control">
            </div>
            <div class="form-group ">
                <label>Condition</label>
                {!! $condition !!}
            </div>
            <div class="form-group ">
                <label>Condition Details</label>
                <textarea class="form-control" name="condition_detail"></textarea>
            </div>
            <div class="form-group ">
                <label>Reservoir Capacity</label>
                <input type="text" name="reservoir_capacity" class="form-control">
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group ">
                <label>Function</label>
                <textarea class="form-control" name="function"></textarea>
            </div>
            <div class="form-group ">
                <label>Construction Date</label>
                <input type="text" name="construction_date" class="form-control date-picker">
            </div>
            <div class="form-group ">
                <label>Performance</label>
                {!! $performance !!}
            </div>
            <div class="form-group ">
                <label>Performance Details</label>
                <textarea class="form-control" name="performance_detail"></textarea>
            </div>
        </div>
    </div>
</div>