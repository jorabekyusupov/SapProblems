<x-app-layout>
   <div class="container card-header {{auth()->user()->employee || auth()->user()->is_admin  ? '' : 'd-none' }}">
   <a class="btn btn-primary" href="{{route('pr.create')}}">Qo'shish</a>
   </div>
    <div class="container ">
        <table class="table mt-1">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">KOD</th>
                <th scope="col">Problem</th>
                <th scope="col">Solution</th>
                <th scope="col">Start Date</th>
                <th scope="col">End date</th>
                <th scope="col">User</th>
            </tr>
            </thead>
            <tbody>
            @if(isset($problems))
            @foreach($problems as $index => $problem)
                <tr>
                    <th scope="row">{{ ++$index }}</th>
                    <td>{{ $problem->kod }}</td>
                    <td>{{ $problem->problem }}</td>
                    <td>{{ $problem->solution }}</td>
                    <td>{{ $problem->start_date }}</td>
                    <td>{{ $problem->end_date }}</td>
                    <td>{{ $problem->user->firstname }} {{$problem->user->lastname}}</td>
                </tr>
            @endforeach
            @endif

            </tbody>
        </table>
            <thead>
            {{ $problems->links() }}
            </thead>
    </div>

</x-app-layout>
