<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />

    <!-- Bootstrap & Select2 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/css/select2.min.css" rel="stylesheet" />

    <!-- jQuery & Select2 JS -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/js/select2.min.js"></script>
</head>

<body class="bg-light d-flex justify-content-center align-items-center vh-100">
    @php
        $step = session('step', $step ?? 1); // Default to step 1 if not provided
        if ($errors->has('event_name') || $errors->has('subHeader')) {
            $step = 2;
        }
        $form_data = session('form_data');
        $passType = session('passType');
    @endphp
    @if ($step == 1)
        <x-create-pass :form_data="$form_data" />
    @elseif ($step == 2 && $passType == 'Event Pass')
        <x-event-pass-form :form_data="$form_data" />
        <form method="POST" action="{{ route('step-previous') }}">
            @csrf
            <input type="hidden" name="step" value="{{ $step - 1 }}">
            <button type="submit" class="btn btn-secondary">Previous</button>
        </form>
    @elseif ($step == 2 && $passType == 'Generic Pass')
        <x-generic-pass-form :form_data="$form_data" />
        <form method="POST" action="{{ route('step-previous') }}">
            @csrf
            <input type="hidden" name="step" value="{{ $step - 1 }}">
            <button type="submit" class="btn btn-secondary">Previous</button>
        </form>
    @elseif ($step == 3)
        <x-media-upload-form />
        <form method="POST" action="{{ route('step-previous') }}">
            @csrf
            <input type="hidden" name="step" value="{{ $step - 1 }}">
            <button type="submit" class="btn btn-secondary">Previous</button>
        </form>
    @endif
</body>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
</script>

</html>
