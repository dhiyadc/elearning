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
  });