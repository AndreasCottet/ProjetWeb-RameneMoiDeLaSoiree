<script>


    let email = "liliandocouto63@gmail.com";
    let phoneNumber = "0755070088";
    let Prenom = "Lilian";
    let Nom = "DO COUTO";
    let Sexe = "Homme";
    let DateDeNaissance = "24/02/2000";
    let Minibio = "Bonjour, je suis nouveau, je pense être agréable, j'aime bien parler bien que je ne mène pas forcément la conversation.";
    let emailError = false;
    let phoneNumberError = false;
    let minibioError = false;

    function saveChanges() {
        const emailInput = document.getElementById('email');
        const phoneNumberInput = document.getElementById('phoneNumber');

        emailError = !emailInput.validity.valid;
        phoneNumberError = !phoneNumberInput.validity.valid;

        if (!emailError && !phoneNumberError) {
            email = emailInput.value;
            phoneNumber = phoneNumberInput.value;
            Prenom = document.getElementById('Prenom').value;
            Nom = document.getElementById('Nom').value;
            Sexe = document.getElementById('Sexe').value;
            DateDeNaissance = document.getElementById('DateDeNaissance').value;
            Minibio = document.getElementById('Minibio').value;
        }
    }
        function validateField(id) {
            const input = document.getElementById(id);
            if (id === 'phoneNumber') {
                phoneNumberError = !input.validity.valid;
            } else if (id === 'Minibio') {
                minibioError = input.value.length > 500;
            } else if (id === 'email') {
                emailError = !input.validity.valid;
            }
        }
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
</style>

<div class="section-content">
    <h1 class="text-2xl font-semibold mb-4">Informations personnelles</h1>
    <div class="kirk-item">
        <span>Prénom</span>
        <input type="text" id="Prenom" value={Prenom} class="border rounded px-2 py-1" />
    </div>
    <div class="kirk-item">
        <span>Nom</span>
        <input type="text" id="Nom" value={Nom} class="border rounded px-2 py-1" />
    </div>
    <div class="kirk-item">
        <span>Sexe</span>
        <select id="Sexe" value={Sexe} class="border rounded px-2 py-1">
            <option>Homme</option>
            <option>Femme</option>
        </select>
</div>
    <div class="kirk-item">
        <span>Date de naissance</span>
        <input type="date" id="DateDeNaissance" value={DateDeNaissance} class="border rounded px-2 py-1" />
</div>
        <div class="kirk-item">
            <span>E-mail</span>
            <input type="email" id="email" value={email} class="border rounded px-2 py-1" required />
            {#if emailError}
                <p class="error">Veuillez entrer une adresse e-mail valide.</p>
            {/if}
        </div>
    <div class="kirk-item">
        <span>Numéro de téléphone</span>
        <input type="tel" id="phoneNumber" value={phoneNumber} pattern="[0-9][0-9][0-9][0-9][0-9][0-9][0-9][0-9][0-9][0-9]" class="border rounded px-2 py-1" on:input={() => validateField('phoneNumber')} required />
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


