<div class="card">
    <div class="card-body">
        <form class="form" name="input-form" enctype="multipart/form-data">
            <input type="hidden" name="id">
            <div class="form-group mt-2 row">
                <div class="col-6 col-sm-6 col-md-6 col-lg-6 col-xl-6 col-xxl-6">
                    <div class="mb-7">
                        <label class="form-label">Latitude</label>
                        <input type="text" class="form-control" id="latitude" name="latitude" placeholder=""
                               required/>
                    </div>
                </div>
                <div class="col-6 col-sm-6 col-md-6 col-lg-6 col-xl-6 col-xxl-6">
                    <div class="mb-7">
                        <label class="form-label">Longitude</label>
                        <input type="text" class="form-control" id="longitude" name="longitude" placeholder=""
                               required/>
                    </div>
                </div>
            </div>
            <div class="form-group d-flex justify-content-center">
                <a class="btn btn-outline-primary col-3" name="create-route-btn">Create Route</a>
            </div>
        </form>
    </div>
</div>
<div class="card">
    <div class="card-body">
        <div class="form-group col-md-12 m-0" id="googleMap" style="height: 450px">
        </div>
    </div>
</div>
