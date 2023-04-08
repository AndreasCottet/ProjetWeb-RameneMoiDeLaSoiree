<div class="flex rounded-full bg-gray-100 justify-between p-3 mainDiv">
    <div class="flex gap-1 items-center">
        <img src="src/assets/house.png" alt="logo maison">
        <input class="bg-gray-50 text-black" type="text" name="departure" placeholder="Départ">
    </div>
    <div class="flex gap-1 items-center border-l-2 ">
        <img src="src/assets/house.png" alt="logo maison">
        <input class="text-black bg-gray-50 pr-7" type="text" name="arrival" placeholder="Arrivée">
    </div>
    <div class="flex gap-1 items-center border-l-2">
        <img src="src/assets/calendar.png" alt="logo maison">
        <input class="text-black bg-gray-50" type="date" name="date" placeholder="date" min="2023-01-01" max="2025-12-31">
    </div>
    <div class="flex gap-1 items-center border-l-2">
        <img src="src/assets/clock.png" alt="logo maison">
        <input class="text-black bg-gray-50" type="time" name="time" placeholder="Heure">
    </div>
    <div class="flex gap-1 items-center border-l-2">
        <img src="src/assets/people-audience.png" alt="logo de plusieurs personne">
        <input class="text-black bg-gray-50" type="number" name="passengers" placeholder="Passagers" min="0" max="4">
    </div>
    <button class="bg-cyan-500 text-white rounded-r-full px-4 py-2 h-full" >Rechercher</button>
</div>

<style>
    img {
        @apply w-6 h-6 mx-4;
    }

    input {
        @apply text-lg font-semibold;
    }

    .mainDiv > :last-child {
        margin-right: 0px !important;
    }
</style>

