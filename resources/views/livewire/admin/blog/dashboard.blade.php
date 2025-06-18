<div class="p-6">
    <h1 class="text-3xl font-bold mb-6">Tableau de bord Blog</h1>

    <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-6 mb-8">
        <div class="bg-white shadow rounded-lg p-5">
            <h2 class="text-lg font-semibold mb-2">Articles publiés</h2>
            <p class="text-3xl font-bold text-green-600">128</p>
        </div>

        <div class="bg-white shadow rounded-lg p-5">
            <h2 class="text-lg font-semibold mb-2">Brouillons</h2>
            <p class="text-3xl font-bold text-yellow-500">7</p>
        </div>

        <div class="bg-white shadow rounded-lg p-5">
            <h2 class="text-lg font-semibold mb-2">Commentaires en attente</h2>
            <p class="text-3xl font-bold text-red-600">3</p>
        </div>
    </div>

    <div class="bg-white shadow rounded-lg p-6">
        <h2 class="text-2xl font-semibold mb-4">Actions rapides</h2>
        <div class="flex flex-col sm:flex-row gap-4">
            <a href="{{ route('admin.blog.posts.create') }}"
               class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700 transition">
                ➕ Nouvel article
            </a>
            <a href="{{ route('admin.blog.comments.index') }}"
               class="px-4 py-2 bg-gray-600 text-white rounded hover:bg-gray-700 transition">
                💬 Gérer les commentaires
            </a>
        </div>
    </div>
</div>
