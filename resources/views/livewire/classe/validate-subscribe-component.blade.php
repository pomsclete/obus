<div>
    <div class="row layout-spacing layout-top-spacing" id="cancel-row">
        <div id="tableStriped" class="col-lg-12 col-12 layout-spacing">
            <div class="statbox widget box box-shadow border border-success">
                <div class="widget-header">
                    <div class="row d-flex justify-content-center mt-4">
                        <div class="col-lg-8 col-md-8 col-sm-8 filtered-list-search mx-auto">
                            <input type="text" wire:model.live="search"
                                class="w-100 form-control product-search br-30 border border-success" id="input-search"
                                placeholder="Rechercher par nom ou numéro et par classe...">
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
                                    <th scope="col"><b>Classe</b></th>
                                    <th scope="col"><b>Status</b></th>
                                    <th class="text-center" scope="col"><b>Action</b></th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($waits as $item)
                                    <tr style="text-align: center;">
                                        <td>{{ $item->numero_etudiant }} @if ($item->boursier == 1)
                                                <span class="badge badge-success">Boursier</span>
                                            @else
                                                <span class="badge badge-danger">Non Boursier</span>
                                            @endif
                                        </td>
                                        <td>{{ $item->name }}</td>
                                        <td>{{ $item->code }}</td>
                                        <td>{!! $this->verifyMontant($item->id) !!}</td>
                                        <td class="text-center">
                                            <div class="action-btns">
                                                @if ($this->getMontantDepot($item->id) < $this->getMontantInscription($item->id)->montant_ins)
                                                    <button wire:click="completeMontant({{ $item->id }})"
                                                        type="button"
                                                        class="action-btn btn btn-primary btn-view bs-tooltip me-2"
                                                        data-toggle="tooltip" data-placement="top"
                                                        aria-label="Ajouter le montant à verser"
                                                        data-bs-original-title="Ajouter le montant à verser">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="24"
                                                            height="24" viewBox="0 0 24 24" fill="none"
                                                            stroke="currentColor" stroke-width="2"
                                                            stroke-linecap="round" stroke-linejoin="round"
                                                            class="feather feather-corner-right-up">
                                                            <polyline points="10 9 15 4 20 9"></polyline>
                                                            <path d="M4 20h7a4 4 0 0 0 4-4V4"></path>
                                                        </svg>
                                                    </button>
                                                @endif
                                                <button wire:click="generatePDF()" type="button"
                                                    class="action-btn btn btn-dark btn-view bs-tooltip me-2"
                                                    data-toggle="tooltip" data-placement="top"
                                                    aria-label="Imprimer la facture"
                                                    data-bs-original-title="Imprimer la facture">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24"
                                                        height="24" viewBox="0 0 24 24" fill="none"
                                                        stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                                        stroke-linejoin="round" class="feather feather-printer">
                                                        <polyline points="6 9 6 2 18 2 18 9"></polyline>
                                                        <path
                                                            d="M6 18H4a2 2 0 0 1-2-2v-5a2 2 0 0 1 2-2h16a2 2 0 0 1 2 2v5a2 2 0 0 1-2 2h-2">
                                                        </path>
                                                        <rect x="6" y="14" width="12" height="8"></rect>
                                                    </svg>
                                                </button>
                                                <button wire:click="confirmAnnule({{ $item->id }})" type="button"
                                                    class="action-btn btn btn-danger btn-view bs-tooltip me-2 text-white"
                                                    data-toggle="tooltip" data-placement="top"
                                                    aria-label="Marquer comme abandonné"
                                                    data-bs-original-title="Marquer comme abandonné">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24"
                                                        height="24" viewBox="0 0 24 24" fill="none"
                                                        stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                                        stroke-linejoin="round" class="feather feather-slash">
                                                        <circle cx="12" cy="12" r="10"></circle>
                                                        <line x1="4.93" y1="4.93" x2="19.07"
                                                            y2="19.07"></line>
                                                    </svg>
                                                </button>
                                            </div>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="5">
                                            <div class="text-center">No data found</div>
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                    <div class="row mt-3">
                        <div class="col-12">
                            <div class="d-flex justify-content-end">
                                {{ $waits->links('pagination::bootstrap-5') }}
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <div wire:ignore.self class="modal fade" id="addMontant" tabindex="-1" role="dialog"
        aria-labelledby="addContactModalTitle" aria-hidden="true" data-bs-keyboard="false" data-bs-backdrop="static">
        <div class="modal-dialog modal-md modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title add-title" style="color: white" id="addContactModalTitleLabel1">
                        Completer le montant à verser</h5>
                </div>

                <div class="modal-body">
                    <div class="add-contact-box">
                        <div class="add-contact-content">
                            <form id="addContactModalTitle">
                                <div class="row">

                                    <div class="col-md-12 mb-3">
                                        <div class="contact-occupation">
                                            <label for="c-sexes" class="form-label text-white">Mode de
                                                paiement</label>
                                            <select class="form-control" wire:model.live='mode_paiement'
                                                id="c-sexes">
                                                <option value="">-- Selectionnez --</option>
                                                @foreach ($modes as $mode)
                                                    <option value="{{ $mode->id }}">{{ $mode->libelle }}</option>
                                                @endforeach
                                            </select>
                                            @error('mode_paiement')
                                                <span class="validation-text"
                                                    style="color: red">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    @if ($just)
                                        <div class="col-md-12 mb-3">
                                            <div class="contact-occupation">
                                                <label for="c-cheque" class="form-label text-white">Numero</label>
                                                <input type="text" class="form-control" wire:model='numero'
                                                    id="c-cheque">
                                            </div>
                                        </div>
                                    @endif
                                    <div class="col-md-12 mb-3">
                                        <div class="contact-occupation">
                                            <label for="c-sexes" class="form-label text-white">Montant
                                                Restant</label>
                                            <input type="number" class="form-control" wire:model='montant'
                                                id="c-montant">
                                            @error('montant')
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
                    <button id="btn-add-ins" wire:click="closeModal()"
                        class="float-left btn btn-default">Fermer</button>
                    <button id="btn-add-ins" wire:click="saveInscription()"
                        class="float-left btn btn-success">Enregistrer</button>


                </div>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div wire:ignore.self class="modal fade" id="confirmModal" tabindex="-1" role="dialog"
        aria-labelledby="addContactModalTitle" aria-hidden="true" data-bs-keyboard="false"
        data-bs-backdrop="static">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" style="color: white" id="exampleModalLabel">Confirmation d'annulation
                        d'inscription</h5>
                    <button type="button" class="btn-close" wire:click="closeModalConfirm()" aria-label="Close">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                            fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round" class="feather feather-x">
                            <line x1="18" y1="6" x2="6" y2="18"></line>
                            <line x1="6" y1="6" x2="18" y2="18"></line>
                        </svg>
                    </button>
                </div>
                <div class="modal-body">
                    <p class="modal-text text-white">Voulez-vous vraiment annuler l'inscription de l'étudiant ?</p>
                    </p>
                </div>
                <div class="modal-footer">
                    <button class="btn btn btn-light-dark" wire:click="closeModalConfirm()"><i
                            class="flaticon-cancel-12"></i>
                        Annuler</button>
                    <button type="button" wire:click="annuleIns()" class="btn btn-primary">Confirmer</button>
                </div>
            </div>
        </div>
    </div>
</div>
@script
    <script>
        $wire.on('hide-modal', event => {
            console.log("event-close", event);
            $('#confirmModal').modal('hide');
        });

        $wire.on('show-modal', event => {
            console.log("event-open", event);
            $('#confirmModal').modal('show');
        });
        // Bourse etude
        $wire.on('close-modal', event => {
            console.log("event-close", event);
            $('#addMontant').modal('hide');
        });

        $wire.on('open-modal', event => {
            console.log("event-open", event);
            $('#addMontant').modal('show');
        });
    </script>
@endscript
