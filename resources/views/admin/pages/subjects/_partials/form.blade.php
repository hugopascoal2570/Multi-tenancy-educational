@include('admin.includes.alerts')

<div class="form-group">
    <label>* Nome:</label>
    <input type="text" name="name" class="form-control" placeholder="Nome da Matéria:"
        value="{{ $subject->name ?? old('name') }}">
</div>

<div class="form-group">
    <button type="submit" class="btn btn-success">Enviar</button>
</div>
