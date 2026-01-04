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

                        <form action="{{ route('applications.store', $faculty) }}" method="post">
                        @csrf
                            <div class="card-body">
                                
                                <div class="mb-3">
                                    <label class="form-label">Ваши баллы ЕГЭ</label>
                                    <input name="score" class="form-control" required>
                                    @error('score')
                                        <div class="text-danger small mt-1">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label class="form-label">Мотивация</label>
                                    <textarea name="message" class="form-control" rows="3" required></textarea>
                                    @error('message')
                                        <div class="text-danger small mt-1">{{ $message }}</div>
                                    @enderror
                                </div>

                            </div>

                            <div class="card-footer">
                                <button class="btn btn-primary">Отправить</button>
                            </div>

                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>
</x-layout>