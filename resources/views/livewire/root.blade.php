<div class="vh-100 d-flex flex-column">

    <div class="tab-content h-100 overflow-scroll" id="pills-tabContent">
        <div class="tab-pane fade show active" id="pills-planning" role="tabpanel">
            <livewire:planning />
        </div>
        <div class="tab-pane fade" id="pills-notes" role="tabpanel">
            <livewire:notes />
        </div>
        <div class="tab-pane fade" id="pills-config" role="tabpanel">
            <livewire:settings />
        </div>
        <!--<div class="tab-pane fade" id="pills-dev" role="tabpanel">
            <livewire:devtools />
        </div>-->
    </div>

    <ul class="nav nav-pills mt-auto w-100 d-flex justify-content-center bg-dark" id="pills-tab" role="tablist">

        <li class="nav-item" role="presentation">
            <button class="nav-link rounded-0 py-3 active" id="pills-planning-tab" data-bs-toggle="pill" data-bs-target="#pills-planning" type="button">
                <i class="bi-calendar-week mr-3"></i>
                Planning
            </button>
        </li>

        <li class="nav-item" role="presentation">
            <button class="nav-link rounded-0 py-3" id="pills-notes-tab" data-bs-toggle="pill" data-bs-target="#pills-notes" type="button">
                <i class="bi-receipt mr-3"></i>
                Notes
            </button>
        </li>

        <li class="nav-item" role="presentation">
            <button class="nav-link rounded-0 py-3" id="pills-config-tab" data-bs-toggle="pill" data-bs-target="#pills-config" type="button">
                <i class="bi-gear mr-3"></i>
                Config
            </button>
        </li>

        <!--<li class="nav-item" role="presentation">
            <button class="nav-link rounded-0 py-3" id="pills-dev-tab" data-bs-toggle="pill" data-bs-target="#pills-dev" type="button">
                <i class="bi-activity"></i>
            </button>
        </li>-->
    </ul>

</div>
