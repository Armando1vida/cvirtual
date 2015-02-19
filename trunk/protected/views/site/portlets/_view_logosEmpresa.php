<?php
$num_empresas = count($imagenes_empresas);
?>
<script>
    $(document).ready(function() {

        $("#owl-example").owlCarousel({
            items: 6,
            lazyLoad: true,
            navigation: true
        });
    });

</script>
<h1 class="center">
    Empresas                                </h1>
<div id="owl-example" class="owl-carousel" >
    <?php
    foreach ($imagenes_empresas as $value) {
        echo '<div class="owl-item" style="width: 234px;">';
        echo '<div class="item darkCyan">';
        echo ' <img  src = "' . $value['src'] . '" alt = "Touch">';
        echo '<h3>' . $value["empresa"] . '</h3>';
        echo '   </div>'; //item
        echo '   </div>'; //owl
    }
    ?>  
 
    <div class="owl-item" style="width: 234px;">
        <div class="item darkCyan">
            <img src="http://owlgraphic.com/owlcarousel/assets/img/demo-slides/touch.png" alt="Touch">
            <h3>Touch</h3>
            <h4>Can touch this</h4>
        </div>
    </div>
    <div class="owl-item" style="width: 234px;"><div class="item forestGreen">
            <img src="http://owlgraphic.com/owlcarousel/assets/img/demo-slides/grab.png" alt="Grab">
            <h3>Grab</h3>
            <h4>Can grab this</h4>
        </div></div><div class="owl-item" style="width: 234px;"><div class="item orange">
            <img src="http://owlgraphic.com/owlcarousel/assets/img/demo-slides/responsive.png" alt="Responsive">
            <h3>Responsive</h3>
            <h4>Fully responsive!</h4>
        </div></div><div class="owl-item" style="width: 234px;"><div class="item yellow">
            <img src="http://owlgraphic.com/owlcarousel/assets/img/demo-slides/css3.png" alt="CSS3">
            <h3>CSS3</h3>
            <h4>3D Acceleration.</h4>
        </div></div><div class="owl-item" style="width: 234px;"><div class="item dodgerBlue">
            <img src="http://owlgraphic.com/owlcarousel/assets/img/demo-slides/multi.png" alt="Multi">
            <h3>Multiply</h3>
            <h4>Owls on page.</h4>
        </div></div><div class="owl-item" style="width: 234px;"><div class="item skyBlue">
            <img src="http://owlgraphic.com/owlcarousel/assets/img/demo-slides/modern.png" alt="Modern Browsers">
            <h3>Modern</h3>
            <h4>Browsers Compatibility</h4>
        </div></div><div class="owl-item" style="width: 234px;"><div class="item zombieGreen">
            <img src="http://owlgraphic.com/owlcarousel/assets/img/demo-slides/zombie.png" alt="Zombie Browsers - old ones">
            <h3>Zombie</h3>
            <h4>Browsers Compatibility</h4>
        </div></div><div class="owl-item" style="width: 234px;"><div class="item violet">
            <img src="http://owlgraphic.com/owlcarousel/assets/img/demo-slides/controls.png" alt="Take Control">
            <h3>Take Control</h3>
            <h4>The way you like</h4>
        </div></div><div class="owl-item" style="width: 234px;"><div class="item yellowLight">
            <img src="http://owlgraphic.com/owlcarousel/assets/img/demo-slides/feather.png" alt="Light">
            <h3>Light</h3>
            <h4>As a feather</h4>
        </div></div><div class="owl-item" style="width: 234px;"><div class="item steelGray">
            <img src="http://owlgraphic.com/owlcarousel/assets/img/demo-slides/tons.png" alt="Tons of Opotions">
            <h3>Tons</h3>
            <h4>of options</h4>
        </div></div>
</div>