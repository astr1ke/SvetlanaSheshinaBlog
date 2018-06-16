<script src="{{asset('js')}}/bundle.min.js"></script>
<script src="{{asset('js')}}/scripts.js"></script>
<script>

    $(function($){
        $("#search").keypress(function(e){
            if(e.keyCode==13){
               $("#submit").click();
            }
        });

    });
</script>