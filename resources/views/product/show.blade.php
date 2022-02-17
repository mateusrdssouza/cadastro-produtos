@extends('layouts.app')

@section('content')

<div class="container">
	<div class="row justify-content-center">
		<div class="col-md-6">
			<div class="card mt-5">

				<div class="card-header">
					Visualizar produto
				</div>

				<div class="card-body">

					@if(session()->has('success'))
						<div class="alert alert-success text-center">
							{{ session()->get('success') }}
						</div>
					@endif

					<div class="mb-3">
						<label for="id" class="form-label">ID</label>
						<input type="text" class="form-control" id="id" name="id" value="{{ $product->id }}" disabled>
					</div>

					<div class="mb-3">
						<label for="name" class="form-label">Nome</label>
						<input type="text" class="form-control" id="name" name="name" value="{{ $product->name }}" disabled>
					</div>

					@if(count($product->tags) > 0)

						<div class="mb-4">
							<label for="tags" class="form-label">Tags</label><br>
							@foreach($product->tags as $tag)
								<span class="badge bg-primary fs-6 m-1">{{ $tag->name }}</span>
							@endforeach
						</div>

					@else

						<div class="mb-3">
							<label for="tags" class="form-label">Tags</label>
							<div class="alert alert-primary text-center mb-4">
								Nenhuma tag vinculada ao produto
							</div>
						</div>

					@endif

					<div class="d-grid gap-2 d-md-flex justify-content-md-center">
						<a href="{{ route('product.index') }}" class="btn btn-outline-dark me-md-2">Voltar</a>
						<a href="{{ route('product.edit', $product->id) }}" class="btn btn-primary btn-md">Editar</a>
					</div>

				</div>

			</div>
		</div>
	</div>
</div>

@endsection
