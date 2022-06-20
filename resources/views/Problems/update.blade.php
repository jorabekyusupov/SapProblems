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
            <div class="form-group">
                <label for="kod">Kod</label>
                <input type="text" name="kod" class="form-control" value="{{old('kod', $model->kod)}}">
            </div>
            <div class="form-group">
                <label for="problem">Problem</label>
                <textarea class="form-control" name="problem" id="problem">{{$model->problem ?? ''}}</textarea>
            </div>
            <div class="form-group">
                <label for="solution">Solution</label>
                <textarea class="form-control" name="solution" id="solution">{{$model->solution ?? ''}}</textarea>
            </div>
            <div class="form-group">
                <label for="start_date">Start Date</label>
                <input type="datetime-local" class="form-control" id="start_date" name="start_date" placeholder="Start Date" value="{{ $model->start_date ?? ''}}">
            </div>
            <div class="form-group">
                <label for="end_date">End Date</label>
                <input type="datetime-local" class="form-control" id="end_date" name="end_date" placeholder="End Date" value="{{ $model->end_date ?? ''}}">
            </div>
        </form>
    </div>


</x-app-layout>
