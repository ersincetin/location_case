<div class="modal fade" name="location-modal" data-bs-backdrop="static" data-bs-kyboard="false" tabindex="-1" role="dialog"
     aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header m-0 p-2">
                <h5 class="modal-title ps-1"></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form class="form" name="location-form" enctype="multipart/form-data">
                    <input type="hidden" name="id">
                    <div class="form-group mt-2 row">
                        <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 col-xxl-12">
                            <div class="mb-7">
                                <label class="form-label">Name</label>
                                <input type="text" class="form-control" name="name" placeholder="" required/>
                            </div>
                        </div>
                    </div>
                    <div class="form-group mt-2 row">
                        <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 col-xxl-12">
                            <div class="mb-7">
                                <label class="form-label">Latitude</label>
                                <input type="text" class="form-control" id="latitude" name="latitude" placeholder="" required/>
                            </div>
                        </div>
                    </div>
                    <div class="form-group mt-2 row">
                        <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 col-xxl-12">
                            <div class="mb-7">
                                <label class="form-label">Longitude</label>
                                <input type="text" class="form-control" id="longitude" name="longitude" placeholder=""/>
                            </div>
                        </div>
                    </div>
                    <div class="form-group mt-2 row">
                        <div class="col-9 col-sm-9 col-md-9 col-lg-9 col-xl-9 col-xxl-9">
                            <div class="mb-7">
                                <label class="form-label">Marker Color</label>
                                <input type="color" class="form-control" id="colorPicker"/>
                            </div>
                        </div>
                        <div class="col-3 col-sm-3 col-md-3 col-lg-3 col-xl-3 col-xxl-3">
                            <div class="mb-7">
                                <label class="form-label">Hexadecimal</label>
                                <input type="text" class="form-control" id="hexadecimal" name="markerColor" placeholder="#000000" value="#000000" readonly/>
                            </div>
                        </div>
                    </div>
                    <div class="form-group mt-2 row">
                        <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 col-xxl-12">
                            <div class="mt-3">
                                <div class="form-group col-md-12 m-0" id="googleMap" style="height: 450px">
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer m-0 p-2">
                <a class="btn btn-sm btn-danger"
                   data-dismiss="modal" >Cancel</a>
                <a class="btn btn-sm btn-primary" name="save-btn">Save</a>
            </div>
        </div>
    </div>
</div>
