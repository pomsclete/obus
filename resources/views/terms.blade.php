@push('styles')
    <link href="{{ asset('src/assets/css/light/dashboard/dash_1.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('src/assets/css/light/dashboard/dash_2.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('src/assets/css/dark/dashboard/dash_1.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('src/assets/css/dark/dashboard/dash_2.css') }}" rel="stylesheet" type="text/css" />
    <style>
        th:first-child,
        td:first-child {
            position: sticky;
            left: 0px;
            z-index: 1;
        }

        tr:nth-child(odd)>td {
            background-color: #ededed;
        }

        tr:nth-child(even)>td {
            background-color: #e2e2e2;
        }

        tr:nth-child(odd)>th {
            background-color: #d7d7d7;
        }
    </style>
@endpush
<div>
    <div class="layout-px-spacing">
        <div class="middle-content container-xxl p-0">

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

                                <nav class="breadcrumb-style-one" aria-label="breadcrumb">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item active" aria-current="page">Suivi des mensualités
                                        </li>
                                    </ol>
                                </nav>

                            </div>
                        </div>

                    </header>
                </div>
            </div>
            <!--  END BREADCRUMBS  -->
            <!-- BEGIN DASHBOARD  -->
            <div class="row layout-top-spacing">
                <div class="col-xl-4 col-lg-6 col-md-6 col-sm-6 col-12 layout-spacing">
                    <div class="widget widget-three">
                        <div class="widget-heading">
                            <h5 class="">Sommaire</h5>
                        </div>
                        <div class="widget-content">

                            <div class="order-summary">

                                <div class="summary-list">
                                    <div class="w-icon">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                            stroke-linecap="round" stroke-linejoin="round" class="feather feather-tag">
                                            <path
                                                d="M20.59 13.41l-7.17 7.17a2 2 0 0 1-2.83 0L2 12V2h10l8.59 8.59a2 2 0 0 1 0 2.82z">
                                            </path>
                                            <line x1="7" y1="7" x2="7" y2="7">
                                            </line>
                                        </svg>
                                    </div>
                                    <div class="w-summary-details">

                                        <div class="w-summary-info">
                                            <h6>Profit</h6>
                                            <p class="summary-count">$37,515</p>
                                        </div>

                                        <div class="w-summary-stats">
                                            <div class="progress">
                                                <div class="progress-bar bg-gradient-success" role="progressbar"
                                                    style="width: 65%" aria-valuenow="65" aria-valuemin="0"
                                                    aria-valuemax="100"></div>
                                            </div>
                                        </div>

                                    </div>

                                </div>

                                <div class="summary-list">
                                    <div class="w-icon">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                            stroke-linecap="round" stroke-linejoin="round"
                                            class="feather feather-credit-card">
                                            <rect x="1" y="4" width="22" height="16" rx="2"
                                                ry="2"></rect>
                                            <line x1="1" y1="10" x2="23" y2="10">
                                            </line>
                                        </svg>
                                    </div>
                                    <div class="w-summary-details">

                                        <div class="w-summary-info">
                                            <h6>Expenses</h6>
                                            <p class="summary-count">$55,085</p>
                                        </div>

                                        <div class="w-summary-stats">
                                            <div class="progress">
                                                <div class="progress-bar bg-gradient-warning" role="progressbar"
                                                    style="width: 80%" aria-valuenow="80" aria-valuemin="0"
                                                    aria-valuemax="100"></div>
                                            </div>
                                        </div>

                                    </div>

                                </div>

                            </div>

                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12 col-12 layout-spacing">
                    <div class="widget widget-card-four">
                        <div class="widget-content">
                            <div class="w-header">
                                <div class="w-info">
                                    <h6 class="value">Recouvrement</h6>
                                </div>
                            </div>

                            <div class="w-content">

                                <div class="w-info">
                                    <p class="value">$ 45,141 <span>this week</span> <svg
                                            xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                            stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                            class="feather feather-trending-up">
                                            <polyline points="23 6 13.5 15.5 8.5 10.5 1 18"></polyline>
                                            <polyline points="17 6 23 6 23 12"></polyline>
                                        </svg></p>
                                </div>

                            </div>

                            <div class="w-progress-stats">
                                <div class="progress">
                                    <div class="progress-bar bg-gradient-secondary" role="progressbar"
                                        style="width: 57%" aria-valuenow="57" aria-valuemin="0" aria-valuemax="100">
                                    </div>
                                </div>

                                <div class="">
                                    <div class="w-icon">
                                        <p>57%</p>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12 col-12 layout-spacing">
                    <div class="widget widget-card-five">
                        <div class="widget-content">
                            <div class="account-box">

                                <div class="info-box">
                                    <div class="icon">
                                        <span>
                                            <img src="../src/assets/img/money-bag.png" alt="money-bag">
                                        </span>
                                    </div>

                                    <div class="balance-info">
                                        <h6>Total Balance</h6>
                                        <p>$41,741.42</p>
                                    </div>
                                </div>

                                <div class="card-bottom-section">
                                    <div><span class="badge badge-light-success">+ 13.6% <svg
                                                xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                class="feather feather-trending-up">
                                                <polyline points="23 6 13.5 15.5 8.5 10.5 1 18"></polyline>
                                                <polyline points="17 6 23 6 23 12"></polyline>
                                            </svg></span></div>
                                    <a href="javascript:void(0);" class="">View Report</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- END DASHBOARD  -->
            <div class="row layout-spacing layout-top-spacing" id="cancel-row">
                <div id="tableStriped" class="col-lg-12 col-12 layout-spacing">
                    <div class="statbox widget box box-shadow">
                        <div class="widget-header">
                            <div class="row d-flex justify-content-between mt-4 px-2">
                                <div class="col-lg-5 col-md-5 col-sm-5 filtered-list-search mx-auto">
                                    <select wire:model.live="classe" class="form-select"
                                        id="exampleFormControlSelect1">
                                        <option value="">-- Sélectionnez une classe --</option>
                                        @foreach ($classes as $item)
                                            <option value="{{ $item->id }}">{{ $item->code }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-lg-5 col-md-5 col-sm-5 filtered-list-search mx-auto">
                                    <input type="text" wire:model.live="search" class="w-100 form-control"
                                        id="input-search" placeholder="Rechercher un étudiant...">
                                </div>
                                <div class="col-lg-2 col-md-2 col-sm-2 text-right d-grid gap-1">
                                    <button href="javascript:void(0);"
                                        class="btn btn-dark _effect--ripple waves-effect waves-light"
                                        wire:click="addClasse()">Payer</button>
                                </div>
                            </div>
                        </div>
                        <div class="widget-content widget-content-area">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered">
                                    <thead>
                                        <tr style="text-align: center;">
                                            <th scope="col"><b>Prénom & Nom</b></th>
                                            <th scope="col"><b>Janvier</b></th>
                                            <th scope="col"><b>Fevrier</b></th>
                                            <th scope="col"><b>Mars</b></th>
                                            <th scope="col"><b>Avril</b></th>
                                            <th scope="col"><b>Mai</b></th>
                                            <th scope="col"><b>Juin</b></th>
                                            <th scope="col"><b>Juillet</b></th>
                                            <th scope="col"><b>Aout</b></th>
                                            <th scope="col"><b>Septembre</b></th>
                                            <th scope="col"><b>Octobre</b></th>
                                            <th scope="col"><b>Novembre</b></th>
                                            <th scope="col"><b>Décembre</b></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($etudiants as $item)
                                            <tr style="text-align: center;">
                                                <td>{{ $item->name }}</td>
                                                <td>300 000</td>
                                                <td>300 000</td>
                                                <td>250 000 <button wire:click="completeMontant({{-- $item->id --}})"
                                                        type="button"
                                                        class="action-btn btn btn-primary btn-view bs-tooltip me-2"
                                                        data-toggle="tooltip" data-placement="top"
                                                        aria-label="Completer le montant"
                                                        data-bs-original-title="Completer le montant">
                                                        +
                                                    </button></td>
                                                <td>test</td>
                                                <td>test</td>
                                                <td>test</td>
                                                <td>test</td>
                                                <td>test</td>
                                                <td>test</td>
                                                <td>test</td>
                                                <td>test</td>
                                                <td>test</td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td colspan="13" class="text-center">Aucun étudiant trouvé</td>
                                            </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>
                            <div class="row mt-3">
                                <div class="col-12">
                                    <div class="d-flex justify-content-end">
                                        {{-- $classes->links('pagination::bootstrap-5') --}}
                                    </div>
                                </div>
                            </div>
                        </div>


                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
