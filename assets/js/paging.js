$( document ).ready(function() {

  

    //TABLE 1
   
     var table = '#pageTable';
     var trnum = 0;
     var maxRows = 5;
     var totalRows = $(table+' tbody tr').length;
   
     $(table+ 'tr:gt(0)').each(function(){
       trnum++;
       if(trnum > maxRows){
         $(this).hide();
       }
       if(trnum <= maxRows){
         $(this).show();
       }
     });
   
     if(totalRows > maxRows){
       var pagenum = Math.ceil(totalRows/maxRows);
       for(var i=1; i<= pagenum;){
         $('#pagination').append('<li class="page-item" data-page="'+i+'"><span class="page-link">'+ i++ +'</span></li>').show();
       }
     } else {
       $('#pagination').append('<li class="page-item" data-page="1"><span class="page-link">1</span></li>').show();
     }
   
   
     $('#pagination li:first-child').addClass('active');
     $('#pagination li').on('click',function(){
         var pageNum = $(this).attr('data-page');
         var trIndex = 0;
         $('#pagination li').removeClass('active');
         $(this).addClass('active');
         $(table+' tr:gt(0)').each(function(){
             trIndex++;
             if(trIndex > (maxRows * pageNum) || trIndex <= ((maxRows*pageNum)-maxRows)){
               $(this).hide();
             } else {
               $(this).show();
             }
         });
     });
   
     $('#pagination li:first-child').trigger("click");
   
     // table 2
     var table2 = '#pageTable2';
       var trnum2 = 0;
       var maxRows2 = 5;
       var totalRows2 = $(table2+' tbody tr').length;
   
     $(table2+ 'tr:gt(0)').each(function(){
       trnum2++;
       if(trnum2 > maxRows2){
         $(this).hide();
       }
       if(trnum2 <= maxRows2){
         $(this).show();
       }
     });
   
     if(totalRows2 > maxRows2){
       var pagenum2 = Math.ceil(totalRows2/maxRows2);
       for(var i=1; i<= pagenum2;){
         $('#pagination2').append('<li class="page-item" data-page="'+i+'"><span class="page-link">'+ i++ +'</span></li>').show();
       }
     }else {
       $('#pagination2').append('<li class="page-item" data-page="1"><span class="page-link">1</span></li>').show();
     }
   
   
     $('#pagination2 li:first-child').addClass('active');
     $('#pagination2 li').on('click',function(){
         var pageNum2 = $(this).attr('data-page');
         var trIndex2 = 0;
         $('#pagination2 li').removeClass('active');
         $(this).addClass('active');
         $(table2+' tr:gt(0)').each(function(){
             trIndex2++;
             if(trIndex2 > (maxRows2 * pageNum2) || trIndex2 <= ((maxRows2*pageNum2)-maxRows2)){
               $(this).hide();
             } else {
               $(this).show();
             }
         });
     });
   
     $('#pagination2 li:first-child').trigger("click");
   
   
     //TABLE 3
       var table3 = '#pageTable3';
       var trnum3 = 0;
       var maxRows3 = 5;
       var totalRows3 = $(table3+' tbody tr').length;
   
       $(table3+ 'tr:gt(0)').each(function(){
         trnum3++;
         if(trnum3 > maxRows3){
           $(this).hide();
         }
         if(trnum3 <= maxRows3){
           $(this).show();
         }
       });
   
       if(totalRows3 > maxRows3){
         var pagenum3 = Math.ceil(totalRows3/maxRows3);
         for(var i=1; i<= pagenum3;){
           $('#pagination3').append('<li class="page-item" data-page="'+i+'"><span class="page-link">'+ i++ +'</span></li>').show();
         }
       }else {
       $('#pagination3').append('<li class="page-item" data-page="1"><span class="page-link">1</span></li>').show();
     }
   
   
       $('#pagination3 li:first-child').addClass('active');
       $('#pagination3 li').on('click',function(){
           var pageNum3 = $(this).attr('data-page');
           var trIndex3 = 0;
           $('#pagination3 li').removeClass('active');
           $(this).addClass('active');
           $(table3+' tr:gt(0)').each(function(){
               trIndex3++;
               if(trIndex3 > (maxRows3 * pageNum3) || trIndex3 <= ((maxRows3*pageNum3)-maxRows3)){
                 $(this).hide();
               } else {
                 $(this).show();
               }
           });
       });
   
       $('#pagination3 li:first-child').trigger("click");
   
       // table 4
       var table4 = '#pageTable4';
       var trnum4 = 0;
       var maxRows4 = 5;
       var totalRows4 = $(table4+' tbody tr').length;
   
     $(table4+ 'tr:gt(0)').each(function(){
       trnum4++;
       if(trnum4 > maxRows4){
         $(this).hide();
       }
       if(trnum4 <= maxRows4){
         $(this).show();
       }
     });
   
     if(totalRows4 > maxRows4){
       var pagenum4 = Math.ceil(totalRows4/maxRows4);
       for(var i=1; i<= pagenum4;){
         $('#pagination4').append('<li class="page-item" data-page="'+i+'"><span class="page-link">'+ i++ +'</span></li>').show();
       }
     }else {
       $('#pagination4').append('<li class="page-item" data-page="1"><span class="page-link">1</span></li>').show();
     }
   
   
     $('#pagination4 li:first-child').addClass('active');
     $('#pagination4 li').on('click',function(){
         var pageNum4 = $(this).attr('data-page');
         var trIndex4 = 0;
         $('#pagination4 li').removeClass('active');
         $(this).addClass('active');
         $(table4+' tr:gt(0)').each(function(){
             trIndex4++;
             if(trIndex4 > (maxRows4 * pageNum4) || trIndex4 <= ((maxRows4*pageNum4)-maxRows4)){
               $(this).hide();
             } else {
               $(this).show();
             }
         });
     });
   
     $('#pagination4 li:first-child').trigger("click");
   
     // table 5
     var table5 = '#pageTable5';
       var trnum5 = 0;
       var maxRows5 = 5;
       var totalRows5 = $(table5+' tbody tr').length;
   
     $(table5+ 'tr:gt(0)').each(function(){
       trnum5++;
       if(trnum5 > maxRows5){
         $(this).hide();
       }
       if(trnum5 <= maxRows5){
         $(this).show();
       }
     });
   
     if(totalRows5 > maxRows5){
       var pagenum5 = Math.ceil(totalRows5/maxRows5);
       for(var i=1; i<= pagenum5;){
         $('#pagination5').append('<li class="page-item" data-page="'+i+'"><span class="page-link">'+ i++ +'</span></li>').show();
       }
     }else {
       $('#pagination5').append('<li class="page-item" data-page="1"><span class="page-link">1</span></li>').show();
     }
   
   
     $('#pagination5 li:first-child').addClass('active');
     $('#pagination5 li').on('click',function(){
         var pageNum5 = $(this).attr('data-page');
         var trIndex5 = 0;
         $('#pagination5 li').removeClass('active');
         $(this).addClass('active');
         $(table5+' tr:gt(0)').each(function(){
             trIndex5++;
             if(trIndex5 > (maxRows5 * pageNum5) || trIndex5 <= ((maxRows5*pageNum5)-maxRows5)){
               $(this).hide();
             } else {
               $(this).show();
             }
         });
     });
   
     $('#pagination5 li:first-child').trigger("click");
   

     
     // table 6
     var table6 = '#pageTable6';
     var trnum6 = 0;
     var maxRows6 = 5;
     var totalRows6 = $(table6+' tbody tr').length;
     
     $(table6+ 'tr:gt(0)').each(function(){
       trnum6++;
       if(trnum6 > maxRows6){
         $(this).hide();
        }
        if(trnum6 <= maxRows6){
          $(this).show();
        }
      });
      
      if(totalRows6 > maxRows6){
        var pagenum6 = Math.ceil(totalRows6/maxRows6);
        for(var i=1; i<= pagenum6;){
          $('#pagination6').append('<li class="page-item" data-page="'+i+'"><span class="page-link">'+ i++ +'</span></li>').show();
        }
      }else {
        $('#pagination6').append('<li class="page-item" data-page="1"><span class="page-link">1</span></li>').show();
      }
      
      
      $('#pagination6 li:first-child').addClass('active');
      $('#pagination6 li').on('click',function(){
        var pageNum6 = $(this).attr('data-page');
        var trIndex6 = 0;
        $('#pagination6 li').removeClass('active');
        $(this).addClass('active');
        $(table6+' tr:gt(0)').each(function(){
          trIndex6++;
          if(trIndex6 > (maxRows6 * pageNum6) || trIndex6 <= ((maxRows6*pageNum6)-maxRows6)){
            $(this).hide();
          } else {
            $(this).show();
          }
        });
      });
      
      $('#pagination6 li:first-child').trigger("click");
      
      // table 7
     var table7 = '#pageTable7';
     var trnum7 = 0;
     var maxRows7 = 5;
     var totalRows7 = $(table7+' tbody tr').length;
     
     $(table7+ 'tr:gt(0)').each(function(){
       trnum7++;
       if(trnum7 > maxRows7){
         $(this).hide();
        }
        if(trnum7 <= maxRows7){
          $(this).show();
        }
      });
      
      if(totalRows7 > maxRows7){
        var pagenum7 = Math.ceil(totalRows7/maxRows7);
        for(var i=1; i<= pagenum7;){
          $('#pagination7').append('<li class="page-item" data-page="'+i+'"><span class="page-link">'+ i++ +'</span></li>').show();
        }
      }else {
        $('#pagination7').append('<li class="page-item" data-page="1"><span class="page-link">1</span></li>').show();
      }
      
      
      $('#pagination7 li:first-child').addClass('active');
      $('#pagination7 li').on('click',function(){
        var pageNum7 = $(this).attr('data-page');
        var trIndex7 = 0;
        $('#pagination7 li').removeClass('active');
        $(this).addClass('active');
        $(table7+' tr:gt(0)').each(function(){
          trIndex7++;
          if(trIndex7 > (maxRows7 * pageNum7) || trIndex7 <= ((maxRows7*pageNum7)-maxRows7)){
            $(this).hide();
          } else {
            $(this).show();
          }
        });
      });
      
      $('#pagination7 li:first-child').trigger("click");
      
      // table 8
     var table8 = '#pageTable8';
     var trnum8 = 0;
     var maxRows8 = 5;
     var totalRows8 = $(table8+' tbody tr').length;
     
     $(table8+ 'tr:gt(0)').each(function(){
       trnum8++;
       if(trnum8 > maxRows8){
         $(this).hide();
        }
        if(trnum8 <= maxRows8){
          $(this).show();
        }
      });
      
      if(totalRows8 > maxRows8){
        var pagenum8 = Math.ceil(totalRows8/maxRows8);
        for(var i=1; i<= pagenum8;){
          $('#pagination8').append('<li class="page-item" data-page="'+i+'"><span class="page-link">'+ i++ +'</span></li>').show();
        }
      }else {
        $('#pagination8').append('<li class="page-item" data-page="1"><span class="page-link">1</span></li>').show();
      }
      
      
      $('#pagination8 li:first-child').addClass('active');
      $('#pagination8 li').on('click',function(){
        var pageNum8 = $(this).attr('data-page');
        var trIndex8 = 0;
        $('#pagination8 li').removeClass('active');
        $(this).addClass('active');
        $(table8+' tr:gt(0)').each(function(){
          trIndex8++;
          if(trIndex8 > (maxRows8 * pageNum8) || trIndex8 <= ((maxRows8*pageNum8)-maxRows8)){
            $(this).hide();
          } else {
            $(this).show();
          }
        });
      });
      
      $('#pagination8 li:first-child').trigger("click");
      
    });
      

