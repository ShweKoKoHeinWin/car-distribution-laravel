@if(session()->has('message'))
<div id="myAlert" class="alert alert-info" role="alert">
    {{session('message')}}
  </div>

  <script>
    var alertElement = document.getElementById('myAlert');
    var show = true;
  
    setTimeout(function() {
      show = false;
      toggleAlert();
    }, 3000);
  
    function toggleAlert() {
      if (show) {
        alertElement.style.display = '';
      } else {
        alertElement.style.display = 'none';
      }
    }
  
    toggleAlert();
  </script>
@endif

