
<script>
    import { getZone } from "../api/ApiPhp";

    export let name = 'start';
    export let barretour = 'finish';
    let selectedZone = '';
    let address = '';
    let errorMessage = '';

    let zones = [
        ''
    ];

    getZone().then((data) => {
        zones = data;
    });

    function handleSubmit() {
        if (zones.includes(selectedZone) && address.trim()) {
            // Naviguez vers la page suivante
            const nextPageUrl = '/next-page';
            history.pushState(null, '', nextPageUrl);
            location.reload();
        } else {
            errorMessage = 'Veuillez entrer une adresse et sélectionner une zone valide.';
        }
    }


</script>

<div class="rounded-lg px-3 w-96 bg-white">
    <div>
        <h1 class="text-center font-bold text-3xl">{name}</h1>
    </div>
    <div>
        <input
                bind:value="{address}"
                class="border border-gray-300 rounded p-2 w-full focus:outline-none focus:ring"
                type="text"
                placeholder="{barretour}"
        />
        <div>
            <select
                    bind:value="{selectedZone}"
                    class="w-full bg-white border border-gray-300 text-gray-700 py-2 px-4 rounded leading-tight focus:outline-none focus:bg-white"
            >
                <option value="">Sélectionner une zone</option>
                {#each zones as zone}
                    <option value="{zone}">{zone.NOM}</option>
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
