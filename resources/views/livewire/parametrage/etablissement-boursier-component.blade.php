@push('styles')
    <link href="{{ asset('src/assets/css/light/apps/invoice-preview.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('src/assets/css/dark/apps/invoice-preview.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('src/assets/css/light/components/list-group.css') }}" rel="stylesheet" type="text/css">
    <link rel="stylesheet" type="text/css" href="{{ asset('src/assets/css/light/widgets/modules-widgets.css') }}">
    <style>
        .form-control:disabled:not(.flatpickr-input),
        .form-control[readonly]:not(.flatpickr-input) {
            background-color: #f1f2f3;
            cursor: no-drop;
            color: #b40b0b;
            font-weight: 900;
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
                                        <li class="breadcrumb-item active" aria-current="page">Etablissements boursiers
                                        </li>
                                    </ol>
                                </nav>

                            </div>
                        </div>

                        <ul class="navbar-nav flex-row ms-auto breadcrumb-action-dropdown">
                            <li class="nav-item more-dropdown">
                                <div class="dropdown  custom-dropdown-icon">
                                    <a class="btn btn-info" href="{{ route('parametrage') }}">
                                        <span>Paramétrage</span>
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                            stroke-linecap="round" stroke-linejoin="round"
                                            class="feather feather-settings">
                                            <circle cx="12" cy="12" r="3"></circle>
                                            <path
                                                d="M19.4 15a1.65 1.65 0 0 0 .33 1.82l.06.06a2 2 0 0 1 0 2.83 2 2 0 0 1-2.83 0l-.06-.06a1.65 1.65 0 0 0-1.82-.33 1.65 1.65 0 0 0-1 1.51V21a2 2 0 0 1-2 2 2 2 0 0 1-2-2v-.09A1.65 1.65 0 0 0 9 19.4a1.65 1.65 0 0 0-1.82.33l-.06.06a2 2 0 0 1-2.83 0 2 2 0 0 1 0-2.83l.06-.06a1.65 1.65 0 0 0 .33-1.82 1.65 1.65 0 0 0-1.51-1H3a2 2 0 0 1-2-2 2 2 0 0 1 2-2h.09A1.65 1.65 0 0 0 4.6 9a1.65 1.65 0 0 0-.33-1.82l-.06-.06a2 2 0 0 1 0-2.83 2 2 0 0 1 2.83 0l.06.06a1.65 1.65 0 0 0 1.82.33H9a1.65 1.65 0 0 0 1-1.51V3a2 2 0 0 1 2-2 2 2 0 0 1 2 2v.09a1.65 1.65 0 0 0 1 1.51 1.65 1.65 0 0 0 1.82-.33l.06-.06a2 2 0 0 1 2.83 0 2 2 0 0 1 0 2.83l-.06.06a1.65 1.65 0 0 0-.33 1.82V9a1.65 1.65 0 0 0 1.51 1H21a2 2 0 0 1 2 2 2 2 0 0 1-2 2h-.09a1.65 1.65 0 0 0-1.51 1z">
                                            </path>
                                        </svg>
                                    </a>
                                </div>
                            </li>
                        </ul>

                    </header>
                </div>
            </div>
            <!--  END BREADCRUMBS  -->

            <div class="row invoice layout-top-spacing layout-spacing">
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">

                    <div class="doc-container">

                        <div class="row">
                            <div class="col-xl-4">

                                <div class="invoice-actions-btn">
                                    <div class="row mb-3">
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label for="type">Type d'établissement boursier</label>
                                                <select wire:model="type" class="form-control" id="type">
                                                    <option value="">--Selectionnez--</option>
                                                    <option value="normal">Normale</option>
                                                    <option value="dérogation">Dérogation</option>
                                                </select>
                                            </div>
                                            <div>
                                                @error('type')
                                                    <small
                                                        style="color: red;padding: 5px 0 5px 0">{{ $message }}</small>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label for="input-search">Libellé de l'établissement boursier</label>
                                                <input type="text" wire:model="libelle" class="form-control">
                                            </div>
                                            <div>
                                                @error('libelle')
                                                    <small
                                                        style="color: red;padding: 5px 0 5px 0">{{ $message }}</small>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-12 mt-3">
                                            <div class="d-grid gap-2">
                                                <button wire:click="save()"
                                                    class="btn {{ $editMode ? 'btn-warning' : 'btn-dark' }}  fw-bold todo-list-add-btn"
                                                    wire:loading.attr="disabled">{{ $editMode ? 'Mettre à jour' : 'Enregistrer' }}</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <div class="col-xl-8">

                                <div class="statbox widget box box-shadow">
                                    <div class="widget-header">
                                        <div class="row d-flex justify-content-between mt-4">
                                            <div class="col-lg-12 col-md-12 col-sm-12 filtered-list-search mx-auto">
                                                <input type="text" wire:model.live="search"
                                                    class="w-100 form-control product-search br-30" id="input-search"
                                                    placeholder="Rechercher par libelle">
                                            </div>

                                        </div>
                                    </div>
                                    <div class="widget-content widget-content-area">
                                        <div class="table-responsive">
                                            <table class="table table-striped table-bordered">
                                                <thead>
                                                    <tr style="text-align: center;">
                                                        <th scope="col"><b>Libellé établissement</b></th>
                                                        <th scope="col"><b>Type</b></th>
                                                        <th class="text-center" scope="col"><b>Actions</b></th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <!--[if BLOCK]><![endif]-->
                                                    @forelse($etats as $item)
                                                        <tr style="text-align: center;">
                                                            <td>{{ $item->nomEtablissement }}</td>
                                                            <td>{{ $item->typeEtablissement }}</td>
                                                            <td class="text-center">
                                                                <div class="action-btns">
                                                                    <a href="javascript:void(0);"
                                                                        wire:click="edit({{ $item->id }})"
                                                                        class="action-btn btn-edit bs-tooltip me-2"
                                                                        data-toggle="tooltip" data-placement="top"
                                                                        aria-label="Modifier"
                                                                        data-bs-original-title="Modifier">
                                                                        <svg xmlns="http://www.w3.org/2000/svg"
                                                                            width="24" height="24"
                                                                            viewBox="0 0 24 24" fill="none"
                                                                            stroke="currentColor" stroke-width="2"
                                                                            stroke-linecap="round"
                                                                            stroke-linejoin="round"
                                                                            class="feather feather-edit-2">
                                                                            <path
                                                                                d="M17 3a2.828 2.828 0 1 1 4 4L7.5 20.5 2 22l1.5-5.5L17 3z">
                                                                            </path>
                                                                        </svg>
                                                                    </a>
                                                                    <a href="javascript:void(0);"
                                                                        wire:click="delete({{ $item->id }})"
                                                                        wire:confirm.prompt="Etes vous sure?\n\nTaper CONFIRMER pour supprimer|CONFIRMER"
                                                                        class="action-btn btn-delete bs-tooltip"
                                                                        data-toggle="tooltip" data-placement="top"
                                                                        aria-label="Supprimer"
                                                                        data-bs-original-title="Supprimer">
                                                                        <svg xmlns="http://www.w3.org/2000/svg"
                                                                            width="24" height="24"
                                                                            viewBox="0 0 24 24" fill="none"
                                                                            stroke="currentColor" stroke-width="2"
                                                                            stroke-linecap="round"
                                                                            stroke-linejoin="round"
                                                                            class="feather feather-trash-2">
                                                                            <polyline points="3 6 5 6 21 6"></polyline>
                                                                            <path
                                                                                d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2">
                                                                            </path>
                                                                            <line x1="10" y1="11"
                                                                                x2="10" y2="17"></line>
                                                                            <line x1="14" y1="11"
                                                                                x2="14" y2="17"></line>
                                                                        </svg>
                                                                    </a>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                    @empty
                                                        <tr style="text-align: center;">
                                                            <td colspan="3">
                                                                Aucun acte trouvé
                                                            </td>
                                                        </tr>
                                                    @endforelse
                                                    <!--[if ENDBLOCK]><![endif]-->
                                                </tbody>
                                            </table>
                                        </div>
                                        <div class="row mt-3">
                                            <div class="col-12">
                                                <div class="d-flex justify-content-end">
                                                    {{ $etats->links('pagination::bootstrap-5') }}
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

        </div>

    </div>
</div>
