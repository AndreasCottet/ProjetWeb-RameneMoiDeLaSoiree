<script>
    import { onMount } from 'svelte';

    let email = "";
    let phoneNumber = "";
    let Prenom = "";
    let Nom = "";
    let DateDeNaissance = "";
    let Minibio = "";
    let emailError = false;
    let phoneNumberError = false;
    let minibioError = false;

    async function fetchUserData() {
        // Simuler l'obtention de données depuis une base de données externe
        const data = {
            email: "liliandocouto63@gmail.com",
            phoneNumber: "0755070088",
            Prenom: "Lilian",
            Nom: "DO COUTO",
            DateDeNaissance: "2000-02-24",
            Minibio: "Bonjour, je suis nouveau, je pense être agréable, j'aime bien parler bien que je ne mène pas forcément la conversation.",
        };

        email = data.email;
        phoneNumber = data.phoneNumber;
        Prenom = data.Prenom;
        Nom = data.Nom;
        DateDeNaissance = data.DateDeNaissance;
        Minibio = data.Minibio;
    }

    onMount(() => {
        fetchUserData();
    });

    function saveChanges() {
        // Implémentez la logique pour enregistrer les modifications dans la base de données externe
    }

    // function validateField(id) {
    //     const input = document.getElementById(id);
    //  if (id === 'email') {
    //     emailError = !input.validity.valid;
    //     }
    //     else if (id === 'phoneNumber') {
    //         phoneNumberError = !input.validity.valid;
    //     } else if (id === 'Minibio') {
    //         minibioError = input.value.length > 500;
    //     }
    // }
</script>

<style>
    .kirk-item {
        margin-bottom: 1rem;
    }
    .kirk-item span:first-child {
        font-weight: bold;
        margin-right: 1rem;
    }
    .error {
        color: red;
        font-size: 0.8rem;
    }
    .minibio-container {
        display: flex;
        flex-direction: column;
    }
    .minibio-container span {
        margin-bottom: 0.5rem;
    }
    .section-content {
        max-width: 600px;
        margin: 0 auto;
        padding: 1rem;
        background-color: #f8f8f8;
        border-radius: 5px;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    }
    textarea {
        border: 1px solid #ccc;
        border-radius: 5px;
        padding: 0.5rem;
    }
    button {
        margin-top: 1rem;
    }

    input {
        @apply border rounded px-2 py-1;
    }

</style>

<div class="section-content">
    <h1 class="text-2xl font-semibold mb-4">Informations personnelles</h1>
    <div class="kirk-item">
        <span>Prénom</span>
        <input type="text" id="Prenom" value={Prenom} />
    </div>
    <div class="kirk-item">
        <span>Nom</span>
        <input type="text" id="Nom" value={Nom} />
    </div>
    <div class="kirk-item">
        <span>Date de naissance</span>
        <input type="date" id="DateDeNaissance" value={DateDeNaissance} />
    </div>
    <div class="kirk-item">
        <span>E-mail</span>
        <input type="email" id="email" value={email} required />
        {#if emailError}
            <p class="error">Veuillez entrer une adresse e-mail valide.</p>
        {/if}
    </div>
    <div class="kirk-item">
        <span>Numéro de téléphone</span>
        <input type="tel" id="phoneNumber" value={phoneNumber} pattern="[0-9][0-9][0-9][0-9][0-9][0-9][0-9][0-9][0-9][0-9]" on:input={() => validateField('phoneNumber')} required />
        {#if phoneNumberError}
            <p class="error">Veuillez entrer un numéro de téléphone valide (format: 0755070088).</p>
        {/if}
    </div>
    <div class="kirk-item">
        <div class="minibio-container">
            <span>Minibio</span>
            <textarea id="Minibio" rows="4" cols="50" on:input={() => validateField('Minibio')}>{Minibio}
            </textarea>
        </div>
        {#if minibioError}
            <p class="error">La Minibio ne doit pas dépasser 500 caractères.</p>
        {/if}
    </div>
    <button type="button" on:click={saveChanges} class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
        Modifier
    </button>
</div>

