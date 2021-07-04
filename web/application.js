$( document ).ready(function(){
    $('#goal-event').bind('change', function(e){
        let event = $(this).val();
        if (event == '50 FREE' || event == '100 FREE'
                || event == '100 FLY' || event == '100 BREAST'){
                    $('#label_step_name_1').text('Start 15m');
                    $('#label_step_name_2').text('Start 25yd');
                    $('#label_step_name_3').text('Pace 100yd');

        }

       if (["50 FREE", "1650 FREE", "1000 FREE"].includes(event)){
           console.log('here');
            $('#column_5').hide(); 
       } else {
            $('#column_5').show();  
       }
        



    })
});