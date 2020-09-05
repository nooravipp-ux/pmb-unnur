<div class="modal fade left" id="add-strata-modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title" id="exampleModalLabel"><i class="fa fa-id-badge" aria-hidden="true"></i>
                    Strata</h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- fakultas Field -->
                <div class="form-group col-sm-12">
                    <label for="">ID prodi</label><br>
                    <select name="id_prodi" id="id_prodi" class="form-control {{ $errors->has('id_fakultas') ? 'is-invalid':'' }}" required>
                        <option disabled selected>- Pilih ID prodi -</option>
                        @foreach($prodi as $prodi)
                            <option>
                                {{ $prodi }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group col-sm-6">
                    <label for="">ID Strata</label><br>
                    <input type="text" name="id_strata" id="id_strata" class="form-control {{ $errors->has('id_strata') ? 'is-invalid':'' }}"
                        placeholder="Tentukan Id strata" required>
                </div>
                <div class="form-group col-sm-6">
                    <label for="">Strata</label><br>
                    <select name="jenis_strata" id="jenis_strata" class="form-control {{ $errors->has('id_fakultas') ? 'is-invalid':'' }}" required>
                        <option disabled selected>- Pilih Jenis Strata -</option>
                        <option value="D3">D3</option>
                        <option value="S1">S1</option>
                        <option value="S2">S2</option>
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
