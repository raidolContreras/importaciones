<style>
	.card {
		background-color: #ffffff;
		border-radius: 10px;
		box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
		overflow: hidden;
		max-width: 600px;
		width: 100%;
		margin: 20px;
		animation: fadeIn 1s ease-in-out;
	}

	.error-area {
		display: flex;
		justify-content: center;
		align-items: center;
		height: 100%;
	}

	.error-content {
		padding: 40px 20px;
	}

	.account-header h3 {
		font-size: 24px;
		font-weight: bold;
		color: #dc3545;
		margin-bottom: 20px;
		animation: slideIn 1s ease-in-out;
	}

	h1.display-1 {
		font-size: 100px;
		font-weight: bold;
		color: #dc3545;
		margin: 0;
		animation: bounce 1.5s infinite;
	}

	h3.mt-3 {
		font-size: 20px;
		color: #333333;
		margin-top: 20px;
		animation: fadeIn 1.5s ease-in-out;
	}

	p.mb-4 {
		font-size: 16px;
		color: #666666;
		margin-bottom: 30px;
		animation: fadeIn 2s ease-in-out;
	}

	.btn {
		padding: 10px 20px;
		font-size: 16px;
		border-radius: 5px;
		text-decoration: none;
		transition: background-color 0.3s ease, color 0.3s ease;
	}

	.btn-primary {
		background-color: #007bff;
		color: #ffffff;
		border: none;
	}

	.btn-primary:hover {
		background-color: #0056b3;
		color: #ffffff;
	}

	.btn-secondary {
		background-color: #6c757d;
		color: #ffffff;
		border: none;
	}

	.btn-secondary:hover {
		background-color: #5a6268;
		color: #ffffff;
	}

	@keyframes fadeIn {
		from {
			opacity: 0;
		}
		to {
			opacity: 1;
		}
	}

	@keyframes slideIn {
		from {
			transform: translateY(-20px);
			opacity: 0;
		}
		to {
			transform: translateY(0);
			opacity: 1;
		}
	}

	@keyframes bounce {
		0%, 100% {
			transform: translateY(0);
		}
		50% {
			transform: translateY(-10px);
		}
	}
</style>
<div class="card">
	<div class="error-area">
		<div class="d-table">
			<div class="d-table-cell">
				<div class="container">
					<div class="error-content card-box-style text-center">
						<div class="account-header">
							<h3 class="text-danger">Error</h3>
						</div>
						<h1 class="display-1 text-danger">404</h1>
						<h3 class="mt-3">¡Ups! Página no encontrada</h3>
						<p class="mb-4">La página que buscabas no se pudo encontrar. Es posible que haya sido movida o eliminada.</p>
						<a class="btn btn-primary btn-lg" href="inicio">Volver a la página de inicio</a>
						<a class="btn btn-secondary btn-lg" href="javascript:history.back()">Volver atrás</a>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>