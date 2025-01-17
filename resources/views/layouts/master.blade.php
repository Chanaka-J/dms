<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    {{-- <link href="{{ asset('css/app.css') }}" rel="stylesheet"> --}}

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">


    {{-- // csrf --}}
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.24/css/dataTables.bootstrap4.min.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.24/css/jquery.dataTables.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.24/js/dataTables.bootstrap4.min.js"></script>
 
    <script src="https://cdn.datatables.net/1.10.24/js/dataTables.material.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.24/js/dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.24/js/dataTables.select.min.js"></script>

    <title>DMS</title>
</head>

<body>

    <div id="app">
        {{-- @yield('content') --}}

        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Packages</h3>
                            <div class="card-tools">
                                <button  type="button" class="btn btn-tool btn-primary" data-toggle="modal"
                                    data-target="#addPackageModal" onclick="showAddPackageModal()">
                                    <i class="fas fa-plus"></i> Add Package
                                </button>
                            </div>
                        </div>
                        <div class="card-body">
                            <table id="packages-datatable" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Package Description</th>
                                        <th>Length (cm)</th>
                                        <th>Height (cm)</th>
                                        <th>Width (cm)</th>
                                        <th>Weight (kg)</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>



    <!-- Edit Package Modal -->
<div class="modal fade" id="editPackageModal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Edit Package</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('package.store') }}" method="POST">
                @csrf
                <div class="modal-body">
                    <div class="form-group">
                        <label>Package Description</label>
                        <input type="text" class="form-control" name="Package_description" required>
                    </div>
                    <div class="form-group">
                        <label>Length (cm)</label>
                        <input type="number" class="form-control" name="length" required>
                    </div>
                    <div class="form-group">
                        <label>Height (cm)</label>
                        <input type="number" class="form-control" name="height" required>
                    </div>
                    <div class="form-group">
                        <label>Width (cm)</label>
                        <input type="number" class="form-control" name="width" required>
                    </div>
                    <div class="form-group">
                        <label>Weight (kg)</label>
                        <input type="number" class="form-control" name="weight" required>
                    </div>
                
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Add Delivery Information Modal -->
<div class="modal fade" id="addDeliveryModal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Add Delivery Information</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="" method="POST">
                @csrf
                <div class="modal-body">
                    <input type="hidden" name="package_id">
                    <div class="form-group">
                        <label>Pickup address</label>
                        <input type="text" class="form-control" name="pickup_address" required>
                    </div>
                    <div class="form-group">
                        <label>Pickup Name</label>
                        <input type="text" class="form-control" name="pickup_name" required>
                    </div>
                    <div class="form-group">
                        <label>Pickup Phone</label>
                        <input type="text" class="form-control" name="pickup_phone" required>
                    </div>
                    <div class="form-group">
                        <label>Pickup Email</label>
                        <input type="email" class="form-control" name="pickup_email" required>
                    </div>
                    <div class="form-group">
                        <label> delivery_address</label>
                        <input type="text" class="form-control" name="delivery_address" required>
                    </div>
                    <div class="form-group">
                        <label>delivery_name</label>
                        <input type="text" class="form-control" name="delivery_name" required>
                    </div>
                    <div class="form-group">
                        <label>delivery_phone</label>
                        <input type="text" class="form-control" name="delivery_phone" required>
                    </div>
                    <div class="form-group">
                        <label>delivery_email</label>
                        <input type="email" class="form-control" name="delivery_email" required>
                    </div>
                    <div class="form-group">
                        <label>type_of_good</label>
                        <select class="form-control" name="type_of_good" required>
                            <option value="" disabled>Select Type of good</option>
                            <option value="document">Document</option>
                            <option value="parcel">Parcel</option>
                        </select>
                    </div>
                    {{-- //we can use separate table for manage delivery providers --}}
                    <div class="form-group">
                        <label>delivery_provider</label>
                        <select class="form-control" name="delivery_provider" required>
                            <option value="" disabled>Select Delivery provider</option>
                            <option value="dhl">DHL</option>
                            <option value="startrack">Startrack</option>
                            <option value="zoomzu">Zoomzu</option>
                            <option value="tge">TGE</option>
                        </select>
                    </div>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>

    <script>
        $(document).ready(function() {
            $.ajax({
                url: "{{ route('packages.datatable') }}",
                type: "GET",
                success: function(data) {
                    console.log(data);
                    $('#packages-datatable').DataTable({
                        data: data,
                        //table length

                        columns: [{
                                data: 'id'
                            },
                            {
                                data: 'Package_description'
                            },
                            {
                                data: 'length'
                            },
                            {
                                data: 'height'
                            },
                            {
                                data: 'width'
                            },
                            {
                                data: 'weight'
                            },
                            {
                                data: null,
                                render: function(data, type, row) {
                                    return `
                                        <button class="btn btn-sm btn-warning edit-package-btn" data-toggle="modal" data-target="#editPackageModal" onclick="editPackage(${data.id})">Edit Package</button>
                                        <button class="btn btn-sm btn-secondary add-delivery-btn" data-toggle="modal" data-target="#addDeliveryModal" onclick="addDelivery(${data.id})">Add Delivery Info</button>
                                    `;
                                }
                            }
                        ]
                    });
                }
            });

        });
    </script>

    <script>
        function editPackage(id) {
            $.ajax({
                url: "{{ route('get.package', ':id') }}".replace(':id', id),
                type: "GET",
                success: function(data) {
                    console.log(data);
                    $('#editPackageModal .modal-title').text('Edit Package');
                    $('#editPackageModal input[name="Package_description"]').val(data.Package_description);
                    $('#editPackageModal input[name="length"]').val(data.length);
                    $('#editPackageModal input[name="height"]').val(data.height);
                    $('#editPackageModal input[name="width"]').val(data.width);
                    $('#editPackageModal input[name="weight"]').val(data.weight);
                    $('#editPackageModal form').attr('action', `{{ route('update.package', ':id') }}`.replace(':id', data.id));
                    $('#editPackageModal').modal('show');
                }
            });
        }

        // addDelivery
        function addDelivery(id) {
            $.ajax({
                url: "{{ route('get.package', ':id') }}".replace(':id', id),
                type: "GET",
                success: function(data) {
                    console.log(data);
                 
                    $('#addDeliveryModal input[name="package_id"]').val(data.id);
                    $('#addDeliveryModal').modal('show');
                }
            });
        }
    </script>

    <script>
        function showAddPackageModal() {
            $('#editPackageModal').modal('show');
            //modal title must change
            $('#editPackageModal .modal-title').text('Add Package');
            // clear all values in this modal
            $('#editPackageModal input[name="Package_description"]').val('');
            $('#editPackageModal input[name="length"]').val('');
            $('#editPackageModal input[name="height"]').val('');
            $('#editPackageModal input[name="width"]').val('');
            $('#editPackageModal input[name="weight"]').val('');
            $('#editPackageModal form').attr('action', `{{ route('package.store') }}`);
        }
    </script>



    {{-- <script src="{{ asset('js/app.js') }}"></script> --}}
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
        integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"
        integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous">
    </script>
    <script src = "https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js">
        < /body> <
        /html>
