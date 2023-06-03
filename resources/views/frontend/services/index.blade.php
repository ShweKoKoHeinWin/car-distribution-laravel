<x-layout :phone="$data->phone">
    <div class="p-2">
    <h3 class="text-center m-3">Services We Offer</h3>

    <div class="tab-bar">
        <button class="tab border active" onclick="toggleTab(event, 'tab1')">Regular Maintenance Plan</button>
        <button class="tab border" onclick="toggleTab(event, 'tab2')">Customizable Maintenance Plan</button>
      </div>
      
      {{-- Regular Plans --}}
      <div id="tab1" class="tab-content show">
        <div class="row">
          @foreach ($regularPlans as $regularPlan)
          <div class="col-12  col-sm-6 col-lg-4 my-3">
            <div class="card bg-light text-center">
                <div class="card-header">
                  <h3>{{$regularPlan->title}}</h3>
                </div>
                <div class="card-body">
                  <h4 class="card-title">${{$regularPlan->price}}/month</h4>
                  <ol class="list-group list-group-numbered text-start my-2">
                    @php
                        $statements = explode('#', $regularPlan->statements);
                    @endphp
                    @foreach ($statements as $statement)
                        <li class="list-group-item">{{$statement}}</li>
                    @endforeach
                  </ol>
                </div>
              </div>
          </div>
          @endforeach        
        </div>
      </div>
      
      {{-- Custom Plan --}}
      <div id="tab2" class="tab-content p-3">
        <div class="row " style="border: double 3px #345688; height: 200px; overflow-y: scroll;">
          @foreach ($customizablePlans as $customizablePlan)

            <div class="col-6 col-md-4 col-lg-3">
                <div class="input-group form-check-lg">
                    <div class="form-control">
                        <div class="d-flex justify-content-between">
                            <label for="1" class="form-check-label">{{$customizablePlan->statement}}</label>
                            <span><b>$</b> <em>{{$customizablePlan->price}}</em></span>
                        </div>
                        
                    </div>
                    <div class="input-group-text ">
                        <input type="checkbox" id="1" class="form-check-input checkbox">
                    </div>
                </div>                 
            </div>
          @endforeach 
        </div>

        <div class="row justify-content-center text-center">
            <div class="col-4"  style="border-left: double 3px #345688;border-bottom: double 3px #345688;">
                Total Amount
            </div>
                
            <div class="col-4" style="border-left: double 3px #345688;border-right: double 3px #345688;border-bottom: double 3px #345688;"">
                <div class="total"></div>
            </div>
        </div>
      </div>      
    </div>
</x-layout>

<script src="{{asset('/js/app.js')}}" defer></script>

<script>
    function toggleTab(event, tabId) {
  // Get all tab content elements
  var tabContents = document.getElementsByClassName('tab-content');

  // Remove 'show' class from all tab content elements
  for (var i = 0; i < tabContents.length; i++) {
    tabContents[i].classList.remove('show');
  }

  // Get all tab elements
  var tabs = document.getElementsByClassName('tab');

  // Remove 'active' class from all tab elements
  for (var i = 0; i < tabs.length; i++) {
    tabs[i].classList.remove('active');
  }

  // Add 'show' class to the selected tab content
  var selectedTabContent = document.getElementById(tabId);
  selectedTabContent.classList.add('show');

  // Add 'active' class to the clicked tab
  event.currentTarget.classList.add('active');
}

</script>