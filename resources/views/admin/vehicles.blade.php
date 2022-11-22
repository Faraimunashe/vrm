<x-app-layout>
    <div class="pagetitle">
        <h1>Vehicles</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                <li class="breadcrumb-item active">Vehicles</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section dashboard">
        <div class="row">
            <!-- Left side columns -->
            <div class="col-md-12">
                @if (Session::has('success'))
                    <div class="alert alert-success" role="alert">
                        {{ Session::get('success') }}
                    </div>
                @endif
                @if (Session::has('error'))
                    <div class="alert alert-danger" role="alert">
                        {{ Session::get('error') }}
                    </div>
                @endif
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
            </div>
            <div class="col-md-12">
                        <div class="card recent-sales overflow-auto">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-10">
                                        <h5 class="card-title">Vehicles</h5>
                                    </div>
                                    {{-- <div class="col-md-2 mt-3 justify-end">
                                        <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#largeModal">Add New</button>
                                    </div> --}}
                                </div>
                                <table class="table table-borderless datatable">
                                    <thead>
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">Name</th>
                                            <th scope="col">Engine#</th>
                                            <th scope="col">Chasis#</th>
                                            <th scope="col">Color</th>
                                            <th scope="col">Status</th>
                                            <th scope="col">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                            $count = 0;
                                        @endphp
                                        @foreach ($vehicles as $item)
                                            <tr>
                                                <th scope="row">
                                                    <a href="#">
                                                        @php
                                                            $status = get_veh_status($item->id);
                                                            $count++;
                                                            echo $count;
                                                        @endphp
                                                    </a>
                                                </th>
                                                <td>{{ $item->model }} {{ $item->model }}</td>
                                                <td>{{ $item->engine_number }}</td>
                                                <td>{{ $item->chasis_number }}</td>
                                                <td>{{ $item->color }}</td>
                                                <td>
                                                    <div class="badge badge-{{$status->badge}}">{{$status->label}}</div>
                                                </td>
                                                <td>
                                                    <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#editModal{{ $item->id }}">
                                                        reply
                                                    </button>
                                                </td>
                                            </tr>
                                            <div class="modal fade" id="editModal{{ $item->id }}" tabindex="-1">
                                                <div class="modal-dialog modal-lg">
                                                    <div class="modal-content">
                                                        <form method="POST" action="{{route('admin-respond-vehicles')}}">
                                                            @csrf
                                                            <input type="hidden" name="vehicle_id" value="{{ $item->id }}" required>
                                                            <div class="modal-header">
                                                                <h5 class="modal-title">Vehicle Response</h5>
                                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <div class="row mb-3">
                                                                    <label for="inputText" class="col-sm-2 col-form-label">Status: </label>
                                                                    <div class="col-sm-10">
                                                                        <select name="status" class="form-control" required>
                                                                            <option selected disabled>SELECT STATUS</option>
                                                                            <option value="1"> Approved</option>
                                                                            <option value="0"> Rejected</option>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                                <button type="submit" class="btn btn-primary">Response</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div><!-- End Edit Modal-->
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>

                        </div>
            </div><!-- End Left side columns -->
        </div>
    </section>
</x-app-layout>
