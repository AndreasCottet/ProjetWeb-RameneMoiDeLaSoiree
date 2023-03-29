<script>
    let selectedHour = "00";
    let selectedMinute = "00";

    const hours = Array.from({ length: 24 }, (_, i) => (i < 10 ? `0${i}` : `${i}`));
    const minutes = Array.from({ length: 60 }, (_, i) => (i < 10 ? `0${i}` : `${i}`));

    function handleSubmit() {
        // Utilisez l'URL souhaitée pour la page suivante
        const nextPageUrl = '/next-page';
        history.pushState(null, '', nextPageUrl);
        location.reload();
    }
</script>

<div class="flex flex-col justify-center items-center bg-white shadow-md rounded-lg p-6 w-80 max-w-full">
    <div class="text-xl font-semibold mb-2">Sélectionnez une heure</div>
    <div class="flex items-center">
        <div class="relative">
            <select
                    bind:value="{selectedHour}"
                    class="block appearance-none w-16 bg-white border border-gray-300 text-gray-700 py-2 px-2 rounded leading-tight focus:outline-none focus:bg-white"
            >
                {#each hours as hour}
                    <option value="{hour}">{hour}</option>
                {/each}
            </select>
        </div>
        <span class="mx-1 text-gray-700">:</span>
        <div class="relative">
            <select
                    bind:value="{selectedMinute}"
                    class="block appearance-none w-16 bg-white border border-gray-300 text-gray-700 py-2 px-2 rounded leading-tight focus:outline-none focus:bg-white"
            >
                {#each minutes as minute}
                    <option value="{minute}">{minute}</option>
                {/each}
            </select>
        </div>
    </div>
    <button
            on:click="{handleSubmit}"
            class="bg-white text-black border border-gray-300 font-bold py-2 px-4 rounded mt-4"
    >
        Soumettre
    </button>
</div>
