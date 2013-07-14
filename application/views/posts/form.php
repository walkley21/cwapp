


<div class="container-fluid">
    <div class="row-fluid">

      <div class="area-top clearfix">
        <div class="pull-left header">
          <h3 class="title">
            <i class="icon-edit"></i>
               <?php echo '' ?>
          </h3>
          <h5>
                <?php echo '' ?>
          </h5>
        </div>

        <ul class="inline pull-right sparkline-box">

          <li class="sparkline-row">
            <h4 class="blue"><span>Orders</span> 847</h4>
            <div class="sparkline big" data-color="blue"><!--3,25,19,7,29,13,17,12,28,26,25,20--></div>
          </li>

          <li class="sparkline-row">
            <h4 class="green"><span>Reviews</span> 223</h4>
            <div class="sparkline big" data-color="green"><!--7,27,20,24,21,11,12,5,3,23,20,21--></div>
          </li>

          <li class="sparkline-row">
            <h4 class="red"><span>New visits</span> 7930</h4>
            <div class="sparkline big"><!--19,16,25,17,14,7,13,3,20,3,12,22--></div>
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
          <span class="breadcrumb-label"><i class="icon-home"></i> Inicio</span>
          <span class="breadcrumb-arrow"><span></span></span>
        </div>

         <div class="breadcrumb-button blue">
          <span class="breadcrumb-label"><i class="icon-home"></i> Proyectos</span>
          <span class="breadcrumb-arrow"><span></span></span>
        </div>

        <div class="breadcrumb-button">
          <span class="breadcrumb-label">
            <i class="icon-edit"></i> Crear un proyecto
          </span>
          <span class="breadcrumb-arrow"><span></span></span>
        </div>
          
          
          
      </div>
    </div>
  </div>

  <div class="container-fluid padded">
   


    <div class="row-fluid">
      <div class="span12">

        <div class="box">
          <div class="box-header">
            <span class="title"> <?php echo '' ?></span>
          </div>

          <div class="box-content">

            <form  action="<?php echo $form_action; ?>"   
                   class="form-horizontal fill-up validatable"
                   method="post"
                   enctype="<?php echo $form_enctype; ?>"
                   
                   
                   >

              <div class="padded">

                <div class="control-group">
                  <label class="control-label">Nombre del Curso</label>
                  <div class="controls">
                    <!--input type="text" 
                           class="validate[required]"
                           data-prompt-position="topLeft"/-->
                    
                    <input type="text" 
                           name="name"
                           class="validate[required]"
                           value="<?php echo $record->name; ?>"
                           data-prompt-position="topLeft"/>
                  </div>
                </div>
                    
                <div class="control-group">
                  <label class="control-label">Proyecto Padre </label>
                  <div class="controls">
                    <!--input type="text" 
                           class="validate[required]"
                           data-prompt-position="topLeft"/-->
                    
                       
                      
                  </div>
                </div>  
                  
                  
                <div class="control-group">
                  <label class="control-label">Descripción del Proyecto</label>
                  <div class="controls">
                    <textarea  name="description" class="validate[required]" data-prompt-position="topLeft"/><?php echo $record->description; ?></textarea>
                    
                  </div>
                </div>

                
                  
                  
                
                 <div class="control-group" >
                  <label class="control-label">Fecha de Inicio</label>
                  <div class="controls">
                     <input id="enddate" 
                            name="enddate"
                            value="<?php echo $record->startdate ?>" 
                            class="fill-up" type="text" placeholder="seleccione una fecha">
                    <script>
                         $('#enddate').datepicker({format:"dd/mm/yyyy",language:'es'});
                     </script>
                  </div>
                </div> 

                   
                <div class="control-group">
                  <label class="control-label">Presupuesto</label>
                  <div class="controls">
                    <input type="text" name="budget" class="span3" value=""  >
                    
                  </div>
                </div>

                <div class="control-group">
                  <label class="control-label">Estado</label>
                  <div class="controls">
                     <input type="file" name="image" class="span1"  >
                  </div>
                </div>
                  
                <div class="control-group">
                  <label class="control-label">Aprobación</label>
                  <div class="controls">
                     
                  </div>
                </div>

                <div class="control-group">
                <label class="control-label">Prioridad</label>
                <div class="controls">
                    
                </div>
              </div> 
                  
                  
              </div>

              <div class="form-actions">
                <button type="submit" class="btn btn-blue">Guardar</button>
                <button type="button" class="btn btn-default">Cancelar</button>
                
              </div>
            </form>

          </div>
        </div>

      </div>
    </div>





  </div>