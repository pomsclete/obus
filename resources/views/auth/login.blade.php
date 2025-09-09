@section('title', 'Se connecter')
<x-guest-layout>
    <div class="container mx-auto align-self-center">

        <div class="row">

            <div
                class="col-6 d-lg-flex d-none h-100 my-auto top-0 start-0 text-center justify-content-center flex-column">
                <div class="auth-cover-bg-image"></div>
                <div class="auth-overlay"></div>

                <div class="auth-cover">

                    <div class="position-relative">

                        <img src="https://designreset.com/cork/html/src/assets/img/auth-cover.svg" alt="auth-img">

                        <h2 class="mt-5 text-white font-weight-bolder px-2">EPF AFRICA OBUS
                        </h2>

                    </div>

                </div>

            </div>

            <div
                class="col-xxl-4 col-xl-5 col-lg-5 col-md-8 col-12 d-flex flex-column align-self-center ms-lg-auto me-lg-0 mx-auto">
                <div class="card">
                    <div class="card-body">
                        <form method="POST" action="{{ route('login') }}">
                            @csrf
                            <div class="row">
                                <div class="col-md-12 mb-3">

                                    <h2>Se connecter</h2>
                                    <p>Entrer votre email et mot de passe pour vous connecter. </p>

                                </div>
                                @if ($errors->any())
                                    <div class="col-md-12 mb-3">
                                        <div class="alert alert-danger fade show border-0" role="alert">
                                            <ul>
                                                @foreach ($errors->all() as $error)
                                                    <li>{{ $error }}</li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    </div>
                                @endif
                                <div class="col-md-12">
                                    <div class="mb-3">
                                        <label class="form-label">Email</label>
                                        <input type="email" name="email" :value="old('email')" required autofocus
                                            class="form-control">
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="mb-4">
                                        <label class="form-label">Mot de passe</label>
                                        <input type="password" name="password" required class="form-control">
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="mb-3">
                                        <div class="form-check form-check-primary form-check-inline">
                                            <input class="form-check-input me-3" id="remember_me" name="remember"
                                                type="checkbox">
                                            <label class="form-check-label" for="remember_me">
                                                Pronlonger ma séssion
                                            </label>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-12">
                                    <div class="mb-4">
                                        <button type="submit" class="btn btn-secondary w-100">SE CONNECTER</button>
                                    </div>
                                </div>







                                <div class="col-12">
                                    <div class="text-center">
                                        <p class="mb-0">
                                            @if (Route::has('password.request'))
                                                <a href="{{ route('password.request') }}" class="text-warning">Mot de
                                                    passe oublié
                                                    ?</a>
                                            @endif
                                        </p>
                                    </div>
                                </div>

                            </div>
                        </form>
                    </div>
                </div>
            </div>

        </div>

    </div>
</x-guest-layout>
