    <link href="../../assets/css/linetime.css" rel="stylesheet">

    <!-- ########## START: MAIN PANEL ########## -->
    <div class="sl-mainpanel">

      <div class="mt-3">
        <button class="btn btn-warning mt-3" data-toggle="modal" data-target="#modaldemo3"><i class="fa fa-pencil mr-1" aria-hidden="true"></i>Actualizar seguimiento</button>
        


        <div class="container">
          <h2>Product name</h2>
          <ul id='timeline'>
            <!--Empezamos li-->
            <?php foreach ($cat_sales as $key) : ?>

              <li class='work'>
                <input class='radio' id='work"<?php echo $key["id"]; ?>"' name='works' type='radio' checked>
                <div class="relative">
                  <label for='work"<?php echo $key["id"]; ?>"'><?= $key['name'] ?></label>
                  <span class='date'><?php echo $key['position']; ?></span>
                  <span class='circle'></span>
                </div>
                <div class='content'>
                  <p>
                    <?php echo $key['description'] ?>
                  </p>
                </div>

                <!--Fin de li-->
              </li>


            <?php endforeach; ?>
          </ul>
        </div><!-- table-wrapper -->
      </div><!-- card -->
    </div>


    <style>

    #timeline::after { 
    
      content: "";
      width: 0px;
      height: 25%;
      position: absolute;
      top: 25%;
      
     
      border-left: 8px solid #00FF00;
     
     
      

    }






    </style>