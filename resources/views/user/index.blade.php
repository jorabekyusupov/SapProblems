<x-app-layout>

    <div class="container ">
        <table class="table border">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">firstname</th>
                <th scope="col">lastname</th>
                <th scope="col">email</th>
                <th scope="col">employee</th>
                <th scope="col">admin</th>
                <th scope="col">actions</th>
            </tr>
            </thead>
            <tbody>
            @if(isset($users))
                @foreach($users as $index => $user)
                    <tr>
                        <th scope="row">{{ ++$index }}</th>
                        <td>{{ $user->firstname }}</td>
                        <td>{{ $user->lastname }}</td>
                        <td>{{ $user->email }}</td>
                        <td class="{{$user->id === auth()->user()->id ? '' : 'd-none'}}">  <div  class="btn-user btn btn-success">Ruxsat</div></td>
                        <td class="{{$user->id === auth()->user()->id ? '' : 'd-none'}}">  <div   class="btn-user btn btn-success">Ruxsat</div></td>
                        <td class="{{$user->id === auth()->user()->id || auth()->user()->id != 1 ? 'd-none' : ''}}">@if($user->employee)
                                <form action="{{route('users.update', ["id"=> $user->id])}}" method="post">
                                    @method('put')
                                    @csrf
                                    <input type="hidden" name="employee" value="0">
                                    <button style="color: red;" type="submit" class="btn-user btn btn-danger">Ruxsatni
                                        ochirish
                                    </button>
                                </form>
                            @else
                                <form action="{{route('users.update', ["id"=> $user->id])}}" method="post">
                                    @method('put')
                                    @csrf
                                    <input type="hidden" name="employee" value="1">
                                    <button style="color: green;" type="submit" class="btn-user btn btn-success">Ruxsat
                                        berish
                                    </button>
                                </form>
                            @endif</td>
                        <td class="{{$user->id === auth()->user()->id || auth()->user()->id != 1 ?  'd-none' : ''}}"
                            style="color: gray">@if($user->is_admin)
                                <form action="{{route('users.update', ["id"=> $user->id])}}" method="post">
                                    @method('put')
                                    @csrf
                                    <input type="hidden" name="is_admin" value="0">
                                    <button style="color: red;" type="submit" class="btn-user btn btn-danger">Ruxsatni
                                        ochirish
                                    </button>
                                </form>
                            @else
                                <form action="{{route('users.update', ["id"=> $user->id])}}" method="post">
                                    @method('put')
                                    @csrf
                                    <input type="hidden" name="is_admin" value="1">
                                    <button style="color: green; " type="submit" class="btn-user btn btn-success">Ruxsat
                                        berish
                                    </button>
                                </form>
                            @endif</td>
                    </tr>
                @endforeach
            @endif

            </tbody>
        </table>
        <thead>
        {{ $users->links() }}
        </thead>
    </div>


</x-app-layout>
