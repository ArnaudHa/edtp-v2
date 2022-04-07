<div>
    <div class="container">
        <h5>Devtools</h5>

        <div class="card mb-3">
            <div class="card-header">
                Données
            </div>
            <div class="card-body">
                <button class="btn btn-primary" wire:click="clearDatabase">
                    Clear DB
                </button>
                <button class="btn btn-primary" wire:click="synchronize">
                    Synchronize
                </button>
            </div>
        </div>

        <div class="card mb-3">
            <div class="card-header">
                Notifications
            </div>
            <div class="card-body">
                <button class="btn btn-primary" wire:click="testDiscord">
                    Test discord
                </button>
                <button class="btn btn-primary" wire:click="testNotification">
                    Test notification
                </button>
            </div>
        </div>

        <div class="card">
            <div class="card-header">
                Configuration
            </div>
            <div class="card-body">

            </div>
        </div>

    </div>
</div>
