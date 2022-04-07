<div class="settings-component">

    <div class="card bg-dark rounded-0 p-3"><!-- ICI BG -->
        <h5 class="text-white">Configuration de l'application</h5>
    </div>

    <div class="container my-3">

        <h2>Général</h2>
        <p>Réinitialiser l'application, cette action aura pour effet de supprimer les cookies et la session.</p>
        <button class="btn btn-danger mb-2">Supprimer mes données</button>

        <hr>

        <h2>Apparence</h2>
        <p>Choisir le theme de l'application. Rechargez la page après modification.</p>

        <input type="radio" class="btn-check" name="options-outlined" id="theme-classic" autocomplete="off" @if($theme == 'classic') checked @endif wire:click="update('classic')">
        <label class="btn btn-outline-dark mb-2" for="theme-classic">Classic</label>

        <input type="radio" class="btn-check" name="options-outlined" id="theme-desert" autocomplete="off" @if($theme == 'desert') checked @endif wire:click="update('desert')">
        <label class="btn btn-outline-dark mb-2" for="theme-desert">Desert</label>

        <input type="radio" class="btn-check" name="options-outlined" id="theme-forest" autocomplete="off" @if($theme == 'forest') checked @endif wire:click="update('forest')">
        <label class="btn btn-outline-dark mb-2" for="theme-forest">Forest</label>

        <input type="radio" class="btn-check" name="options-outlined" id="theme-ocean" autocomplete="off" @if($theme == 'ocean') checked @endif wire:click="update('ocean')">
        <label class="btn btn-outline-dark mb-2" for="theme-ocean">Ocean</label>

        <input type="radio" class="btn-check" name="options-outlined" id="theme-galaxy" autocomplete="off" @if($theme == 'galaxy') checked @endif wire:click="update('galaxy')">
        <label class="btn btn-outline-dark mb-2" for="theme-galaxy">Galaxy</label>

        <hr>

        <h2>Notifications</h2>
        <p>Gérez vos préférences de notification.</p>

        <div class="form-check form-switch">
            <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckDefault">
            <label class="form-check-label" for="flexSwitchCheckDefault">Service de notifications</label>
        </div>

        <hr>

        <div class="form-check form-switch">
            <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckDefault">
            <label class="form-check-label" for="flexSwitchCheckDefault">Notifications notes</label>
        </div>
        <div class="form-check form-switch">
            <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckDefault">
            <label class="form-check-label" for="flexSwitchCheckDefault">Notifications emploi du temps</label>
        </div>

        <hr>

        <div class="row justify-content-center">
            <div class="col-4">
                <p class="text-center w-100">Powered by :</p>
                <a href="https://www.vultr.com/?ref=9095799-8H">
                    <img src="./images/vultr.png" alt="vultr" class="w-100">
                </a>
            </div>
        </div>
    </div>
</div>
