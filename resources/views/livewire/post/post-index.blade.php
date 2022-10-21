<div class="body flex-grow-1 px-3">
	<div class="container-lg">
		<div class="card mb-4">
            <div class="card-body">
				<h3>Daftar Publikasi</h3>
				<hr>
				<!--div class="row mt-2 mb-2">
					<div class="col-sm-2">
						&nbsp;&nbsp;&nbsp;<strong>Per halaman</strong>
					</div>
					<div class="col-1">
						<select class="form-control" wire:model="perhalaman">
							<option value="5" selected>5</option>
							<option value="10">10</option>
							<option value="20">20</option>
							<option value="50">50</option>
							<option value="100">100</option>
						</select>
					</div>
				</div-->
				<div class="table-responsive">
                    <table class="table border mb-0 table-striped">
                      <thead class="table-light fw-semibold">
                        <tr class="align-middle">
                          <th class="text-center">
                            No
                          </th>
                          <th class="text-center" colspan="2">Judul</th>
                          <th class="text-center">User</th>
                          <th class="text-center">Kategori</th>
                          <th class="text-center">Prodi</th>
                          <th class="text-center">Tanggal</th>
                        </tr>
                      </thead>
                      <tbody>
					  @if(count($data['posts'])==0)
						<tr class="align-middle">
                          <td class="text-center" colspan="8">
						  Tidak ada data
						  </td>
						</tr>
					  @endif
					  @isset($data['posts'])
						@foreach($data['posts'] as $post)
                        <tr class="align-middle">
                          <td class="text-center">
						  {{ $loop->iteration }}
                          </td>
                          <td>
                            @if(isset($post->thumbnail))
								<div class="avatar avatar-lg"><img class="avatar-img" src="{{ asset('storage/images/'.$post->thumbnail) }}"></div>
							@else
								<div class="avatar avatar-lg"><img class="avatar-img" src="{{ asset('admin/thumbnail-default.jpg') }}"></div>
							@endif
                          </td>
						  <td>
                            <div>{{ ucfirst($post->judul) }}</div>
							<span class="badge text-bg-warning text-white">Lihat</span>
							<a href="{{ route('post.edit', ['post' => $post->id]) }}"><span class="badge text-bg-dark">Edit</span></a>
							<a href="#" wire:click="setPostId({{$post->id}})" data-coreui-toggle="modal" data-coreui-target="#postModalEdit"><span class="badge text-bg-danger text-white">Hapus</span></a>
                          </td>
						  <td>
                            {{ $data['nama_user'][$loop->index] }}
                          </td>
						  <td>
						  @if($data['nama_kategori'][$loop->index])
							{{ $data['nama_kategori'][$loop->index] }}
						  @else
							-
						  @endif
                          </td>
						  <td>
						  @if($data['nama_prodi'][$loop->index])
                            {{ $data['nama_prodi'][$loop->index] }}
						  @else
							-
						  @endif
                          </td>
						  <td>
							@if($post->status_post == 'published')
								<span class="badge text-bg-success">{{ ucfirst($post->status_post) }}</span>
							@else
								<span class="badge text-bg-dark">{{ ucfirst($post->status_post) }}</span>
							@endif                            
                            <div class="small text-medium-emphasis">{{ date('d-m-Y', strtotime($post->created_at)) }}</div>
                          </td>
                        </tr>
						@endforeach
					@endisset
                      </tbody>
                    </table>					
                  </div>
            </div>
          </div>
	</div>
	<!-- Modal -->
	<div class="modal fade" id="postModalEdit" tabindex="-1" wire:ignore.self>
	  <div class="modal-dialog">
		<div class="modal-content">
		  <div class="modal-header">
			<h5 class="modal-title" id="exampleModalLabel">Hapus Publikasi</h5>
			<button type="button" class="btn-close" data-coreui-dismiss="modal" aria-label="Close"></button>
		  </div>
		  <div class="modal-body">
			Apakah Anda yakin ingin menghapusnya?
		  </div>
		  <div class="modal-footer">
			<button type="button" class="btn btn-secondary text-white" data-coreui-dismiss="modal">Tidak</button>
			<button type="button" class="btn btn-danger text-white" wire:click="hapusPost({{$post_id}})" data-coreui-toggle="modal" data-coreui-target="#postModalEdit">Ya, Hapus</button>
		  </div>
		</div>
	  </div>
	</div>
</div>