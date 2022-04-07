<div class="notes-component">

    <div class="card bg-dark rounded-0 p-3">
        <h5 class="text-white">Statistiques</h5>
    </div>

    <div class="container my-3">
        <h2>Le nombre de cours restants</h2>
        <p>Méthodologie avancée c'est trop...</p>
        <hr>
        @foreach($courses as $course)
            <div class="mb-3">
                <p>{{ $course->code }} - {{ $course->desc }}</p>
                <div class="progress" style="height: 30px">
                    <div class="progress-bar" role="progressbar" style="width: {{ $course->remaining * 3 + 10 }}%;" aria-valuemax="100">{{ $course->remaining }} Cours</div>
                </div>
                <hr>
            </div>
        @endforeach
    </div>
</div>
