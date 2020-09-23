<div class="card-box table-responsive">
    <table id="datatable" class="table table-striped table-bordered" style="width:100%">
        <thead>
            <tr>
                <th>ID Strata</th>
                <th>Jenjang Pendidikan</th>
                <th>Nama Kelas</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @foreach($kelas as $kelas)
                <tr>
                    <td><a href="#" class="edit-kelas" data-type="text" data-name="id_kelas" data-pk="{{ $kelas->id_kelas }}" data-url="{{route('kelas.id',$kelas->id_kelas)}}" data-title="Edit ID kelas">{{ $kelas->id_kelas }}</a></td>
                    <td>{{ $kelas->jenis_strata }}</td>
                    <td><a href="#" class="edit-kelas-select" data-type="select" data-name="nama_kelas" data-pk="{{ $kelas->id_kelas }}" data-url="{{route('kelas.jenis',$kelas->id_kelas)}}" data-title="Edit jenis kelas">{{ $kelas->nama_kelas }}</a></td>
                    <td>
                        <a href="{{route('kelas.destroy',$kelas->id_kelas)}}" class="btn btn-sm btn-danger"><i class="glyphicon glyphicon-trash"></i> delete</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
