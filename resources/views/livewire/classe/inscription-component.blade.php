@push('styles')
    <link href="{{ asset('src/assets/css/light/dashboard/dash_1.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('src/assets/css/dark/dashboard/dash_1.css') }}" rel="stylesheet" type="text/css" />
@endpush
<div>
    <!--  BEGIN BREADCRUMBS  -->
    <div class="secondary-nav">
        <div class="breadcrumbs-container" data-page-heading="Analytics">
            <header class="header navbar navbar-expand-sm">
                <a href="javascript:void(0);" class="btn-toggle sidebarCollapse" data-placement="bottom">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round" class="feather feather-menu">
                        <line x1="3" y1="12" x2="21" y2="12"></line>
                        <line x1="3" y1="6" x2="21" y2="6"></line>
                        <line x1="3" y1="18" x2="21" y2="18"></line>
                    </svg>
                </a>
                <div class="d-flex breadcrumb-content">
                    <div class="page-header">

                        <div class="page-title">
                        </div>

                        <nav class="breadcrumb-style-one" aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item active" aria-current="page">Gestion des inscriptions</li>
                            </ol>
                        </nav>

                    </div>
                </div>
            </header>
        </div>
    </div>
    <!--  END BREADCRUMBS  -->
    <div class="row layout-spacing layout-top-spacing" id="cancel-row">
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 layout-spacing">
            <div class="row widget-statistic">
                <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12 col-12 layout-spacing">
                    <div class="widget widget-card-two {{ $view == 0 ? 'bg-warning' : '' }}">
                        <div class="widget-content">

                            <div class="media">
                                <div class="w-img">
                                    <img src="../src/assets/img/g-8.png" alt="avatar">
                                </div>
                                <div class="media-body">
                                    <h6 class="{{ $view == 0 ? 'text-white' : 'text-warning' }} fw-bold text-uppercase">
                                        Inscriptions en attente</h6>
                                    <p class="meta-date-time {{ $view == 0 ? 'text-white' : '' }}">
                                        {{ $annee->libelleAnnee }}</p>
                                </div>
                            </div>

                            <div class="card-bottom-section">
                                <h5 class="{{ $view == 0 ? 'text-white' : 'text-warning' }} fw-bold">{{ $countWait }}
                                    Etudiant(s)</h5>
                                <div class="img-group">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                        stroke-linecap="round" stroke-linejoin="round" class="feather feather-users">
                                        <path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path>
                                        <circle cx="9" cy="7" r="4"></circle>
                                        <path d="M23 21v-2a4 4 0 0 0-3-3.87"></path>
                                        <path d="M16 3.13a4 4 0 0 1 0 7.75"></path>
                                    </svg>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                        stroke-linecap="round" stroke-linejoin="round" class="feather feather-users">
                                        <path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path>
                                        <circle cx="9" cy="7" r="4"></circle>
                                        <path d="M23 21v-2a4 4 0 0 0-3-3.87"></path>
                                        <path d="M16 3.13a4 4 0 0 1 0 7.75"></path>
                                    </svg>
                                </div>
                                <a href="javascript:void(0);" wire:click="ChangeView(0)"
                                    class="btn btn-dark _effect--ripple waves-effect waves-light">Plus
                                    de détails</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12 col-12 layout-spacing">
                    <div class="widget widget-card-two {{ $view == 1 ? 'bg-success' : '' }}">
                        <div class="widget-content">

                            <div class="media">
                                <div class="w-img">
                                    <img src="../src/assets/img/g-8.png" alt="avatar">
                                </div>
                                <div class="media-body">
                                    <h6 class="{{ $view == 1 ? 'text-white' : 'text-success' }} fw-bold text-uppercase">
                                        Inscriptions validées</h6>
                                    <p class="meta-date-time {{ $view == 1 ? 'text-white' : '' }}">
                                        {{ $annee->libelleAnnee }}</p>
                                </div>
                            </div>

                            <div class="card-bottom-section">
                                <h5 class="{{ $view == 1 ? 'text-white' : 'text-success' }} fw-bold">
                                    {{ $countValidate }} Etudiant(s)</h5>
                                <div class="img-group">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                        stroke-linecap="round" stroke-linejoin="round" class="feather feather-users">
                                        <path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path>
                                        <circle cx="9" cy="7" r="4"></circle>
                                        <path d="M23 21v-2a4 4 0 0 0-3-3.87"></path>
                                        <path d="M16 3.13a4 4 0 0 1 0 7.75"></path>
                                    </svg>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                        stroke-linecap="round" stroke-linejoin="round" class="feather feather-users">
                                        <path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path>
                                        <circle cx="9" cy="7" r="4"></circle>
                                        <path d="M23 21v-2a4 4 0 0 0-3-3.87"></path>
                                        <path d="M16 3.13a4 4 0 0 1 0 7.75"></path>
                                    </svg>
                                </div>
                                <a href="javascript:void(0);" wire:click="ChangeView(1)"
                                    class="btn _effect--ripple waves-effect waves-light">Plus
                                    de détails</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12 col-12 layout-spacing">
                    <div class="widget widget-card-two {{ $view == 2 ? 'bg-danger' : '' }}">
                        <div class="widget-content">

                            <div class="media">
                                <div class="w-img">
                                    <img src="../src/assets/img/g-8.png" alt="avatar">
                                </div>
                                <div class="media-body">
                                    <h6
                                        class="{{ $view == 2 ? 'text-white' : 'text-danger' }} fw-bold text-uppercase">
                                        Les abandons</h6>
                                    <p class="meta-date-time {{ $view == 2 ? 'text-white' : '' }}">
                                        {{ $annee->libelleAnnee }}</p>
                                </div>
                            </div>

                            <div class="card-bottom-section">
                                <h5 class="{{ $view == 2 ? 'text-white' : 'text-danger' }} fw-bold">
                                    {{ $countAbandon }} Etudiant(s)</h5>
                                <div class="img-group">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                        stroke-linecap="round" stroke-linejoin="round" class="feather feather-users">
                                        <path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path>
                                        <circle cx="9" cy="7" r="4"></circle>
                                        <path d="M23 21v-2a4 4 0 0 0-3-3.87"></path>
                                        <path d="M16 3.13a4 4 0 0 1 0 7.75"></path>
                                    </svg>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                        stroke-linecap="round" stroke-linejoin="round" class="feather feather-users">
                                        <path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path>
                                        <circle cx="9" cy="7" r="4"></circle>
                                        <path d="M23 21v-2a4 4 0 0 0-3-3.87"></path>
                                        <path d="M16 3.13a4 4 0 0 1 0 7.75"></path>
                                    </svg>
                                </div>
                                <a href="javascript:void(0);" wire:click="ChangeView(2)"
                                    class="btn _effect--ripple waves-effect waves-light">Plus de détails</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        {{-- loading --}}

        <div wire:loading wire:target="ChangeView" class="text-center">
            <img src="{{ asset('src/assets/img/circle_loading.gif') }}" width="64" height="64"
                class="m-auto mt-1/4">
        </div>

        <div class="col-xl-12 layout-spacing">
            @if ($view == 0)
                <livewire:classe.wait-subscribe-component :annee="$annee->id">
                @elseif($view == 1)
                    <livewire:classe.validate-subscribe-component :annee="$annee->id">
                    @else
                        <livewire:classe.cancel-subscribe-component :annee="$annee->id">
            @endif
        </div>
    </div>
</div>
