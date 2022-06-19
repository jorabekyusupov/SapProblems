<x-app-layout>
    <div class="container card-header {{auth()->user()->employee || auth()->user()->is_admin  ? '' : 'd-none' }}">
        <a class="btn btn-primary" href="{{route('pr.create')}}">Qo'shish</a>
    </div>
    <div class="container ">
        <table class="table border">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">KOD</th>
                <th scope="col">Problem</th>
                <th scope="col">Solution</th>
                <th scope="col">Start Date</th>
                <th scope="col">End date</th>
                <th scope="col">User</th>
                <th scope="col">actions</th>
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
                        <td class=" {{auth()->user()->id === $problem->user->id || auth()->user()->is_admin  ? 'd-flex' : 'd-none'}}" >
                            <a class="btn btn-secondary mr-2" href="{{route('pr.edit', ['id'=> $problem->id])}}">Edit</a>
                            <form style="display: inline-block" action="{{route('pr.destroy', ['id'=> $problem->id])}}" method="post">
                                @method('delete')
                                @csrf
                                <input type="hidden" name="id" value="{{$problem->id}}">
                                <button type="submit" class="btn btn-danger text-black" style="color: black">Delete</button>
                            </form>
                        </td>
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
