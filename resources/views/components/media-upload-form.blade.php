<div>
    <div class="container">
        <div class="card">
            <div class="card-header">
                Media Upload
            </div>
            <div class="card-body">
                <form action="{{ route('step-three') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label for="file1" class="form-label">Upload File 1</label>
                        <input type="file" class="form-control @error('file1') is-invalid @enderror" id="file1"
                            name="file1">
                        @error('file1')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="file2" class="form-label">Upload File 2</label>
                        <input type="file" class="form-control @error('file2') is-invalid @enderror" id="file2"
                            name="file2">
                        @error('file2')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-primary">Create Pass</button>
                </form>
            </div>
        </div>
    </div>
</div>
