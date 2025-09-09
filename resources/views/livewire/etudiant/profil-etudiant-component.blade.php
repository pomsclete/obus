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
                                    <li class="breadcrumb-item active" aria-current="page">
                                        <strong class="fs-4">{{ $info->name }}</strong>
                                    </li>
                                </ol>
                            </nav>

                        </div>
                    </div>
                </header>
            </div>
        </div>
        <!--  END BREADCRUMBS  -->
        <!-- Account page navigation-->
        <nav class="nav nav-borders px-4 mt-4">
            <a class="nav-link {{ $view == 0 ? 'active' : '' }}  ms-0" href="javascript:void(0);" wire:click="ChangeView(0)" >Profile</a>
            <a class="nav-link {{ $view == 1 ? 'active' : '' }}" href="javascript:void(0);" wire:click="ChangeView(1)">Finances</a>
            <a class="nav-link" href="" target="__blank">Security</a>
            <a class="nav-link" href=""  target="__blank">Notifications</a>
        </nav>
        <hr class="mt-0 mb-4">
       {{-- les composants dynamiques --}}
            @if ($view == 1)
                 <livewire:etudiant.profil-component :etudiant="$etudiant" :annee="$annee->id">
           @else
                 <livewire:etudiant.mensualite-component :etudiant="$etudiant" :annee="$annee->id">
            @endif
    </div>
</div>

