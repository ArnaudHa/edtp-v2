<div class="planning-component">

    <div class="card bg-dark rounded-0 p-3"><!-- ICI BG -->
        <h5 class="text-white">{{ \Carbon\Carbon::now()->locale('fr')->isoFormat('dddd Do MMMM YYYY') }}</h5>
        <h3 class="text-white fw-bold">{{ \Carbon\Carbon::now()->format('H:i') }}</h3>
        <div class="mb-3">
            <div class="badge bg-primary rounded-pill">
                <i class="bi-calendar-week me-2"></i>
                <small>{{ \Carbon\Carbon::parse($date)->locale('fr')->isoFormat('dddd Do MMMM YYYY') }}</small>
            </div>
        </div>
        <div class="w-100 d-flex">
            <button class="btn btn-primary btn-light rounded-pill me-2" wire:click="previousDay">
                <i class="bi-arrow-left me-2"></i>
                Précédent
            </button>
            <button class="btn btn-primary btn-light rounded-pill" wire:click="nextDay">
                Suivant
                <i class="bi-arrow-right"></i>
            </button>
        </div>
    </div>

    <div class="container my-3">
        @if(in_array(\Carbon\Carbon::parse($date)->format('D'), [ 'Sat', 'Sun' ]))
            <h5>Week-end</h5>
            <img class="illustration" src="images/weekend.png">
        @endif

        @foreach($courses as $course)
            <div class="card text-center mb-3">
                <div class="card-header py-1">
                    <b>{{ \Carbon\Carbon::parse($course->start)->format('H:i') }} -> {{ \Carbon\Carbon::parse($course->end)->format('H:i') }}</b>
                </div>
                <div class="card-body py-3">
                    <h6 class="card-title"><b>{{ $course->code }}</b> - {{ $course->desc }}</h6>
                    <p class="card-text">{{ $course->professor  }}</p>
                    <div class="d-flex justify-content-center">
                        <div class="badge rounded-pill bg-primary mx-1">
                            {{ $course->duration }}
                        </div>
                        @if($course->place)
                            <div class="badge rounded-pill bg-primary mx-1">
                                {{ $course->place }}
                            </div>
                        @endif
                        @if($course->is_exam)
                            <div class="badge rounded-pill bg-danger mx-1">
                                EXAMEN
                            </div>
                        @endif
                    </div>
                </div>
                <div class="card-footer py-1 text-muted">
                    @if($course->room === null)
                        Pas de salle
                    @else
                        {{ $course->room }}
                    @endif
                </div>
            </div>
            <hr class="hr">
        @endforeach
    </div>
</div>
