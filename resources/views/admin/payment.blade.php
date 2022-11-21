<x-app-layout>
    <div class="pagetitle" id="space">
        <h1>Payments</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Home</a></li>
                <li class="breadcrumb-item active">Payments</li>
            </ol>
        </nav>
    </div>
    <section class="section dashboard" id="space">
        <div class="row">
            <div class="col-lg-12">
                <div class="row">
                    <!-- Categories -->
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
                            <div class="card-header">
                                <div class="row">
                                    <div class="col-md-6">
                                        <h5 class="card-title">Payments Made</h5>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="dataTable-wrapper dataTable-loading no-footer sortable searchable fixed-columns">
                                    <div class="dataTable-top">
                                        <div class="dataTable-dropdown">
                                            <label><select class="dataTable-selector"><option value="5">5</option><option value="10" selected="">10</option><option value="15">15</option><option value="20">20</option><option value="25">25</option></select> entries per page</label>
                                        </div>
                                        <div class="dataTable-search">
                                            <input class="dataTable-input" placeholder="Search..." type="text">
                                        </div>
                                    </div>
                                    <div class="dataTable-container">
                                        <table class="table table-borderless datatable dataTable-table">
                                            <thead>
                                                <tr>
                                                    <th scope="col" data-sortable="" >
                                                        <a href="#" class="dataTable-sorter">#</a>
                                                    </th>
                                                    <th scope="col" data-sortable="">
                                                        <a href="#" class="dataTable-sorter">Activity</a>
                                                    </th>
                                                    <th scope="col" data-sortable="">
                                                        <a href="#" class="dataTable-sorter">Method</a>
                                                    </th>
                                                    <th scope="col" data-sortable="">
                                                        <a href="#" class="dataTable-sorter">Amount</a>
                                                    </th>
                                                    <th scope="col" data-sortable="">
                                                        <a href="#" class="dataTable-sorter">Status</a>
                                                    </th>
                                                    <th scope="col" data-sortable="">
                                                        <a href="#" class="dataTable-sorter">Created At</a>
                                                    </th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @php
                                                    $count = 0;
                                                @endphp
                                                @foreach ($payments as $payment)
                                                    <tr>
                                                        <th scope="row">
                                                            <a href="#">
                                                                @php
                                                                    $status = get_trans_status($payment->status);
                                                                    $count++;
                                                                    echo $count;
                                                                @endphp
                                                            </a>
                                                        </th>
                                                        <td>{{strtoupper($payment->action)}}</td>
                                                        <td>{{$payment->method}}</td>
                                                        <td>{{$payment->amount}}</td>
                                                        <td>
                                                            <span class="badge bg-{{$status->badge}}">{{$status->label}}</span>
                                                        </td>
                                                        <td>{{$payment->created_at}}</td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</x-app-layout>
