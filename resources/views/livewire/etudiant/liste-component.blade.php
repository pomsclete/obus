<div>
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

                            <div class="page-title">
                            </div>

                            <nav class="breadcrumb-style-one" aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item active" aria-current="page">Liste des étudiants</li>
                                </ol>
                            </nav>

                        </div>
                    </div>
                </header>
            </div>
        </div>
        <!--  END BREADCRUMBS  -->

        <div class="row layout-spacing layout-top-spacing" id="cancel-row">
            <div id="tableStriped" class="col-lg-12 col-12 layout-spacing">
                <div class="statbox widget box box-shadow">
                    <div class="widget-header">
                        <div class="row d-flex justify-content-between mt-4">
                            <div class="col-lg-8 col-md-8 col-sm-8 filtered-list-search mx-auto">
                                <input type="text" wire:model.live="search"
                                    class="w-100 form-control product-search br-30" id="input-search"
                                    placeholder="Rechercher par téléphone ou nom ou numéro...">
                            </div>
                            <div class="col-lg-3 col-md-3 col-sm-3 text-right d-grid gap-1">
                                <button href="javascript:void(0);"
                                    class="btn btn-dark _effect--ripple waves-effect waves-light"
                                    wire:click="addEtudiant()">Ajouter un étudiant</button>
                            </div>
                        </div>
                    </div>
                    <div class="widget-content widget-content-area">
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered">
                                <thead>
                                    <tr style="text-align: center;">
                                        <th scope="col"><b>Numéro</b></th>
                                        <th scope="col"><b>Prénom & Nom</b></th>
                                        <th scope="col"><b>Téléphone</b></th>
                                        <th class="text-center" scope="col"><b>Status</b></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($etudiants as $item)
                                        <tr style="text-align: center;">
                                            <td>{{ $item->numero_etudiant }}</td>
                                            <td>{{ $item->name }}</td>
                                            <td>{{ $item->telephone }}</td>
                                            <td class="text-center">
                                                <div class="action-btns">
                                                    <a href="{{ route('etudiant.profil', base64_encode($item->id)) }}"
                                                        class="action-btn btn-view bs-tooltip me-2"
                                                        data-toggle="tooltip" data-placement="top"
                                                        aria-label="Consulter" data-bs-original-title="Consulter">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="24"
                                                            height="24" viewBox="0 0 24 24" fill="none"
                                                            stroke="currentColor" stroke-width="2"
                                                            stroke-linecap="round" stroke-linejoin="round"
                                                            class="feather feather-eye">
                                                            <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z">
                                                            </path>
                                                            <circle cx="12" cy="12" r="3"></circle>
                                                        </svg>
                                                    </a>
                                                    <a href="javascript:void(0);" wire:click="edit({{ $item->id }})"
                                                        class="action-btn btn-edit bs-tooltip me-2"
                                                        data-toggle="tooltip" data-placement="top" aria-label="Modifier"
                                                        data-bs-original-title="Modifier">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="24"
                                                            height="24" viewBox="0 0 24 24" fill="none"
                                                            stroke="currentColor" stroke-width="2"
                                                            stroke-linecap="round" stroke-linejoin="round"
                                                            class="feather feather-edit-2">
                                                            <path
                                                                d="M17 3a2.828 2.828 0 1 1 4 4L7.5 20.5 2 22l1.5-5.5L17 3z">
                                                            </path>
                                                        </svg>
                                                    </a>
                                                    <a href="javascript:void(0);"
                                                        wire:click="delete({{ $item->id }})"
                                                        wire:confirm.prompt="Etes vous sure?\n\nTaper CONFIRMER pour supprimer|CONFIRMER"
                                                        class="action-btn btn-delete bs-tooltip" data-toggle="tooltip"
                                                        data-placement="top" aria-label="Supprimer"
                                                        data-bs-original-title="Supprimer">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="24"
                                                            height="24" viewBox="0 0 24 24" fill="none"
                                                            stroke="currentColor" stroke-width="2"
                                                            stroke-linecap="round" stroke-linejoin="round"
                                                            class="feather feather-trash-2">
                                                            <polyline points="3 6 5 6 21 6"></polyline>
                                                            <path
                                                                d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2">
                                                            </path>
                                                            <line x1="10" y1="11" x2="10"
                                                                y2="17"></line>
                                                            <line x1="14" y1="11" x2="14"
                                                                y2="17"></line>
                                                        </svg>
                                                    </a>
                                                </div>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="4">
                                                <div class="text-center">Aucun étudiant n'a trouvé</div>
                                            </td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                        <div class="row mt-3">
                            <div class="col-12">
                                <div class="d-flex justify-content-end">
                                    {{ $etudiants->links('pagination::bootstrap-5') }}
                                </div>
                            </div>
                        </div>
                    </div>


                </div>
            </div>
        </div>
    </div>
    <!-- Modal --> <!-- Modal -->
    <div wire:ignore.self class="modal fade" id="addEtudiant" tabindex="-1" role="dialog"
        aria-labelledby="addContactModalTitle" aria-hidden="true" data-bs-keyboard="false"
        data-bs-backdrop="static">
        <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    @if ($showModal == false)
                        <h5 class="modal-title add-title" style="color: white" id="addContactModalTitleLabel1">
                            Enregistrer un étudiant</h5>
                    @else
                        <h5 class="modal-title edit-title" id="addContactModalTitleLabel2" style="color: white">
                            Modifier un étudiant</h5>
                    @endif

                </div>

                <div class="modal-body">
                    <div class="add-contact-box">
                        <div class="add-contact-content">
                            <form id="addContactModalTitle">
                                <div class="row">
                                    <div class="col-md-8 mb-3">
                                        <div class="contact-name">
                                            <label for="c-prenom" class="form-label text-white">Prénom & Nom</label>
                                            <input type="text" wire:model='nom_complet' id="c-prenom"
                                                class="form-control" placeholder="Prénom & Nom">
                                            @error('nom_complet')
                                                <span class="validation-text"
                                                    style="color: red">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <div class="contact-occupation">
                                            <label for="c-sexes" class="form-label text-white">Genre</label>
                                            <select class="form-control" wire:model='genre' id="c-sexes">
                                                <option value="">--Choisir le sexe--</option>
                                                <option value="Homme">Homme</option>
                                                <option value="Femme">Femme</option>
                                            </select>
                                            @error('genre')
                                                <span class="validation-text"
                                                    style="color: red">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="contact-phone">
                                            <label for="c-email" class="form-label text-white">Email</label>
                                            <input type="email" id="c-email" class="form-control"
                                                placeholder="Email" wire:model='email'>
                                            @error('email')
                                                <span class="validation-text"
                                                    style="color: red">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-md-6 mb-3">
                                        <div class="contact-phone">
                                            <label for="c-phone" class="form-label text-white">Téléphone</label>
                                            <input type="number" id="c-phone" class="form-control"
                                                placeholder="Téléphone" wire:model='telephone'>
                                            @error('telephone')
                                                <span class="validation-text"
                                                    style="color: red">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <div class="contact-occupation">
                                            <label for="c-nationalite"
                                                class="form-label text-white">Nationnalité</label>
                                            <select class="form-control" wire:model='nationnalite'
                                                id="c-nationalite">
                                                <option value="">--Choisir une nationnalité--</option>
                                                @foreach ($nationalites as $item)
                                                    <option value="{{ $item->id }}">{{ $item->libelle }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            @error('nationnalite')
                                                <span class="validation-text"
                                                    style="color: red">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="contact-phone">
                                            <label for="c-adresse" class="form-label text-white">Adresse</label>
                                            <input type="text" id="c-adresse" class="form-control"
                                                placeholder="Adresse" wire:model='adresse'>

                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="contact-phone">
                                            <label for="c-date" class="form-label text-white">Date de
                                                naissance</label>
                                            <input type="date" id="c-date" class="form-control"
                                                placeholder="Date de naissance" wire:model='date_naissance'>
                                            @error('date_naissance')
                                                <span class="validation-text"
                                                    style="color: red">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-md-6 mb-3">
                                        <div class="contact-phone">
                                            <label for="c-phone" class="form-label text-white">Lieu de
                                                naissance</label>
                                            <input type="text" id="c-phone" class="form-control"
                                                placeholder="Lieu de naissance" wire:model='lieu_naissance'>
                                            @error('lieu_naissance')
                                                <span class="validation-text"
                                                    style="color: red">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                            </form>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    @if ($showModal == false)
                        <button id="btn-add" wire:click="save()"
                            class="float-left btn btn-success">Enregistrer</button>
                    @else
                        <button id="btn-edit" wire:click="update()" class="btn btn-warning">Mettre à jour</button>
                    @endif
                    <button class="btn" wire:click="resetInput()"> <i class="flaticon-delete-1"></i>
                        Fermer la fenêtre</button>


                </div>
            </div>
        </div>
    </div>
    <!--  END MODAL  -->
    <div wire:ignore.self class="modal fade" id="addInscription" tabindex="-1" role="dialog"
        aria-labelledby="addContactModalTitle" aria-hidden="true" data-bs-keyboard="false"
        data-bs-backdrop="static">
        <div class="modal-dialog modal-md modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title add-title" style="color: white" id="addContactModalTitleLabel1">
                        Inscrire l'étudiant</h5>
                </div>

                <div class="modal-body">
                    <div class="add-contact-box">
                        <div class="add-contact-content">
                            <form id="addContactModalTitle">
                                <div class="row">
                                    <div class="col-md-12 mb-3">
                                        <div class="contact-name">
                                            <label for="classe" class="form-label text-white">Classes</label>
                                            <select wire:model="classe" id="classe" class="form-control">
                                                <option value="">-- Sélectionnez une classe --</option>
                                                @foreach ($classes as $item)
                                                    <option value="{{ $item->id }}">{{ $item->code }}</option>
                                                @endforeach
                                            </select>
                                            @error('classe')
                                                <span class="validation-text"
                                                    style="color: red">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-12 mb-3">
                                        <div class="contact-name">
                                            <label for="rentre" class="form-label text-white">La rentrée</label>
                                            <select wire:model="rentre" id="rentre" class="form-control">
                                                <option value="">-- Sélectionnez une rentrée --</option>
                                                @foreach ($rentres as $item)
                                                    <option value="{{ $item->id }}">{{ $item->titre }}</option>
                                                @endforeach
                                            </select>
                                            @error('rentre')
                                                <span class="validation-text"
                                                    style="color: red">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-12 mb-3">
                                        <div class="contact-occupation">
                                            <label for="c-sexes" class="form-label text-white">Type de
                                                finanacement</label>
                                            <select class="form-control" wire:model='type' id="c-sexes">
                                                <option value="">-- Selectionnez --</option>
                                                <option value="1">Boursier</option>
                                                <option value="0">Non boursier</option>
                                            </select>
                                            @error('type')
                                                <span class="validation-text"
                                                    style="color: red">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>


                            </form>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button id="btn-add-ins" wire:click="saveInscription()"
                        class="float-left btn btn-success">Enregistrer</button>


                </div>
            </div>
        </div>
    </div>
    <!--  END MODAL  -->
</div>


@script
    <script>
        $wire.on('hide-modal', event => {
            console.log("event-close", event);
            $('#addEtudiant').modal('hide');
        });

        $wire.on('show-modal', event => {
            console.log("event-open", event);
            $('#addEtudiant').modal('show');
        });

        // Inscription d'un étudiant
        $wire.on('close-modal', event => {
            console.log("event-close", event);
            $('#addInscription').modal('hide');
        });

        $wire.on('open-modal', event => {
            console.log("event-open", event);
            $('#addInscription').modal('show');
        });
    </script>
@endscript
