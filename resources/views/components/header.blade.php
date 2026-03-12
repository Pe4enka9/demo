<header class="mb-5 container-fluid bg-white shadow-sm py-1">
    <nav class="navbar navbar-expand-lg">
        <div class="container">
            @include('components.logo')

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                    aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
                @include('components.nav')
            </div>
        </div>
    </nav>
</header>
