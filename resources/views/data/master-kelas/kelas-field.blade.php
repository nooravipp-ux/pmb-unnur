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
                    <label for="">Jenjang Pendidikan</label><br>
                    <select name="id_strata" id="id_jenjang_prodi" class="form-control {{ $errors->has('id_strata') ? 'is-invalid':'' }}" required></select>
                </div>
                <div class="form-group col-sm-12">
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
