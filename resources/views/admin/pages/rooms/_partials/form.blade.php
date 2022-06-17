@include('admin.includes.alerts')

<div class="form-group">
    <label>* Nome da sala:</label>
    <input type="text" name="name" class="form-control" placeholder="Nome da Sala:"
        value="{{ $room->name ?? old('name') }}">
</div>

<div class="form-group">
    <label>* Número da sala:</label>
    <input type="text" name="numberRoom" class="form-control" placeholder="Número da sala:"
        value="{{ $room->numberRoom ?? old('numberRoom') }}">
</div>


<div class="form-group">
    <label>*Hora de Início da aula:</label>
    <input type="time" id="start" name="start" min="07:00" max="22:00" value="{{ $room->start ?? old('start') }}">
</div>

<div class="form-group">
    <label>*Hora de Fim da aula:</label>
    <input type="time" id="end" name="end" min="07:00" max="22:00" value="{{ $room->end ?? old('end') }}">
</div>

<div class="form-group">
    <button type="submit" class="btn btn-success">Enviar</button>
</div>
