@extends('layouts.app')

@section('content')

<div class="container">
	<div class="row justify-content-center">
		<div class="col-md-6">
			<div class="card mt-5">

				<div class="card-header">
					Visualizar tag
				</div>

				<div class="card-body">

					@if(session()->has('success'))
						<div class="alert alert-success text-center">
							{{ session()->get('success') }}
						</div>
					@endif

					<div class="mb-3">
						<label for="id" class="form-label">ID</label>
						<input type="text" class="form-control" id="id" name="id" value="{{ $tag->id }}" disabled>
					</div>

					<div class="mb-3">
						<label for="name" class="form-label">Nome</label>
						<input type="text" class="form-control" id="name" name="name" value="{{ $tag->name }}" disabled>
					</div>

					@if(count($tag->products) > 0)

						<div class="mb-4">
							<label for="products" class="form-label">Produtos</label><br>
							<div class="d-flex justify-content-center">
								<button type="button" class="btn btn-primary mb-2" data-bs-toggle="modal" data-bs-target="#modal-produtos">
									Produtos vinculados <span class="badge bg-secondary">{{ count($tag->products) }}</span>
								</button>
							</div>
						</div>

						<div class="modal fade" id="modal-produtos" tabindex="-1"aria-labelledby="modal-produtos-label" aria-hidden="true">
							<div class="modal-dialog">
								<div class="modal-content">
									<div class="modal-header">
										<h5 class="modal-title" id="modal-produtos-label">Produtos</h5>
										<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
									</div>
									<div class="modal-body">
										<ol class="list-group list-group-numbered">
											@foreach($tag->products as $product)
												<li class="list-group-item d-flex justify-content-between align-items-start">
													<div class="ms-2 me-auto">
														<div class="fw-bold">{{ $product->name }}</div>
													</div>
												</li>
											@endforeach
										</ol>
									</div>
									<div class="modal-footer">
										<button type="button" class="btn btn-outline-dark me-md-2" data-bs-dismiss="modal">Close</button>
									</div>
								</div>
							</div>
						</div>

					@else

						<div class="mb-3">
							<label for="products" class="form-label">Produtos</label>
							<div class="alert alert-primary text-center mb-4">
								Nenhum produto vinculado à tag
							</div>
						</div>

					@endif

					<div class="d-grid gap-2 d-md-flex justify-content-md-center">
						<a href="{{ route('tag.index') }}" class="btn btn-outline-dark me-md-2">Voltar</a>
						<a href="{{ route('tag.edit', $tag->id) }}" class="btn btn-primary btn-md">Editar</a>
					</div>

				</div>

			</div>
		</div>
	</div>
</div>

@endsection
