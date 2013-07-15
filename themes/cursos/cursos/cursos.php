

<div class="row show-frid">
    <div class="span12">
        <!-- BREADCRUMBS -->
        <div id="breadcrumb">
            <ul>
                <li>Cursos</li>
            </ul>
        </div>
    </div>
</div>
<div class="row">
    <div class="span12">
        <!-- START PORTFOLIO NAV -->
        <div class="portfolio-nav">
            <!-- SET PORTFOLIO NAV FILTERS HERE -->
            <ul id="filters" data-option-key="filter" class="nav nav-pills nav-pills-portfolio">
                <li class="active"><a href="#" data-toggle="pill" data-filter="*">All</a></li>
                <li><a href="#" data-toggle="pill" data-filter=".web">Web Design</a></li>
                <li><a href="#" data-toggle="pill" data-filter=".photo">Photography</a></li>
                <li><a href="#" data-toggle="pill" data-filter=".dev">Development</a></li>
            </ul>
        </div>
        <!-- END PORTFOLIO NAV -->

        <!-- START PORTFOLIO GRID -->
        <div class="portfolio-grid-1">
            <ul id="gallery" class="thumbnails">
                <!-- PORTFOLIO ITEM 1 -->
                <?php foreach ($cursos as $curso): ?>
                <li class="span4 small hp-wrapper web">
                    <div class="fancy-wrapper">
                        <a class="fancy" href="img/portfolio-1-large.png">                                
                        </a>
                        <img alt="" src="<?php echo $curso->getImageSrc(); ?>" />
                    </div>
                    <div class="bottom-block">
                        <a href="<?php echo $curso->getPermaLink("curso/") ?>"><?php echo $curso->name ?></a>
                        <p>web design</p>
                    </div>
                </li>
               <?php endforeach; ?> 
            </ul>
        </div>
        <!-- END PORTFOLIO GRID -->
    </div>
</div>

