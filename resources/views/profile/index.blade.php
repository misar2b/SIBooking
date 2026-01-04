@extends(auth()->user()->role === 'admin' ? 'layouts.tamplateAdmin' : 'layouts.app')

@section('content')
<div class="container-fluid">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">
            <i class="fas fa-user-circle me-2"></i>
            {{ auth()->user()->role === 'admin' ? 'Profil Admin' : 'Profil User' }}
        </h1>
    </div>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="row">
        <div class="col-xl-8 col-lg-7">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-danger">Informasi Profil</h6>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-3 text-center">
                            <img src="https://ui-avatars.com/api/?name={{ auth()->user()->name }}&size=150&background=007bff&color=fff" 
                                 class="img-fluid rounded-circle mb-3">
                        </div>
                        <div class="col-md-9">
                            <h4>{{ auth()->user()->name }}</h4>
                            <p class="text-muted">{{ auth()->user()->email }}</p>
                            <hr>
                            <a href="{{ route('profile.edit') }}" class="btn btn-danger">
                                <i class="fas fa-edit me-2"></i>Edit Profil
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection