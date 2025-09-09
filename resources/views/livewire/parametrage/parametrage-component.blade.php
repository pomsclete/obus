@push('styles')
    <link href="{{ asset('src/assets/css/light/pages/knowledge_base.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('src/assets/css/dark/pages/knowledge_base.css') }}" rel="stylesheet" type="text/css" />
@endpush
<div>
    <div class="layout-px-spacing">

        <!--  BEGIN BREADCRUMBS  -->
        <div class="secondary-nav">
            <div class="breadcrumbs-container" data-page-heading="Sales">
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
                                    <li class="breadcrumb-item active" aria-current="page">Paramétrage de l'application
                                    </li>
                                </ol>
                            </nav>

                        </div>
                    </div>

                </header>
            </div>
        </div>
        <!--  END BREADCRUMBS  -->
        <div class="faq container mt-4">

            <div class="faq-layouting layout-spacing">

                <div class="kb-widget-section">

                    <div class="row">

                        <div class="col-3 mb-3">
                            <div class="card" wire:click="getUrl('/parametrage/specialite')">
                                <div class="card-body">
                                    <div class="card-icon mb-4">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                            stroke-linecap="round" stroke-linejoin="round"
                                            class="feather feather-filter">
                                            <polygon points="22 3 2 3 10 12.46 10 19 14 21 14 12.46 22 3"></polygon>
                                        </svg>
                                    </div>
                                    <h5 class="card-title mb-0">Spécialités (Filières)</h5>
                                </div>
                            </div>
                        </div>

                        <div class="col-3 mb-3">
                            <div class="card" wire:click="getUrl('/parametrage/niveau')">
                                <div class="card-body">
                                    <div class="card-icon mb-4">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                            stroke-linecap="round" stroke-linejoin="round"
                                            class="feather feather-sliders">
                                            <line x1="4" y1="21" x2="4" y2="14"></line>
                                            <line x1="4" y1="10" x2="4" y2="3"></line>
                                            <line x1="12" y1="21" x2="12" y2="12"></line>
                                            <line x1="12" y1="8" x2="12" y2="3">
                                            </line>
                                            <line x1="20" y1="21" x2="20" y2="16">
                                            </line>
                                            <line x1="20" y1="12" x2="20" y2="3">
                                            </line>
                                            <line x1="1" y1="14" x2="7" y2="14">
                                            </line>
                                            <line x1="9" y1="8" x2="15" y2="8">
                                            </line>
                                            <line x1="17" y1="16" x2="23" y2="16">
                                            </line>
                                        </svg>
                                    </div>
                                    <h5 class="card-title mb-0">Niveaux d'étude</h5>
                                </div>
                            </div>
                        </div>

                        <div class="col-3 mb-3">
                            <div class="card" wire:click="getUrl('/parametrage/annee')">
                                <div class="card-body">
                                    <div class="card-icon mb-4">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                            stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                            class="feather feather-calendar">
                                            <rect x="3" y="4" width="18" height="18" rx="2"
                                                ry="2"></rect>
                                            <line x1="16" y1="2" x2="16" y2="6">
                                            </line>
                                            <line x1="8" y1="2" x2="8" y2="6">
                                            </line>
                                            <line x1="3" y1="10" x2="21" y2="10">
                                            </line>
                                        </svg>
                                    </div>
                                    <h5 class="card-title mb-0">Années Scolaire</h5>
                                </div>
                            </div>
                        </div>

                        <div class="col-3 mb-3">
                            <div class="card" wire:click="getUrl('/parametrage/nationnalite')">
                                <div class="card-body">
                                    <div class="card-icon mb-4">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                            stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                            class="feather feather-globe">
                                            <circle cx="12" cy="12" r="10"></circle>
                                            <line x1="2" y1="12" x2="22" y2="12">
                                            </line>
                                            <path
                                                d="M12 2a15.3 15.3 0 0 1 4 10 15.3 15.3 0 0 1-4 10 15.3 15.3 0 0 1-4-10 15.3 15.3 0 0 1 4-10z">
                                            </path>
                                        </svg>
                                    </div>
                                    <h5 class="card-title mb-0">Nationalités</h5>
                                </div>
                            </div>
                        </div>

                        <div class="col-3 mb-3">
                            <div class="card" wire:click="getUrl('/parametrage/etablissement-boursier')">
                                <div class="card-body">
                                    <div class="card-icon mb-4">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                            stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                            class="feather feather-percent">
                                            <line x1="19" y1="5" x2="5" y2="19">
                                            </line>
                                            <circle cx="6.5" cy="6.5" r="2.5"></circle>
                                            <circle cx="17.5" cy="17.5" r="2.5"></circle>
                                        </svg>
                                    </div>
                                    <h5 class="card-title mb-0">Etablissements boursiers</h5>
                                </div>
                            </div>
                        </div>

                        <div class="col-3 mb-3">
                            <div class="card" wire:click="getUrl('/parametrage/rentre')">
                                <div class="card-body">
                                    <div class="card-icon mb-4">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                            stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                            class="feather feather-list">
                                            <line x1="8" y1="6" x2="21" y2="6">
                                            </line>
                                            <line x1="8" y1="12" x2="21" y2="12">
                                            </line>
                                            <line x1="8" y1="18" x2="21" y2="18">
                                            </line>
                                            <line x1="3" y1="6" x2="3.01" y2="6">
                                            </line>
                                            <line x1="3" y1="12" x2="3.01" y2="12">
                                            </line>
                                            <line x1="3" y1="18" x2="3.01" y2="18">
                                            </line>
                                        </svg>
                                    </div>
                                    <h5 class="card-title mb-0">Nos rentrées</h5>
                                </div>
                            </div>
                        </div>

                        <div class="col-3 mb-3">
                            <div class="card" wire:click="getUrl('/parametrage/mode-paiement')">
                                <div class="card-body">
                                    <div class="card-icon mb-4">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                            stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                            class="feather feather-credit-card">
                                            <rect x="1" y="4" width="22" height="16" rx="2"
                                                ry="2"></rect>
                                            <line x1="1" y1="10" x2="23" y2="10">
                                            </line>
                                        </svg>
                                    </div>
                                    <h5 class="card-title mb-0">Modes de paiement</h5>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

            </div>
        </div>

    </div>
</div>
