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
  window.addEventListener('DOMContentLoaded', function () {
    document.getElementById('service-search').value = '';
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
        
    <script>
    // Get a cookie by name
    function getCookie(name) {
      let match = document.cookie.match(new RegExp('(^| )' + name + '=([^;]+)'));
      return match ? match[2] : null;
    }

    // Set a cookie with a duration in days
    function setCookie(name, value, days) {
      let expires = "";
      if (days) {
        const date = new Date();
        date.setTime(date.getTime() + (days*24*60*60*1000));
        expires = "; expires=" + date.toUTCString();
      }
      document.cookie = name + "=" + value + expires + "; path=/";
    }

    // Show the privacy alert only if user hasn't agreed
    window.onload = function () {
      if (!getCookie("hasAgreed")) {
        document.getElementById("privacy-alert").style.display = "block";
      }

      document.getElementById("agreeBtn").addEventListener("click", function () {
        setCookie("hasAgreed", "true", 365);
        document.getElementById("privacy-alert").style.display = "none";
      });
    };
    </script>

</body>
</html>