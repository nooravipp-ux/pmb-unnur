<div class="card-box table-responsive">
    <table id="datatable" class="table table-striped table-bordered" style="width:100%">
        <thead>
            @php
                $no = 1;
            @endphp
            <tr>
                <th>NO</th>
                <th>ID Strata</th>
                <th>ID Prodi</th>
                <th>Jenis Strata</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @foreach($strata as $strata)
                <tr>
                    <td>{{ $no++ }}</td>
                    <td>{{ $strata->id_strata }}</td>
                    <td>{{ $strata->id_prodi }}</td>
                    <td>{{$strata->jenis_strata}}</td>
                    <td>
                        <a href="{{route('strata.edit',$strata->id_strata)}}" class="btn btn-sm btn-warning"><i class="glyphicon glyphicon-pencil"></i> edit</a>
                        <a href="{{route('strata.destroy',$strata->id_strata)}}" class="btn btn-sm btn-danger"><i class="glyphicon glyphicon-trash"></i> delete</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
