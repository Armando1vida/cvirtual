<script>
    var opcion_open = false;
    $(function() {
        $("#btnBusquedaGoogle").on('click', function() {
            console.log(opcion_open);
            if (opcion_open == true) {
                opcion_open = false;
                $("#opciones-busqueda-google-formulario").attr('style', "left: -499px;");
            }
            else if (opcion_open == false) {
                opcion_open = true;
                $("#opciones-busqueda-google-formulario").attr('style', "left: 40px;");
            }
        });
    });
</script>

<div class="container-fluid">

    <div class="row-fluid">
        <div class="span12 project-content">

            <!-- END PAGE TITLE & BREADCRUMB-->
            <form class="form-vertical" method="get" action="#">
                <div class="">
                    <h4 class="">Busqueda Locales</h4> 
                </div>
                <div class="row-fluid">

                    <div class="span3">
                        <div class=" input-append search-input-area">
                            <input class="" id="appendedInputButton" type="text"  placeholder="Nombre del Local">
                            <button class="btn" type="button"><i class="icon-search"></i> </button>
                        </div>
                    </div>

                </div>

            </form>
        </div>
    </div>
    <br>
    <div class="row-fluid" >
        <div class="span12">
            <?php $this->renderPartial('portlets/_mapaEmpresas', array('points' => $points)) ?>
        </div>
    </div>
    <br>
    <div class="row-fluid" >
        <div class="span12">
            <?php $this->renderPartial('portlets/_view_logosEmpresa', array('imagenes_empresas' => $imagenes_empresas)) ?>

        </div>
    </div>


</div>
<div id="loader" style="display: none;">
    <div class="spinner">
        <div class="dot1"></div>
        <div class="dot2"></div>
    </div>
</div>
<!--<div  id="opciones-busqueda-google" class="switcher-box">
    <button id="btnBusquedaGoogle" class="btn open-switcher hide-switcher" type="button"><i id="busquedaGoogle" class="icon-map-marker"></i> </button>
    <a href="#" id="btnBusquedaGoogle" class="open-switcher hide-switcher"><i class="icon-map-marker"></i></a>
    <div class="contenedor-informacion ">
        <div class="contenedor-titulo">
            <h4>Busqueda Locales</h4> 
        </div>

        <span>Top Bar Color</span>
        <select id="topbar-style" class="topbar-style">
            <option value="1">Light (Default)</option>
            <option value="2">Dark</option>
            <option value="3">Color</option>
        </select>
        <span>Layout Style</span>
        <div class="input-append search-input-area">
            <input class="" id="appendedInputButton" type="text">
            <button class="btn" type="button"><i class="icon-search"></i> </button>
        </div>
        <select id="layout-style" class="layout-style">
            <option value="1">Wide</option>
            <option value="2">Boxed</option>
        </select>
    </div>
    <br>

</div>-->
<!--<div  id="opciones-busqueda-google-formulario" class="row-fluid switcher-box-formulario">

    <button id="btnBusquedaGoogle" class="btn open-switcher" type="button"><i id="busquedaGoogle" class="icon-map-marker"></i> </button>
    <br>
    <form class="form-vertical" method="get" action="#">
        <div class="switcher-box-title">
            <h4 class="">Busqueda Locales</h4> 
        </div>
        <div class="row-fluid">

            <div class="span3">
                <div class=" input-append search-input-area">
                    <input class="" id="appendedInputButton" type="text"  placeholder="Nombre del Local">
                    <button class="btn" type="button"><i class="icon-search"></i> </button>
                </div>
            </div>

        </div>

    </form>


</div>-->
<!--<div class="widget switcher-box-formulario">
    <div class="widget-title">
        <h4>
            Busqueda Locales
        </h4>
        <span class="tools">
        </span>
    </div>
    <div class="widget-body">
         BEGIN FORM
        <form class="form-vertical" method="get" action="#">
            <div class=" input-append search-input-area">
                <input class="" id="appendedInputButton" type="text"  placeholder="Nombre del Local">
                <button class="btn" type="button"><i class="icon-search"></i> </button>
            </div>
        </form>
         END FORM
    </div>
</div>-->

