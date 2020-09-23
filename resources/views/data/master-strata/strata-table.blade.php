<div class="card-box table-responsive">
    <table id="datatable" class="table table-striped table-bordered" style="width:100%">
        <thead>
            <tr>
                <th>ID Strata</th>
                <th>Prodi</th>
                <th>Jenjang Pendidikan</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @foreach($strata as $strata)
                <tr>
                    <td><a href="#" class="edit-strata" data-type="text" data-name="id_strata" data-pk="{{ $strata->id_strata }}" data-url="{{route('strata.id',$strata->id_strata)}}" data-title="Edit ID strata">{{ $strata->id_strata }}</a></td>
                    <td>{{ $strata->nama_prodi }}</td>
                    <td><a href="#" class="edit-strata-select" data-type="select" data-name="jenis_strata" data-pk="{{ $strata->id_strata }}" data-url="{{route('strata.jenis',$strata->id_strata)}}" data-title="Edit jenis strata">{{ $strata->jenis_strata }}</a></td>
                    <td>
                        <a href="{{route('strata.destroy',$strata->id_strata)}}" class="btn btn-sm btn-danger"><i class="glyphicon glyphicon-trash"></i> delete</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
