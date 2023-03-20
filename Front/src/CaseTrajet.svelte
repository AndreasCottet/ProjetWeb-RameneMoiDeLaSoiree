<div class="box-content h-auto w-64 p-4  bg-white rounded-3xl shadow-[0px_0px_75px_10px_rgba(0,0,0,0.15)]">
    <h1>Départ:</h1>
    <div class="flex gap-4">
        <img src="src/assets/house.png" alt="Logo maison">
        <h2>Campus B</h2>
    </div>
    <div class="flex gap-4">
        <img src="src/assets/clock.png" alt="Logo d'une horloge">
        <h2>12:10</h2>
    </div>
    <br>
    <h1>Arrivée:</h1>
    <div class="flex gap-4">
        <img src="src/assets/house.png" alt="Logo maison">
        <h2>Campus A</h2>
    </div>
    <div class="flex gap-4">
        <img src="src/assets/clock.png" alt="Logo d'une horloge">
        <h2>12:10</h2>
    </div>
    <br>
    <h1>Date:</h1>
    <div class="flex gap-4">
        <img src="src/assets/calendar.png" alt="Logo d'une calendrier">
        <h2>12/12/2020</h2>
    </div>
    <br>
    <h1>Place Restante:</h1>
    <div class="flex gap-4">
        <img src="src/assets/people-audience.png" alt="Logo de plusieurs personnes">
        <h2>2</h2>
    </div>
    <br>
    <h1>Proposé Par:</h1>
    <div class="flex gap-4">
        <h2>Lilian</h2>
    </div>
    <br>
    <a href="http://localhost:3000/">

        <button class="hover:bg-transparent ">Voir plus<img src="src/assets/car-side.png" alt="Logo de plusieurs personnes"></button>

    </a>
</div>

<style>
    h1
    {
        @apply text-gray-400 text-base font-bold text-left;
    }
    h2
    {
        @apply text-black text-xl text-left font-bold flex-auto ;
    }
    img
    {
        @apply w-6 h-6;
    }

    button
    {
        @apply border-2 border-[#00C2FF] rounded-2xl bg-[#00C2FF] text-black font-bold pl-16 pr-16 flex gap-4;
    }

</style>
