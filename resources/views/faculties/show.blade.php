<x-layout>
    <!-- Заголовок и кнопка "Назад" -->
    <div class="app-content-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-6">
                    <h3 class="mb-0">{{ $faculty->name }}</h3>
                </div>
                <div class="col-sm-6 text-end">
                    <a href="/" class="btn btn-secondary btn-sm">
                        <i class="fas fa-arrow-left"></i> Назад к списку
                    </a>
                </div>
            </div>
        </div>
    </div>

    <!-- Основной контент -->
    <div class="app-content">
        <div class="container-fluid">
            <div class="row">
                
                <!-- Левая колонка: Описание -->
                <div class="col-md-8">
                    <div class="card card-primary card-outline mb-4">
                        <div class="card-header">
                            <h5 class="card-title">Информация о направлении</h5>
                        </div>
                        <div class="card-body">
                            <p class="lead">
                                {{ $faculty->description }}
                            </p>
                            <hr>
                            <p>
                                <strong>Здесь будет подробный текст:</strong> <br>
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit. 
                                В будущем добавим сюда поле "full_text" в базу данных, 
                                чтобы описание было длинным и красивым.
                            </p>
                        </div>
                    </div>
                </div>

                <!-- Правая колонка: Цифры и Действие -->
                <div class="col-md-4">
                    
                    <!-- Карточка с цифрами -->
                    <div class="card mb-4">
                        <div class="card-header bg-light">
                            <h5 class="card-title m-0">Условия поступления</h5>
                        </div>
                        <div class="card-body p-0">
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    Бюджетных мест
                                    <span class="badge bg-primary rounded-pill">{{ $faculty->budget_places }}</span>
                                </li>
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    Срок обучения
                                    <span class="fw-bold">{{ $faculty->education_years }} года</span>
                                </li>
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    Форма
                                    <span class="text-muted">Очная</span>
                                </li>
                            </ul>
                        </div>
                    </div>

                    <!-- Кнопка действия -->
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Готовы поступить?</h5>
                            <p class="card-text small text-muted mt-2">
                                Заполните анкету, это займет 5 минут.
                            </p>
                            <!-- Ссылка пока пустая, потом сделаем форму -->
                            <a href="#" class="btn btn-success w-100 btn-lg">
                                <i class="fas fa-check-circle"></i> Подать заявку
                            </a>
                        </div>
                    </div>

                </div>

            </div>
        </div>
    </div>
</x-layout>