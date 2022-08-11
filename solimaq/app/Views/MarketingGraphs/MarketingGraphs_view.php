

<script src="https://cdn.jsdelivr.net/npm/chart.js@3.2.1/dist/chart.min.js"></script>

<div class="sl-mainpanel">
      <nav class="breadcrumb sl-breadcrumb">
      <?php 
          foreach($parent as $breadcrumb){
              //var_dump($breadcrumb->parent);
              echo ('<a class="breadcrumb-item"  href="'.base_url()."/".$breadcrumb->controller.'">Marketing Graficas</a>');
              echo ('<a class="breadcrumb-item"  href="'.base_url()."/".$breadcrumb->parent.'">Marketing Campañas</a>');
            
          }
      ?>
      </nav>

      

    <div class="sl-pagebody">
      <div class="row row-sm">
          <div class="col-xl-6">
            <div class="card pd-20 pd-sm-40" style="width: 70%; height: 100%;">
              <h6 class="card-body-title">Leads De Campañas</h6>
              <p class="mg-b-20 mg-sm-b-30">Datos de Leads de campañas activas.</p>
              <canvas id="myChart" width="50" height="50"></canvas>
            </div><!-- card -->
          </div><!-- col-6 -->
          <div class="col-xl-6 mg-t-25 mg-xl-t-0">
            <div class="card pd-20 pd-sm-40" style="width: 70%; height: 100%;">
              <h6 class="card-body-title">Mejores campañas de Marketing</h6>
              <p class="mg-b-20 mg-sm-b-30">Mejores 5 campañas.</p>
              <canvas id="myChart2"></canvas>
            </div><!-- card -->
          </div><!-- col-6 -->
        </div><!-- row -->

        <div class="row row-sm pt-10">
        <div class="col-xl-6">
            <div class="card pd-20 pd-sm-40" style="width: 70%; height: 100%; margin-top:50px">
              <h6 class="card-body-title">Leads</h6>
              <p class="mg-b-20 mg-sm-b-30">Datos de Leads de menores ventas.</p>
              <canvas id="myChart3" width="50" height="50"></canvas>
            </div><!-- card -->
          </div><!-- col-6 -->
          
        </div><!-- row -->
        
         
      
    </div><!-- sl-pagebody -->
</div><!-- sl-mainpanel -->


<script>

var labels = [];
var data2 = [];
var escalafon = <?php echo json_encode($leads);  ?>;


let i;

for (i = 0; i < escalafon.length; i++) {
    labels.push(escalafon[i].name);
    data2.push(escalafon[i].leads);

}


var ctx = document.getElementById('myChart').getContext('2d');
var myChart = new Chart(ctx, {
    type: 'bar',
    data: {
        labels: labels,
        datasets: [{
            label: 'Leads',
            data:data2,
            backgroundColor: [
                'rgba(255, 99, 132, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(255, 206, 86, 0.2)',
                'rgba(75, 192, 192, 0.2)',
                'rgba(153, 102, 255, 0.2)',
                'rgba(255, 159, 64, 0.2)',
                'rgba(255, 159, 64, 0.2)'
            ],
            borderColor: [
                'rgba(255, 99, 132, 1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(75, 192, 192, 1)',
                'rgba(153, 102, 255, 1)',
                'rgba(255, 159, 64, 1)',
                'rgba(255, 159, 64, 1)'
            ],
            borderWidth: 1
        }]
    },
    options: {
        scales: {
            y: {
                beginAtZero: true
            }
        }
    }
});


//Data de la grafica de pie

var labelspie = [];
var valorespie = [];
var best = <?php echo json_encode($best);  ?>;

let j;

for (j = 0; j < best.length; j++) {
  labelspie.push(best[j].name);
  valorespie.push(best[j].leads);

}


const data = {
  labels:labelspie ,
  datasets: [{
    label: 'My First Dataset',
    data: valorespie,
    backgroundColor: [
      'rgb(255, 99, 132)',
      'rgb(54, 162, 235)',
      'rgb(255, 205, 86)',
      'rgb(162, 51, 255 )'

    ],
    hoverOffset: 4
  }]
};

var ctx2 = document.getElementById('myChart2').getContext('2d');
var myChart = new Chart(ctx2, {
    type: 'pie',
    data: data


});


///////peores camapañas////



var labelsworse = [];
var valoresworse = [];
var worse = <?php echo json_encode($worse);  ?>;

let e;

for (e = 0; e < worse.length; e++) {
  labelsworse.push(worse[e].name);
  valoresworse.push(worse[e].leads);

}





var ctx = document.getElementById('myChart3').getContext('2d');
var myChart = new Chart(ctx, {
    type: 'doughnut',
    data: {
        labels:labelsworse,
        datasets: [{
            label: "LEADS",
            data:valoresworse,
            backgroundColor: [
                'rgba(255, 99, 132)',
                'rgba(54, 162, 235)',
                'rgba(255, 206, 86)',
                'rgba(75, 192, 192)',
                'rgba(153, 102, 255)',
                'rgba(255, 159, 64)',
                'rgba(255, 159, 64)'
            ],
            borderColor: [
                'rgba(255, 99, 132)',
                'rgba(54, 162, 235)',
                'rgba(255, 206, 86)',
                'rgba(75, 192, 192)',
                'rgba(153, 102, 255)',
                'rgba(255, 159, 64)',
                'rgba(255, 159, 64)'
            ],
            borderWidth: 1
        }]
    },
    options: {
        scales: {
            y: {
                beginAtZero: true
            }
        }
    }
});





</script>


