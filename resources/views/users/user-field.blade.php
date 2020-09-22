<div class="modal fade left" id="add-user-modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title" id="exampleModalLabel"><i class="fa fa-id-badge" aria-hidden="true"></i>
                    Fakultas</h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- fakultas Field -->
                <div class="form-group col-sm-12">
                    <label for="">ID Prodi</label><br>
                    <select name="id_prodi" id="id_prodi"
                        class="form-control input {{ $errors->has('id_prodi') ? 'is-invalid':'' }}"
                        required>
                        <option disabled selected>- Pilih ID Prodi -</option>
                        @foreach($prodi as $item)
                            <option value="{{$item->id_prodi}}">{{$item->id_prodi}} - {{$item->nama_prodi}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group col-sm-6">
                    <label for="">Name</label><br>
                    <input type="text" name="name" id="name"
                        class="form-control input {{ $errors->has('name') ? 'is-invalid':'' }}"
                        placeholder="Isi nama User Baru" required>
                </div>
                <div class="form-group col-sm-6">
                    <label for="">Role</label><br>
                    <select name="role" id="role"
                        class="form-control input {{ $errors->has('role') ? 'is-invalid':'' }}"
                        required>
                        <option disabled selected>- Pilih ID Role -</option>
                        <option value="1">Admin</option>
                        <option value="2">Keuangan</option>
                        <option value="3">Prodi</option>
                    </select>
                </div>
                <div class="form-group col-sm-6">
                    <label for="">Email</label><br>
                    <input type="email" name="email" id="email"
                        class="form-control input {{ $errors->has('email') ? 'is-invalid':'' }}"
                        placeholder="Masukan Email" required>
                </div>
                <div class="form-group col-sm-6">
                    <label for="">Password</label><br>
                    <input type="text" name="password" id="password"
                        class="form-control input {{ $errors->has('password') ? 'is-invalid':'' }}"
                        placeholder="Masukan password" required>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-sm btn-warning" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-sm btn-primary">Submit</button>
            </div>
        </div>
    </div>
</div>
