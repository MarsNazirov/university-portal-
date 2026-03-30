<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <style>
        /* Важно для русского языка в DomPDF */
        body { font-family: DejaVu Sans, sans-serif; }
        .header { text-align: center; margin-bottom: 20px; }
        .content { margin-top: 50px; }
    </style>
</head>
<body>
    <div class="header">
        <h1>ПРИКАЗ № {{ $application->id }}</h1>
        <h3>О зачислении абитуриента</h3>
    </div>

    <div class="content">
        <p>Я, Ректор университета "СибТех", приказываю:</p>
        <p>
            Зачислить студента <strong>{{ $application->user->name }}</strong> 
            на факультет <strong>{{ $application->faculty->name }}</strong>.
        </p>
        <p>Основание: высокие баллы ЕГЭ ({{ $application->score }}).</p>
    </div>

    <br><br>
    <p>Дата: {{ now()->format('d.m.Y') }}</p>
    <p>Подпись: _______________ / Г.Г. Ректоров</p>
</body>
</html>