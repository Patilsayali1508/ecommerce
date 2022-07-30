{{View::make('sidebar')}}

<div class="container">

 <div class="box">
 <table class="table table-striped">
  <thead>
    <tr>
    
      <th scope="col">User ID</th>
      <th scope="col">Product Name</th>
      <th scope="col">Product Price</th>
      <th scope="col">Product Image</th>
    </tr>
  </thead>
  <tbody>


  @foreach($data as $item)
                <tr>
               
             <td> {{$item['id']}} </td>
             <td> {{$item['name']}} </td>
             <td>{{$item['price']}} </td>
             <td> {{$item['image']}} </td>
             </tr> 
           
             @endforeach
              

  </tbody>
</table>



 
 </div>
</div>