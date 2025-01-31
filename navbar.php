<style>
    #sidebar {
        width: 250px;
        height: 100%;
        position: fixed;
        top: 0;
        left: 0;
        background-color: #333;
        color: #fff;
        padding-top: 20px;
        overflow-y: auto;
        max-height: 80vh;
    }

    .sidebar-list {
        padding: 20px;
    }

    .nav-item {
        display: block;
        padding: 10px;
        text-decoration: none;
        color: #fff;
    }

    .nav-item:hover {
        background-color: #555;
    }

    /* Ocultar el scrollbar nativo */
    #sidebar::-webkit-scrollbar {
        width: 12px;
    }

    #sidebar::-webkit-scrollbar-thumb {
        background-color: #555; /* Cambiar el color del scroll */
        border-radius: 10px;
    }

    #sidebar::-webkit-scrollbar-track {
        background-color: #333; /* Cambiar el color del fondo del scroll */
    }
</style>


</style>
<nav id="sidebar" class='mx-lt-5 bg-white' style='overflow-y: auto; max-height: 80vh;'>


	<div class="sidebar-list">
        <a href="index.php?page=estudiantes" class="nav-item nav-estudiantes"><span class='icon-field'><i class="fa fa-users "></i></span>Alumnos</a>
        <a href="index.php?page=estudiantes2023" class="nav-item nav-estudiantes"><span class='icon-field'><i class="fa fa-users "></i></span>Alumnos 2023</a>
        <a href="index.php?page=inscripcion" class="nav-item nav-inscripcion"><span class='icon-field'><i class="fa fa-users "></i></span>Inscripciones</a>
        <a href="index.php?page=precios" class="nav-item nav-precios"><span class='icon-field'><i class="fa fa-money-check "></i></span> Costos</a>
        <a href="index.php?page=tramitesv" class="nav-item nav-fees"><span class='icon-field'><i class="fa fa-money-check "></i></span> Trámites</a>
        
        
        <?php if ($_SESSION['login_type'] == 1) : ?>

            
            
            
            
            <?php endif; ?>
	</div>


    <?php if ($_SESSION['login_type'] == 2) : ?>

            
            
            
            
            <?php endif; ?>
	</div>


    <?php if ($_SESSION['login_type'] == 3) : ?>
            
            
            
            
            <?php endif; ?>
	</div>

    <?php if ($_SESSION['login_type'] == 4) : ?>
        </div><a href="index.php?page=fees" class="nav-item nav-fees"><span class='icon-field'><i class="fa fa-money-check "></i></span>Ver Trámites</a>
        <a href="index.php?page=users" class="nav-item nav-usuarios"><span class='icon-field'><i class="fa fa-users "></i></span>Usuarios</a>
        <a href="index.php?page=courses" class="nav-item nav-tramites"><span class='icon-field'><i class="fa fa-users "></i></span>Tramites</a>
        <a href="index.php?page=status" class="nav-item nav-alumnos"><span class='icon-field'><i class="fa fa-users "></i></span> Alumnos</a>
        <a href="index.php?page=fees" class="nav-item nav-vertramites"><span class='icon-field'><i class="fa fa-money-check "></i></span>Ver Tramites</a>
        <a href="index.php?page=archivos" class="nav-item nav-archivos"><span class='icon-field'><i class="fa fa-users "></i></span>Archivos</a>
		<a href="index.php?page=chat" class="nav-item nav-chat"><span class='icon-field'><i class="fa fa-users "></i></span>Chat</a>
        
        
        
             <?php endif; ?>
        
    
    
      
    <?php if ($_SESSION['login_type'] == 5) : ?>
		<a href="index.php?page=users" class="nav-item nav-usuarios"><span class='icon-field'><i class="fa fa-users "></i></span>Usuarios</a>
        <a href="index.php?page=courses" class="nav-item nav-tramites"><span class='icon-field'><i class="fa fa-users "></i></span>Tramites</a>
        <a href="index.php?page=status" class="nav-item nav-alumnos"><span class='icon-field'><i class="fa fa-users "></i></span> Alumnos</a>
        <a href="index.php?page=fees" class="nav-item nav-vertramites"><span class='icon-field'><i class="fa fa-money-check "></i></span>Ver Tramites</a>
        <a href="index.php?page=alogs" class="nav-item nav-fees"><span class='icon-field'><i class="fa fa-money-check "></i></span> Logs</a>
		<a href="index.php?page=archivos" class="nav-item nav-archivos"><span class='icon-field'><i class="fa fa-users "></i></span>Archivos</a>
		<a href="index.php?page=chat" class="nav-item nav-chat"><span class='icon-field'><i class="fa fa-users "></i></span>Chat</a>
		<a href="index.php?page=cambiar" class="nav-item nav-chat"><span class='icon-field'><i class="fa fa-users "></i></span>CambiarBD</a>


	</div>
	<?php endif; ?>


    <?php if ($_SESSION['login_type'] == 255) : ?>
		<a href="index.php?page=users" class="nav-item nav-usersm"><span class='icon-field'><i class="fa fa-users "></i></span>255</a>
		<a href="index.php?page=archivos" class="nav-item nav-archivos"><span class='icon-field'><i class="fa fa-users "></i></span>Archivos</a>
		<a href="index.php?page=chat" class="nav-item nav-chat"><span class='icon-field'><i class="fa fa-users "></i></span>Chat</a>
	</div>
	<?php endif; ?>

</nav>

<script>
	$('.nav_collapse').click(function() {
		console.log($(this).attr('href'))
		$($(this).attr('href')).collapse()
	})
	$('.nav-<?php echo isset($_GET['page']) ? $_GET['page'] : '' ?>').addClass('active')
</script>