<x-layout>
    <!-- 1. Заголовок страницы -->
    <div class="app-content-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-6">
                    <h3 class="mb-0">Панель администратора</h3>
                </div>
            </div>
        </div>
    </div>

    <!-- 2. Основной контент -->
    <div class="app-content">
        <div class="container-fluid">
            
            <!-- ВЕРХНИЙ РЯД: Виджеты (Статистика) -->
            <div class="row mb-4">
                <div class="col-lg-3 col-6">
                    <div class="small-box text-bg-primary">
                        <div class="inner">
                            <h3>{{ $applications->count() }}</h3>
                            <p>Всего заявок</p>
                        </div>
                        <div class="small-box-icon">
                            <i class="fas fa-file-alt"></i>
                        </div>
                    </div>
                </div>
                <!-- Можно добавить еще виджеты сюда -->
            </div>

            <!-- НИЖНИЙ РЯД: Таблица -->
            <div class="row">
                <div class="col-12">
                    <div class="card mb-4">
                        <div class="card-header">
                            <h3 class="card-title">Последние поступления</h3>
                        </div>
                        
                        <div class="card-body p-0">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th style="width: 10px">#</th>
                                        <th>Студент</th>
                                        <th>Факультет</th>
                                        <th>Баллы</th>
                                        <th>Статус</th>
                                        <th>Действия</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($applications as $app)
                                        <tr class="align-middle">
                                            <td>{{ $app->id }}</td>
                                            <td>{{ $app->user->name }}</td>
                                            <td>{{ $app->faculty->name }}</td>
                                            <td>{{ $app->score }}</td>
                                            <td>
                                                @if($app->status === 'new')
                                                    <span class="badge text-bg-primary">Новая</span>
                                                @elseif($app->status === 'approved')
                                                    <span class="badge text-bg-success">Принята</span>
                                                @else
                                                    <span class="badge text-bg-danger">Отклонена</span>
                                                @endif
                                            </td>
                                            <td>
                                                <a href="#" class="btn btn-sm btn-info text-white" title="Просмотр">
                                                    <i class="fas fa-eye"></i>
                                                </a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div> <!-- /.card-body -->
                    
                    </div> <!-- /.card -->
                </div>
            </div>
            {{ $applications->links() }}
        </div>

        
    </div>

    
</x-layout>