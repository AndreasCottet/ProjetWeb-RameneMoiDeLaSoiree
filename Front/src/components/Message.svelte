<script>
    import { onMount } from "svelte/internal";
    import { getUser } from "../api/ApiPhp";

    export let message = {
        'idTrajet': '',
        'idEtudiant': '',
        'message': ''
    }
    let etudiant = {
        prenom: ''
    }

    let userId = document.cookie.split("=")[1]


    onMount(async () => {
        getUser(message.idEtudiant).then((data) => {
            etudiant = data[0]
        })
    })
</script>


<div class="shadow-md rounded-2xl w-2/6 {userId == etudiant.id ? "bg-blue-400 text-white" : "bg-gray-200"} text-left px-5 pt-2 pb-4">
    <h1 class="font-semibold text-lg ">{etudiant.prenom}</h1>
    <p>{message.message}</p>
</div>

