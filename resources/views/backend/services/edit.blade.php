<x-backend-layout>

    <x-flash-message />
    
    <a href="{{url('/backend/services')}}" class="btn btn-warning">Back</a>
       <form action="{{url('/backend/services/' . $type . '/' . $plan->id . '/edit')}}" method="POST" class="form border w-75 mx-auto p-3">
           
           @csrf

           {{-- Regular Maintemance Form --}}
           <div id="regular" class="mt-3">
               <legend class="text-center h3">Edit Regular Maintenance Plan</legend>
               <div class="form-group mb-3">
                   <label for="title">Title</label>
                   <input type="text" name="title" class="form-control" id="title" value="{{$plan->title}}">
   
                   @error('title')
                       <p class="text-danger">{{$message}}</p>
                   @enderror
               </div>
   
               <div class="form-group mb-3">
                   <label for="statements">statements</label>
                   <textarea name="statements" id="statements" cols="30" rows="5" class="form-control">{{$plan->statements}}</textarea>
                   @error('statements')
                       <p class="text-danger">{{$message}}</p>
                   @enderror
                   <button type="button" id="showPreview" class="btn btn-secondary">Show Preview</button>                       
                       <h4 class="text-center">Preview</h4>
                   <ol id="preview" class="list-group  list-group-numbered ">
   
                   </ol>
               </div>
               
               
           </div>
       
           {{-- Custimized Maintenance Form --}}
           <div id="custom" class="mt-3">
               <legend class="text-center h3">Edit Customizable Maintenance Plan</legend>
   
               <div class="form-group mb-3">
                   <label for="statement">Statement</label>
                   <input type="text" name="statement" id="statement" class="form-control" value="{{$plan->statement}}">
                   @error('statement')
                       <p class="text-danger">{{$message}}</p>
                   @enderror
               </div>
           </div>
           
           <div class="form-group mb-3">
               <label for="price">Price</label>
               <input type="number" name="price" id="price" class="form-control"  value="{{$plan->price}}" step="0.01">
               @error('price')
                       <p class="text-danger">{{$message}}</p>
                   @enderror
           </div>

           <div class="d-flex justify-content-center">
               <input type="submit" value="Update" class="btn btn-primary">
           </div>
       </form>
       
       
       </x-backend-layout>
       <script>
        let title = document.getElementById('title');
        let statements = document.getElementById('statements');
   
        let statement = document.getElementById('statement');
   
        let type ='{{$type}}';
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
   
   
   //Decide show form
        let   regularForm = document.getElementById('regular');
        let   customForm = document.getElementById('custom');

        if(type == 'regular') {
            customForm.style.display = 'none';
            statement.disabled = true;
        } else if(type == 'custom') {
            regularForm.style.display = 'none';
            statements.disabled = true;
            title.disabled = true;
        }
           
       </script>