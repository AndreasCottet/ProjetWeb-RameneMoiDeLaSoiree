<script>
    import { onMount } from 'svelte';

    let messages = [];
    let selectedMessage = null;
    let messageContent = '';

    async function fetchMessages() {
        // Simuler l'obtention de données depuis une base de données externe
        const data = [
            {
                id: 1,
                sender: "Lilian",
                content: "Salut, comment ça va ?",
                timestamp: "2023-04-05T10:30:00",
            },
            {
                id: 2,
                sender: "Emma",
                content: "Coucou, tu fais quoi ce soir ?",
                timestamp: "2023-04-05T11:45:00",
            },
            {
                id: 3,
                sender: "Lucas",
                content: "On se retrouve à 14h ?",
                timestamp: "2023-04-05T12:15:00",
            },
        ];

        messages = data;
    }

    onMount(() => {
        fetchMessages();
    });

    function openChat(message) {
        selectedMessage = message;
    }

    function closeChat() {
        selectedMessage = null;
    }

    async function sendMessage() {
        if (messageContent.trim() === '') {
            return;
        }

        // Simuler l'envoi du message à la base de données
        console.log('Message envoyé:', messageContent);

        // Effacer le contenu du message
        messageContent = '';
    }

    async function refreshMessages() {
        await fetchMessages();
    }

</script>

<style>

    h1 {
        @apply text-3xl font-bold mb-4 text-center;
    }

    .message {
        @apply bg-white shadow-lg rounded-lg p-6 mb-4 cursor-pointer;
    }

    .sender {
        @apply text-lg font-semibold;
    }

    .timestamp {
        @apply text-xs text-gray-500;
    }

    .content {
        @apply text-gray-700 mt-2;
    }

    .chat-bubble {
        @apply fixed bottom-4 right-4 bg-white p-4 rounded-lg shadow-lg w-80;
    }
</style>

<div class="max-w-lg mx-auto mt-8">
    <h1>Boîte de réception</h1>
    <button
            on:click="{refreshMessages}"
            class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded"
    >
        Recharger les messages
    </button>
    {#each messages as message (message.id)}
        <div class="message" on:click={() => openChat(message)}>
            <div class="flex justify-between">
                <span class="sender">{message.sender}</span>
                <span class="timestamp">{new Date(message.timestamp).toLocaleString()}</span>
            </div>
            <p class="content">{message.content}</p>
        </div>
    {/each}
    {#if selectedMessage}
        <div class="chat-bubble">
            <div class="flex justify-between items-center mb-2">
                <strong>{selectedMessage.sender}</strong>
                <button on:click={closeChat} class="text-gray-500">Fermer</button>
            </div>
            <div class="border-t border-gray-200 pt-2">
                <p class="mb-2">{selectedMessage.content}</p>
                <!-- Ajoutez ici les autres messages de la conversation -->
            </div>
            <input
                    type="text"
                    class="w-full border border-gray-300 rounded mt-4 p-2 focus:outline-none focus:ring-2 focus:ring-blue-300"
                    placeholder="Écrire un message..."
            />
            <button
                    on:click="{sendMessage}"
                    class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded"
            >
                Envoyer
            </button>
        </div>
    {/if}
</div>
