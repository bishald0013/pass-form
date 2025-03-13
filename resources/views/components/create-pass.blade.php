<form action="{{ route('step-one') }}" method="POST" enctype="multipart/form-data" class="needs-validation">
    @csrf
    <div class="container w-50">
        <div class="card">
            <div class="card-header">Create Pass</div>
            <div class="card-body">
                <div class="row align-items-center">
                    <div class="col-6">
                        <label for="exampleInputEmail1" class="form-label">Organizer</label>
                        <input type="text" class="form-control" name="organizer" value={{ $organizer }}
                            id="organizer">
                    </div>
                    <div class="col-6">
                        <label for="exampleInputEmail1" class="form-label">Pass Type</label>
                        <select class="form-select" name="passType" aria-label="Default select example">
                            <option selected>Open this select menu</option>
                            @foreach ($passType as $key => $value)
                                <option value={{ $key }}>{{ $value }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-6 mt-2">
                        <label for="exampleInputEmail1" class="form-label">Start Date</label>
                        <input type="date" class="form-control" name="startDate" id="startDate">
                    </div>
                    <div class="col-6 mt-2">
                        <label for="exampleInputEmail1" class="form-label">End Date</label>
                        <input type="date" class="form-control" name="endDate" id="endDate">
                    </div>
                    <div class="col-6 mt-3">
                        <label for="exampleInputEmail1" class="form-label">Timezone</label>
                        <select class="form-select" name="timezone" aria-label="Default select example">
                            <option selected>Open this select menu</option>
                            @foreach ($timezone as $key => $value)
                                <option value={{ $value }}>{{ $value }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-6 mt-2">
                        <label for="exampleInputEmail1" class="form-label">Pass Color</label>
                        <input type="text" class="form-control" name="passColor" placeholder="Pass Color #rrdfd12"
                            id="location">
                    </div>
                    <div class="col-12 mt-2">
                        <label for="exampleInputEmail1" class="form-label">Location</label>
                        <input type="text" class="form-control" name="location" placeholder="Event Location"
                            id="location">
                    </div>
                </div>
                <button class="btn btn-primary mt-3" type="submit">Next</button>
            </div>
        </div>
    </div>

</form>
<script>
    $(document).ready(function() {
        $('#timezone').select2({
            placeholder: "Search Timezone",
            allowClear: true
        });
    });
</script>
