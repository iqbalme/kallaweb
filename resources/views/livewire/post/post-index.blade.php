<div class="body flex-grow-1 px-3">
	<div class="container-lg">
		<div class="card mb-4">
            <div class="card-body">
				<h3>Daftar Publikasi</h3>
				
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
				<hr>
				
			<div class="row justify-content-md-between">
				<!-- Perhalaman -->
				<div class="col-lg-auto">
					<div class="input-group mb-3">
					  <div class="input-group-prepend">
						<span class="input-group-text" id="basiaddon3">Perhalaman</span>
					  </div>
						  <select class="form-control" wire:model="perhalaman">
							<option value="5" selected>5</option>
							<option value="10">10</option>
							<option value="20">20</option>
							<option value="50">50</option>
							<option value="100">100</option>
						  </select>
					</div>
				</div>
				<!-- End Perhalaman -->
				
				<!-- Pencarian -->
				<div class="col-8">
					<div class="input-group mb-3">
					  <input type="text" class="form-control" placeholder="Ketik di sini..." wire:model="cari_post">
					  <div class="input-group-append">
						<span class="input-group-text" id="basiaddon2">Cari</span>
					  </div>
					</div>
				</div>
				<!-- End Pencarian -->
			</div>
				
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
		  
		  <!-- Pagination -->
		  {{ $data['posts']->links('vendor.livewire.bootstrap') }}
		  
		  <!--nav aria-label="pagination">
			  <ul class="pagination justify-content-center">
				<li class="page-item disabled">
				  <a class="page-link" href="#" tabindex="-1" aria-disabled="true">Previous</a>
				</li>
				<li class="page-item"><a class="page-link" href="#">1</a></li>
				<li class="page-item active" aria-current="page">
				  <a class="page-link" href="#">2</a>
				</li>
				<li class="page-item"><a class="page-link" href="#">3</a></li>
				<li class="page-item">
				  <a class="page-link" href="#">Next</a>
				</li>
			  </ul>
			</nav-->
		  <!-- End Pagination -->
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