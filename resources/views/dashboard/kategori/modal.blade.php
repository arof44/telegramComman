            <div class="modal" id="editKategori{{$item->id}}">
              <div class="modal-dialog modal-lg">
                <div class="modal-content">
                <form action="{{url('kategori_update/'.$item->id)}}" method="post">
                @csrf
                  <!-- Modal Header -->
                  <div class="modal-header">
                    <h4 class="modal-title">Edit Kategori</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                  </div>
                  <!-- Modal body -->
                <div class="modal-body">
                  <div class="modal-body">
                     <div class="form-group first">
                        <label for="username">Nama</label>
                        <input type="text" value="{{$item->nama}}" class="form-control" placeholder="Bahan Baku" id="username" name="nama" required>
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

            <div class="modal" id="deleteKategori{{$item->id}}">
              <div class="modal-dialog">
                <div class="modal-content">

                  <!-- Modal Header -->
                  <div class="modal-header">
                    <h4 class="modal-title">Hapus Kategori</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                  </div>

                  <!-- Modal body -->
                  <div class="modal-body">
                    Apakah anda yakin untuk menghapus data ?
                  </div>

                  <!-- Modal footer -->
                  <div class="modal-footer">
                    <a href="{{url('kategori_delete/'.$item->id)}}" class="btn btn-block btn-primary">Iya</a>
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Tutup</button>
                  </div>

                </div>
              </div>
            </div>