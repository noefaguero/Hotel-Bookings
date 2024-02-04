<header class="container-fluid bg-card p-0">
	<nav class="navbar navbar-expand-lg">
		<div class="container row align-items-center mx-auto">
			<div class="collapse navbar-collapse col-3" id="navbarSupportedContent">
				<ul class="navbar-nav mb-2 mb-lg-0">
					<li class="nav-item">
						<a class="nav-link fs-5 me-4" href="./index.php?c=Hotels">Hoteles</a>
					</li>
					<li class="nav-item">
						<a class="nav-link fs-5" href="./index.php?c=Bookings">Reservas</a>
					</li>
				</ul>
			</div>
			<h1 class="col-6 fs-2 logo py-2 m-0 text-center">HEAVEN ROOMS</h1>
			<div class="col-3 d-flex justify-content-end gap-3">
				<a class="d-flex border justify-content-center align-items-center gap-3 border-secondary rounded-5 px-3 py-1 nav-link" href="#">
				<svg 
					xmlns="http://www.w3.org/2000/svg" 
					viewBox="0 0 448 512"
					width="20" 
					height="20" 
					fill="#ffffff">
					<!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
					<path d="M224 256A128 128 0 1 0 224 0a128 128 0 1 0 0 256zm-45.7 48C79.8 304 0 383.8 0 482.3C0 498.7 13.3 512 29.7 512H418.3c16.4 0 29.7-13.3 29.7-29.7C448 383.8 368.2 304 269.7 304H178.3z"/>
				</svg>
				<span><?php echo $_SESSION['usuario']->nombre; ?></span>
				</a>
				<a class="d-flex justify-content-center align-items-center btn btn-secondary rounded-5 px-2 py-1" data-bs-toggle="modal" data-bs-target="#closeSession">
				<svg 
					xmlns="http://www.w3.org/2000/svg" 
					viewBox="0 0 512 512"
					width="20" 
					height="20" 
					fill="#ffffff">
					<!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
					<path d="M288 32c0-17.7-14.3-32-32-32s-32 14.3-32 32V256c0 17.7 14.3 32 32 32s32-14.3 32-32V32zM143.5 120.6c13.6-11.3 15.4-31.5 4.1-45.1s-31.5-15.4-45.1-4.1C49.7 115.4 16 181.8 16 256c0 132.5 107.5 240 240 240s240-107.5 240-240c0-74.2-33.8-140.6-86.6-184.6c-13.6-11.3-33.8-9.4-45.1 4.1s-9.4 33.8 4.1 45.1c38.9 32.3 63.5 81 63.5 135.4c0 97.2-78.8 176-176 176s-176-78.8-176-176c0-54.4 24.7-103.1 63.5-135.4z"/>
				</svg>
				</a>
			</div>
		</div>
	</nav>
	<!-- Modal -->
	<div class="modal" tabindex="-1" id="closeSession" aria-hidden="true">
		<div class="modal-dialog">
            <div class="modal-content bg-card rounded-5">
                <div class="modal-header">
                    <h5 class="modal-title">¿QUIERES CERRAR SESIÓN?</h5>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light rounded-5" data-bs-dismiss="modal">CANCELAR</button>
                    <a href="./index.php?c=Users&closeSession " class="btn btn-secondary bg-orange rounded-5">CERRAR</a>
                </div>
            </div>
		</div>
	</div>
</header>