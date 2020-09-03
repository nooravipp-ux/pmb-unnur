<div class="card-box table-responsive">
    <table id="datatable" class="table table-striped table-bordered" style="width:100%">
        <thead>
            @php
                $no = 1;
            @endphp
            <tr>
                <th>NO</th>
                <th>ID Kelas</th>
                <th>ID Strata</th>
                <th>Nama Kelas</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @foreach($kelas as $kelas)
                <tr>
                    <td>{{ $no++ }}</td>
                    <td>{{ $kelas->id_kelas }}</td>
                    <td>{{ $kelas->id_strata }}</td>
                    <td>{{ $kelas->nama_kelas }}</td>
                    <td>
                         {{-- <a href="{{route('kelas.edit',$kelas->id_kelas)}}" class="btn btn-sm btn-warning"><i class="glyphicon glyphicon-pencil"></i> edit</a> --}}
                        <a href="{{route('kelas.destroy',$kelas->id_kelas)}}" class="btn btn-sm btn-danger"><i class="glyphicon glyphicon-trash"></i> delete</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
