$( document ).ready(function(){
    $('#goal-event').bind('change', function(e){
        let event = $(this).val();
        if (["50 FREE", "100 FREE", "100 FLY", "100 BREAST", "100 BACK"].includes(event)){
            $('#label_step_name_1').text('Start 15m');
            $('#label_step_name_2').text('Start 25yd');
            $('#label_step_name_3').text('Pace 100yd');
            $('#label_step_name_4').text('Start 50 yd');
            $('#label_step_name_5').text('Start 100 yd');

            if(strcmp($type_of_event, '50 FREE') == 0){
                $('#label_step_name_3').text('Start 50 yd');
                $('#label_step_name_4').text('Turn 10 yd');
            }


        }else if (["200 FREE", "500 FREE", "1000 FREE", "1650 FREE", "200 FLY", "200 BACK", "200 BREAST"].includes(event)){
            $('#label_step_name_1').text('Pace 50 yd');
            $('#label_step_name_2').text('Pace 75 yd');
            $('#label_step_name_3').text('Pace 100yd');
            $('#label_step_name_4').text('Start 50 yd');
            $('#label_step_name_5').text('Start 100 yd');

            if (["1000 FREE", "1650 FREE"].includes(event)){
                $('#label_step_name_2').text('Pace 100 yd');
                $('#label_step_name_3').text('Pace 150yd');
            }
        }
        
       


       if (["50 FREE", "1650 FREE", "1000 FREE"].includes(event)){
            $('#column_5').hide(); 
       } else {
            $('#column_5').show();  
       }

    })

 /*   $('#PercentSelect').bind('change', function(e){
        let percent = $(this).val();
        if(percent == "85%"){
            $('.Splits85').show();
            $('.SplitsTable').hide();
            $('.Splits90').hide();
            $('.Splits95').hide();
        } else if(percent == "90%"){
            $('.Splits85').hide();
            $('.SplitsTable').hide();
            $('.Splits90').show();
            $('.Splits95').hide();
        } else if(percent == "95%"){
            $('.Splits85').hide();
            $('.SplitsTable').hide();
            $('.Splits90').hide();
            $('.Splits95').show();
        } else if(percent == "Percentage"){
            $('.Splits85').hide();
            $('.SplitsTable').show();
            $('.Splits90').hide();
            $('.Splits95').hide();
        }

    })
    */
});
