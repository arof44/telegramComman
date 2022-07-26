            <div class="modal" id="editBarang{{$item->id}}">
              <div class="modal-dialog modal-lg">
                <div class="modal-content">
                <form action="{{url('barang_update/'.$item->id)}}" method="post">
                @csrf
                  <!-- Modal Header -->
                  <div class="modal-header">
                    <h4 class="modal-title">Edit Barang</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                  </div>
                  <!-- Modal body -->
                  <div class="modal-body">
                     <div class="form-group first">
                        <label for="username">Nama</label>
                        <input type="text" class="form-control" placeholder="Triplek baru" id="username" name="nama" value="{{$item->nama}}" required>
                      </div>
                      <div class="form-group first">
                        <label for="username">Harga</label>
                        <input type="text" class="form-control" placeholder="0856000998xx" value="{{$item->harga}}" id="username" name="harga" required>
                      </div>
                      <div class="form-group first">
                        <label for="username">Satuan</label>
                        <input type="text" class="form-control" placeholder="Kilogram" id="username" name="satuan" required value="{{$item->satuan}}">
                      </div>
                     <div class="form-group first">
                        <label for="username">Kategori</label>
                        <select class="form-control" name="id_kategori" required>
                            @foreach($dataKategori as $kr)
                                <option value="{{$kr->id}}" {{$kr->id == $item->id_kategori?'selected':''}}>{{$kr->nama}}</option>
                            @endforeach
                        </select>
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

            <div class="modal" id="deleteBarang{{$item->id}}">
              <div class="modal-dialog">
                <div class="modal-content">

                  <!-- Modal Header -->
                  <div class="modal-header">
                    <h4 class="modal-title">Hapus Barang</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                  </div>

                  <!-- Modal body -->
                  <div class="modal-body">
                    Apakah anda yakin untuk menghapus data ?
                  </div>

                  <!-- Modal footer -->
                  <div class="modal-footer">
                    <a href="{{url('barang_delete/'.$item->id)}}" class="btn btn-block btn-primary">Iya</a>
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Tutup</button>
                  </div>

                </div>
              </div>
            </div>