$(document).ready(function () {
    $('.sidebar-menu').tree();

    $('#registros').DataTable({
      'paging'      : true,
      'pageLength'  : 4, 
      'lengthChange': false,
      'searching'   : true,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : false,
      'language'    : {
        paginate: {
          next: 'Siguiente',
          previous: 'Anterior',
          last: 'Último',
          first: 'Primero'
        },
        info: 'Mostrando _START_ a _END_ de _TOTAL_ resultados',
        emptyTable: 'No hay registros',
        infoEmpty: '0 resultados',
        search: 'Buscar'
      }
    });
    

    $('.content #btn-new').attr('disabled',true);

    $('.content #password_repit').on('input', function(){
      var pass= $('#password').val();

      if ($(this).val() == pass){
        $('#resultado_password').text('Correcto');
        $('#resultado_password').parents('.form-group').addClass('has-success').removeClass('has-error');
        $('input #password').parents('.form-group').addClass('has-success').removeClass('has-error');
        $('#btn-new').attr('disabled',false);
      }else{
        $('#resultado_password').text('Contraseñas distintas');
        $('#resultado_password').parents('.form-group').addClass('has-error').removeClass('has-success');
        $('input #password').parents('.form-group').addClass('has-error').removeClass('has-success');
      }
    });

  //Date picker
  $('.box-body #datepicker').datepicker({
    language: 'es',
    autoclose: true
  });

  //Initialize Select2 Elements
  $('.select2').select2();

  //Timepicker
  $('.timepicker').timepicker({
    showInputs: false
  });


  $('#dtHorizontalVerticalExample').DataTable({
    "scrollX": true,
    "scrollY": 200,
    });
    $('.dataTables_length').addClass('bs-select');


  /*
     * estadisticas
  */

    const id_evento= $('#procedencia').attr('data-id');

  $.getJSON('servicios/estadisticas-procedencia.php?id='+id_evento, function(data){
    datos_procedencia= data;
    donutData = [
      { label: datos_procedencia[0].nombre, data: datos_procedencia[0].valor, color: '#191497' },
      { label: datos_procedencia[1].nombre, data: datos_procedencia[1].valor, color: '#0098A1' },
    ]
    $.plot('#procedencia', donutData, {
      series: {
        pie: {
          show       : true,
          radius     : 1,
          innerRadius: 0.5,
          label      : {
            show     : true,
            radius   : 2 / 3,
            formatter: labelFormatter,
            threshold: 0.1
          }
  
        }
      },
      legend: {
        show: false
      }
    });
  });

  $.getJSON('servicios/estadisticas-ciudad.php?id='+id_evento, function(data){
    datos_ciudad= data;
    console.log(data);
    donutData = [
      { label: datos_ciudad[0].nombre, data: datos_ciudad[0].valor, color: '#457DD9' },
      { label: datos_ciudad[1].nombre, data: datos_ciudad[1].valor, color: '#BE7303' },
    ]
    $.plot('#ciudad', donutData, {
      series: {
        pie: {
          show       : true,
          radius     : 1,
          innerRadius: 0.5,
          label      : {
            show     : true,
            radius   : 2 / 3,
            formatter: labelFormatter,
            threshold: 0.1
          }
  
        }
      },
      legend: {
        show: false
      }
    });
  });

  

  function labelFormatter(label, series) {
    return '<div style="font-size:13px; text-align:center; padding:2px; color: #fff; font-weight: 600;">'
      + label
      + '<br>'
      + Math.round(series.percent) + '%</div>'
  }
  /*
   * END estadisticas
  */
})