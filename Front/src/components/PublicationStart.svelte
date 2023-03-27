<script>
    let selectedZone = '';
    let errorMessage = '';

    const predefinedZones = [
        'Zone 1',
        'Zone 2',
        'Zone 3',
        // Ajoutez plus de zones prédéfinies ici
    ];

    function handleSubmit() {
        if (predefinedZones.includes(selectedZone)) {
            // Naviguez vers la page suivante
            const nextPageUrl = '/next-page';
            history.pushState(null, '', nextPageUrl);
            location.reload();
        } else {
            errorMessage = 'Veuillez sélectionner une zone valide.';
        }
    }
</script>

<div class="flex flex-col justify-between items-center px-3 w-96 max-w-full bg-white space-y-4">
    <div>
        <h1 class="text-center font-bold text-3xl">D'où partez-vous ?</h1>
    </div>
    <div class="search-bar flex justify-between items-center border border-gray-300 rounded-full px-3 w-full bg-white">
        <img class="w-6 h-6" src="src/assets/loupe.png" alt="Loupe" />
        <input
                bind:value="{selectedZone}"
                class="bg-white text-black flex-grow outline-none border-none pl-3"
                type="text"
                placeholder="Ecrire adresse de départ..."
        />
        <button
                on:click="{handleSubmit}"
                class="bg-white border-none cursor-pointer text-gray-300 font-semibold text-lg ml-2"
                type="submit"
        >
            <p>Déposer</p>
        </button>
    </div>
    {#if errorMessage}
        <div class="text-red-600 font-semibold">{errorMessage}</div>
    {/if}
</div>
