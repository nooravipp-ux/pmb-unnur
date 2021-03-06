<div class="card-box table-responsive">
    <table id="datatable" class="table table-striped table-bordered" style="width:100%">
        <thead>
            <tr>
                <th>ID Fakultas</th>
                <th>Nama fakultas</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @foreach($fakultas as $fakultas)
                <tr>
                    <td><a href="javascript:void(null)" class="edit-id-fakultas" data-type="text" data-name="id_fakultas" data-pk="{{ $fakultas->id_fakultas }}" data-url="{{route('fakultas.id',$fakultas->id_fakultas)}}" data-title="Edit nama fakultas">{{ $fakultas->id_fakultas }}</a></td>
                    <td><a href="javascript:void(null)" class="edit-fakultas" data-type="text" data-name="nama_fakultas" data-pk="{{ $fakultas->id_fakultas }}" data-url="{{route('fakultas.edit',$fakultas->id_fakultas)}}" data-title="Edit nama fakultas">{{ $fakultas->nama_fakultas }}</a></td>
                    <td>
                        <a href="{{route('fakultas.destroy',$fakultas->id_fakultas)}}" class="btn btn-sm btn-danger"><i class="glyphicon glyphicon-trash"></i> delete</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
