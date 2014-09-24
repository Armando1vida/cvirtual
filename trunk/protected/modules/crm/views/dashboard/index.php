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
                <h4><i class="icon-reorder"></i>Preguntas Frecuentes</h4>
                <span class="tools">
                    <a href="javascript:;" class="icon-chevron-down"></a>
                    <a href="javascript:;" class="icon-remove"></a>
                </span>
            </div>
            <div class="widget-body">
                       <div class="tab-pane" id="portlet_tab4">

                            <div class="control-group">

                                <div class="timeline-messages">
                                    <!-- Comment -->
                                    <div class="msg-time-chat">
                                        <a class="message-img" href="#"><img alt="" src="<?php echo Yii::app()->theme->baseUrl; ?>/img/avatar1.jpg" class="avatar"></a>
                                        <div class="message-body msg-in">
                                            <span class="arrow"></span>
                                            <div class="text">
                                                <p class="attribution"><a href="#">Jhon Doe</a> at 1:55pm, 13th April 2013</p>
                                                <p>Hello, How are you brother?</p>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- /comment -->

                                    <!-- Comment -->
                                    <div class="msg-time-chat">
                                        <a class="message-img" href="#"><img alt="" src="<?php echo Yii::app()->theme->baseUrl; ?>/img/avatar2.jpg" class="avatar"></a>
                                        <div class="message-body msg-out">
                                            <span class="arrow"></span>
                                            <div class="text">
                                                <p class="attribution"> <a href="#">Jonathan Smith</a> at 2:01pm, 13th April 2013</p>
                                                <p>I'm Fine, Thank you. What about you? How is going on?</p>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- /comment -->

                                    <!-- Comment -->
                                    <div class="msg-time-chat">
                                        <a class="message-img" href="#"><img alt="" src="<?php echo Yii::app()->theme->baseUrl; ?>/img/avatar1.jpg" class="avatar"></a>
                                        <div class="message-body msg-in">
                                            <span class="arrow"></span>
                                            <div class="text">
                                                <p class="attribution"><a href="#">Jhon Doe</a> at 2:03pm, 13th April 2013</p>
                                                <p>Yeah I'm fine too. Everything is going fine here.</p>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- /comment -->

                                    <!-- Comment -->
                                    <div class="msg-time-chat">
                                        <a class="message-img" href="#"><img alt="" src="<?php echo Yii::app()->theme->baseUrl; ?>/img/avatar2.jpg" class="avatar"></a>
                                        <div class="message-body msg-out">
                                            <span class="arrow"></span>
                                            <div class="text">
                                                <p class="attribution"><a href="#">Jonathan Smith</a> at 2:05pm, 13th April 2013</p>
                                                <p>well good to know that. anyway how much time you need to done your task?</p>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- /comment -->
                                </div>
                                <div class="chat-form">
                                    <div class="input-cont">
                                        <input type="text" placeholder="Type a message here...">
                                    </div>
                                    <div class="btn-cont">
                                        <a href="javascript:;" class="btn btn-primary">Send</a>
                                    </div>
                                </div>

                            </div>




                        </div>
            </div>
        </div>
   

    </div>
</div>