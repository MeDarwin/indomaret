    <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark py-3">
        <div class="container-fluid mx-5">
            <a class="navbar-brand" href="#">I do Mar</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse"
                aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse align-items-center" id="navbarCollapse">
                <ul class="navbar-nav me-auto mb-2 mb-md-0">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/dashboard') }}/perusahaan">Perusahaan</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="{{ url('/dashboard') }}/cabang">Cabang</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/dashboard') }}/barang">Barang</a>
                    </li>
                </ul>
                @auth
                    <div class="row align-items-center">
                        <div class="col-auto text-white">Hello, {{ Auth::user()->username }}</div>
                        <div class="col">
                            <a class="btn btn-sm btn-outline-danger" href="{{ url('auth', ['logout']) }}" type="button">Logout</a>
                        </div>
                    </div>
                @endauth
            </div>
        </div>
    </nav>
