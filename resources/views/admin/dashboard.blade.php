<x-layout>
    <div class="app-content-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-6">
                    <h3 class="mb-0">Панель администратора</h3>
                </div>
            </div>
        </div>
    </div>

    <div class="app-content">
        <div class="container-fluid">
            
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
            </div>

            <div class="row mb-4">
                <form action="{{ route('admin.dashboard') }}" method="GET" class="d-flex gap-2 mb-3">
                    <input type="text" name="search" class="form-control" placeholder="Имя студента" value="{{ request('search') }}">
                    <select name="status" class="form-select">
                            <option value="">Все статусы</option>
                            <option value="new" @selected(request('status') == 'new')>Новая</option>
                            <option value="approved" @selected(request('status') == 'approved')>Принята</option>
                            <option value="rejected" @selected(request('status') == 'rejected')>Отклонена</option>
                    </select>
                    <select name="faculty_id" class="form-select">
                        <option value="">Все факультеты</option>
                        @foreach ($faculties as $faculty)
                            <option value="{{ $faculty->id }}" @selected(request('faculty_id') == $faculty->id)>{{ $faculty->name }}</option>
                        @endforeach
                    </select>

                    <button type="submit" class="btn btn-primary">Найти</button>

                    <a href="{{ route('admin.dashboard') }}" class="btn btn-outline-secondary">Сброс</a>
                </form>
            </div>

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
                                            <td>
                                                @if ($app->status !== 'approved')
                                                    <form action="{{ route('applications.update', $app) }}" method="post">
                                                    @csrf
                                                    @method('PATCH')
                                                    <input type="hidden" name="status" value="approved">
                                                    <button type="submit" class="btn btn-sm btn-primary">Принять</button>
                                                    </form>
                                                @endif

                                                @if ($app->status !== 'rejected')
                                                    <form action="{{ route('applications.update', $app) }}" method="post">
                                                    @csrf
                                                    @method('PATCH')
                                                    <input type="hidden" name="status" value="rejected">
                                                    <button type="submit" class="btn btn-sm btn-danger">Отклонить</button>
                                                    </form>
                                                @endif
                                            </td>
                                            <td>
                                                <form action="{{ route('applications.destroy', $app) }}" method="POST" onclick="confirm('Удалить?')">
                                                @csrf
                                                @method('DELETE')
                                                    <button type="submit" class="btn btn-sm btn-danger">
                                                        <i class="fas fa-trash"></i> Удалить
                                                    </button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div> 
                    
                    </div> 
                </div>
            </div>
            {{ $applications->links() }}
        </div>

        
    </div>

    
</x-layout>