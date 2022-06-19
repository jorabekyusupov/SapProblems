<x-app-layout>

    <div class="container">
        <form action="{{route('pr.update', ['id'=>$model->id])}}" method="post">
            @method('put')
            @csrf
            <div class="card-header text-end">
                <div class="form-group">
                    <button class="btn btn-primary">Saqlash</button>
                </div>
            </div>
         <div>

         </div>
        </form>
    </div>


</x-app-layout>
