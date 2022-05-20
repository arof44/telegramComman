            <div class="modal" id="editPemasok{{$item->id}}">
              <div class="modal-dialog modal-lg">
                <div class="modal-content">
                <form action="{{url('pemasok_update/'.$item->id)}}" method="post">
                @csrf
                  <!-- Modal Header -->
                  <div class="modal-header">
                    <h4 class="modal-title">Edit Pemasok</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                  </div>
                  <!-- Modal body -->
                <div class="modal-body">
                  <div class="modal-body">
                     <div class="form-group first">
                        <label for="username">Nama Lengkap</label>
                        <input type="text" value="{{$item->nama}}" class="form-control" placeholder="Juan Kartolo" id="username" name="name" required>
                      </div>
                      <div class="form-group first">
                        <label for="username">No Telp</label>
                        <input type="text" value="{{$item->no_tlp}}" class="form-control" placeholder="0856000998xx" id="username" name="no_tlp" required>
                      </div>
                      <div class="form-group first">
                        <label for="username">Alamat</label>
                        <input type="text" value="{{$item->alamat}}" class="form-control" placeholder="Jalan melati NO18 Malang" id="username" name="alamat" required>
                      </div>
                 </div>
                </div>
                  <!-- Modal footer -->
                  <div class="modal-footer">
                     <input type="submit" value="Edit" class="btn btn-block btn-primary">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Tutup</button>
                  </div>
                </form>
                </div>
              </div>
            </div>

            <div class="modal" id="deletePemasok{{$item->id}}">
              <div class="modal-dialog">
                <div class="modal-content">

                  <!-- Modal Header -->
                  <div class="modal-header">
                    <h4 class="modal-title">Hapus Pemasok</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                  </div>

                  <!-- Modal body -->
                  <div class="modal-body">
                    Apakah anda yakin untuk menghapus data ?
                  </div>

                  <!-- Modal footer -->
                  <div class="modal-footer">
                    <a href="{{url('pemasok_delete/'.$item->id)}}" class="btn btn-block btn-primary">Iya</a>
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Tutup</button>
                  </div>

                </div>
              </div>
            </div>