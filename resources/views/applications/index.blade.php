<x-layout>
    <div class="app-content-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-6">
                    <h3 class="mb-0">Мои заявки</h3>
                </div>
            </div>
        </div>
    </div>

    <div class="app-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        
                        <!-- Если заявок нет, можно вывести сообщение (сделай проверку сам) -->
                        @if ($applications->count() === 0)
                            <div class="card-body">У вас пока нет заявок</div>
                        @endif

                        <div class="card-body p-0">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th style="width: 10px">#</th>
                                        <th>Факультет</th>
                                        <th>Баллы ЕГЭ</th>
                                        <th>Дата подачи</th>
                                        <th>Статус</th>
                                    </tr>
                                </thead>
                                <tbody>
                                   @foreach ($applications as $application)
                                    <tr>
                                        <td>{{ $application->id }}</td>
                                        <td>{{ $application->faculty->name }}</td>
                                        <td>{{ $application->score }}</td>
                                        <td>{{ $application->created_at->format('d.m.Y') }}</td>
                                        <td>
                                            {{-- <span class="badge text-bg-warning">На проверке</span> --}}
                                            @if ($application->status == 'new')
                                                <span class="badge text-bg-primary">Новая</span>
                                            @elseif($application->status == 'approved')
                                                <span class="badge text-bg-success">Принята</span>
                                            @else
                                                <span class="badge text-bg-danger">Отклонена</span>
                                            @endif
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        
                        <!-- Блок пагинации -->
                        <div class="card-footer clearfix">
                            <!-- Выведи ссылки пагинации здесь -->
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</x-layout>