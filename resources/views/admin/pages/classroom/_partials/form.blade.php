@include('admin.includes.alerts')
            <div class="form-group row">
                <label class="col-sm-2 col-from-label">Nome da Turma</label>
                <div class="col-sm-4">
                <input type="text" name="name" id="name"  class="form-control @error('nome') is-invalid @enderror">
                </div>
            </div>

            <br>
            <div class="form-group row">
                <label class="col-sm-2 col-from-label">Selecione a sala</label>
                <div class="col-sm-4">
                    <select class="form-control" name="sala" >
                        @foreach ( $classes as $class)
                          <option value="{{$class->id}}">{{$class->name}}</option>
                          @endforeach
                        </select>
                </div>
            </div>

            <div class="form-group row">
              <label class="col-sm-2 col-from-label">Selecione os professores</label>
              <div class="col-sm-4">
                  <select multiple class="form-control" name="teachers[]" >
                      @foreach ( $teachers as $teacher)
                      @if ($teacher->name == 'admin')
                      
                      @else
                        <option value="{{$teacher->id}}">{{$teacher->name}}</option>
                        @endif
                        @endforeach
                      </select>
              </div>
          </div>
                <div class="form-group row">
                <label class="col-sm-2 col-from-label"></label>
                <input type="submit" value="cadastrar" class="btn btn-success">
            </div>