            <div class="modal" id="editNasabah{{$item->id}}">
              <div class="modal-dialog modal-lg">
                <div class="modal-content">
                <form action="{{url('edit_nasabah/'.$item->id)}}" method="post">
                @csrf
                  <!-- Modal Header -->
                  <div class="modal-header">
                    <h4 class="modal-title">Edit Nasabah</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                  </div>
                  <!-- Modal body -->
                <div class="modal-body">
                     <div class="form-group first">
                        <label for="username">Nama Lengkap</label>
                        <input type="text" class="form-control" placeholder="Juan Kartolo" id="username" name="name" required value="{{$item->nama}}">
                      </div>
                      <div class="form-group first">
                        <label for="username">Alamat Lengkap</label>
                        <textarea class="form-control"  name="alamat" placeholder="Jl. Soekarno Hatta No.9, Jatimulyo, Kec. Lowokwaru, Kota Malang, Jawa Timur 65141" required>{{$item->alamat}}</textarea>
                      </div>
                      <div class="form-group first">
                        <label for="username">Nomor Telepon Yang Bisa Dihubungi</label>
                        <input type="text" class="form-control" placeholder="08567169983711" id="username" name="phone" required value="{{$item->phone}}">
                      </div>
                      <div class="form-group first">
                        <label for="username">Jenis Anggota</label>
                        <select class="form-control" name="kelompok">
                            <option value="Individu" {{$item->kelompok == 'Individu'?'selected':''}}>Individu</option>
                            <option value="Kelompok" {{$item->kelompok == 'Kelompok'?'selected':''}}>Kelompok</option>
                        </select>
                      </div>
                      <div class="form-group first">
                        <label for="username">Kesepakatan Harga</label>
                        <select class="form-control" name="jenis_trs">
                            <option value="Langsung" {{$item->jenis_trs == 'Langsung'?'selected':''}}>Langsung</option>
                            <option value="Ditabung" {{$item->jenis_trs == 'Ditabung'?'selected':''}}>Ditabung</option>
                        </select>
                      </div>
                      <div class="form-group first">
                        <label for="username">Email</label>
                        <input type="email" class="form-control" placeholder="email@gmail.com" id="username" name="email" required value="{{$item->email}}" readonly>
                      </div>
                      <div class="form-group last mb-3">
                        <label for="password">Password</label>
                        <input type="password" class="form-control" placeholder="Password" id="password"  name="password_nasabah">
                        <input type="hidden" name="old_password" value="{{$item->password}}">
                        <small style="color: red;">Kosongi password jika tidak diupdate!</small>
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

            <div class="modal" id="deleteNasabah{{$item->id}}">
              <div class="modal-dialog">
                <div class="modal-content">

                  <!-- Modal Header -->
                  <div class="modal-header">
                    <h4 class="modal-title">Hapus Nasabah</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                  </div>

                  <!-- Modal body -->
                  <div class="modal-body">
                    Apakah anda yakin untuk menghapus data ?
                  </div>

                  <!-- Modal footer -->
                  <div class="modal-footer">
                    <a href="{{url('hapus_nasabah/'.$item->id)}}" class="btn btn-block btn-primary">Iya</a>
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Tutup</button>
                  </div>

                </div>
              </div>
            </div>