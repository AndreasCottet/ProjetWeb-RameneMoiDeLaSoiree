
<script>
    export let name = 'start';
    export let barretour = 'finish';
    let selectedZone = '';
    let address = '';
    let errorMessage = '';

    const predefinedZones = [
        'Zone 1',
        'Zone 2',
        'Zone 3',
        // Ajoutez plus de zones prédéfinies ici
    ];

    function handleSubmit() {
        if (predefinedZones.includes(selectedZone) && address.trim()) {
            // Naviguez vers la page suivante
            const nextPageUrl = '/next-page';
            history.pushState(null, '', nextPageUrl);
            location.reload();
        } else {
            errorMessage = 'Veuillez entrer une adresse et sélectionner une zone valide.';
        }
    }


</script>

<div class="flex flex-col justify-between border items-center px-3 w-96 max-w-full bg-white space-y-4">
    <div>
        <h1 class="text-center font-bold text-3xl">  {name} </h1>
    </div>
    <div class="flex flex-col w-full space-y-2">
        <input
                bind:value="{address}"
                class="border border-gray-300 rounded p-2 w-full focus:outline-none focus:ring"
                type="text"
                placeholder="{barretour}"
        />
        <div class="relative">
            <select
                    bind:value="{selectedZone}"
                    class="block appearance-none w-full bg-white border border-gray-300 text-gray-700 py-2 px-4 rounded leading-tight focus:outline-none focus:bg-white"
            >
                <option value="">Sélectionner une zone</option>
                {#each predefinedZones as zone}
                    <option value="{zone}">{zone}</option>
                {/each}
            </select>
        </div>
        <button
                on:click="{handleSubmit}"
                class="bg-white border border-gray-300 cursor-pointer text-gray-700 font-semibold text-lg py-2 px-4 rounded w-full mt-2"
                type="submit"
        >
            Déposer
        </button>
        {#if errorMessage}
            <div class="text-red-600 font-semibold">{errorMessage}</div>
        {/if}
    </div>
</div>
