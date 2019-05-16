<?php $__env->startSection('barraizda'); ?>
                <?php echo $__env->make('layouts.includes.'.Auth::user()->stringRol->nombre . '.barraizda', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('contenido'); ?>
<div class="modal fade modal-slide-in-right" id="crearCita" aria-hidden="true" role="dialog" >

</div>
<div class="modal fade modal-slide-in-right" id="editarCita" aria-hidden="true" role="dialog" >

</div>
	<div id='calendar' ></div>
	<input id="datetimepicker" type="text" value="2014/03/15 05:06">					




<script type="text/javascript">
	$(document).ready(function() {

		idanuncio=<?php echo e($anuncio->idanuncio); ?>;
		$('.modal').appendTo("body");
		$.get('/admin/CitasAnuncio/'+idanuncio,
			function(data)
			{
		var hoy = new Date();
		var dd = "09" //hoy.getDate();
		var mm = "05" //hoy.getMonth()+1; //hoy es 0!
		var yyyy = "2018" //hoy.getFullYear();
		if(dd<10) {
		    dd='0'+dd
		} 

		if(mm<10) {
		    mm='0'+mm
		} 

		hoy = yyyy+'-'+mm+'-'+dd;
    alert(data);
		$('#calendar').fullCalendar({
			defaultDate: hoy,
			navLinks: false, // can click day/week names to navigate views
			editable: false,
			eventLimit: false, // allow "more" link when too many events
			events: data,
   eventRender: function(event,element){
      alert("prueba");
   		var el=element.html();
   		element.html("<div>"+el+"<i class='fa fa-trash' style=\"color:red;\"></i></div>");
   },
   eventClick: function(calEvent, jsEvent, view) {

   		console.log(jsEvent);
   		console.log(view);
 		console.log(calEvent);
 		idcita=calEvent["id"];
        $.get('/admin/editCita/'+idcita,
        	function(data){
        		
        		$('#editarCita').html(data);
				$('#ehoraini').datetimepicker({
		  			datepicker:false,
		  			format:'H:i'
				});
				$('#ehorafin').datetimepicker({
		  			datepicker:false,
		  			format:'H:i'
				});
				$('#efecha').datetimepicker({
		  			timepicker:false,
		  			format:'Y/m/d'
				});
  		$('#actualizarCita').on('click',function(e){
  			e.preventDefault();
    		var form=$('#EditCita');
    		var formData=form.serialize();
    		var url=form.attr('action');
    		$.ajax({
    			type:'post',
    			url: url,
    			data: formData,
    			async: true,
    			dataType: 'json',
    			headers: {
                       'X-CSRF-TOKEN': '<?php echo e(csrf_token()); ?>',
                   },
    			success:function(data){			
     				$('#editarCita').modal('hide');
     				calEvent.title=data["idcita"]+" title";
                	calEvent.start=data['fecha']+" "+data['horaini'];
                	calEvent.end= data['fecha']+" "+data['horafin'];
					$('#calendar').fullCalendar('updateEvent',calEvent);
    			}

    		}).fail(function(data){

    			    		})
	    });				
				$('#editarCita').modal('show');
 		});

    },
    dayClick: function(date, jsEvent, view) {

        $.get('/admin/nuevaCita/'+idanuncio,
        	function(data){
        		
        		$('#crearCita').html(data);
				$('#horaini').datetimepicker({
		  			datepicker:false,
		  			format:'H:i'
				});
				$('#horafin').datetimepicker({
		  			datepicker:false,
		  			format:'H:i'
				});
				$('#fecha').datetimepicker({
		  			timepicker:false,
		  			format:'Y/m/d'
				});
  		$('#prueba').on('click',function(e){
  			e.preventDefault();
    		var form=$('#CCita');
    		var formData=form.serialize();

    		var url=form.attr('action');
    		alert(url);
    		$.ajax({
    			type:'post',
    			url: url,
    			data: formData,
    			async: true,
    			dataType: 'json',
    			headers: {
                       'X-CSRF-TOKEN': '<?php echo e(csrf_token()); ?>',
                   },
    			success:function(data){			
    				alert(data['idcita']);
     				$('#crearCita').modal('hide');
					$('#calendar').fullCalendar('renderEvent',
            {
            	id:data['idcita'],
                title: 'title',
                start: data['fecha']+" "+data['horaini'],
                end: data['fecha']+" "+data['horafin'],
                allDay: false
            },
            true // make the event "stick"
        );
    			}

    		}).fail(function(data){

    			    		})
	    });


				$('#crearCita').modal('show');
        	});
		}
	});
				$('#calendar').fullCalendar('changeView', 'agendaDay');
			});

});
 

</script>
<style>


	#calendar {
		max-width: 900px;
		margin: 0 auto;
	}

</style>


<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.admin2', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>