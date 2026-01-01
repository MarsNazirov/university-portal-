<x-layout>
    <div class="app-content-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-6">
                    <h3 class="mb-0">Подача заявки</h3>
                </div>
            </div>
        </div>
    </div>

    <div class="app-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-6">
                    
                    <div class="card card-primary card-outline">
                        <div class="card-header">
                            <h3 class="card-title">
                                {{ $faculty->name }}
                            </h3>
                        </div>

                        <!-- Твой тег form пиши здесь -->
                        <form>
                            
                            <!-- Не забудь защиту -->

                            <div class="card-body">
                                
                                <div class="mb-3">
                                    <label class="form-label">Ваши баллы ЕГЭ</label>
                                    <input class="form-control">
                                </div>

                                <div class="mb-3">
                                    <label class="form-label">Мотивация</label>
                                    <!-- Твой textarea для текста -->
                                    <textarea class="form-control" rows="3"></textarea>
                                </div>

                            </div>

                            <div class="card-footer">
                                <!-- Твоя кнопка -->
                                <button class="btn btn-primary">Отправить</button>
                            </div>

                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>
</x-layout>