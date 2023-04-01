<!-- BARRA LATERAL IZQUIERDA DEL MENU DE MODULOS -->
<aside id="sidebar" class="sidebar">
    <ul class="sidebar-nav" id="sidebar-nav">
		
		<?php if($_SESSION['rol_id']==1) { ?>  

			<li class="nav-item"> 
				<div style="display:flex; color:white; text-center; padding:20px"> 
			        <i class="bi bi-person-circle " style="font-size: 60px; margin-right:10px;"></i> 
				    <span style="line-height: inherit;margin-top: 10px;">Bienvenido, <br>
				        <span><?php echo $_SESSION['usuario']; ?></span>
			        </span>
				</div>				
		    </li>	   
		
			<li class="nav-item"> 
				<a class="nav-link " href="index.php?c=Home&a=mostrarHomeAdmi"> 
				    <i class="ri-home-2-fill"></i> 
				    <span>Inicio</span> 
			    </a>
		    </li>
			
			<li class="nav-item"> 
				<a class="nav-link collapsed" href="index.php?c=Usuario&a=perfil_user&user_asesor=<?php echo $_SESSION['id'];?>"> 				
				<i class="ri-profile-line ri-lg"></i> 			
					<span>Perfil</span> 
				</a>
			</li>

					
			<li class="nav-item">
                <a class="nav-link collapsed" data-bs-target="#tables-nav_2" data-bs-toggle="collapse" href="#"> 
				    <i class="ri-team-fill"></i>
					<span>Usuarios</span><i class="bi bi-chevron-down ms-auto"></i> 
			    </a>
                    <ul id="tables-nav_2" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                        <li> 
							<a href="index.php?c=Usuario&a=Usuario_nuevo"> 
								<i class="ri-checkbox-blank-circle-fill"></i>
								
								
								<span>Nuevo usuario</span></a>
						</li>
                        <li> 
							<a href="index.php?c=Usuario&a=Listado_usuarios"> 
								<i class="ri-checkbox-blank-circle-fill"></i> 
								<span>Listado de usuarios</span> </a>
						</li>
                    </ul>
            </li>


			<li class="nav-item"> 
				<a class="nav-link collapsed" href="index.php?c=Interesado&a=indexLista"> 
					<i class="ri-user-add-fill"></i> 
					<span>Interesado</span> 
				</a>
			</li>


			<li class="nav-item"> 
				<a class="nav-link collapsed" href="index.php?c=Asesoria&a=Lista_asesoria"> 
					<i class="ri-profile-line"></i> 
					<span>Asesoría</span> 
				</a>
			</li>
			<li class="nav-item"> 
				<a class="nav-link collapsed" href="index.php?c=patrocinio&a=mostrarPatrocinio"> 
					<i class="ri-auction-fill"></i> 
					<span>Patrocinio</span> 
				</a>
			</li>
			

			<li class="nav-item">
                <a class="nav-link collapsed" data-bs-target="#tables-nav_3" data-bs-toggle="collapse" href="#"> 
				<!--     <i class="ri-scales-line"></i> -->
				<i class="ri-chat-smile-3-fill"></i>
					<span>ChatBot</span><i class="bi bi-chevron-down ms-auto"></i> 
			    </a>
                    <ul id="tables-nav_3" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                        <li> 
							<a href="index.php?c=Chatbot&a=Mostrar_Nuevo"> 
								<i class="ri-checkbox-blank-circle-fill"></i>
								
								
								<span>Añadir nuevo</span></a>
						</li>
                        <li> 
							<a href="index.php?c=Chatbot&a=mostrar_tabla"> 
								<i class="ri-checkbox-blank-circle-fill"></i> 
								<span>Listado de preguntas</span> </a>
						</li>
                    </ul>
            </li>

			<li class="nav-item">
                <a class="nav-link collapsed" data-bs-target="#tables-nav" data-bs-toggle="collapse" href="#"> 				    
					<i class="ri-file-chart-line ri-xl"></i>
					<span>Reportes</span><i class="bi bi-chevron-down ms-auto"></i> 
			    </a>
                <ul id="tables-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">  
                    <li> 
						<a href="index.php?c=reportes&a=mostrarReportesActivos"> <i class="ri-checkbox-blank-circle-fill"></i><span>Patrocinios Activos</span></a>
					</li>
                    <li> 
						<a href="index.php?c=reportes&a=mostrarReportesPasivos"> <i class="ri-checkbox-blank-circle-fill"></i><span>Patrocinios Pasivos</span> </a>
					</li>
					<li> 
						<a href="index.php?c=reportes&a=mostrarReportesTerminados"> <i class="ri-checkbox-blank-circle-fill"></i><span>Patrocinios Finalizados</span> </a>
					</li>
					<li> 
						<a href="index.php?c=reportes&a=mostrarReportesAsesoria"> <i class="ri-checkbox-blank-circle-fill"></i><span>Registro de Asesorías</span></a>
					</li>
                </ul>
            </li>


			<?php } ?>     

			<?php if($_SESSION['rol_id']==2) { ?>   

		    <li class="nav-item"> 
				<div style="display:flex; color:white; text-center; padding:20px"> 
			        <i class="bi bi-person-circle " style="font-size: 60px; margin-right:10px;"></i> 
				    <span style="line-height: inherit;margin-top: 10px;">Bienvenido, <br>
				        <span><?php echo $_SESSION['usuario']; ?> </span>
				    </span>
				</div>	
		    </li>	   

			<li class="nav-item"> 
				<a class="nav-link " href="index.php?c=Home&a=mostrarHomeAsesor"> 
				    <i class="ri-home-2-fill"></i> 
				    <span>Inicio</span> 
			    </a>
		    </li>

			<li class="nav-item"> 
				<a class="nav-link collapsed" href="index.php?c=Usuario&a=perfil_user&user_asesor=<?php echo $_SESSION['id'];?>"> 				
				<i class="ri-profile-line ri-lg"></i> 			
					<span>Perfil</span> 
				</a>
			</li>


			<li class="nav-item"> 
				<a class="nav-link collapsed" href="index.php?c=Interesado&a=indexLista"> 
					<i class="ri-user-add-fill"></i> 
					<span>Interesado</span> 
				</a>
			</li>
			<li class="nav-item"> 
				<a class="nav-link collapsed" href="index.php?c=Asesoria&a=Lista_asesoria"> 
					<i class="ri-scales-line ri-xl"></i>
					<span>Asesoría</span> 
				</a>
			</li>
			<li class="nav-item"> 
				<a class="nav-link collapsed" href="index.php?c=patrocinio&a=mostrarPatrocinio"> 
					<i class="ri-auction-fill"></i> 
					<span>Patrocinio</span> 
				</a>
			</li>

            <li class="nav-item">
                <a class="nav-link collapsed" data-bs-target="#tables-nav" data-bs-toggle="collapse" href="#"> 				    
					<i class="ri-file-chart-line ri-xl"></i>
					<span>Reportes</span><i class="bi bi-chevron-down ms-auto"></i> 
			    </a>
                <ul id="tables-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">  
                    <li> 
						<a href="index.php?c=reportes&a=mostrarReportesActivos"> <i class="ri-checkbox-blank-circle-fill"></i><span>Patrocinios Activos</span></a>
					</li>
                    <li> 
						<a href="index.php?c=reportes&a=mostrarReportesPasivos"> <i class="ri-checkbox-blank-circle-fill"></i><span>Patrocinios Pasivos</span> </a>
					</li>
					<li> 
						<a href="index.php?c=reportes&a=mostrarReportesTerminados"> <i class="ri-checkbox-blank-circle-fill"></i><span>Patrocinios Finalizados</span> </a>
					</li>
					<li> 
						<a href="index.php?c=reportes&a=mostrarReportesAsesoria"> <i class="ri-checkbox-blank-circle-fill"></i><span>Registro de Asesorías</span></a>
					</li>
                </ul>
            </li>

			

			<?php } ?>     
			
			 <!-- DESCONECTARSE DE LA SESIÓN -->
			
			<li class="nav-item position-absolute bottom-0 start-30"> 
				<a class="nav-link collapsed " href="index.php?c=login&a=salirLogin"> 
					<i class="ri-login-box-line"></i> 
					<span>Desconectarse</span> 
				</a>
			</li>
		
         </ul>
      </aside>
