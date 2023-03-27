
<div class="flex rounded-full bg-white box-border h-auto w-auto">
    <div class="flex gap-1">
        <img class="box-border h-6 w-6 mt-2 ml-1" src="src/assets/house.png" alt="logo maison">
        <input class="bg-transparent text-black rounded-l-full pr-7" type="text" name="departure" placeholder="Départ">
    </div>
    <div class="flex gap-1 border-l-2 pr-7">
        <img class="h-6 w-6 mt-2 ml-1" src="src/assets/house.png" alt="logo maison">
        <input class="bg-transparent text-black pr-7" type="text" name="arrival" placeholder="Arrivée">
    </div>
    <div class="flex gap-1 border-l-2">
        <img class="h-6 w-6 mt-2 ml-1" src="src/assets/calendar.png" alt="logo maison">
        <input class="bg-transparent text-black" type="date" name="date" placeholder="date" min="2023-01-01" max="2025-12-31">
    </div>
    <div class="flex gap-1 border-l-2">
        <img class="h-6 w-6 mt-2 ml-1" src="src/assets/clock.png" alt="logo maison">
        <input class="bg-transparent text-black" type="time" name="time" placeholder="Heure">
    </div>
    <div class="flex gap-1 border-l-2">
        <img class="h-6 w-6 mt-2 ml-1" src="src/assets/people-audience.png" alt="logo de plusieurs personne">
        <input class="bg-transparent text-black" type="number" name="passengers" placeholder="Passagers" min="0" max="4">
    </div>
    <button class="bg-cyan-500 text-white rounded-r-full px-4 py-2" >Rechercher</button>
</div>

<style>
    input[type=text]:focus {
        outline: none;
    }
</style>

