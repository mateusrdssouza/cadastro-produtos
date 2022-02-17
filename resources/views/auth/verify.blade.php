@extends('layouts.app')

@section('content')
<div class="container">
	<div class="row justify-content-center">
		<div class="col-md-8">

			<img src="{{ asset('img/logo.png') }}" class="mx-auto d-block mt-4 mb-5" width="100px">

			<div class="card">
				<div class="card-header">Verifique seu endereço de e-mail</div>

				<div class="card-body">
					@if (session('resent'))
						<div class="alert alert-success" role="alert">
							Um novo link de verificação foi enviado para seu endereço de e-mail.
						</div>
					@endif

					Antes de continuar, verifique seu e-mail para obter um link de verificação.
					Se você não recebeu o e-mail,

					<form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
						@csrf
						<button type="submit" class="btn btn-link p-0 m-0 align-baseline">clique aqui para solicitar outro</button>.
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
