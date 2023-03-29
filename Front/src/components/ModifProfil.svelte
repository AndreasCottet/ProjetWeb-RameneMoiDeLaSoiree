<script>
    let email = '';
    let phoneNumber = '';
    let errorMessage = '';

    function handleSubmit() {
        if (email.trim() === '' || phoneNumber.trim() === '') {
            errorMessage = 'Veuillez remplir tous les champs.';
        } else {
            // Mettez à jour les informations de l'utilisateur et naviguez vers la page suivante
            const nextPageUrl = '/next-page';
            history.pushState(null, '', nextPageUrl);
            location.reload();
        }
    }
</script>

<div class="flex flex-col justify-between items-center px-3 w-96 max-w-full bg-white space-y-4">
    <div>
        <h1 class="text-center font-bold text-3xl mb-6">Modifier le profil</h1>
    </div>
    <div class="flex flex-col w-full space-y-2">
        <label class="font-semibold" for="email">Adresse e-mail :</label>
        <input
                bind:value="{email}"
                id="email"
                class="border border-gray-300 rounded p-2 w-full focus:outline-none focus:ring focus:border-yellow-300"
                type="email"
                placeholder="Email"
        />
        <label class="font-semibold" for="phone">Numéro de téléphone :</label>
        <input
                bind:value="{phoneNumber}"
                id="phone"
                class="border border-gray-300 rounded p-2 w-full focus:outline-none focus:ring focus:border-yellow-300"
                type="tel"
                placeholder="Numéro de téléphone"
        />
    </div>
    <div class="mt-4">
        <button
                on:click="{handleSubmit}"
                class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded w-full"
                type="submit"
        >
            Enregistrer
        </button>
    </div>
    {#if errorMessage}
        <div class="text-red-600 font-semibold mt-2">{errorMessage}</div>
    {/if}
</div>
