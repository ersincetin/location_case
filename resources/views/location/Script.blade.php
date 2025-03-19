<script>
    let locationDataTable, searchValue;
    $(document).ready(() => {
        setSearchData();
        $.fn.DataTable.ext.errMode = 'throw';
        locationDataTable = $('[name="location-datatable"]').DataTable({
            bProcessing: true,
            bServerSide: true,
            scrollX: true,
            ordering: false,
            paging: true,
            lengthChange: false,
            autoWidth: false,
            responsive: true,
            ajax: {
                url: "{{url('location/dataTable')}}",
                type: "POST",
                'headers': {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data: function (data) {
                    data.searchValue = searchValue;
                }
            },
            fixedColumns: {
                left: 1,
                right: 1
            },
            columns: [
                {data: 'orderNumber'},
                {data: 'name'},
                {data: 'latitude'},
                {data: 'longitude'},
                {data: 'markerColor',className:'text-center'},
                {
                    data: 'edit',
                    nowrap: 'nowrap',
                    orderAble: false,
                }
            ]
        });
    });

    function setSearchData(value = null) {
        searchValue = value;
    }

    $(document).on('keyup', '[name="user-search"]', function () {
        setSearchData(this.value)
        reloadDataTable();
    });

    function reloadDataTable() {
        locationDataTable.ajax.reload(null, false);
    }

    $(document).on('click', '[name="add-btn"]', function () {
        $('[name="location-form"]').trigger("reset");
        $('[name="id"]').removeAttr('value');
        $('[name="location-modal"]').find('.modal-title').text("Location Add").end().modal('show');
        initMap();
    });

    function getLocation(id) {
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url: "{{url('location/get')}}",
            type: 'POST',
            dataType: 'JSON',
            data: {
                id: id
            },
            success: function (data) {
                if (data != undefined && data != null) {
                    $('[name="id"]').val(data.id);
                    $('[name="name"]').val(data.name);
                    $('[name="latitude"]').val(data.latitude);
                    $('[name="longitude"]').val(data.longitude);
                    $('#colorPicker').val(data.marker_color).change();
                    $('#hexadecimal').val(data.marker_color).change();
                    GoogleMap(data.latitude,data.longitude,20,data.name,data.marker_color);
                }
            }
        });
    }

    function editLocation(id) {
        $('[name="location-form"]').trigger("reset");
        $('[name="id"]').removeAttr('value');
        $('[name="location-modal"]').find('.modal-title').text("Edit").end().modal('show');
        getLocation(id);
    }

    function deleteLocation(id){
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url: "{{url('location/delete')}}",
            type: 'POST',
            dataType: 'JSON',
            data: {
                id: id
            },
            success: function (data) {
                if (data != undefined && data != null) {
                    $('[name="location-modal"]').modal('hide');
                    reloadDataTable();
                }
            }
        });
    }

    $(document).on('click', '[name="save-btn"]', () => {
        let url;
        let formData = new FormData(document.querySelector('[name="location-form"]'));
        if ($('[name="id"]').val().length > 0) {
            url = "{{url('location/update')}}";
        } else {
            url = "{{url('location/create')}}";
        }

        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            'url': url,
            'type': 'POST',
            'contentType': false,
            'processData': false,
            'data': formData,
            success: (data) => {
                if (undefined != data || data != null) {
                    $('[name="location-modal"]').modal('hide');
                    reloadDataTable();
                }
            }
        });
    })

    const colorPicker = document.getElementById("colorPicker");
    const colorCode = document.getElementById("hexadecimal");
    colorPicker.addEventListener("input", (event) => {
        colorCode.value = event.target.value;
    });

</script>
