

<div class="inst-footer-workshop-select">




<span class="helpItem" data-content-id="1">1</span>
<span class="helpItem" data-content-id="2">2</span>

<div id="help-wrap1" class="help-wrap">Click on a bead and drag it into the box above wth 'swatch' at the bottom.</div>

<div id="help-wrap2" class="help-wrap">Click this tab again to close the content pane.</div>





<script>
$('.footer_button').on('click',function(){
   $('.help-wrap').hide();
   $('#help-wrap'+$(this).data('content-id')).fadeIn(1000);
});
</script>

</div>