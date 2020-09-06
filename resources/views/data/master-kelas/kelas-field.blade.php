<div class="modal fade left" id="add-kelas-modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title" id="exampleModalLabel"><i class="fa fa-id-badge" aria-hidden="true"></i>
                    Kelas</h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- fakultas Field -->
                <div class="form-group col-sm-12">
                    <label for="">ID Strata</label><br>
                    <select name="id_strata" id="id_strata" class="form-control {{ $errors->has('id_strata') ? 'is-invalid':'' }}" required>
                        <option disabled selected>- Pilih ID Strata -</option>
                        @foreach($strata as $strata)
                            <option>
                                {{ $strata }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group col-sm-6">
                    <label for="">ID Kelas</label><br>
                    <input type="text" name="id_kelas" id="id_kelas" class="form-control {{ $errors->has('id_kelas') ? 'is-invalid':'' }}"
                        placeholder="Tentukan Id kelas" required>
                </div>
                <div class="form-group col-sm-6">
                    <label for="">Nama Kelas</label><br>
                    <select name="nama_kelas" id="nama_kelas" class="form-control {{ $errors->has('nama_kelas') ? 'is-invalid':'' }}" required>
                        <option disabled selected>- Pilih Kelas -</option>
                        <option value="Reguler pagi">Reguler Pagi</option>
                        <option value="Reguler Sore">Reguler Sore</option>
                        <option value="Week End">Week End</option>
                    </select>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-sm btn-warning" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-sm btn-primary">Submit</button>
            </div>
        </div>
    </div>
</div>
