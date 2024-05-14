<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calculate</title>
    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
    </style>
</head>

<body>
    <form method="POST" action="{{ route('calculate.cal') }}">
        @csrf
        @method('post')
        <input type="text" id="income" name="income" placeholder="Enter Income Value">
        <button type="submit">Calculate Tax</button>
        @if (session('errors'))
            <p>{{ session('errors')[0] }}</p>
        @endif
        @if (isset($tax))
            <p>Tax is {{ $tax }}</p>
        @endif
    </form>
</body>

</html>
