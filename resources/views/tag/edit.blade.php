@extends('layouts.app')

@section('content')

<div class="container">
	<div class="row justify-content-center">
		<div class="col-md-6">
			<div class="card mt-5">

				<div class="card-header">
					Editar tag
				</div>

				<div class="card-body">

					@if(session()->has('danger'))
						<div class="alert alert-danger text-center">
							{{ session()->get('danger') }}
						</div>
					@endif

					<form action="{{ route('tag.update', ['tag' => $tag->id ]) }}" method="post">
						@csrf
						@method('PUT')

						<div class="mb-3">
							<label for="id" class="form-label">ID</label>
							<input type="text" class="form-control" id="id" name="id" value="{{ $tag->id }}" disabled>
						</div>

						<div class="mb-3">
							<label for="name" class="form-label">Nome</label>
							<input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name', $tag->name) }}" required>
							@error('name')
								<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
							@enderror
						</div>

						<div class="d-grid gap-2 d-md-flex justify-content-md-center">
							<a href="{{ route('tag.index') }}" class="btn btn-outline-dark me-md-2">Voltar</a>
							<button type="submit" class="btn btn-primary" type="button">Atualizar</button>
						</div>

					</form>
				</div>

			</div>
		</div>
	</div>
</div>

@endsection
