<!doctype html>
<html>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="{{asset('css/output.css')}}" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;800&display=swap" rel="stylesheet" />
  <title>Ujian Online CBT</title>

</head>
<body class="font-poppins text-[#0A090B]">
    <section id="content" class="flex">

        <x-sidebar></x-sidebar>


        {{$slot}}
    </section>

</body>
</html>