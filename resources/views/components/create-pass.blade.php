@props(['form_data'])

<form action="{{ route('step-one') }}" method="POST" enctype="multipart/form-data" class="needs-validation">
    @csrf
    <div class="container w-50">
        <div class="card">
            <div class="card-header">Create Pass</div>
            <div class="card-body">
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <div class="row align-items-center">
                    <div class="col-6">
                        <label for="organizer" class="form-label">Organizer</label>
                        <input type="text" class="form-control @error('organizer') is-invalid @enderror"
                            name="organizer" value="{{ old('organizer', $form_data['step_one']['organizer'] ?? '') }}"
                            id="organizer">
                        @error('organizer')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-6">
                        <label for="passType" class="form-label">Pass Type</label>
                        <select class="form-select @error('passType') is-invalid @enderror" name="passType"
                            aria-label="Default select example">
                            <option selected>Open this select menu</option>
                            @foreach ($passType as $key => $value)
                                <option value="{{ $value }}" {{ old('passType') == $value ? 'selected' : '' }}>
                                    {{ $value }}</option>
                            @endforeach
                        </select>
                        @error('passType')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-6 mt-2">
                        <label for="startDate" class="form-label">Start Date</label>
                        <input type="date" class="form-control @error('startDate') is-invalid @enderror"
                            name="startDate" id="startDate"
                            value="{{ old('startDate', $form_data['step_one']['startDate'] ?? '') }}">
                        @error('startDate')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-6 mt-2">
                        <label for="endDate" class="form-label">End Date</label>
                        <input type="date" class="form-control @error('endDate') is-invalid @enderror" name="endDate"
                            id="endDate" value="{{ old('endDate', $form_data['step_one']['startDate'] ?? '') }}">
                        @error('endDate')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-6 mt-3">
                        <label for="timezone" class="form-label">Timezone</label>
                        <select class="form-select @error('timezone') is-invalid @enderror" name="timezone"
                            aria-label="Default select example">
                            <option selected>Open this select menu</option>
                            @foreach ($timezone as $key => $value)
                                <option value="{{ $value }}" {{ old('timezone') == $value ? 'selected' : '' }}>
                                    {{ $value }}</option>
                            @endforeach
                        </select>
                        @error('timezone')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-6 mt-2">
                        <label for="passColor" class="form-label">Pass Color</label>
                        <input type="text" class="form-control @error('passColor') is-invalid @enderror"
                            name="passColor" placeholder="Pass Color #rrdfd12" id="passColor"
                            value="{{ old('passColor') }}">
                        @error('passColor')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-12 mt-2">
                        <label for="location" class="form-label">Location</label>
                        <input type="text" class="form-control @error('location') is-invalid @enderror"
                            name="location" placeholder="Event Location" id="location"
                            value="{{ old('location', $form_data['step_one']['location'] ?? '') }}">
                        @error('location')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
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
