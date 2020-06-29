$(function () {
    $('[data-toggle="tooltip"]').tooltip();
    $('#btnCopy').tooltip({
    trigger: 'click'
  });
  
  function setTooltip(btn, message) {
    btn.tooltip('hide')
      .attr('data-original-title', message)
      .tooltip('show');
  }
  
  function hideTooltip(btn) {
    btn.tooltip('hide');
    btn.attr('data-original-title', 'Click to copy');
  }

    var clipboard = new ClipboardJS('#btnCopy');
    
    clipboard.on('success', function(e) {
        // console.log(e);
        var btn = $(e.trigger);
            setTooltip(btn, 'Copied!');
            setTimeout(function() {
                hideTooltip(btn);
            }, 2000);
    });

// function searchSpecifictd() {
//   // Declare variables
//   var input, filter, table, tr, td, i, txtValue;
//   input = document.getElementById("inputSearch");
//   filter = input.value.toUpperCase();
//   table = document.getElementById("pageSearch");
//   tr = table.getElementsByTagName("tr");

//   // Loop through all table rows, and hide those who don't match the search query
//   for (i = 0; i < tr.length; i++) {
//     td = tr[i].getElementsByTagName("th")[0];
//     if (td) {
//       txtValue = td.textContent || td.innerText;
//       if (txtValue.toUpperCase().indexOf(filter) > -1) {
//         tr[i].style.display = "";
//       } else {
//         tr[i].style.display = "none";
//       }
//     }
//   }
// }

  });

  