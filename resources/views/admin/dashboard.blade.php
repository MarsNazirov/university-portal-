<x-layout>
    <!-- Заголовок -->
    <div class="app-content-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-6">
                    <h3 class="mb-0">Панель администратора</h3>
                </div>
            </div>
        </div>
    </div>

    <!-- Контент -->
    <div class="app-content">
        <div class="container-fluid">
            <!-- Статистика (Row) -->
            <div class="row">
                
                <!-- Виджет 1: Новые заявки -->
                <div class="col-lg-3 col-6">
                    <div class="small-box text-bg-primary">
                        <div class="inner">
                            <h3>15</h3>
                            <p>Новых заявок</p>
                        </div>
                        <div class="small-box-icon">
                            <i class="fas fa-file-alt"></i> <!-- Иконка документа -->
                        </div>
                        <a href="/admin/applications" class="small-box-footer link-light link-underline-opacity-0 link-underline-opacity-50-hover">
                            Смотреть все <i class="bi bi-link-45deg"></i>
                        </a>
                    </div>
                </div>

                <!-- Виджет 2: Факультеты -->
                <div class="col-lg-3 col-6">
                    <div class="small-box text-bg-success">
                        <div class="inner">
                            <h3>3</h3>
                            <p>Факультета</p>
                        </div>
                        <div class="small-box-icon">
                            <i class="fas fa-university"></i> <!-- Иконка универа -->
                        </div>
                        <a href="#" class="small-box-footer link-light link-underline-opacity-0 link-underline-opacity-50-hover">
                            Управление <i class="bi bi-link-45deg"></i>
                        </a>
                    </div>
                </div>

                <!-- Виджет 3: Пользователи -->
                <div class="col-lg-3 col-6">
                    <div class="small-box text-bg-warning">
                        <div class="inner">
                            <h3>44</h3>
                            <p>Абитуриента</p>
                        </div>
                        <div class="small-box-icon">
                            <i class="fas fa-user-graduate"></i>
                        </div>
                        <a href="#" class="small-box-footer link-dark link-underline-opacity-0 link-underline-opacity-50-hover">
                            Список <i class="bi bi-link-45deg"></i>
                        </a>
                    </div>
                </div>

            </div> <!-- /.row -->
        </div>
    </div>
</x-layout>