<?php
/* @var $this SiteController */
$this->pageTitle = Yii::app()->name;
Util::tsRegisterAssetJs('index.js');
?>

<!--<h1>Bienvenido al Demo de <?php // echo CHtml::encode(Yii::app()->name);    ?></h1>-->
<div class=row-fluid>
    <div class="span12">
        <!-- BEGIN TAB PORTLET-->
        <div class="widget widget-tabs red">
            <div class="widget-title">
                <!--<h4><i class=" icon-search"></i>Search Result</h4>-->
            </div>
            <div class="widget-body">
                <div class="tabbable portlet-tabs">
                    <ul class="nav nav-tabs pull-left">
                        <li class=""><a href="#portlet_tab4" data-toggle="tab">BU</a></li>
                        <li class=""><a href="#portlet_tab3" data-toggle="tab">Busqueda Empresa</a></li>
                        <li class=""><a href="#portlet_tab2" data-toggle="tab">Busqueda Productos</a></li>
                        <li class="active"><a href="#portlet_tab1" data-toggle="tab">MeetClic</a></li>
                    </ul>
                    <div class="clearfix"></div>
                    <div class="tab-content">
                        <div class="tab-pane active" id="portlet_tab1">
                            <!--                            <form class="form-horizontal search-result">
                                                            <div class="control-group">
                                                                <label class="control-label">MeetClic</label>
                                                                <div class="controls">
                                                                    <input type="text" class="input-xxlarge">
                                                                    <p class="help-block">About 3,880,000 results (0.29 seconds) </p>
                                                                </div>
                                                                <button type="submit" class="btn ">SEARCH</button>
                                                            </div>
                                                        </form>-->
                            <div class="space20"></div>
                            <!-- BEGIN CLASSIC SEARCH-->

                            <!-- END CLASSIC SEARCH-->

                            <div class="row-fluid">
                                <div class="span12">

                                    <?php $this->renderPartial('portlets/_mapaEmpresas') ?>

                                </div>

                            </div>

                        </div>
                        <div class="tab-pane" id="portlet_tab2">
                            <form class="form-horizontal search-result">
                                <div class="control-group">
                                    <label class="control-label">Search</label>
                                    <div class="controls">
                                        <input type="text" class="input-xxlarge">
                                        <p class="help-block">About 3,880,000 results (0.29 seconds) </p>
                                    </div>
                                    <button type="submit" class="btn ">SEARCH</button>
                                </div>
                            </form>
                            <div class="space20"></div>
                            <!-- BEGIN FILE SEARCH-->
                            <table class="table table-hover file-search">
                                <thead>
                                    <tr>
                                        <th>File Name &amp; Location</th>
                                        <th>Created</th>
                                        <th>Last Modify</th>
                                        <th>Size</th>
                                        <th>Type</th>
                                    </tr>
                                </thead>
                                <tbody>


                                    <tr>
                                        <td>
                                            <img src="http://cdn8.upsocl.com/wp-content/uploads/2014/08/10431442_1469983739910927_8197100455533721168_n11-372x248.jpg" alt="">

                                            <strong>Price chart Table.xls</strong>
                                            C:\Users\Murat\Documents\My Dropbox
                                        </td>
                                        <td>01.01.2012	</td>
                                        <td>12.05.2013</td>
                                        <td>193 KB</td>
                                        <td>File</td>
                                    </tr>

                                </tbody>
                            </table>
                            <!-- END FILE SEARCH-->
                            <div class="space20"></div>

                            <div class="pagination pagination-centered">
                                <ul>
                                    <li><a href="#">Prev</a></li>
                                    <li class="active"><a href="#">1</a></li>
                                    <li><a href="#">2</a></li>
                                    <li><a href="#">3</a></li>
                                    <li><a href="#">4</a></li>
                                    <li><a href="#">5</a></li>
                                    <li><a href="#">Next</a></li>
                                </ul>
                            </div>

                        </div>
                        <div class="tab-pane" id="portlet_tab3">
                            <form class="form-horizontal search-result">
                                <div class="control-group">
                                    <label class="control-label">Search</label>
                                    <div class="controls">
                                        <input type="text" class="input-xxlarge">
                                        <p class="help-block">About 3,880,000 results (0.29 seconds) </p>
                                    </div>
                                    <button type="submit" class="btn ">SEARCH</button>
                                </div>
                            </form>
                            <div class="space20"></div>
                            <!--BEGIN COMPANY SEARCH-->

                            <!--END COMPANY SEARCH-->
                            <div class="space20"></div>



                        </div>
                        <div class="tab-pane" id="portlet_tab4">
                            <form class="form-horizontal search-result">
                                <div class="control-group">
                                    <label class="control-label">Search</label>
                                    <div class="controls">
                                        <input type="text" class="input-xxlarge">
                                        <p class="help-block">About 3,880,000 results (0.29 seconds) </p>
                                    </div>
                                    <button type="submit" class="btn ">SEARCH</button>
                                </div>
                            </form>
                            <div class="space20"></div>
                            <!--BEGIN PRODUCT SEARCH-->
                            <div class="row-fluid product-search">
                                <div class="span4 product-text">
                                    <!--<img alt="" src="img/product1.jpg">-->
                                    <div class="portfolio-text-info">
                                        <h4>iMac Slim</h4>
                                        <p>21 inch Display, 1.8 GHz Processor, 8 GB Memory</p>
                                    </div>
                                </div>
                                <div class="span8">
                                    <div class="product-info">
                                        Today Sold
                                        <span>190</span>
                                    </div>
                                    <div class="product-info">
                                        Today's Earning
                                        <span>1,970</span>
                                    </div>
                                    <div class="product-info">
                                        Total Sold
                                        <span>$12.300</span>
                                    </div>
                                    <div class="product-info">
                                        Total Earnings
                                        <span>$12.300</span>
                                    </div>
                                </div>
                            </div>
                            <div class="row-fluid product-search">
                                <div class="span4 product-text">
                                    <!--<img alt="" src="img/product2.png">-->
                                    <div class="portfolio-text-info">
                                        <h4>iMac Slim</h4>
                                        <p>21 inch Display, 1.8 GHz Processor, 8 GB Memory</p>
                                    </div>
                                </div>
                                <div class="span8">
                                    <div class="product-info">
                                        Today Sold
                                        <span>190</span>
                                    </div>
                                    <div class="product-info">
                                        Today's Earning
                                        <span>1,970</span>
                                    </div>
                                    <div class="product-info">
                                        Total Sold
                                        <span>$12.300</span>
                                    </div>
                                    <div class="product-info">
                                        Total Earnings
                                        <span>$12.300</span>
                                    </div>
                                </div>
                            </div>
                            <div class="row-fluid product-search">
                                <div class="span4 product-text">
                                    <!--<img alt="" src="img/product3.png">-->
                                    <div class="portfolio-text-info">
                                        <h4>iMac Slim</h4>
                                        <p>21 inch Display, 1.8 GHz Processor, 8 GB Memory</p>
                                    </div>
                                </div>
                                <div class="span8">
                                    <div class="product-info">
                                        Today Sold
                                        <span>190</span>
                                    </div>
                                    <div class="product-info">
                                        Today's Earning
                                        <span>1,970</span>
                                    </div>
                                    <div class="product-info">
                                        Total Sold
                                        <span>$12.300</span>
                                    </div>
                                    <div class="product-info">
                                        Total Earnings
                                        <span>$12.300</span>
                                    </div>
                                </div>
                            </div>
                            <div class="row-fluid product-search">
                                <div class="span4 product-text">
                                    <!--<img alt="" src="img/product4.png">-->
                                    <div class="portfolio-text-info">
                                        <h4>iMac Slim</h4>
                                        <p>21 inch Display, 1.8 GHz Processor, 8 GB Memory</p>
                                    </div>
                                </div>
                                <div class="span8">
                                    <div class="product-info">
                                        Today Sold
                                        <span>190</span>
                                    </div>
                                    <div class="product-info">
                                        Today's Earning
                                        <span>1,970</span>
                                    </div>
                                    <div class="product-info">
                                        Total Sold
                                        <span>$12.300</span>
                                    </div>
                                    <div class="product-info">
                                        Total Earnings
                                        <span>$12.300</span>
                                    </div>
                                </div>
                            </div>
                            <div class="row-fluid product-search">
                                <div class="span4 product-text">
                                    <!--<img alt="" src="img/product5.png">-->
                                    <div class="portfolio-text-info">
                                        <h4>iMac Slim</h4>
                                        <p>21 inch Display, 1.8 GHz Processor, 8 GB Memory</p>
                                    </div>
                                </div>
                                <div class="span8">
                                    <div class="product-info">
                                        Today Sold
                                        <span>190</span>
                                    </div>
                                    <div class="product-info">
                                        Today's Earning
                                        <span>1,970</span>
                                    </div>
                                    <div class="product-info">
                                        Total Sold
                                        <span>$12.300</span>
                                    </div>
                                    <div class="product-info">
                                        Total Earnings
                                        <span>$12.300</span>
                                    </div>
                                </div>
                            </div>
                            <!--END PRODUCT SEARCH-->
                            <div class="space20"></div>

                            <div class="pagination pagination-centered">
                                <ul>
                                    <li><a href="#">Prev</a></li>
                                    <li class="active"><a href="#">1</a></li>
                                    <li><a href="#">2</a></li>
                                    <li><a href="#">3</a></li>
                                    <li><a href="#">4</a></li>
                                    <li><a href="#">5</a></li>
                                    <li><a href="#">Next</a></li>
                                </ul>
                            </div>

                        </div>

                    </div>
                </div>
            </div>
        </div>
        <!-- END TAB PORTLET-->
    </div>
</div>




