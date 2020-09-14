<div class="modal fade left" id="add-prodi-modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                    <label for="">ID Fakultas</label><br>
                    <select style name="id_fakultas" id="id_fakultas" class="form-control {{ $errors->has('id_fakultas') ? 'is-invalid':'' }}"></select>
                </div>
                <div class="form-group col-sm-6">
                    <label for="">ID Prodi</label><br>
                    <input type="text" name="id_prodi" id="id_prodi" class="form-control {{ $errors->has('id_prodi') ? 'is-invalid':'' }}"
                        placeholder="Tentukan Id prodi" required>
                </div>
                <div class="form-group col-sm-6">
                    <label for="">Nama Prodi</label><br>
                    <input type="text" name="nama_prodi" id="nama_prodi" class="form-control {{ $errors->has('nama_prodi') ? 'is-invalid':'' }}"
                        placeholder="Masukan Nama prodi" required>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-sm btn-warning" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-sm btn-primary">Submit</button>
            </div>
        </div>
    </div>
</div>
