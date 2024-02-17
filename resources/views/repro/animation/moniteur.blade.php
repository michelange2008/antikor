<div id="moniteur"

    class="flex flex-row justify-between items-end px-2 py-3 border lg:px-12 bg-brique-900 md:justify-around md:items-center md:flex-col">
    
    <div class="moniteur-item compteur">
        <div id="jours"
            class="flex flex-col justify-center m-auto w-14 h-14 text-center align-text-bottom bg-gray-400 border-2 border-gray-800 lg:w-20 lg:h-20 md:text-4xl lg:text-6xl">
            <p>0</p>
        </div>
        <p class="mt-1 text-base text-center text-white lg:text-lg text-bold">Jours</p>
    </div>
    
    <div>
        <div class="bouton bouton-rond" title="Tournez le bouton pour faire avancer ou reculer l'animation">
            <div id="position" class="roller"></div>
        </div>
        <p class="mt-1 text-base text-center text-white lg:text-lg text-bold">Progression</p>
    </div>
    
    <div class="hidden lg:block">
        <div id="speed" class="hidden aiguille lg:block" title="Déplacez l'aiguille pour accélérer ou ralentir l'animation"></div>
        <div class="base-aiguille"></div>
        <p class="mt-1 text-lg text-center text-white text-bold">Vitesse</p>
    </div>

</div>
