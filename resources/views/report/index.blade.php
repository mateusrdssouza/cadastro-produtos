@extends('layouts.app')

@section('content')

<div class="container">
	<div class="row justify-content-center">
		<div class="col-md-8">
			<div class="card mt-5">

				<div class="card-header">
					<h4 class="mt-2">Relatório de Relevância de Produtos</h4>
				</div>

				<div class="card-body">

					@if(count($tags) > 0)

						<div class="table-responsive">
							<table class="table table-striped">
								<thead>
									<tr>
										<th scope="col" width="15%" class="text-center">ID</th>
										<th scope="col" width="65%" class="text-left">Tag</th>
										<th scope="col" width="20%" class="text-center">Produtos</th>
									</tr>
								</thead>
								<tbody>
									@foreach($tags as $tag)
										<tr>
											<th scope="row" class="text-center">{{ $tag->id }}</th>
											<td class="text-left">{{ $tag->name }}</td>
											<td class="text-center">{{ count($tag->products) }}</td>
										</tr>
									@endforeach
								</tbody>
							</table>
						</div>

					@else

						<div class="alert alert-primary text-center mt-3" role="alert">
							Nenhum registro encontrado
						</div>

					@endif

				</div>

			</div>
		</div>
	</div>
</div>

@endsection
