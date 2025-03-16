@props(['form_data'])
<form action="{{ route('step-two') }}" method="POST" enctype="multipart/form-data" class="needs-validation">
    @csrf
    <div class="container">
        <div class="card">
            <div class="card-header">
                Event Pass
            </div>
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
                <div class="row">
                    <div class="col-md-6 my-3">
                        <label class="form-label" for="eventName">Event Name</label>
                        <input type="text" class="form-control @error('event_name') is-invalid @enderror"
                            id="brandName" name="event_name" placeholder="Enter name"
                            value="{{ old('event_name', $form_data['step_two']['event_name'] ?? '') }}">
                        @error('event_name')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-6 my-2" id="locationField">
                        <label class="form-label" for="location">Sub-Header</label>
                        <input type="text" class="form-control @error('subHeader') is-invalid @enderror"
                            id="subHeader" name="subHeader" placeholder="Sub Header"
                            value="{{ old('subHeader', $form_data['step_two']['subHeader'] ?? '') }}">
                        @error('subHeader')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-3">
                        <label class="form-label" for="gate">Gate</label>
                        <input type="text" class="form-control" id="gate" name="gate"
                            placeholder="Enter gate"
                            value="{{ old('subHeader', $form_data['step_two']['gate'] ?? '') }}">
                        @error('gate')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-3">
                        <label class="form-label" for="section">Section</label>
                        <input type="text" class="form-control" id="section" name="section"
                            placeholder="Enter section"
                            value="{{ old('subHeader', $form_data['step_two']['section'] ?? '') }}">
                        @error('section')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-3">
                        <label class="form-label" for="row">Row</label>
                        <input type="text" class="form-control" id="row" name="row" placeholder="Enter row"
                            value="{{ old('subHeader', $form_data['step_two']['row'] ?? '') }}">
                        @error('row')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-3">
                        <label class="form-label" for="seat">Seat</label>
                        <input type="text" class="form-control" id="seat" name="seat"
                            placeholder="Enter seat"
                            value="{{ old('subHeader', $form_data['step_two']['seat'] ?? '') }}">
                        @error('seat')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-6 mt-2">
                        <label class="form-label" for="gate">Attendee Name</label>
                        <input type="text" class="form-control" id="attName" name="attName"
                            placeholder="Attendee Name"
                            value="{{ old('attName', $form_data['step_two']['attName'] ?? '') }}">
                    </div>
                    <div class="col-md-6 mt-2">
                        <label class="form-label" for="gate">Ticket Number</label>
                        <input type="text" class="form-control" id="ticketNo" name="ticketNo"
                            placeholder="Ticket Number"
                            value="{{ old('attName', $form_data['step_two']['ticketNo'] ?? '') }}">
                    </div>
                </div>
                <button class="btn btn-primary mt-3" type="submit">Next</button>

            </div>
        </div>
    </div>
</form>
