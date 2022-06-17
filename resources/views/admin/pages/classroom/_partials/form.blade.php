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

                  <div class="row">
                    <div class="col-sm-6">
                      <!-- Select multiple-->
                      <div class="form-group">
                        <label>Selecione as matérias que deseja</label>
                        <select multiple class="form-control" name="disciplina[]">
                        @foreach ( $subjects as $subject)
                          <option value="{{$subject->id}}" >{{$subject->name}}</option>
                          @endforeach
                        </select>
                      </div>
                    </div>
                </div>


                <div class="form-group row">
                <label class="col-sm-2 col-from-label"></label>
                <input type="submit" value="cadastrar" class="btn btn-success">
            </div>