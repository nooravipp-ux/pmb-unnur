<div class="card-box table-responsive">
    <table id="datatable" class="table table-striped table-bordered" style="width:100%">
        <thead>
            <tr>
                <th>ID Prodi</th>
                <th>Fakultas</th>
                <th>Nama Prodi</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @foreach($prodi as $prodi)
                <tr>
                    <td><a href="#" class="edit-id-prodi" data-type="text" data-name="id_prodi" data-pk="{{ $prodi->id_prodi }}" data-url="{{route('prodi.id',$prodi->id_prodi)}}" data-title="Edit ID Prodi">{{ $prodi->id_prodi }}</a></td>
                    <td>{{ $prodi->nama_fakultas }}</td>
                    <td><a href="#" class="edit-prodi" data-type="text" data-name="nama_prodi" data-pk="{{ $prodi->id_prodi }}" data-url="{{route('prodi.nama',$prodi->id_prodi)}}" data-title="Edit Nama Prodi">{{ $prodi->nama_prodi }}</a></td>
                    <td>
                        <a href="{{route('prodi.destroy',$prodi->id_prodi)}}" class="btn btn-sm btn-danger"><i class="glyphicon glyphicon-trash"></i> delete</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
