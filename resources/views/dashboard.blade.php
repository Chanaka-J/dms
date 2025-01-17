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

@endpush
