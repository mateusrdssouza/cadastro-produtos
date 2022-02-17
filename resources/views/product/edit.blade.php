@extends('layouts.app')

@section('content')

<div class="container">
	<div class="row justify-content-center">
		<div class="col-md-6">
			<div class="card mt-5">

				<div class="card-header">
					Editar produto
				</div>

				<div class="card-body">
					<form action="{{ route('product.update', ['product' => $product->id ]) }}" method="post">
						@csrf
						@method('PUT')

						<div class="mb-3">
							<label for="id" class="form-label">ID</label>
							<input type="text" class="form-control" id="id" name="id" value="{{ $product->id }}" disabled>
						</div>

						<div class="mb-3">
							<label for="name" class="form-label">Nome</label>
							<input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name', $product->name) }}" required>
							@error('name')
								<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
							@enderror
						</div>

						<div class="mb-3">
							<label for="tags" class="form-label">Tags</label>

							@if(count($tags) > 0)

								<select class="form-select" id="tags" name="tags[]" multiple data-allow-clear="true" data-suggestions-threshold="0">
									<option selected disabled hidden value="">Selecione uma tag</option>
										@foreach($tags as $tag)
											<option value="{{ $tag->id }}"
												@if(!is_null(old('tags')))
													@if(in_array($tag->id, old('tags')))
														selected="selected"
													@endif
												@else
													@if(count($product->tags->where('id', $tag->id)))
														selected="selected"
													@endif
												@endif
											>{{ $tag->name }}</option>
										@endforeach
								</select>

								<div class="invalid-feedback">Selecione uma tag válida.</div>

							@else

								<div class="alert alert-primary text-center mb-4">
									Nenhuma tag cadastrada
								</div>

							@endif

						</div>

						<div class="d-grid gap-2 d-md-flex justify-content-md-center">
							<a href="{{ route('product.index') }}" class="btn btn-outline-dark me-md-2">Voltar</a>
							<button type="submit" class="btn btn-primary" type="button">Atualizar</button>
						</div>

					</form>
				</div>

			</div>
		</div>
	</div>
</div>

<script type="module">
	import Tags from "https://cdn.jsdelivr.net/gh/lekoala/bootstrap5-tags@master/tags.js";
	Tags.init("select");
</script>

<style>
.badge{font-size:.9rem!important;margin-bottom:.5rem!important;}
</style>

@endsection
