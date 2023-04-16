<script>
    import { onMount } from "svelte";
    import { getMessage, postMessage } from "../../api/ApiPhp";
    import Message from "../../components/Message.svelte";
    export let params;

    let messages = []
    let userId = document.cookie.split("=")[1]

    let text = '';

    
    onMount(async () => {
        getMessage(params.id).then((data) => {
            messages = data;
        })
    })

    function handlePress(e) {
        if (e.charCode === 13) {
            addMessage()
        }
    }

    function addMessage() 
    {
        let commentaire = {
            idTrajet: params.id,
            idEtudiant: userId,
            message: text,
        }
        var form_data = new FormData();
        for (let key in commentaire ) {
            form_data.append(key, commentaire[key]);
        }
        postMessage(form_data).then((data) => {
            messages.push(commentaire)
            messages = messages
            console.log(messages)
            text = ''
        })
    }
</script>

<div class="w-8/12">
    {#each messages as message}
        <div class="flex {userId == message.idEtudiant ? "justify-end" : "justify-start"} mt-5">
            <Message message={message}/>
        </div>
    {/each}
    <br>
    <br>
    <div class="inputUser sticky flex bottom-5">
        <input placeholder="Saisissez votre message" class="w-full rounded-lg" bind:value={text} on:keypress={handlePress}>
        <button on:click={addMessage}>
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 mr-2 text-blue-400">
            <path stroke-linecap="round" stroke-linejoin="round" d="M6 12L3.269 3.126A59.768 59.768 0 0121.485 12 59.77 59.77 0 013.27 20.876L5.999 12zm0 0h7.5" />
        </svg>   
        </button>       
    </div>
</div>

<style>
    .inputUser {
        @apply border w-full border-gray-300 rounded-lg bg-white h-12 text-xl pl-4  ;
    }
</style>