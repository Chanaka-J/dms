@extends('layouts.master')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Packages</h3>
                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-toggle="modal" data-target="#addPackageModal">
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
                                {{-- show delivery persaon details here. due to time cannot completed  --}}
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

<!-- Add Package Modal -->
<div class="modal fade" id="addPackageModal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Add Package</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('package.store') }}" method="POST">
                @csrf
                <div class="modal-body">
                    <div class="form-group">
                        <label>Name</label>
                        <input type="text" class="form-control" name="name" required>
                    </div>
                    <div class="form-group">
                        <label>Item</label>
                        <input type="text" class="form-control" name="item" required>
                    </div>
                    <div class="form-group">
                        <label>Quantity</label>
                        <input type="number" class="form-control" name="quantity" required>
                    </div>
                    <div class="form-group">
                        <label>Weight (kg)</label>
                        <input type="number" class="form-control" name="weight" required>
                    </div>
                    <div class="form-group">
                        <label>Price</label>
                        <input type="number" class="form-control" name="price" required>
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

<!-- Edit Package Modal -->
{{-- <div class="modal fade" id="editPackageModal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Edit Package</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="" method="POST">
                @csrf
                <div class="modal-body">
                    <div class="form-group">
                        <label>Name</label>
                        <input type="text" class="form-control" name="name" required>
                    </div>
                    <div class="form-group">
                        <label>Item</label>
                        <input type="text" class="form-control" name="item" required>
                    </div>
                    <div class="form-group">
                        <label>Quantity</label>
                        <input type="number" class="form-control" name="quantity" required>
                    </div>
                    <div class="form-group">
                        <label>Weight (kg)</label>
                        <input type="number" class="form-control" name="weight" required>
                    </div>
                    <div class="form-group">
                        <label>Price</label>
                        <input type="number" class="form-control" name="price" required>
                    </div>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Update</button>
                </div>
            </form>
        </div>
    </div>
</div> --}}

<!-- Add Delivery Information Modal -->
{{-- <div class="modal fade" id="addDeliveryModal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Add Delivery Information</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('add.delivery') }}" method="POST">
                @csrf
                <div class="modal-body">
                    <div class="form-group">
                        <label>Tracking Number</label>
                        <input type="text" class="form-control" name="tracking_number" required>
                    </div>
                    <div class="form-group">
                        <label>Delivery Status</label>
                        <select class="form-control" name="delivery_status" required>
                            <option value="">Select Status</option>
                            <option value="pending">Pending</option>
                            <option value="delivered">Delivered</option>
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
</div> --}}
@endsection





@push('scripts')
<script>
   

document.ready(function(){
    $.ajax({
        url: "{{ route('packages.datatable') }}",
        type: "GET",
        success: function(data){
            console.log(data);
        }
    });
});


    // var packages = {!! json_encode($packages) !!};
    // console.log(packages);

    $(function() {
        $('#packages-datatable').DataTable({
            // "processing": true,
            // "data" : packages,
            // "serverSide": false,
            // "responsive": true,
            // "autoWidth": false,
            // "lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]],
            // "order": [[ 0, "desc" ]],
            "ajax": "{{ route('packages.datatable') }}",
            "columns": [
                { data: 'name', name: 'name' },
                { data: 'item', name: 'item' },
                { data: 'quantity', name: 'quantity' },
                { data: 'weight', name: 'weight' },
                { data: 'price', name: 'price' },
                { data: 'action', name: 'action' }
            ]
        });
// add modal script here
       
    });
</script>
@endpush
