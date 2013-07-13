        <div class="container-fluid">
            <div class="row-fluid">

              <div class="area-top clearfix">
                <div class="pull-left header">
                  <h3 class="title">
                    <i class="icon-table"></i>
                    <?php echo $title; ?>
                  </h3>
                  <h5>
                    A subtissle can be added here
                  </h5>
                </div>

                <ul class="inline pull-right sparkline-box">

                  <li class="sparkline-row">
                    <h4 class="blue"><span>Orders</span> 847</h4>
                    <div class="sparkline big" data-color="blue"><!--16,29,20,25,19,11,26,23,8,27,21,16--></div>
                  </li>

                  <li class="sparkline-row">
                    <h4 class="green"><span>Reviews</span> 223</h4>
                    <div class="sparkline big" data-color="green"><!--13,10,8,23,16,11,19,7,12,28,3,14--></div>
                  </li>

                  <li class="sparkline-row">
                    <h4 class="red"><span>New visits</span> 7930</h4>
                    <div class="sparkline big"><!--26,15,17,27,16,9,9,13,12,7,20,6--></div>
                  </li>

                </ul>
              </div>
            </div>
          </div>

          <div class="container-fluid padded">
            <div class="row-fluid">

              <!-- Breadcrumb line -->

              <div id="breadcrumbs">
                    <div class="breadcrumb-button blue">
                      <span class="breadcrumb-label"><i class="icon-home"></i> Home</span>
                      <span class="breadcrumb-arrow"><span></span></span>
                    </div>


                    <div class="breadcrumb-button">
                      <span class="breadcrumb-label">
                        <i class="icon-beaker"></i> UI Lab
                      </span>
                      <span class="breadcrumb-arrow"><span></span></span>
                    </div>


                    <div class="breadcrumb-button">
                      <span class="breadcrumb-label">
                        <i class="icon-table"></i> Tables
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
                              <th><div>Tarea</div></th>
                              <th><div>Fecha Inicio</div></th>
                              <th><div>Fecha Termino</div></th>
                              <th><div>Estado</div></th>
                              <th><div>Estado</div></th>
                              <th><div>Prioridad</div></th>
                            
                            </tr>
                            </thead>
                            <tbody>
                            <?php foreach ($records  as $record):?>
                            <tr>
                              <td><?php echo $record->getLevelString() ?><?php echo $record->edit_link_field('name') ?></td>
                              <td><?php echo $record->getStartDate() ?></td>
                              <td><?php echo $record->getEndDate() ?></td>
                           
                               <td><?php echo $record->getComments() ?></td>
                              <td><?php echo $record->getIncidences() ?></td>
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