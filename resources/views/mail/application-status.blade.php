<!DOCTYPE html>
<html>
<body>
    <h2>Здравствуйте, {{ $application->user->name }}!</h2>
    
    <p>Статус вашей заявки на <strong>{{ $application->faculty->name }}</strong> изменился.</p>
    
    <p>Новый статус: 
        @if($application->status === 'approved')
            <b style="color: green">Принята</b>
        @elseif($application->status === 'rejected')
            <b style="color: red">Отклонена</b>
        @else
            <b>{{ $application->status }}</b>
        @endif
    </p>

    <p>Зайдите в <a href="{{ route('applications.index') }}">Личный кабинет</a>, чтобы узнать подробности.</p>
</body>
</html>