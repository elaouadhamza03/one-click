{{-- Dashboard --}}
<x-backpack::menu-item title="Dashboard" icon="la la-home" :link="backpack_url('dashboard')" />

{{-- Gestion des devis --}}
<x-backpack::menu-item title="Devis" icon="la la-file-text" :link="backpack_url('quote')" />

{{-- Gestion des services --}}
<x-backpack::menu-item title="Services" icon="la la-cogs" :link="backpack_url('service')" />

{{-- Gestion des réalisations --}}
<x-backpack::menu-item title="Réalisations" icon="la la-folder" :link="backpack_url('project')" />

{{-- Paramètres du site --}}
<x-backpack::menu-item title="Paramètres" icon="la la-cog" :link="backpack_url('setting')" />


