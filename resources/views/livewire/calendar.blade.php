<div>
    <table class="table table-bordered">
        <thead>
        <tr>
            <th>Lu</th>
            <th>Ma</th>
            <th>Me</th>
            <th>Je</th>
            <th>Ve</th>
            <th>Sa</th>
            <th>Di</th>
        </tr>
        </thead>
        @foreach($days as $pack)
            <tr>
                @foreach($pack as $day)
                    <td>{{ $day['date'] }}</td>
                @endforeach
            </tr>
        @endforeach
    </table>
</div>
