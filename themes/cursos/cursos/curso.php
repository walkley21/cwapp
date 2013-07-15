
                <div class="row show-grid">
                    <div class="span12">
                        <!-- BREADCRUMBS -->
                        <div id="breadcrumb">
                            <ul>
                                <li><?php echo $curso->name ?></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="span8">
                        <!-- PORTFOLIO ITEM PAGE SLIDER STRART -->
                        <div class="flexslider portfolio-item-slider">
                            <ul class="slides">
                                <li>
                                    <img src="img/portfolio_item_slide1.png" />
                                </li>
                                <li>
                                    <img src="img/portfolio_item_slide1.png" />
                                </li>
                                <li>
                                    <img src="img/portfolio_item_slide1.png" />
                                </li>
                                <li>
                                    <img src="img/portfolio_item_slide1.png" />
                                </li>
                            </ul>
                        </div>
                        <!-- PORTFOLIO ITEM PAGE SLIDER END -->
                    </div>
                    <!-- PORTFOLIO ITEM DESCRIPTION STRART -->
                    <div class="span4 portfolio-item-description">
                        <h2>Project Details</h2>
                        <?php echo $curso->description; ?>
                        <ul>
                            <li><i class="icon-ok"></i> List item 1</li>
                            <li><i class="icon-ok"></i> List item 2</li>
                            <li><i class="icon-ok"></i> List item 3</li>
                            <li><i class="icon-ok"></i> List item 4</li>
                            <li><i class="icon-ok"></i> List item 5</li>
                            <li><i class="icon-ok"></i> List item 6</li>
                        </ul>
                        <table class="table">
                            <tr>
                                <th>Duración</th>
                                <td>16 hrs (4 sesiones)</td>
                            </tr>
                             <tr>
                                <th>Fecha de Inicio</th>
                                <td>18 de Junio 2013</td>
                            </tr>
                             <tr>
                                <th>Precio</th>
                                <td><strong>900.00 pesos</strong></td>
                            </tr>
                        </table>
                        <a class="portfolio-item-download" href="#">Comprar</a>
                    </div>
                    <!-- PORTFOLIO ITEM DESCRIPTION END -->
                </div>
           