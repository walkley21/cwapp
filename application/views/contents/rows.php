        <div class="container-fluid">
            <div class="row-fluid">

              <div class="area-top clearfix">
                <div class="pull-left header">
                  <h3 class="title">
                    <i class="icon-table"></i>
                    <?php echo $title; ?>Cursos
                  </h3>
                  <h5>
                    lista de cursos
                  </h5>
                </div>

             
              </div>
            </div>
          </div>

          <div class="container-fluid padded">
            <div class="row-fluid">

              <!-- Breadcrumb line -->

              <div id="breadcrumbs">
                    <div class="breadcrumb-button blue">
                      <span class="breadcrumb-label"><i class="icon-home"></i> Inicio</span>
                      <span class="breadcrumb-arrow"><span></span></span>
                    </div>


                  

                    <div class="breadcrumb-button">
                      <span class="breadcrumb-label">
                        <i class="icon-table"></i> Projectos
                      </span>
                      <span class="breadcrumb-arrow"><span></span></span>
                    </div>
              </div>
            </div>
          </div>

          <div class="container-fluid padded">
              <div class="row-fluid">
              <div class="pull-right" style="padding-bottom: 14px;" >
                  
                  <?php echo $new_record ?>
                    
              </div>
              </div>   
              
              
                            <div class="row-fluid">
                              <div class="span12">
                                <div class="box">
                                  <div class="box-header"><span class="title">Data Tables</span></div>
                                  <div class="box-content">
                                    <!-- find me in partials/data_tables_custom -->

                            <div id="dataTables-1">

                            <table id="my-rows " cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered responsive">
                            <thead>
                            <tr>
                              <th><div>Nombre del Proyecto</div></th>
                              <th><div>Inicio</div></th>
                              <th><div>Termino</div></th>
                              <th><div>Estado</div></th>
                              <th><div>Aprobación</div></th>
                              <th><div>Prioridad</div></th>
                            
                            </tr>
                            </thead>
                            <tbody>
                            <?php foreach ($records  as $record):?>
                            <tr>
                              <td><?php echo $record->getLevelString() ?><?php echo $record->edit_link_field('name') ?></td>
                               
                               <td><?php echo $record->name?></td>
                               <td><?php echo $record->name?></td>
                               
                               <td><?php echo $record->name ?></td>
                               <td><?php echo '';/*$record->getContents()*/ ?></td>
                               <td><?php echo $record->name ?></td>
                             
                              <td class="center" style="text-align: center">
                                  <a href="<?php echo $record->edit_link() ?>"><i class="icon-edit"></i></a>  
                              </td>
                              <td  style="text-align: center">
                                  <a href="<?php echo $record->delete_link() ?>"><i class="icon-remove"></i></a> 
                              </td>
                            </tr>
                            <?php endforeach;?>
                          
                            </tbody>
                            </table>
                            </div>
                                  </div>
                                </div>
                              </div>
                            </div>
  </div>