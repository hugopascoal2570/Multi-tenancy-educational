@include('admin.includes.alerts')
            <div class="form-group row">
                <label class="col-sm-2 col-from-label">Nome da Turma</label>
                <div class="col-sm-4">
                <input type="text" name="name" id="name"  class="form-control @error('nome') is-invalid @enderror">
                </div>
            </div>
            <div class="col-sm-6">
            <label class="col-sm-2 col-from-label">Turno </label>
            <div class="col-sm-6">
            <select class="form-control col-sm-6" name="turno" required>
                <option class="col-sm-6" value="2021" selected>Manhã</option>
                <option value="tarde">Tarde</option>
                <option value="noite">Noite</option>
              </select>
            </div>
            </div>
            <br>
            <div class="form-group row">
                <label class="col-sm-2 col-from-label">Selecione a sala</label>
                <div class="col-sm-4">
                    <select class="form-control" name="sala" >
                        @foreach ( $salas as $sala)
                          <option value="{{$sala->id}}">{{$sala->nome}}</option>
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
                        @foreach ( $disciplinas as $disciplina)
                          <option value="{{$disciplina->id}}" >{{$disciplina->name}}</option>
                          @endforeach
                        </select>
                      </div>
                    </div>
                </div>

                  <div class="row">
                    <div class="col-sm-6">
                      <!-- Select multiple-->
                      <div class="form-group">
                        <label>Selecione Os professores que ensinam nessa Turma</label>
                        <select multiple class="form-control" name="professor[]">
                        @foreach ( $professores as $professor)
                          <option value="{{$professor->id}}" >{{$professor->name}}</option>
                          @endforeach
                        </select>
                      </div>
                    </div>
                </div>
                <div class="form-group row">
                <label class="col-sm-2 col-from-label"></label>
                <input type="submit" value="cadastrar" class="btn btn-success">
            </div>