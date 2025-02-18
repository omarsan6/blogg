<div>
    <div class="card">

        <div class="card-header">
            <input wire:model.live="search" type="text" class="form-control" placeholder="Buscar">
        </div>

        @if ($users->count())
            <div class="card-body">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nombre</th>
                            <th>Correo</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($users as $user)
                            <tr>
                                <td>{{$user->id}}</td>
                                <td>{{$user->name}}</td>
                                <td>{{$user->email}}</td>
                                <td width="10px">
                                    <a class="btn btn-primary" href="{{route('admin.users.edit',$user)}}">
                                        Roles
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>


                </table>
            </div>

            <div class="card-footer">
                {{$users->links()}}
            </div>
        @else

            <div class="card-body">
                <p class="text-secondary font-weight-bold">No hay ningún registro :(</p>
            </div>

        @endif

    </div>
</div>
