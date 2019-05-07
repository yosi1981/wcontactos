
<canvas id="myChart" height="280" width="600" "></canvas>

      <script>




		$(document).ready(function() {
           var form=$('#busqueda');
            var formData=form.serialize();
        var Labels = new Array();
        var Prices = new Array();
        var url = "{{url('/admin/info/')}}/";
        $.ajax({
                type : 'get',
                url  : url,
                async: true,
                data: formData,
                dataType: 'json',
        }).done(function(response){
			for(var index in response) {
    			var attr = response[index];
                Labels.push(attr.fecha);
                Prices.push(attr.NumAnuncios);

			}
			var ctx = document.getElementById("myChart");
  			var myChart = new Chart(ctx,{
				    type: 'bar',
				    data: {
				        labels: Labels,
				        datasets: [{
				            label: 'N de Anuncios',
				            data: Prices,
				            backgroundColor: 'rgba(112, 156, 177, 0.6)',
				            borderColor: 'rgba(112, 156, 177, 1)',
				            borderWidth: 1
				        }]
				    },
				    options: {
				        scales: {
				            yAxes: [{
				                ticks: {
				                    beginAtZero:true
				                }
				            }]
				        }
				    }
				});
        })

          });


        </script>
