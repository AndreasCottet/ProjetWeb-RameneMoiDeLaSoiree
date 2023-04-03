<script>
    import { onMount } from 'svelte';

    onMount(() => {
        // Ajoutez le code de montage du composant ici, si nécessaire
    });
</script>

<style>
    /* Ajoutez ici les styles spécifiques au composant, si nécessaire */
</style>

<div>
    <ul class="list-none m-0 p-0">
        <li class="mb-2">
            <a href="/user/show/5cd54d64-f7dc-4a06-b4f2-d7cdb9939345" class="flex items-center px-4 py-2 rounded hover:bg-gray-200">
        <span class="flex-grow">
          <span class="block text-lg font-semibold">Lilian</span>
          <span class="block text-sm">Habitué</span>
        </span>
                <img alt="" class="w-12 h-12 rounded-full border-2 border-white mr-2" />
                <svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" aria-hidden="true">
                    <polyline fill="none" stroke="#708C91" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10" points="9 18 15 12 9 6"></polyline>
                </svg>
            </a>
        </li>
        <li class="mb-2">
            <a href="/dashboard/profile/picture" class="block px-4 py-2 rounded text-lg font-semibold hover:bg-gray-200">Modifier la photo de profil</a>
        </li>
        <li>
            <button type="button" class="w-full text-left px-4 py-2 rounded text-lg font-semibold hover:bg-gray-200">Modifier les informations personnelles</button>
        </li>
    </ul>
</div>
