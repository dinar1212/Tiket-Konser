<div class="modal fade" id="payment" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="payModalLabel">Tiket</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('checkin.store') }}" method="post">
                    @csrf
                    <div class="row">
                        <div class="col mb-3">
                            <label class="form-label">Nama</label>
                            <input type="text" name="nama"
                                class="form-control mb-2  @error('nama') is-invalid @enderror"
                                placeholder="Nama Payment" value="{{ old('nama') }}">
                            @error('nama')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror

                        </div>

                        

                  
                    <div class="row">
                        <div class="col mb-3">
                            <label class="form-label">No Telpon</label>
                            <input type="text" name="no_telpon"
                                class="form-control mb-2  @error('no_telpon') is-invalid @enderror"
                                placeholder="No telpon" value="{{ old('no_telpon') }}">
                            @error('no_telpon')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
    
                        </div>
                    </div>

                    <div class="row">
                        <div class="col mb-3">
                            <label class="form-label">Jumlah</label>
                            <input type="text" name="jumlah"
                                class="form-control mb-2  @error('jumlah') is-invalid @enderror"
                                placeholder="Jumlah Tiket" value="{{ old('jumlah') }}">
                            @error('jumlah')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
    
                        </div>
                    </div>

                    <div class="row">
                        <div class="col mb-3">
                            <label class="form-label">Jenis</label>
                            <input type="text" name="jenis"
                                class="form-control mb-2  @error('jenis') is-invalid @enderror"
                                placeholder="Jenis Tiket" value="{{ old('jenis') }}">
                            @error('jenis')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
    
                        </div>
                    </div>
                        {{-- <div class="row">
                    <div class="col mb-3">
                        <label class="form-label">No Telpon </label>
                        <input type="text" name="no_telpon"
                            class="form-control mb-2  @error('no_telpon') is-invalid @enderror"
                            placeholder="Nama Payment" value="{{ old('no_telpon') }}">
                        @error('no_telpon')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="row">
                <div class="col mb-3">
                    <label class="form-label">Jumlah</label>
                    <input type="text" name="jumlah"
                        class="form-control mb-2  @error('jumlah') is-invalid @enderror"
                        placeholder="Nama Payment" value="{{ old('jumlah') }}">
                    @error('jumlah')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="row">
            <div class="col mb-3">
                <label class="form-label">Jenis/label>
                <input type="text" name="jenis"
                    class="form-control mb-2  @error('jenis') is-invalid @enderror"
                    placeholder="Nama Payment" value="{{ old('jenis') }}">
                @error('jenis')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div> --}}
        </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                    Close
                </button>
                <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
        </div>
        </form>
    </div>
</div>
