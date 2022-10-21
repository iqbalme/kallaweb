@extends('admin.layout.template')
@section('content')
	@if($isUpdate)
		<livewire:post.post-update :post_id="$post->id" />
	@else
		<livewire:post.post-create />
	@endif
@endsection