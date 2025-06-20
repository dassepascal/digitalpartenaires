<?php

use Livewire\Volt\Component;

new class extends Component {
    //
}; ?>

<div class="p-6">
    <h1 class="text-3xl font-bold mb-6">Tableau de bord de l'Agence</h1>

    <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-6 mb-8">
        <div class="bg-white p-5 rounded shadow">
            <h2 class="text-lg font-semibold text-gray-700 mb-2">Pages publiées</h2>
            <p class="text-3xl font-bold text-blue-600">42</p>
        </div>

        <div class="bg-white p-5 rounded shadow">
            <h2 class="text-lg font-semibold text-gray-700 mb-2">Pages en brouillon</h2>
            <p class="text-3xl font-bold text-yellow-500">5</p>
        </div>

        <div class="bg-white p-5 rounded shadow">
            <h2 class="text-lg font-semibold text-gray-700 mb-2">Utilisateurs actifs</h2>
            <p class="text-3xl font-bold text-green-600">12</p>
        </div>
    </div>

    <div class="bg-white p-6 rounded shadow">
        <h2 class="text-2xl font-semibold text-gray-800 mb-4">Actions rapides</h2>

        <div class="flex flex-wrap gap-4">
            <a href="{{ route('admin.parameters.pages.create') }}"
               class="px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-600 transition">
                ➕ Créer une nouvelle page
            </a>

            <a href="{{ route('admin.parameters.pages.index') }}"
               class="px-4 py-2 bg-gray-600 text-white rounded hover:bg-gray-700 transition">
                📄 Gérer les pages
            </a>
        </div>
    </div>
</div>
