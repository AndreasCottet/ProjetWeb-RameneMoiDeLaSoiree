<script>
    import { onMount } from 'svelte';
    let selectedDate;

    function handleSubmit() {
        if (selectedDate) {
            // Utilisez l'URL souhaitée pour la page suivante
            const nextPageUrl = '/next-page';
            history.pushState(null, '', nextPageUrl);
            location.reload();
        } else {
            alert("Veuillez sélectionner une date avant de continuer.");
        }
    }
</script>

<div class="flex flex-col justify-between items-center px-3 w-96 max-w-full bg-white space-y-4">
    <div>
        <h1 class="text-center font-bold text-3xl">Quand partez-vous ?</h1>
    </div>
    <div class="bg-white shadow-md rounded-lg p-6 w-80 max-w-full">
        <div class="text-xl font-semibold mb-2">Sélectionnez une date</div>
        <input
                type="date"
                bind:value="{selectedDate}"
                class="border border-gray-300 rounded p-2 w-full focus:outline-none focus:ring"
        />
    </div>
    <button
            on:click="{handleSubmit}"
            class="bg-white text-black border border-gray-300 font-bold py-2 px-4 rounded"
    >
        Soumettre
    </button>
</div>

<style>
    input[type='date']::-webkit-calendar-picker-indicator {
        background: transparent;
        cursor: pointer;
    }
</style>
