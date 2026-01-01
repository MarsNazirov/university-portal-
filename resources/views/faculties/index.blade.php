<x-layout>
    <!-- 1. Блок ЗАГОЛОВКА (дает отступ сверху и нужный шрифт) -->
    <div class="app-content-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-6">
                    <h3 class="mb-0">Наши факультеты</h3>
                </div>
            </div>
        </div>
    </div>

    <!-- 2. Блок КОНТЕНТА (дает отступы по бокам) -->
    <div class="app-content">
        <div class="container-fluid">
            
            <!-- Твои карточки -->
            <div class="row">
                <!-- Факультет ИТ -->
                @foreach($faculties as $faculty)
                <div class="col-lg-4 col-md-6 col-12 mb-3">
                    <div class="card card-primary card-outline h-100">
                        <div class="card-header">
                            <h5 class="card-title fw-bold">{{ $faculty->title }}</h5>
                        </div>
                        <div class="card-body">
                            <p class="card-text">{{ $faculty->description }}</p>
                            <ul class="list-unstyled mb-4">
                                <li>👨‍🎓 Мест: <b>{{ $faculty->budget_places }}</b></li>
                                <li>⏳ Срок: <b>{{ $faculty->education_years }}</b></li>
                                <a href="{{ route('faculties.show', $faculty) }}" class="btn btn-primary w-100">
                                Подробнее
                            </a>
                            </ul>
                            
                            <a href="{{ route('applications.create', $faculty) }}" class="btn btn-primary w-100">Подать заявку</a>
                        </div>
                        
                    </div>
                </div>
                @endforeach
            </div> 
            <!-- Конец карточек -->

        </div>
    </div>
</x-layout>