<x-backend-layout>
    <x-flash-message />
<div class="container border mx-auto p-3">

    <div class="d-flex justify-content-end">
        <a href="{{url('/backend/services/create')}}" class="btn btn-warning text-end">Create  new plan</a>
    </div>
    
    <div class="tab-bar">
        <button type="button" class="tab border active" onclick="toggleTab(event, 'tab1')">Regular Maintenance Plans</button>
        <button type="button" class="tab border" onclick="toggleTab(event, 'tab2')">Customizable Maintenance Plans</button>
    </div>
      
    {{-- Show All Regular Plans --}}
    <div id="tab1" class="tab-content show ">
        <div class="row">
            @foreach ($regularPlans as $regularPlan)
                <div class="col-12  col-md-6 col-lg-4 my-3">
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
                      <a href="{{url('/backend/services/regular/' . $regularPlan->id . '/edit')}}" class="btn btn-primary">Edit</a>
                      <a href="{{url('/backend/services/regular/' . $regularPlan->id . '/delete')}}" class="btn btn-danger">Delete</a>
                    </div>
                </div>
            </div>
            @endforeach   
        </div>
    </div>


    {{-- show all Custom Plan --}}
    <div id="tab2" class="tab-content">
        <table class="table table-dark table-striped table-bordered w-100">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Statements</th>
                    <th>Price</th>
                    <th></th>
                    <th></th>
                </tr>
            </thead>

            <tbody>
                @foreach ($customizablePlans as $customizablePlan)
                <tr>
                    <td>{{$customizablePlan->id}}</td>
                    <td>{{$customizablePlan->statement}}</td>
                    <th>{{$customizablePlan->price}}</th>
                    <th><a href="{{url('/backend/services/custom/' . $customizablePlan->id . '/edit' )}}" class="btn btn-warning">Edit</a></th>
                    <th><a href="{{url('/backend/services/custom/' . $customizablePlan->id . '/delete' )}}" class="btn btn-danger">Delete</a></th>
                </tr>
                @endforeach
                
            </tbody>
        </table>
    </div>
      
</div>


</x-backend-layout>
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