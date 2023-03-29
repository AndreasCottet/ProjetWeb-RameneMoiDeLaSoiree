<script>
    let numberOfPassengers = 0;
    let errorMessage = '';

    function handleSubmit() {
        if (numberOfPassengers >= 0 && numberOfPassengers <= 4) {
            // Naviguez vers la page suivante
            const nextPageUrl = '/next-page';
            history.pushState(null, '', nextPageUrl);
            location.reload();
        } else {
            errorMessage = 'Veuillez entrer un nombre de passagers valide (entre 0 et 4).';
        }
    }
</script>

<div class="flex flex-col justify-between items-center px-3 w-96 max-w-full bg-white space-y-4">
    <div>
        <h1 class="text-center font-bold text-3xl">Combien de passagers ?</h1>
    </div>
    <div class="flex flex-col w-full space-y-2">
        <input
                bind:value="{numberOfPassengers}"
                class="border border-gray-300 rounded p-2 w-full focus:outline-none focus:ring"
                type="number"
                min="0"
                max="4"
                placeholder="Nombre de passagers"
        />
        <button
                on:click="{handleSubmit}"
                class="bg-white border border-gray-300 cursor-pointer text-gray-700 font-semibold text-lg py-2 px-4 rounded w-full mt-2"
                type="submit"
        >
            Valider
        </button>
        {#if errorMessage}
            <div class="text-red-600 font-semibold">{errorMessage}</div>
        {/if}
    </div>
</div>
