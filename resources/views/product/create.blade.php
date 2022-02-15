@extends('layouts.app')

@section('content')

<div class="container">
	<div class="row justify-content-center">
		<div class="col-md-6">
			<div class="card mt-5">

				<div class="card-header">
					Adicionar produto
				</div>

				<div class="card-body">
					<form action="{{ route('product.store') }}" method="post">
						@csrf

						<div class="mb-3">
							<label for="name" class="form-label">Nome</label>
							<input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name') }}" required>
							@error('name')
								<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
							@enderror
						</div>

						<div class="d-grid gap-2 d-md-flex justify-content-md-center">
							<a href="{{ route('product.index') }}" class="btn btn-outline-dark me-md-2">Voltar</a>
							<button type="submit" class="btn btn-primary" type="button">Cadastrar</button>
						</div>

					</form>
				</div>

			</div>
		</div>
	</div>
</div>

@endsection
