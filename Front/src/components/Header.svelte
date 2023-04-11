<div class="w-full flex align-middle justify-between px-40 items-center h-20 bg-white border">
    <div class="flex gap-10">
        <img src="src/assets/Logo_RDLS.png" alt="Logo RDLS" class="w-24 h-18">
        <a href="rest" class="flex items-center gap-2">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                <path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-5.197-5.197m0 0A7.5 7.5 0 105.196 5.196a7.5 7.5 0 0010.607 10.607z" />
            </svg>              
            <h2>Rechercher un trajet</h2>
        </a>
    </div>
    <div class="flex gap-10">
        <a class="flex items-center gap-2" href="#/trajet/create">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v6m3-3H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z" />
            </svg>              
            <h2>Créer un trajet</h2>
        </a>
        {#if document.cookie}
            <a href="#/user/view" class="bg-blue-400 hover:bg-transparent hover:text-blue-400 text-blue-50 border-2 border-blue-400 rounded-md px-3 py-2 font-semibold flex gap-2 align-middle">
                <p>Mon profil</p>
            </a>
        {:else}
            <a href="#/user/create" class="bg-blue-400 hover:bg-transparent hover:text-blue-400 text-blue-50 border-2 border-blue-400 rounded-md px-3 py-2 font-semibold flex gap-2 align-middle">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 fill-blank">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M17.982 18.725A7.488 7.488 0 0012 15.75a7.488 7.488 0 00-5.982 2.975m11.963 0a9 9 0 10-11.963 0m11.963 0A8.966 8.966 0 0112 21a8.966 8.966 0 01-5.982-2.275M15 9.75a3 3 0 11-6 0 3 3 0 016 0z" />
                </svg>
                <p>S'inscrire</p>
            </a>
            <a href="#/user/login" class="bg-blue-400 hover:bg-transparent hover:text-blue-400 text-blue-50 border-2 border-blue-400 rounded-md px-3 py-2 font-semibold flex gap-2 align-middle">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 fill-blank">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M17.982 18.725A7.488 7.488 0 0012 15.75a7.488 7.488 0 00-5.982 2.975m11.963 0a9 9 0 10-11.963 0m11.963 0A8.966 8.966 0 0112 21a8.966 8.966 0 01-5.982-2.275M15 9.75a3 3 0 11-6 0 3 3 0 016 0z" />
                </svg>
                <p>Se connecter</p>
            </a>
        {/if}
    </div>
</div>

<style>
    h2 {
        @apply text-lg font-semibold;
    }
</style>

<script>
    console.log('cookie : ' + document.cookie)
</script>