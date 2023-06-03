<x-backend-layout>
 <x-flash-message />
{{-- back to services --}}
 <a href="{{url('/backend/services')}}" class="btn btn-warning">Back</a>

    <form action="{{url('/backend/services/create')}}" method="POST" class="form border w-75 mx-auto p-3">
        
        @csrf

    {{-- Tab start --}}
        {{-- tab toggler --}}
        <div class="tab-bar">
            <button type="button" id="tabcontrol1" class="tab border active" onclick="toggleTab(event, 'tab1')">Regular Maintenance Plan</button>
            <button type="button" id="tabcontrol2" class="tab border" onclick="toggleTab(event, 'tab2')">Customizable Maintenance Plan</button>
        </div>
          
        {{-- tab1 --}}
        <div id="tab1" class="tab-content show mt-3">
          {{-- Regular Maintenance --}}
            <legend class="text-center h3">Create Regular Maintenance Plan</legend>

            {{-- title --}}
            <div class="form-group mb-3">
                <label for="title">Title</label>
                <input type="text" name="title" class="form-control" id="title">

                @error('title')
                    <p class="text-danger">{{$message}}</p>
                @enderror
            </div>

            {{-- statements --}}
            <div class="form-group mb-3">
                <label for="statements">statements</label>
                <textarea name="statements" id="statements" cols="30" rows="5" class="form-control"></textarea>
                <span>Please place # after a statement end. You can see preview by clicking button below</span>
                @error('statements')
                    <p class="text-danger">{{$message}}</p>
                @enderror
                <button type="button" id="showPreview" class="btn btn-secondary">Show Preview</button>                       
                    <h4 class="text-center">Preview</h4>
                <ol id="preview" class="list-group  list-group-numbered ">

                </ol>
            </div>
            
            
        </div>
    
    {{-- Tab2 --}}
        <div id="tab2" class="tab-content mt-3">

        {{-- Customizable Maintenance --}}
            <legend class="text-center h3">Create Customizable Maintenance Plan</legend>

            {{-- statement --}}
            <div class="form-group mb-3">
                <label for="statement">Statement</label>
                <input type="text" name="statement" id="statement" class="form-control">
                @error('statement')
                    <p class="text-danger">{{$message}}</p>
                @enderror
            </div>
        </div>
        
    {{-- Tab End --}}

        {{-- price --}}
        <div class="form-group mb-3">
            <label for="price">Price</label>
            <input type="number" name="price" id="price" class="form-control" step="0.01">
            @error('price')
                    <p class="text-danger">{{$message}}</p>
                @enderror
        </div>

        <input type="hidden" id="type" name="type">
        <div class="d-flex justify-content-center">
            <input type="submit" value="Create" class="btn btn-primary">
        </div>
    </form>
    
    
</x-backend-layout>

<script>
        var title = document.getElementById('title');
        var statements = document.getElementById('statements');

        var statement = document.getElementById('statement');

        let type = document.getElementById('type');
        
        //Preview
        preview = document.getElementById('preview');
        previewArr = [];
        let showPreviewBtn = document.getElementById('showPreview');
        function showPreview() {
            

            previewArr = statements.value.split('#');

            let lists = document.querySelectorAll('li');
           for(let y = 0; y < lists.length; y++) {
            lists[y].remove();
           }
            
            
            for(let x = 0; x < previewArr.length; x++) {
                let li = document.createElement('li');
                 
                li.classList.add('list-group-item', 'list-group-item-secondary');
                li.textContent = previewArr[x];
                preview.appendChild(li);
            }
        }

        showPreviewBtn.addEventListener('click', showPreview);



        //toggling form inputs
        let tabcontrol1 = document.getElementById('tabcontrol1');
        let tabcontrol2 = document.getElementById('tabcontrol2');

          
        
       
        function tab1form() {
             if(tabcontrol1.classList.contains('active')){
                statements.disabled = false;
                title.disabled = false; 
                statement.disabled = true;
                type.value = 'regular';
            }
        }
        tab1form();
        tabcontrol1.addEventListener('click', tab1form);

        function tab2form() {
             if(tabcontrol2.classList.contains('active')){
                statement.disabled = false;
                title.disabled = true;
                statements.disabled = true; 
                type.value = 'custom';
            }
        }
        tab2form();
        tabcontrol2.addEventListener('click', tab2form);

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