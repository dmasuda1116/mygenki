<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>テスト</title>

    <!-- Styles -->
    <style>
    </style>
</head>

@php $today = '2021/05/06'; @endphp

<body>
    <div>

        @php echo "--- Start<br />\n"; @endphp

        {{--
        <x-sample message="属性の変数" :today="$today">スロット</x-sample>
            --}}


        @php
        $map = [
        'aa'=>'AAAA',
        'bb'=>'BBBB',
        'cc'=>'CCCC',
        ];
        @endphp

        @foreach ($map as $key => $value)
        Key:[{{ $key }}], Value:[{{ $value }}]<br />
        @endforeach

        @php echo "--- End<br />\n"; @endphp



    </div>
</body>

</html>