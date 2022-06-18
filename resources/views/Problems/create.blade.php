<x-app-layout>

    <div class="container">
        <form action="{{route('pr.store')}}" method="post">
            @method('POST')
            @csrf
            <div class="card-header text-end">
                <div class="form-group">
                    <button class="btn btn-primary">Qo'shish</button>
                </div>
            </div>
            <div class="form-group">
                <label for="kod">Kod</label>
                <input type="text" name="kod" class="form-control">
            </div>
            <div class="form-group">
                <label for="problem">Problem</label>
                <textarea class="form-control" name="problem" id="problem"></textarea>
            </div>
            <div class="form-group">
                <label for="solution">Solution</label>
                <textarea class="form-control" name="solution" id="solution"></textarea>
            </div>
            <div class="form-group">
                <label for="start_date">Start Date</label>
                <input type="date" class="form-control" id="start_date" name="start_date" placeholder="Start Date">
            </div>
            <div class="form-group">
                <label for="end_date">End Date</label>
                <input type="date" class="form-control" id="end_date" name="end_date" placeholder="End Date">
            </div>
        </form>
    </div>


</x-app-layout>
