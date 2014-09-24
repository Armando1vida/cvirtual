<?php
/* @var $this SiteController */
$this->pageTitle = Yii::app()->name;
Util::tsRegisterAssetJs('index.js');
//die(var_dump($points));
?>
<div class="row-fluid">
    <div class="span8" id="right_column">
        <!-- BEGIN GENERAL PORTLET-->
        <div class="widget ">
            <div class="widget-title">
                <h4><i class=" icon-trophy"></i>  MeetClic</h4>
                <span class="tools">
                    <a href="javascript:;" class="icon-chevron-down"></a>
                </span>
            </div>
            <div class="widget-body">
                <div class="row-fluid">
                    <?php $this->renderPartial('portlets/_mapaEmpresas', array('points' => $points)) ?>

                </div>


            </div>
        </div>
        <!-- END GENERAL PORTLET-->

        <!-- BEGIN SAMPLE PORTLET-->
        <div class="widget ">
            <div class="widget-title">
                <h4><i class="icon-reorder"></i>Enterate</h4>
                <span class="tools">
                    <a href="javascript:;" class="icon-chevron-down"></a>
                </span>
            </div>
            <div class="widget-body">
                <div class="row-fluid">

                </div>

            </div>
        </div>




        <!-- END HORIZONTAL DESCRIPTION LISTS PORTLET-->
    </div>
    <div class="span4">
        <!-- BEGIN ORDERED LISTS PORTLET-->
        <div class="widget orange">
            <div class="widget-title">
                <h4><i class="icon-reorder"></i> Eventos </h4>
                <span class="tools">
                    <a href="javascript:;" class="icon-chevron-down"></a>
                </span>
            </div>
            <div class="widget-body">
                    <?php $this->renderPartial('portlets/_calendario') ?>

            </div>
        </div>
        <!-- END ORDERED LISTS PORTLET-->
        <!-- BEGIN UNORDERED LISTS PORTLET-->
        <div class="widget">
            <div class="widget-title">
                <h4><i class="icon-reorder"></i> Unordered Lists</h4>
                <span class="tools">
                    <a href="javascript:;" class="icon-chevron-down"></a>
                    <a href="javascript:;" class="icon-remove"></a>
                </span>
            </div>
            <div class="widget-body">
                <ul>
                    <li>Lorem ipsum dolor sit amet</li>
                    <li>Consectetur adipiscing elit</li>
                    <li>Lorem ipsum dolor sit amet</li>
                    <li>Integer molestie lorem at massa</li>
                    <li>Lorem ipsum dolor sit amet</li>
                    <li>Facilisis in pretium nisl aliquet</li>
                    <li>
                        Nulla volutpat aliquam velit
                        <ul>
                            <li>Phasellus iaculis neque</li>
                            <li>Purus sodales ultricies</li>
                            <li>Vestibulum laoreet porttitor sem</li>
                            <li>Ac tristique libero volutpat at</li>
                        </ul>
                    </li>
                    <li>Faucibus porta lacus fringilla vel</li>
                    <li>Aenean sit amet erat nunc</li>
                    <li>Eget porttitor lorem</li>
                </ul>
            </div>
        </div>

        <div class="widget green">
            <div class="widget-title">
                <h4><i class="icon-reorder"></i> Letter List </h4>
                <span class="tools">
                    <a href="javascript:;" class="icon-chevron-down"></a>
                    <a href="javascript:;" class="icon-remove"></a>
                </span>
            </div>
            <div class="widget-body">
                <ul class="upper-alpha">
                    <li>Lorem ipsum dolor sit amet</li>
                    <li>Consectetur adipiscing elit</li>
                    <li>Integer molestie lorem at massa</li>
                    <li>Facilisis in pretium nisl aliquet</li>
                    <li>
                        Nulla volutpat aliquam velit
                        <ul>
                            <li>Phasellus iaculis neque</li>
                            <li>Purus sodales ultricies</li>
                            <li>Vestibulum laoreet porttitor sem</li>
                            <li>Ac tristique libero volutpat at</li>
                        </ul>
                    </li>
                    <li>Faucibus porta lacus fringilla vel</li>
                    <li>Aenean sit amet erat nunc</li>
                    <li>Eget porttitor lorem</li>
                    <li>Aenean sit amet erat nunc</li>
                    <li>Lorem ipsum dolor sit amet</li>
                </ul>
            </div>
        </div>
        <!-- END UNSTYLED LISTS PORTLET-->
        <!-- BEGIN UNSTYLED LISTS PORTLET-->
        <div class="widget blue">
            <div class="widget-title">
                <h4><i class="icon-reorder"></i> Roman List  </h4>
                <span class="tools">
                    <a href="javascript:;" class="icon-chevron-down"></a>
                    <a href="javascript:;" class="icon-remove"></a>
                </span>
            </div>
            <div class="widget-body">
                <ul class="roman-list">
                    <li>Lorem ipsum dolor sit amet</li>
                    <li>Consectetur adipiscing elit</li>
                    <li>Integer molestie lorem at massa</li>
                    <li>Facilisis in pretium nisl aliquet</li>
                    <li>
                        Nulla volutpat aliquam velit
                        <ul>
                            <li>Phasellus iaculis neque</li>
                            <li>Purus sodales ultricies</li>
                            <li>Vestibulum laoreet porttitor sem</li>
                            <li>Ac tristique libero volutpat at</li>
                        </ul>
                    </li>
                    <li>Faucibus porta lacus fringilla vel</li>
                    <li>Aenean sit amet erat nunc</li>
                    <li>Eget porttitor lorem</li>
                    <li>Aenean sit amet erat nunc</li>
                    <li>Lorem ipsum dolor sit amet</li>
                </ul>
            </div>
        </div>
        <!-- END UNSTYLED LISTS PORTLET-->
        <!-- BEGIN ICONIN LISTS PORTLET-->
        <div class="widget yellow">
            <div class="widget-title">
                <h4><i class="icon-reorder"></i> Iconic Lists</h4>
                <span class="tools">
                    <a href="javascript:;" class="icon-chevron-down"></a>
                    <a href="javascript:;" class="icon-remove"></a>
                </span>
            </div>
            <div class="widget-body">
                <ul class="unstyled icons">
                    <li><i class="icon-ok"></i>  Lorem ipsum dolor sit amet</li>
                    <li><i class="icon-fire"></i>  Consectetur adipiscing elit</li>
                    <li><i class="icon-bolt"></i>  Integer molestie lorem at massa</li>
                    <li><i class="icon-pencil"></i>  Facilisis in pretium nisl aliquet</li>
                    <li><i class="icon-book"></i> 
                        Nulla volutpat aliquam velit
                        <ul class="icons">
                            <li><i class="icon-leaf"></i>  Phasellus iaculis neque</li>
                            <li><i class="icon-link"></i>  Purus sodales ultricies</li>
                            <li><i class="icon-lock"></i>  Vestibulum laoreet porttitor sem</li>
                            <li><i class="icon-random"></i>  Ac tristique libero volutpat at</li>
                        </ul>
                    </li>
                    <li><i class="icon-pushpin"></i>  Faucibus porta lacus fringilla vel</li>
                    <li><i class="icon-plane"></i>  Aenean sit amet erat nunc</li>
                    <li><i class="icon-cogs"></i>  Eget porttitor lorem</li>
                </ul>
            </div>
        </div>
        <!-- END ICONIC LISTS PORTLET-->

    </div>
</div>