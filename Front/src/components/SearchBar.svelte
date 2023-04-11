<div class="flex rounded-full bg-gray-100 justify-between p-3 w-full">
    <div class="flex items-center ">
        <img src="src/assets/house.png" alt="logo maison">
        <input type="text" name="departure" placeholder="Départ">
    </div>
    <div class="flex items-center border-l-2">
        <img src="src/assets/house.png" alt="logo maison">
        <input type="text" name="arrival" placeholder="Arrivée">
    </div>
    <div class="flex items-center border-l-2 w-3/12">
        <img src="src/assets/calendar.png" alt="logo maison">
        <input  type="date" name="date" placeholder="date" min="2023-01-01" max="2025-12-31">
    </div>
    <div class="flex items-center border-l-2 w-1/6">
        <img src="src/assets/clock.png" alt="logo maison">
        <input type="time" name="time" placeholder="Heure">
    </div>
    <div class="flex items-center border-l-2">
        <img src="src/assets/people-audience.png" alt="logo de plusieurs personne">
        <input type="number" name="passengers" placeholder="Passagers" min="0" max="4">
    </div>
    <button class="bg-cyan-500 text-white rounded-r-full px-4 py-2 h-full" >Rechercher</button>
</div>

<style>
    img {
        @apply w-6 h-6 mx-4;
    }

    input {
        @apply text-lg font-semibold bg-gray-100 text-black w-full;
    }
</style>

