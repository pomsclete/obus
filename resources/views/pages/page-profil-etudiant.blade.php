@section('title', 'Profil étudiant')
<x-app-layout>
    <livewire:etudiant.profil-etudiant-component :etudiant="!empty($etudiant) ? $etudiant : ''">
</x-app-layout>
