@extends('admin.layout.template')
@section('content')
<div class="body flex-grow-1 px-3">
	<div class="container-lg">
		<div class="card mb-4">
            <div class="card-body">
				<div class="table-responsive">
                    <table class="table border mb-0">
                      <thead class="table-light fw-semibold">
                        <tr class="align-middle">
                          <th class="text-center">
                            <svg class="icon">
                              <use xlink:href="{{ asset('admin/vendors/@coreui/icons/svg/free.svg#cil-people') }}') }}"></use>
                            </svg>
                          </th>
                          <th>User</th>
                          <th class="text-center">Role</th>
                          <th></th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr class="align-middle">
                          <td class="text-center">
                            <div class="avatar avatar-md"><img class="avatar-img" src="{{ asset('admin/assets/img/avatars/1.jpg') }}" alt="user@email.com"><span class="avatar-status bg-success"></span></div>
                          </td>
                          <td>
                            <div>Yiorgos Avraamu</div>
                            <div class="small text-medium-emphasis"><span>New</span> | Registered: Jan 1, 2020</div>
                          </td>
                          <td class="text-center">
                            <svg class="icon icon-xl">
                              <use xlink:href="{{ asset('admin/vendors/@coreui/icons/svg/flag.svg#cif-us') }}') }}"></use>
                            </svg>
                          </td>
                          <td>
                            
                          </td>
                        </tr>
                      </tbody>
                    </table>
                  </div>
            </div>
          </div>
	</div>
</div>
@endsection