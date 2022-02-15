@extends('layouts.app')

@section('content')

<div class="container px-4 py-5 mt-5">
	<div class="row g-4 py-5 row-cols-1 row-cols-lg-3">
		<div class="col d-flex align-items-start">
			<div class="icon-square bg-light text-dark flex-shrink-0 me-3">
				<svg class="bi" width="1em" height="1em">
					<use xlink:href="#product"/>
				</svg>
			</div>
			<div>
				<h2>Produtos</h2>
				<p>Seção de gerenciamento de produtos. Clique no botão abaixo para visualizar, cadastras, editar ou excluir os registros de produtos.</p>
				<a href="{{ route('product.index') }}" class="btn btn-primary">Acessar</a>
			</div>
		</div>
		<div class="col d-flex align-items-start">
			<div class="icon-square bg-light text-dark flex-shrink-0 me-3">
				<svg class="bi" width="1em" height="1em">
					<use xlink:href="#tag"/>
				</svg>
			</div>
			<div>
				<h2>Tags</h2>
				<p>Seção de gerenciamento de tags. Clique no botão abaixo para visualizar, cadastras, editar ou excluir os registros de tags.</p>
				<a href="{{ route('tag.index') }}" class="btn btn-primary">Acessar</a>
			</div>
		</div>
		<div class="col d-flex align-items-start">
			<div class="icon-square bg-light text-dark flex-shrink-0 me-3">
				<svg class="bi" width="1em" height="1em">
					<use xlink:href="#report"/>
				</svg>
			</div>
			<div>
				<h2>Relatório</h2>
				<p>Relatório de relevância de produtos. Clique no botão abaixo para visualizar os detalhes do relatório de relevância de produtos.</p>
				<a href="" class="btn btn-primary">Acessar</a>
			</div>
		</div>
	</div>
</div>

<svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
	<symbol id="product" viewBox="0 0 16 16">
		<path d="M3.75 0a1 1 0 0 0-.8.4L.1 4.2a.5.5 0 0 0-.1.3V15a1 1 0 0 0 1 1h14a1 1 0 0 0 1-1V4.5a.5.5 0 0 0-.1-.3L13.05.4a1 1 0 0 0-.8-.4h-8.5ZM15 4.667V5H1v-.333L1.5 4h6V1h1v3h6l.5.667Z"/>
	</symbol>
	<symbol id="tag" viewBox="0 0 16 16">
		<path d="M2 2a1 1 0 0 1 1-1h4.586a1 1 0 0 1 .707.293l7 7a1 1 0 0 1 0 1.414l-4.586 4.586a1 1 0 0 1-1.414 0l-7-7A1 1 0 0 1 2 6.586V2zm3.5 4a1.5 1.5 0 1 0 0-3 1.5 1.5 0 0 0 0 3z"/>
		<path d="M1.293 7.793A1 1 0 0 1 1 7.086V2a1 1 0 0 0-1 1v4.586a1 1 0 0 0 .293.707l7 7a1 1 0 0 0 1.414 0l.043-.043-7.457-7.457z"/>
	</symbol>
	<symbol id="report" viewBox="0 0 16 16">
		<path d="M12 0H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2zm-2 11.5v-6a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5zm-2.5.5a.5.5 0 0 1-.5-.5v-4a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v4a.5.5 0 0 1-.5.5h-1zm-3 0a.5.5 0 0 1-.5-.5v-2a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v2a.5.5 0 0 1-.5.5h-1z"/>
	</symbol>
</svg>

<style>
.b-example-divider{height:3rem;background-color:rgba(0,0,0,.1);border:solid rgba(0,0,0,.15);border-width:1px 0;box-shadow:inset 0 .5em 1.5em rgba(0,0,0,.1),inset 0 .125em .5em rgba(0,0,0,.15)}.bi{vertical-align:-.125em;fill:currentColor}.feature-icon{display:inline-flex;align-items:center;justify-content:center;width:4rem;height:4rem;margin-bottom:1rem;font-size:2rem;color:#fff;border-radius:.75rem}.icon-link{display:inline-flex;align-items:center}.icon-link>.bi{margin-top:.125rem;margin-left:.125rem;transition:transform .25s ease-in-out;fill:currentColor}.icon-link:hover>.bi{transform:translate(.25rem)}.icon-square{display:inline-flex;align-items:center;justify-content:center;width:3rem;height:3rem;font-size:1.5rem;border-radius:.75rem}.rounded-4{border-radius:.5rem}.rounded-5{border-radius:1rem}.text-shadow-1{text-shadow:0 .125rem .25rem rgba(0,0,0,.25)}.text-shadow-2{text-shadow:0 .25rem .5rem rgba(0,0,0,.25)}.text-shadow-3{text-shadow:0 .5rem 1.5rem rgba(0,0,0,.25)}.card-cover{background-repeat:no-repeat;background-position:center center;background-size:cover}
</style>

@endsection
