@extends('layouts.app')

@section('content')

<div class="container">
	<div class="row justify-content-center">
		<div class="col-md-8">
			<div class="card mt-5">

				<div class="card-header">
					<div class="row">
						<div class="col-6 ">
							<h4 class="mt-2">Produtos</h4>
						</div>
						<div class="col-6">
							<div class="float-end">
								<a href="{{ route('product.create')}}" class="btn btn-primary btn-md">Novo produto</a>
							</div>
						</div>
					</div>
				</div>

				<div class="card-body">

					@if(session()->has('success'))
						<div class="alert alert-success text-center">
							{{ session()->get('success') }}
						</div>
					@endif

					@if(count($products) > 0)

						<table class="table table-striped">
							<thead>
								<tr>
									<th class="text-center" scope="col" width="10%">ID</th>
									<th class="text-center" scope="col" width="60%">Nome</th>
									<th class="text-center" scope="col" width="30%"></th>
								</tr>
							</thead>
							<tbody>
								@foreach($products as $product)
									<tr>
										<td class="text-center align-middle">{{ $product->id }}</td>
										<td class="text-center align-middle">{{ $product->name }}</td>
										<td>
											<div class="d-grid gap-2 d-md-flex justify-content-md-end">
												<a href="{{ route('product.show', $product->id) }}" class="btn btn-success btn-md">Visualizar</a>
												<a href="{{ route('product.edit', $product->id) }}" class="btn btn-primary btn-md">Editar</a>
												<form id="form_{{ $product->id }}" action="{{ route('product.destroy', ['product' =>  $product->id]) }}" class="d-none" method="post">
													@method('DELETE')
													@csrf
												</form>
												<a href="javascript:void(0)" onclick="document.getElementById('form_{{ $product->id }}').submit()" class="btn btn-danger btn-md">Excluir</a>
											</div>
										</td>
									</tr>
								@endforeach
							</tbody>
						</table>

						<br>

						<nav class="d-flex justify-content-center">
							<ul class="pagination">
								{{ $products->links() }}
							</ul>
						</nav>

					@else

						<div class="alert alert-primary text-center" role="alert">
							Nenhum registro encontrado
						</div>

					@endif

				</div>

			</div>
		</div>
	</div>
</div>

@endsection
