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
                <div class="col-lg-4 col-md-6 col-12 mb-3">
                    <div class="card card-primary card-outline h-100">
                        <div class="card-header">
                            <h5 class="card-title fw-bold">Факультет ИТ</h5>
                        </div>
                        <div class="card-body">
                            <p class="card-text">Программирование, ИИ и безопасность.</p>
                            <ul class="list-unstyled mb-4">
                                <li>👨‍🎓 Мест: <b>25</b></li>
                                <li>⏳ Срок: <b>4 года</b></li>
                            </ul>
                            <button class="btn btn-primary w-100">Подать заявку</button>
                        </div>
                    </div>
                </div>

                <!-- Экономический -->
                <div class="col-lg-4 col-md-6 col-12 mb-3">
                    <div class="card card-success card-outline h-100">
                        <div class="card-header">
                            <h5 class="card-title fw-bold">Экономический</h5>
                        </div>
                        <div class="card-body">
                            <p class="card-text">Финансы, кредит, бухгалтерия.</p>
                            <ul class="list-unstyled mb-4">
                                <li>👨‍🎓 Мест: <b>15</b></li>
                                <li>⏳ Срок: <b>4 года</b></li>
                            </ul>
                            <button class="btn btn-success w-100">Подать заявку</button>
                        </div>
                    </div>
                </div>

                <!-- Юридический -->
                <div class="col-lg-4 col-md-6 col-12 mb-3">
                    <div class="card card-warning card-outline h-100">
                        <div class="card-header">
                            <h5 class="card-title fw-bold">Юридический</h5>
                        </div>
                        <div class="card-body">
                            <p class="card-text">Право, суд, адвокатура.</p>
                            <ul class="list-unstyled mb-4">
                                <li>👨‍🎓 Мест: <b>10</b></li>
                                <li>⏳ Срок: <b>5 лет</b></li>
                            </ul>
                            <button class="btn btn-warning w-100">Подать заявку</button>
                        </div>
                    </div>
                </div>
            </div> 
            <!-- Конец карточек -->

        </div>
    </div>
</x-layout>