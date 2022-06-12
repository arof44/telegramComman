            <div class="modal" id="editPengguna{{$item->id}}">
              <div class="modal-dialog modal-lg">
                <div class="modal-content">
                <form action="{{url('pengguna_update/'.$item->id)}}" method="post">
                @csrf
                  <!-- Modal Header -->
                  <div class="modal-header">
                    <h4 class="modal-title">Edit Pengguna</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                  </div>
                  <!-- Modal body -->
                <div class="modal-body">
                     <div class="form-group first">
                        <label for="username">Nama Lengkap</label>
                        <input type="text" class="form-control" placeholder="Juan Kartolo" id="username" name="name" required value="{{$item->name}}">
                      </div>
                       <div class="form-group first">
                        <label for="username">Username Telegram</label>
                        <input type="text" class="form-control" placeholder="juankartolo" id="username" name="username_telegram" value="{{$item->username_telegram}}">
                      </div>
                      <div class="form-group first">
                        <label for="username">Role</label>
                        <select class="form-control" name="role" required>
                            <option value="admin" {{$item->role == 'admin'?'selected':''}}>Admin</option>
                            <option value="pengurus" {{$item->role == 'pengurus'?'selected':''}}>Pengurus</option>
                        </select>
                      </div>
                      <div class="form-group first">
                        <label for="username">Email</label>
                        <input type="email" class="form-control" placeholder="email@gmail.com" id="username" name="email" required value="{{$item->email}}" readonly>
                      </div>
                      <div class="form-group last mb-3">
                        <label for="password">Password</label>
                        <input type="password" class="form-control" placeholder="Password" id="password"  name="password">
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

            <div class="modal" id="deletePengguna{{$item->id}}">
              <div class="modal-dialog">
                <div class="modal-content">

                  <!-- Modal Header -->
                  <div class="modal-header">
                    <h4 class="modal-title">Hapus Pengguna</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                  </div>

                  <!-- Modal body -->
                  <div class="modal-body">
                    Apakah anda yakin untuk menghapus data ?
                  </div>

                  <!-- Modal footer -->
                  <div class="modal-footer">
                    <a href="{{url('pengguna_delete/'.$item->id)}}" class="btn btn-block btn-primary">Iya</a>
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Tutup</button>
                  </div>

                </div>
              </div>
            </div>