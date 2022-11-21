<x-guest-layout>
    <div class="col-md-8 d-flex flex-column align-items-center justify-content-center">
        <div class="d-flex justify-content-center py-4">
            <a href="/" class="logo d-flex align-items-center w-auto">
                <span class="d-none d-lg-block">Vehicle Registration & License Checking System</span>
            </a>
        </div><!-- End Logo -->
        <div class="card mb-3">
            <div class="card-body">
                <div class="pt-4 pb-2">
                    <h5 class="card-title text-center pb-0 fs-4">Register new Account</h5>
                    <p class="text-center small">Enter your account details to register</p>
                </div>
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <form method="POST" action="{{ route('register') }}" class="row g-3" enctype="multipart/form-data">
                    @csrf
                    <div class="row mt-2">
                        <div class="col-md-6">
                            <label for="fname">Firstname</label>
                            <div class="input-group">
                                <input id="fname" class="form-control" type="text" name="fname"/>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label for="lname">Lastname</label>
                            <div class="input-group">
                                <input id="lname" class="form-control" type="text" name="lname"/>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <label for="sex">Gender</label>
                            <div class="input-group">
                                <select id="gender" class="form-control" name="gender">
                                        <option value="Male">Male</option>
                                        <option value="Female">Female</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label for="phone">Phone</label>
                            <div class="input-group">
                                <input id="phone" class="form-control" type="text" name="phone"/>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <label for="sex">National ID</label>
                            <div class="input-group">
                                <input id="natid" class="form-control" type="text" name="natid"/>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label for="email">Email</label>
                            <div class="input-group">
                                <input id="email" class="form-control" type="text" name="email"/>
                            </div>
                        </div>
                    </div>

                    <div class="row mt-2">
                        <div class="col-md-6">
                            <label for="password">Password</label>
                            <div class="input-group">
                                <input id="password" class="form-control" type="password" name="password"/>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label for="password_confirmation">Confirm Password</label>
                            <div class="input-group">
                                <input id="password_confirmation" class="form-control" type="password" name="password_confirmation"/>
                            </div>
                        </div>
                    </div>
                    <div class="col-12">
                        <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('login') }}">
                            {{ __('Already registered?') }}
                        </a>

                        <button class="btn btn-primary">
                            Register
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-guest-layout>
