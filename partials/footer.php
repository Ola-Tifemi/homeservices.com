<script src="assets/bootstrap/js/bootstrap.bundle.min.js"></script>
      <script src="assets/js/jquery-3.7.1.min.js"></script>
      <script>
        $(document).ready(function(){
          $(window).scroll(function(){
            $('.bounce').addClass('animate__animated animate__headShake animate__delay-1s')
            $('.bounce2').addClass('animate__animated animate__slideInRight animate__delay-2s')
            $('.bounce3').addClass('animate__animated animate__bounce animate__delay-4s')
            $('.bounce4').addClass('animate__animated animate__bounce animate__delay-5s')
            $('.bounce5').addClass('animate__animated animate__headShake animate__delay-6s')
            $('bounce6').addClass('animate__animated animate__zoomIn animate__delay-1s')
            $('#boun'),addClass('animate__animated animate__zoomIn animate__delay-1s')
          })


        });
      </script>
              <script>
        $(function(){
            $('#cart').change(function(){
                 //read the id of the state selected 
                var serve_id = $('#cart').val();

                //alert(serve_id)
                if(serve_id == ''){
                    alert('Select a Service type');
                }else{
                    //load
                    //send it to action file
                    $("#cart2").load('service_typelist.php',{id:serve_id});
                    
                }             
            });
        })

        </script>
</body>
</html>