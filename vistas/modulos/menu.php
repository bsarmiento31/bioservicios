<aside class="main-sidebar">
	<section class="sidebar">
		<ul class="sidebar-menu">
			<li class="active">
				<a href="inicio">
					<i class="fa fa-home"></i>  
					<span>Inicio</span>
				</a>
			</li>
			
				<?php 
 
		if($_SESSION["perfil"] == "Administrador"){
			echo "<li>
				<a href='usuarios'> 
					<i class='fa fa-user'></i>
					<span>Usuarios</span>
				</a></li>";
				}
			?>
			

	
		<li class="treeview">

				<a href="#">

					<i class="fa fa-plus"></i>
					
					<span>Equipos</span>
					
					<span class="pull-right-container">
					
						<i class="fa fa-angle-left pull-right"></i>

					</span>

				</a>

				<ul class="treeview-menu">

				<li>

						<a href="equipos">
							
							<i class="fa fa-circle-o"></i>
							<span>Ver equipos</span>

						</a>

					</li>
					<?php 
					if($_SESSION["perfil"] == "Administrador" || $_SESSION["perfil"] == "Ingeniero"){
					echo '
					<li>

						<a href="instrumentos">
							
							<i class="fa fa-circle-o"></i>
							<span>Ver instrumentos</span>

						</a>

					</li>

					<li>

						<a href="trabajos">
							
							<i class="fa fa-circle-o"></i>
							<span>Ver trabajos</span>

						</a>

					</li>';

		}
			?>

				</ul>

			</li>
						
			<?php 

					if($_SESSION["perfil"] == "Administrador" || $_SESSION["perfil"] == "Ingeniero"){
					echo '
							<li>
								<a href="cliente">
									<i class="fa fa-group"></i>
									<span>Clientes</span>
								</a>
							</li>';
					}
				?>


				<?php

			if($_SESSION["perfil"] == "Administrador" || $_SESSION["perfil"] == "Ingeniero"  || $_SESSION["vistas"] == "MantenimientoCalibracion" || $_SESSION["vistas"] == "Mantenimiento"){


				echo '

			<li>
				<a href="cronograma">			
					<i class="fa fa-calendar-minus-o"></i>
					<span>Cronograma</span>
				</a>
			</li>

				<li class="treeview">

				<a href="#">

					<i class="fa fa-list-ul"></i>
					
					<span>Mantenimientos</span>
					
					<span class="pull-right-container">
					
						<i class="fa fa-angle-left pull-right"></i>

					</span>

				</a>


				<ul class="treeview-menu">
					
					<li>

						<a href="mantenimiento">
							
							<i class="fa fa-circle-o"></i>
							<span>Ver Mantenimientos</span>

						</a>

					</li>';

				

					if($_SESSION["perfil"] == "Administrador" || $_SESSION["perfil"] == "Ingeniero"){
						echo '<li>
								<a href="crear-mantenimiento">
									<i class="fa fa-circle-o"></i>
									<span>Crear mantenimiento</span>
								</a>
							</li>';

					}
					
					

			echo
			'

				</ul>

			</li>';

					}

				?>

			<?php

			if($_SESSION["perfil"] == "Administrador" || $_SESSION["perfil"] == "Ingeniero" || $_SESSION["vistas"] == "MantenimientoCalibracion" || $_SESSION["vistas"] == "Calibracion"){

				echo 
			'<li>
				<a href="calibracion">			
					<i class="fa fa-archive"></i>
					<span>Calibración</span>
				</a>
			</li>';

			}
			
			?>
			
			
			<?php

				if($_SESSION["perfil"] == "Administrador"){
					echo '<li>
							<a href="reportes">			
								<i class="fa fa-bar-chart-o"></i>
								<span>Reportes</span>
							</a>
						</li>';
				}
				
			?>
				<?php

				if($_SESSION["vistas"] == "MantenimientoCalibracion" || $_SESSION["vistas"] == "Mantenimiento"){
					echo '<li>
							<a href="reporte-clientes">			
								<i class="fa fa-bar-chart-o"></i>
								<span>Reportes</span>
							</a>
						</li>';
				}
				
			?>
			
		</ul>
	</section>
</aside>